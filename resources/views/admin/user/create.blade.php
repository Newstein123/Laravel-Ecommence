@extends('layouts/admin')
@section('title', 'Create Page')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h3> Add User </h3> 
            <a href="{{url('admin/user')}}" class="btn btn-primary btn-sm"> Back </a>
        </div>
    </div>

    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{url('admin/user')}}" method="POST">
                    @csrf
                    <label for=""> Username </label>
                    <input type="text" name="name" id="" class="form-control mt-3 mb-2">
                    @error('user')
                     <div class="text-danger"> {{$message}} </div>   
                    @enderror

                    <label for=""> Email </label>
                    <input type="email" name="email" id="" class="form-control mt-3 mb-2">
                    @error('email')
                     <div class="text-danger"> {{$message}} </div>   
                    @enderror

                    <label for=""> Password </label>
                    <input type="password" name="password" id="" class="form-control mt-3 mb-2">
                    @error('password')
                     <div class="text-danger"> {{$message}} </div>   
                    @enderror

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="role_as">
                        <label for="" class="form-check-label"> Role [ Checked = admin | Unchecked = user] </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm mt-3 mb-2"> Save </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection