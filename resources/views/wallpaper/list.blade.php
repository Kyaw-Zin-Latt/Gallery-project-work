
<div class="card" style="height: auto !important;">
    <div class="table-responsive animated fadeInRight">
        <table class="table m-0 table-striped">
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

{{--            @forelse($categories as $key=>$cateogry)--}}

            <tr>
                <td>1</td>
                <td>Testing</td>
                <td>Experimental</td>
                <td>
                    <img class="rounded" src="{{ asset("storage/backend/login_bg/6175282dc30fa_loginBg.jpeg") }}" width="150px" alt="">
                </td>
                <td>
                    <button class="btn btn-success">Free</button>
                </td>
                <td>0</td>
                <td>Kyaw Zin Latt</td>
{{--                <td>--}}
{{--                    <a href="{{ route("category.edit",$wallpaper->id) }}" >--}}
{{--                        <i style="font-size: 18px;" class="fa fa-pencil-square-o"></i>--}}
{{--                    </a>--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    <a href="{{ route('wallpapers.destroy',$wallpaper->id) }}" id="{{ $wallpaper->id }}" class="btn-delete" data-toggle="modal" data-target="#myModal">--}}
{{--                        <i style="font-size: 18px;"  class="fa fa-trash-o"></i>--}}
{{--                    </a>--}}

{{--                </td>--}}
{{--                <td>--}}
{{--                    @if($wallpaper->is_publish == 0)--}}
{{--                        <form action="{{ route("wallpapers.publish") }}" method="post">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="id" value="{{ $wallpaper->id }}">--}}
{{--                            <button class="btn btn-sm btn-danger">--}}
{{--                                No--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    @else--}}
{{--                        <form action="{{ route("wallpapers.unPublish") }}" method="post">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="id" value="{{ $wallpaper->id }}">--}}
{{--                            <button class="btn btn-sm btn-success">--}}
{{--                                Yes--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    @endif--}}
{{--                </td>--}}

            </tr>

{{--            @empty--}}
{{--                <td colspan="6" class="text-center font-weight-bold h5">There is no Category yet.</td>--}}
{{--            @endforelse--}}

            </tbody>
        </table>


    </div>



</div>
{{--{{ $categories->links() }}--}}
<x-delete-confirm-modal title="Category" name="category" delOnly="Category"></x-delete-confirm-modal>

@section("foot")
    <script>
        $(".btn-delete").click(function(){

            // get id and links

            let id = $(this).attr('id');
            var url = "{{route('category.destroy',':id')}}";
            url = url.replace(":id",id);
            console.log(id);
            $("form").attr('action',url);

        });
    </script>
@endsection
