@extends('layouts.app')

@section("content")
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route("wallpapers.index") }}">Wallpapers</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Wallpaper</li>
    </x-bread-crumb>

    <form action="{{ route("wallpapers.store") }}" id="wallpaper-form" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
        @csrf

        <section class="content animated fadeInRight">
            <div class="card card-info">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Wallpaper Information</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Wallpaper Name
                                </label>

                                <input type="text" name="wallpaper_name" value="{{ old("wallpaper_name") }}" class="form-control form-control-sm" placeholder="Wallpaper Name" id="wallpaper_name">
                                <x-form-error name="wallpaper_name"></x-form-error>

                            </div>


                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Wallpaper Types
                                </label>

                                <select class="form-control" name="types" id="types">
                                    <option value="">Select Wallpaper Types</option>
                                    <option value="1" @if (old("types") == "1") selected="selected" @endif>Free</option>
                                    <option value="2" @if (old("types") == "2") selected="selected" @endif>Premium</option>
                                </select>
                                <x-form-error name="types"></x-form-error>

                            </div>

                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Wallpaper Point
                                </label>
                                <input type="text" name="point" value="{{ old("point") }}" class="form-control form-control-sm" placeholder="Wallpaper Point" id="point">
                                <x-form-error name="point"></x-form-error>
                            </div>

                            <label>
                                <span style="font-size: 17px; color: red;">*</span>
                                Wallpaper File Upload
                            </label>
                            <div class="form-group" style="padding-top: 30px;">
                                <div>
                                    <label>
                                        <input type="radio" name="wallpaperRadio" value="is_wallpaper">
                                        Wallpaper
                                    </label>
                                    <label class="pull-right"><input type="radio" name="wallpaperRadio" value="is_video_wallpaper"> Video Wallpaper </label>

                                </div>

                                <div class="is_wallpaper box" style="display: none;">


                                    <div class="form-group">

                                        <label>
                                            <span style="font-size: 17px; color: red;">*</span>
                                            Wallpaper Image
                                        </label>

                                        <br>

                                        <input class="btn btn-sm" type="file" id="images1" name="images1">
                                        <input type="hidden" name="is_gif" id="is_gif">
                                        <x-form-error name="images1"></x-form-error>

                                    </div>


                                </div>


                                <div class="is_video_wallpaper box" style="display: none;">

                                    <div class="form-group">
                                        <label>
                                            <span style="font-size: 17px; color: red;">*</span>
                                            Video Upload
                                        </label>

                                        <br>

                                        <input type="file" class="btn btn-sm" accept=".flv,.f4v,.f4p,.mp4" name="video" id="video">

                                    </div>


                                    <div class="form-group">

                                        <label>
                                            <span style="font-size: 17px; color: red;">*</span>
                                            Video Icon											<a href="#" class="tooltip-ps" data-toggle="tooltip" title="video_icon_tooltips">
												<span class="glyphicon glyphicon-info-sign menu-icon">
											</span></a>
                                        </label>

                                        <br>

                                        <input class="btn btn-sm" type="file" id="icon" name="icon">
                                        <!-- <input type="hidden" name="is_gif" id="is_gif"> -->
                                    </div>


                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Category Name
                                </label>

                                <select name="cat_id" class="form-control form-control-sm mr-3" id="cat_id">
                                    <option value="">Select Category Name</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if (old("cat_id") == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                <x-form-error name="cat_id"></x-form-error>


                            </div>

                            <div class="form-group">
                                <label>
                                    Select Color						</label>

                                <select name="color_id" class="form-control form-control-sm mr-3" id="color_id">
                                    <option value="">Select Color</option>
                                    @foreach($colors as $color)
                                        <option value="{{ $color->id }}" @if (old("color_id") == $color->id) selected="selected" @endif>{{ $color->name }}</option>
                                    @endforeach
                                </select>
                                <x-form-error name="color_id"></x-form-error>


                            </div>

                            <div class="form-group">
                                <label>
                                    Wallpaper Search Tags							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="Wallpaper Search Tags">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>

                                <input type="text" name="wallpaper_search_tags" value="" class="form-control form-control-sm" placeholder="Wallpaper Search Tags" id="wallpaper_search_tags">

                            </div>

                            <div class="form-group">
                                <label>
                                    Credit
                                    <a href="#" class="tooltip-ps" data-toggle="tooltip" title="Wallpaper Search Tags">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>

                                <input type="text" name="credit" value="" class="form-control form-control-sm" placeholder="Credit" id="credit">

                            </div>

                            <div class="form-group">
                                <div class="form-check">

                                    <label class="form-check-label">

                                        <input type="checkbox" name="wallpaper_is_published" value="accept" id="wallpaper_is_published" class="form-check-input">

                                        Is wallpaper published?
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">

                                    <label class="form-check-label">

                                        <input type="checkbox" name="is_recommended" value="accept" id="is_recommended" class="form-check-input">

                                        Is wallpaper recommended?
                                    </label>
                                </div>
                            </div><br>

                            <div class="form-group">
                                <label>Wallpaper Modes</label>
                            </div>
                            <br><br>

                            <div class="form-group">
                                <label> <span style="font-size: 17px; color: red;"></span>
                                    Product Dynamic Link :
                                </label>
                            </div>
                            <br><br>


                        </div>
                        <!--  col-md-6  -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->

                <input type="hidden" id="is_recommended_stage" name="is_recommended_stage" value="">

                <div class="card-footer">
                    <button type="submit" value="submit" name="submit" class="btn btn-sm btn-primary">
                        Save
                    </button>

                    <a href="{{ route("wallpapers.index") }}" class="btn btn-sm btn-primary">
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
        $("#types").change(function() {
            if (this.value == 1) { //3rd radiobutton
                $("#point").attr("disabled", "disabled");
                $("#point").val(0);
            } else {
                $("#point").removeAttr("disabled");
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
    </script>

@endsection
