<?php

namespace App\Http\Controllers;

use App\Http\Requests\tagStoreRequest;
use App\Http\Requests\tagUpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class tagController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = Tag::all();

        return view('tag.index', compact('tags'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tag.create');
    }

    /**
     * @param \App\Http\Requests\tagStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(tagStoreRequest $request)
    {
        $tag = Tag::create($request->validated());

        $request->session()->flash('tag.id', $tag->id);

        return redirect()->route('tag.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, tag $tag)
    {
        return view('tag.show', compact('tag'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }

    /**
     * @param \App\Http\Requests\tagUpdateRequest $request
     * @param \App\tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(tagUpdateRequest $request, tag $tag)
    {
        $tag->update($request->validated());

        $request->session()->flash('tag.id', $tag->id);

        return redirect()->route('tag.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, tag $tag)
    {
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
