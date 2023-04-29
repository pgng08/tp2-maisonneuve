@extends('layouts.app')

@section('title', "Detail d'un étudiant")

@section('content')
    <div class="row">
        <div class="col-12 pt-2">
            <h1 class="display-7 mt-3">@yield('title')</h1>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-12">
            <p><strong>Nom: </strong>{{ $etudiant->nom }}</p>
            <p><strong>Adresse: </strong>{{ $etudiant->adresse }}</p>
            <p><strong>Téléphone: </strong>{{ $etudiant->phone }}</p>
            <p><strong>Courriel: </strong><a href="mailto: {{ $etudiant->email }}">{{ $etudiant->email }}</a></p>
            <p><strong>Date de naissance: </strong>{{ $etudiant->date_naissance }}</p>
            <p><strong>Ville: </strong>{{ $etudiant->etudiantHasVille->nom }}</p>
        </div>
    </div>
    <hr>
    <div class="row text-center">
        <div class="col-md-4">
            <a href="{{ route('etudiant.index') }}" class="btn btn-primary btn-sm">← Retourner</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-success btn-sm">✎ Modifier</a>
        </div>
        <div class="col-md-4">
            {{-- Modal JS standard --}}
            <input type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"
                value="✘ Effacer">
        </div>
    </div>

    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Effacer étudiant: <strong>"{{ $etudiant->nom }}"</strong> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                    <form method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Confirmer</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
