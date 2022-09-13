@extends('layouts.app')

@section('content')

<div class="addArtisteAlbum delete">
    @include('album.addArtiste')
</div>

<div class="addMusiqueAlbum delete">
    @include('album.addMusique')
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
        <div class="showAlbum d-flex justify-content-end">
            <h1 class="d-block justify-content-end"><p>{{ $album->titre }}</p><p class="text-white fs-2 align-self-end">de
                @if ($artiste === null && $groupe === null)
                    ?
                @elseif($artiste === null)
                    {{ $groupe->nom }}
                @else
                    {{$artiste->pseudo}}
                @endif
            </p></h1>
        </div>
        <br>
        <br>
        <div class="d-flex gap-2 flex-column justify-content-center">

            @foreach ($musiques as $musique)
                {{-- {{dd($musique->artistes->first()->pseudo)}} --}}
                <div class="d-flex musiques">
                    <a href="{{ route('album.show', ['album'=>$musique->albums->first()]) }}">
                        <img src="{{$musique->albums->first()->photo}}" alt="">
                    </a>
                    <div class="d-flex flex-column">
                        <p class="fw-bold fs-6">{{ $musique->titre }}</p>
                        <p class="artisteAlbum">
                            @if($musique->artistes->first() === null && $musique->groupes->first() === null)
                                Artiste
                            @elseif ($musique->groupes->first() === null)
                                <a href="{{ route('artiste.show', ['artiste'=>$musique->artistes->first()]) }}">
                                    {{ $musique->artistes->last()->pseudo }}
                                </a>
                            @else
                                <a href="{{ route('groupe.show', ['groupe'=>$musique->groupes->first()]) }}">
                                    {{ $musique->groupes->last()->nom }}
                                </a>
                            @endif
                        </p>
                    </div>
                    <div class="duree">
                        {{ $musique->duree }}
                    </div>
                    <div class="">
                        <button class="btnPlay">▶</button>
                    </div>
                </div>

            @endforeach
        <div class="btnPlusMusic">
            <button class="">+</button>
        </div>

        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="d-flex justify-content-center gap-5">
            @if ($album->artistes->first() === null && $album->groupes->first() === null)
                <div id="addArtisteAlbum">
                    <div class="d-flex flex-column artistes">
                        <div class="iconePlus">+</div>
                        <p class="fw-bold fs-6">Ajouter un <br> artiste</p>
                    </div>
                </div>
            @elseif($album->artistes->first() === null)
                <div class="">
                    <a class="lien" href="{{ route('groupe.show', ['groupe'=>$album->groupes->first()]) }}">
                        <div class="d-flex flex-column groupes">
                            <img src="{{ $album->groupes->first()->photo }}" alt="photo groupe" class="imgGroupe">
                            <p class="fw-bold fs-6">{{ $album->groupes->first()->nom }}</p>
                            <p class="artiste">Artiste</p>
                        </div>
                    </a>
                </div>
            @else
                <div class="">
                    <a class="lien" href="{{ route('artiste.show', ['artiste'=>$album->artistes->first()]) }}">
                        <div class="d-flex flex-column artistes">
                            <img src="{{ $album->artistes->first()->photo }}" alt="photo artiste" class="imgArtiste">
                            <p class="fw-bold fs-6">{{ $album->artistes->first()->pseudo }}</p>
                            <p class="artiste">Artiste</p>
                        </div>
                    </a>
                </div>
            @endif

            <a class="lien" href="{{ route('album.show', ['album'=>$album]) }}">
                <div class="d-flex flex-column albums">
                    <img src="{{ $album->photo }}" alt="pochette album" class="imgAlbum">
                    <p class="fw-bold fs-6">{{ $album->titre }}</p>
                    <p class="artisteAlbum">
                        Artiste
                    </p>
                </div>
            </a>

        </div>
    </div>
    <div class="col-2">

    </div>
</div>

@vite(['resources/js/addInfoAlbum.js'])

@endsection
