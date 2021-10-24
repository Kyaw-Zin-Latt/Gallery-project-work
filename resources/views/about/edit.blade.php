@extends('layouts.app')

@section("title") PS Wallpaper|Abouts|About App @endsection

@section("content")
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route("abouts.edit",$abouts->about_id) }}">Abouts</a></li>
        <li class="breadcrumb-item active" aria-current="page">About App</li>
    </x-bread-crumb>


    <x-session-message></x-session-message>
    <form action="{{ route("abouts.update",$abouts->about_id) }}" id="about-form" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
        @csrf
        <input type="hidden" name="about_id" value="{{ $abouts->about_id }}">
        <section class="content animated fadeInRight">
            <div class="card card-info">
                <div class="card-header bg-primary">
                    <h3 class="card-title">About Information</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>About Title</label>
                                <input type="text" name="title" value="{{ old('title',$abouts->about_title) }}" id="title" class="form-control" placeholder="Title">
                                <x-form-error name="title"></x-form-error>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Description
                                </label>
                                <textarea class="form-control" name="description" placeholder="Description" rows="5">{{ old("description",$abouts->about_description) }}</textarea>
                                <x-form-error name="description"></x-form-error>

                            </div>

                            <div class="form-group">
                                <label>GDPR Content							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="GDPR Content">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>
                                <textarea class="form-control" name="GDPR" placeholder="GDPR Content" rows="5">{{ old("GDPR",$abouts->GDPR) }}</textarea>
                                <x-form-error name="GDPR"></x-form-error>

                            </div>

                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>About Email</label>
                                <input type="text" name="email" value="{{ old('email',$abouts->about_email) }}" id="email" class="form-control" placeholder="Email">
                                <x-form-error name="email"></x-form-error>
                            </div>

                            <div class="form-group">
                                <label>About Phone							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="phone_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>
                                <input type="text" name="phone" value="{{ old('phone',$abouts->about_phone) }}" id="phone" class="form-control" placeholder="Phone">
                                <x-form-error name="phone"></x-form-error>

                            </div>

                            <div class="form-group">
                                <label>About Website Link							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="website_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>
                                <input type="text" name="website" value="{{ old('website',$abouts->about_website) }}" id="website" class="form-control" placeholder="Website">
                                <x-form-error name="website"></x-form-error>

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <!-- <legend>Google Analytic & Ads Setting</legend>

                          <div class="form-group">
                              <div class="form-check">
                                  <label class="form-check-label">

                                  <input type="checkbox" name="ads_on" value="accept" checked="checked" id="ads_on" class="form-check-input"  />

                                  Enable Google Adsense
                                  </label>
                              </div>
                          </div>

                          <div class="form-group">
                              <label>Ads Client							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="ads_client_tooltips">
                                      <span class='glyphicon glyphicon-info-sign menu-icon'>
                                  </a>
                              </label>
                              <input type="text" name="ads_client" value="ca-pub-7127831079008160" id="ads_client" class="form-control" placeholder="Ads Client"  />
                          </div>

                          <div class="form-group">
                              <label>Ads Slot							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="ads_slot_tooltips">
                                      <span class='glyphicon glyphicon-info-sign menu-icon'>
                                  </a>
                              </label>
                              <input type="text" name="ads_slot" value="6882887537" id="ads_slot" class="form-control" placeholder="Ads Slot"  />
                          </div>

                          <div class="form-group">
                              <div class="form-check">
                                  <label class="form-check-label">

                                  <input type="checkbox" name="analyt_on" value="accept" checked="checked" id="analyt_on" class="form-check-input"  />

                                  Enable Google Analytic
                                  </label>
                              </div>
                          </div>

                          <div class="form-group">
                              <label>Analytic Track Id							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="analyt_track_id_tooltips">
                                      <span class='glyphicon glyphicon-info-sign menu-icon'>
                                  </a>
                              </label>
                              <input type="text" name="analyt_track_id" value="UA-79164209-2" id="analyt_track_id" class="form-control" placeholder="Analytic Tracking Id"  />
                          </div> -->
                            <!-- /.form-group -->


                            <label>About Cover Photo						<a href="#" class="tooltip-ps" data-toggle="tooltip" title="cat_photo_tooltips">
							<span class="glyphicon glyphicon-info-sign menu-icon">
						</span></a>
                            </label>

                            <div class="btn btn-sm btn-primary btn-upload pull-right" data-toggle="modal" data-target="#uploadImage">
                                Replace Photo
                            </div>

                            <hr>

                            <div class="row">



                                <div class="col-md-4" style="height:100">

                                    <div class="thumbnail">

                                        @foreach($photos as $p)
                                            @if($p->parent_id == $abouts->about_id)
                                            <img class="rounded" src="{{ asset("storage/about/".$p->photo) }}" width="200px">
                                            @endif
                                        @endforeach

                                        <br>

                                        <p class="text-center">

                                            <a data-toggle="modal" data-target="#deletePhoto" class="delete-img" id="img7c086e11a0be2ed7e5360f9b6700ed1d" image="wp.png">
                                                Remove
                                            </a>
                                        </p>

                                    </div>

                                </div>


                            </div>



                            <!-- End Category cover photo -->
                            <div class="form-group">
                                <label>Upload Point							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="Upload Point">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>
                                <input type="text" name="upload_point" value="{{ old('upload_point',$abouts->upload_point) }}" id="upload_point" class="form-control" placeholder="Upload Point">
                                <x-form-error name="upload_point"></x-form-error>

                            </div>
                        </div>
                        <!-- /.col -->
                        <legend class="ml-3">Social Information</legend>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Facebook							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="facebook_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>
                                <input type="text" name="facebook" value="{{ old('facebook',$abouts->facebook) }}" id="facebook" class="form-control" placeholder="Facebook">
                                <x-form-error name="facebook"></x-form-error>

                            </div>

                            <div class="form-group">
                                <label>Google+							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="gplus_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>
                                <input type="text" name="google_plus" value="{{ old('google_plus',$abouts->google_plus) }}" id="google_plus" class="form-control" placeholder="Google+">
                                <x-form-error name="google_plus"></x-form-error>

                            </div>

                            <div class="form-group">
                                <label>Instagram							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="instagram_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>
                                <input type="text" name="instagram" value="{{ old('instagram',$abouts->instagram) }}" id="instagram" class="form-control" placeholder="Instagram">
                                <x-form-error name="instagram"></x-form-error>

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Youtube							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="instagram_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>
                                <input type="text" name="youtube" value="{{ old('youtube',$abouts->youtube) }}" id="youtube" class="form-control" placeholder="Youtube">
                                <x-form-error name="youtube"></x-form-error>

                            </div>

                            <div class="form-group">
                                <label>Pinterest							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="pinterest_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>
                                <input type="text" name="pinterest" value="{{ old('pinterest',$abouts->pinterest) }}" id="pinterest" class="form-control" placeholder="Pinterest">
                                <x-form-error name="pinterest"></x-form-error>

                            </div>

                            <div class="form-group">
                                <label>Twitter							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="twitter_tooltips">
								<span class="glyphicon glyphicon-info-sign menu-icon">
							</span></a>
                                </label>
                                <input type="text" name="twitter" value="{{ old('twitter',$abouts->twitter) }}" id="twitter" class="form-control" placeholder="Twitter">
                                <x-form-error name="twitter"></x-form-error>

                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" name="save" class="btn btn-sm btn-primary">
                        update
                    </button>

                    <a href="{{ route("abouts.edit",$abouts->about_id) }}" class="btn btn-sm btn-primary">
                        Cancel
                    </a>
                </div>

            </div>
            <!-- /.card info-->
        </section>
    </form>

    @foreach($photos as $p)
        @if($p->img_type == "about")
            <x-photo-upload name="about_photo" id="uploadImage" formId="about-photo" link="{{ route('photo.update',$p->id) }}"></x-photo-upload>
        @endif
    @endforeach



@endsection
