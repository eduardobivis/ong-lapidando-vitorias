<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Lapidando Vitórias - Login</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('css/ext_libs/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('css/ext_libs/sb-admin-2.css') }}" rel="stylesheet">
        <link href="{{ asset('css/ext_libs/custom.css') }}" rel="stylesheet">


    </head>

    <body style="background-color: #271B71 !important;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-lg-6 d-none d-lg-block" 
                    style="background: url({{ asset('images/login.jpg') }});   
                    background-size: cover;"></div>
                <div class="col-lg-6">
                    <div class="p-5 mt-3">
                    <strong 
                        style="font-size:20px; margin-left: 15%;"> 
                        LAPIDANDO VITÒRIAS
                    </strong>


                <form method="POST" action="{{ route('login') }}" style="margin-top: 20px;">
                        
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control-user form-control" 
                            name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" 
                            class="form-control-user form-control" 
                            name="password" placeholder="Senha" required>
                        </div>
                        @if (count($errors))
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li style="color: red;">
                                        <strong>{{ $error }}</strong>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        
                        <input type="submit" class="btn btn-success btn-user btn-block" value="Logar"/>
                            
                        </form>
                        <section style="visibility: hidden;">
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Login with Google
                            </a>
                            
                            <span style="display: none;">
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                </a>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div>
                            </span>
                        </section>
                    </div>
                </div>
                </div>
            </div>
            </div>

        </div>

        </div>

    </div>

    </body>

</html>
