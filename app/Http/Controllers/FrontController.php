<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\Event;
use App\Models\Tag;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    function index()
    {
        $courses = Course::all();
        $people = User::count() + Teacher::count();
        $teachersCount = Teacher::count();
        $studentsCount = User::where('role', 'student')->count();
        $coursesCount = Course::count();
        return view('eacademy.index', compact('courses', 'studentsCount', 'coursesCount', 'people', 'teachersCount'));
    }

    function about()
    {
         $teachers = Teacher::latest()->paginate(8);
        $people = User::count() + Teacher::count();
        $teachersCount = Teacher::count();
        $studentsCount = User::where('role', 'student')->count();
        $coursesCount = Course::count();
        return view('eacademy.about', compact('studentsCount', 'coursesCount', 'people', 'teachersCount', 'teachers'));
    }

    function courses()
    {
        $courses = Course::latest()->paginate(6);
        return view('eacademy.courses', compact('courses'));
    }

    function courses_single(Course $course)
    {
        $teachers = Teacher::all();
        $categories = Category::all();

        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->latest()
            ->take(2)
            ->get();

        return view('eacademy.courses-single', compact('course', 'teachers', 'categories', 'relatedCourses'));
    }

    function events()
    {
        $events = Event::latest()->paginate(6);
        return view('eacademy.events', compact('events'));
    }

    function events_single(Event $event)
    {
        return view('eacademy.events-single', compact('event'));
    }

    function teachers()
    {
        $teachers = Teacher::latest()->paginate(8);
        return view('eacademy.teachers', compact('teachers'));
    }

    function teachers_single(Teacher $teacher)
    {
        return view('eacademy.teachers-single', compact('teacher'));
    }

    function blog(Request $request)
    {
        $tags = Tag::all();
        $categories = Category::all();


         $search = trim($request->search);
    $categorySlug = $request->category;

    $blogs = Blog::query();

    if ($search) {
        $blogs->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');
        });
    }

    if ($categorySlug) {
        $blogs->whereHas('category', function ($query) use ($categorySlug) {
            $query->where('slug', $categorySlug);
        });
    }

    $blogs = $blogs->latest()->paginate(2)->appends($request->query());

        return view('eacademy.blogs', compact('blogs', 'categories', 'tags', 'search', 'categorySlug'));
    }

    function blog_single(Blog $blog)
    {
        $tags = Tag::all();
        return view('eacademy.blog-single', compact('blog', 'tags'));
    }

    function shop()
    {
        return view('eacademy.shop');
    }

    function shop_single()
    {
        return view('eacademy.shop-single');
    }

    function contact()
    {
        return view('eacademy.contact');
    }

    function cart()
    {
        return view('eacademy.cart');
    }

    function checkout()
    {
        return view('eacademy.checkout');
    }

}
