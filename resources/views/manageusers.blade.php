@extends('layout.default')
@section("myblock")

<table class="table table-bordered" border="1px solid black" style="border-collapse: collapse;">
    <tr>

        <th>Name</th>
        <th>Mobile</th>
        <th>Role</th>
        <th>Status</th>
        <th>Action</th>

    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->mobile}}</td>
        <td>{{$user->role}}</td>
        <td>{{$user->status}}</td>
        <td>
            <input type="submit" value="Edit" name="edit" class="btn btn-success">
            <input type="submit" value="Delete" name="delete" class="btn btn-danger">
        </td>
    </tr>
    @endforeach
</table>

@stop