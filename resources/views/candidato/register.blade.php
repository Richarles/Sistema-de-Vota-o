@extends('layout.app')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Registro de candidato</h1>
                    </div>
                    <div  id="alert" role="alert"></div>
                    <form class="user" id="candidate" enctype="multipart/form-data">
                        @csrf         
                        @include('candidato.form-register')
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Registrar
                        </button>
                        <hr>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dados"></div>
<script>
    $(document).on('submit', '#candidate', function (e) {
        e.preventDefault();

        $('#first_name_error').text('');
        $('#last_name_error').text('');
        $('#email_error').text('');
        $('#contact_error').text('');
        $('#date_birth_error').text('');
        $('#profile_photo_error').text('');
        $('#vote_number_error').text('');
        //var dados = $('#candidate').serializeArray();
        var form = $('#candidate')[0];
        var dados = new FormData(form);

        $.ajax({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            type: "POST",
            url: "{{ route('candidate.store') }}",
            data: dados,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                $('.dados').html(data);

                Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Candidato Salvo com Sucesso',
                            showConfirmButton: false,
                            timer: 1500
                })
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);

                if($.isEmptyObject(response.errors) == false) {
                    $.each(response.errors,function(key,val){
                        $('#'+key+"_error").text(val[0]); 
                    });
                }
            }
        });
    });
</script>
@endsection