
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
        <div class="d-flex gap-4 flex-wrap justify-content-center">

            @foreach ($albums as $album)
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

            @endforeach

        </div>
    </div>
    <div class="col-1">

    </div>
</div>

@endsection

