
@extends('layouts.app')

@section('content')

<div class="createAlbum delete">
    @include('album.create')
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
    <div class="col-9 text-center">
        <h1 class="fw-5">ALBUMS</h1>
        <br>
        <br>
        <div class="d-flex gap-3 flex-wrap justify-content-center">
            <div class="lienAlbum">
                <div class="d-flex flex-column albums">
                    <div class="iconePlusAlbum">+</div>
                    <p class="fw-bold fs-6">Ajouter un <br> album</p>
                </div>
            </div>

            @foreach ($albums as $album)
                <a class="lien" href="{{ route('album.show', ['album'=>$album]) }}">
                    <div class="d-flex flex-column albums">
                        <form action="{{ route('album.destroy', ['album'=>$album]) }}" method="post" class="albumDestroy">
                            @csrf
                            @method('delete')
                            <button>X</button>
                        </form>
                        <img src="{{ $album->photo }}" alt="pochette album" class="imgAlbum">
                        <p class="fw-bold fs-6">{{ $album->titre }}</p>
                        <p class="artisteAlbum">
                            @if($album->artistes->first() === null && $album->groupes->first() === null)
                                Artiste
                            @elseif ($album->groupes->first() === null)
                                <a href="{{ route('artiste.show', ['artiste'=>$album->artistes->first()]) }}">
                                    {{ $album->artistes->first()->pseudo }}
                                </a>
                            @else
                                <a href="{{ route('groupe.show', ['groupe'=>$album->groupes->first()]) }}">
                                    {{ $album->groupes->first()->nom }}
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

@vite(['resources/js/album.js'])

@endsection

