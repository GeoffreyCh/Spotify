@extends('layouts.app')

@section('content')
    <h2>Liste des Groupes</h2>
    <ul>
        @foreach ($groupes as $groupe)

            <li>{{$groupe->nom}}</li>

        @endforeach
    </ul>
@endsection
