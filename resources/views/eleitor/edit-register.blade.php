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
                        <h1 class="h4 text-gray-900 mb-4">Editar Eleitor</h1>
                    </div>
                    <div  id="alert" role="alert"></div>
                        <form id="user" class="user" enctype="multipart/form-data"> 
                        @csrf
                        @include('eleitor.form-register')
                        <button type="submit" id="btnEdit" class="btn btn-primary btn-user btn-block">
                            Editar
                        </button>
                        <hr>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('submit', '#user', function (e) {
        e.preventDefault();

        $('#first_name_error').text('');
        $('#last_name_error').text('');
        $('#email_error').text('');
        $('#contact_error').text('');
        $('#date_birth_error').text('');

        var dados = $('#user').serializeArray();
    
        $.ajax({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            method: "PUT",
            url: "{{ route('voter.update',$editVoter->id) }}",
            data: dados,
            success: function (data) {
                $('.dados').html(data);
                //$('#alert').text(data.success).addClass('alert alert-primary');
                Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Eleitor Atualizado com Sucesso',
                                showConfirmButton: false,
                                timer: 1500
                            })
                console.log(data.success);
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                //console.log(response.errors);
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