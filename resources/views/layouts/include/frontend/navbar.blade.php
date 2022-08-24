<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto">
                    <h5 class="brand-name"> AstroNewstein </h5>
                </div>
                <div class="col-md-6 my-auto">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                                Astro Newstein 
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
          
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item  ms-5">
                                        <a class="nav-link @if(request()->path()== '/') activetab @endif" href="{{route('homepage')}}"> {{__('navbar.home')}} </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  @if(request()->path()== 'book') activetab @endif" href="{{url('/book')}}">  {{__('navbar.book-all')}} </a>
                                    </li>
                                    @auth
                                    <li class="nav-item">
                                        <a class="nav-link  @if(request()->path()== 'collections') activetab @endif" href="{{url('/collections')}}"> {{__('navbar.gerne')}}</a>
                                    </li>
                                    @endauth
                                    <li class="nav-item">
                                        <a class="nav-link  @if(request()->path()== 'newbook') activetab @endif" href="{{url('/newbook')}}"> {{__('navbar.book-new')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  @if(request()->path()== '#') activetab @endif" href="#"> {{__('navbar.book-best-sell')}}</a>
                                    </li>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-md-4 my-auto">
                    <ul class="nav justify-content-end">
                        
                        <li class="nav-item mt-3">
                            <a class="nav-link" href="#">
                                <i class="fa fa-shopping-cart"></i> {{__ ('navbar.cart')}} (0)
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <a class="nav-link" href="#">
                                <i class="fa fa-heart"></i> {{__ ('navbar.wishlist')}} (0)
                            </a>
                        </li>
                         <!-- Authentication Links -->
                         @guest
                         @if (Route::has('login'))
                             <li class="nav-item mt-3">
                                 <a class="nav-link" href="{{ route('login') }}">{{ __('navbar.login') }}</a>
                             </li>
                         @endif

                         @if (Route::has('register'))
                             <li class="nav-item mt-3">
                                 <a class="nav-link" href="{{ route('register') }}">{{ __('navbar.register') }}</a>
                             </li>
                         @endif
                     @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(auth()->user()->images()->exists())
                                        @foreach (auth()->user()->images as $image) 
                                        <img src="{{asset('/upload/images/'. $image->path)}}" class="ms-5 mt-3 border border-2 border-primary rounded-4" alt="..." width="30px">
                                     @endforeach
                                     @else 
                                    <img src="/upload/images/user.png" alt="user" width="30px" class="mt-2 mb-3" >
                                    @endif
                             {{ Auth::user()->name }} 
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          
                                @if(auth()->user()->role_as == '1')
                                        <li>
                                    
                                             <a class="dropdown-item" href="/admin/profile">
                                            <i class="fa fa-user"></i> {{__('navbar.profile')}} </a>
                                        </li>
                                    <li>
                                        <a class="dropdown-item" href="{{url('admin/dashboard')}}"><i class="fa fa-list"></i>  {{__('navbar.dashboard')}}  </a>
                                    </li>
                                @else
                            <li> 
                                <a class="dropdown-item" href="/profile">
                             <i class="fa fa-user"></i>  {{__('navbar.profile')}}  </a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i>  {{__('navbar.myorder')}} </a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i>  {{__('navbar.mywishlist')}}  </a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i>  {{__('navbar.mycart')}} </a></li>
                            <li>
                        
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>  {{ __('navbar.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                            </ul>
                        </li>
                    </ul>
                    @endguest
                </div>
                {{-- <div class="col-md-12">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                           {{ __('navbar.language')}}
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="/my">{{ __('navbar.myanmar') }} </a></li>
                          <li><a class="dropdown-item" href="/en"> {{ __('navbar.english')}} </a></li>
                        
                        </ul>
                      </div>
                </div> --}}
             
                
              
            </div>
        </div>
    </div>
   
</div>