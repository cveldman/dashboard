@extends('admin::layout')

@section('content')

    <div class="card">
        <div class="card-header">Header</div>
        <div class="card-body">

            <div class="form-group">
                <label for="roles">Example select</label>
                <select class="form-control" id="roles" name="roles[]" multiple>
                    @foreach($roles as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Example invalid custom select feedback</div>
            </div>

        </div>
    </div>

@endsection
