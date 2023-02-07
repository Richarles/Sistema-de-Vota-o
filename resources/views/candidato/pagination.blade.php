@extends('layout.app')
@section('content')
<style>
    .checkedCandidateTrue{
        color: #25e625;
        font-size: 16px;
    }
    .checkedCandidateFalse{
        color:blue;
        font-size: 16px;
    }
    .deleteCandidate{
        color:rgb(250, 1, 1);
        font-size: 16px;
    }
</style>
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <form method="GET" id="form"> 
            @php
               $filterSelect=['first_Name'=>'firstName','last_Name'=>'lastName','telephone'=>'contact','email'=>'email','qualified'=>'Habilitados']
            @endphp
            <div class="input-group">
                <input type="text" class="form-control" id="nameCandidate" name='nameCandidate' aria-label="Text input with dropdown button">
                <input type="hidden" id="page" name="page" value="0"> 
                <div class="input-group-append">
                    <select class="form-select" name="select" id="select" aria-label="Default select example">
                        <option value="null">Todos Candidatos</option>
                        @foreach ($filterSelect as $key=>$item)
                            <option value="{{ $key }}" @selected(old('select') == $key)>{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <div class="row">
            {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Lista de Candidatos</h1>
                    </div>
                    <div class="container text-center" id="listAjax">  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        loadData(0);
    });

    $( "#select" ).on('change',function( event ) {
        event.preventDefault();

        var datas = $('#form').serialize();

        loadData(0);
    });

    $(document).on('click','.pagination a',function(e) {
        e.preventDefault();
        
        var pageHref = $(this).attr('href').split('page=')[1];
        var select = $( "#select" ).val();

        loadData(pageHref);
    });

    function loadData(page,tf = null) {
        $('#page').val(page);
        $('#nameCandidate').val();
        
        var name = $('#nameCandidate').val();
        var pages = $('#page').val();

        if (tf == null) {
            var datas = $('#form').serialize();
        } else {
            var datas = {name,pages,tf};
        }
        
        $.ajax({
            method	: 'GET',
            url     : "{{ route('candidate.index') }}",
            data: datas,
            success	: function(html) {
                $('#listAjax').html(html);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>
@endsection