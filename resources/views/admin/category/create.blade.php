@extends('layouts/admin')
@section('title', 'Create Page')
@section('content')

    
        <div class="d-flex justify-content-between">
            <h3> Category </h3>
            <div class="btn btn-primary btn-sm">
                <a href="/admin/category" class="text-decoration-none text-white"> Back </a>
            </div>
            </div>
            <hr>

   
            
            <form action="{{url('/admin/category')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center align-items-center container">  
                  
                        <div class="col-lg-6  mt-3">
                            <label for="name"> Name </label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <br>
                        @error('name')
                            <div class="text-danger"> * {{$message}}</div>
                        @enderror
                        <div class="col-lg-6 mt-3">
                            <label for="slug"> Slug </label>
                        <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
                        </div>    
                        @error('slug')
                        <div class="text-danger"> * {{$message}}</div>
                    @enderror
                   
            
            <div class="col-lg-12 mt-3">
                <label for="name"> Description </label>
           <textarea name="description" id="" cols="30" rows="10" class="form-control"> {{old('description')}}</textarea>
           <br>
           @error('description')
                        <div class="text-danger"> * {{$message}}</div>
                    @enderror
            </div>
            <div class="col-lg-6 mt-3">
                <label for="slug"> Image </label>
            <input type="file" name="image" class="form-control">
            </div>
            <br>
            @error('image')
                        <div class="text-danger"> * {{$message}}</div>
                    @enderror

             <div class="col-lg-6 mt-3">
                <label for="slug"> Status </label>
            <input type="checkbox" name="status">
            <br>
            </div>
            <br>
            <div class="col-lg-12">
                <h1> SEO Tags </h1>
            </div>
             <div class="col-lg-12 mt-3">
                <label for="slug"> Meta_title </label>
            <input type="text" name="meta_title" class="form-control">
            </div> 
            <br>
            @error('meta_title')
                        <div class="text-danger"> * {{$message}}</div>
                    @enderror

            <div class="col-lg-12 mt-3">
                <label for="slug"> Meta_keyword </label>
            <input type="text" name="meta_keyword" class="form-control">
            </div>
            @error('meta_keyword')
            <div class="text-danger"> * {{$message}}</div>
        @enderror

             <div class="col-lg-12 mt-3">
                <label for="slug"> Meta_description </label>
            <input type="text" name="meta_description" class="form-control">
            </div>
            <br>
            @error('meta_description')
            <div class="text-danger"> * {{$message}}</div>
        @enderror
           
            <button type="submit" class="btn btn-primary mt-3 w-25"> Save </button>
          
        
            </form>
        </div>

@endsection