@extends('layouts.app')

@section("content")
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route("color.index") }}">Colors</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Color</li>
    </x-bread-crumb>


    <form action="{{ route("color.update",$color->id) }}" id="color-form" method="post" accept-charset="utf-8" novalidate="novalidate">
        @method("put")
        @csrf
        <section class="content animated fadeInRight">
            <div class="card card-info">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Color Information</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Color Name
                                    <a href="#" class="tooltip-ps" data-toggle="tooltip" title="cat_name_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>

                                <input type="text" name="title" value="{{ old("title",$color->name) }}" class="form-control form-control-sm @error("title") is-invalid @enderror" placeholder="Category Name" id="cat_name">
                                @error("title")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="">
                                    Color Code
                                    <a href="#" class="tooltip-ps" data-toggle="tooltip" title="Color Code">
                                        <span class="glyphicon glyphicon-info-sign menu-icon"></span>
                                    </a>
                                </label>
                                <div class="input-group my-colorpicker2 colorpicker-element">
                                    <input type="text" name="code" value="{{ old("code",$color->code) }}" class="form-control form-control-sm @error('code') is-invalid @enderror" placeholder="" id="code">
                                    <div class="input-group-addon"><i style="background-color: rgb(0, 0, 0);"></i></div>
                                </div>
                                @error("code")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!--  col-md-6  -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary">
                        Update
                    </button>

                    <a href="{{ route("color.index") }}" class="btn btn-sm btn-primary">
                        Cancel
                    </a>
                </div>

            </div>
            <!-- card info -->
        </section>

    </form>

@endsection

@section("foot")

    <script>

        $('.my-colorpicker2').colorpicker();

    </script>


@endsection
