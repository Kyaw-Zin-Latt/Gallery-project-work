@extends('layouts.app')

@section("content")
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route("category.index") }}">Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Category</li>
    </x-bread-crumb>


    <form action="{{ route("category.store") }}" id="category-form" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">

        @csrf
        <section class="content animated fadeInRight">
            <div class="card card-info">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Category Information</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Category Name							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="cat_name_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>

                                <input type="text" name="title" value="" class="form-control form-control-sm @error("title") is-invalid @enderror" placeholder="Category Name" id="cat_name">
                                @error("title")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6" style="padding-left: 50px;">

                            <div class="form-group">
                                <span style="font-size: 17px; color: red;">*</span>
                                <label>Category Cover Photo
                                    <a href="#" class="tooltip-ps" data-toggle="tooltip" title="cat_photo_tooltips">
                                        <span class="glyphicon glyphicon-info-sign menu-icon">
                                        </span>
                                    </a>
                                </label>

                                <br>

                                <input class="btn btn-sm @error("cover") is-invalid @enderror" type="file" name="cover" id="cover">
                                <br>
                                @error("cover")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- End Category cover photo -->

                            <div class="form-group">
                                <span style="font-size: 17px; color: red;">*</span>
                                <label>
                                    Category Icon
                                </label>

                                <br>

                                <input class="btn btn-sm @error("icon") is-invalid @enderror" type="file" name="icon" id="icon">
                                <br>
                                @error("icon")
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
                        Save
                    </button>

                    <a href="{{ route("category.index") }}" class="btn btn-sm btn-primary">
                        Cancel
                    </a>
                </div>

            </div>
            <!-- card info -->
        </section>





    </form>

@endsection
