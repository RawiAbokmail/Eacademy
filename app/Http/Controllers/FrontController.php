<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    function index()
    {
        return view('eacademy.index');
    }

    function about()
    {
        return view('eacademy.about');
    }

    function courses()
    {
        return view('eacademy.courses');
    }

    function courses_single()
    {
        return view('eacademy.courses-single');
    }

    function events()
    {
        return view('eacademy.events');
    }

    function events_single()
    {
        return view('eacademy.events-single');
    }

    function teachers()
    {
        return view('eacademy.teachers');
    }

    function teachers_single()
    {
        return view('eacademy.teachers-single');
    }

    function blog()
    {
        return view('eacademy.blogs');
    }

    function blog_single()
    {
        return view('eacademy.blog-single');
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
