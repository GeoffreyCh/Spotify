<?php

namespace App\Http\Controllers;

use App\Models\Annotable;
use App\Http\Requests\annotableStoreRequest;
use App\Http\Requests\annotableUpdateRequest;
use Illuminate\Http\Request;

class annotableController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $annotables = Annotable::all();

        return view('annotable.index', compact('annotables'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('annotable.create');
    }

    /**
     * @param \App\Http\Requests\annotableStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(annotableStoreRequest $request)
    {
        $annotable = Annotable::create($request->validated());

        $request->session()->flash('annotable.id', $annotable->id);

        return redirect()->route('annotable.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\annotable $annotable
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, annotable $annotable)
    {
        return view('annotable.show', compact('annotable'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\annotable $annotable
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, annotable $annotable)
    {
        return view('annotable.edit', compact('annotable'));
    }

    /**
     * @param \App\Http\Requests\annotableUpdateRequest $request
     * @param \App\annotable $annotable
     * @return \Illuminate\Http\Response
     */
    public function update(annotableUpdateRequest $request, annotable $annotable)
    {
        $annotable->update($request->validated());

        $request->session()->flash('annotable.id', $annotable->id);

        return redirect()->route('annotable.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\annotable $annotable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, annotable $annotable)
    {
        $annotable->delete();

        return redirect()->route('annotable.index');
    }
}
