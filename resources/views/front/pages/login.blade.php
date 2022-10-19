<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('back/login/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/login/style.css') }}">
    <title>Giriş yap</title>
    <style>
        .checkbox__box{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            padding: 2px;
        }

        .checkbox__div{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 6px;
        }

        .checkbox__input{
            display: none;
        }

        .checkbox__div{
            width: 1.2rem;
            height: 1.2rem;
            border-radius: 2px;
            border:  1px solid #dbdbdb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .checkbox__div::after{
            content: '\2713';
            font-size:12px;
            font-weight: bold;
            color: #F6F7FC;
        }

        .checkbox__input:checked + .checkbox__div{
            background: #007BFF;
        }
    </style>
</head>

<body>

    <div class="d-lg-flex half">
        <div class="bg order-1 col-md-6" style="background-image: url('{{ asset('front/images/bg-1.png') }}');"></div>
        <div class="contents order-2 col-md-6">

            <div class="container">
                <div class="row align-items-center justify-content-center"> 
                    <div class="col-md-8">
                        <h3 class="mb-3">Lütfen giriş yapın!</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                               {{ $errors->first() }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                        @endif
                        <form method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="username">E-posta Adresi</label>
                                <input type="email" class="form-control" name="email" placeholder="E-posta Adresi"
                                  value="{{old('email')}}"  required>
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Şifre</label>
                                <input type="password" class="form-control" name="password" placeholder="Şifre"
                                    id="password">
                            </div>

                            <label for="check" class="checkbox__box">
                                <input type="checkbox" id="check" class="checkbox__input">
                                <div class="checkbox__div"></div>
                                Beni Hatırla
                            </label>

                            <button type="submit" class="btn btn-block btn-primary">Giriş Yap</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
