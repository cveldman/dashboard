<?php

namespace Veldman\Dashboard\Http\Requests;

class UpdateUserRequest extends StoreUserRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
            'roles' => ['required', 'array'],
            'organisation_id' => ['sometimes', 'nullable']
        ];
    }
}
