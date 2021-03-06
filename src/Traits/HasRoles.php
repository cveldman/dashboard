<?php

namespace Veldman\Dashboard\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Veldman\Dashboard\Models\Role;

trait HasRoles
{
    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($roles) {
        return $this->roles()->where('name', $roles)->exists();
    }
}
