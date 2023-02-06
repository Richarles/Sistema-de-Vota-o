@extends('layout.app')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $showVoter->first_name }} {{ $showVoter->last_name }}</h1>
                    </div>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $showVoter->contact }}</h1>
                    </div>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $showVoter->email }}</h1>
                    </div>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $showVoter->date_birth }}</h1>
                    </div>
                    <div class="col-2"><a href="{{ route('voter.edit',$showVoter->id) }}"><button class="btn btn-primary btn-user btn-block">EDITAR</button></a></div>
                    <form class="user" method="POST" action="{{ route('voter.delete',$showVoter->id) }}">
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