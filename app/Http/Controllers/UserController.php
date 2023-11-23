<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();


        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();


        $user = User::create($data);
        $user->roles()->attach($request->input('roles'));

        return redirect()->route('users.index')->with('users');
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
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validated();


        $user->update($data);

        $roleIds = $request->input('roles');
        $roleNames = Role::find($roleIds)->pluck('name');

        $user->syncRoles($roleNames);


        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {
            $user = User::findOrFail($id);


            $user->roles()->detach();


            $user->delete();
        });

        return redirect('/users');
    }

    public function showPage()
    {
        if (auth()->check()) {
            if (auth()->user()->hasRole('admin')) {
                return redirect('/admin/dashboard');
            } elseif (auth()->user()->hasRole('customer')) {
                return view('customer.dashboard', ['user' => auth()->user()]);
            }
        }


        return view('guest.welcome');
    }

    public function myaccount()
    {
        $users = User::all();
        $roles = Role::all();


        return view('users.myaccount', compact('users', 'roles'));
    }
}