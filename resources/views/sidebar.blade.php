<div id="sidebar" class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        {{ config('app.name') }}
    </div>

    <ul class="c-sidebar-nav">

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::is(['admin/dashboard', 'admin/dashboard/*'])) active @endif"
               href="{{ route('admin.dashboard.index') }}">
                <i class="c-sidebar-nav-icon cil-speedometer"></i> Dashboard
            </a>
        </li>

        @foreach($menu as $item)
            @if($item->route == null)
                <li class="c-sidebar-nav-title mt-5">{{ $item->name }}</li>
            @else
                @can('viewAny', $item->class)
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link @if(Request::is([$item->route, 'admin/organisation/*'])) c-active @endif"
                           href="{{ $item->route }}">
                            <i class="c-sidebar-nav-icon {{ $item->icon }}"></i> {{ __($item->name) }}
                        </a>
                    </li>
                @endcan
            @endif
        @endforeach

    </ul>
</div>


