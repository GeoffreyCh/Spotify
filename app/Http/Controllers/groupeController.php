<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Http\Requests\groupeStoreRequest;
use App\Http\Requests\groupeUpdateRequest;
use Illuminate\Http\Request;

class groupeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $groupes = Groupe::all();

        return view('groupe.index', compact('groupes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('groupe.create');
    }

    /**
     * @param \App\Http\Requests\groupeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(groupeStoreRequest $request)
    {
        $groupe = Groupe::create($request->validated());

        $request->session()->flash('groupe.id', $groupe->id);

        return redirect()->route('groupe.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\groupe $groupe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, groupe $groupe)
    {
        return view('groupe.show', compact('groupe'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\groupe $groupe
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, groupe $groupe)
    {
        return view('groupe.edit', compact('groupe'));
    }

    /**
     * @param \App\Http\Requests\groupeUpdateRequest $request
     * @param \App\groupe $groupe
     * @return \Illuminate\Http\Response
     */
    public function update(groupeUpdateRequest $request, groupe $groupe)
    {
        $groupe->update($request->validated());

        $request->session()->flash('groupe.id', $groupe->id);

        return redirect()->route('groupe.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\groupe $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, groupe $groupe)
    {
        $groupe->delete();

        return redirect()->route('groupe.index');
    }
}
