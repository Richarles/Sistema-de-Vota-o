@extends('layout.app')
@section('content')
@foreach ($candidateVote as $item)
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block "><img src="{{ url("storage/{$item->candidates->profile_photo}") }}" class="img-thumbnail" ></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $item->candidates->first_name}}</h1>
                    </div>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $item->candidates->vote_number}}</h1>
                    </div>
                    <form class="user"  method="POST" action="{{ route('voting.store.votes',[$id,$item->id]) }}">
                        @csrf
                        @method('PUT') 
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Votar
                        </button>
                        <hr>
                    </form>
                    <hr> 
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection