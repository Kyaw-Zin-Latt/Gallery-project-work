<?php

namespace App\Http\Controllers;

use App\Models\AboutAndSetting;
use Illuminate\Http\Request;

class AboutAndSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $aboutAndSettings = AboutAndSetting::all();
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
     * @param  \App\Models\AboutAndSetting  $aboutAndSetting
     * @return \Illuminate\Http\Response
     */
    public function show(AboutAndSetting $aboutAndSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutAndSetting  $aboutAndSetting
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $abouts = AboutAndSetting::first();
        return view("about.edit",compact('abouts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutAndSetting  $aboutAndSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        return $request;
//        return $about;

        $request->validate([
            "title" => "required|min:4",
            "description" => "required|min:10",
            "GDPR" => "min:4",
            "email" => "required|email:rfc,dns",
            "phone" => "required|numeric",
            "website" => "required|url",
            "upload_point" => "required|numeric|min:1",
            "facebook" => "required|url",
            "google_plus" => "required|url",
            "instagram" => "required|url",
            "youtube" => "required|url",
            "pinterest" => "required|url",
            "twitter" => "required|url",
        ]);
        $abouts = AboutAndSetting::find($request->about_id);
        $abouts->about_id = $request->about_id;
        $abouts->about_title = $request->title;
        $abouts->about_description = $request->description;
        $abouts->GDPR = $request->GDPR;
        $abouts->about_email = $request->email;
        $abouts->about_phone = $request->phone;
        $abouts->about_website = $request->website;
        $abouts->upload_point = $request->upload_point;
        $abouts->facebook = $request->facebook;
        $abouts->google_plus = $request->google_plus;
        $abouts->instagram = $request->instagram;
        $abouts->youtube = $request->youtube;
        $abouts->pinterest = $request->pinterest;
        $abouts->twitter = $request->twitter;
        $abouts->update();

        return redirect()->route("abouts.edit",$abouts->about_id)->with("message","About is successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutAndSetting  $aboutAndSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutAndSetting $aboutAndSetting)
    {
        //
    }
}
