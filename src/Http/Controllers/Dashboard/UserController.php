<?php

namespace Veldman\Dashboard\Http\Controllers\Dashboard;

use App\Models\User;
use Veldman\Dashboard\Http\Controllers\Controller;
use Veldman\Dashboard\Http\Requests\StoreUserRequest;
use Veldman\Dashboard\Http\Requests\UpdateUserRequest;
use Veldman\Dashboard\Models\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index()
    {
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
        $user = User::create(array_merge($request->only('name', 'email', 'organisation_id'),
            ['password' => Hash::make($request->get('password'))]));

        $user->roles()->sync($request->get('roles'));

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
        $user->update($request->only('name', 'email', 'organisation_id'));

        // TODO: Update password if not null

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        try {
            $user->roles()->sync([]);
            $user->delete();

            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index');
        }
    }
}
