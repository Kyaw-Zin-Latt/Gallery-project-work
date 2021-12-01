@extends('layouts.app')

@section("title") PS Wallpaper|Colors @endsection


@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Colors</li>
    </x-bread-crumb>

    <div class="row my-3">

        <div class="col-9">
            <form action="{{ route("color.search") }}" class="form-inline" method="get" accept-charset="utf-8">


                <div class="form-group mr-3">

                    <input id="searchterm" type="text" name="searchterm" value="" class="form-control form-control-sm" placeholder="Search">

                </div>

                <div class="form-group mr-3">
                    &nbsp; Order By
                    <select name="order_by" class="form-control form-control-sm mr-3 ml-3" id="order_by">
                        <option value="">Select Order</option>
                        <option value="ASC">Name Ascending</option>
                        <option value="DESC">Name Descending</option>
                    </select>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary">
                        Search
                    </button>
                </div>

                <div class="row">
                    <div class="form-group ml-3">
                        <a href="{{ route('color.index') }}" class="btn btn-sm btn-primary">
                            Reset
                        </a>
                    </div>
                </div>

            </form>
        </div>


        <div class="col-3">
            <a href="{{ route("color.create") }}" class="btn btn-sm btn-primary pull-right">
                <span class="fa fa-plus"></span>
                Add Color
            </a>
        </div>

    </div>

    <div class="">
        <x-session-message></x-session-message>
        <x-error-message name="id"></x-error-message>
    </div>

    <br>
    {{--    table start--}}

    @include("color.list")

    {{--    table end--}}


@endsection

@section("foot")



    <script>

       $(document).on('keyup','#searchterm',function () {
            let search_content = $(this).val();
            if(search_content != '') {
                $.ajax({
                    url:'/dashboard/colors',
                    method : 'GET',
                    data:{search_content},
                    dataType:'json',
                    success:function (daa) {

                    }

                })
            }
       });

    </script>

@endsection
