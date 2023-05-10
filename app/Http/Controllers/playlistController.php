<?php

namespace App\Http\Controllers;

use App\Http\Requests\playlistStoreRequest;
use App\Http\Requests\playlistUpdateRequest;
use App\Models\Playlist;
use Illuminate\Http\Request;

class playlistController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $playlist = Playlist::first();

        return view('playlist.index', compact('playlist'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('playlist.create');
    }

    /**
     * @param \App\Http\Requests\playlistStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(playlistStoreRequest $request)
    {
        $playlist = Playlist::create($request->validated());

        $request->session()->flash('playlist.id', $playlist->id);

        return redirect()->route('playlist.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\playlist $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, playlist $playlist)
    {
        return view('playlist.show', compact('playlist'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\playlist $playlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, playlist $playlist)
    {
        return view('playlist.edit', compact('playlist'));
    }

    /**
     * @param \App\Http\Requests\playlistUpdateRequest $request
     * @param \App\playlist $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(playlistUpdateRequest $request, playlist $playlist)
    {
        $playlist->update($request->validated());

        $request->session()->flash('playlist.id', $playlist->id);

        return redirect()->route('playlist.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\playlist $playlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, playlist $playlist)
    {
        $playlist->delete();

        return redirect()->route('playlist.index');
    }
}
