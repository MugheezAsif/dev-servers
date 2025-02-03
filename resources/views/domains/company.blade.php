@extends('layouts.main')
@section('title', 'Company Domains')

@section('page-styles')
    <style>
        .main-card h2 {
            color: #0F5494;
            font-weight: 600;
            font-size: 18px;
        }

        .main-card .main-search {
            box-shadow: 0 0 10px rgb(0 0 0 / 10%);
            max-width: 200px;
        }

        .main-card .filter {
            border: 1px solid #EFEFEF;
            background: #F9F9F9;
            border-radius: 6px;
        }

        .table-side {
            max-width: 100%;
            overflow-x: auto;
            border-radius: 10px;
        }

        table thead {
            background: #005EB4;
            color: #fff;
            border-radius: 6px;
        }

        table {
            background: #F6F6F6;
            padding: 10px;
            min-width: 100%;
        }

        table th,
        table td {
            white-space: nowrap;
            font-weight: 400;
            padding: 12px 18px;
            font-size: 14px;
        }

        .table-btns button {
            border-radius: 5px;
            border: 1px solid #005EB4;
            padding: 4px 8px;
            background: transparent;
        }

        .table-btns .editBtn {
            border-color: #149523;
            color: #149523;
        }

        .table-btns .deleteBtn {
            border-color: #D91E18;
            color: #D91E18;
        }

        .table-btns .hideBtn {
            border: none;
        }

        .time-badge {
            padding: 4px;
            color: #000;
            border-radius: 2px;
        }

        .time-badge.badge-warning {
            background: #FFBB0033;
            border: 1px solid #FFBB00;
        }

        .time-badge.badge-danger {
            background: #FF5F0A33;
            border: 1px solid #FF5F0A;
            color: #FF5F0A;
        }

        .time-badge.badge-expired {
            background: #FF0A0A33;
            border: 1px solid #FF0A0A;
            color: #FF0000;
        }

        .time-badge.badge-success {
            background: #0A8CFF33;
            border: 1px solid #0A8CFF;
            color: #0A8CFF;
        }

        .modal .modal-title {
            color: #0F5494;
            font-weight: 600;
            font-size: 16px;
        }

        .modal label {
            font-size: 16px;
            font-weight: 300;
        }

        .modal input {
            background: #F6F6F6;
        }

        .modal .closeBtn {
            color: #fff;
            background: #D91E18;
            border-radius: 6px;
            padding: 4px 12px;
            border: none;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-4 col-12 my-2">
            <div class="card rounded-4 p-4 pb-3">
                <div class="card-body">
                    <p class="top">Total</p>
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('images/card-money.png') }}" class="img img-fluid" alt="">
                        <h4>20,000</h4>
                    </div>
                    <div class="text-center d-flex align-items-center justify-content-center lower">
                        <img src="{{ asset('images/card-users.png') }}" class="img img-fluid" alt="">
                        <p class="m-0">10000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-4 my-2 main-card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h2>Company Domains</h2>
                <input type="text" class="form-control main-search" id="main-search" placeholder="Search">
            </div>
            <div class="d-flex justify-content-between align-items-center my-3">
                <div class="tabs d-flex">
                    <button class="blue-btn m-0 px-4" onclick="window.location.href='/company/servers'">Servers</button>
                    <button class="blue-btn active m-0 px-4"
                        onclick="window.location.href='/company/domains'">Domains</button>
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
                            <th>Customer</th>
                            <th>Mobile</th>
                            <th>Project</th>
                            <th>Renewal Amount</th>
                            <th>Purchase</th>
                            <th>Renewal</th>
                            <th>Time</th>
                            <th>Mark as renew</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered border-0">
            <div class="modal-content border-0 p-2">
                <div class="modal-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1></h1>
                        <h1 class="modal-title text-center" id="addModalLabel">Add New Domain</h1>
                        <button type="button" class="closeBtn" data-bs-dismiss="modal"><i
                                class="fa-solid fa-x"></i></button>
                    </div>
                    <hr>
                    <form action="{{ route('company.domains.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="for" value="company">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
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

            function list() {
                var expiring = $('#expiring_check').is(':checked');
                var expired = $('#expired_check').is(':checked');
                var hidden = $('#hidden_check').is(':checked');
                var search = $('#main-search').val();
                $.ajax({
                    url: '/company/domains/list',
                    type: 'GET',
                    data: {
                        expiring: expiring,
                        expired: expired,
                        hidden: hidden,
                        search: search,
                        for: 'company'
                    },
                    success: function(response) {
                        renderTable(response);
                        actions();
                    },
                    error: function() {
                        alert('Error fetching data.');
                    }
                });
            }

            $('.addBtn').on('click', function() {
                $('#addModalLabel').text('Add New Domain');
                $('#addModal').modal('show');
            });

            function actions() {
                $('.editBtn').on('click', function() {
                    var id = $(this).data('id');
                    var domain = $(this).data('domain');
                    var customer = $(this).data('customer');
                    var mobile = $(this).data('mobile');
                    var project = $(this).data('project');
                    var purchase_date = $(this).data('purchase_date');
                    var renewal_date = $(this).data('renewal_date');
                    var renewal_amount = $(this).data('renewal_amount');
                    $('#id').val(id);
                    $('#domain').val(domain);
                    $('#customer').val(customer);
                    $('#mobile').val(mobile);
                    $('#project').val(project);
                    $('#purchase_date').val(purchase_date);
                    $('#renewal_date').val(renewal_date);
                    $('#renewal_amount').val(renewal_amount);
                    $('#addModalLabel').text('Edit Domain');
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
                                url: '/company/domains/delete/' + id,
                                type: 'GET',
                                success: function(response) {
                                    if (response.success) {
                                        list();
                                        Swal.fire(
                                            'Deleted!',
                                            'Domain has been deleted.',
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
                                url: '/company/domains/hide/' + id,
                                type: 'GET',
                                success: function(response) {
                                    if (response.success) {
                                        list();
                                        Swal.fire(
                                            'Hidden!',
                                            'Domain has been hidden.',
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
                    } else if (diffInDays < 10) {
                        badgeClass = 'badge-danger';
                    } else if (diffInDays < 30) {
                        badgeClass = 'badge-warning';
                    } else {
                        badgeClass = 'badge-success';
                    }
                    var statusText = renewalDate < today ? 'Expired' : diffInDays + ' Days';
                    var row = `
                        <tr>
                            <td>${domain.id}</td>
                            <td>${domain.domain}</td>
                            <td>${domain.customer}</td>
                            <td>${domain.mobile}</td>
                            <td>${domain.project}</td>
                            <td>${domain.renewal_amount}</td>
                            <td>${new Date(domain.purchase_date).toLocaleDateString()}</td>
                            <td>${new Date(domain.renewal_date).toLocaleDateString()}</td>
                            <td><span class="time-badge ${badgeClass}">${statusText}</span></td>
                            <td><input class="renewal-input" data-id="${domain.id}" type="checkbox"></td>
                            <td class="table-btns">
                                <button class="editBtn" data-id="${domain.id}" data-domain="${domain.domain}" data-customer="${domain.customer}"
                                    data-mobile="${domain.mobile}" data-project="${domain.project}"
                                    data-purchase_date="${domain.purchase_date}" data-renewal_date="${domain.renewal_date}"
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
        });
    </script>
@endsection
