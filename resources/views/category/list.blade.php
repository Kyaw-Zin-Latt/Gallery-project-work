
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
                                <button class="btn btn-sm btn-danger" data-id="{{ $cateogry->id }}" id="pubBtn">
                                    No
                                </button>
                            </form>
                        @else
                            <form action="{{ route("category.unPublish") }}" id="unpubForm" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cateogry->id }}">
                                <button class="btn btn-sm btn-success" data-id="{{ $cateogry->id }}" id="unpubBtn">
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

        //toast function start

        function showToast(data) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: data.icon,
                title: data.title
            })
        }

        //toast function end

        //unpublist Trigger start

        $(document).delegate("#unpubBtn","click",function (e) {
            e.preventDefault();
            let id = $(this).attr("data-id");
            let btn = $(this);

            console.log(id);
            axios.post("category/unPublish",{
                id : id
            }).then(function (response) {
                console.log(response);
                let data = response.data;
                if(data.status == "success") {
                    $(btn).attr("id","pubBtn");
                    $(btn).addClass("btn-danger").text("No").removeClass("btn-success");
                    showToast(data);
                }
            });
        })

        //unpublist Trigger end

        //publist Trigger start

        $(document).delegate("#pubBtn","click",function (e) {
            e.preventDefault();
            let id = $(this).attr("data-id");
            let btn = $(this);

            console.log(id);
            axios.post("category/publish",{
                id : id
            }).then(function (response) {
                console.log(response);
                let data = response.data;
                if(data.status == "success") {

                    $(btn).attr("id","unpubBtn");
                    $(btn).addClass("btn-success").text("Yes").removeClass("btn-danger");
                    showToast(data);

                }
            });
        })

        //publist Trigger end

        //delete Trigger start

        $("#delBtn").click(function (e) {
            e.preventDefault();
            let id = $(this).parent().attr("id");
            console.log(id);
        })

        //delete Trigger end

    </script>
@endsection
