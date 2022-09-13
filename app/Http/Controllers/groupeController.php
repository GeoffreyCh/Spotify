<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Album;
use App\Models\Artiste;
use App\Http\Requests\groupeStoreRequest;
use App\Http\Requests\groupeUpdateRequest;
use Illuminate\Http\Request;

class groupeController extends Controller
{

    public function index(Request $request)
    {
        $groupes = Groupe::all();

        return view('groupe.index', compact('groupes'));
    }


    public function create(Request $request)
    {
        return view('groupe.create');
    }


    public function store(groupeStoreRequest $request)
    {
        $all_params = request([
            'nom',
            'annee_creation',
            'annee_destruction',
            'photo',
            'nationalite'
        ]);
        $groupe = Groupe::create($all_params);

        return redirect()->route('groupe.index');
    }


    public function show(Request $request, groupe $groupe)
    {
        $artistes = $groupe->artistes;
        $albums = $groupe->albums;

        $allArtistes = Artiste::all();
        $allAlbums = Album::all();

        return view('groupe.show', ['groupe'=>$groupe, 'artistes'=>$artistes, 'albums'=>$albums, 'allArtistes'=>$allArtistes, 'allAlbums'=>$allAlbums]);
    }


    public function edit(Request $request, groupe $groupe)
    {
        return view('groupe.edit', compact('groupe'));
    }


    public function update(groupeUpdateRequest $request, groupe $groupe)
    {
        $groupe->update($request->validated());

        $request->session()->flash('groupe.id', $groupe->id);

        return redirect()->route('groupe.index');
    }


    public function destroy(Request $request, groupe $groupe)
    {
        $groupe->delete();

        return redirect()->route('groupe.index');
    }


    public function addAlbum(groupe $groupe)
    {
        $album = request('album');

        $groupe->albums()->attach($album);

        return redirect()->route('groupe.show', ['groupe'=>$groupe]);
    }


    public function addArtiste(groupe $groupe)
    {
        $artiste = request('artiste');

        $groupe->artistes()->attach($artiste);

        return redirect()->route('groupe.show', ['groupe'=>$groupe]);
    }
}
