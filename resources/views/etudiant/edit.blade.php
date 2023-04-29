@extends('layouts.app')

@section('title', 'Modifier Étudiant')

@section('content')
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-5">
                Modifier étudiant ID: {{ $etudiant->id }}
            </h1>
        </div>
        <!--/col-12-->
    </div>
    <!--/row-->
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form method="post">
                    @csrf
                    @method('put')
                    <div class="card-header">
                        👤 Informations
                    </div>
                    <div class="card-body">
                        <div class="control-grup col-12">
                            <label for="nom">Nom:</label>
                            <input type="text" id="nom" name="nom" class="form-control"
                                value="{{ $etudiant->nom }}">
                            @error('nom')
                                <span class="text-danger small">{{ $errors->first('nom') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="adresse">Adresse:</label>
                            <input type="text" id="adresse" name="adresse" class="form-control"
                                value="{{ $etudiant->adresse }}">
                            @error('adresse')
                                <span class="text-danger small">{{ $errors->first('adresse') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="phone">Téléphone:</label>
                            <input type="number" id="phone" name="phone" class="form-control"
                                placeholder="1234567890" min="1" value="{{ $etudiant->phone }}">
                            @error('phone')
                                <span class="text-danger small">{{ $errors->first('phone') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="email">Courriel:</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ $etudiant->email }}">
                            @error('email')
                                <span class="text-danger small">{{ $errors->first('email') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="date_naissance">Date de naissance:</label>
                            <input type="date" id="date_naissance" name="date_naissance" class="form-control"
                                value="{{ $etudiant->date_naissance }}">
                            @error('date_naissance')
                                <span class="text-danger small">{{ $errors->first('date_naissance') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="ville">Ville:</label><br>
                            <select name="ville_id" id="ville">
                                @foreach ($villes as $ville)
                                    <option value="{{ $ville->id }}"
                                        {{ $ville->id == $etudiant->ville_id ? 'selected' : '' }}>{{ $ville->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ville')
                                <span class="text-danger small">{{ $errors->first('ville') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('etudiant.index') }}" class="btn btn-primary btn-md">← Retourner</a>
                        <input type="reset" class="btn btn-secondary" value="↺ Réinitialiser">
                        <input type="submit" class="btn btn-primary" value="✓ Soumettre">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
