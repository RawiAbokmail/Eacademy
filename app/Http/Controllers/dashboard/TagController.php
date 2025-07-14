<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('dashboard.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. validation
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // 2. save data
        Tag::create($request->only('name'));

        return redirect()->route('dashboard.tags.index')
            ->with('success', 'Tag created successfully.')
            ->with('type', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit', compact('tag'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        // 1. validation
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // 2. update data
        $tag->update($request->only('name'));

        return redirect()->route('dashboard.tags.index')
            ->with('success', 'Tag updated successfully.')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('dashboard.tags.index')
            ->with('success', 'Tag deleted successfully.')
            ->with('type', 'danger');
    }
}