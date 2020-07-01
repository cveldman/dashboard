@extends('admin::layout')

@section('content')

    <h1 class="mb-4">{{ __('Users') }}</h1>

    <div class="row mb-3">
        <div class="col text-right">
            @can('create', config('admin.models.user'))
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">{{ __('Add') }}</a>
            @endcan
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('Name') }}</th>
            <th scope="col">{{ __('Email') }}</th>
            <th scope="col">{{ __('Roles') }}</th>
            <th scope="col" class="text-right">{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @if($items->isNotEmpty())
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>
                        @can('view', $item)
                            <a href="{{ route('admin.users.show', $item) }}">
                                {{ $item->name }}
                            </a>
                        @else
                            {{ $item->name }}
                        @endcan
                    </td>
                    <td>{{ $item->email }}</td>
                    <td>{{ implode(' ', $item->roles->pluck('name')->all()) }}</td>
                    <td class="text-right">
                        @can('update', $item)
                            <a href="{{ route('admin.users.edit', $item) }}">{{ __('Update') }}</a>
                        @endcan

                        @can('delete', $item)
                            <a href="{{ route('admin.users.edit', $item) }}">{{ __('Delete') }}</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">{{ __('No items') }}</td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection
