<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('dashboard/categories/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. validation
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        // 2. slug generation

        $data = $request->except('_token');
        $originalSlug = Str::slug($request->name);
        $slug = $originalSlug;
        $count = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'custom');
            $data['image'] = $path;
        }

        // 3. save data
        $category = Category::create($data);

        return redirect()->route('dashboard.categories.index')
            ->with('success', 'Category created successfully.')
            ->with('type', 'success');

    }



    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        // 1. validation
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        // 2. slug generation
        $data = $request->except('_token', '_method');
        if ($request->name !== $category->name) {
            $originalSlug = Str::slug($request->name);
            $slug = $originalSlug;
            $count = 1;
             while (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $data['slug'] = $slug;

    }else {
            $data['slug'] = $category->slug; // الاحتفاظ بالـ slug القديم اذا لم يتغير العنوان
        }

        // 3. update data
        if ($request->hasFile('image')) {
            // Delete the old image if exists

            $imageName = basename($category->image); // فقط اسم الصورة بدون المسار
            $fullPath = public_path('uploads/uploads/' . $imageName); // مجلد التخزين الحقيقي

                if ($category->image && file_exists($fullPath)) {
                    unlink($fullPath);
                }
            
            $path = $request->file('image')->store('uploads', 'custom');
            $data['image'] = $path;
        }
        $category->update($data);

       return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'Category updated successfully.')
            ->with('type', 'info');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $imageName = basename($category->image); // فقط اسم الصورة بدون المسار
        $fullPath = public_path('uploads/uploads/' . $imageName); // مجلد التخزين الحقيقي

        if (file_exists($fullPath)) {
             unlink($fullPath);
        }
        $category->delete();

       return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'Category deleted successfully.')
            ->with('type', 'danger');
    }
}
