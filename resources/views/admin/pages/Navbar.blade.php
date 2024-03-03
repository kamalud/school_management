<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
      @if (Auth::user()->user_type == 1)
      <li class="nav-item">
        <a href="{{ route('admin') }}" class="nav-link @if (Request::segment(2) =="dashboard") active  @endif">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin_list') }}" class="nav-link @if (Request::segment(2) =="list") active  @endif">
          <i class="nav-icon fas fa-user"></i>
          <p>
            Admin list
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('addCategory') }}" class="nav-link @if (Request::segment(2) =="category") active  @endif">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Category
          </p>
        </a>
      </li>
      @elseif (Auth::user()->user_type == 2)
        
      <li class="nav-item">
        <a href="{{ route('school') }}" class="nav-link @if (Request::segment(2) =="dashboard") active  @endif">
          <i class="nav-icon fas fa-th"></i>
          <p>
            School 
          </p>
        </a>
      </li>
      @elseif (Auth::user()->user_type == 3)
      <li class="nav-item">
        <a href="{{ route('teacher') }}" class="nav-link @if (Request::segment(2) =="dashboard") active  @endif">
          <i class="nav-icon fas fa-th"></i>
          <p>
           Teacher 
          </p>
        </a>
      </li>
      @elseif (Auth::user()->user_type == 4)
      
      <li class="nav-item">
        <a href="{{ route('parent') }}" class="nav-link @if (Request::segment(2) =="dashboard") active  @endif">
          <i class="nav-icon fas fa-th"></i>
          <p>
           Parent 
          </p>
        </a>
      </li>
      @elseif (Auth::user()->user_type == 5)

      <li class="nav-item">
        <a href="{{ route('student') }}" class="nav-link @if (Request::segment(2) =="dashboard") active  @endif">
          <i class="nav-icon fas fa-th"></i>
          <p>
           Student 
          </p>
        </a>
      </li>
      @endif

    </ul>
  </nav>