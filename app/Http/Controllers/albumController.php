<?php

namespace App\Http\Controllers;

use App\Http\Requests\albumStoreRequest;
use App\Http\Requests\albumUpdateRequest;
use App\Models\Album;
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
        $album = Album::create($request->validated());

        $request->session()->flash('album.id', $album->id);

        return redirect()->route('album.index');
    }


    public function show(Request $request, album $album)
    {
        $musiques = $album->musiques;
        $artiste = $album->artistes()->first();
        $groupe = $album->groupes()->first();

        return view('album.show', ['album'=>$album, 'musiques'=>$musiques, 'artiste'=>$artiste, 'groupe'=>$groupe]);
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
}
