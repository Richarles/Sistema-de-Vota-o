@extends('layout.app')

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Editar Usuário</h1>
                    </div>
                    <form class="user" enctype="multipart/form-data"  method="POST" action="{{ route('user.store') }}">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" name="name" id="exampleFirstName"
                                    placeholder="Nome" value="{{ old('name') ?? ($editUser->name ?? '') }}">
                            </div>
                            {{-- <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                    placeholder="Last Name">
                            </div> --}}
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail"
                                placeholder="Email" value="{{ old('email') ?? ($editUser->email ?? '') }}">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" name="password"
                                    id="exampleInputPassword" placeholder="Senha" value="{{ old('name') ?? ($editUser->password ?? '') }}">
                            </div>
                            {{-- <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Repeat Password">
                            </div> --}}
                        </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Editar
                            </button>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection