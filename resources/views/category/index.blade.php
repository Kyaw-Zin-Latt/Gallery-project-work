@extends('layouts.app')

@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Categories</li>
    </x-bread-crumb>

    <div class="row my-3">

        <div class="col-9">
            <form action="http://localhost:8000/index.php/admin/categories/search" class="form-inline" method="post" accept-charset="utf-8">
                <input type="hidden" name="csrf_test_name" value="dfe15d09970ce871b5d7520449c567fa">

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
        @if(session("message"))
            <p class="alert alert-success">
                {{ session("message") }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </p>
        @endif
        @if(session("error"))
            <p class="alert alert-danger">
                {{ session("error") }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </p>
        @endif
        <x-error-message name="id"></x-error-message>
    </div>

    <br>
{{--    table start--}}

    <div class="card" style="height: auto !important;">
        <div class="table-responsive animated fadeInRight">
            <table class="table m-0 table-striped">
                <tbody>

                <tr>
                    <th>No</th>
                    <th>Category Name</th>
{{--                    <th>Category Cover Photo</th>--}}
{{--                    <th>Wallpaper Count</th>--}}
                    <th><span class="th-title">Edit</span></th>
                    <th><span class="th-title">Delete</span></th>
                    <th><span class="th-title">Publish</span></th>
                </tr>

                @forelse($categories as $cateogry)
                    <tr>
                        <td>{{ $cateogry->id }}</td>
                        <td>{{ $cateogry->title }}</td>
{{--                        <td><img src="http://localhost:8000/uploads//thumbnail/animals_icon.png"></td>--}}
{{--                        --}}{{--                    <td>36</td>--}}
                        <td>
                            <a href="http://localhost:8000/index.php/admin/categories/edit/cata1c23f38c148f8ad46a16da94aefc613">
                                <i style="font-size: 18px;" class="fa fa-pencil-square-o"></i>
                            </a>
                        </td>
                        <td>
                            <a herf="#" class="btn-delete" data-toggle="modal" data-target="#myModal" id="cata1c23f38c148f8ad46a16da94aefc613">
                                <i style="font-size: 18px;" class="fa fa-trash-o"></i>
                            </a>
                        </td>
                        <td>
                            @if($cateogry->is_publish == 0)
                                <form action="{{ route("category.publish") }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $cateogry->id }}">
                                    <button class="btn btn-sm btn-danger">
                                        No
                                    </button>
                                </form>
                            @else
                                <form action="{{ route("category.unPublish") }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $cateogry->id }}">
                                    <button class="btn btn-sm btn-success">
                                        Yes
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>

                @empty
                    <td colspan="6">There is no Category yet.</td>
                @endforelse

                </tbody>
            </table>
        </div>

    </div>

{{--    table end--}}

@endsection
