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
        <div class="showAlbum d-flex justify-content-end">
            <h1 class="d-block justify-content-end"><p>{{ $album->titre }}</p><p class="text-white fs-2 align-self-end">de
                @if ($artiste === null)
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
                            @if($musique->artistes->first() === null)
                                <a href="{{ route('groupe.show', ['groupe'=>$musique->groupes->first()]) }}">
                                    {{ $musique->groupes->first()->nom }}
                                </a>
                            @else
                                <a href="{{ route('artiste.show', ['artiste'=>$musique->artistes->first()]) }}">
                                    {{ $musique->artistes->first()->pseudo }}
                                </a>
                            @endif
                        </p>
                    </div>
                    <div class="duree">
                        {{ $musique->duree }}
                    </div>
                    <div class="">
                        <button class="">▶</button>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
    <div class="col-2">

    </div>
</div>

@endsection
