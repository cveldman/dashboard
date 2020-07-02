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

    <div class="row bg-white">
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
                                <a href="{{ route('admin.users.edit', $item) }}">{{ __('Edit') }}</a>
                            @endcan

                            @can('delete', $item)
                                    <a href="{{ route('admin.users.destroy', $item) }}" data-toggle="modal" data-target="#delete-modal"
                                       onclick="document.getElementById('delete-form').setAttribute('action', this.getAttribute('href'));">{{ __('Delete') }}</a>
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
    </div>

    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Delete') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you sure you want to delete this entry?') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>

                    <form id="delete-form" method="post">
                        @csrf

                        <input type="hidden" name="_method" value="delete" />

                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
