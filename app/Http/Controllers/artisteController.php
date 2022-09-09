<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Http\Requests\artisteStoreRequest;
use App\Http\Requests\artisteUpdateRequest;
use Illuminate\Http\Request;

class artisteController extends Controller
{

    public function index(Request $request)
    {
        $artistes = Artiste::all();

        return view('artiste.index', compact('artistes'));
    }


    public function create(Request $request)
    {
        return view('artiste.create');
    }


    public function store(artisteStoreRequest $request)
    {
        $artiste = Artiste::create($request->validated());

        $request->session()->flash('artiste.id', $artiste->id);

        return redirect()->route('artiste.index');
    }


    public function show(Request $request, artiste $artiste)
    {
        $albums = $artiste->albums;
        $groupes = $artiste->groupes;

        return view('artiste.show', ['artiste'=>$artiste, 'albums'=>$albums, 'groupes'=>$groupes]);
    }


    public function edit(Request $request, artiste $artiste)
    {
        return view('artiste.edit', compact('artiste'));
    }


    public function update(artisteUpdateRequest $request, artiste $artiste)
    {
        $artiste->update($request->validated());

        $request->session()->flash('artiste.id', $artiste->id);

        return redirect()->route('artiste.index');
    }


    public function destroy(Request $request, artiste $artiste)
    {
        $artiste->delete();

        return redirect()->route('artiste.index');
    }
}
