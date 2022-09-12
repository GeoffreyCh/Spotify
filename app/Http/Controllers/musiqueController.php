<?php

namespace App\Http\Controllers;

use App\Http\Requests\musiqueStoreRequest;
use App\Http\Requests\musiqueUpdateRequest;
use App\Models\Musique;
use App\Models\Artiste;
use App\Models\Groupe;
use App\Models\Album;
use Illuminate\Http\Request;

class musiqueController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $musiques = Musique::with('albums', 'artistes', 'groupes')->get();
        $artistes = Artiste::all();
        $groupes = Groupe::all();
        $albums = Album::all();

        return view('musique.index', compact('musiques','artistes','groupes','albums'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('musique.create');
    }

    /**
     * @param \App\Http\Requests\musiqueStoreRequest $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\musique $musique
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, musique $musique)
    {
        return view('musique.show', compact('musique'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\musique $musique
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, musique $musique)
    {
        return view('musique.edit', compact('musique'));
    }

    /**
     * @param \App\Http\Requests\musiqueUpdateRequest $request
     * @param \App\musique $musique
     * @return \Illuminate\Http\Response
     */
    public function update(musiqueUpdateRequest $request, musique $musique)
    {
        $musique->update($request->validated());

        $request->session()->flash('musique.id', $musique->id);

        return redirect()->route('musique.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\musique $musique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, musique $musique)
    {
        $musique->delete();

        return redirect()->route('musique.index');
    }
}
