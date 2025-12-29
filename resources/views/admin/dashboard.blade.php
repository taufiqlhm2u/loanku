<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    @endpush
    <x-sidebar>
        <x-slot:link>{{ $title }}</x-slot:link>

        <div class="card quick-access bg-white shadow-sm px-4 py-3 rounded-3" data-aos="zoom-out">
            <div class="card-header">
                <h5 class="fw-medium mb-3">Quick Access</h5>
            </div>
            <div class="card-body d-flex justify-content-between flex-wrap gap-4">
                <div class="info user">
                    <i class="ri-group-fill"></i>
                    <p class="fw-medium">Users</p>
                    <span class="amount">{{ $user }}</span>
                </div>
                <div class="info item">
                    <i class="ri-instance-fill"></i>
                    <p class="fw-medium">Items</p>
                    <span class="amount">{{ $item }}</span>
                </div>
                <div class="info category">
                    <i class="ri-bookmark-fill"></i>
                    <p class="fw-medium">Categories</p>
                    <span class="amount">{{ $category }}</span>
                </div>
                <div class="info borrow">
                    <i class="ri-arrow-right-circle-fill"></i>
                    <p class="fw-medium">Borrowed</p>
                    <span class="amount">{{ $borrow }}</span>
                </div>
                <div class="info return">
                    <i class="ri-checkbox-circle-fill"></i>
                    <p class="fw-medium">Returned</p>
                    <span class="amount">{{ $return }}</span>
                </div>
            </div>
        </div>

        <div class="card mt-5 bg-white rounded-3 py-3 px-4 shadow-sm" data-aos="fade-up-left">
            <div class="card-header bg-white ">
                <h5 class="fw-medium">Recent Loan</h5>
            </div>
           <div class="card-body">
             @if($last->count() > 0)

                <table class="table table-bordered table-hover">
                    <thead class="text-center align-middle">
                        <tr>
                            <th rowspan="2" width="1%">No</th>
                            <th rowspan="2">User</th>
                            <th colspan="2">Items</th>
                            <th rowspan="2">Loan Date</th>
                            <th rowspan="2">Due Date</th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($last as $no => $l)
                            <tr>
                                <td>{{ $no +1 }}</td>
                                <td>{{ $l->user->name }}</td>
                                <td>
                                    <ol>
                                        @foreach ($l->item_loan as $i)
                                            <li>{{ $i->item->name }}</li>
                                        @endforeach
                                    </ol>
                                </td>
                                <td>
                                    <ol>
                                        @foreach ($l->item_loan as $i)
                                            <li>{{ $i->qty }}</li>
                                        @endforeach
                                    </ol>
                                </td>
                                <td>{{ $l->loan_date }}</td>
                                <td>{{ $l->due_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>None</p>
            @endif
           </div>
        </div>
    </x-sidebar>
</x-layout>