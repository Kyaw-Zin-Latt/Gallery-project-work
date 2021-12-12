
<div class="card" id="colorTable" style="height: auto !important;">
    <div class="table-responsive animated fadeInRight">
        <table class="table m-0 table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Color Name</th>
                <th>Color Code</th>
                <th>Color</th>
                <th><span class="th-title">Edit</span></th>
                <th><span class="th-title">Delete</span></th>
            </tr>
            </thead>

            <tbody id="dynamic">
            @forelse($colors as $key=>$color)


                <tr>

                    <td>{{ ++$key }}</td>
                    <td>{{ $color->name }}</td>
                    <td>{{ $color->code }}</td>
                    <td>
                        <div style="width: 30px; height: 30px; background-color: {{ $color->code }}; border-radius: 50%"></div>
                    </td>
                    <td>
                        <a href="{{ route("color.edit",$color->id) }}" >
                            <i style="font-size: 18px;" class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('color.destroy',$color->id) }}" id="{{ $color->id }}" class="btn-delete" data-toggle="modal" data-target="#myModal">
                            <i style="font-size: 18px;"  class="fa fa-trash-o"></i>
                        </a>

                    </td>

                </tr>

            @empty
                <td colspan="6" class="text-center font-weight-bold h5">There is no Color yet.</td>
            @endforelse

            </tbody>
        </table>

    </div>

</div>

{{--<div class="d-flex justify-content-between align-items-center">--}}

{{--    {{ $colors->appends(Request::all())->links() }}--}}
{{--    <p class="font-weight-bold h4">Total : <span class="text-primary">{{ $colors->total() }}</span></p>--}}

{{--</div>--}}

<x-delete-confirm-modal title="Color" name="color" delOnly="Color"></x-delete-confirm-modal>

@section("foot")
    <script>
        $(".btn-delete").click(function(){

            // get id and links

            let id = $(this).attr('id');
            var url = "{{route('color.destroy',':id')}}";
            url = url.replace(":id",id);
            console.log(id);
            $("form").attr('action',url);

        });
    </script>
@endsection
