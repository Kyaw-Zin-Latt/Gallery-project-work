<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use LVR\Colour\Hex;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::latest("id")->paginate(10);
        return view("color.index",compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("color.create");
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

            "title" => "required|min:3|unique:colors,name",
            "code" => ['required', new Hex],

        ]);

        $color = new Color();
        $color->id = "color".uniqid();
        $color->name = $request->title;
        $color->code = $request->code;
        $color->save();

        return redirect()->route("color.index")->with("message","Color is added successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view("color.edit",compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $request->validate([

            "title" => "required|min:3|unique:colors,name,".$color->id,
            "code" => ['required', new Hex],

        ]);


        $color->name = $request->title;
        $color->code = $request->code;
        $color->update();

        return redirect()->route("color.index")->with("message","Color is updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $title = $color->name;
        $color->delete();

        return redirect()->route("color.index")->with("message","$title color is deleted successfully.");

    }

    public function search(Request $request){

        $colors = Color::where("name","LIKE","%$request->searchterm%")->paginate(10);

        return view("color.search",compact('colors'));
    }
}
