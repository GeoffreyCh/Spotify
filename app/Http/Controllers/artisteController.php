<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Http\Requests\artisteStoreRequest;
use App\Http\Requests\artisteUpdateRequest;
use Illuminate\Http\Request;

class artisteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $artistes = Artiste::all();

        return view('artiste.index', compact('artistes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('artiste.create');
    }

    /**
     * @param \App\Http\Requests\artisteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(artisteStoreRequest $request)
    {
        $artiste = Artiste::create($request->validated());

        $request->session()->flash('artiste.id', $artiste->id);

        return redirect()->route('artiste.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\artiste $artiste
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, artiste $artiste)
    {
        return view('artiste.show', compact('artiste'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\artiste $artiste
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, artiste $artiste)
    {
        return view('artiste.edit', compact('artiste'));
    }

    /**
     * @param \App\Http\Requests\artisteUpdateRequest $request
     * @param \App\artiste $artiste
     * @return \Illuminate\Http\Response
     */
    public function update(artisteUpdateRequest $request, artiste $artiste)
    {
        $artiste->update($request->validated());

        $request->session()->flash('artiste.id', $artiste->id);

        return redirect()->route('artiste.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\artiste $artiste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, artiste $artiste)
    {
        $artiste->delete();

        return redirect()->route('artiste.index');
    }
}
