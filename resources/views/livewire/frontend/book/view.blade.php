<div class="container">
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
    <div class="row">
      <div class="col-4">
       @foreach ($books->images as $image)
           <img src="{{asset('/upload/images/'. $image->path)}}" alt="" class="img-fluid my-4">
       @endforeach
      </div>
      <div class="col-8">
        <div class="d-flex justify-content-between mt-5"> 
          <h5 class="text-primary"> {{$books->title}}</h5>
          @if($books->quantity == 0) 
          <span class="badge text-bg-danger text-white text-danger"> ပစ္စည်းကုန်နေသည် </span>
         @else
          <span class="badge text-bg-success  text-center"> In Stock </span>
          @endif
        </div>
        <hr>
        <div class="my-2">
          <p> Home/ Book/ {{Str::ucfirst($category->slug)}} / {{Str::ucfirst($books->title)}}  </p>
          
         <h5> Author By {{$books->author}}</h5>
         <span class="fs-2"> {{$books->sprice}} MMK </span> 
          <strike class="text-danger">  {{$books->price}} MMK </strike> <br>
      
            <p class="text-primary"> Paper Type </p>
            @foreach($books->colors as $color)
            <input type="radio" name="papertype" class="form-check-input" value="{{$color->id}}"> {{$color->name}}
            @endforeach
          
        
         <div class="d-flex">
          <div class="my-3">
            <span class="btn btn-outline-primary"> - </span>
            <input type="text" value="1" style="width: 100px; border-radius: 10px; padding:5px; border-color:lightblue">
          <span class="btn btn-outline-primary"> + </span>
           </div>
           <div class="mt-3 ms-5">
            In Stock Quantity <span class="bg-primary text-white p-2 rounded"> {{$books->quantity}} </span> 
           </div>
         </div>
         
          <div class="mt-2">
            <a href="" class="btn btn-outline-primary btn-sm"> <i class="fa fa-shopping-cart"></i> Add to Cart</a>
            <button type='button' class="btn btn-outline-primary btn-sm" wire:click="addToWishlist({{$books->id}})"> 
            <span wire:loading.remove> <i class="fa fa-heart"></i>Add to Wishlist </span>
            <span wire:loading wire:target="addToWishlist"> Adding to wishlist </span>
            </button>
          </div>
         <div class="my-3">
          <h3> Overview </h3>
          <hr>
        <p> {{$books->description}}</p>
         </div>
        </div>
      </div>
    </div>
</div>
