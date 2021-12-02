@extends('layouts.app')

@section("title") PS Wallpaper|Colors @endsection


@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Colors</li>
    </x-bread-crumb>

    <div class="row my-3">

        <div class="col-9">
            <div class="form-row">
                <div class="form-group col-3">

                    <input id="searchterm" type="text" class="form-control form-control-sm" placeholder="Search">

                </div>

                <div class="form-group col-3">

                    <select name="order_by" class="form-control form-control-sm" id="order_by">
                        <option value="">Select Order</option>
                        <option value="ASC">Name Ascending</option>
                        <option value="DESC">Name Descending</option>
                    </select>

                </div>
            </div>
        </div>


        <div class="col-3">
            <a href="{{ route("color.create") }}" class="btn btn-sm btn-primary pull-right">
                <span class="fa fa-plus"></span>
                Add Color
            </a>
        </div>

    </div>

    <div class="">
        <x-session-message></x-session-message>
        <x-error-message name="id"></x-error-message>
    </div>

    <br>
    {{--    table start--}}

    @include("color.list")

    {{--    table end--}}


@endsection
@section("foot")



@endsection
