@extends('layouts.app')

@section('content')

<div class="containerCreateMusique">
    <div class="formMusique">
        <form class="d-flex flex-column justify-content-center" method="POST" enctype="multipart/form-data"
            action="{{ route('musique.update', ['musique'=>$musique]) }}"
        >
            @csrf
            @method('PUT')
                <label for="titre" class="form-label">Titre</label>
                <input class="form-control" name="titre" value="{{ $musique->titre }}">

                <label for="duree" class="form-label">Durée</label>
                <input type="text" class="form-control" name="duree" placeholder="ex: 5.31"  value="{{ $musique->duree }}">

                <div class="inputFile">
                    <div class="d-flex flex-column">
                        <label for="filepath" class="form-label">Filepath</label>
                        <input type="file" class="form-control" name="filepath"  value="{{ $musique->filepath }}">
                    </div>
                </div>

            <div class="button">
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>
        </form>
    </div>
</div>

@endsection

