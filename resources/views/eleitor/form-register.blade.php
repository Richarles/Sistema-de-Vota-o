<div class="form-group row ">
    <div class="col-sm-6 mb-3 mb-sm-0 ">
        <input type="text" class="form-control form-control-user @error('first_name') is-invalid @enderror" name="first_name" id="exampleFirstName"
            placeholder="Nome" value="{{ old('first_name') ?? ($editVoter->first_name ?? '') }}">
            <small id="first_name_error" class="form-text text-danger"></small>
            {{-- <x-validation name="first_name" />       --}}
    </div>
    <div class="col-sm-6">
        <input type="text" class="form-control form-control-user @error('last_name') is-invalid @enderror" name="last_name" id="exampleLastName"
            placeholder="Sobrenome" value="{{ old('last_name') ?? ($editVoter->last_name ?? '') }}">
            <small id="last_name_error" class="form-text text-danger"></small>
            {{-- <x-validation name="last_name"/> --}}
    </div>
</div>
<div class="form-group">
    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="exampleInputEmail"
        placeholder="Email" value="{{ old('email') ?? ($editVoter->email ?? '') }}">
        <small id="email_error" class="form-text text-danger"></small>
        {{-- <x-validation name="email"/>  --}}
</div>
<div class="form-group">
    <input type="tel" class="form-control form-control-user @error('contact') is-invalid @enderror" name="contact" id="exampleInputContact"
        placeholder="Contato" value="{{ old('contact') ?? ($editVoter->contact ?? '') }}">
            <small id="contact_error" class="form-text text-danger"></small> 
        {{-- <x-validation name="contact"/> --}}
</div>
<div class="form-group">
    <input type="date" class="form-control form-control-user @error('date_birth') is-invalid @enderror" name="date_birth"  id="exampleInputDate"
        placeholder="Data de Nascimento" value="{{ old('date_birth') ?? ($editVoter->date_birth ?? '') }}">
        <small id="date_birth_error" class="form-text text-danger"></small>
        {{-- <x-validation name="date_birth"/> --}}
</div>
{{-- <div class="form-group">
    <input type="hidden" class="form-control form-control-user @error('voted') is-invalid @enderror" name="date_birth"  id="exampleInputDate"
        placeholder="Data de Nascimento" value="{{ old('date_birth') ?? ($editVoter->date_birth ?? '') }}">
        <x-validation name="date_birth"/>
</div> --}}
