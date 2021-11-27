
<div class="card" style="height: auto !important;">
    <div class="table-responsive animated fadeInRight">
        <table class="table m-0 table-striped">
            <tbody>

            <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Category Cover Photo</th>
                {{--                    <th>Wallpaper Count</th>--}}
                <th><span class="th-title">Edit</span></th>
                <th><span class="th-title">Delete</span></th>
                <th><span class="th-title">Publish</span></th>
            </tr>

            @forelse($categories as $key=>$cateogry)


                <tr>

                    <td>{{ ++$key }}</td>
                    <td>{{ $cateogry->title }}</td>
                    <td>
                        @foreach($cateogry->photo as $p)
                            @if($p->img_type == "category-icon")
                                <img width="150px" class="rounded" src="{{ asset("storage/category/icon/".$p->photo) }}">
                            @endif
                        @endforeach
                    </td>
                    {{--                        --}}{{--                    <td>36</td>--}}
                    <td>
                        <a href="{{ route("category.edit",$cateogry->id) }}" >
                            <i style="font-size: 18px;" class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('category.destroy',$cateogry->id) }}" id="{{ $cateogry->id }}" class="btn-delete" data-toggle="modal" data-target="#myModal">
                            <i style="font-size: 18px;"  class="fa fa-trash-o"></i>
                        </a>

                    </td>
                    <td>
                        @if($cateogry->is_publish == 0)
                            <form action="{{ route("category.publish") }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cateogry->id }}">
                                <button class="btn btn-sm btn-danger">
                                    No
                                </button>
                            </form>
                        @else
                            <form action="{{ route("category.unPublish") }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cateogry->id }}">
                                <button class="btn btn-sm btn-success">
                                    Yes
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>

            @empty
                <td colspan="6" class="text-center font-weight-bold h5">There is no Category yet.</td>
            @endforelse

            </tbody>
        </table>


    </div>



</div>
{{ $categories->appends(Request::all())->links() }}
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
