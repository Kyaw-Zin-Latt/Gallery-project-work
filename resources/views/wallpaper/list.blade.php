
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

            @forelse($wallpapers as $key=>$wallpaper)

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



</div>
{{--{{ $categories->links() }}--}}
<x-delete-confirm-modal title="Wallpaper" name="wallpaper" delOnly="Wallpaper"></x-delete-confirm-modal>

@section("foot")
    <script>
        $(".btn-delete").click(function(){

            // get id and links

            let id = $(this).attr('id');
            var url = "{{route('wallpapers.destroy',':id')}}";
            url = url.replace(":id",id);
            console.log(id);
            $("form").attr('action',url);

        });
    </script>
@endsection
