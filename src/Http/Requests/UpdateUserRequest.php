<?php

namespace Veldman\Dashboard\Http\Requests;

class UpdateUserRequest extends StoreUserRequest
{
    public function authorize()
    {
        return true;
    }
}
