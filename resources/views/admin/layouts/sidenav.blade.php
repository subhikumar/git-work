<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2"><b>{{ (Auth::user()->name) }}</b></span>
            <span class="text-secondary text-small"><b>My Blog</b></span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard')}}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link"  href="{{route('index.post')}}" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Posts</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link"  href="{{route('index.page')}}" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Pages</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link"  href="{{route('index.contact')}}" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Contact us</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link"  href="{{route('index.comment')}}" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Comments</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
      </li>
    </ul>
  </nav>
