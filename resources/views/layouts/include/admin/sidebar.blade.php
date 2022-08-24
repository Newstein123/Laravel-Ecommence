
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{url('admin/dashboard')}}">
            <i class="mdi mdi-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#category">
            <i class="mdi mdi-circle-outline menu-icon"></i>
            <span class="menu-title"> Categories </span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="category">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/category/create')}}"> Add Categories  </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/category')}}">  View Categories  </a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#book">
            <i class="mdi mdi-book menu-icon"></i>
            <span class="menu-title"> Books </span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="book">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/book/create')}}"> Add Books  </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/book')}}">  View Books  </a></li>
        
            </ul>
          </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{url('admin/color')}}">
            <i class="mdi mdi-chart-pie menu-icon"></i>
            <span class="menu-title"> Avaiable Paper Type  </span>
          </a>
        </li>
  
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{'/login'}}"> Login </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/user/create')}}"> Register </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/user')}}"> View User </a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('admin/slider')}}">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title"> Home Slider </span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="documentation/documentation.html">
            <i class="mdi mdi-settings-outline menu-icon"></i>
            <span class="menu-title"> Site Setting </span>
          </a>
        </li>
      </ul>
    </nav>
    
