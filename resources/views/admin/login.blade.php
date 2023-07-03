<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    @vite('resources/js/app.jsx')
</head>

<body>
    <div class="container p-5">
        <div class="row">
            <div class="col-4 offset-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Admin Login
                    </div>
                    <div class="card-body">

                        <form action="{{ url('/admin/login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter Email</label>
                                @if ($errors->any('email'))
                                    @foreach ($errors->get('email') as $e)
                                        <div class="alert alert-danger">{{ $e }}</div>
                                    @endforeach
                                @endif
                                <input type="email" name="email" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Enter Password</label>
                                @if ($errors->any('password'))
                                    @foreach ($errors->get('password') as $e)
                                        <div class="alert alert-danger">{{ $e }}</div>
                                    @endforeach
                                @endif
                                <input type="password" name="password" id="" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                            </div>
                            <input type="submit" value="login" class="btn btn-primary">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Toastify --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <style>
        .toastify {
            background-image: unset;
        }
    </style>
    @if (session()->has('error'))
        <script>
            Toastify({
                text: "{{ session('error') }}",
                className: "bg-danger",
                position: 'center'
            }).showToast();
        </script>
    @endif
</body>

</html>
