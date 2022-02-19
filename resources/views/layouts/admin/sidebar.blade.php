@php
    $sidebarItems = [
        ['Dashboard', '/dashboard', 'mdi-grid-large'],
        ['Data User', '/user', 'mdi-coffee'],
        ['Kategori Mutasi', '/mutasi', 'mdi-floor-plan'],
        ['Data Warga', '/warga', 'mdi-account-circle'],
        ['Data Keluarga', '/keluarga', 'mdi-table'],
        ['Data Inventaris', '/inventaris', 'mdi-book'],
        ['Data Pengurus', '/pengurus', 'mdi-bell'],
        // ['Laporan', '/laporan', 'mdi-chart-line'],
        ['Profil', '/profil', 'mdi-account'],
        ['Logout', '/logout', 'mdi-logout'],
    ];

    $items = [];
    foreach ($sidebarItems as $key => $item) {
        $items[] = [
            'title' => $item[0],
            'path' => $item[1],
            'icon' => $item[2],
        ];
    }
@endphp

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Main Menu</li>
        @foreach ($items as $item)
            <li class="nav-item">
                <a class="nav-link" href="{{ url($item['path']) }}">
                    <i class="mdi {{ $item['icon'] }} menu-icon"></i>
                    <span class="menu-title">{{ $item['title'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>