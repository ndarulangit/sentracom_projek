<!DOCTYPE html>
<html lang="en" class="h-100">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Login</title>
        <!-- Favicon icon -->
        <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.min.css')}}">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
        
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    </head>
    
    <body class="h-100">
        <!--*******************
              Preloader start
          ********************-->
          <div id="preloader" style="z-index: -1; position:relative;">
              <div class="sk-three-bounce">
                  <div class="sk-child sk-bounce1"></div>
                  <div class="sk-child sk-bounce2"></div>
                  <div class="sk-child sk-bounce3"></div>
              </div>
          </div>
          <!--*******************
          Preloader end
          ********************-->
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-6 shadow-lg p-3 mb-5 bg-white">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <div class="text-center mb-3">
                                        <a href="{{url('/')}}"><img src="{{asset('assets/images/logo.png')}}" width="200" alt=""></a>
                                        </div>
                                        <h4 class="text-center mb-4 text-white">Masuk Sebagai</h4>
                                        <form action="{{route('login.step')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <select id="single-select" name="select">
                                                    <option value="" disabled selected>Masuk Sebagai</option>
                                                    <option value="AL">Admin</option>
                                                    <option value="WY">Teknisi</option>
                                                </select>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" id="submit" class="btn bg-white text-primary btn-block">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
	<script src="{{asset('assets/js/deznav-init.js')}}"></script>
    <script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins-init/select2-init.js')}}"></script>
</body>
</html>