@extends('layouts.app')

@section("content")
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route("wallpapers.index") }}">Wallpapers</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Wallpaper</li>
    </x-bread-crumb>

    <form action="http://localhost/pswallpapers-admin/index.php/admin/wallpapers/add" id="wallpaper-form" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
        <input type="hidden" name="csrf_test_name" value="ec63c441e8834701bfa7a47283a1c944">

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

                                <input type="text" name="wallpaper_name" value="" class="form-control form-control-sm" placeholder="Wallpaper Name" id="wallpaper_name">

                            </div>


                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Wallpaper Types
                                </label>

                                <select class="form-control" name="types" id="types">
                                    <option value="0">Select Wallpaper Types</option>
                                    <option value="1">Free</option>
                                    <option value="2">Premium</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Wallpaper Point
                                </label>
                                <input type="text" name="point" value="" class="form-control form-control-sm" placeholder="Wallpaper Point" id="point">
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
                                            Wallpaper Image											<a href="#" class="tooltip-ps" data-toggle="tooltip" title="Wallpaper Photo">
												<span class="glyphicon glyphicon-info-sign menu-icon">
											</span></a>
                                        </label>

                                        <br>

                                        <input class="btn btn-sm" type="file" id="images1" name="images1">
                                        <input type="hidden" name="is_gif" id="is_gif">
                                    </div>


                                </div>


                                <div class="is_video_wallpaper box" style="display: none;">

                                    <div class="form-group">
                                        <label>
                                            <span style="font-size: 17px; color: red;">*</span>
                                            Video Upload											<a href="#" class="tooltip-ps" data-toggle="tooltip" title="video_icon_tooltips">
												<span class="glyphicon glyphicon-info-sign menu-icon">
											</span></a>
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
                                    Category Name							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="cat_name_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>

                                <select name="cat_id" class="form-control form-control-sm mr-3" id="cat_id">
                                    <option value="0">Select Category Name</option>
                                    <option value="catff78e482420e87428dc99a8676cdb044">Experimental</option>
                                    <option value="catfde11761cfd0701b531e848cdbd9d319">Texture</option>
                                    <option value="cat8188f8fe18417862104bd75a040f3003">Nature</option>
                                    <option value="cat64f320906b56c350b8f550d4184eda25">Arts</option>
                                    <option value="catbe172b222a67ca6841a10f6e46520130">Fashion</option>
                                    <option value="cat8fc41fdbf43f915947e1c42e5fa4cd3c">Flowers</option>
                                    <option value="cat6e812d4794d2560427c584e0bb3d20ce">Travel</option>
                                    <option value="catb107b7089daa6c60291e2bedfdd14d2b">Business</option>
                                    <option value="cata1c23f38c148f8ad46a16da94aefc613">Animal</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label>
                                    Select Color						</label>

                                <select name="color_id" class="form-control form-control-sm mr-3" id="color_id">
                                    <option value="0">Select Color</option>
                                    <option value="color680fdd9a6d27c0fbe773e7e032aa9a15">sdfdfsf</option>
                                    <option value="color2a410de2eb2ad814b187630f35bbcf64">Gray</option>
                                    <option value="color4dbae180244cbc38bee88d28901f0262">Brown</option>
                                    <option value="colora33b2b3d5645a43ca001650f71cbe8e2">Blue-Violet</option>
                                    <option value="colorf39406c56c157377182925eb963a582d">Violet</option>
                                    <option value="color7085f4286925c2637e9bf56e3272ba38">Red</option>
                                    <option value="colord062947b5f674ecaab1b8ef38584ae5a">Blue</option>
                                    <option value="colorfd871fc57c1917f57983564f08fa5a9a">Orange</option>
                                    <option value="color73d7d90277ab57354cbe0e9499b6f6f6">Pink</option>
                                    <option value="color8a4cc832b57285200c9471f368757eb9">Black</option>
                                    <option value="color745b0bbc500d3db4ff7aeceaa22cb6b3">Green</option>
                                    <option value="colorce9fe9b577a47bbdeeedce1f73574f0b">White</option>
                                    <option value="color96b0e5b72ea9752aeff46ca8fd41ed7d">Yellow</option>
                                </select>

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
                                    Credit							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="Wallpaper Search Tags">
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
                                <label>Wallpaper Modes													</label>
                            </div><br><br>

                            <div class="form-group">
                                <label> <span style="font-size: 17px; color: red;"></span>
                                    Product Dynamic Link : 		              </label>
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
                        Save			</button>

                    <a href="http://localhost/pswallpapers-admin/index.php/admin/wallpapers" class="btn btn-sm btn-primary">
                        Cancel			</a>
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
