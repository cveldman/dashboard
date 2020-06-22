<?php

namespace Veldman\Dashboard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends StoreRoleRequest
{
    public function authorize()
    {
        return true;
    }
}
