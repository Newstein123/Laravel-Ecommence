@extends('layouts/admin')
@section('title', 'Create Page')
@section('content')

<div class="card">  
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h3>Add Slider </h3> 
            <a href="{{url('admin/slider')}}" class="btn btn-primary btn-sm"> Back </a>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row  justify-content-center">
        <div class="col-lg-6">
            <form action="/admin/slider/{{$sliders->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="title"> Title </label>
                <input type="text" name="title" class="form-control mt-2 mb-3" value="{{$sliders->title}}">
                @error('title')
                    <div class="text-danger mb-2"> * {{$message}}</div>
                @enderror
    
                <label for="description"> Description </label>
                <input type="text" name="description" class="form-control mt-2 mb-3"  value="{{$sliders->description}}">
                @error('description')
                    <div class="text-danger mb-2"> * {{$message}}</div>
                @enderror
                
                @foreach($sliders->images as $image)
                <label for="image"> Current Image </label> <br>
                <img src="{{asset('upload/images/'. $image->path)}}" alt="" width="200px">
                @endforeach
                <br>
                <label for="image"> Add Image </label>
                <input type="file" name="image" class="form-control mt-2 mb-3">
                @error('image')
                    <div class="text-danger mb-2"> * {{$message}}</div>
                @enderror
                
                <label for="status"> Status </label>
                <input type="checkbox" name="status" class=" mt-2 mb-3" {{$sliders->status? 'checked' : ''}}> <br>

                <button type="submit" class="btn btn-primary mt-3"> Save </button>
            </form>
        </div>
    </div>
</div>
@endsection
