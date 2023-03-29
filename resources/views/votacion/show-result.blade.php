@extends('layout.app')
@section('content')
@foreach ($resultVote as $item)
@if ($item->candidates->checked == 1)
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0 col-lg-6">
            <div class="col-lg-4">
                <img src="{{ url("storage/{$item->candidates->profile_photo}") }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-lg-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->candidates->first_name }} {{ $item->candidates->last_name }}</h5>
                    <h6 class="card-text">Votos: {{ $item->votes }}</h6>
                    <h6 class="card-text">Número: {{ $item->candidates->vote_number }}</h6>
                </div>
            </div>
        </div>
    </div>
@endif

@endforeach
@endsection