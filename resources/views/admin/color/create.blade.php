@extends('layouts/admin')
@section('title', 'color create')
@section('content')
      

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3> Add Color  </h3>
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
            <form action="{{url('admin/color')}}" method="post">
                @csrf
              <label for="Color Name">  Paper Type  </label>
              <input type="text" name="name" class="form-control">
              <br>
              @error('name')
                  <div class="text-danger"> * {{$message}}</div>
              @enderror
              <br>

              <label for="Color Name"> Paper code  </label>
              <input type="text" name="code" class="form-control">
              <br>
              @error('code')
                  <div class="text-danger"> * {{$message}}</div>
              @enderror
              <br>
              <label for="Color Name"> Status  </label>
              <input type="checkbox" name="status" width="20px">
              <span> Checked [hidden] | Uncheck [visible]</span>
             <br>
                    <button type="submit" class="btn btn-success mt-5"> Save </button>
         

            </form>
          </div>
        </div>
      </div>
  </div>

@endsection