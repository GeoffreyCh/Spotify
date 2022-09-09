<?php

namespace App\Http\Controllers;

use App\Models\Annotation;
use App\Http\Requests\annotationStoreRequest;
use App\Http\Requests\annotationUpdateRequest;
use Illuminate\Http\Request;

class annotationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $annotations = Annotation::all();

        return view('annotation.index', compact('annotations'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('annotation.create');
    }

    /**
     * @param \App\Http\Requests\annotationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(annotationStoreRequest $request)
    {
        $annotation = Annotation::create($request->validated());

        $request->session()->flash('annotation.id', $annotation->id);

        return redirect()->route('annotation.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\annotation $annotation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, annotation $annotation)
    {
        return view('annotation.show', compact('annotation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\annotation $annotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, annotation $annotation)
    {
        return view('annotation.edit', compact('annotation'));
    }

    /**
     * @param \App\Http\Requests\annotationUpdateRequest $request
     * @param \App\annotation $annotation
     * @return \Illuminate\Http\Response
     */
    public function update(annotationUpdateRequest $request, annotation $annotation)
    {
        $annotation->update($request->validated());

        $request->session()->flash('annotation.id', $annotation->id);

        return redirect()->route('annotation.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\annotation $annotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, annotation $annotation)
    {
        $annotation->delete();

        return redirect()->route('annotation.index');
    }
}
