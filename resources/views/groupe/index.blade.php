@extends('layouts.app')

@section('content')

<div class="d-flex col-12">
    <div class="col-2">
        <div class="menu">
            <ul>
                <li><a href="{{ url('/') }}" class="">Accueil</a></li>
                <li><a href="{{ route('musique.index') }}" class="">Titre</a></li>
                <li><a href="{{ route('artiste.index') }}" class="">Artiste</a></li>
                <li><a href="{{ route('groupe.index') }}" class="">Groupe</a></li>
                <li><a href="{{ route('album.index') }}" class="">Album</a></li>
                <li><a href="{{ route('genre.index') }}" class="">Genre</a></li>
            </ul>
        </div>
    </div>
    <div class="col-8 text-center">
        <h1 class="fw-5">ARTISTES</h1>
        <br>
        <br>
        <div class="d-flex gap-5 flex-wrap justify-content-center">

            @foreach ($groupes as $groupe)
                <div class="d-flex flex-column groupes">
                    <img src="{{ $groupe->photo }}" alt="photo groupe" class="imgGroupe">
                    <p class="fw-bold fs-6">{{ $groupe->nom }}</p>
                    <p class="artiste">Artiste</p>
                </div>

            @endforeach

        </div>
    </div>
    <div class="col-2">

    </div>
</div>

@endsection
