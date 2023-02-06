<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
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
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
            height="15"
            alt="MDB Logo"
            loading="lazy"
          />
        </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            @include('components.nav-li', [ 'name'    => 'Candidato',
                                            'list'    => 'Lista de Candidatos',
                                            'add'     => route('candidate.create'),
                                            'index'   => route('candidate.pagination'),
                                            'addName' => 'Adicionar Candidato',
                                          ])
          </li>
          <li class="nav-item">
            @include('components.nav-li', [ 'name'    => 'Eleitor',
                                            'list'    => 'Lista de Eleitor',
                                            'add'     => route('voter.create'),
                                            'index'   => route('voter.pagination'),
                                            'addName' => 'Adicionar Eleitor',
                                          ])
          </li>
          <li class="nav-item">
            @include('components.nav-li', [ 'name'    => 'Votação',
                                            'list'    => 'Lista de Votação',
                                            'add'     => route('voting.create'),
                                            'index'   => route('voting.index',[Auth::user()->id]),
                                            'addName' => 'Adicionar Candidatos',
                                          ])
          </li>
        </ul>
      </div>
      <div class="d-flex align-items-center">
        <li class="nav-item dropdown no-arrow">
          @include('components.nav-li', [ 'name'      => Auth::user()->name,
                                          'list'      => 'Editar Usuário',
                                          'addLogout' => '',
                                          'add'       => route('login.logout'),
                                          'index'     => route('user.edit',[Auth::user()->id]),
                                          'addName'   => 'sair',
                                        ])
        </li>
      </div>
</nav>