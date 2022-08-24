@extends('layouts/admin')
@section('title', 'Create Page')
@section('content')
@include('layouts/include/admin/session')

<div class="card">  
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h3> Slider Home Page  </h3> 
            <a href="{{url('admin/slider/create')}}" class="btn btn-primary btn-sm"> Add Slider </a>
        </div>
    </div>
</div>

<div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th> ID </th>
                <th> Title </th>
                <th> Description </th>
                <th> Image </th>
                <th> Status </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sliders as $slider)
            <tr>
                <td> {{$slider->id}}</td>
                <td> {{$slider->title}}</td>
                <td> {{$slider->description}}</td>
                <td> 
                    @foreach ($slider->images as $image)
                   <img src=" {{asset('upload/images/'.$image->path)}}" alt="sliderimage" width="100%">
                    @endforeach  
                </td>
                <td> {{$slider->status == 1? 'hidden':'visible'}}</td>
                <td>
                    <div class="d-flex">
                        <a href="/admin/slider/{{$slider->id}}/edit"  class="btn btn-success"> Edit </a>
                        <form action="/admin/slider/{{$slider->id}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger ms-3" onclick="return confirm('Are You Sure to delete')"> Delete </button>
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