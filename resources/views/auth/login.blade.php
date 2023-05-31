<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Futura;
            outline: none;
        }

        body {
            font-family: Futura;
            background: rgb(62, 134, 228);
        }

        .main-form:after {
            content: "";
            display: table;
            clear: both;
        }

        .main-form {
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            border-radius: 10px;
            background: white;
            box-shadow: 10px 10px 0 rgba(0, 0, 0, 0.1);
        }

        .main-form__title {
            padding: 20px 0;
            text-align: center;
        }

        .main-form__title h1 {
            position: relative;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 25px;
        }

        .main-form__title h1:after {
            position: absolute;
            bottom: -13px;
            left: 0;
            right: 0;
            margin: auto;
            width: 40px;
            height: 4px;
            background: #f2f2f2;
            content: "";
        }

        .main-form__input {
            display: block;
            width: 100%;
            border: 0;
            background: #fcfcfc;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 10px;
            outline: 0;
            font-size: 1rem;
            color: #666666;
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -ms-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        .main-form__input:focus {
            background: #f7f7f7;
        }

        .main-form__body .btn {
            display: block;
            width: 48%;
            margin-top: 10px;
            float: left;
            background: #e6e6e6;
            padding: 15px;
            border: 0;
            font-size: 0.6rem;
            color: #999999;
            cursor: pointer;
            letter-spacing: 3px;
            text-transform: uppercase;
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -ms-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        .main-form__body .btn:last-of-type {
            float: right;
            background: #fca44b;
            color: #fff;
        }

        .main-form__body .btn:last-of-type:hover {
            background: #fb8b19;
        }

        ::-webkit-input-placeholder {
            color: #cccccc;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        :-moz-placeholder {
            color: #cccccc;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        ::-moz-placeholder {
            color: #cccccc;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        :-ms-input-placeholder {
            color: #cccccc;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                @if (Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Sukses!</strong> Akun anda berhasil dibuat.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong>Oops!</strong> Email atau password salah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <form action="{{ route('login.authenticate') }}" method="POST" class="main-form first">
                    @csrf
                    <div class="main-form__title">
                        <h1>Sign-in</h1>
                    </div>
                    <div class="main-form__body">
                        <input class="main-form__input" name="email" type="email" placeholder="name@example.com" required>
                        <input class="main-form__input" name="password" type="password" placeholder="Password" required>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                            <label class="form-check-label" for="rememberPasswordCheck">
                                Remember password
                            </label>
                        </div>
                        <a href="{{ route('register') }}" class="btn">Sign-Up</a>
                        <a class="btn " type="submit">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>