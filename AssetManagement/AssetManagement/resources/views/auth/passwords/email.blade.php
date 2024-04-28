@extends('frontend')
@section('content')

<div class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <h5 class="text-center mt-2">Forgot Password</h5>
                <div class="text-center p-5">
                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}
                    {{-- {!! displayAlert() !!} --}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <?php
                            $lang = app()->getLocale();
                           
                            ?>
                            
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
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
                                <div class="captcha text-md-end col-md-6">
                                    <span>{!! captcha_img() !!}</span>
                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                        &#x21bb;
                                    </button>
                                </div>
                                <div class="col-md-4">
                                {{-- <input id="captcha" type="text" maxlength="7" class="form-control" placeholder="Enter Captcha" name="captcha"> --}}
                                <input id="captcha" type="text" maxlength="6" class="form-control" @if($lang == 'en') placeholder="Enter Captcha" @else placeholder="केप्चा भरे" @endif required name="captcha">
                            </div>
                        </div>
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
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
        url: '../reload-captcha',
        success: function (data) {
            $(".captcha span").html(data.captcha);
        }
    });
});
</script>
@endsection
