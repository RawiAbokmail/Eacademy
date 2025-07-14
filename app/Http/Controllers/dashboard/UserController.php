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
    public function index()
    {

        $users = User::latest()->paginate(10);
        return view('dashboard.users.index', compact('users'));
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
    // $validated = $request->validate([
    //     'name' => 'required|string|max:255',
    //     'role' => 'required|in:admin,teacher,student',
    // ]);

    $path = null;

        // Check if the image is uploaded

    if ($request->hasFile('image')) {
             // Delete the old image if exists
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }
            $path = $request->file('image')->store('uploads', 'custom');
        }else {
            $path = $user->image; // Keep the old image if no new one is uploaded
        }

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'image' => $path,
        'job' => $request->job,
        'description' => $request->description,
        'bio' => $request->bio,
    ]);

    if($request->role == 'teacher'){
        return redirect()
        ->route('dashboard.teachers.index')
        ->with('success', 'User updated successfully')
        ->with('type', 'info');
    }else{
         return redirect()
        ->route('dashboard.users.index')
        ->with('success', 'User updated successfully')
        ->with('type', 'info');
    }

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
        ->route('dashboard.users.index')
        ->with('success', 'User deleted successfully')
        ->with('type', 'danger');
    }
}