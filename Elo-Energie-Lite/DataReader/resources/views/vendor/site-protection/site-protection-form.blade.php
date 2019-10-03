@extends('layouts.custom')

@section('body')
    <body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 offset-auto">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">RECA</h1>
                                </div>
                                <form class="user" method="GET">
                                    @csrf

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="site-password-protected" name="site-password-protected" placeholder="Mot de passe">
                                    </div>
                                    @if (Request::get('site-password-protected'))
                                        <div class="text-danger">Password is wrong</div>
                                    @endif
                                    <button class="btn btn-primary btn-user btn-block">
                                        Connexion
                                    </button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    </body>
@endsection
{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--    <head>--}}
{{--        <title>Password protected</title>--}}

{{--        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">--}}

{{--        <style>--}}
{{--            html, body {--}}
{{--                height: 100%;--}}
{{--            }--}}

{{--            body {--}}
{{--                margin: 0;--}}
{{--                padding: 0;--}}
{{--                width: 100%;--}}
{{--                display: table;--}}
{{--                font-weight: 100;--}}
{{--                font-family: 'Lato';--}}
{{--            }--}}

{{--            .container {--}}
{{--                text-align: center;--}}
{{--                display: table-cell;--}}
{{--                vertical-align: middle;--}}
{{--            }--}}

{{--            .content {--}}
{{--                text-align: center;--}}
{{--                display: inline-block;--}}
{{--            }--}}

{{--            .title {--}}
{{--                font-size: 36px;--}}
{{--            }--}}

{{--            .form-control {--}}
{{--                border: 1px solid #ccc;--}}
{{--                padding: 10px 20px;--}}
{{--            }--}}

{{--            .hidden {--}}
{{--                display: none;--}}
{{--            }--}}

{{--            .text-danger {--}}
{{--                color: #d9534f;--}}
{{--            }--}}
{{--        </style>--}}
{{--    </head>--}}
{{--    <body>--}}
{{--        <div class="container">--}}
{{--            <div class="content">--}}
{{--                <div class="title">Password protected</div>--}}

{{--                <form method="GET">--}}
{{--                    {{ csrf_field() }}--}}

{{--                    <div class="form-group">--}}

{{--                        <input type="password" name="site-password-protected" placeholder="Please enter password" class="form-control" tabindex="1" autofocus />--}}
{{--                        @if (Request::get('site-password-protected'))--}}
{{--                            <div class="text-danger">Password is wrong</div>--}}
{{--                        @else--}}
{{--                            <div class="small help-block">And press enter</div>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <input type="submit" class="hidden" />--}}

{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </body>--}}
{{--</html>--}}
