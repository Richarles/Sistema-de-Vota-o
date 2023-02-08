@extends('layout.app')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5 col-lg-8">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Verificar Eleitor</h1>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="user" enctype="multipart/form-data"  method="POST" action="{{ route('voting.store.verific') }}">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <div class="col-sm-6 col-lg-8 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="exampleFirstName" placeholder="Email" value="">
                                <x-validation name="email"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Verificar</button>
                        <hr>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection