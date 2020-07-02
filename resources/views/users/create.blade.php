@extends('admin::layout')

@section('content')

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div class="card">
            <div class="card-header">
                <strong>{{ __('Add') }} {{ strtolower(__('User')) }}</strong>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>

                    <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control @error('name') is-invalid @enderror" autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>

                    <input type="text" name="email" value="{{ old('email') }}" id="email" class="form-control @error('email') is-invalid @enderror" autocomplete="email">

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
                                <option value="{{ $key }}" @if(old('organisation_id')) selected @endif>{{ $value }}</option>
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
                    <label for="password">{{ __('Password') }}</label>

                    <input type="password" name="password" value="{{ old('password') }}"
                           id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>

                    <input type="password" name="password_confirmation"
                            id="password" class="form-control @error('password_confirmation') is-invalid @enderror" autocomplete="new-password">

                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select id="roles" name="roles[]" class="form-control @error('roles') is-invalid @enderror" multiple>
                        @foreach($roles as $key => $value)
                            <option value="{{ $key }}" @if(in_array($key, old('roles', []))) @endif>{{ $value }}</option>
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
