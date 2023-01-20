@extends('layout.app')

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Candidate!</h1>
                    </div>
                    <form class="user" enctype="multipart/form-data"  method="POST" action="{{ route('voting.store.datesubscriptCandidate') }}">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="date" class="form-control form-control-user @error('dateStart') is-invalid @enderror" name="dateStart" id="exampleFirstName"
                                    placeholder="dateStart" value="">
                                    <x-validation name="dateStart"/>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="date" class="form-control form-control-user @error('dateEnd') is-invalid @enderror" name="dateEnd" id="exampleFirstName"
                                    placeholder="dateEnd" value="">
                                    <x-validation name="dateEnd"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Register Account
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