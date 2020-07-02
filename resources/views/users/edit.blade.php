@extends('admin::layout')

@section('content')

    <form method="POST" action="{{ route('admin.users.update', $user) }}">

        <input name="_method" type="hidden" value="PUT">

        @csrf

        <div class="card">
            <div class="card-header">
                <strong>{{ __('Edit') }} {{ strtolower(__('User')) }}</strong>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>

                    <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name" class="form-control @error('name') is-invalid @enderror" autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>

                    <input type="text" name="email" value="{{ old('email', $user->email) }}" id="email" class="form-control @error('email') is-invalid @enderror" autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                @isset($organisations)

                    <div class="form-group">
                        <label for="organisation">{{ __('Organisation') }}</label>

                        <select id="organisation" name="organisation_id" class="form-control @error('organisation_id') is-invalid @enderror">
                            @foreach($organisations as $key => $value)
                                <option value="{{ $key }}" @if(old('organisation_id', $user->organisation_id)) selected @endif>{{ $value }}</option>
                            @endforeach
                        </select>

                        @error('organisation_id')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                @endisset

                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select id="roles" name="roles[]" class="form-control @error('roles') is-invalid @enderror" multiple>
                        @foreach($roles as $key => $value)
                            <option value="{{ $key }}" @if(in_array($key, old('roles', $user->roles->pluck('id')->toArray()))) selected @endif>{{ $value }}</option>
                        @endforeach
                    </select>

                    @error('roles')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection
