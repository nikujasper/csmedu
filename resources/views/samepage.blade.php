@extends('layout.default')
@section("myblock")


@if (isset($users))
<div class="container mt-2">

    <div>
        @if (isset($result))
        <form action="samepageupdate" method="post" class="form" enctype="multipart/form-data">
            @foreach($result as $user)
            Name: <input type=" text" name="name" value="{{$user->name}}"><br>
            Mobile: <input type="text" name="mobile" value="{{$user->mobile}}"><br>
            Role: <input type="text" name="role" value="{{$user->role}}"><br>
            Status: <input type="text" name="status" value="{{$user->status}}"><br><br>
            Photo: <img src="data:image/png;base64,{{ base64_encode($user->image_data) }}" alt="NA" width="80" height="80" id="ph" style="border:1px solid black">
            <input type="file" name="photo" ><br><br>
            <input type="submit" name="updatebtn" value="Update">
            <a href="/samepage" type="button"><input type="button" value="Cancel"></a>
            <input type="hidden" name="email" value="{{$user->email}}">
            @csrf
            @endforeach 
        </form>
        @endif
    </div>
    <br>
    <div>
        <table class="table table-bordered" border="1px solid black" style="border-collapse: collapse; text-align:center ">
            <tr class="text-center">
                <th>Name</th>
                <th>Mobile</th>
                <th>Role</th>
                <th>Status</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>

            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->mobile}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->status}}</td>
                <td>
                    <img src="data:image/png;base64,{{ base64_encode($user->image_data) }}" alt="NA" width="50" height="50">
                </td>
                <td>
                    <a href="samepageedit?email={{$user->email}}">Edit</a> | <a href="samepagedelete?email={{$user->email}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif


</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $('input[name="photo"]').on('change', function() {
        var selectedFile = this.files[0];
        if (selectedFile) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#ph').attr('src', e.target.result);
            };
            reader.readAsDataURL(selectedFile);
        }
    });
</script>



@stop