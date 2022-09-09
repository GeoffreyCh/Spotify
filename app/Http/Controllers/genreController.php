<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\genreStoreRequest;
use App\Http\Requests\genreUpdateRequest;
use Illuminate\Http\Request;

class genreController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $genres = Genre::all();

        return view('genre.index', compact('genres'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('genre.create');
    }

    /**
     * @param \App\Http\Requests\genreStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(genreStoreRequest $request)
    {
        $genre = Genre::create($request->validated());

        $request->session()->flash('genre.id', $genre->id);

        return redirect()->route('genre.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\genre $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, genre $genre)
    {
        return view('genre.show', compact('genre'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\genre $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, genre $genre)
    {
        return view('genre.edit', compact('genre'));
    }

    /**
     * @param \App\Http\Requests\genreUpdateRequest $request
     * @param \App\genre $genre
     * @return \Illuminate\Http\Response
     */
    public function update(genreUpdateRequest $request, genre $genre)
    {
        $genre->update($request->validated());

        $request->session()->flash('genre.id', $genre->id);

        return redirect()->route('genre.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\genre $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, genre $genre)
    {
        $genre->delete();

        return redirect()->route('genre.index');
    }
}
