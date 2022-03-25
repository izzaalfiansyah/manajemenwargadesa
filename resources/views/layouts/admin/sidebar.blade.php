@php
    $sidebarItems = [
        ['Dashboard', '/dashboard', 'mdi-grid-large', false],
        ['Data User', '/user', 'mdi-coffee', true],
        ['Kategori Mutasi', '/mutasi', 'mdi-floor-plan', true],
        ['Data Warga', '/warga', 'mdi-account-circle', true],
        ['Data Keluarga', '/keluarga', 'mdi-table', false],
        ['Data Inventaris', '/inventaris', 'mdi-book', true],
        ['Data Pengurus', '/pengurus', 'mdi-bell', false],
        // ['Laporan', '/laporan', 'mdi-chart-line', false],
        ['Profil', '/profil', 'mdi-account', false],
        ['Logout', '/logout', 'mdi-logout', false],
    ];

    $items = [];
    foreach ($sidebarItems as $key => $item) {
        $items[] = [
            'title' => $item[0],
            'path' => $item[1],
            'icon' => $item[2],
            'isAdmin' => $item[3],
        ];
    }
@endphp

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Main Menu</li>
        @foreach ($items as $item)
            @if ($item['isAdmin'] == true)
                @if (Session::get('role') == '1')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url($item['path']) }}">
                            <i class="mdi {{ $item['icon'] }} menu-icon"></i>
                            <span class="menu-title">{{ $item['title'] }}</span>
                        </a>
                    </li>    
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url($item['path']) }}">
                        <i class="mdi {{ $item['icon'] }} menu-icon"></i>
                        <span class="menu-title">{{ $item['title'] }}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</nav>