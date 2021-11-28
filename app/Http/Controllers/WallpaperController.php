<?php

namespace App\Http\Controllers;


use App\Models\Photo;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WallpaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $wallpapers = Wallpaper::with(["photo","category","user"])->get();


        return view("wallpaper.index",compact("wallpapers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("wallpaper.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;

        $request->validate([
            "wallpaper_name" => "required|min:3",
            "types" => "required",
            "point" => "required",
            "cat_id" => "required|exists:categories,id",
            "color_id" => "required|exists:colors,id",
//            "wallpaper_search_tags" => "min:3",
            "images1" => "required|mimes:jpg,png,gif|file"
        ]);

        $wallpaperGifDir = "/public/wallpaper/gif";
        $wallpaperImageDir = "/public/wallpaper/image";

        $wallpaperImageNewFileName = uniqid()."_wallImage.".$request->file("images1")->getClientOriginalExtension();


        $request->file("images1")->storeAs($wallpaperImageDir,$wallpaperImageNewFileName);

        $extension = $request->file("images1")->getClientOriginalExtension();


        $wallpaper = new Wallpaper();
        $wallpaper->wallpaper_id = "paper".uniqid();
        $wallpaper->cat_id = $request->cat_id;
        $wallpaper->color_id = $request->color_id;
        $wallpaper->wallpaper_name = $request->wallpaper_name;
        $wallpaper->types = $request->types;
        if (isset($request->is_recommended)){
            $wallpaper->is_recommended = 1;
        }
        $wallpaper->point = $request->point;
        $wallpaper->wallpaper_search_tags = $request->wallpaper_search_tags;
        $wallpaper->credit = $request->credit;
        if (isset($request->wallpaper_is_published)){
            $wallpaper->wallpaper_is_published = 1;
        }else{
            $wallpaper->wallpaper_is_published = 0;

        }
        if ($extension="jpg" || $extension="png" || $extension="jpeg") {
            $wallpaper->is_wallpaper = 1;
        } elseif($extension="gif") {
            $wallpaper->is_gif = 1;
        } else {
            $wallpaper->is_video_wallpaper = 1;
        }
        $wallpaper->added_user_id = Auth::id();
        $wallpaper->save();

        if ($extension="jpg" || $extension="png" || $extension="jpeg"){
            $photo = new Photo();
            $photo->id = "img".uniqid();
            $photo->parent_id = $wallpaper->wallpaper_id;
            $photo->img_type = "wallpaper";
            $photo->photo = $wallpaperImageNewFileName;
            $photo->img_width = getimagesize($request->images1)[0];
            $photo->img_height = getimagesize($request->images1)[1];
            $photo->save();
        }



        return redirect()->route("wallpapers.index")->with("message","Wallpaper is added Successfully.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function show(Wallpaper $wallpaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallpaper $wallpaper)
    {
        return view("wallpaper.edit",compact("wallpaper"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallpaper $wallpaper)
    {
//        return $request;

        $request->validate([
            "wallpaper_name" => "required|min:3",
            "types" => "required",
            "point" => "required",
            "cat_id" => "required|exists:categories,id",
            "color_id" => "required|exists:colors,id",
//            "wallpaper_search_tags" => "min:3",
//            "images1" => "required|mimes:jpg,png,gif|file"
        ]);

//        return $wallpaper->photo;
        $extension = pathinfo($wallpaper->photo[0]->photo, PATHINFO_EXTENSION);

        $wallpaper->cat_id = $request->cat_id;
        $wallpaper->color_id = $request->color_id;
        $wallpaper->wallpaper_name = $request->wallpaper_name;
        $wallpaper->types = $request->types;
        if (isset($request->is_recommended)){
            $wallpaper->is_recommended = 1;
        }
        $wallpaper->point = $request->point;
        $wallpaper->wallpaper_search_tags = $request->wallpaper_search_tags;
        $wallpaper->credit = $request->credit;
        if (isset($request->wallpaper_is_published)){
            $wallpaper->wallpaper_is_published = 1;
        }else{
            $wallpaper->wallpaper_is_published = 0;

        }
        if ($extension="jpg" || $extension="png" || $extension="jpeg") {
            $wallpaper->is_wallpaper = 1;
        } elseif($extension="gif") {
            $wallpaper->is_gif = 1;
        } else {
            $wallpaper->is_video_wallpaper = 1;
        }
        $wallpaper->added_user_id = Auth::id();
        $wallpaper->update();

        return redirect()->route("wallpapers.index")->with("message","$request->title is updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallpaper $wallpaper)
    {
//        return $wallpaper->photo[0]->photo;


        if ($wallpaper->is_wallpaper == 1){

            //delete photo from local
            $wallpaperImageDir = "/public/wallpaper/image/";
            Storage::delete($wallpaperImageDir.$wallpaper->photo[0]->photo);

            //delete photo from db
            $wallpaper->photo[0]->delete();
        }

        //delete wallpaper
        $title = $wallpaper->wallpaper_name;
        $wallpaper->delete();

        return redirect()->route("wallpapers.index")->with("message","$title is deleted Successfully.");


    }

    public function publish(Request $request){

        $request->validate([

            "id" => "exists:wallpapers,wallpaper_id"

        ]);

        $wallpaper = Wallpaper::find($request->id);
        $wallpaper->wallpaper_is_published = 1;
        $wallpaper->update();

        if ($wallpaper->update()){
            return redirect()->route("wallpapers.index")->with("message","Wallpaper is published successfully.");
        }else{
            return redirect()->route("wallpapers.index")->with("error","Wallpaper is published unsuccessfully.");
        }


    }

    public function unPublish(Request $request){

        $request->validate([

            "id" => "exists:wallpapers,wallpaper_id"

        ]);

        $wallpaper = Wallpaper::find($request->id);
        $wallpaper->wallpaper_is_published = 0;
        $wallpaper->update();

        return redirect()->route("wallpapers.index")->with("message","Wallpaper is unpublished successfully.");
    }

    public function search(Request $request){
//        return $request;
        $searchKey = $request->searchterm;
        $wallpapers = Wallpaper::where("wallpaper_name","LIKE","%$searchKey%")->paginate(5);

        return view("wallpaper.search",compact("wallpapers"));
    }


}
