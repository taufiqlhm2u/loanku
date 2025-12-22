<x-layout>
    <x-slot:title>Dashboard</x-slot:title>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">
    @endpush
    <div class="d-flex">
        <!-- sidebar -->
        <aside id="sidebar">
            <div class="sidebar-logo">
                <a href="">Loanku</a>
            </div>
            <div class="sidebar-center">
                <ul class="sidebar-nav p-0">
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link"><i class="ri-dashboard-fill"></i>Dashboard</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link"><i class="ri-group-fill"></i>Users</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link"><i class="ri-instance-fill"></i>Items</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link"><i class="ri-bookmark-fill"></i>Categories</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link"><i class="ri-history-fill"></i>History Loan</a>
                    </li>
                </ul>
                <div class="sidebar-footer">
                    <a href="" class="sidebar-link"><i class="ri-logout-box-fill"></i>LogOut</a>
                </div>
            </div>
        </aside>
        <!-- main -->
        <div class="main">
            <nav class="navbar navbar-expand">
                Admin\Dashboard
            </nav>
            <main class="p-3">
                <div class="container-fluid">

                </div>
            </main>
        </div>
    </div>
</x-layout>