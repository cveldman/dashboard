<?php

namespace Veldman\Dashboard\Http\Requests;

class UpdateRoleRequest extends StoreRoleRequest
{
    public function authorize()
    {
        return true;
    }
}
