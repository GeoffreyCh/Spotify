@extends('layouts.app')

@section('content')

<br>
<div class="addArtiste delete">
    @include('musique.addArtiste')
</div>

<div class="addAlbum delete">
    @include('musique.addAlbum')
</div>

<div class="d-flex col-12 row-1">
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
        <div class="d-flex justify-content-end">
            <h1 class="d-block justify-content-end m-0"><p>{{ $musique->titre }}</p><p class="text-white fs-2 align-self-end">de
                @if ($musique->artistes->first() === null && $musique->groupes->first() === null)
                    ?
                @elseif($musique->artistes->first() === null)
                    {{ $musique->groupes->first()->nom }}
                @else
                    {{$musique->artistes->first()->pseudo}}
                @endif
            </p></h1>
        </div>
        <br>
        <br>
        <div class="d-flex gap-2 flex-column justify-content-center">
            <div class="d-flex musiques">
                <form action="{{ route('musique.destroy', ['musique'=>$musique]) }}" method="post" class="musiqueDestroy">
                    @csrf
                    @method('delete')
                    <button>X</button>
                </form>
                @if ($musique->albums->first() === null)
                    <img src="" alt="">
                @else
                    <a href="{{ route('album.show', ['album'=>$musique->albums->first()]) }}">
                        <img src="{{$musique->albums->last()->photo}}" alt="">
                    </a>
                @endif
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

        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="d-flex justify-content-center gap-5">
            @if ($musique->artistes->first() === null && $musique->groupes->first() === null)
                <div id="addArtiste">
                    <div class="d-flex flex-column artistes">
                        <div class="iconePlus">+</div>
                        <p class="fw-bold fs-6">Ajouter un <br> artiste</p>
                    </div>
                </div>
            @elseif($musique->artistes->first() === null)
                <div class="">
                    <a class="lien" href="{{ route('groupe.show', ['groupe'=>$musique->groupes->first()]) }}">
                        <div class="d-flex flex-column groupes">
                            <img src="{{ $musique->groupes->first()->photo }}" alt="photo groupe" class="imgGroupe">
                            <p class="fw-bold fs-6">{{ $musique->groupes->first()->nom }}</p>
                            <p class="artiste">Artiste</p>
                        </div>
                    </a>
                </div>
            @else
                <div class="">
                    <a class="lien" href="{{ route('artiste.show', ['artiste'=>$musique->artistes->first()]) }}">
                        <div class="d-flex flex-column artistes">
                            <img src="{{ $musique->artistes->first()->photo }}" alt="photo artiste" class="imgArtiste">
                            <p class="fw-bold fs-6">{{ $musique->artistes->first()->pseudo }}</p>
                            <p class="artiste">Artiste</p>
                        </div>
                    </a>
                </div>
            @endif

            @if ($musique->albums->first() === null)
                <div id="addAlbum">
                    <div class="d-flex flex-column artistes">
                        <div class="iconePlus">+</div>
                        <p class="fw-bold fs-6">Ajouter un <br> album</p>
                    </div>
                </div>
            @else
                <a class="lien" href="{{ route('album.show', ['album'=>$musique->albums->first()]) }}">
                    <div class="d-flex flex-column albums">
                        <img src="{{ $musique->albums->first()->photo }}" alt="pochette album" class="imgAlbum">
                        <p class="fw-bold fs-6">{{ $musique->albums->first()->titre }}</p>
                        <p class="artisteAlbum">
                            Artiste
                        </p>
                    </div>
                </a>
            @endif

            <div class=""></div>
        </div>
    </div>
    <div class="col-2">

    </div>
</div>

@vite(['resources/js/addInfoMusique.js'])

@endsection
