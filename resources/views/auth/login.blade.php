<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .cont {
            height: 100vh;
            width: 100%;
        }

        .left {
            background-color: #C8CDD8;
            width: 50%;
            height: 100%;
        }

        .right {
            background-color: #EDF2FD;
            width: 50%;
            height: 100%;
        }

        .login-cont {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            z-index: 5;
            width: 310px;
        }

        .login-cont p {
            color: #0F5494;
            font-weight: 700;
        }

        .login-cont input {
            background: #F0F0F0;
        }

        .blue-btn {
            color: #fff;
            font-weight: 500;
            background: #0F5494;
            border: 1px solid #0F5494;
            border-radius: 5px;
            padding: 5px 20px;
            transition: 0.3s;
        }

        .blue-btn:hover {
            background: #fff;
            color: #0F5494;
            transition: 0.3s;
        }
    </style>
</head>

<body>
    <div class="d-flex cont">
        <div class="left"></div>
        <div class="right"></div>
    </div>
    <div class="login-cont p-4 rounded-4">
        <div class="top text-center">
            <p>Log In</p>
            <hr>
        </div>
        <form action="{{ route('login.submit') }}" method="post">
            @csrf
            <div class="form-group my-3">
                <label class="form-label" for="">Enter Pin</label>
                <input type="text" name="pin" class="form-control" required>
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
            <button class="float-end blue-btn" type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
