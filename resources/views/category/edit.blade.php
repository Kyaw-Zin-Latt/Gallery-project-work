@extends('layouts.app')

@section("title") PS Wallpaper|Categories|Category Edit @endsection

@section("content")
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route("category.index") }}">Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
    </x-bread-crumb>


    <form action="{{ route("category.update",$category->id) }}" id="category-form" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
        @method("put")
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
                                    Category Name
                                    <a href="#" class="tooltip-ps" data-toggle="tooltip" title="cat_name_tooltips">
								        <span class="glyphicon glyphicon-info-sign menu-icon"></span>
                                    </a>
                                </label>

                                <input type="text" name="title" value="{{ old("title",$category->title) }}" class="form-control form-control-sm @error("title") is-invalid @enderror" placeholder="Category Name" id="cat_name">
                                @error("title")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6" style="padding-left: 50px;">
                            <span style="font-size: 17px; color: red;">*</span>
                            <label>Category Cover Photo
                                <a href="#" class="tooltip-ps" data-toggle="tooltip" title="cat_photo_tooltips">
								    <span class="glyphicon glyphicon-info-sign menu-icon"></span>
                                </a>
                            </label>

                            <div class="btn btn-sm btn-primary btn-upload pull-right" data-toggle="modal" data-target="#uploadImage">
                                Replace Photo
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-4" style="height:100">
                                    <div class="thumbnail">
                                        @foreach($photos as $p)

                                            @if($p->img_type == "category" && $category->id == $p->parent_id)
                                                <img width="150px" class="rounded" src="{{ asset("storage/category/cover/".$p->photo) }}">
                                            @endif
                                        @endforeach

                                        <br>

                                        <p class="text-center">
                                            <a data-toggle="modal" data-target="#deletePhoto" class="delete-img" id="img2acaaf0c8302c3c15d513d24d61df24a" image="a80.jpg">
                                                Remove
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <!-- End Category cover photo -->
                            <span style="font-size: 17px; color: red;">*</span>
                            <label>Category Icon</label>
                            <div class="btn btn-sm btn-primary btn-upload pull-right" data-toggle="modal" data-target="#uploadIcon">
                                Replace Icon
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-4" style="height:100">

                                    <div class="thumbnail">

                                        @foreach($photos as $p)
                                            @if($p->img_type == "category-icon" && $category->id == $p->parent_id)
                                                <img width="150px" class="rounded" src="{{ asset("storage/category/icon/".$p->photo) }}">
                                            @endif
                                        @endforeach

                                        <br>

                                        <p class="text-center">

                                            <a data-toggle="modal" data-target="#deletePhoto" class="delete-img" id="img635dda42472fc11ff006cadcd9590d98" image="animals_icon.png">
                                                Remove
                                            </a>
                                        </p>

                                    </div>
                                </div>
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

                    <a href="{{ route("category.index") }}" class="btn btn-sm btn-primary">
                        Cancel
                    </a>
                </div>

            </div>
            <!-- card info -->
        </section>

    </form>

    @foreach($photos as $p)
        @if($p->img_type == "category-icon")
            <x-photo-upload name="icon" id="uploadIcon" formId="icon" link="{{ route('photo.update',$p->id) }}"></x-photo-upload>
        @else
            <x-photo-upload name="cover" id="uploadImage" formId="cover" link="{{ route('photo.update',$p->id) }}"></x-photo-upload>
        @endif
    @endforeach



@endsection
