<?php

namespace Veldman\Dashboard\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if(in_array($user->id, [1,2,3]))
            return true;
    }

    public function viewAny($user)
    {
        //
    }

    public function view($user, $model)
    {
        //
    }

    public function create($user)
    {
        //
    }

    public function update($user, $model)
    {
        //
    }

    public function delete($user, $model)
    {
        //
    }

    public function restore($user, $model)
    {
        //
    }

    public function forceDelete($user, $model)
    {
        //
    }
}
