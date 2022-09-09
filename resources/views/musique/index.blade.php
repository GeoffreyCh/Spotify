@extends('layouts.app')

@section('content')
    <h2>Liste des Musiques</h2>
    <ul>
        @foreach ($musiques as $musique)

            <li>{{$musique->titre}}</li>

        @endforeach
    </ul>
@endsection
