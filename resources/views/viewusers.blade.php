@extends('layout.default')
@section("myblock")

<div class="container mt-3">
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
                <a href="edituser?email={{$user->email}}">Edit</a> | <a href="deleteuser?email={{$user->email}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>


@stop