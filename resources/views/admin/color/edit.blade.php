@extends('layouts/admin')
@section('title', 'book_index')
@section('content')
      

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3> Edit Color  </h3>
        <a href="{{url('admin/color')}}" class="btn btn-primary btn-sm "> Back </a>
    </div>
    @if(session('message')) 
    <div class="alert alert-success d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
      <div>
        <h3> {{session('message') }}</h3>
      </div>
    </div>
    @endif
    <div class="card-body">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <form action="/admin/color/{{$colors->id}}" method="post">
                @csrf
                @method('PUT')
              <label for="Color Name"> Paper Type </label>
              <input type="text" name="name" class="form-control" value="{{$colors->name}}">
              <br>
              @error('name')
                  <div class="text-danger"> * {{$message}}</div>
              @enderror

              <label for="Color Name"> Paper Code </label>
              <input type="text" name="code" class="form-control" value="{{$colors->code}}">
              <br>
              @error('code')
                  <div class="text-danger"> * {{$message}}</div>
              @enderror
              <label for="Color Name"> Status  </label>
              <input type="checkbox" name="status" width="20px" {{$colors->status? 'checked' : ''}}>
             <br>
                    <button type="submit" class="btn btn-success mt-5"> Update </button>
            </form>
          </div>
        </div>
      </div>
  </div>

@endsection

