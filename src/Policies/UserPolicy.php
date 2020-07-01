<?php

namespace Veldman\Dashboard\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        //
    }

    public function viewAny($user)
    {
        return true;
    }

    public function view($user, $model)
    {
        return false;
    }

    public function create($user)
    {
        return true;
    }

    public function update($user, $model)
    {
        return true;
    }

    public function delete($user, $model)
    {
        return true;
    }

    public function restore($user, $model)
    {
        return true;
    }

    public function forceDelete($user, $model)
    {
        return true;
    }
}
