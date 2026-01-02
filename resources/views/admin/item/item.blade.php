<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-sidebar>
        <x-slot:link>{{ $title }}</x-slot:link>
        @push('css')
            <link rel="stylesheet" href="{{ asset('css/admin/item.css') }}">
        @endpush

        <div class="card shadow" data-aos="fade-left">
            <div class="card-header d-flex justify-content-between">
                <h1 class="fs-5">Item Lists</h1>
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <button class="btn btn-primary px-2 py-1" data-bs-toggle="modal" data-bs-target="#addModal">Add</button>
                    <a href="{{ route('itemTrash') }}" class="btn btn-danger">Trash</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Item name</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Condition</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item as $no => $i)
                            <tr class="align-middle">
                                <td>{{ $item->firstItem() +  $no . '.'}}</td>
                                <td class="code">{{ $i->code }}</td>
                                <td>{{ $i->name }}</td>
                                <td>{{ $i->category->name }}</td>
                                <td>{{ $i->stock }}</td>
                                <td>{{ $i->condition }}</td>
                                <td class="d-flex justify-content-center gap-2 flex-wrap">
                                    <button class="btn btn-warning tombol-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-item="{{ $i->name }}" data-id="{{ $i->id }}" data-category="{{ $i->category_id }}" data-stock="{{ $i->stock }}" data-condition="{{ $i->condition }}"><i class="ri-edit-fill"></i></button>

                                    <form action="{{ route('itemDelete', $i->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-danger"><i class="ri-delete-bin-6-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $item->links() }}
                </div>
            </div>
        </div>


        <div class="modal fade" id="addModal" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add Items</h1>
                        <button class="btn-close" data-bs-dismiss="modal" area-label="close"></button>
                    </div>
                    <form action="/admin/items" method="post">
                        <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label for="name">Item</label>
                                <input type="text" class="form-control" name="item" id="name" placeholder="Laptop, shoes, playstation, etc">
                            </div>

                            <div class="mb-3">
                                <label for="catrgory">Category</label>
                                <select name="category" id="category" class="form-select">
                                    <option value="">-- Select --</option>
                                    @foreach ($category as $c )
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" name="stock" id="stock" placeholder="0">
                            </div>

                            <div class="mb-3">
                                <label for="condition">Condition</label>
                                <textarea name="condition" id="condition" class="form-control"></textarea>
                            </div>

                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" area-label="close">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" aria-hidden="true" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit item</h1>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" area-label="close"></button>
                    </div>
                    <form action="" method="post">
                        @csrf
                        @method('put')
                        
                        <div class="modal-body">

                        <input type="hidden" name="itemId" id="editId">

                           <div class="mb-3">
                                <label for="editItem">Item</label>
                                <input type="text" class="form-control" name="item" id="editItem" placeholder="Laptop, shoes, playstation, etc">
                            </div>

                            <div class="mb-3">
                                <label for="editCatrgory">Category</label>
                                <select name="category" id="editCategory" class="form-select">
                                    <option value="">-- Select --</option>
                                    @foreach ($category as $c )
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="editStock">Stock</label>
                                <input type="number" class="form-control" name="stock" id="editStock" placeholder="0">
                            </div>

                            <div class="mb-3">
                                <label for="condition">Condition</label>
                                <textarea name="condition" id="editCondition" class="form-control"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="close" area-label="close">Cancel</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $('.tombol-edit').on('click', function() {
                const id = $(this).data('id')
                const item = $(this).data('item')
                const category = $(this).data('category')
                const stock = $(this).data('stock')
                const condition = $(this).data('condition')

                $('#editId').val(id)
                $('#editItem').val(item)
                $('#editCategory').val(category)
                $('#editStock').val(stock)
                $('#editCondition').val(condition)

                $('#editModal form').attr('action', `/admin/items/update/${id}`)

                console.log(item)
            })
        </script>
    </x-sidebar>
</x-layout>