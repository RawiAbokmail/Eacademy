<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $originalSlug = Str::slug($request->title);
        $slug = $originalSlug;
        $count = 1;

        while (Product::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $count;
        $count++;
    }

        $mainImagePath = $request->file('image')->store('products', 'customProduct');
        $product = Product::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $mainImagePath,
        ]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $galleryPath = $image->store('products/gallery', 'customProduct');
                $product->gallery()->create([
                    'image' => $galleryPath
                ]);
            }
        }

        return redirect()
            ->route('dashboard.products.index')
            ->with('success', 'Product Added successfully')
            ->with('type', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('dashboard.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->title !== $product->title) {
        $originalSlug = Str::slug($request->title);
        $slug = $originalSlug;
        $count = 1;

        while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        $product->slug = $slug;
    }

    if ($request->hasFile('image')) {

        if ($product->image && Storage::disk('customProduct')->exists($product->image)) {
            Storage::disk('customProduct')->delete($product->image);
        }

        $mainImagePath = $request->file('image')->store('products', 'customProduct');
        $product->image = $mainImagePath;
    }

    $product->title = $request->title;
    $product->description = $request->description;
    $product->category_id = $request->category_id;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->save();

    if ($request->hasFile('gallery')) {
        foreach ($request->file('gallery') as $image) {
            $galleryPath = $image->store('products/gallery', 'customProduct');
            $product->gallery()->create([
                'image' => $galleryPath
            ]);
        }
    }

     return redirect()
        ->route('dashboard.products.index')
        ->with('success', 'Product updated successfully')
        ->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
         if ($product->image) {
            Storage::disk('customProduct')->delete($product->image);
        }

        foreach ($product->gallery as $galleryImage) {
            Storage::disk('customProduct')->delete($galleryImage->image);
            $galleryImage->delete();
        }

        $product->delete();

        return redirect()
                ->route('dashboard.products.index')
                ->with('success', 'the product deleted successfully')
                ->with('type', 'danger');
    }
}