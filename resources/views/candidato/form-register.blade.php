
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="text" class="form-control form-control-user @error('first_name') is-invalid @enderror" name="first_name" id="exampleFirstName"
            placeholder="Nome" value="{{ old('first_name') ?? ($editCandidate->first_name ?? '') }}">
            <small id="first_name_error" class="form-text text-danger"></small>
            {{-- <x-validation name="first_name"/> --}}
    </div>
    <div class="col-sm-6">
        <input type="text" class="form-control form-control-user @error('last_name') is-invalid @enderror" name="last_name" id="exampleLastName"
            placeholder="Sobrenome" value="{{ old('first_name') ?? ($editCandidate->last_name ?? '') }}">
            <small id="last_name_error" class="form-text text-danger"></small>
            {{-- <x-validation name="last_name"/> --}}
    </div>
</div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user @error('vote_number') is-invalid @enderror" name="vote_number" id=""
            placeholder="Número do Candidato" value="{{ old('vote_number') ?? ($editCandidate->vote_number ?? '') }}">
            <small id="vote_number_error" class="form-text text-danger"></small>
            {{-- <x-validation name="vote_number"/> --}}
    </div>
    <div class="form-group">
        <input type="file" class="form-control form-control-user @error('profile_photo') is-invalid @enderror" name="profile_photo" id=""
            placeholder="foto do candidato" value="{{ old('profile_photo') ?? ($editCandidate->profile_photo ?? '') }}">
            <small id="profile_photo_error" class="form-text text-danger"></small>
            {{-- <x-validation name="profile_photo"/> --}}
            @isset($editCandidate)
               <div class="col-lg-5 d-none d-lg-block ">
                  <img src="{{ url("storage/{$editCandidate->profile_photo}") }}" class="img-thumbnail" >
               </div>
            @endisset
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user @error('contact') is-invalid @enderror" name="contact" id="exampleInputContact"
            placeholder="Contato" value="{{ old('first_name') ?? ($editCandidate->contact ?? '') }}">
            <small id="contact_error" class="form-text text-danger"></small>
            {{-- <x-validation name="contact"/> --}}
    </div>
    <div class="form-group">
        <input type="date" class="form-control form-control-user @error('date_birth') is-invalid @enderror" name="date_birth" id=""
            placeholder="Data de Nascimento" value="{{ old('first_name') ?? ($editCandidate->date_birth ?? '') }}">
            <small id="date_birth_error" class="form-text text-danger"></small>
            {{-- <x-validation name="date_birth"/> --}}
    </div>

<div class="form-group">
    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="exampleInputEmail"
        placeholder="Email" value="{{ old('first_name') ?? ($editCandidate->email ?? '') }}">
        <small id="email_error" class="form-text text-danger"></small>
        {{-- <x-validation name="email"/> --}}
</div>
