<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #EDF2FD;
            padding: 20px;
        }

        .sidebar {
            height: 90vh;
            background-color: #EDF2FD;
            box-shadow: 0 0 20px #9FC2E38C;
        }

        .sidebar a {
            text-decoration: none;
            display: block;
            color: #000;
            padding: 14px 26px;
            border-radius: 10px;
            background: #2422200A;
            font-weight: 300;
            transition: 0.3s;
            padding-right: 55px;
            font-size: 15px;
        }

        .sidebar a:hover {
            background: #005db4ac;
            transition: 0.3s;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            scale: 1.05;
        }

        .sidebar a.active {
            background: #005db4ac;
        }

        .sidebar .brand h4 {
            color: #005EB4;
            font-size: 18px;
            font-weight: 700;
        }

        .sidebar a img {
            margin-right: 10px;
        }

        .card {
            border: none;
            box-shadow: 0 0 20px #9FC2E38C;
        }

        .card h4 {
            font-weight: 700;
        }

        .card img {
            width: 80px;
            margin-right: 15px;
            box-shadow: 0 0 10px rgb(0 0 0 / 10%);
            border-radius: 10px;
        }

        .card .lower img {
            width: 40px;
        }

        .card .lower p {
            color: #02901C;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-4 rounded-4">
            <div class="brand">
                <h4>Admin Panel</h4>
            </div>
            <hr>
            <a href="#" class="my-3 active text-nowrap"><img src="{{ asset('images/menu-2.svg') }}"
                    alt="">Dashboard</a>
            <a href="#" class="my-3 text-nowrap"><img src="{{ asset('images/menu-2.svg') }}"
                    alt="">Customer
                Data</a>
            <a href="#" class="my-3 text-nowrap"><img src="{{ asset('images/menu-1.svg') }}"
                    alt="">Payment
                History</a>
            <a href="#" class="my-3 text-nowrap"><img src="{{ asset('images/menu-2.svg') }}"
                    alt="">Company Data</a>
            <a href="{{ route('logout') }}" class="my-3 text-nowrap"><img src="{{ asset('images/menu-1.svg') }}"
                    alt="">
                Logout</a>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 main-content p-5">
            <h1>Welcome!</h1>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12 my-2">
                    <div class="card rounded-4 p-4 pb-3">
                        <div class="card-body">
                            <p class="top">Today Server Payment</p>
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
                <div class="col-lg-3 col-md-4 col-12 my-2">
                    <div class="card rounded-4 p-4 pb-3">
                        <div class="card-body">
                            <p class="top">Today Server Payment</p>
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
                <div class="col-lg-3 col-md-4 col-12 my-2">
                    <div class="card rounded-4 p-4 pb-3">
                        <div class="card-body">
                            <p class="top">Total Server Payment</p>
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
                <div class="col-lg-3 col-md-4 col-12 my-2">
                    <div class="card rounded-4 p-4 pb-3">
                        <div class="card-body">
                            <p class="top">Total Websites</p>
                            <div class="d-flex align-items-center mb-4">
                                <img src="{{ asset('images/card-website.png') }}" class="img img-fluid" alt="">
                                <h4>340</h4>
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
                                <h4>15,000</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-12 my-2">
                    <div class="card rounded-4 p-4 pb-3">
                        <div class="card-body">
                            <p class="top">Total Customer Servers</p>
                            <div class="d-flex align-items-center mb-4">
                                <img src="{{ asset('images/card-server.png') }}" class="img img-fluid"
                                    alt="">
                                <h4>10</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-12 my-2">
                    <div class="card rounded-4 p-4 pb-3">
                        <div class="card-body">
                            <p class="top">Total Company Servers</p>
                            <div class="d-flex align-items-center mb-4">
                                <img src="{{ asset('images/card-server.png') }}" class="img img-fluid"
                                    alt="">
                                <h4>150</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
