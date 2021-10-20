@extends('layouts.app')

@section("content")
    <div class="col-12 col-md-12 main teamps-sidebar-push" style="height: auto !important; min-height: 0px !important;">

        <x-bread-crumb>

            <li class="breadcrumb-item"><a href="#">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>

        </x-bread-crumb>

        <x-session-message></x-session-message>

        <form action="{{ route("profile.update") }}" id="user-form" method="post" accept-charset="utf-8" novalidate="novalidate">
            @csrf

            <div class="row animated fadeInRight">
                <div class="col-6">
                    <div class="form-group">
                        <label>User Name</label>

                        <input type="text" name="name" value="{{ old("name",$user->name) }}" class="form-control form-control-sm" placeholder="Name" id="name">
                        <x-form-error name="name"></x-form-error>

                    </div>

                    <div class="form-group">
                        <label>Email</label>

                        <input type="text" name="email" value="{{ old("email",auth()->user()->email) }}" class="form-control form-control-sm valid" placeholder="Email" id="user_email">
                        <x-form-error name="email"></x-form-error>


                    </div>


                    <div class="form-group">
                        <label>Current Password</label>

                        <input type="password" name="curr_password" value="" class="form-control form-control-sm" placeholder="Password" id="user_password">
                        <x-form-error name="curr_password"></x-form-error>

                    </div>

                    <div class="form-group">
                        <label>New Password</label>

                        <input type="password" name="new_password" value="" class="form-control form-control-sm" placeholder="Password" id="user_password">
                        <x-form-error name="new_password"></x-form-error>


                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>

                        <input type="password" name="con_password" value="" class="form-control form-control-sm" placeholder="Conf Password" id="conf_password">
                        <x-form-error name="con_password"></x-form-error>


                    </div>


                    <div class="form-group">
                        <label>
                            Profile Image
                        </label>
                        <div class="btn btn-sm btn-primary btn-upload pull-right" data-toggle="modal" data-target="#uploadProfile">
                            Replace Photo
                        </div>
                    </div>




                    <hr>

                    <div class="row">


                        <div class="col-md-4" style="height:100">

                            <div class="thumbnail">
                                <img src="{{ empty($user->photo) ? asset('dashboard/img/default.jpg') : asset('storage/profile/'.$user->photo) }}" width="150px">

                                <br>

                                <p class="text-center">

                                    <a data-toggle="modal" data-target="#deletePhoto" class="delete-img" id="" image="">
                                        Remove
                                    </a>
                                </p>

                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <div class="my-3">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                <a href="{{ route("profile.edit") }}" class="btn btn-sm btn-primary">Cancel</a>
            </div>

        </form>
        <div class="modal fade"  id="uploadProfile">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">Upload Photo</h4>

                        <button class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>

                    </div>

                    <form action="{{ route("profile.updatePhoto") }}" id="form-model" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">

                            <label class="form-control-label">Upload Photo</label>

                            <br/>

                            <input type="file" name="photo">

                        </div>

                    </div>

                    <div class="modal-footer">

                        <input type="submit" value="Upload" form="form-model" class="btn btn-sm btn-primary"/>

                        <a href='#' class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</a>

                    </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

@endsection
