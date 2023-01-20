@extends('layout.app')

@section('content')
@foreach ($resultVote as $item)
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $item->candidates->first_name }}</h1>
                    </div>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $item->votes }}</h1>
                    </div>
                    <hr> 
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection