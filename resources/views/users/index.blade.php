@extends('admin::layout')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            <th scope="col" class="text-right">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($items->isNotEmpty())
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>
                        <a href="{{ route('admin.users.show', $item) }}">{{ $item->name }}</a>
                    </td>
                    <td>{{ $item->email }}</td>
                    <td>{{ implode(' ', $item->roles->pluck('name')->all()) }}</td>
                    <td class="text-right">
                        @can('update', $item)
                            <a href="{{ route('admin.users.edit', $item) }}">Update</a>
                        @endcan

                        @can('delete', $item)
                            <a href="{{ route('admin.users.edit', $item) }}">Delete</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">Geen items</td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection
