<x-layout>
    <x-slot:title>Home</x-slot:title>

    Halaman borrower
    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="sidebar-link text-danger"><i class="ri-logout-box-fill"></i> LogOut</button>
                    </form>
</x-layout>