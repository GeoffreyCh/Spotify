@extends('layouts.app')

@section('content')

<div class="addGroupe delete">
    @include('artiste.addGroupe')
</div>

<div class="addAlbumArtiste delete">
    @include('artiste.addAlbum')
</div>

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

        <div class="showArtiste">
            <h1><p>Albums de </p><p class="text-white">{{$artiste->pseudo}}</p></h1>
        </div>
        <div class="d-flex flex-row-reverse gap-4">
            <div class="lienAlbum" id="addAlbumArtiste">
                <div class="d-flex flex-column albums">
                    <div class="iconePlusAlbum">+</div>
                    <p class="fw-bold fs-6">Ajouter un <br> album</p>
                </div>
            </div>
            @foreach ($albums as $album)
                <a class="lienAlbum" href="{{ route('album.show', ['album'=>$album]) }}">
                    <div class="d-flex flex-column albums">
                        <img src="{{ $album->photo }}" alt="pochette album" class="imgAlbum">
                        <p class="fw-bold fs-6">{{ $album->titre }}</p>
                        <p class="artisteAlbum">
                            @if($album->artistes->first() === null)
                                {{ $album->groupes->first()->nom }}
                            @else
                                {{ $album->artistes->first()->pseudo }}
                            @endif
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
        <br>
        <br>
        <div class="showArtiste">
            <h1><p>Groupe de </p><p class="text-white">{{$artiste->pseudo}}</p></h1>
        </div>
        <div class="d-flex flex-row-reverse gap-4">
            <div class="lienGroupe" id="addGroupe">
                <div class="d-flex flex-column groupes">
                    <div class="iconePlus">+</div>
                    <p class="artiste text-white">Ajouter un <br> groupe</p>
                </div>
            </div>
            @foreach ($groupes as $groupe)
                <a class="lienGroupe" href="{{ route('groupe.show', ['groupe'=>$groupe]) }}">
                    <div class="d-flex flex-column groupes">
                        <img src="{{ $groupe->photo }}" alt="photo groupe" class="imgGroupe">
                        <p class="fw-bold fs-6">{{ $groupe->nom }}</p>
                        <p class="artiste">Artiste</p>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
    <div class="col-2">

    </div>
</div>

@vite(['resources/js/addInfoArtiste.js'])

@endsection

