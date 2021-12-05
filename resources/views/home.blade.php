@extends('layouts.app')

@section("content")
    <div class="row my-3">
        <div class="row">
            <div class="col-sm-12 col-md-12 main teamps-sidebar-push">

                <section class="content animated fadeInRight">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark"> Welcome, {{ Auth::user()->name }}!</h1>
                                    <!-- Message -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->
                </section>

                <!-- Main content -->
                <div class="container-fluid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3 style="color: white;">
                                            {{ $categories->count() }}
                                        </h3>
                                        <p style="color:white;font-size: 16px;">Total Categories</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-th-list"></i>
                                    </div>
                                    <a href="{{ route("category.index") }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3 style="color: white;">
                                            {{ $colors->count() }}
                                        </h3>

                                        <p style="color:white;font-size: 16px;">Total Colors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-paint-brush"></i>
                                    </div>
                                    <a href="{{ route("color.index") }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3 style="color: white;">
                                            {{ $wallpapers->count() }}
                                        </h3>

                                        <p style="color:white;font-size: 16px;">Total Wallpapers</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-image"></i>
                                    </div>
                                    <a href="{{ route("wallpapers.index") }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <span class="badge badge-warning" style="height: 30px; padding: 10px; font-size: 14px;">
                                                Wallpapers By Category
                                            </span>
                                        </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-md-12 d-flex justify-content-center">
                                                <div class="d-flex" style="width: 230px;height: 230px; align-items: self-end">
                                                    <canvas id="pieChart"></canvas>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-center">
                                        <a href="{{ route("wallpapers.index") }}">View More</a>
                                    </div>
                                    <!-- /.card-footer -->

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <!--Revenue CHART -->
                                    <div class="card-header" style="border-top: 2px solid red;">
                                        <h3 class="card-title">
                                             <span class="badge badge-warning" style="height: 30px; padding: 10px; font-size: 14px;">
                                                 Reported Item
                                             </span>
                                        </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="box-body chart-responsive">
                                        <div class="chart" id="line-chart" style="height: 230px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="230" version="1.1" width="448" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; top: -0.921875px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="36.181640625" y="191" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.681640625,191H422.75" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="36.181640625" y="149.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0.25</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.681640625,149.5H422.75" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="36.181640625" y="108" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0.5</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.681640625,108H422.75" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="36.181640625" y="66.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0.75</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.681640625,66.5H422.75" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="36.181640625" y="25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">1</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.681640625,25H422.75" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="422.75000000000006" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Dec</tspan></text><text x="354.7375710227273" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Oct</tspan></text><text x="286.72514204545456" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Aug</tspan></text><text x="218.71271306818184" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Jun</tspan></text><text x="150.7002840909091" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Apr</tspan></text><text x="82.68785511363637" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Feb</tspan></text><path fill="none" stroke="#00ffb2" d="M48.681640625,191C57.18319424715909,191,74.18630149147728,191,82.68785511363637,191C91.18940873579547,191,108.19251598011364,191,116.69406960227273,191C125.19562322443183,191,142.19873046875,191,150.7002840909091,191C159.2018377130682,191,176.20494495738637,191,184.70649857954547,191C193.20805220170456,191,210.21115944602275,191,218.71271306818184,191C227.21426669034093,191,244.2173739346591,191,252.7189275568182,191C261.22048117897725,191,278.2235884232955,191,286.72514204545456,191C295.2266956676136,191,312.22980291193187,191,320.73135653409093,191C329.23291015625,191,346.23601740056824,191,354.7375710227273,191C363.2391246448864,191,380.2422318892046,191,388.7437855113637,191C397.24533913352275,191,414.248446377841,191,422.75000000000006,191" stroke-width="2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="48.681640625" cy="191" r="4" fill="#00ffb2" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="82.68785511363637" cy="191" r="4" fill="#00ffb2" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="116.69406960227273" cy="191" r="4" fill="#00ffb2" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="150.7002840909091" cy="191" r="4" fill="#00ffb2" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="184.70649857954547" cy="191" r="4" fill="#00ffb2" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="218.71271306818184" cy="191" r="4" fill="#00ffb2" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="252.7189275568182" cy="191" r="4" fill="#00ffb2" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="286.72514204545456" cy="191" r="4" fill="#00ffb2" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="320.73135653409093" cy="191" r="4" fill="#00ffb2" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="354.7375710227273" cy="191" r="4" fill="#00ffb2" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="388.7437855113637" cy="191" r="4" fill="#00ffb2" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="422.75000000000006" cy="191" r="4" fill="#00ffb2" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 26.1724px; top: 114px; display: none;"><div class="morris-hover-row-label">Feb</div><div class="morris-hover-point" style="color: #00ffb2">
                                                    Transaction:
                                                    0
                                                </div></div></div>
                                    </div>


                                    <script>
                                        $(function () {
                                            "use strict";

                                            //Line CHART
                                            var monthNames = ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                                                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
                                            ];
                                            Morris.Line({
                                                element: 'line-chart',
                                                data: [
                                                    {y: 1, a: 0},
                                                    {y: 2, a: 0},
                                                    {y: 3, a: 0},
                                                    {y: 4, a: 0},
                                                    {y: 5, a: 0},
                                                    {y: 6, a: 0},
                                                    {y: 7, a: 0},
                                                    {y: 8, a: 0},
                                                    {y: 9, a: 0},
                                                    {y: 10, a: 0},
                                                    {y: 11, a: 0},
                                                    {y: 12, a: 0}
                                                ],
                                                xkey: 'y',
                                                parseTime: false,
                                                ykeys: ['a'],
                                                xLabelFormat: function (x) {
                                                    var index = parseInt(x.src.y);
                                                    return monthNames[index];
                                                },
                                                xLabels: "month",
                                                labels: ['Transaction'],
                                                lineColors: ['#00ffb2'],
                                                lineWidth        : 2,
                                                hideHover: 'auto'

                                            });

                                        });
                                    </script>          </div>
                            </div>

                            <div class="col-12">
                                <div class="card">
                                    <!-- TABLE: LATEST ORDERS -->
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">
                                            <span class="badge badge-warning" style="height: 30px; padding: 10px; font-size: 14px; ">
                                              Total :      :      {{ $wallpapers->count() }}     Recently Added Wallpapers
                                            </span>
                                        </h3>

                                        <div class="card-tools">

                                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-widget="remove">
                                                <i class="fa fa-times"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">

                                        <table class="table m-0 table-striped table-responsive">
                                            <tbody>

                                            <tr>
                                                <th>No</th>
                                                <th>Wallpaper Name</th>
                                                <th>Category Name</th>
                                                <th>Wallpaper Image</th>
                                                <th>Wallpaper Types</th>
                                                <th>Wallpaper Point</th>
                                                <th>Uploaded User</th>
                                                <th><span class="th-title">Edit</span></th>
                                                <th><span class="th-title">Delete</span></th>
                                                <th><span class="th-title">Publish</span></th>
                                            </tr>

                                            @forelse($wallpapersLimit as $key=>$wallpaper)

                                                <tr>
                                                    <td>1</td>
                                                    <td>{{ $wallpaper->wallpaper_name }}</td>
                                                    <td>{{ $wallpaper->category[0]->title }}</td>
                                                    <td>
                                                        @foreach($wallpaper->photo as $p)
                                                            @if($p->img_type == "wallpaper")
                                                                <img width="150px" class="rounded" src="{{ asset("storage/wallpaper/Image/$p->photo") }}">
                                                    @endif
                                                    @endforeach
                                                    <td>
                                                        @if($wallpaper->types == "1")
                                                            <button class="btn btn-success">Free</button>
                                                        @else
                                                            <button class="btn btn-danger">Premium</button>
                                                        @endif
                                                    </td>
                                                    <td>{{ $wallpaper->point }}</td>
                                                    <td>{{ $wallpaper->user[0]->name }}</td>
                                                    <td>
                                                        <a href="{{ route("wallpapers.edit",$wallpaper->wallpaper_id) }}" >
                                                            <i style="font-size: 18px;" class="fa fa-pencil-square-o"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('wallpapers.destroy',$wallpaper->wallpaper_id) }}" id="{{ $wallpaper->wallpaper_id }}" class="btn-delete" data-toggle="modal" data-target="#myModal">
                                                            <i style="font-size: 18px;"  class="fa fa-trash-o text-danger"></i>
                                                        </a>

                                                    </td>
                                                    <td>
                                                        @if($wallpaper->wallpaper_is_published == 0)
                                                            <form action="{{ route("wallpapers.publish") }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $wallpaper->wallpaper_id }}">
                                                                <button class="btn btn-sm btn-danger">
                                                                    No
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route("wallpapers.unPublish") }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $wallpaper->wallpaper_id }}">
                                                                <button class="btn btn-sm btn-success">
                                                                    Yes
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>

                                                </tr>

                                            @empty
                                                <td colspan="10" class="text-center font-weight-bold h5">There is no wallpaper yet.</td>
                                            @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->


                                    <div class="card-footer text-center">
                                        <a href="{{ route("wallpapers.index") }}">View All</a>
                                    </div>
                                    <!-- /.card-footer -->


                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card">
                                    <!-- USERS LIST -->

                                    <div class="card-header">
                                        <h3 class="card-title">
    <span class="badge badge-warning" style="height: 30px; padding: 10px; font-size: 14px;">

          Total :            :            {{ $regUsers->count() }}            Users
      </span>
                                        </h3>

                                        <div class="card-tools">

                                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                                            </button>
                                        </div>

                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body p-0" style="height: 150px;">
                                        <br><br>
                                        <ul class="users-list clearfix">

                                            @foreach($regUsersLimit as $reg)

                                                <li>
                                                    <img src="http://localhost/flutter-admotors-admin/uploads/thumbnail/no_image.png" alt="User Image" style="border-radius: 50%; width:60px; height:60px;">
                                                    <a class="users-list-name" href="#">{{ $reg->name }}</a>
                                                    <span class="users-list-date">{{ $reg->email }}</span>
                                                </li>

                                            @endforeach


                                        </ul>

                                        <!-- /.users-list -->
                                    </div>

                                    <br><br>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-center">
                                        <a href="{{ route("reg-user-manager.index") }}">View All</a>
                                    </div>
                                    <!-- /.card-footer -->

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@section("foot")
    <script>

        @php

            $catName = [];
            $countPostByCat = [];
            foreach ($categories as $c) {
                array_push($catName,$c->title);
                array_push($countPostByCat,$c->wallpaper->count());
            }


        @endphp

        let catArr = <?php echo json_encode($catName) ?>;
        let dataByCatArr = <?php echo json_encode($countPostByCat) ?>;

        let ctx = document.getElementById('pieChart').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: catArr,
                datasets: [{
                    label: '# of Votes',
                    data: dataByCatArr,
                    backgroundColor: [
                        '#007bff',
                        '#dc3545',
                        '#28a745',
                        '#ffc107',
                        '#17a2b8',
                        '#e261a4'
                    ],


                }]
            },
            options: {
                responsive: true,
               plugins: {
                   legend:{
                       display: true,
                       position: 'right',
                       align:"center",
                       labels: {
                           fontColor: '#000',
                           usePointStyle:'circle',
                           padding:15,
                       }
                   },
                   // cutoutPercentage: 60,
               }

            }
        });
    </script>

@endsection
