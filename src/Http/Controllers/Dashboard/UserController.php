<?php

namespace Veldman\Dashboard\Http\Controllers\Dashboard;

use App\User;
use Veldman\Dashboard\Http\Controllers\Controller;
use Veldman\Dashboard\Http\Requests\StoreUserRequest;
use Veldman\Dashboard\Http\Requests\UpdateUserRequest;
use Veldman\Dashboard\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index()
    {
        $items = [];

        $items = User::paginate();

        return view('admin::users.index', compact('items'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');

        return view('admin::users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        return view('admin::users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');

        return view('admin::users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
