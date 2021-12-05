<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use LVR\Colour\Hex;

class ColorApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::latest("id")->get();
        return response($colors,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(),[
            "title" => "required|min:3|unique:colors,name",
            "code" => ['required', new Hex],
        ]);
        if ($v->fails()) {
            return response($v->errors(),400);
        }

        $color = new Color();
        $color->id = "color".uniqid();
        $color->name = $request->title;
        $color->code = $request->code;
        $color->save();

        return response($color,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        return response($color,200);
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
//        return $color->id;

        $v = Validator::make($request->all(),[
            "title" => "required|min:3|unique:colors,name,".$color->id,
            "code" => ['required', new Hex],
        ]);

        if ($v->fails()) {
            return response($v->errors(),404);
        }

        $color->name = $request->title;
        $color->code = $request->code;
        $color->update();

        return response($color,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $result = $color->delete();
        if ($result) {
            return [
                "result" => "$color->name is deleted successfully",
            ];
        }
        return [
            "result" => "failed",
        ];

    }
}
