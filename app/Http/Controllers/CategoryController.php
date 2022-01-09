<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Nexmo\Laravel\Facade\Nexmo;

class CategoryController extends Controller
{
    public function sms()
    {

        Nexmo::message()->send([
            'to' => '+959773926994',
            'from' => '+959773015042',
            'text' => "Min Ga Lar Par",
        ]);

        echo "Sended";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with("photo")->latest()->paginate(5);

        return view("category.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("category.create");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|min:3|unique:categories,title" ,
            "cover" => "required|mimes:jpg,png|file",
            "icon" => "required|mimes:jpg,png|file",
        ]);

//        return getimagesize($request->cover);

        $category = new Category();
        $category->id = "cat".uniqid();
        $category->title = $request->title;
        $category->save();

        $coverDir = "/public/category/cover";
        $iconDir = "/public/category/icon";

        $coverNewFileName = uniqid()."_cover.".$request->file("cover")->getClientOriginalExtension();
        $iconNewFileName = uniqid()."_icon.".$request->file("icon")->getClientOriginalExtension();

        $request->file("cover")->storeAs($coverDir,$coverNewFileName);
        $request->file("icon")->storeAs($iconDir,$iconNewFileName);



        if (isset($request->icon)){
            $photo = new Photo();
            $photo->id = "img".uniqid();
            $photo->parent_id = $category->id;
            $photo->img_type = "category-icon";
            $photo->photo = $iconNewFileName;
            $photo->img_width = getimagesize($request->icon)[0];
            $photo->img_height = getimagesize($request->icon)[1];
            $photo->save();
        }

        if (isset($request->cover)){
            $photo = new Photo();
            $photo->id = "img".uniqid();
            $photo->parent_id = $category->id;
            $photo->img_type = "category";
            $photo->photo = $coverNewFileName;
            $photo->img_width = getimagesize($request->cover)[0];
            $photo->img_height = getimagesize($request->cover)[1];
            $photo->save();
        }

        return redirect()->route("category.index")->with("message",["icon"=>"success","title"=>"Category is added successfully."]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("category.edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "title" => "required|min:3|unique:categories,title,".$category->id,
        ]);

        $category->title = $request->title;
        $category->update();

        return redirect()->route("category.index")->with("message",["icon"=>"success","title"=>"Category is updated successfully."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        if ($category->photo){

            foreach ($category->photo as $p){
                if ($p->img_type == "category"){
                    $coverDir = "/public/category/cover";
                    Storage::delete($coverDir.$p->photo);
                }

                if($p->img_type == "category-icon"){
                    $iconDir = "/public/category/icon";
                    Storage::delete($iconDir.$p->photo);
                }
            }

            $toDel = $category->photo->pluck("id");
            Photo::destroy($toDel);

            $title = $category->title;
            $category->delete();

            return redirect()->route("category.index")->with("message",["icon"=>"success","title"=>"$title is deleted Successfully."]);

        }




        return $category;
    }

    public function publish(Request $request){

        $request->validate([

            "id" => "exists:categories,id"

        ]);

        $category = Category::find($request->id);
        $category->is_publish = 1;
        $category->update();

        return response([
            "status" => "success",
            "info" => $category,
            "icon" => "success",
            "title" => "Category is published successfully."
        ]);

//        if ($category->update()){
//            return redirect()->route("category.index")->with("message",["icon"=>"success","title"=>"Category is published successfully."]);
//        }else{
//            return redirect()->route("category.index")->with("error","Category is published unsuccessfully.");
//        }


    }

    public function unPublish(Request $request){
        $category = Category::find($request->id);
//        return $category;

        $category->is_publish = 0;
        $category->update();

        return response([
            "status" => "success",
            "info" => $category,
            "icon" => "success",
            "title" => "Category is Unpublished successfully."
        ]);

//        return redirect()->route("category.index")->with("message",["icon"=>"success","title"=>"Category is unpublished successfully."]);
    }

    public function search(Request $request){

//        DB::enableQueryLog();
        $searchKey = $request->searchterm;
        $status = $request->status;


        if(!empty($searchKey) && empty($status)) {
            $categories = Category::where("title","LIKE","%$searchKey%")->paginate(5);
        }

        if (($status == 0 || $status == 1) && empty($searchKey)) {
            $categories = Category::where("is_publish","=",$status)->paginate(5);
        }

        if (!empty($searchKey) && (!empty($status) || $status == 0)) {
            $categories = Category::where("title","LIKE","%$searchKey%")->where("is_publish","=",$status)->paginate(5);
        }

//        dd(DB::getQueryLog());

        return view("category.search",compact("categories"));
    }
}
