
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
    <div class="col-9 text-center">
        <h1 class="fw-5">ALBUMS</h1>
        <br>
        <br>
        <div class="d-flex gap-3 flex-wrap justify-content-center">
            <a class="lienAlbum" href="">
                <div class="d-flex flex-column albums">
                    <div class="iconePlusAlbum">+</div>
                    <p class="fw-bold fs-6">Ajouter un <br> album</p>
                </div>
            </a>

            @foreach ($albums as $album)
                <a class="lien" href="{{ route('album.show', ['album'=>$album]) }}">
                    <div class="d-flex flex-column albums">
                        <img src="{{ $album->photo }}" alt="pochette album" class="imgAlbum">
                        <p class="fw-bold fs-6">{{ $album->titre }}</p>
                        <p class="artisteAlbum">
                            @if($album->artistes->first() === null)
                                <a href="{{ route('groupe.show', ['groupe'=>$album->groupes->first()]) }}">
                                    {{ $album->groupes->first()->nom }}
                                </a>
                            @else
                                <a href="{{ route('artiste.show', ['artiste'=>$album->artistes->first()]) }}">
                                    {{ $album->artistes->first()->pseudo }}
                                </a>
                            @endif
                        </p>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
    <div class="col-1">

    </div>
</div>

@endsection

