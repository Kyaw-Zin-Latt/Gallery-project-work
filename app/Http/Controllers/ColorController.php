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

        return redirect()->route("color.index")->with("message",["icon"=>"success","title"=>"Color is added successfully."]);
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

        return redirect()->route("color.index")->with("message",["icon"=>"success","title"=>"Color is updated successfully."]);
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

        return redirect()->route("color.index")->with("message",["icon"=>"success","title"=>"$title color is deleted successfully."]);

    }

    public function search(Request $request){

//        return $request;

//        if (!empty($request->order_by) && empty($request)) {
//            $colors = Color::orderBy('name',$request->order_by)->paginate(10);
////            return $colors;
//        } elseif (isset($request->order_by) && isset($request->searchterm)) {
//            $colors = Color::where("name","LIKE","%$request->searchterm%")->orderBy('name',$request->order_by)->paginate(10);
//        } elseif (isset($request->searchterm) && empty($request->order_by)) {
//            $colors = Color::where("name","LIKE","%$request->searchterm%")->paginate(10);
//        }

        $searchKey = $request->get("searchterm");

        $colors = Color::latest("id")->where("name","LIKE","%$searchKey%")->paginate(10);

        $table_row = $colors->count();

        $output = "" ;
        if($table_row > 0) {

            foreach ($colors as $color) {
                $output .= '

                <tr>

                    <td>1</td>
                    <td>'. $color->name .'</td>
                    <td>'. $color->code .'</td>
                     <td>
                        <div style="width: 30px; height: 30px; background-color: '.$color->code.'; border-radius: 50%"></div>
                    </td>
                    <td>
                        <a href="{{ route(\'color.edit\',$color->id) }}" >
                            <i style="font-size: 18px;" class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route(\'color.destroy\',$color->id) }}" id="{{ $color->id }}" class="btn-delete" data-toggle="modal" data-target="#myModal">
                            <i style="font-size: 18px;"  class="fa fa-trash-o"></i>
                        </a>

                    </td>

                </tr>

                ';
            }

        } else {

            $output = '

             <td colspan="6" class="text-center font-weight-bold h5">There is no Color yet.</td>

            ';

        }


        $data = array(
            'table_data' => $output,
        );

        return json_encode($data);

//        return view("color.index",compact('colors'));
    }
}
