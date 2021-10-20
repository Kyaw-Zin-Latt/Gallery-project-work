<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit() {
        $user = User::find(Auth::id());
        return view("profile.edit",compact("user"));
    }

    public function updatePhoto(Request $request) {
        $request->validate([
            "photo" => "required|mimetypes:image/jpeg,image/png,image/jpg|file|max:2500"
        ]);
        $dir="public/profile/";

        Storage::delete($dir.Auth::user()->photo);

        $newName = uniqid()."_photo.".$request->file("photo")->getClientOriginalExtension();
        $request->file("photo")->storeAs($dir,$newName);

        $user = User::find(Auth::id());
        $user->photo = $newName;
        $user->update();

        return redirect()->route("profile.edit")->with("message","Photo is updated successfully.");

    }

    public function update(Request $request) {
        $user = User::find(Auth::id());
        $request->validate([
            'name' => "required|string|min:3|max:50|unique:users,name,".$user->id,
            'email' => "required|min:3|max:50",
        ]);

        if ($request->password){
            $request->validate([
                'curr_password' => [new MatchOldPassword()],
                'new_password' => ['min:8'],
                'con_password' => ['same:new_password'],
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->new_password);

        if ($request->new_password){
            $user->password = Hash::make($request->new_password);
        }


        $user->update();


        return redirect()->route("profile.edit")->with("message","User is updated successfully.");

    }
}
