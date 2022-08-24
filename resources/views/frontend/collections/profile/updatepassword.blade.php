@extends('layouts/app')
@section('title', 'Password Update Page')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h1> Edit Your Password </h1>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form action="/updatepassword/{{auth()->id()}}" method="POST"> 
                        @csrf
                        @method('PUT')
                        {{-- currentpassword --}}
                        <label for="currentpassword"> Current Password </label>
                        <input type="password" name="currentpassword" id="" class="form-control @error('currentpassword') is-invalid @enderror">
                        <br>
                        @error('currentpassword')
                            <div class="text-danger mb-2"> * {{$message}}</div>
                        @enderror
                
                        <label for="newpassword"> Newpassword </label>
                        <input type="password" name="newpassword" id="" class="form-control @error('newpassword') is-invalid @enderror">
                        <br>
                        @error('newpassword')
                            <div class="text-danger mb-2"> * {{$message}}</div>
                        @enderror
        
                        <label for="confirmpassword"> Confirmpassword </label>
                        <input type="password" name="confirmpassword" id="" class="form-control @error('confirmpassword') is-invalid @enderror">
                        <br>
                        @error('confirmpassword')
                            <div class="text-danger mb-2"> * {{$message}}</div>
                        @enderror
        
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success"> Update </button>
                                <a href="{{url('/admin/profile')}}" class="btn btn-danger"> Back </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection