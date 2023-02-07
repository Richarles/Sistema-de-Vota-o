@extends('layout.app')
@section('content')
@foreach ($resultVote as $item)
<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-lg-4">
            <img src="{{ url("storage/{$item->candidates->profile_photo}") }}" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-lg-8">
            <div class="card-body">
                <h5 class="card-title">{{ $item->candidates->first_name }} {{ $item->candidates->last_name }}</h5>
                <h6 class="card-text">Votos: {{ $item->votes }}</h6>
                <h6 class="card-text">Número: {{ $item->candidates->vote_number }}</h6>
                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
            </div>
        </div>
    </div>
</div>
{{-- <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-7">
                <div class="p-5">
                    <span id="showPhoto" class="col-8 h-4 text-gray-900 mb-4"><img src="{{ url("storage/{$item->candidates->profile_photo}") }}" class="img-thumbnail" ></span> 
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $item->candidates->first_name }} {{ $item->candidates->last_name }}</h1>
                    </div>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $item->votes }}</h1>
                    </div>
                    <hr> 
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endforeach
@endsection