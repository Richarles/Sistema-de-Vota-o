<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
            height="15"
            alt="MDB Logo"
            loading="lazy"
          />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            @include('components.nav-li', ['name' => 'Candidato',
                                         'list' => 'Lista de Candidatos',
                                         'add' => route('candidate.create'),
                                         'index' => route('candidate.pagination'),
                                         'addName' => 'Adicionar Candidato',
                                         ])
          </li>
          <li class="nav-item">
            @include('components.nav-li', ['name' => 'Eleitor',
                                         'list' => 'Lista de Eleitor',
                                         'add' => route('voter.create'),
                                         'index' => route('voter.pagination'),
                                         'addName' => 'Adicionar Eleitor',
                                         ])
          </li>
          <li class="nav-item">
            @include('components.nav-li', ['name' => 'Votação',
                                         'list' => 'Lista de Votação',
                                         'add' => route('voting.create'),
                                         'index' => route('voting.index',[Auth::user()->id]),
                                         'addName' => 'Adicionar Candidatos',
                                         ])
          </li>
          
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      <div class="d-flex align-items-center">
        
    <!-- Container wrapper -->
    <li class="nav-item dropdown no-arrow">
      @include('components.nav-li', [ 'name'    => Auth::user()->name,
                                      'list'    => 'Editar Usuário',
                                      'addLogout'     => '',
                                      'add' => route('login.logout'),
                                      'index'   => route('user.edit',[Auth::user()->id]),
                                      'addName' => 'sair',
                                    ])
        {{-- <a
        class="nav-link dropdown-toggle"
        href="#"
        id="userDropdown"
        role="button"
        data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false"
      >
            <span class="mr-2 d-none d-lg-inline text-black-600 small">{{Auth::user()->name}}</span>
            {{-- <img class="img-profile rounded-circle"
                src="img/undraw_profile.svg"> --}}
        {{-- </a> --}}
        <!-- Dropdown - User Information -->
        {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a> --}} 
            
              {{-- <div class="dropdown-divider"></div>
             <a href="javascript:void" onclick="$('#logout-form').submit();">
              Logout
          </a>
          
          <form id="logout-form" action="{{ route('login.logout') }}" method="POST" style="display: none;">
              @csrf
          </form> --}}

              {{-- <a class="dropdown-item" href="{{ route('logout') }}" > 
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout     
                    <form method="POST" action="{{ route('login.logout') }}">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>    
              </a>   --}}
        </div>
    </li>
  </nav>
  <!-- Navbar -->
