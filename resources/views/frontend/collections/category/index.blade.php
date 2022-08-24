@extends('layouts/app')
@section('title', 'Category Page')

@section('content')

<div class="container px-4 text-center">
  <div class="my-3">
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search Book Genre" name="search" value= {{request('search')}}>
      <button class="btn btn-outline-success" type="submit"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
      </button>
    </form>
  </div>
    <div class="row gx-5">
        @forelse ($categories as $category)
        <div class="col">
        <div class="card newbook mt-3" style="width: 18rem;">
     <img src="{{asset($category->image)}}" class="card-img-top" alt="..."  style="height: 18rem;">
     <div class="card-body">
       <h5 class="card-title"> {{$category->name}}</h5>
       <p class="card-text">
         {{$category->description}}
       </p>
      
       <div class="d-flex justify-content-between">
         @if(!auth()->user()->role_as == '1')
         <a href="/collections/{{$category->slug}}" class="btn btn-primary"> {{__('navbar.viewbook')}} </a> 
         @else
         <a href="/admin/category/{{$category->id}}/edit" class="btn btn-success text-decoration-none text-dark"> Edit </a>
         <a href="{{url('/admin/category')}}" class="btn btn-primary"> View </a>
         <form action="/admin/category/{{$category->id}}" method="post" onclick="return confirm('Are You Sure to delete')">
           @csrf
           @method('DELETE')
           <button type="submit" class="btn btn-danger"> Delete </button>
         </form>
         @endif
     </div>
     </div>
     </div>
    </div>
     @empty
     <h3 class="my-2 text-muted" > No result for this genre </h3>  
     @endforelse
    </div>
  </div>

@endsection
