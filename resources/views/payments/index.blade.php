@extends('layouts.main')
@section('title', 'Payments')

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
                        <img src="{{ asset('images/card-money.png') }}" class="img img-fluid" alt="">
                        <h4>{{ $total }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-4 my-2 main-card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2>Company Servers</h2>
                <input type="text" class="form-control main-search" id="main-search" placeholder="Search">
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
                            <th>Payment Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Customer</th>
                            <th>Mobile</th>
                            <th>Date</th>
                            <th>Renewal</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div id="pagination"></div>

        </div>
    </div>

@endsection

@section('page-scripts')
    <script>
        $(function() {
            $('#main-search').on('change keyup', function() {
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
                var search = $('#main-search').val();
                $.ajax({
                    url: '/payments/list',
                    type: 'GET',
                    data: {
                        search: search,
                        page: page
                    },
                    success: function(response) {
                        renderTable(response.data);
                        renderPagination(response);
                    },
                    error: function() {
                        alert('Error fetching data.');
                    }
                });
            }

            function renderTable(domains) {
                var tbody = $('tbody');
                tbody.empty();
                $.each(domains, function(index, domain) {
                    var date = new Date(domain.date).toISOString().split('T')[0];
                    var row = `
                        <tr>
                            <td>${domain.id}</td>
                            <td>${domain.domain}</td>
                            <td>${domain.type}</td>
                            <td>${domain.amount}</td>
                            <td>${domain.status}</td>
                            <td>${domain.customer}</td>
                            <td>${domain.mobile}</td>
                            <td>${date}</td>
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
