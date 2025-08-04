<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);

        return view('dashboard.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.blogs.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
           // 1. validation done (ضمن BlogRequest)

    // 2. تجهيز البيانات (بدون tags)
    $data = $request->except(['_token', 'tags']);

    // توليد slug فريد
    $originalSlug = Str::slug($request->title);
    $slug = $originalSlug;
    $count = 1;

    while (Blog::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $count;
        $count++;
    }

    $data['slug'] = $slug;

    // 3. رفع الصورة إن وُجدت
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('uploads', 'custom');
        $data['image'] = $path;
    }

    // 4. حفظ المقال
    $blog = Blog::create($data);

    // 5. ربط التاغات (إن وُجدت)
    if ($request->filled('tags')) {
        $blog->tags()->attach($request->tags);
    }

    return redirect()
        ->route('dashboard.blogs.index')
        ->with('success', 'Blog Added successfully')
        ->with('type', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $tags = Tag::all();
        return view('dashboard.blogs.show', compact('blog', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.blogs.edit', compact('blog', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        //1. validation done

        //2. save file
        $data = $request->except('_token', '_method', 'tags');

        // اعادة توليد slug اذا تغير العنوان

        if($request->title !== $blog->title ){
            $originalSlug = Str::slug($request->title);
            $slug = $originalSlug;
            $count = 1;

            while (Blog::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $data['slug'] = $slug;
        } else {
            $data['slug'] = $blog->slug; // الاحتفاظ بالـ slug القديم اذا لم يتغير العنوان
        }

        if ($request->hasFile('image')) {
             // Delete the old image if exists

            $imageName = basename($blog->image);
            $fullPath = public_path('uploads/uploads/' . $imageName);

                if (file_exists($fullPath)) {
                 unlink($fullPath);
                }

            $path = $request->file('image')->store('uploads', 'custom');
            $data['image'] = $path;
        }


        //3. update data
        $blog->update($data);
         if ($request->filled('tags')) {
        $blog->tags()->sync($request->tags);
    }
        return redirect()
            ->route('dashboard.blogs.index')
            ->with('success', 'Blog Updated successfully')
            ->with('type', 'info');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {

        $imageName = basename($blog->image); // فقط اسم الصورة بدون المسار
        $fullPath = public_path('uploads/uploads/' . $imageName); // مجلد التخزين الحقيقي

        if (file_exists($fullPath)) {
             unlink($fullPath);
        }

        // Delete the blog
        $blog->delete();

        return redirect()
            ->route('dashboard.blogs.index')
            ->with('success', 'Blog Deleted successfully')
            ->with('type', 'danger');
    }

}
