@extends('layouts.app')

@section("title") PS Wallpaper|Categories|Search @endsection


@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route("category.index") }}">Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">Search</li>
    </x-bread-crumb>

    <div class="row my-3">

        <div class="col-9">
            <form action="{{ route("category.search") }}" class="form-inline" method="get" accept-charset="utf-8">


                <div class="form-group mr-3">

                    <input type="text" name="searchterm" value="{{ Request()->searchterm }}" class="form-control form-control-sm" placeholder="Search">

                </div>

                <div class="form-group mr-3">
                    <select name="status" class="form-control form-control-sm mr-3 ml-3" id="order_by">
                        <option value="">Select Status</option>
                        <option value="1" {{ Request()->status == 1 ? "selected" : "" }}>Publish</option>
                        <option value="0" {{ Request()->status == 0 ? "selected" : "" }}>UnPublish</option>
                    </select>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary">
                        Search
                    </button>
                </div>

                <div class="row">
                    <div class="form-group ml-3">
                        <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary">
                            Reset
                        </a>
                    </div>
                </div>

            </form>
        </div>

        <div class="col-3">
            <a href="{{ route("category.create") }}" class="btn btn-sm btn-primary pull-right">
                <span class="fa fa-plus"></span>
                Add Category
            </a>
        </div>

    </div>

    <div class="">
        <x-session-message></x-session-message>
        <x-error-message name="id"></x-error-message>
    </div>

    <br>
    {{--    table start--}}

    @include("category.list")

    {{--    table end--}}


@endsection
