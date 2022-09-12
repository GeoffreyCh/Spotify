<?php

namespace App\Http\Controllers;

use App\Http\Requests\musiqueStoreRequest;
use App\Http\Requests\musiqueUpdateRequest;
use App\Models\Musique;
use App\Models\Artiste;
use App\Models\Groupe;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class musiqueController extends Controller
{

    public function index(Request $request)
    {

        $musiques = Musique::with('albums', 'artistes', 'groupes')->get();

        return view('musique.index', compact('musiques'));
    }


    public function create(Request $request)
    {
        return view('musique.create');
    }


    public function store(musiqueStoreRequest $request)
    {
        $all_params = request([
            'titre',
            'duree',
            'filepath',
            'extension'
        ]);
        $musique = Musique::create($all_params);

        return redirect()->route('musique.index');
    }


    public function show(Request $request, musique $musique)
    {
        $artistes = Artiste::all();
        $groupes = Groupe::all();
        $albums = Album::all();

        return view('musique.show', compact('musique', 'artistes', 'groupes', 'albums'));
    }


    public function edit(Request $request, musique $musique)
    {
        return view('musique.edit', compact('musique'));
    }


    public function update(musiqueUpdateRequest $request, musique $musique)
    {
        $musique->update($request->validated());

        $request->session()->flash('musique.id', $musique->id);

        return redirect()->route('musique.index');
    }


    public function destroy(Request $request, musique $musique)
    {
        $musique->delete();

        return redirect()->route('musique.index');
    }


    public function addArtiste(musique $musique)
    {
        $artiste = request('artiste');



        if(Str::of($artiste)->startsWith('artist-')){
            $id = intval((string) (Str::of($artiste)->replace('artist-','')));
            $musique->artistes()->attach($id);
        } else {

            $id = intval((string) (Str::of($artiste)->replace('group-','')));
            $musique->groupes()->attach($id);
        }



        return redirect()->route('musique.show', ['musique'=>$musique]);
    }


    public function addAlbum(musique $musique)
    {
        $album = request('album');

        $musique->albums()->attach($album);

        return redirect()->route('musique.show', ['musique'=>$musique]);
    }
}
