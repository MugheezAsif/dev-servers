<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
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
    <script src="https://kit.fontawesome.com/d664aa7c58.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #EDF2FD;
            padding: 20px;
            overflow-x: hidden;
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
            width: 70px;
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

        .blue-btn {
            color: #0F5494;
            font-weight: 500;
            background: #fff;
            border: 1px solid #0F5494;
            padding: 5px 20px;
            transition: 0.3s;
        }

        .blue-btn.active {
            background: #0F5494;
            color: #fff;
        }

        .blue-btn.active:hover {
            background: #0F5494;
            color: #fff;
        }

        .blue-btn:hover {
            background: #0F5494;
            color: #fff;
            transition: 0.3s;
        }

        .main-content {
            flex-grow: 1;
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
        }
    </style>

    @yield('page-styles')
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-4 rounded-4">
            <div class="brand">
                <h4>Admin Panel</h4>
            </div>
            <hr>
            <a href="{{ route('dashboard') }}" class="my-3 {{ $page == 'dashboard' ? 'active' : '' }} text-nowrap"><img
                    src="{{ asset('images/menu-2.svg') }}" alt="">Dashboard</a>
            <a href="{{ route('customer.domains.index') }}"
                class="my-3 {{ $page == 'customer' ? 'active' : '' }} text-nowrap"><img
                    src="{{ asset('images/menu-2.svg') }}" alt="">Customer
                Data</a>
            <a href="{{ route('payments.index') }}" class="my-3 {{ $page == 'payments' ? 'active' : '' }} text-nowrap"><img
                    src="{{ asset('images/menu-1.svg') }}" alt="">Payment
                History</a>
            <a href="{{ route('company.domains.index') }}"
                class="my-3 {{ $page == 'company' ? 'active' : '' }} text-nowrap"><img
                    src="{{ asset('images/menu-2.svg') }}" alt="">Company Data</a>
            <a href="{{ route('logout') }}" class="my-3 text-nowrap"><img src="{{ asset('images/menu-1.svg') }}"
                    alt="">
                Logout</a>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 main-content p-5">
            @yield('content')
        </div>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                })
            </script>
        @endif
    </div>
</body>

@yield('page-scripts')

</html>
