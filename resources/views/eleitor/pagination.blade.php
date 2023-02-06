@extends('layout.app')
@section('content')
<style>
    .fa-edit{
        color:rgb(75, 75, 243);
        font-size:16px;
    }
    .fa-trash{
        font-size:16px;
        color:rgb(247, 0, 0);
    }
</style>
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <form method="GET" id="form"> 
            @php
               $filterSelect=['first_Name'=>'Nome','last_Name'=>'Sobrenome','telephone'=>'Telefone','email'=>'Email']
            @endphp
            <div class="input-group">
                <input type="text" class="form-control" id="nameVoter" name='nameVoter' aria-label="Text input with dropdown button">
                <input type="hidden" id="page" name="page" value="0"> 
                <div class="input-group-append">
                    <select class="form-select" name="select" id="select" aria-label="Default select example">
                        <option value="null">Todos Eleitores</option>
                        @foreach ($filterSelect as $key=>$item)
                            <option value="{{ $key }}" @selected(old('select') == $key)>{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Lista de Eleitores</h1>
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
        $('#nameVoter').val();
        
        var name = $('#nameCandidate').val();
        var pages = $('#page').val();

        if (tf == null) {
            var datas = $('#form').serialize();
          } else {
              var datas = {name,pages,tf};
          }

        $.ajax({
            method	: 'GET',
            url     : "{{ route('voter.index') }}",
            data: datas,
            success	: function(html) {
                $('#listAjax').html(html);
                console.log(html);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

$(document).on('click','#showVoter', function () {
    var hrf = $(this).attr('href')

    $.ajax({
            method	: 'GET',
            url     : hrf,
            success	: function(data) {
                $("#showName").text(data.first_name+' '+data.last_name);
                $("#showContact").text(data.contact);
                $("#showEmail").text(data.email);
                $("#showDateNasc").text(data.date_birth);

                if (data.voted == true) {
                    $("#showVoted").text('sim');
                } else {
                    $("#showVoted").text('Não');
                }

                $('#showModal').modal('show');
            },
            error: function (error) {
                console.log(error);
            }
    });
});
</script>
@endsection