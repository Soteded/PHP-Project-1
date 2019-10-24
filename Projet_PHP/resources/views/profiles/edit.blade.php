@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Modifier le Profile</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('profiles.update', $profile->id) }}" autocomplete="off">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="firstName">Prénom :</label>
                <input type="text" data-dismiss="alert" maxlength="30" class="form-control" name="firstName" value="{{ $profile->firstName }}" />
            </div>

            <div class="form-group">
                <label for="lastName">Nom :</label>
                <input type="text" data-dismiss="alert" maxlength="30" class="form-control" name="lastName" value="{{ $profile->lastName }}" />
            </div>

            <div class="form-group">
                <label for="birthDate">Date de naissance :</label>
                <input type="date" data-dismiss="alert" class="form-control" name="birthDate" value="{{ $profile->birthDate }}" />
            </div>
            <div class="form-group">
                <label for="telNbr">Téléphone :</label>
                <input type="text" data-dismiss="alert" class="form-control" name="telNbr" value="{{ $profile->telNbr }}" />
            </div>
            <div class="form-group">
                <label for="address">Adresse :</label>
                <input type="text" data-dismiss="alert" class="form-control" name="address" value="{{ $profile->address }}" />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection