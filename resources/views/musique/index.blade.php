@extends('layouts.app')

@section('content')

<div class="createMusique delete">
    @include('musique.create')
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
        <h1 class="fw-5">MUSIQUES</h1>
        <br>
        <br>
        <div class="d-flex gap-2 flex-column justify-content-center">

            @foreach ($musiques as $musique)
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
                    <div class="moreInfo">
                        <p>ℹ</p>
                    </div>
                    <div class="duree">
                        {{ $musique->duree }}
                    </div>
                    <div class="">
                        <button class="btnPlay">▶</button>
                    </div>
                </div>
                <div class="addInfoMusique delete">
                    @include('musique.addInfo', ['musique'=>$musique])
                </div>
            @endforeach

            <div class="btnPlusMusic">
                <button class="">+</button>
            </div>

        </div>
    </div>
    <div class="col-2">

    </div>
</div>

@vite(['resources/js/musique.js'])

@endsection
