@extends('layouts.app')

@section('title', 'Liste des étudiants')

@section('content')
    <div class="row">
        <div class="col-12 text-center pt-3">
            <h1 class="display-7 mt-3">@yield('title')</h1>
        </div>
        <hr>
        <div class="col-md-8">
            <p>Voici la liste de tous les étudiants:</p>
        </div>
        <div class="col-md-4">
            <a href="{{ route('etudiant.create') }}" class="btn btn-success">✍ Ajouter un étudiant</a>
        </div>
        <div class="col-12">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Courriel</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etudiants as $etudiant)
                        <tr>
                            <td><a href="etudiant/{{ $etudiant->id }}">{{ $etudiant->nom }}</a></td>
                            <td><a href="mailto:{{ $etudiant->email }}" class="small">{{ $etudiant->email }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $etudiants }}
        </div>
    </div>

@endsection
