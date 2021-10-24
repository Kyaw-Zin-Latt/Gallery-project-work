@extends('layouts.app')

@section("title") PS Wallpaper|Abouts|About App @endsection

@section("content")
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route("versions.edit",$version->id) }}">Versions</a></li>
        <li class="breadcrumb-item active" aria-current="page">Version</li>
    </x-bread-crumb>

    <x-session-message></x-session-message>

    <form action="{{ route("versions.update",$version->id) }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        @csrf
        @method("put")
        <section class="content animated fadeInRight">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Version Information</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> <span style="font-size: 17px; color: red;">*</span>
                                    Version No								<a href="#" class="tooltip-ps" data-toggle="tooltip" title="name_tooltips">
									<span class="glyphicon glyphicon-info-sign menu-icon">
								</span></a>
                                </label>

                                <input type="text" name="version_no" value="{{ old("version_no",$version->version_no) }}" class="form-control form-control-sm" placeholder="Version No" id="version_no">
                            </div>

                            <div class="form-group">
                                <label> <span style="font-size: 17px; color: red;">*</span>
                                    Version Message								<a href="#" class="tooltip-ps" data-toggle="tooltip" title="about_description_tooltips">
									<span class="glyphicon glyphicon-info-sign menu-icon">
								</span></a>
                                </label>
                                <textarea class="form-control" name="version_message" placeholder="Version Message" rows="5">{{ old("version_message",$version->version_message) }}</textarea>
                            </div>

                        </div>

                        <div class="col-md-6" style="padding-left: 50px;">
                            <div class="form-group">
                                <label> <span style="font-size: 17px; color: red;">*</span>
                                    Version Title								<a href="#" class="tooltip-ps" data-toggle="tooltip" title="Version Title">
									<span class="glyphicon glyphicon-info-sign menu-icon">
								</span></a>
                                </label>

                                <input type="text" name="version_title" value="{{ old("version_title",$version->version_title) }}" class="form-control form-control-sm" placeholder="Version Title" id="version_title">
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="version_force_update" value="unAccept" id="version_force_update" class="form-check-input" {{ $version->version_force_update == 1 ? "checked" : "" }}>
                                        Version Force Update?
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="version_need_clear_data" id="version_need_clear_data" class="form-check-input" {{ $version->version_need_clear_data == 1 ? "checked" : "" }}>

                                        Version Need Clear Data?
                                    </label>
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
                        Save
                    </button>
                    <a href="{{ route("versions.edit",$version->id) }}" class="btn btn-sm btn-primary">
                        Cancel
                    </a>
                </div>

            </div>
            <!-- card info -->
        </section>

    </form>




@endsection
