<?php

namespace App\Http\Controllers;

use App\Models\BackendConfig;
use Illuminate\Http\Request;

class BackendConfigController extends Controller
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
     * @param  \App\Models\BackendConfig  $backendConfig
     * @return \Illuminate\Http\Response
     */
    public function show(BackendConfig $backendConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendConfig  $backendConfig
     * @return \Illuminate\Http\Response
     */
    public function edit(BackendConfig $backendConfig)
    {
        return view("backend_config.edit",compact("backendConfig"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendConfig  $backendConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendConfig $backendConfig)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendConfig  $backendConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackendConfig $backendConfig)
    {
        //
    }
}
