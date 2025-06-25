<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="{{ route('CC | Home') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('src/assets/favicon/favicon-32x32.png') }}" style="height: 25px !important" />
            </span>
            <span class="app-brand-text demo menu-text fs-5 fw-bold ms-2">Control Center</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="icon-base bx bx-chevron-left"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @php
            $part = '';
        @endphp
        @foreach ($menus as $menu)
            @if($part != $menu->member_of)
                <li class="menu-header small">
                    <span class="menu-header-text" data-i18n="{{ $menu->member_of }}">{{ $menu->member_of }}</span>
                </li>
                @php
                    $part = $menu->member_of;
                @endphp
            @endif


            <li class="menu-item {{ ($menu->source == explode('\\', $controller)[0] ? 'active' : '') }}">
                <a href="{{ ($menu->get_child->count() != 0 ? 'javascript:void(0);' : config('app.ipm_url').'/'.$menu->url) }}" class="menu-link {{ ($menu->get_child->count() != 0 ? 'menu-toggle' : '') }}">
                    <i class="menu-icon tf-icons {{ $menu->icon }}"></i>
                    <div class="text-truncate" data-i18n="{{ $menu->title }}">{{ $menu->title }}</div>
                </a>
                @if($menu->get_child->count() != 0)
                    <ul class="menu-sub">
                        @foreach ($menu->get_child as $child)
                            <li class="menu-item">
                                <a href="{{ config('app.url').'/'.$menu->url.'/'.$child->url }}" class="menu-link">
                                    <div data-i18n="{{ $child->title }}">{{ $child->title }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</aside>

<div class="menu-mobile-toggler d-xl-none rounded-1">
    <a href="javascript:void(0);"
        class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
        <i class="bx bx-menu icon-base"></i>
        <i class="bx bx-chevron-right icon-base"></i>
    </a>
</div>
