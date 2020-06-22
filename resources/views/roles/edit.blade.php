@extends('admin::layout')

@section('content')

    <form method="post" action="{{ route('admin.users.update', $user) }}">

        <input name="_method" type="hidden" value="PUT">

        @csrf

        <div class="card">
            <div class="card-header">Header</div>
            <div class="card-body">

                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select class="form-control" id="roles" name="roles[]" multiple>
                        @foreach($roles as $key => $value)
                            <option value="{{ $key }}" @if($user->roles->contains($key)) selected @endif>{{ $value }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                </div>

            </div>
        </div>

        <input type="submit" value="Save" class="btn btn-primary"/>

    </form>

@endsection
