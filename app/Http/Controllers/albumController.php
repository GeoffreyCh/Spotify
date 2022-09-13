<?php

namespace App\Http\Controllers;

use App\Http\Requests\albumStoreRequest;
use App\Http\Requests\albumUpdateRequest;
use App\Models\Album;
use App\Models\Artiste;
use App\Models\Musique;
use Illuminate\Http\Request;

class albumController extends Controller
{

    public function index(Request $request)
    {
        $albums = Album::with('artistes', 'groupes')->get();

        return view('album.index', compact('albums'));
    }


    public function create(Request $request)
    {
        return view('album.create');
    }


    public function store(albumStoreRequest $request)
    {
        $all_params = request([
            'titre',
            'annee',
            'photo'
        ]);
        $album = Album::create($all_params);

        return redirect()->route('album.index');
    }


    public function show(Request $request, album $album)
    {
        $musiques = $album->musiques;
        $artiste = $album->artistes()->first();
        $groupe = $album->groupes()->first();

        $allArtistes = Artiste::all();
        $allMusiques = Musique::all();

        return view('album.show', ['album'=>$album, 'musiques'=>$musiques, 'artiste'=>$artiste, 'groupe'=>$groupe, 'allArtistes'=>$allArtistes, 'allMusiques'=>$allMusiques]);
    }


    public function edit(Request $request, album $album)
    {
        return view('album.edit', compact('album'));
    }


    public function update(albumUpdateRequest $request, album $album)
    {
        $album->update($request->validated());

        $request->session()->flash('album.id', $album->id);

        return redirect()->route('album.index');
    }


    public function destroy(Request $request, album $album)
    {
        $album->delete();

        return redirect()->route('album.index');
    }


    public function addArtiste(album $album)
    {
        $artiste = request('artiste');

        $album->artistes()->attach($artiste);

        return redirect()->route('album.show', ['album'=>$album]);
    }


    public function addMusique(album $album)
    {
        $musique = request('musique');

        $album->musiques()->attach($musique);

        return redirect()->route('album.show', ['album'=>$album]);
    }
}
