<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {

        //update category cover photo start

        if (isset($request->cover)){

            $request->validate([
                "cover" => "required|mimes:jpg,png|file",
            ]);

            $coverDir = "/public/category/cover/";

            //delete photo from local
            Storage::delete($coverDir.$photo->photo);

            //new cover photo name
            $coverNewFileName = uniqid()."_cover.".$request->file("cover")->getClientOriginalExtension();

            //update in local
            $request->file("cover")->storeAs($coverDir,$coverNewFileName);

            //update in db
            $photo->photo = $coverNewFileName;
            $photo->img_width = getimagesize($request->cover)[0];
            $photo->img_height = getimagesize($request->cover)[1];
            $photo->update();
        }

        //update category cover photo end

//        return $request;

        //update category icon photo start
        if (isset($request->icon)){

            $request->validate([
                "icon" => "required|mimes:jpg,png|file",
            ]);

            $iconDir = "/public/category/icon/";

            //delete photo from local
            Storage::delete($iconDir.$photo->photo);

            //new icon photo name
            $iconNewFileName = uniqid()."_icon.".$request->file("icon")->getClientOriginalExtension();

            //update in local
            $request->file("icon")->storeAs($iconDir,$iconNewFileName);

            //update in db

            $photo->photo = $iconNewFileName;
            $photo->img_width = getimagesize($request->icon)[0];
            $photo->img_height = getimagesize($request->icon)[1];
            $photo->update();
        }

        //update category icon photo end


        return redirect()->route("category.edit",$photo->parent_id)->with("message","Photo is updated successfully.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {

    }
}
