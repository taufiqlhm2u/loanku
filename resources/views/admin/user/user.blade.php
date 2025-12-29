<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-sidebar>
        <x-slot:link>{{ $title }}</x-slot:link>

        @push('css')
            <link rel="stylesheet" href="{{ asset('css/admin/user.css') }}">
        @endpush

        <div class="card ">
            <div class="card-header mb-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-medium">Manage Users</h5>
                <div class="">
                    <button type="button" class="btn btn-primary py-1 px-2" data-bs-toggle="modal"
                        data-bs-target="#addData">Add<i class="ri-add-fill"></i></button>
                    <a href="" class="btn btn-danger py-1 px-2">Trash<i class="ri-delete-bin-6-fill"></i></a>
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
                            @foreach ($users as $no => $row)
                                <tr class="align-middle">
                                    <td>{{ $users->firstItem() + $no }}</td>
                                    <td>{{ ucwords($row->name) }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ ucfirst($row->role) }}</td>
                                    <td class="d-flex gap-2 flex-wrap">
                                        <a href="" class="btn btn-warning py-1 px-2" style="color:#555;"><i
                                                class="ri-edit-fill"></i></a>
                                        <form action="{{ route('userDelete', $row->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm();" type="submit" class="btn btn-danger py-1 px-2"><i class="ri-delete-bin-6-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>

        <!-- modal addData -->
        <div class="modal fade" id="addData" tabindex="-1" aria-hidden="true" aria-labelledby="label">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add User</h1>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" area-label="close"></button>
                    </div>
                    <form action="/admin/user" method="post">
                        <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Fullname</label>
                                <input type="text" name="fullname" id="fullname" placeholder="Enter fullname"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" placeholder="example@gmail.com"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" placeholder="xxxx"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="">-- select --</option>
                                    <option value="staff">Staff</option>
                                    <option value="borrower">Borrower</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </x-sidebar>
</x-layout>