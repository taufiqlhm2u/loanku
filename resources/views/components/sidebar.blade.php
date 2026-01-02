@push('css')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endpush

<div class="d-flex">
    <!-- sidebar -->
    <aside id="sidebar">
        <div class="sidebar-logo" data-aos="{{ $animation ?? 'fade-down' }}">
            <a href="">Loan<span style="color:#540863;">ku</span></a>
        </div>
        <div class="sidebar-center" data-aos="fade-right">
            <ul class="sidebar-nav p-0">
                <li class="sidebar-item">
                    <a href="/admin/" class="sidebar-link {{ request()->is('admin') ? 'active' : '' }}"><i
                            class="ri-dashboard-fill"></i> Dashboard</a>
                </li>
                <li class="sidebar-item">
                    <a href="/admin/users" class="sidebar-link {{ request()->is('admin/users*') ? 'active' : '' }}"><i
                            class="ri-group-fill"></i> Users</a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('itemPage') }}" class="sidebar-link {{ request()->is('admin/items*') ? 'active' : '' }}"><i
                            class="ri-instance-fill"></i> Items</a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link {{ request()->is('admin/categories') ? 'active' : '' }}"><i
                            class="ri-bookmark-fill"></i> Categories</a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link"><i
                            class="ri-history-fill {{ request()->is('admin/history') ? 'active' : '' }}"></i> History
                        Loan</a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="sidebar-link text-danger"><i class="ri-logout-box-fill"></i>
                        LogOut</button>
                </form>
            </div>
        </div>
    </aside>
    <!-- main -->
    <div class="main">
        <nav class="navbar navbar-expand" data-aos="fade-down">
            @if (isset($link2))
                Admin <i class="ri-arrow-right-s-line"></i> <span>{{ $link }}</span>
                <i class="ri-arrow-right-s-line"></i> <span class="text-black">{{ $link2 }}</span>
            @else
                Admin <i class="ri-arrow-right-s-line"></i> <span class="text-black">{{ $link }}</span>
            @endif
        </nav>
        <main class="p-2">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>