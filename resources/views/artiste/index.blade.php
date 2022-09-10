
@extends('layouts.app')

@section('content')

<div class="createArtiste delete">
    @include('artiste.create')
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
        <h1 class="fw-5">ARTISTES</h1>
        <br>
        <br>
        <div class="d-flex gap-5 flex-wrap justify-content-center">
            <div class="lienArtiste">
                <div class="d-flex flex-column artistes">
                    <div class="iconePlus">+</div>
                    <p class="fw-bold fs-6">Ajouter un <br> artiste</p>

                </div>
            </div>

            @foreach ($artistes as $artiste)
                <a class="lien" href="{{ route('artiste.show', ['artiste'=>$artiste]) }}">
                    <div class="d-flex flex-column artistes">
                        <img src="{{ $artiste->photo }}" alt="photo artiste" class="imgArtiste">
                        <p class="fw-bold fs-6">{{ $artiste->pseudo }}</p>
                        <p class="artiste">Artiste</p>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
    <div class="col-2">

    </div>
</div>

@endsection

