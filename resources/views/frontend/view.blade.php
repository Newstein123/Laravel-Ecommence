@extends('layouts/app')
@section('title', 'book')
@section('content')

<div class="container">
  <div class="my-3">
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="{{__('searchbook')}}" name="search" value= {{request('search')}}>
      <button class="btn btn-outline-success" type="submit"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
      </button>
    </form>
  </div>

    <div class="row">
     
      @forelse ($books as $book)
      <div class="col-4 my-2">
        <div class="card newbook" style="width: 18rem;">
            @foreach($book->images as $image)
            <img src="{{asset('upload/images/'. $image->path)}}" class="card-img-top" alt="boo,-img" style="height: 20rem;">
            @endforeach
            <div class="card-body">
              <h1 class="card-title" style="font-size: 20px">{{$book->title}} 
                @foreach($book->categories as $category)
                <span class="badge rounded-pill text-bg-success"> {{$category->name}}</span>
                @endforeach
              </h1>
              <div> Author <i class="bi bi-person-fill"></i> -  {{$book->author}} </div>
             
              {{-- <h3> Overview </h3>
              <p class="card-text"> {{ Str::limit($book->description, 50) }} </p> --}}
              <a href="{{url('/collections/'.$category->slug. '/'. $book->slug)}}" class="btn btn-primary mt-2"> {{__('navbar.viewbook')}} </a>
            </div>
          </div>
    </div>
      @empty
        <h3 class="my-3 text-muted"> No result for this book </h3>  
      @endforelse
    </div>
</div>


@endsection