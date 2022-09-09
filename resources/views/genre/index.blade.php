@extends('layouts.app')

@section('content')

<div class="d-flex ">
    <h2>Liste des Genres</h2>
    <div class="col-8 justify-content-center">
        <ul>
            @foreach ($genres as $genre)

                <li>{{$genre->genre}}</li>

            @endforeach
        </ul>
    </div>
</div>

@endsection

