<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRINK WATR</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}" />
    <input type="hidden" value="{{ url('/') }}" class="base_url">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <style>
        body {
            font-family: Europa-light, sans-serif !important;
        }

        figure img {
            height: 150px;
        }

        a {
            letter-spacing: 0.1rem;
        }

        .expage-img3 {
            height: auto;
            max-width: 100%;
            border: none;
            border-radius: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
            position: absolute;
            top: 65%;
        }

        .splash_link {
            font-family: europaLight, sans-serif !important;
            font-size: 18px;
        }

    </style>
</head>


<div class="loader" style="width:100%;height:100%; display:none">
    <img src="{{ asset('images\drop.png') }}" />
</div>

<body class="body">
    {{-- main container 1 start --}}
    <main class="app_wrapper" style="">
        <div class="custom_container">


            <div class="welcome_wrapper text-center ">
                <div class="tagline_wrap" data-aos="zoom-in-up" data-aos-duration="1500">
                    <figure class="logo"><img src="{{ asset('images/logowater.png') }}" alt="Logo" /></figure>
                </div>
                <a href="{{ url('/discover',$detail_access_token) }}" type="button" class="splash_link" style="margin-top:100px;color:#000">DISCOVER <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="welcome_wrapper text-center ">
                <a href="{{ url('/watr', $detail_access_token) }}" type="button" class="splash_link" style="margin-top:100px;color:#000">DRINK <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <img src="https://watrbar.io/wp-content/uploads/2022/07/droplet.png" class="expage-img3" style="max-width: 100px;">
        </div>
        {{-- <footer id="colophon" class="site-footer">
            <div class="footer-legal">
                <div class="footer-copyright" style="text-transform: uppercase;">
                    <p>2022 © All Rights Reserved | WATR, LLC</p>
                </div>
                <div class="footer-social">
                    <a href="https://instagram.com/watr.world/"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="footer-policy">
                    <a href="{{ url('privacy') }}" style="text-decoration: underline; margin-right: 0.25rem!important;">Privacy</a> <span style="margin-right: 0.25rem;">+</span> <a href="{{ url('legal') }}" style="text-decoration: underline;">Legal</a>
        </div>
        </div>
        </footer> --}}

    </main>
    {{-- main container 1 end --}}


</body>

</html>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/constants.js') }}"></script>
<script src="{{ asset('js/jquery_validation.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/link2.js') }}"></script>
<script src="{{ asset('js/show2.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
