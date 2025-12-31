<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-sidebar>
        <x-slot:link>{{ $title }}</x-slot:link>
        <x-slot:link2>Trash</x-slot:link2>

        @push('css')
            <link rel="stylesheet" href="{{ asset('css/admin/user.css') }}">
        @endpush

        <div class="card" data-aos="fade-up-left">
            <div class="card-header d-flex justify-content-between">
                <h5>Trashed</h5>
                <div class="d-flex justify-content-center gap-2">
                    <form action="{{ route('userRestoreAll') }}" method="post">
                        @csrf
                        <button onclick="return confirm('Wanna restore all data?')" type="submit"
                            class="btn btn-success">Restore all</button>
                    </form>

                    <form action="{{ route('userDestroyAll') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Wanna delete all data?')" type="submit"
                            class="btn btn-danger">Empty Trash</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trash as $no => $t)
                                <tr class="align-middle">
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ ucwords($t->name) }}</td>
                                    <td>{{ $t->email }}</td>
                                    <td>{{ ucfirst($t->role) }}</td>
                                    <td class="d-flex justify-content-center gap-3 flex-wrap">
                                        <form action="{{ route('userRestore', $t->id) }}" method="post">
                                            @csrf
                                            <button onclick="return confirm('Are your sure restore this data?')"
                                                class="btn btn-success">Restore</button>
                                        </form>

                                        <form action="{{ route('userDestroy', $t->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are your sure delete this data?')" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-sidebar>
</x-layout>