@extends('layout.app')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $showCandidate->first_name }} {{ $showCandidate->last_name }}</h1>
                    </div>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $showCandidate->contact }}</h1>
                    </div>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $showCandidate->email }}</h1>
                    </div>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $showCandidate->date_birth }}</h1>
                    </div>
                    <div class="col-2"><a href="{{ route('candidate.edit',$showCandidate->id) }}"><button class="btn btn-primary btn-user btn-block">Editar</button></a></div>
                    <form class="user" method="POST" action="{{ route('candidate.delete',$showCandidate->id) }}">
                        @csrf
                        @method('DELETE')                      
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Excluir
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