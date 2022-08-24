
@extends('layouts/admin')
@section('title', 'book_index')
@section('content')
{{-- book header  --}}

<div>
    <div class="d-flex justify-content-between">
        <h3> Add Book </h3>
        <div class="btn btn-primary btn-sm">
           <a href="{{url('admin/book/index')}}" class="text-decoration-none text-white">   Back  </a>
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
      <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="true"> Details </button>
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
        <form action="/admin/book" method="post" enctype="multipart/form-data" >
            @csrf
           
         <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <label for="book"> Book Title </label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                                    <br>
                                    @error('title')
                                    <div class="text-danger"> * {{$message}}</div>
                                    @enderror

                                    <label for="book"> Slug </label>
                                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug')}}">
                                    <br>
                                    @error('slug')
                                    <div class="text-danger"> * {{$message}}</div>
                                    @enderror

                                    <label for="book"> Book Author </label>
                                    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{old('author')}}">
                                    <br>
                                    @error('author')
                                    <div class="text-danger"> * {{$message}}</div>
                                    @enderror
                                    
                                    
                                    <label for="price"> Book Description </label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                                    <br> 
                                    @error('description')
                                    <div class="text-danger"> * {{$message}}</div>
                                    @enderror
                                <button type="submit" class="btn btn-primary"> Save </button>
                            </div>
    </div>
</div>
    {{-- home tab ends  --}}

    {{-- Detail start --}}
<div class="tab-pane fade" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
        <div class="row justify-content-center">
            <div class="col-lg-6">
            <label for="price"> Original Price </label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value=" {{old('price')}}"> 
            <br> 
            @error('price')
            <div class="text-danger"> * {{$message}}</div>
            @enderror

            <label for="price"> Selling Price </label>
            <input type="number" name="sprice" class="form-control @error('sprice') is-invalid @enderror" value=" {{old('sprice')}}"> 
            <br> 
            @error('sprice')
            <div class="text-danger"> * {{$message}}</div>
            @enderror
       
            <label for="pages"> Book Pages </label>
            <input type="number" name="pages" class="form-control @error('pages') is-invalid @enderror" value="{{old('pages')}}">
            <br> 
            @error('pages')
            <div class="text-danger"> * {{$message}}</div>
            @enderror

            <label for="pages"> Quantity </label>
            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{old('quantity')}}">
            <br> 
            @error('quantity')
            <div class="text-danger"> * {{$message}}</div>
            @enderror
             </div>
            </div>
            
</div>
     {{-- Detail ends --}}

    {{-- soe tab starts  --}}
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <div class="col-lg-12">
            <h1> SEO Tags </h1>
        </div>
         <div class="col-lg-12 mt-3">
            <label for="slug"> Meta_title </label>
        <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}">
        </div> 
        <br>
        @error('meta_title')
            <div class="text-danger"> * {{$message}}</div>
        @enderror

        <div class="col-lg-12 mt-3">
            <label for="slug"> Meta_keyword </label>
        <input type="text" name="meta_keyword" class="form-control" value="{{old('meta_keyword')}}">
        </div>
        @error('meta_keyword')
        <div class="text-danger"> * {{$message}}</div>
        @enderror

        <div class="col-lg-12 mt-3">
        <label for="slug"> Meta_description </label>
        <input type="text" name="meta_description" class="form-control" value="{{old('meta_description')}}">
        </div>
        <br>
        @error('meta_description')
        <div class="text-danger"> * {{$message}}</div>
        @enderror
    </div>

    {{-- soe tab ends  --}}

    {{-- book Genre starts  --}}
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        <label for="category"> <h1 class="text-primary mb-3"> Book Genre </h1> </label>
        <select class="form-select @error('category_ids') is-invalid @enderror" multiple aria-label="multiple select example" name="category_ids[]">
            @foreach ($categories as $category)
            <option value="{{$category->id}}" 
                @if(in_array($category->id, old('category_ids', [])))
                selected
                @endif
                >{{$category->name}}</option>
            @endforeach
           
          </select>
          <br>
          @error('category_ids')
          <div class="text-danger"> * {{$message}}</div>
      @enderror
    </div>
    {{-- book genre ends  --}}

    {{-- book image tab starts  --}}
    <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
        <label for="image"><h1 class="text-primary mb-3 mt-2"> Add Cover Image </h1></label>    
        <input type="file" name="image" id="" class="form-control @error('image') is-invalid @enderror">
        <br>
        @error('image')
        <div class="text-danger"> * {{$message}}</div>
    @enderror
    </div>
    {{-- book image tab ends  --}}

    {{-- paper tab starts  --}}
    <div class="tab-pane fade" id="paper-tab-pane" role="tabpanel" aria-labelledby="paper-tab" tabindex="0">
            <label for="colors"> <h3 class="text-primary"> Avaiable Paper Type and Format</h3> </label>
            <br>
        @forelse ($colors as $color)
            <input type="checkbox" name="color_ids[]" value="{{$color->id}}" class="mt-2"
            @if(in_array($color->id, old('color_ids', [])))
            @checked(true)
             @endif
            > <span>{{$color->name}}</span>
           
            <br>
        @empty
            <h3> No Colors Added </h3>
        @endforelse
        @error('color_ids')
        <div class="text-danger"> * {{$message}}</div>
        @enderror
    </div>
    {{-- paper tab ends  --}}
  </div>

   {{-- // books tabs end // --}}
                    
    </div>
    </form>         
    

@endsection