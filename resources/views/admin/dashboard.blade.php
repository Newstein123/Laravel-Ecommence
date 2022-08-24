@extends('layouts/admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
            @if(session('message')) 
            <div class="alert alert-success d-flex align-items-center" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div>
                <h1> {{session('message') }}</h1>
              </div>
            </div>
            @endif
          </div>
          <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Analytics</p>
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
            <i class="mdi mdi-download text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-clock-outline text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-plus text-muted"></i>
          </button>
          <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col">
          <div class="bg-white rounded" style="height: 120px; width: 200px;">
            <div class="d-flex justify-content-between m-3">
              <div class="text-muted"> Customers </div> <i class="bi bi-people-fill bg-secondary p-2 rounded opacity-75"></i>
            </div>
            <h2 class="text-primary m-3">
              {{$user->count()}}
            </h2>
          </div>
        </div>
        <div class="col">
          <div class="bg-white rounded" style="height: 120px; width: 200px;">
            <div class="d-flex justify-content-between m-3">
              <div class="text-muted"> Orders </div> <i class="bi bi-cart-check-fill bg-secondary p-2 rounded opacity-75"></i>
            </div>
            <h2 class="text-primary m-3"> 63 </h2>
          </div>
        </div>
        <div class="col">
          <div class="bg-white rounded" style="height: 120px; width: 200px;">
            <div class="d-flex justify-content-between m-3">
              <div class="text-muted"> Income  </div> <i class=" bi bi-currency-dollar bg-secondary p-2 rounded opacity-75"></i>
            </div>
            <h2 class="text-primary m-3"> 29000 MMK </h2>
          </div>
        </div>
        <div class="col">
          <div class="bg-white rounded" style="height: 120px; width: 200px;">
            <div class="d-flex justify-content-between m-3">
              <div class="text-muted"> Growth </div> <i class="bi bi-bar-chart bg-secondary p-2 rounded opacity-75"></i>
            </div> 
            <h2 class="text-primary m-3"> +35% </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection