<?php

namespace App\Http\Controllers;

use App\Http\Requests\albumStoreRequest;
use App\Http\Requests\albumUpdateRequest;
use App\Models\Album;
use Illuminate\Http\Request;

class albumController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $albums = Album::with('artistes', 'groupes')->get();

        return view('album.index', compact('albums'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('album.create');
    }

    /**
     * @param \App\Http\Requests\albumStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(albumStoreRequest $request)
    {
        $album = Album::create($request->validated());

        $request->session()->flash('album.id', $album->id);

        return redirect()->route('album.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\album $album
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, album $album)
    {
        return view('album.show', compact('album'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\album $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, album $album)
    {
        return view('album.edit', compact('album'));
    }

    /**
     * @param \App\Http\Requests\albumUpdateRequest $request
     * @param \App\album $album
     * @return \Illuminate\Http\Response
     */
    public function update(albumUpdateRequest $request, album $album)
    {
        $album->update($request->validated());

        $request->session()->flash('album.id', $album->id);

        return redirect()->route('album.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\album $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, album $album)
    {
        $album->delete();

        return redirect()->route('album.index');
    }
}
