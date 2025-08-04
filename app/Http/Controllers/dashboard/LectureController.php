<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LectureRequest;
use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LectureController extends Controller
{

    public function index()
    {
        $lectures = Lecture::with('course')->latest()->paginate(10);
        return view('dashboard.lectures.index', compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('dashboard.lectures.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LectureRequest $request)
    {
        $data = $request->except(['_token', 'video']);


    if ($request->hasFile('video')) {
        $path = $request->file('video')->store('uploads', 'custom');
        $data['video'] = $path;
    }

        Lecture::create($data);

        return redirect()
        ->route('dashboard.lectures.index')
        ->with('success', 'Lecture created successfully.')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture)
    {
        return view('dashboard.lectures.show', compact('lecture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecture $lecture)
    {
        $courses = Course::all();
        return view('dashboard.lectures.edit', compact('lecture', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LectureRequest $request, Lecture $lecture)
    {
        $data = $request->except(['_token', 'video']);

        if ($request->hasFile('video')) {
            $videoName = basename($lecture->video);
            $fullPath = public_path('uploads/uploads/' . $videoName);

                if ($lecture->image && file_exists($fullPath)) {
                 unlink($fullPath);
                }
            $path = $request->file('video')->store('uploads', 'custom');
            $data['video'] = $path;
        }

        $lecture->update($data);

        return redirect()
            ->route('dashboard.lectures.index')
            ->with('success', 'Lecture updated successfully.')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecture $lecture)
    {
        $videoName = basename($lecture->video);
        $fullPath = public_path('uploads/uploads/' . $videoName);

        if (file_exists($fullPath)) {
             unlink($fullPath);
        }

        $lecture->delete();

        return redirect()
            ->route('dashboard.lectures.index')
            ->with('success', 'Lecture deleted successfully.')
            ->with('type', 'danger');

    }
}
