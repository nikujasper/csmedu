 @extends('layout.default')
 @section("myblock")
 
 @foreach($users as $user)

 <form action="update" method="post" class="form">
     Name: <input type="text" name="name" value="{{$user->name}}"><br>
     Mobile: <input type="text" name="mobile" value="{{$user->mobile}}"><br>
     Role: <input type="text" name="role" value="{{$user->role}}"><br>
     Status: <input type="text" name="status" value="{{$user->status}}"><br>
     <input type="submit" name="submit" value="Update">
     <input type="hidden" name="email" value="{{$user->email}}">
     @csrf
 </form>
 <!-- @endforeach -->
 @stop