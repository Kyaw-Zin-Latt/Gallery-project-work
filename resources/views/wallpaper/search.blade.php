@extends('layouts.app')

@section("title") PS Wallpaper|Wallpapers @endsection


@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Wallpapers</li>
    </x-bread-crumb>



    <div class="row my-3">
        <div class="col-12">
            <form action="{{ route("wallpapers.search") }}" method="get">
                <div class="row my-3">
                    <div class="form-inline">
                        <div class="form-group">

                            <input type="text" name="searchterm" value="{{ Request()->searchterm }}" class="form-control form-control-sm mr-3" placeholder="Search">

                        </div>

                    </div>
                    <div class="form-inline">


                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">
                                Search
                            </button>
                        </div>

                        <div class="row">
                            <div class="form-group ml-3">
                                <a href="{{ route("wallpapers.index") }}" class="btn btn-sm btn-primary">
                                    Reset
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-9">

        </div>
        <div class="col-3">
            <a href="{{ route("wallpapers.create") }}" class="btn btn-sm btn-primary pull-right">
                <span class="fa fa-plus"></span>
                Add Wallpaper
            </a>
        </div>

    </div>

    <div class="">
        <x-session-message></x-session-message>
        <x-error-message name="id"></x-error-message>
    </div>

    <br>
    {{--    table start--}}

    @include("wallpaper.list")

    {{--    table end--}}


@endsection
