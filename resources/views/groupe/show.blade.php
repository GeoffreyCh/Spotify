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

        <div class="showArtiste">
            <h1><p>Membres de </p><p class="text-white">{{$groupe->nom}}</p></h1>
        </div>
        <div class="d-flex flex-row-reverse">
            @foreach ($artistes as $artiste)
                <a class="lienArtiste" href="{{ route('artiste.show', ['artiste'=>$artiste]) }}">
                    <div class="d-flex flex-column artistes">
                        <img src="{{ $artiste->photo }}" alt="photo artiste" class="imgArtiste">
                        <p class="fw-bold fs-6">{{ $artiste->pseudo }}</p>
                        <p class="artiste">Artiste</p>
                    </div>
                </a>
            @endforeach
        </div>
        <br>
        <br>
        <div class="showArtiste">
            <h1><p>Albums de </p><p class="text-white">{{$groupe->nom}}</p></h1>
        </div>
        <div class="d-flex flex-row-reverse">
            @foreach ($albums as $album)
                <a class="lienAlbum" href="{{ route('album.show', ['album'=>$album]) }}">
                    <div class="d-flex flex-column albums">
                        <img src="{{ $album->photo }}" alt="pochette album" class="imgAlbum">
                        <p class="fw-bold fs-6">{{ $album->titre }}</p>
                        <p class="artisteAlbum">{{ $album->groupes->first()->nom }}</p>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
    <div class="col-2">

    </div>
</div>

@endsection
