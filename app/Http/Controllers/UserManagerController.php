<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagerController extends Controller
{

    // sys user start

    public function index(){
        $users = User::with("roles")->where("role_id","!=","4")->latest("id")->paginate(10);
        return view("sys_users.index",compact("users"));
    }

    public function create(){
        return view("sys_users.create");
    }

    public function store(Request $request){

        $request->validate([
            "name" => "required|min:4",
            "email" => "required|email",
            "password" => "required|min:8",
            "cPassword" => "required|same:password",
            "role_id" => "required|exists:roles,role_id",
        ]);
//        return $request;

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route("user-manager.index")->with("message","User is created Successfully");

    }

    public function edit(User $user){
        return view("sys_users.edit",compact("user"));
    }

    public function update(Request $request, User $user){

        $request->validate([
            "name" => "required|min:4",
            "email" => "required|email",
            "password" => "required|min:8",
            "cPassword" => "required|same:password",
            "role_id" => "required|exists:roles,role_id",
        ]);

//        return $request;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->update();

        return redirect()->route("user-manager.index")->with("message","User is updated Successfully");

    }

    public function destroy(User $user){
//        return $user;
        $name = $user->name;
        $user->delete();

        return redirect()->route("user-manager.index")->with("message","$name is deleted Successfully");

    }

    public function search(Request $request){
//        return $request->searchterm;
        $users = User::where("name","LIKE","%$request->searchterm%")->where("role_id","!=","4")->paginate(10);

        return view("sys_users.search",compact('users'));
    }

    //sys user end

    //reg user start

    public function indexReg(){
        $users = User::with("roles")->where("role_id","=","4")->latest("id")->paginate(10);
        return view("reg_users.index",compact("users"));
    }

    public function createReg(){
        return view("reg_users.create");
    }

    public function storeReg(Request $request){

        $request->validate([
            "name" => "required|min:4",
            "email" => "required|email",
            "password" => "required|min:8",
            "cPassword" => "required|same:password",
            "role_id" => "required|exists:roles,role_id",
        ]);
//        return $request;

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route("reg-user-manager.index")->with("message","User is created Successfully");

    }

    public function editReg(User $user){
        return view("reg_users.edit",compact("user"));
    }

    public function updateReg(Request $request, User $user){

        $request->validate([
            "name" => "required|min:4",
            "email" => "required|email",
            "password" => "required|min:8",
            "cPassword" => "required|same:password",
            "role_id" => "required|exists:roles,role_id",
        ]);

//        return $request;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->update();

        return redirect()->route("reg-user-manager.index")->with("message","User is updated Successfully");

    }

    public function destroyReg(User $user){
//        return $user;
        $name = $user->name;
        $user->delete();

        return redirect()->route("reg-user-manager.index")->with("message","$name is deleted Successfully");

    }

    public function searchReg(Request $request){
//        return $request->searchterm;
        $users = User::where("name","LIKE","%$request->searchterm%")->where("role_id","=","4")->paginate(10);

        return view("reg_users.search",compact('users'));
    }

    public function ban(User $user){

        $user->is_ban = 1;
        if ($user->update()){
            return "success";
        }

    }

    public function unban(User $user){

        $user->is_ban = 0;
        if ($user->update()){
            return "success";
        }

    }


}
