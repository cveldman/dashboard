@extends('admin::layout')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('name') }}</th>
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
                            <a href="{{ route('admin.roles.show', $item) }}">
                                {{ $item->name }}
                            </a>
                        @else
                            {{ $item->name }}
                        @endcan
                    </td>
                    <td class="text-right">
                        @can('update', $item)
                            <a href="{{ route('admin.roles.edit', $item) }}">Update</a>
                        @endcan

                        @can('delete', $item)
                            <a href="{{ route('admin.roles.edit', $item) }}">Delete</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3" class="text-center">{{ __('No items') }}</td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection
