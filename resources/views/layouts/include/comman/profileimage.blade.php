<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h1> Profile Setting </h1>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
        
                        @if(auth()->user()->images()->exists())
                        @foreach (auth()->user()->images as $image) 
                            <img src="{{asset('/upload/images/'. $image->path)}}" class="card-img-top w-50 ms-5 mt-3 mb-3 border border-2 border-primary rounded-4" alt="..." width="100px">                   
                        @endforeach
                        @else 
                        <img src="/upload/images/user.png" alt="user" width="100px" class="mt-2 mb-3" >
                        @endif
                       
                      
                       
                      
                    