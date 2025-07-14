<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::latest()->paginate(5);
        $users = User::where('role', 'teacher')->latest()->paginate(5);
        return view('dashboard.teachers.index', compact( 'teachers','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
         $data = $request->validated();

         Teacher::create([
        'user_id' => $data['user_id'], // تأكد أن user_id موجود في ال Request وفي rules
        'name' => $data['name'],
        'image' => $data['image'] ?? null,
        'job' => $data['job'] ?? null,
        'description' => $data['description'] ?? null,
        'bio' => $data['bio'] ?? null,
    ]);

    }

    public function edit(Teacher $teacher)
    {
        return view('dashboard.teachers.edit', compact('teacher'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, Teacher $teacher)
    {

        // ------------------
  $data = $request->except('_token', '_method');

    // 2. Handle image upload if a new one is provided
    if ($request->hasFile('image')) {
        // Delete the old image if exists
        if ($teacher->image && file_exists(public_path($teacher->image))) {
            unlink(public_path($teacher->image));
        }
        // Store the new image
        $path = $request->file('image')->store('uploads', 'custom');
        $data['image'] = $path;
    }

    // 3. Update teacher data
    $teacher->update($data);
        //-------------------

        return redirect()
            ->route('dashboard.teachers.index')
            ->with('success', 'Teacher Updated successfully')
            ->with('type', 'info');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        File::delete(public_path($teacher->image));
        $teacher->delete();
        return redirect()
        ->route('dashboard.teachers.index')
        ->with('success', 'Post deleted successfully')
        ->with('type', 'danger');
    }
}