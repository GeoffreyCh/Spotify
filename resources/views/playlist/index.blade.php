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
                <li><a href="{{ route('playlist.index') }}" class="">Playlist</a></li>
            </ul>
        </div>
    </div>
    <div class="col-8 text-center">
        <h1 class="fw-5 text-white">{{$playlist->nom}}</h1>
        <br>
        <br>
        <div class="d-flex gap-2 flex-column justify-content-center">
            @foreach ($playlist->musiques as $musique)

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
                        <a href="{{route('musique.show', ['musique'=>$musique])}}"><p>ℹ</p></a>
                    </div>
                    <div class="editInfoMusique">
                        <a href="{{route('musique.edit', ['musique'=>$musique])}}"><p>✎</p></a>
                    </div>
                    <div class="addToPlaylist">
                        <p class="like">♡</p>
                    </div>
                    <audio controls class="audio delete" id="audio" loop>
                        <source src="{{ asset('storage/'.$musique->filepath) }}">
                    </audio>
                    <div class="duree">
                        {{ $musique->duree }}
                    </div>
                    <div class="" id="btnPlay">
                        <button class="btnPlay" >▶</button>
                        <button class="btnPause delete" >▌▌</button>
                    </div>
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

<script>


function playPause(event) {

    let audio = event.target.parentElement.parentElement.querySelector('.audio');
    let btnPlay = event.target.parentElement.querySelector('.btnPlay');
    let btnPause = event.target.parentElement.querySelector('.btnPause');
    // let btnPause = event.target.querySelector('.pause');

    console.log(audio);
    console.log(btnPause);

    if (audio.paused){

        btnPause.classList.remove('delete');
        btnPlay.classList.add('delete');
        audio.play();
    } else {

        btnPause.classList.add('delete');
        btnPlay.classList.remove('delete');
        audio.pause();
    }
}

let btns = document.querySelectorAll('#btnPlay');

btns.forEach(element => {
    element.addEventListener('click',
    playPause)
});


</script>

@vite(['resources/js/musique.js'])

@endsection
