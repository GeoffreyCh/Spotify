<?php

namespace App\Http\Controllers;

use App\Http\Requests\musiqueStoreRequest;
use App\Http\Requests\musiqueUpdateRequest;
use App\Models\Musique;
use Illuminate\Http\Request;

class musiqueController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $musiques = Musique::all();

        return view('musique.index', compact('musiques'));
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
        $musique = Musique::create($request->validated());

        $request->session()->flash('musique.id', $musique->id);

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
