
@extends('layouts.app')

@section('content')
    <h2>Liste des Utilisateurs</h2>
    <ul>
    @foreach ($users as $user)
        <li>{{$user->name}}</li>
    @endforeach
    </ul>
@endsection

