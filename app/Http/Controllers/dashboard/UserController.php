<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

    $search = trim($request->search);
    $sort = $request->sort_by ?? 'null';

    $users = User::query();

    if ($search) {
        $users->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('email', 'like', '%' . $search . '%');
        });
    }

    if (in_array($sort, ['student', 'teacher', 'admin'])) {
    $users = $users->where('role', $sort);
    } else {
        $users->latest();
    }

    $users = $users->paginate(env('10'))->appends([
        'search' => $search,
        'sort_by' => $sort
    ]);



        // $users = User::latest()->paginate(10);
        return view('dashboard.users.index', compact('users', 'search', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // 1. validation done

         $path = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'custom');
        }

        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => Hash::make($request->password),
        'image' => $path,
        'job' => $request->job,
        'description' => $request->description,
        'bio' => $request->bio,
        'about' => $request->about,
        'achievements' => $request->achievements,
        'objective' => $request->objective,
    ]);

        return redirect()
        ->route('dashboard.users.index')
        ->with('success', 'User Added successfully')
        ->with('type', 'success');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
{

    $path = null;

        // Check if the image is uploaded

    if ($request->hasFile('image')) {
             // Delete the old image if exists

            $imageName = basename($user->image);
            $fullPath = public_path('uploads/uploads/' . $imageName);

                if ($user->image && file_exists($fullPath)) {
                 unlink($fullPath);
                }

            $path = $request->file('image')->store('uploads', 'custom');

        }else {
            $path = $user->image;
        }

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'image' => $path,
        'job' => $request->job,
        'description' => $request->description,
        'bio' => $request->bio,
        'about' => $request->about,
        'achievements' => $request->achievements,
        'objective' => $request->objective,
    ]);


         return redirect()
        ->route('dashboard.users.index')
        ->with('success', 'User updated successfully')
        ->with('type', 'info');


}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        if ($request->hasFile('image')) {
            $imageName = basename($user->image);
            $fullPath = public_path('uploads/uploads/' . $imageName);

            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        }

        $user->delete();

        return redirect()
        ->route('dashboard.users.index')
        ->with('success', 'User deleted successfully')
        ->with('type', 'danger');
    }
}
