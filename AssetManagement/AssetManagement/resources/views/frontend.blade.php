<!DOCTYPE html>
<html lang="en">

<head>
    <title>YIL | YANTRA INDIA LIMITED</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('front_assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('front_assets/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front_assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/slick.min.css')}}" />
    <style>
        *{
            margin:0px;
            padding:0px;
        }
        .owl-carousel .item img {
            width: 100%;
        }
        .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    width: 100%;
    padding-right: 0px; 
    padding-left:  0px; 
    margin-right:  0px; 
 margin-left:  0px; 
}

body{
    background-color: white
}


.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
</head>

<body>
    <div class="container-fluid">
        {{-- @include('front.header') --}}
        @yield('content')
        {{-- @include('front.footer') --}}
    </div>
    <script src="{{asset('front_assets/js/jquery-3.6.4.min.js')}}"></script>
    <script src="{{asset('front_assets/js/bootstrap.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> --}}

    <script type="text/javascript" src="{{asset('front_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front_assets/js/slick.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 2000
            })

            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    },
                    1600: {
                        items: 7
                    }
                }
            })


            /****************************** ******/

            $('.slick-slider').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: false,
                dots: false,
                vertical: true,
                verticalSwiping: true,
                autoplay: true,
            });
        });
    </script>
    <script>
        $('body').on('click', '#text_resize_decrease', function() {
            $('p').css('font-size', '15px');
            $('a').css('font-size', '8px');
        });
        $('body').on('click', '#text_resize_reset', function() {
            $('p').css('font-size', '18px');
            $('a').css('font-size', '1em');
        });
        $('body').on('click', '#text_resize_increase', function() {
            $('p').css('font-size', '22px');
            $('a').css('font-size', '1.5em');
        });
    </script>

</body>

</html>