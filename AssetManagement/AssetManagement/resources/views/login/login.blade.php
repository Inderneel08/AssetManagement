<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('front_assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('front_assets/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front_assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/slick.min.css')}}" />    
    <title>Log In</title>

    <style>

        .contain{
            display: flex; 
            justify-content:center;
        }

        #myLoginForm{
            margin-top: 14%;
        }
        
        body{
            background-color: white
        }

    </style>

</head>
<body>
    
    <div class="contain container-fluid"> <h1> Asset Management System </h1> </div>

    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif

    <div class="bg-white" id="myLoginForm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center p-5">
                        {{-- {!! displayAlert() !!} --}}
    
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
    
                                <?php
                                    $lang = app()->getLocale();
                           
                                ?>
                            
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end"> @if($lang == 'en') Email Address: @else ई-मेल: @endif</label>
    
                                    <div class="col-md-6">
                                        <input id="email" type="email" maxlength="45" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
    
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">@if($lang == 'en') Password: @else पासवर्ड: @endif</label>
    
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">
    
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="captcha text-md-end col-md-6">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            &#x21bb;
                                        </button>
                                    </div>
                                    <div class="col-md-4">
                                    <input id="captcha" type="text" maxlength="6" class="form-control" @if($lang == 'en') placeholder="Enter Captcha" @else placeholder="केप्चा भरे" @endif required name="captcha">
                                </div>
                                <div class="col-md-12 mt-2 p-2">
                                <button type="submit" class="btn btn-primary text-center float-right ml-2 btn_apply">
                                @if($lang == 'en') Login @else लॉग इन करें @endif 
                                        </button>

                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                        @if($lang == 'en') Forgot Your Password? @else अपना पासवर्ड भूल गए? @endif 
                                        </a>
                                        @endif
                                        </div>
                            </div>
                                
                            </form>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
        
    <script src="{{asset('front_assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript">

    
    
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: "{{ route('reload-captcha') }}",
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

//    document.getElementById('email').addEventListener('paste', function (e) {
  //      e.preventDefault();
    //});

    //document.getElementById('password').addEventListener('paste', function (e) {
      //  e.preventDefault();
    //});

    //document.getElementById('captcha').addEventListener('paste', function (e) {
    //    e.preventDefault();
    //});

    </script>    
</body>
</html>

