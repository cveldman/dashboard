<?php

namespace Veldman\Dashboard\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return true;
    }

    public function viewAny($role)
    {

    }

    public function view($role, $model)
    {
        //
    }

    public function create($role)
    {
        //
    }

    public function update($role, $model)
    {
        //
    }

    public function delete($role, $model)
    {
        //
    }

    public function restore($role, $model)
    {
        //
    }

    public function forceDelete($role, $model)
    {
        //
    }
}
