@extends('layouts.app')

@section("title") PS Wallpaper|Abouts|About App @endsection

@section("content")
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Backend Setting</li>
    </x-bread-crumb>

    <x-session-message></x-session-message>

    <form action="{{ route("backend_configs.update",$backend->id) }}" method="post" enctype="multipart/form-data">
        <h4>Image Section</h4>
        <div class="row">
            <div class="col-md-6">
                <label>Backend Logo</label>
                <div class="btn btn-sm btn-primary btn-upload pull-right" data-toggle="modal" data-target="#uploadlogo">
                    Replace Photo
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-4" style="height:100">
                        <div class="thumbnail">
                            @foreach($photos as $p)
                                @if($p->img_type == "logo")
                                    <img src="{{ asset('storage/backend/logo/'.$p->photo) }}" width="100px" alt="">
                                @endif
                            @endforeach
                            <br>
                            <p class="text-center">
                                <a data-toggle="modal" data-target="#deletePhoto" class="delete-img" id="img7e34001b7ddd924ae80761c19d2727e0" image="9-hl-afp_82.jpg">
                                    Remove
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End nav icon -->
            </div>
            <div class="col-md-6">

                <label>Backend Fav Ico</label>

                <div class="btn btn-sm btn-primary btn-upload pull-right" data-toggle="modal" data-target="#uploadFav">
                    Replace Photo
                </div>

                <hr>

                <div class="row">
                    @foreach($photos as $p)
                        @if($p->img_type == "favicon")
                        <img class="rounded" src="{{ asset("storage/backend/favicon/".$p->photo) }}" alt="" width="200px">
                        @endif
                    @endforeach
                </div>




                <!-- End fav icon -->


                <label>Backend Login Background Image</label>
                <div class="btn btn-sm btn-primary btn-upload pull-right" data-toggle="modal" data-target="#uploadImage">
                    Replace Photo
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-4" style="height:100">
                        <div class="thumbnail">
                            @foreach($photos as $p)
                                @if($p->img_type == "login-bg")
                                    <img class="rounded" src="{{ asset("storage/backend/login_bg/".$p->photo) }}" alt="" width="200px">
                                @endif
                            @endforeach
                            <br>
                            <p class="text-center">
                                <a data-toggle="modal" data-target="#deletePhoto" class="delete-img" id="img678da5d7fa0d49ac530ce66a81c96398" image="login_background.png">
                                    Remove
                                </a>
                            </p>
                        </div>
                    </div>

                </div>
                <!-- login image -->
            </div>
        </div>

    </form>





    @foreach($photos as $p)
        @if($p->img_type == "favicon")
            <x-photo-upload name="favicon" id="uploadFav" formId="fav-photo" link="{{ route('photo.update',$p->id) }}"></x-photo-upload>
        @elseif($p->img_type == "login-bg")
            <x-photo-upload name="login_bg" id="uploadImage" formId="login-bg-photo" link="{{ route('photo.update',$p->id) }}"></x-photo-upload>
        @elseif($p->img_type == "logo")
            <x-photo-upload name="logo" id="uploadlogo" formId="logo-photo" link="{{ route('photo.update',$p->id) }}"></x-photo-upload>
        @endif
    @endforeach



@endsection
