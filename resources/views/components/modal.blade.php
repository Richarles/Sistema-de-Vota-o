<div class="{{$code}}" id="$item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <ul class="list-group">
                {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label>Nome :</label>
                    <span class="col-8 h-4 text-gray-900 mb-4">{{ $item->first_name }} {{ $item->last_name }}</span> 
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label>Contato :</label>
                    <span class="col-8 h-4 text-gray-900 mb-4">{{ $item->contact }}</span> 
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label>Email :</label>
                    <span class="col-8 h-4 text-gray-900 mb-4">{{ $item->email }}</span> 
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label>Data de Nasc. :</label>
                    <span class="col-8 h-4 text-gray-900 mb-4">{{ $item->date_birth }}</span> 
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label>Número :</label>
                    <span class="col-8 h-4 text-gray-900 mb-4">{{ $item->vote_number }}</span> 
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label>Foto :</label>
                    <span class="col-8 h-4 text-gray-900 mb-4"><img src="{{ url("storage/{$item->profile_photo}") }}" class="img-thumbnail" ></span> 
                </li> --}}
            </ul>
        </div>
    </div>
    </div>
</div>