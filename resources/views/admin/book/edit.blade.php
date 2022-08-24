

@extends('layouts/admin')
@section('title', 'book_index')
@section('content')
{{-- book header  --}}

<div>
    <div class="d-flex justify-content-between">
        <h3>  Edit Book </h3>
        <div class="btn btn-primary btn-sm">
           <a href="{{url('admin/book')}}" class="text-decoration-none text-white">   Back  </a>
        </div>
        </div>
        <hr>
    </div>
 {{-- book header end  --}}

 {{-- book tab start  --}}

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"> Home </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="false"> Details  </button>
      </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"> SOE Tags </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"> Book Genre </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false" > Book Image </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="paper-tab" data-bs-toggle="tab" data-bs-target="#paper-tab-pane" type="button" role="tab" aria-controls="paper-tab-pane" aria-selected="false" > Avaiable Paper Type  </button>
    </li>
  </ul>
  <div class="card-body">
  <div class="tab-content" id="myTabContent">
    {{-- home tab starts  --}}
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <form action="/admin/book/{{$books->id}}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
         <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <label for="book"> Book Title </label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$books->title}}">
                                    <br>
                                    @error('title')
                                        <div class="text-danger"> * {{$message}}</div>
                                    @enderror

                                    <label for="book"> Book Slug </label>
                                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{$books->slug}}">
                                    <br>
                                    @error('slug')
                                        <div class="text-danger"> * {{$message}}</div>
                                    @enderror


                                    <label for="price"> Book Author </label>
                                    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ $books->author}}"> 
                                    <br> 
                                    @error('author')
                                    <div class="text-danger"> * {{$message}}</div>
                                @enderror
    
                                    <label for="description"> Book Description </label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{$books->description}}</textarea>
                                    <br> 
                                    @error('description')
                                    <div class="text-danger"> * {{$message}}</div>
                                    @enderror
   
                                <button type="submit" class="btn btn-primary"> Save </button>
                            </div>
    </div>
</div>
    {{-- home tab ends  --}}

    {{-- detail tab starts  --}}
    <div class="tab-pane fade" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
        <div class="row justify-content-center">
            <div class="col-lg-6">
            <label for="price"> Original Price </label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$books->price}}"> 
            <br> 
            @error('price')
            <div class="text-danger"> * {{$message}}</div>
            @enderror

            <label for="sprice"> Selling Price </label>
            <input type="number" name="sprice" class="form-control @error('sprice') is-invalid @enderror" value="{{$books->sprice}}"> 
            <br> 
            @error('sprice')
            <div class="text-danger"> * {{$message}}</div>
            @enderror
       
            <label for="pages"> Book Pages </label>
            <input type="number" name="pages" class="form-control @error('pages') is-invalid @enderror" value="{{$books->pages}}">
            <br> 
            @error('pages')
            <div class="text-danger"> * {{$message}}</div>
            @enderror

            <label for="pages"> Quantity </label>
            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{$books->quantity}}">
            <br> 
            @error('quantity')
            <div class="text-danger"> * {{$message}}</div>
            @enderror
             </div>
            </div>
            
</div>
    {{-- detail tab ends  --}}

    {{-- soe tab starts  --}}
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <div class="col-lg-12">
            <h1> SEO Tags </h1>
        </div>
         <div class="col-lg-12 mt-3">
            <label for="slug"> Meta_title </label>
        <input type="text" name="meta_title" class="form-control" value="{{ $books->meta_title}}">
        </div> 
        <br>
        @error('meta_title')
            <div class="text-danger"> * {{$message}}</div>
        @enderror

        <div class="col-lg-12 mt-3">
            <label for="slug"> Meta_keyword </label>
        <input type="text" name="meta_keyword" class="form-control" value="{{$books->meta_keyword}}">
        </div>
        @error('meta_keyword')
        <div class="text-danger"> * {{$message}}</div>
        @enderror

        <div class="col-lg-12 mt-3">
        <label for="slug"> Meta_description </label>
        <input type="text" name="meta_description" class="form-control" value="{{$books->meta_description}}">
        </div>
        <br>
        @error('meta_description')
        <div class="text-danger"> * {{$message}}</div>
        @enderror
    </div>

    {{-- soe tab ends  --}}

    {{-- book Genre starts  --}}
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        <label for="category"> Genres </label>
        <select class="form-select" multiple aria-label="multiple select example" name="category_ids[]">
           
            @foreach ($categories as $category)
            <option value="{{$category->id}}"
                @if(in_array($category->id, old('category_ids', $oldcategories)))
                selected
                @endif
                >{{$category->name}}</option>
            @endforeach
           
          </select>
          @error('category_ids')
          <div class="text-danger mt-2"> * {{$message}}</div> 
       @enderror
    </div>
    {{-- book genre ends  --}}

    {{-- book image tab starts  --}}
    <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
        <h3> Current Image </h3>
        @if ($books->images()->exists())
@foreach ($books->images as $image) 
<img src="{{asset('/upload/images/'. $image->path)}}" class="card-img-top w-25 ms-5 mt-3" alt="...">
@endforeach
@endif
        <br>
        <br>
        <label for="image"> Add Cover Image </label>    
        <input type="file" name="image" id="" class="form-control">
        @error('image')
        <div class="text-danger mt-2"> * {{$message}}</div> 
     @enderror
        <br>
    </div>
    {{-- book image tab ends  --}}

    {{-- paper tab starts  --}}
    <div class="tab-pane fade" id="paper-tab-pane" role="tabpanel" aria-labelledby="paper-tab" tabindex="0">
            <label for="colors"> <h3 class="text-primary"> Avaiable Paper Type and Format</h3> </label>
            <br>
        @forelse ($colors as $color)
            <input type="checkbox" name="color_ids[]" value="{{$color->id}}"
            @if(in_array($color->id, old('color_ids', $oldcolors)))
                @checked(true)
            @endif
         class="mt-2"> <span>{{$color->name}}</span>
            <br>
        @empty
            <h3> No Colors Added </h3>
        @endforelse
    </div>
    {{-- paper tab ends  --}}
  </div>

   {{-- // books tabs end // --}}
                    
    </div>
    </form>         
    

@endsection

{{-- @extends('layouts/admin')
@section('title', 'book_index') --}}
{{-- @section('content')

    <div>
        @if(session('message')) 
    <div class="alert alert-success d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
      <div>
        <h3> {{session('message') }}</h3>
      </div>
    </div>
    @endif
    <div class="d-flex justify-content-between">
        <h3> Add Book </h3>
        <div class="btn btn-primary btn-sm">
           <a href="{{url('admin/book')}}" class="text-decoration-none text-white">   Back  </a>
        </div>
        </div>
                
                <hr>
                    </div>
                    <div class="card-body">
            
                        <form action="/admin/book/{{$books->id}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <label for="book"> Book Title </label>
                                <input type="text" name="title" class="form-control" value="{{$books->title}}">
                                @error('title')
                                   <div class="text-danger mt-2"> * {{$message}}</div> 
                                @enderror
                                <br>
                                <label for="price"> Book Price </label>
                                <input type="number" name="price" class="form-control" value="{{$books->price}}">
                                @error('price')
                                <div class="text-danger mt-2"> * {{$message}}</div> 
                             @enderror 
                                <br> 
                                <label for="price"> Book Description </label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{$books->description}}</textarea>
                                @error('description')
                                <div class="text-danger mt-2"> * {{$message}}</div> 
                             @enderror
                                <br> 
                                <div class="col-lg-12">
                                    <h1> SEO Tags </h1>
                                </div>
                                 <div class="col-lg-6 mt-3">
                                    <label for="slug"> Meta_title </label>
                                <input type="text" name="meta_title" class="form-control" value="{{$books->meta_title}}">
                                </div> 
                                <br>
                                @error('meta_title')
                                            <div class="text-danger"> * {{$message}}</div>
                                        @enderror
                    
                                <div class="col-lg-6 mt-3">
                                    <label for="slug"> Meta_keyword </label>
                                <input type="text" name="meta_keyword" class="form-control" value="{{$books->meta_keyword}}">
                                </div>
                                @error('meta_keyword')
                                <div class="text-danger"> * {{$message}}</div>
                            @enderror
                    
                                 <div class="col-lg-6 mt-3">
                                    <label for="slug"> Meta_description </label>
                                <input type="text" name="meta_description" class="form-control" value="{{$books->meta_description}}">
                                </div>
                                <br>
                                @error('meta_description')
                                <div class="text-danger"> * {{$message}}</div>
                            @enderror
                                <h3> Current Image </h3>
                                @if ($books->images()->exists())
                       @foreach ($books->images as $image) 
                       <img src="{{asset('/upload/images/'. $image->path)}}" class="card-img-top w-50 ms-5 mt-3" alt="...">
                      @endforeach
                      @endif
                                <br>
                                <br>
                                <label for="image"> Add Cover Image </label>    
                                <input type="file" name="image" id="" class="form-control">
                                @error('image')
                                <div class="text-danger mt-2"> * {{$message}}</div> 
                             @enderror
                                <br>
                                <label for="category"> Genres </label>
                                <select class="form-select" multiple aria-label="multiple select example" name="category_ids[]">
                                   
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}"
                                        @if(in_array($category->id, old('category_ids', $oldcategories)))
                                        selected
                                        @endif
                                        >{{$category->name}}</option>
                                    @endforeach
                                   
                                  </select>
                                  @error('category_ids')
                                  <div class="text-danger mt-2"> * {{$message}}</div> 
                               @enderror
                                  <br>
                                  <button type="submit" class="btn btn-primary"> Save </button>
                            </div>
                        </div>
                    </form>
                 
              
    </div>
    

@endsection --}}