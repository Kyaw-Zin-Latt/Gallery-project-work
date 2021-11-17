@extends('layouts.app')

@section("content")
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route("user-manager.index") }}">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add New User</li>
    </x-bread-crumb>


    <form action="{{ route("user-manager.store") }}" id="category-form" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">

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
                                    User Name							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="cat_name_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>

                                <input type="text" name="name" value="" class="form-control form-control-sm @error("name") is-invalid @enderror" placeholder="User Name">
                                @error("name")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Email							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="cat_name_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>

                                <input type="email" name="email" value="" class="form-control form-control-sm @error("email") is-invalid @enderror" placeholder="Email">
                                @error("email")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Password							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="cat_name_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>

                                <input type="password" name="password" value="" class="form-control form-control-sm @error("password") is-invalid @enderror" placeholder="Password">
                                @error("password")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Confirm Password							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="cat_name_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>

                                <input type="password" name="cPassword" value="" class="form-control form-control-sm @error("cPassword") is-invalid @enderror" placeholder="Confirm Password" id="cat_name">
                                @error("cPassword")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Role							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="cat_name_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>

                                <select name="role_id" id="" class="form-control form-control-sm">
                                    @foreach($roles as $role)
                                        @if($role->role_id != 1)
                                            <option value="{{ $role->role_id }}">{{ $role->role_desc }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error("role_id")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>


                        </div>

                        <div class="col-md-6" style="padding-left: 50px;">


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
