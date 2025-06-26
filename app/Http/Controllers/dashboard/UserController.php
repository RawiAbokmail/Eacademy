<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

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

        // 2. save data
        $data = $request->except('_token');
        $user = User::create($data);

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

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
     {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'role' => $request->role,
        ]);

        return redirect()
        ->route('dashboard.users.index')
        ->with('success', 'User updated successfully')
        ->with('type', 'info');
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
