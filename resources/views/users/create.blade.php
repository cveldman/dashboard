@extends('admin::layout')

@section('content')

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div class="card">
            <div class="card-header">
                <strong>{{ __('Add') }} {{ strtolower(__('User')) }}</strong>
            </div>
            <div class="card-body">


                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               autocomplete="new-password">
                    </div>
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

                @isset($organisations)

                    <div class="form-group row">
                        <label for="organisation">{{ __('Organisation') }}</label>

                        <select id="organisation" name="organisation_id" class="form-control @error('organisation_id') is-invalid @enderror">
                            @foreach($organisations as $key => $value)
                                <option value="{{ $key }}" @if(false) selected @endif>{{ $value }}</option>
                            @endforeach
                        </select>

                        @error('organisation_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                @endisset

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
