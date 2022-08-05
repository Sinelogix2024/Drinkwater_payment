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
    <link rel="stylesheet" href="{{ asset('css/discover.css') }}" />
    <input type="hidden" value="{{ url('/') }}" class="base_url">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title> DISCOVER | WATRBAR</title>

    <style>
        body {
            font-family: europaLight, sans-serif !important;
        }

        a,
        a:hover,
        a:visited,
        a:active,
        a:focus {
            text-decoration: none;
            color: black;
            text-transform: uppercase;
            font-weight: 300;
            letter-spacing: 0.1rem;
        }

        .primary_btn {
            font-weight: 500;
            color: #fff !important;
            border-width: 2px 2px 2px 2px !important;
            border-radius: 50px 50px 50px 50px;
            padding: 5px 30px 5px 30px;
            border: 1px solid black;
        }

        .primary_btn:hover {
            font-weight: 550 !important;
        }

    </style>
</head>



<body class="body">
    {{-- main container 1 start --}}
    {{-- <main class="app_wrapper  ">

    </main> --}}
    {{-- main container 1 end --}}



    <div class="" style="margin-top: 10px;margin-left:10px;" data-id="b16a8a7">
        <div class="elementor-widget-container">
            <div class="back-btn" style="
position: relative;"><a href="{{ url('/experience', $detail_access_token) }}" style="font-size: 14px;font-weight:300;color:#000;font-family: europaRegular, sans-serif !important;"><i class="fas fa-arrow-circle-left"></i> BACK</a></div>
        </div>
    </div>

    <!-- SLIDE 1 -->
    <div class="main-container app_wrapper m_t_50" id="slide1">
        <div class="content custom_container">
            <div class="box-one boxes">
                <img class="img-1" src="{{ asset('images/discover/ph-balance2.png')}}">
                <img class="img-2" src="{{ asset('images/discover/line (2).png')}}">
                <img class="img-3" src="{{ asset('images/discover/DROP.png')}}">
            </div>
            <div class="box-two boxes">
                <img class="bottlemain" src="{{ asset('images/discover/imgpsh_fullsize_anim_1.png')}}">
            </div>
            <div class="box-three boxes"></div>
        </div>
        <div class="slide-bottom-sec">
            <img class="img-4" src="{{ asset('images/discover/DROP.png')}}" style="height: 110px;">
            <img class="img-5" src="{{ asset('images/discover/line (2).png')}}">
            <img class="img-6" src="{{ asset('images/discover/electrolytes2.png')}}" style="height: 65px;">
            <div class="box-text1">
                <h4>+ ELECTROLYTES</h4>
                <table>
                    <tbody>
                        <tr>
                            <td>CALCIUM</td>
                            <td>2 MG/L</td>
                        </tr>
                        <tr>
                            <td>MAGNESIUM</td>
                            <td>33 MG/L</td>
                        </tr>
                        <tr>
                            <td>POTASSIUM</td>
                            <td>57 MG/L</td>
                        </tr>
                        <tr>
                            <td>SODIUM</td>
                            <td>8 MG/L</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="dots_wrapper">
            <ul>
                <li class="active slide1_show" id=""></li>
                <li class="slide2_show"></li>
                <li class="slide3_show"></li>
            </ul>
        </div>

        <div class="dots_wrapper"><a class="primary_btn btn_effect" href="{{ url('/watr', $detail_access_token) }}">DRINK</a></div>

        <footer class="text-center">
            <div class="custom_container">
                {{ date('Y') }} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
            </div>
        </footer>
    </div>
    <!-- SLIDE 1 END -->

    <!-- SLIDE 2 -->
    <div class="main-container app_wrapper m_t_50" id="slide2" style="display: none">
        <div class="content">
            <div class="box-one boxes">
                <img class="img-1" src="{{ asset('images/discover/pH-7.0-ICON-blue-1.png')}}">
                <img class="img-2" src="{{ asset('images/discover/line (2).png')}}">
                <img class="img-3" src="{{ asset('images/discover/DROP.png')}}">
            </div>
            <div class="box-two boxes">
                <img src="{{ asset('images/discover/front-pure.png')}}">
            </div>
            <div class="box-three boxes"></div>
        </div>
        <div class="slide-bottom-sec">
            <img class="img-4" src="{{ asset('images/discover/DROP.png')}}" style="height: 110px;">
            <img class="img-5" src="{{ asset('images/discover/line (2).png')}}">
            <img class="img-6" src="{{ asset('images/discover/electrolytes2.png')}}" style="height: 65px;">
            <div class="box-text1">
                <h4>+ ELECTROLYTES</h4>
                <table>
                    <tbody>
                        <tr>
                            <td>CALCIUM</td>
                            <td>2 MG/L</td>
                        </tr>
                        <tr>
                            <td>MAGNESIUM</td>
                            <td>33 MG/L</td>
                        </tr>
                        <tr>
                            <td>POTASSIUM</td>
                            <td>57 MG/L</td>
                        </tr>
                        <tr>
                            <td>SODIUM</td>
                            <td>8 MG/L</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="dots_wrapper">
            <ul>
                <li class="slide1_show"></li>
                <li class="active slide2_show" id=""></li>
                <li class="slide3_show"></li>

            </ul>
        </div>

        <div class="dots_wrapper"><a class="primary_btn btn_effect" href="{{ url('/watr', $detail_access_token) }}">DRINK</a></div>

        <footer class="text-center">
            <div class="custom_container">
                {{ date('Y') }} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
            </div>
        </footer>
    </div>
    <!-- SLIDE 2 END -->

    <!-- Slide 3 -->
    <div class="watrguide-sec app_wrapper  m_t_50" id="slide3" style="display: none">
        <div class="layer-one">
            <img src="{{ asset('images/discover/treatment.png')}}" class="wgi-1" style="margin-bottom: 15px;">
            <img src="{{ asset('images/discover/droplet.png')}}" class="wgi-2">
        </div>
        <div class="watr-guide-containers">
            <div class="watr-guide-inner">
                <div style="width: 100%; transition: 0.5s; text-align: center; padding: 0!important;" id="brand-water-guide" class="brandwater-guide-class brandLinkClassParent">
                    <img style="max-width: 300px!important;" src="{{ asset('images/discover/treatment (1).png')}}" class="watr-guide-image wgi-4">
                </div>
            </div>
            <img src="{{ asset('images/discover/droplet.png')}}" class="wgi-6">
        </div>

        <div class="dots_wrapper">
            <ul>
                <li class="slide1_show"></li>
                <li class="slide2_show"></li>
                <li class="active slide3_show" id="slide3_show"></li>

            </ul>
        </div>

        <div class="dots_wrapper"><a class="primary_btn btn_effect" href="{{ url('/watr', $detail_access_token) }}">DRINK</a></div>

        <footer class="text-center">
            <div class="custom_container">
                {{ date('Y') }} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
            </div>
        </footer>
    </div>
    <!-- SLIDE 3 END -->
</body>

</html>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="{{ asset('js/jquery.js') }}"></script>

<script>
    $(".slide1_show").click(function() {
        $('#slide1').show();
        $('#slide2').hide();
        $('#slide3').hide();

    });

    $(".slide2_show").click(function() {
        $('#slide2').show();
        $('#slide1').hide();
        $('#slide3').hide();

    });

    $(".slide3_show").click(function() {
        $('#slide3').show();
        $('#slide1').hide();
        $('#slide2').hide();

    });

</script>
