@if ($item['submenu'] == [])
    <li class="nav-item">
        <a class="nav-link" href="{{ url($item['slug']) }}">
            <i class='{{$item['icon']}}'></i>
            {{ $item['name'] }}
        </a>
    </li>
@else
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" >
            <i class='{{$item['icon']}}'></i>
            {{ $item['name'] }} <span class="caret"></span>
        </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @foreach ($item['submenu'] as $submenu)
            @if ($submenu['submenu'] == [])
                <a class="dropdown-item" href="{{ route($submenu['slug']) }}">
                    <i class='{{$submenu['icon']}}'></i>
                    {{ $submenu['name'] }}
                    </a>
            @else
                @include('partials.menu-item', [ 'item' => $submenu ])
            @endif
        @endforeach
    </div>
    </li>
@endif
