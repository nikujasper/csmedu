@extends('layout.default')
@section("myblock")
<style>
    .h {
        display: none;
    }

    .s {
        display: block;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {

        $('.delete').on('click', function() {
            tr = $(this).parents('tr');
            cemail = tr.find('#email').val();
            $.ajax({
                url: "samepageDeleteAjax",
                type: "get",
                data: {
                    email: cemail,
                    _token: "{{csrf_token()}}"
                },
                success: function(res) {
                    location.reload();
                }

            })
        });


        $(".edit").click(function() {
            tr = $(this).parents('tr');
            btn = $(this).val();
            if (btn == 'Edit') {
                tr.find("#name").addClass('s');
                tr.find("#name").removeClass('h');


                tr.find('#lblname').addClass('h');
                tr.find('#lblname').removeClass('s');

                tr.find("#mobile").addClass('s');
                tr.find("#mobile").removeClass('h');


                tr.find('#lblmobile').addClass('h');
                tr.find('#lblmobile').removeClass('s');

                tr.find("#status").addClass('s');
                tr.find("#status").removeClass('h');


                tr.find('#lblstatus').addClass('h');
                tr.find('#lblstatus').removeClass('s');

                tr.find("#role").addClass('s');
                tr.find("#role").removeClass('h');


                tr.find('#lblrole').addClass('h');
                tr.find('#lblrole').removeClass('s');


                $(this).val("update");
            } else {

                var email = $(this).siblings('input[name="email"]').val();
                var name = tr.find('#name').val();
                var mobile = tr.find('#mobile').val();
                var status = tr.find('#status').val();
                var role = tr.find('#role').val();

                var row = $(this).closest('tr');
                $.ajax({
                    url: "samepageupdateajax",
                    type: "get",
                    dataType: "JSON",
                    data: {
                        email: email,
                        mobile: mobile,
                        name: name,
                        status: status,
                        role: role
                    },
                    success: function(res) {

                        location.reload();
                    }
                });


                tr.find("#name").addClass('h');
                tr.find('#name').removeClass('s');

                tr.find('#lblname').addClass('s');
                tr.find('#lblname').removeClass('h');

                tr.find("#mobile").addClass('h');
                tr.find("#mobile").removeClass('s');

                tr.find('#lblmobile').addClass('s');
                tr.find('#lblmobile').removeClass('h');

                tr.find("#status").addClass('h');
                tr.find("#status").removeClass('s');

                tr.find('#lblstatus').addClass('s');
                tr.find('#lblstatus').removeClass('h');

                tr.find("#role").addClass('h');
                tr.find("#role").removeClass('s');

                tr.find('#lblrole').addClass('s');
                tr.find('#lblrole').removeClass('h');

                $(this).val("Edit");
            }

        })
    });
</script>


<div class="container mt-2">

    @if (isset($users))
    <table id="userTable" class="table table-bordered" border="1px solid black" style="border-collapse: collapse;">
        <tr class="text-center">
            <th>Name</th>
            <th>Mobile</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach($users as $user)
        <tr>
            <td>
                <label id="lblname" for="" class="s">{{$user->name}}</label>
                <input type="text" value="{{$user->name}}" class="h" id="name" name="name">
            </td>
            <td> <label id="lblmobile" for="" class="s">{{$user->mobile}}</label>
                <input type="text" value="{{$user->mobile}}" class="h" id="mobile" name="mobile">
            </td>
            <td> <label id="lblrole" for="" class="s">{{$user->role}}</label>
                <input type="text" value="{{$user->role}}" class="h" id="role" name="role">
            </td>
            <td> <label id="lblstatus" for="" class="s">{{$user->status}}</label>
                <input type="text" value="{{$user->status}}" class="h" id="status" name="status">
            </td>
            <td>
                <input type="text" name="email" id="email" value="{{$user->email}}" class="h">
                <input type="button" class="edit" id="edit" value="Edit" name="updatebtn"> | <input type="button" class="delete" value="Delete" id="delete" name="delete">
            </td>
        </tr>
        @endforeach
    </table>
    @endif

</div>
@stop