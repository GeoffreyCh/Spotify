
@extends('layouts.app')

@section('content')
    <h2>Liste des Artistes</h2>
    <ul>
        @foreach ($artistes as $artiste)

            <li>{{$artiste->pseudo}}</li>

        @endforeach
    </ul>
@endsection

