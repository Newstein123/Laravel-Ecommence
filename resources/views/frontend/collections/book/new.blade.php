@extends('layouts/app')
@section('title', 'New Released Books')
@section('content')
<div class="container">

  <div class="container">
  <div class="row justify-content-center">
    <h1 class="text-center text-secondary"> New Released Books </h1>
    @foreach ($books as $book)
    <div class="col-md-3 my-3 mx-4">
    <div class="card bg-light align-items-center " style="width: 18rem; height: 30rem">
      
    @foreach ($book->images as $image)
    <img src="{{asset('upload/images/'. $image->path)}}" style="width: 16rem; height: 20rem;" class="card-img-top mt-2">
    <div class="cart bg-light">
      <div class="row justify-content-center">
       <div class="col-lg-8">
           <div class="cart-button">
            <h5 class="btn btn-primary d-block mb-3"> <i class="fa fa-shopping-cart"></i> Add To Cart </h5>
           <h5 class="btn btn-primary d-block">  <i class="fa fa-heart"></i> Wishlist </h5>   
            </div> 
       </div>
      </div>       
   </div>
    @endforeach
     
      <div class="card-body text-center"> 
          <div class="card-title">
              {{$book->title}}
          </div>
       
              <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-half text-warning"></i>
       
        <p class="card-text">{{$book->sprice}} MMK </p>
      </div>
     </div>
    </div>
    @endforeach
    </div>
</div>
@endsection