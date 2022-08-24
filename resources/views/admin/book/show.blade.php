
@extends('layouts/admin')
@section('title', 'book_index')
@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card" style="width: 65rem;">
        <div class="d-flex">
          @if ($books->images()->exists())
          @foreach ($books->images as $image) 
          <img src="{{asset('/upload/images/'. $image->path)}}" width="300px"  class="ms-5 mt-3" alt="...">
        @endforeach
        @endif
            <div class="card-body">
              <h5 class="card-title">{{$books->title}}
  
             @foreach($books->categories as $category)            
             <span class="badge rounded-pill text-bg-success"> 
                {{$category->name}}
             </span>
                @endforeach
            </h5> 

            <div class=" card-text mt-3 mb-3"> ရရှိနိုင်သော စာရွက်အမျိုးအစားနှင့် ပုံစံ </div>
            <select class="form-select form-select-sm mb-4 w-50" aria-label=".form-select-sm example">
              <option value="" selected> စာရွက်အမျိုးအစား</option>
              @foreach($books->colors as $color)
              <option value="{{$color->id}}" disabled>{{$color->name}}</option>
              @endforeach
            </select>
            
             
              <div class="card-text">
                <div>
                  <h5> အကျဉ်းချုပ် </h5> 
                  <hr>
                  <p>{{Str::limit($books->description, 200, '...see more')}}</p>
                </div>
                <div class="text-dark mt-2"> စာရေးသူ၏အမည် = {{$books->author}}</div>
                
               
                <div class="text-dark mt-2"> စာမျက်နှာအရေအတွက် =  {{$books->pages}} ရွက် </div>
               
                @if($books->price)
                <div class="text-danger mt-2"> <strike>မူရင်းတန်ဖိုး = {{$books->price}} MMK</strike> </div>
                @else 
                ''
                @endif
                <div class="text-primary mt-2"> ယခုတန်ဖိုး = {{$books->sprice}} MMK </div>
              </div>
              
             <div class="d-flex justify-content-between">
                <a href="{{url('admin/book')}}" class="btn btn-primary mt-3"> Back </a>
                <a href="/admin/book/{{$books->id}}/edit" class="btn btn-success mt-3"> Edit </a>
             </div>
            </div>
          
        </div>
         
    </div>
</div>
</div>
@endsection