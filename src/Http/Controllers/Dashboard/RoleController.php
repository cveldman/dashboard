<?php

namespace Veldman\Dashboard\Http\Controllers\Dashboard;

use Veldman\Dashboard\Http\Controllers\Controller;
use Veldman\Dashboard\Http\Requests\StoreRoleRequest;
use Veldman\Dashboard\Http\Requests\UpdateRoleRequest;
use Veldman\Dashboard\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    public function index()
    {
        $items = [];

        $items = Role::paginate();

        return view('admin::roles.index', compact('items'));
    }

    public function create()
    {
        return view('admin::roles.create');
    }

    public function store(StoreRoleRequest $request)
    {
        Role::create($request->validated());

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        return view('admin::roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('admin::roles.edit', compact('role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index');
    }
}
