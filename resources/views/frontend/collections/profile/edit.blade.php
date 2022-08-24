@extends('layouts/app')
@section('title', 'Edit User Profile Page')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h1> Edit Your Profile </h1>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6">    
                        <form action="/profile/{{auth()->id()}}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')
        
                        @if(auth()->user()->images()->exists())
                        @foreach (auth()->user()->images as $image) 
                        <img src="{{asset('/upload/images/'. $image->path)}}" class="img-fluid ms-5 mt-3 mb-3" alt="..." width="100px">
                      @endforeach
                        @else 
                        <img src="/upload/images/user.png" alt="user" width="100px" class="mt-2 mb-3" >
                        @endif
                        <br>
                        <label for="name"> Username </label>
                        <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{auth()->user()->name}}">
                        <br>
                        @error('name')
                            <div class="text-danger mb-2"> * {{$message}}</div>
                        @enderror
        
                        <label for="email"> Email </label>
                        <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" value="{{auth()->user()->email}}">
                        <br>
                        @error('email')
                            <div class="text-danger mb-2"> * {{$message}}</div>
                        @enderror
                
                        <label for="image"> Add Image </label>
                        <input type="file" name="image" id="" class="form-control @error('image') is-invalid @enderror">
                        <br>
                        @error('image')
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
