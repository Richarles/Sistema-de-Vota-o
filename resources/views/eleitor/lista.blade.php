@foreach ($listVoter as $item)
            <div class="row listVoter" id="name_{{$item->id}}">
                <div class="col-6">{{ $item->first_name }}</div>
                <div class="col-2"><a href="{{ route('voter.edit',$item->id) }}"><i class='fas fa-edit'></i></a></div>
                <div class="col-2"><a id="user" class="deleteVoter" href="{{ route('voter.delete',$item->id) }}" data-token="{{ csrf_token() }}" data-id="{{ $item->id }}"><i class='fas fa-trash'></i></a></div>
                <div class="col-2"><a id="showVoter" href="{{ route('voter.show',$item->id) }}" data-toggle="modal" data-target="#showModal{{$item->id }}" ><i class="fa fa-eye"></i></a></div>
            </div>
@endforeach
<x-modal id="showModal" title="Detalhe Do Eleitor">
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
        <label>Voltou ?</label>
        <span id="showVoted" class="col-8 h-4 text-gray-900 mb-4"></span> 
    </li>
</x-modal>
<div class="pagination">
    {{ $listVoter->render() }}
</div> 
<script>
$('.deleteVoter').on('click', function(e) {
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
                success	: function(data) {
                    Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Eleitor Excluido com sucesso',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    $("#name_"+data).remove();
                },
                error: function (error) {
                console.log(error);
                }
            });
        }
    })
});
</script>