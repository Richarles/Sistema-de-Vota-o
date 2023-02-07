@extends('layout.app')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Lista de Candidatos para votação</h1>
                    </div>
                    <div class="container text-center" id="listAjax">
                        @foreach ($candidateVote as $item)
                            <div class="row listVoter">
                                <div class="col-6">{{ $item->candidates->first_name }} {{ $item->candidates->last_name }}</div>
                                <div class="col-6">{{ $item->candidates->vote_number }} {{ $item->votes }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection