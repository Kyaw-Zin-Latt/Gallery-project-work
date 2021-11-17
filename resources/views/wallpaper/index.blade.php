@extends('layouts.app')

@section("title") PS Wallpaper|Wallpapers @endsection


@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Wallpapers</li>
    </x-bread-crumb>



    <div class="row my-3">
        <div class="col-12">
            <form action="http://localhost/pswallpapers-admin/index.php/admin/wallpapers/search" id="search-form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <input type="hidden" name="csrf_test_name" value="ec63c441e8834701bfa7a47283a1c944">

                <div class="row my-3">
                    <div class="form-inline">
                        <div class="form-group">

                            <input type="text" name="searchterm" value="" class="form-control form-control-sm mr-3" placeholder="Search">

                        </div>

                        <div class="form-group">

                            <select name="cat_id" class="form-control form-control-sm mr-3" id="cat_id">
                                <option value="0">Search Category</option>
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

                            <select name="types" class="form-control form-control-sm mr-3" id="types">
                                <option value="0">Select Type</option>
                                <option value="1">Free</option>
                                <option value="2">Premium </option>
                            </select>

                        </div>

                        <div class="form-group">
                            <div class="form-check">

                                <label class="form-check-label">

                                    From Point :					<input type="number" name="point_min" value="" class="form-control form-control-sm mr-3 ml-2" placeholder="Form" pattern="^[0-9]*$">


                                    To Point :					<input type="number" name="point_max" value="" class="form-control form-control-sm mr-3 ml-2" placeholder="To" pattern="^[0-9]*$">

                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row my-3">
                    <!-- end form-inline -->
                    <div class="form-inline">

                        <div class="form-group">
                            <div class="form-check">

                                <label class="form-check-label">

                                    <input type="checkbox" name="is_recommended" value="is_recommended" id="is_recommended" class="form-check-input">

                                    Is wallpaper recommended?
                                </label>
                            </div>
                        </div>

                        <div class="form-group" style="padding-left: 10px;">
                            <div class="form-check">

                                <label class="form-check-label">

                                    <input type="checkbox" name="is_portrait" value="is_portrait" id="is_portrait" class="form-check-input">

                                    Is wallpaper portrait?
                                </label>
                            </div>
                        </div>

                        <div class="form-group" style="padding-left: 10px;">
                            <div class="form-check">

                                <label class="form-check-label">

                                    <input type="checkbox" name="is_landscape" value="is_landscape" id="is_landscape" class="form-check-input">

                                    Is wallpaper landscape?
                                </label>
                            </div>
                        </div>

                        <div class="form-group" style="padding-left: 10px;">
                            <div class="form-check">

                                <label class="form-check-label">

                                    <input type="checkbox" name="is_square" value="is_square" id="is_square" class="form-check-input">

                                    Is wallpaper square?
                                </label>
                            </div>
                        </div>

                        <div class="form-group" style="padding-left: 10px;">
                            <div class="form-check">

                                <label class="form-check-label">

                                    <input type="checkbox" name="is_gif" value="is_gif" id="is_gif" class="form-check-input">

                                    Is wallpaper gif?
                                </label>
                            </div>
                        </div>

                        <div class="form-group" style="padding-left: 10px;">
                            <div class="form-check">

                                <label class="form-check-label">

                                    <input type="checkbox" name="is_video_wallpaper" value="is_video_wallpaper" id="is_video_wallpaper" class="form-check-input">

                                    Is wallpaper video?
                                </label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row my-3">
                    <!-- end form-inline -->
                    <div class="form-inline">
                        <div class="form-group">

                            Order By :<select name="order_by" class="form-control form-control-sm mr-3 ml-3" id="order_by">
                                <option value="0">Select Order</option>
                                <option value="added_date_asc">Added Date Asc</option>
                                <option value="added_date_desc">Added Date Desc</option>
                                <option value="name_asc">Wallpaper Name Asc</option>
                                <option value="name_desc">Wallpaper Name Desc</option>
                                <option value="point_asc">Point Asc</option>
                                <option value="point_desc">Point Desc</option>
                            </select>

                        </div>
                    </div>
                </div>


                <div class="row my-3">
                    <!-- end form-inline -->
                    <div class="form-inline">


                        <div class="form-group">
                            <button type="submit" value="submit" name="submit" class="btn btn-sm btn-primary">
                                Search			  	</button>
                        </div>

                        <div class="row">
                            <div class="form-group ml-3">
                                <a href="http://localhost/pswallpapers-admin/index.php/admin/wallpapers" class="btn btn-sm btn-primary">
                                    Reset					</a>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div class="col-9">

        </div>
        <div class="col-3">
            <a href="{{ route("wallpapers.create") }}" class="btn btn-sm btn-primary pull-right">
                <span class="fa fa-plus"></span>
                Add Wallpaper
            </a>
        </div>

    </div>

    <div class="">
        <x-session-message></x-session-message>
        <x-error-message name="id"></x-error-message>
    </div>

    <br>
    {{--    table start--}}

        @include("wallpaper.list")

    {{--    table end--}}


@endsection
