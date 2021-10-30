<?php

namespace App\Http\Controllers;

use App\Models\Version;
use Illuminate\Http\Request;

class VersionController extends Controller
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
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function show(Version $version)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function edit(Version $version)
    {
        return view("version.edit",compact("version"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Version $version)
    {
//        return $request;
//        $request->validate([
//
//        ]);

        $version->version_no = $request->version_no;
        $version->version_message = $request->version_message;
        $version->version_title = $request->version_title;

        if ($request->version_force_update){
            $version->version_force_update = 1;
        }else{
            $version->version_force_update = 0;
        }

        if ($request->version_need_clear_data){
            $version->version_need_clear_data = 1;
        }else{
            $version->version_need_clear_data = 0;
        }
        $version->update();

        return redirect()->route("versions.edit",$version->id)->with("message","Version is successfully updated.");




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function destroy(Version $version)
    {
        //
    }
}
