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
//        return $request;
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
            return redirect()->route("category.edit",$photo->parent_id)->with("message","Photo is updated successfully.");

        }
        //update category cover photo end

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
            return redirect()->route("category.edit",$photo->parent_id)->with("message","Photo is updated successfully.");

        }
        //update category icon photo end

        if (isset($request->about_photo)){
            $request->validate([
                "about_photo" => "required|mimes:jpg,png|file",
            ]);

            $dir = "/public/about/";

            //firstly, delete old photo from local
            Storage::delete($dir.$photo->photo);


            $newFileName = uniqid()."_about.".$request->file("about_photo")->getClientOriginalExtension();

            //update in local
            $request->file("about_photo")->storeAs($dir,$newFileName);

            //update in db

            $photo->photo = $newFileName;
            $photo->img_height= getimagesize($request->about_photo)[1];
            $photo->img_width = getimagesize($request->about_photo)[0];
            $photo->update();
            return redirect()->route("abouts.edit",$photo->parent_id)->with("message","Photo is updated successfully.");
        }

        if (isset($request->favicon)){
//            return $request;
            $request->validate([
                "favicon" => "required|mimes:jpg,png|file",
            ]);

            $dir = "/public/backend/favicon/";

            //firstly, delete old photo from local
            Storage::delete($dir.$photo->photo);


            $newFileName = uniqid()."_fav.".$request->file("favicon")->getClientOriginalExtension();

            //update in local
            $request->file("favicon")->storeAs($dir,$newFileName);

            //update in db

            $photo->photo = $newFileName;
            $photo->img_height= getimagesize($request->favicon)[1];
            $photo->img_width = getimagesize($request->favicon)[0];
            $photo->update();
            return redirect()->route("backend_configs.edit",$photo->parent_id)->with("message","Photo is updated successfully.");
        }

        if (isset($request->logo)){
//            return $request;
            $request->validate([
                "logo" => "required|mimes:jpg,png|file",
            ]);

            $dir = "/public/backend/logo/";

            //firstly, delete old photo from local
            Storage::delete($dir.$photo->photo);


            $newFileName = uniqid()."_logo.".$request->file("logo")->getClientOriginalExtension();

            //update in local
            $request->file("logo")->storeAs($dir,$newFileName);

            //update in db

            $photo->photo = $newFileName;
            $photo->img_height= getimagesize($request->logo)[1];
            $photo->img_width = getimagesize($request->logo)[0];
            $photo->update();
            return redirect()->route("backend_configs.edit",$photo->parent_id)->with("message","Photo is updated successfully.");
        }


        if (isset($request->login_bg)){
//            return $request;
            $request->validate([
                "login_bg" => "required|mimes:jpg,png|file",
            ]);

            $dir = "/public/backend/login_bg/";

            //firstly, delete old photo from local
            Storage::delete($dir.$photo->photo);


            $newFileName = uniqid()."_loginBg.".$request->file("login_bg")->getClientOriginalExtension();

            //update in local
            $request->file("login_bg")->storeAs($dir,$newFileName);

            //update in db

            $photo->photo = $newFileName;
            $photo->img_height= getimagesize($request->login_bg)[1];
            $photo->img_width = getimagesize($request->login_bg)[0];
            $photo->update();
            return redirect()->route("backend_configs.edit",$photo->parent_id)->with("message","Photo is updated successfully.");
        }

        if (isset($request->wallpaper)){
//            return $request;

            $request->validate([
                "wallpaper" => "required|mimes:jpg,png,gif|file",
            ]);


            $wallpaperGifDir = "/public/wallpaper/gif";
            $wallpaperImageDir = "/public/wallpaper/image";



            $extension = $request->file("wallpaper")->getClientOriginalExtension();

            if ($extension="jpg" || $extension="png" || $extension="jpeg") {
                //firstly, delete old photo from local
                Storage::delete($wallpaperImageDir.$photo->photo);

                $wallpaperImageNewFileName = uniqid()."_wallImage.".$request->file("wallpaper")->getClientOriginalExtension();

                //update in local
                $request->file("wallpaper")->storeAs($wallpaperImageDir,$wallpaperImageNewFileName);

                //update in db
                $photo->photo = $wallpaperImageNewFileName;
                $photo->img_height= getimagesize($request->wallpaper)[1];
                $photo->img_width = getimagesize($request->wallpaper)[0];
                $photo->update();


            } elseif($extension="gif") {
                //firstly, delete old photo from local
                Storage::delete($wallpaperGifDir.$photo->photo);

                $wallpaperGifNewFileName = uniqid()."_wallGif".$request->file("wallpaper")->getClientOriginalExtension();

                //update in local
                $request->file("wallpaper")->storeAs($wallpaperGifDir,$wallpaperGifNewFileName);

                //update in db
                $photo->photo = $wallpaperGifNewFileName;
                $photo->img_height= getimagesize($request->wallpaper)[1];
                $photo->img_width = getimagesize($request->wallpaper)[0];
                $photo->update();



            } else {
                //firstly, delete old photo from local
                Storage::delete($wallpaperGifDir.$photo->photo);
            }


            return redirect()->route("wallpapers.edit",$photo->parent_id)->with("message","Photo is updated successfully.");
        }


        return redirect()->back()->with("message","Photo updated is failed.");

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
