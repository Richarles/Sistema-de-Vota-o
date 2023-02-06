@extends('layout.app')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                    </div>
                    <form class="user" method="POST" action="{{ route('login.store') }}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="exampleInputEmail" placeholder="Email">
                                <x-validation name="email"/>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Senha">
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Entrar
                            </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{ route('user.create')}}">Não tem uma conta? Cadastra-se!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection