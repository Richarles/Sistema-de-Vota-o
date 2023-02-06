@extends('layout.app')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Adicionar Candidato</h1>
                    </div>
                    <form class="user" enctype="multipart/form-data"  method="POST" action="{{ route('voting.store') }}">
                        @csrf
                        @method('post')
                        <div class="form-group row">
                            <select name="name" class="form-control">
                                @foreach ($candidateVote as $version)
                                    <option value="{{ $version->id }}" @selected(old('name') == $version)>
                                        {{ $version->first_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Adicionar
                        </button>
                        <hr>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection