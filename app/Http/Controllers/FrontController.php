<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Course;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    function index()
    {
        $courses = Course::all();
        $people = User::count();
        $teachersCount = User::where('role', 'teacher')->count();
        $studentsCount = User::where('role', 'student')->count();
        $coursesCount = Course::count();
        $teachers = User::where('role', 'teacher')->latest()->paginate(4);
        return view('eacademy.index', compact('courses', 'studentsCount', 'coursesCount', 'people', 'teachersCount', 'teachers'));
    }

    function about()
    {
        $teachers = User::where('role', 'teacher')->latest()->paginate(8);
        $people = User::count();
        $teachersCount = User::where('role', 'teacher')->count();
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
        // $teachers = Teacher::all();
        $teachers = User::where('role', 'teacher')->get();
        $categories = Category::all();
        $lectures = $course->lectures()->latest()->get();

        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->latest()
            ->take(3)
            ->get();

        return view('eacademy.courses-single', compact('course', 'teachers', 'categories', 'relatedCourses', 'lectures'));
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
        $teachers = User::where('role', 'teacher')->latest()->paginate(8);
        return view('eacademy.teachers', compact('teachers'));
    }


    function teachers_single(User $teacher)
    {
        $relatedCourses = Course::where('teacher_id', $teacher->id)
            ->where('id', '!=', null)
            ->latest()
            ->take(2)
            ->get();

        // $course = Course::where('teacher_id', $teacher->id)->first();
        // if (!$course) {
        //     $relatedCourses = collect(); // Empty collection if no courses found
        //     return view('eacademy.teachers-single', compact('teacher', 'relatedCourses'));
        // }
        // $relatedCourses = Course::where('teacher_id', $course->teacher_id)
        //     ->where('id', '!=', $course->id)
        //     ->latest()
        //     ->take(2)
        //     ->get();

        return view('eacademy.teachers-single', compact('teacher', 'relatedCourses'));
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
        $products = Product::latest()->paginate(8);
        return view('eacademy.shop', compact('products'));
    }

    function shop_single(Product $product)
    {
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(3)
            ->get();
        return view('eacademy.shop-single', compact('product', 'relatedProducts'));
    }

    function contact()
    {
        return view('eacademy.contact');
    }

    function cart()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('eacademy.shop')->with('info', 'Your cart is empty!');
        }
        return view('eacademy.cart', compact('cart'));
    }

    function addToCart(Request $request, Product $product)
    {
        // Logic to add product to cart
        $cart = session()->get('cart', []);
        $quantity = max(1, (int) $request->input('quantity', 1));
        if (isset($cart[$product->slug])) {
            $cart[$product->slug]['quantity']+= $quantity;
        } else {
            $cart[$product->slug] = [
                "title" => $product->title,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image,
            ];
        }


        session()->put('cart', $cart);

        return redirect()->route('eacademy.cart')->with('success', 'Product added to cart successfully!');
    }

    function removeFromCart(Product $product)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$product->slug])) {
            unset($cart[$product->slug]);
            session()->put('cart', $cart);
        }

        return redirect()->route('eacademy.cart')->with('success', 'Product removed from cart successfully!');
    }


    function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('eacademy.shop')->with('info', 'Your cart is empty!');
        }
         $subTotal = array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart));
        $shipping = $subTotal > 0 ? 70 : 0;
        $total    = $subTotal + $shipping;

        return view('eacademy.checkout', compact('cart', 'subTotal', 'shipping', 'total'));
    }





}
