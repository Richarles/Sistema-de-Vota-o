@foreach ($listCandidate as $item)
    <div class="row delete" id="name_{{$item->id}}">
        <div class="col-4">{{ $item->first_name }}</div>
        <div class="col-2"><a href="{{ route('candidate.edit',$item->id) }}"><i class='fas fa-edit'></i></a></div>
        <div class="col-2"><a id="editCandidate" class="deleteCandidate" href="{{ route('candidate.delete',$item->id) }}" data-token="{{ csrf_token() }}" data-id="{{$item->id}}"><i class='fas fa-trash'></i></a></div>
        @if ($item->checked == false ) 
            <div class="col-2"><a id="checkedCandidate_{{$item->id}}" class="checkedCandidate checkedCandidateFalse" href="{{ route('candidate.checked',$item->id) }}" data-token="{{ csrf_token() }}" data-id="{{$item->cheked}}"><i class='fa fa-check'></i></a></div>
        @else
            <div class="col-2"><a id="checkedCandidate_{{$item->id}}" class="checkedCandidate checkedCandidateTrue" href="{{ route('candidate.checked',$item->id) }}" data-token="{{ csrf_token() }}" data-id="{{$item->cheked}}"><i class='fa fa-check'></i></a></div>
        @endif
        <div class="col-2"><a id="showCandidate" data-toggle="modal" data-target="#showModal{{$item->id }}" href="{{ route('candidate.show',$item->id) }}"><i class="fa fa-eye"></i></a></div>
    </div> 
@endforeach
<x-modal id="showModal" title="Detalhe Do Candidato">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <label>Nome :</label>
        <span id="showName" class="col-8 h-4 text-gray-900 mb-4"></span> 
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <label>Contato :</label>
        <span id="showContact" class="col-8 h-4 text-gray-900 mb-4"></span> 
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <label>Email :</label>
        <span id="showEmail" class="col-8 h-4 text-gray-900 mb-4"></span> 
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <label>Data de Nasc. :</label>
        <span id="showDateNasc" class="col-8 h-4 text-gray-900 mb-4"></span> 
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <label>Número :</label>
        <span id="showNumber" class="col-8 h-4 text-gray-900 mb-4"></span> 
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <label>Foto :</label>
        <span id="showPhoto" class="col-8 h-4 text-gray-900 mb-4"><img src="{{ url("storage/{$item->profile_photo}") }}" class="img-thumbnail" ></span> 
    </li>
</x-modal>
<div class="pagination">
    {{ $listCandidate->render() }}
</div> 
<script>
$('.deleteCandidate').on('click', function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Deseja excluir o candidato?',
        text: "Você não será capaz de reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Excluir'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method	: 'delete',
                    url     : $(this).attr('href'),
                    data	: {
                                _token	: $(this).data('token')
                              },
                    dataType: 'json',
                    success	: function(data) {
                        Swal.fire(
                            'Excluido!',
                            'O candidato foi deletado.',
                            'success'
                        )
                        $("#name_"+data).remove();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                }); 
            }
        })
});

$('.checkedCandidate').on('click', function(e) {
    e.preventDefault();
    var parentPost = $(this).closest('.post');        
            $.ajax({
                method	: 'POST',
                url     : $(this).attr('href'),
                data	: {
                            _token	: $(this).data('token')
                          },
                dataType: 'json',
                success	: function(data) {
                    console.log(data);
                        if (data.checked == 1) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Candidato Habilitado com sucesso',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $("#checkedCandidate_"+data.id).css("color","#25e625");
                        }

                        if(data.checked == 0) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Candidato Desabilitado com sucesso',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $("#checkedCandidate_"+data.id).css("color","#2259b5");
                        }
                },
                error: function (error) {
                    console.log(error);
                }
            });
});

$(document).on('click','#showCandidate', function () {
    var hrf = $(this).attr('href')
    $.ajax({
            method	: 'GET',
            url     : hrf,
            success	: function(data) {
                console.log(data);
                $("#showName").text(data.first_name+' '+data.last_name);
                $("#showContact").text(data.contact);
                $("#showEmail").text(data.email);
                $("#showDateNasc").text(data.date_birth);
                $("#showNumber").text(data.vote_number);
                $("#showPhoto").attr("src","/imagens/candidatos/"+data.profile_photo);
                //$("#showPhoto").attr("src","{{ url('storage/"+data.profile_photo+"') }}");
                $('#showModal').modal('show');
            },
            error: function (error) {
            }
    });
})
</script>