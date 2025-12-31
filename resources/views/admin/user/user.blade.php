<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-sidebar>
        <x-slot:link>{{ $title }}</x-slot:link>

        @push('css')
            <link rel="stylesheet" href="{{ asset('css/admin/user.css') }}">
        @endpush

        <div class="card " data-aos="fade-left">
            <div class="card-header mb-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-medium">Manage Users</h5>
                <div class="">
                    <button type="button" class="btn btn-primary py-1 px-2" data-bs-toggle="modal"
                        data-bs-target="#addData">Add<i class="ri-add-fill"></i></button>
                    <a href="{{ route('userTrash') }}" class="btn btn-danger py-1 px-2">Trash<i class="ri-delete-bin-6-fill"></i></a>
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
                                <th>Password</th>
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
                                    <td>xxxx</td>
                                    <td><span class="status-alert">{{ ucfirst($row->role) }}</span></td>
                                    <td class="d-flex gap-2 flex-wrap">
                                        <button type="button" class="tombol-edit btn btn-warning py-1 px-2" data-bs-toggle="modal" data-bs-target="#modalUpdate" style="color:#555;" data-username="{{ $row->name }}" data-email="{{ $row->email }}" data-role="{{ $row->role }}" data-user-id="{{ $row->id }}"><i
                                                class="ri-edit-fill"></i></button>
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
                    <form action="/admin/users" method="post">
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

        <!-- modal update -->
        <div class="modal fade" tabindex="-1" id="modalUpdate" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit User</h1>
                        <button class="btn-close" data-bs-dismiss="modal" area-label="close"></button>
                    </div>
                    <form action="{{ route('userUpdate') }}" method="post">
                         <div class="modal-body">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="idUser" id="userId">

                            <div class="mb-3">
                                <label for="editFullname" class="form-label">Fullname</label>
                                <input type="text" name="fullname" id="editFullname" placeholder="Enter fullname"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="editEmail" class="form-label">Email</label>
                                <input type="email" name="email" id="editEmail" placeholder="example@gmail.com"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="EditPassword" class="form-label">Password</label>
                                <input type="password" name="password" id="editPassword" placeholder="xxxx"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="editRole" class="form-label">Role</label>
                                <select name="role" id="editRole" class="form-select">
                                    <option value="">-- select --</option>
                                    <option value="staff">Staff</option>
                                    <option value="borrower">Borrower</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $('.tombol-edit').on('click', function() {
                const name = $(this).data('username');
                const email = $(this).data('email');
                const role = $(this).data('role');
                const id = $(this).data('user-id');

                $('#editFullname').val(name);
                $('#editEmail').val(email);
                $('#editRole').val(role);
                $('#userId').val(id);
            })
        </script>
    </x-sidebar>
</x-layout>