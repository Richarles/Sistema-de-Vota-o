<a class="nav-link dropdown-toggle"
        href="#"
        id="userDropdown"
        role="button"
        data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" href="#">
    <span class="mr-2 d-none d-lg-inline text-black-600 small">{{ $name }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lefth shadow animated--grow-in"
    aria-labelledby="userDropdown">
    <a class="dropdown-item" href="{{ $index }}">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        {{ $list }}
    </a>
    <a class="dropdown-item" data-token="{{ csrf_token() }}" href="{{ $add }}">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        {{ $addName }}
    </a>
    {{-- <a class="dropdown-item" href="javascript:void" onclick="$('#logout-form').submit();">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        {{ $addName }}
    </a>
    <form id="logout-form" action="{{ route('login.logout') }}" method="POST" style="display: none;">
        @csrf
    </form> --}}
    <div class="dropdown-divider"></div>
    </div>

     @isset($addLogout)
     {{-- <a class="dropdown-item" href="{{ route('logout') }}" > 
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
      Logout     
          <form method="POST" action="{{ route('login.logout') }}">
          @csrf
          @method('POST')
          <button type="submit" class="btn btn-primary">Logout</button>
      </form>    
    </a> --}}
    {{-- <div class="dropdown-divider"></div>
     <a class="dropdown-item" href="{{ route('logout') }}" >
         <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
       Logout     
           <form method="POST" action="{{ $addLogout }}">
           @csrf
           @method('POST')
           <button type="submit" class="btn btn-primary">Logout</button>
       </form>   --}}
    @endisset
