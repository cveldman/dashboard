<?php

namespace Veldman\Dashboard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends StoreUserRequest
{
    public function authorize()
    {
        return true;
    }
}
