<div class="row">
    @forelse ($books as $book)
    <div class="col-md-4">
    <div class="card .newbook mt-3" style="width: 20rem;">
      <div class="card-header"> 
        @if($book->quantity < 0)
        <h5 class="text-danger"> {{__('In Stock')}} </h5>
        @else 
        <h5 class="text-success">  {{__('Out of Stock')}} </h5>
        @endif
        </div>
        @foreach ($book->images as $image)
        <img src="{{asset('upload/images/'. $image->path)}}" class="card-img-top" alt="..." height="200px">
        @endforeach
 <div class="card-body">
   <h5 class="card-title"> {{$book->title}} by <span class="text-primary">{{$book->author}}</span> </h5>
   <p class="card-text" style="font-size: 12px">
    {{Str::limit($book->description, 100, '...see more')}}
   </p>
   <div class="text-danger">  {{__('Original Price')}}  <strike>  {{$book->price}} MMK</strike>  </div>
   <div class="text-primary"> {{__('Selling Price')}}  {{$book->sprice}} MMK   </div>

   <div class="d-flex justify-content-between mt-3">
    <a href="" class="btn btn-primary text-decoration-none text-white"> {{__('Add To Cart')}}  </a>
    <a href="" class="btn btn-success text-decoration-none text-white"> <i class="fa fa-heart"></i> </a>
  
   <a href="{{url('/collections/'.$category->slug. '/'. $book->slug)}}" class="btn btn-primary" > {{__('View')}}  </a>


 </div>
 </div>
 </div>
</div>
 @empty
 <h3> Not Avaiable Now  </h3>  
 @endforelse
</div>
