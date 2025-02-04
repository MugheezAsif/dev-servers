@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
    <!-- Main Content -->
    <h1>Welcome!</h1>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-12 my-2">
            <div class="card rounded-4 p-4 pb-3">
                <div class="card-body">
                    <p class="top">Today Server Payment</p>
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('images/card-money.png') }}" class="img img-fluid" alt="">
                        <h4>{{ $server_payment_today }}</h4>
                    </div>
                    <div class="text-center d-flex align-items-center justify-content-center lower">
                        <img src="{{ asset('images/card-users.png') }}" class="img img-fluid" alt="">
                        <p class="m-0">{{ $today_server_users }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-12 my-2">
            <div class="card rounded-4 p-4 pb-3">
                <div class="card-body">
                    <p class="top">Yesterday Server Payment</p>
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('images/card-money.png') }}" class="img img-fluid" alt="">
                        <h4>{{ $server_payment_yesterday }}</h4>
                    </div>
                    <div class="text-center d-flex align-items-center justify-content-center lower">
                        <img src="{{ asset('images/card-users.png') }}" class="img img-fluid" alt="">
                        <p class="m-0">{{ $yesterday_server_users }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-12 my-2">
            <div class="card rounded-4 p-4 pb-3">
                <div class="card-body">
                    <p class="top">Total Server Payment</p>
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('images/card-money.png') }}" class="img img-fluid" alt="">
                        <h4>{{ $server_payment_total }}</h4>
                    </div>
                    <div class="text-center d-flex align-items-center justify-content-center lower">
                        <img src="{{ asset('images/card-users.png') }}" class="img img-fluid" alt="">
                        <p class="m-0">{{ $total_server_users }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-12 my-2">
            <div class="card rounded-4 p-4 pb-3">
                <div class="card-body">
                    <p class="top">Total Websites</p>
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('images/card-website.png') }}" class="img img-fluid" alt="">
                        <h4>{{ $total_domains }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-12 my-2">
            <div class="card rounded-4 p-4 pb-3">
                <div class="card-body">
                    <p class="top">Customer Active Domains</p>
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('images/card-domains.png') }}" class="img img-fluid" alt="">
                        <h4>{{ $cutomer_active_domain }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-12 my-2">
            <div class="card rounded-4 p-4 pb-3">
                <div class="card-body">
                    <p class="top">Total Customer Servers</p>
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('images/card-server.png') }}" class="img img-fluid" alt="">
                        <h4>{{ $total_customer_servers }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-12 my-2">
            <div class="card rounded-4 p-4 pb-3">
                <div class="card-body">
                    <p class="top">Total Company Servers</p>
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('images/card-server.png') }}" class="img img-fluid" alt="">
                        <h4>{{ $total_company_servers }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
