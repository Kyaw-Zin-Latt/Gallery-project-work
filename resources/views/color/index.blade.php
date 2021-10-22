@extends('layouts.app')

@section("title") PS Wallpaper|Colors @endsection


@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Colors</li>
    </x-bread-crumb>

    <div class="row my-3">

        <div class="col-9">
            <form action="{{ route("color.search") }}" class="form-inline" method="get" accept-charset="utf-8">


                <div class="form-group mr-3">

                    <input type="text" name="searchterm" value="" class="form-control form-control-sm" placeholder="Search">

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



    {{--    table end--}}


@endsection
