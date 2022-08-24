@extends('layouts/admin')
@section('title', 'Create Page')
@section('content')
@include('layouts/include/admin/session')
<div class="card">  
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h3> User Home Page  </h3> 
            <a href="{{url('admin/user/create')}}" class="btn btn-primary btn-sm"> Add Employee </a>
        </div>
    </div>
</div>

<div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th> ID </th>
                <th> Username </th>
                <th> Email </th>
                <th> User Profile </th>
                <th> Role </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td> {{$user->id}}</td>
                <td> {{$user->name}}</td>
                <td> {{$user->email}}</td>
                <td> 

                    @if($user->images()->exists())
                    @foreach ($user->images as $image)
                   <img src=" {{asset('upload/images/'.$image->path)}}" alt="userimage" width="100%">
                    @endforeach  
                    @else 
                    <h5> No Profile </h5>
                    @endif
                </td>
                <td> {{$user->role_as == 1? 'admin':'user'}}</td>
                <td>
                    <div class="d-flex">
                        <form action="/admin/user/{{$user->id}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger ms-3" onclick="return confirm('Are You Sure to delete')"> Ban User </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <h3 class="text-danger"> No Slider Here </h3>
        @endforelse
        </tbody>
    </table>
</div>
@endsection