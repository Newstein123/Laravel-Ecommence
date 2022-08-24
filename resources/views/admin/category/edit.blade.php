@extends('layouts/admin')

@section('content')

    
        <div class="d-flex justify-content-between">
            <h3> Update Your Category </h3>
            <div class="btn btn-primary btn-sm">
                <a href="/admin/category" class="text-decoration-none text-white"> Back </a>
            </div>
            </div>
            <hr>

   
            <div class="row justify-content-center align-items-center container">  
            <form action="/admin/category/{{$category->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
                    <div class="col-lg-6  mt-3">
                        <label for="name"> Name </label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                    </div>
                    <br>
                    @error('name')
                        <div class="text-danger"> * {{$message}}</div>
                    @enderror
                    <div class="col-lg-6 mt-3">
                        <label for="slug"> Slug </label>
                    <input type="text" name="slug" class="form-control"  value="{{$category->slug}}">
                    </div>    
                    @error('slug')
                    <div class="text-danger"> * {{$message}}</div>
                @enderror
            
            <div class="col-lg-6 mt-3">
                <label for="name"> Description </label>
           <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$category->description}}</textarea>
           <br>
           @error('description')
                        <div class="text-danger"> * {{$message}}</div>
                    @enderror
            </div>
            <div class="col-lg-6 mt-3">

                <h3> Current Image </h3>
                <img src="{{asset('/upload/images/'.$category->image)}}" alt="" width="200px"> <br>
                <label for="slug" class="mt-3"> Add Image </label>   
            <input type="file" name="image" class="form-control">
            </div>
            <br>
            @error('image')
                        <div class="text-danger"> * {{$message}}</div>
                    @enderror

             <div class="col-lg-6 mt-3">
                <label for="slug"> Status </label>
            <input type="checkbox" name="status" value="{{$category->status}}">
            </div>
            <br>
            <div class="col-lg-12">
                <h1> SEO Tags </h1>
            </div>
             <div class="col-lg-6 mt-3">
                <label for="slug"> Meta_title </label>
            <input type="text" name="meta_title" class="form-control" value="{{$category->meta_title}}">
            </div> 
            <br>
            @error('meta_title')
                        <div class="text-danger"> * {{$message}}</div>
                    @enderror

            <div class="col-lg-6 mt-3">
                <label for="slug"> Meta_keyword </label>
            <input type="text" name="meta_keyword" class="form-control" value="{{$category->meta_keyword}}">
            </div>
            @error('meta_keyword')
            <div class="text-danger"> * {{$message}}</div>
        @enderror

             <div class="col-lg-6 mt-3">
                <label for="slug"> Meta_description </label>
            <input type="text" name="meta_description" class="form-control" value="{{$category->meta_description}}">
            </div>
            <br>
            @error('meta_description')
            <div class="text-danger"> * {{$message}}</div>
        @enderror
           <button type="submit" class="btn btn-primary mt-3"> Update </button>
        
            </form>
        </div>

@endsection