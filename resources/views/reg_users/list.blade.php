
<div class="card" style="height: auto !important;">
    <div class="table-responsive animated fadeInRight">
        <table class="table m-0 table-striped">
            <tbody>

            <tr>
                <th>No</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Role</th>
                <th><span class="th-title">Edit</span></th>
                <th>Ban</th>
                <th><span class="th-title">Delete</span></th>
            </tr>

            @forelse($users as $key=>$user)


                <tr>

                    <td>{{ ++$key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ $user->roles[0]->role_desc }}
                    </td>
                    <td>
                        <a href="{{ route("reg-user-manager.edit",$user->id) }}" >
                            <i style="font-size: 18px;" class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>
                    <td>
                        @if($user->is_ban == 0)

                            <button class="btn btn-sm btn-secondary ban" userid="{{ $user->id }}">Ban</button>

                        @else

                            <button class="btn btn-sm btn-danger unban" userid="{{ $user->id }}">unBan</button>

                        @endif
                    </td>
                    <td>
                        @if($user->id != 1)
                        <a href="{{ route('reg-user-manager.destroy',$user->id) }}" id="{{ $user->id }}" class="btn-delete" data-toggle="modal" data-target="#myModal">
                            <i style="font-size: 18px;"  class="fa fa-trash-o"></i>
                        </a>
                        @endif
                    </td>

                </tr>

            @empty
                <td colspan="6" class="text-center font-weight-bold h5">There is no User yet.</td>
            @endforelse

            </tbody>
        </table>

    </div>

</div>

<div class="d-flex justify-content-between align-items-center">

    {{ $users->links() }}
    <p class="font-weight-bold h4">Total : <span class="text-primary">{{ $users->total() }}</span></p>

</div>

<x-delete-confirm-modal title="User" name="user" delOnly="User"></x-delete-confirm-modal>

@section("foot")
    <script>
        $(".btn-delete").click(function(){

            // get id and links

            let id = $(this).attr('id');
            var url = "{{route('reg-user-manager.destroy',':id')}}";
            url = url.replace(":id",id);
            console.log(id);
            $("form").attr('action',url);

        });

        $(document).delegate('.ban','click',function(){
            var btn = $(this);
            var id = $(this).attr('userid');
            var url = "{{route('reg-user-manager.ban',':id')}}";
            url = url.replace(":id",id);

            $.ajax({
                url: url,
                method:'GET',
                success:function(data){

                    if(data == 'success')
                        btn.addClass('unban btn-danger')
                            .removeClass('btn-secondary unban')
                            .html('Unban');

                    else
                        console.log( 'System error occured. Please contact your system administrator.' );
                }
            });
        });

        $(".unban").on("click",function () {

            let btn = $(this);
            let id = $(this).attr('userid');
            var url = "{{route('reg-user-manager.unban',':id')}}";
            url = url.replace(":id",id);

            $.get(url,function (data) {
                if(data == 'success')
                    btn.addClass('ban btn-secondary')
                        .removeClass('btn-danger ban')
                        .html("Ban")

                else
                    console.log( 'System error occured. Please contact your system administrator.' );
            })

        })


    </script>
@endsection
