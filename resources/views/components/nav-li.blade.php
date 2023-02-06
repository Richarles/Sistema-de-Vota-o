<a  class="nav-link dropdown-toggle"
    href="#"
    id="userDropdown"
    role="button"
    data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <span class="mr-2 d-none d-lg-inline text-black-600 small">{{ $name }}</span>
</a>
<div class="dropdown-menu dropdown-menu-lefth shadow animated--grow-in" aria-labelledby="userDropdown">
    <a class="dropdown-item" href="{{ $index }}">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        {{ $list }}
    </a>
    <a class="dropdown-item" data-token="{{ csrf_token() }}" href="{{ $add }}">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        {{ $addName }}
    </a>
    <div class="dropdown-divider"></div>
</div>
