<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('category', 'teacher')->latest()->paginate(10);
        return view('dashboard.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $teachers = User::where('role', 'teacher')->get(); // Assuming you want to get teachers with a specific role
        return view('dashboard.courses.create', compact('categories', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        // 1. Validation done

        // 2. Prepare data
        $data = $request->except(['_token', 'image']);

        $originalSlug = Str::slug($request->title);
        $slug = $originalSlug;
        $count = 1;

        while (Course::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
             $count++;
         }

        $data['slug'] = $slug;

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'custom');
            $data['image'] = $path;
        }

        Course::create($data);

        // 3. Redirect with success message
        return redirect()
        ->route('dashboard.courses.index')
        ->with('success', 'Course created successfully')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories = Category::all();
        $teachers = User::where('role', 'teacher')->get();
        return view('dashboard.courses.edit', compact('course', 'categories', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {


        // 1. Validation done

        // 2. Prepare data
        $data = $request->except(['_token', 'image']);

        if($request->title !== $course->title ){
            $originalSlug = Str::slug($request->title);
            $slug = $originalSlug;
            $count = 1;

            while (Course::where('slug', $slug)->where('id', '!=', $course->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $data['slug'] = $slug;
        } else {
            $data['slug'] = $course->slug; // الاحتفاظ بالـ slug القديم اذا لم يتغير العنوان
        }

        if ($request->hasFile('image')) {
             // Delete the old image if exists

            $imageName = basename($course->image);
            $fullPath = public_path('uploads/uploads/' . $imageName);

                if ($course->image && file_exists($fullPath)) {
                    unlink($fullPath);
                }

            $path = $request->file('image')->store('uploads', 'custom');
            $data['image'] = $path;
        }

        // 3. Update course
        $course->update($data);

        // 4. Redirect with success message
        return redirect()
        ->route('dashboard.courses.index')
        ->with('success', 'Course updated successfully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // 1. Delete the course
        $imageName = basename($course->image);
        $fullPath = public_path('uploads/uploads/' . $imageName);

        if (file_exists($fullPath)) {
             unlink($fullPath);
        }
        $course->delete();

        // 2. Redirect with success message
        return redirect()
        ->route('dashboard.courses.index')
        ->with('success', 'Course deleted successfully')
        ->with('type', 'danger');
    }

}
