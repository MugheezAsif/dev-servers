@extends('layouts.main')
@section('title', 'Company Servers')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-4 col-12 my-2">
            <div class="card rounded-4 p-4 pb-3">
                <div class="card-body">
                    <p class="top">Total</p>
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('images/card-server.png') }}" class="img img-fluid" alt="">
                        <h4>{{ $total }}</h4>
                    </div>
                    <div class="text-center d-flex align-items-center justify-content-center lower">
                        <img src="{{ asset('images/card-users.png') }}" class="img img-fluid" alt="">
                        <p class="m-0">{{ $customers }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-4 my-2 main-card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h2>Company Servers</h2>
                <input type="text" class="form-control main-search" id="main-search" placeholder="Search">
            </div>
            <div class="d-flex justify-content-between align-items-center my-3">
                <div class="tabs d-flex">
                    <button class="blue-btn m-0 px-4 active"
                        onclick="window.location.href='/company/servers'">Servers</button>
                    <button class="blue-btn m-0 px-4" onclick="window.location.href='/company/domains'">Domains</button>
                </div>
                <div class="filters d-flex align-items-center justify-content-between">
                    <div class="filter py-2 px-3 d-flex align-items-center">
                        <div class="form-group mx-2">
                            <label for="expiring_check">Expiring</label>
                            <input class="form-check-input ms-2" type="checkbox" value="" id="expiring_check">
                        </div>
                        <div class="form-group mx-2">
                            <label for="expired_check">Expired</label>
                            <input class="form-check-input ms-2" type="checkbox" value="" id="expired_check">
                        </div>
                        <div class="form-group mx-2">
                            <label for="hidden_check">Hidden</label>
                            <input class="form-check-input ms-2" type="checkbox" value="" id="hidden_check">
                        </div>
                    </div>
                    <button class="blue-btn addBtn active rounded-2 ms-2" data-bs-toggle="modal"
                        data-bs-target="#addModal">Add
                        New</button>
                </div>
            </div>
            @if ($errors->any())
                <div class="form-group my-3">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="table-side">
                <table>
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Domain</th>
                            <th>Server</th>
                            <th>Customer</th>
                            <th>Mobile</th>
                            <th>Project</th>
                            <th>Renewal Amount</th>
                            <th>Purchase</th>
                            <th>Renewal</th>
                            <th>Time</th>
                            <th>Renew</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div id="pagination"></div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered border-0">
            <div class="modal-content border-0 p-2">
                <div class="modal-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1></h1>
                        <h1 class="modal-title text-center" id="addModalLabel">Add New Server</h1>
                        <button type="button" class="closeBtn" data-bs-dismiss="modal"><i
                                class="fa-solid fa-x"></i></button>
                    </div>
                    <hr>
                    <form action="{{ route('company.servers.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="for" value="company">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="mb-4" for="">Server Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="mb-4" for="">Domain Name</label>
                                <input type="text" class="form-control" id="domain" name="domain" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="mb-4" for="">Customer Name</label>
                                <input type="text" class="form-control" id="customer" name="customer" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="mb-4" for="">Mobile No</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="mb-4" for="">Project</label>
                                <input type="text" class="form-control" id="project" name="project" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="mb-4" for="">Purchase Date</label>
                                <input type="date" class="form-control" id="purchase_date" name="purchase_date"
                                    required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="mb-4" for="">Renewal Date</label>
                                <input type="date" class="form-control" id="renewal_date" name="renewal_date"
                                    required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="mb-4" for="">Renewal Amount</label>
                                <input type="number" class="form-control" id="renewal_amount" name="renewal_amount"
                                    required>
                            </div>
                        </div>
                        <button class="blue-btn float-end rounded-3 active">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-scripts')
    <script>
        $(function() {
            $('#expiring_check, #expired_check, #hidden_check, #main-search').on('change keyup', function() {
                list();
            });

            $(document).ready(function() {
                list();
            });

            $(document).on('click', '.pagination-btn', function() {
                var page = $(this).data('page');
                list(page);
            });

            function list(page = 1) {
                var expiring = $('#expiring_check').is(':checked');
                var expired = $('#expired_check').is(':checked');
                var hidden = $('#hidden_check').is(':checked');
                var search = $('#main-search').val();
                $.ajax({
                    url: '/company/servers/list',
                    type: 'GET',
                    data: {
                        expiring: expiring,
                        expired: expired,
                        hidden: hidden,
                        search: search,
                        for: 'company',
                        page: page
                    },
                    success: function(response) {
                        renderTable(response.data);
                        renderPagination(response);
                        actions();
                    },
                    error: function() {
                        alert('Error fetching data.');
                    }
                });
            }

            $('.addBtn').on('click', function() {
                $('#addModalLabel').text('Add New Server');
                $('#addModal').modal('show');
            });

            function actions() {
                $('.editBtn').on('click', function() {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    var domain = $(this).data('domain');
                    var customer = $(this).data('customer');
                    var mobile = $(this).data('mobile');
                    var project = $(this).data('project');
                    var purchase_date = $(this).data('purchase_date');
                    var renewal_date = $(this).data('renewal_date');
                    var renewal_amount = $(this).data('renewal_amount');
                    $('#id').val(id);
                    $('#name').val(name);
                    $('#domain').val(domain);
                    $('#customer').val(customer);
                    $('#mobile').val(mobile);
                    $('#project').val(project);
                    $('#purchase_date').val(purchase_date);
                    $('#renewal_date').val(renewal_date);
                    $('#renewal_amount').val(renewal_amount);
                    $('#addModalLabel').text('Edit Server');
                    $('#addModal').modal('show');
                });
                $('.deleteBtn').on('click', function() {
                    var id = $(this).data('id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/company/servers/delete/' + id,
                                type: 'GET',
                                success: function(response) {
                                    if (response.success) {
                                        list();
                                        Swal.fire(
                                            'Deleted!',
                                            'Server has been deleted.',
                                            'success'
                                        )
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            'There was an error deleting.',
                                            'error'
                                        )
                                    }
                                },
                                error: function(err) {
                                    Swal.fire(
                                        'Error!',
                                        'There was an error deleting.',
                                        'error'
                                    )
                                }
                            });
                        }
                    });
                });
                $('.hideBtn').on('click', function() {
                    var id = $(this).data('id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to hide this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, hide it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/company/servers/hide/' + id,
                                type: 'GET',
                                success: function(response) {
                                    if (response.success) {
                                        list();
                                        Swal.fire(
                                            'Hidden!',
                                            'Server has been hidden.',
                                            'success'
                                        )
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            'There was an error hiding.',
                                            'error'
                                        )
                                    }
                                },
                                error: function(err) {
                                    Swal.fire(
                                        'Error!',
                                        'There was an error hiding.',
                                        'error'
                                    )
                                }
                            });
                        }
                    });
                });

                $('.btnRenew').click(function() {
                    var month = $(this).data('month');
                    var id = $(this).data('id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to renew this for " + month + " month(s)!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, renew it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/company/servers/renew/' + id + '/' + month,
                                type: 'GET',
                                success: function(response) {
                                    if (response.success) {
                                        list();
                                        Swal.fire(
                                            'Renewed!',
                                            'Server has been renewed.',
                                            'success'
                                        )
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            'There was an error renewing.',
                                            'error'
                                        )
                                    }
                                },
                                error: function(err) {
                                    Swal.fire(
                                        'Error!',
                                        'There was an error renewing.',
                                        'error'
                                    )
                                }
                            });
                        }
                    });
                });
            }

            function renderTable(domains) {
                var tbody = $('tbody');
                tbody.empty();
                $.each(domains, function(index, domain) {
                    var renewalDate = new Date(domain.renewal_date);
                    var today = new Date();
                    var diffInDays = Math.floor((renewalDate - today) / (1000 * 60 * 60 * 24));
                    var badgeClass = '';
                    if (renewalDate < today) {
                        badgeClass = 'badge-expired';
                    } else if (diffInDays < 30) {
                        badgeClass = 'badge-danger';
                    } else if (diffInDays < 60) {
                        badgeClass = 'badge-warning';
                    } else {
                        badgeClass = 'badge-success';
                    }
                    var statusText = renewalDate < today ? 'Expired' : diffInDays + ' Days';
                    var purchaseDate = new Date(domain.purchase_date).toISOString().split('T')[0];
                    var renewalDate = new Date(domain.renewal_date).toISOString().split('T')[0];
                    var row = `
                        <tr>
                            <td>${domain.id}</td>
                            <td>${domain.domain}</td>
                            <td>${domain.name}</td>
                            <td>${domain.customer}</td>
                            <td>${domain.mobile}</td>
                            <td>${domain.project}</td>
                            <td>${domain.renewal_amount}</td>
                            <td>${purchaseDate}</td>
                            <td>${renewalDate}</td>
                            <td><span class="time-badge ${badgeClass}">${statusText}</span></td>
                            <td><button class="btnRenew" data-id="${domain.id}"  data-month="1">1 Month</button>
                                <button class="btnRenew btnRenew2" data-id="${domain.id}" data-month="2">2 Month</button>
                                <button class="btnRenew btnRenew3" data-id="${domain.id}" data-month="3">3 Month</button>
                            </td>
                            <td class="table-btns">
                                <button class="editBtn" 
                                    data-id="${domain.id}" 
                                    data-domain="${domain.domain}" 
                                    data-name="${domain.name}" 
                                    data-customer="${domain.customer}"
                                    data-mobile="${domain.mobile}" 
                                    data-project="${domain.project}"
                                    data-purchase_date="${purchaseDate}" 
                                    data-renewal_date="${renewalDate}"
                                    data-renewal_amount="${domain.renewal_amount}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <button class="deleteBtn" data-id="${domain.id}"><i class="fa-regular fa-trash-can"></i></button>
                                <button class="hideBtn" data-id="${domain.id}"><i class="fa-regular fa-eye"></i></button>
                            </td>
                        </tr>
                    `;
                    tbody.append(row);
                });
            }

            function renderPagination(data) {
                var pagination = $('#pagination');
                pagination.empty();
                if (data.last_page > 1) {
                    if (data.current_page > 1) {
                        pagination.append(
                            `<button class="pagination-btn" data-page="${data.current_page - 1}">Previous</button>`
                        );
                    }
                    for (var i = 1; i <= data.last_page; i++) {
                        var activeClass = data.current_page === i ? 'active' : '';
                        pagination.append(
                            `<button class="pagination-btn ${activeClass}" data-page="${i}">${i}</button>`);
                    }
                    if (data.current_page < data.last_page) {
                        pagination.append(
                            `<button class="pagination-btn" data-page="${data.current_page + 1}">Next</button>`);
                    }
                }
            }
        });
    </script>
@endsection
