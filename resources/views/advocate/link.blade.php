<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRINK WATR</title>

    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}" />
    <input type="hidden" value="{{url('/')}}" class="base_url">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: europaLight, sans-serif !important;
        }

        /*
        .braintree-upper-container {
            display: none;
        }*/


        .loader {
            background: #f1eeee91;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader img {
            width: 100px;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-10px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-10px);
            }
        }

        apple-pay-button {
            --apple-pay-button-width: 140px;
            --apple-pay-button-height: 30px;
            --apple-pay-button-border-radius: 5px;
            --apple-pay-button-padding: 5px 0px;
        }

        .bootstrap-select>.dropdown-toggle.bs-placeholder,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:active,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:focus,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:hover {
            color: #000 !important;
            background: #fff !important;
            border: #fff !important;
        }

        .dropdown-menu {
            background: #000 !important;
        }

    </style>
</head>


<div class="loader" style="width:100%;height:100%; display:none">

    <img src="{{asset('images\drop.png')}}" />
</div>


<body class="body">

    <main class="app_wrapper waterbg splash">
        <div class="custom_container">
            <div class="welcome_wrapper text-center">
                <div class="tagline_wrap" data-aos="zoom-in-up" data-aos-duration="1500">
                    {{-- <div class="tagline">
                  <span>Drink Watr</span>
                  <span> Stay Strong.</span>
                </div> --}}
                    <figure class="logo"><img src="{{asset('images/logowater.png')}}" alt="Logo" /></figure>
                </div>
                <a type="button" class="splash_link" style="text-decoration: underline;">EXPERIENCE</a>
            </div>

        </div>
    </main>


    <main class="app_wrapper waterbg welcome" style="display: none;">
        <div class="custom_container">

            <div class="welcome_wrapper text-center">

                {{-- <p class="welcome_note" data-aos="fade-up" data-aos-duration="3000"> WELCOME TO YOUR PATH TO DAILY HYDRATION + WELLNESS</p>

            <h1  data-aos="fade-up" data-aos-duration="3000">STAY STRONG.</h1> --}}

                <a type="button" class="welcome_link" data-aos="fade-up" data-aos-duration="3000">Enter</a>
            </div>
        </div>
    </main>

    <main class="app_wrapper  main_content" style="display: none;">
        <div class="custom_container">

            <form id="basic-form" method="POST">


                @csrf
                <input type="hidden" class="current_tab" value="step1_form">


                <div class="step1_form">
                    <main class="app_wrapper waterbg">
                        <div class="head_section">
                            <div class="brand">
                                <figure class="logo"><img src="{{asset('images/logowater.png')}}" alt="Logo" /></figure>
                                <span class="brand_txt">+ {{$advocateData->adv_first_name}} {{$advocateData->adv_last_name}}</span>
                            </div>
                            <div class="tagline_wrap">
                                <p>Your Path to daily hydration + wellness</p>
                            </div>
                        </div>


                        <input type="hidden" value="{{Request::segment(2)}}" name="adv_detail_access_token" class="adv_detail_access_token">

                        <div class="form_wrapper">
                            <div class="flex_row">
                                <div class="flex_col_sm_6">
                                    <div class="form_field">
                                        <div class="text-field">
                                            <input type="text" value="" name="first_name" id="first_name" placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex_col_sm_6">
                                    <div class="form_field">
                                        <div class="text-field">
                                            <input type="text" value="" name="last_name" id="last_name" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex_row">
                                <div class="flex_col_sm_6">
                                    <div class="form_field">
                                        <div class="text-field">
                                            <input type="text" value="" name="mobile" id="mobile" number placeholder="Mobile #">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex_col_sm_6">
                                    <div class="form_field">
                                        <div class="text-field">
                                            <input type="text" value="" name="email" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex_row">

                                <div class="flex_col_sm_12">
                                    <div class="form_field">
                                        <div class="text-field">
                                            <select class="selectpicker form-control" name="alakline_pure" id="alakline_pure" required data-dropup-auto="false" title="{{config('constants.package.default_drop_down_alakline_text')}}">
                                                <span class="caret"></span>
                                                <option data-hidden="true">{{config('constants.package.default_drop_down_alakline_text')}}</option>
                                                <option value="1">ALAKLINE + ELECTOLYTE</option>
                                                <option value="2">PURE + ELECTOLYTE</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex_row">

                                <div class="flex_col_sm_6">
                                    <div class="form_field">
                                        <div class="text-field">

                                            <select class="selectpicker placeholder select_alka" name="package" id="package1" required data-dropup-auto="false" title="{{config('constants.package.default_drop_down_text')}}">

                                                <option data-hidden="true">{{config('constants.package.default_drop_down_text')}}</option>
                                                <option value="1">1 MONTH OF HYDRATION $250 ( 10 KITS )</option>
                                                {{-- <option value="2">2 MONTH OF HYDRATION $500 ( 20 KITS )</option> --}}
                                                {{-- <option value="3">3 MONTH OF HYDRATION $750 ( 30 KITS )</option> --}}
                                            </select>

                                            <select class="selectpicker placeholder select_pure d-none" name="package" id="package1" required data-dropup-auto="false" title="{{config('constants.package.default_drop_down_text')}}">
                                                <option data-hidden="true">{{config('constants.package.default_drop_down_text')}}</option>
                                                <option value="1">1 MONTH OF HYDRATION $220 ( 10 KITS )</option>
                                                {{-- <option value="2">2 MONTH OF HYDRATION $440 ( 20 KITS )</option> --}}
                                                {{-- <option value="3">3 MONTH OF HYDRATION $660 ( 30 KITS )</option> --}}
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="flex_col_sm_6">
                                    <div class="form_field">
                                        <div class="text-field">
                                            <select class="selectpicker delivery_frequency1" name="delivery_frequency" id="delivery_frequency1" required data-dropup-auto="false" title="{{config('constants.package.delivery_freq_text')}}">
                                                <option selected disabled data-hidden="true">{{config('constants.package.delivery_freq_text')}}</option>
                                                <option value="1">UPCOMING SUNDAY</option>
                                                <option value="2">UPCOMING MONDAY</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dots_wrapper">
                                <ul>
                                    <li class="active"></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>

                            <div class="dots_wrapper">
                                {{-- <button type="button" class="outline_btn m_r_20 main_content_back">Back</button> --}}
                                <button type="submit" class="primary_btn btn_effect">Next</button>
                            </div>
                        </div>
                        <footer class="text-center">
                            <div class="custom_container">
                                {{date('Y')}} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
                            </div>
                        </footer>

                    </main>
                </div>
        </div>
        </div>




        <!-- Address -->

        <div class="step2_form" style="display: none;">
            <main class="app_wrapper waterbg">
                <div class="custom_container">

                    <div class="head_section">
                        <div class="brand">
                            <figure class="logo"><img src="{{asset('images/logowater.png')}}" alt="Logo" /></figure>
                            <span class="brand_txt">+ {{$advocateData->adv_first_name}} {{$advocateData->adv_last_name}}</span>
                        </div>
                        <div class="tagline_wrap">
                            <p>Your Path to daily hydration + wellness</p>
                        </div>
                    </div>

                    <div class="form_wrapper">

                        <div class="row">


                            <div class="col-sm-6" id="BillData">

                                <div class="form-group">
                                    <input type="text" value="" name="billing_address" id="billing_address" placeholder="DELIVERY ADDRESS1">
                                </div>
                                <div class="form-group">
                                    <input type="text" value="" name="billing_address2" id="billing_address2" placeholder="DELIVERY ADDRESS2">
                                </div>

                                <div class="form-group">
                                    <input type="text" value="" name="b_city_state_zip" id="b_city_state_zip" placeholder="CITY/STATE/ZIP">
                                </div>
                                <div class="form-group billing_radio_btn_up">
                                    <input type="radio" name="same_billing_address" class="same_billing_address same_billing_address_up" id="billing" />
                                    <label class="" for="billing">(SAME AS DELIVERY ADDRESS)</label>
                                </div>

                            </div>
                            <div class="col-sm-6" id="shippingData">

                                <div class="form-group">
                                    <input type="text" name="shipping_address" id="shipping_address" placeholder="BILLING ADDRESS1">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="shipping_address2" id="shipping_address2" placeholder="BILLING ADDRESS2">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="s_city_state_zip" id="s_city_state_zip" placeholder="CITY/STATE/ZIP">
                                </div>
                                <div class="form-group billing_radio_btn_down">
                                    <input type="radio" name="same_billing_address" class="hide same_billing_address same_billing_address_down" id="billing" />
                                    <label class="" for="billing">(SAME AS DELIVERY ADDRESS)</label>
                                </div>

                            </div>

                        </div>

                        <div class="flex_row m_t_50">

                            <div class="flex_col_sm_6">
                                <div class="form_field">
                                    <div class="text-field">
                                        <select class="selectpicker custom_select" name="package" id="package2" required data-dropup-auto="false" title="{{config('constants.package.default_drop_down_text')}}">
                                            <option selected disabled data-hidden="true">{{config('constants.package.default_drop_down_text')}}</option>
                                            <option value="1">1 MONTH OF HYDRATION $250 ( 10 KITS )</option>
                                            {{-- <option value="2">2 MONTH OF HYDRATION $500 ( 20 KITS )</option>
                                            <option value="3">3 MONTH OF HYDRATION $750 ( 30 KITS )</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex_col_sm_6">
                                <div class="form_field">
                                    <div class="text-field custom_select">
                                        <select class="selectpicker" name="delivery_frequency" id="delivery_frequency2" required data-dropup-auto="false" title="{{config('constants.package.delivery_freq_text')}}">
                                            <option selected disabled data-hidden="true">{{config('constants.package.delivery_freq_text')}}</option>
                                            <option value="1">UPCOMING SUNDAY</option>
                                            <option value="2">UPCOMING MONDAY</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dots_wrapper">
                            <ul>
                                <li></li>
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>

                        <div class="dots_wrapper">
                            <button type="button" class="outline_btn m_r_20 show_step1_form">Back</button>
                            <button type="submit" class="primary_btn">Next</button>

                            <!-- <button type="submit" class="primary_btn show_step3_form">Next</button> -->

                        </div>
                    </div>

                </div>

                <footer class="text-center">
                    <div class="custom_container">
                        {{date('Y')}} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
                    </div>
                </footer>

            </main>
        </div>




        <!-- Payment Type Selection -->
        <div class="step3_form" style="display: none;">

            <main class="app_wrapper waterbg">

                <div class="custom_container">
                    <div class="head_section">

                        <div class="brand">
                            <figure class="logo"><img src="{{asset('images/logowater.png')}}" alt="Logo" /></figure>
                            <span class="brand_txt">+ {{$advocateData->adv_first_name}} {{$advocateData->adv_last_name}}</span>
                        </div>

                        <div class="tagline_wrap">
                            <p>Your Path to daily hydration + wellness</p>
                        </div>
                    </div>

                    <div class="form_wrapper">
                        <div class="row"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="flex_row m_t_50">
                                    <div class="flex_col_sm_4"></div>
                                    <div class="flex_col_sm_5">
                                        <div class="form_field">
                                            <div class="text-field custom_select">
                                                <select class="selectpicker payment_method" name="payment_method" id="payment_method" data-dropup-auto="false" title="SELECT PAYMENT METHOD">
                                                    <option selected disabled data-hidden="true">SELECT PAYMENT METHOD</option>
                                                    <option value="1">CREDIT CARD</option>
                                                    <option value="2">DEBIT CARD</option>
                                                    <option value="3">VENMO </option>
                                                    <option value="4">APPLY PAY </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex_row m_t_50">
                            <div class="flex_col_sm_6">
                                <div class="form_field">
                                    <div class="text-field">
                                        <select class="selectpicker custom_select" name="package" id="package4" required data-dropup-auto="false" title="{{config('constants.package.default_drop_down_text')}}">
                                            <option selected disabled data-hidden="true">{{config('constants.package.default_drop_down_text')}}</option>
                                            <option value="1">1 MONTH OF HYDRATION $250 ( 10 KITS )</option>
                                            {{-- <option value="2">2 MONTH OF HYDRATION $500 ( 20 KITS )</option>
                                            <option value="3">3 MONTH OF HYDRATION $750 ( 30 KITS )</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex_col_sm_6">
                                <div class="form_field">
                                    <div class="text-field custom_select">
                                        <select class="selectpicker" name="delivery_frequency" id="delivery_frequency4" required data-dropup-auto="false" title="{{config('constants.package.delivery_freq_text')}}">
                                            <option value="" data-hidden="true">{{config('constants.package.delivery_freq_text')}}</option>
                                            <option value="1" selected>UPCOMING SUNDAY</option>
                                            <option value="2">UPCOMING MONDAY</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dots_wrapper">
                            <ul>
                                <li></li>
                                <li></li>
                                <li class="active"></li>
                                <li></li>
                            </ul>
                        </div>
                        <div class="dots_wrapper">
                            <button type="button" class="outline_btn m_r_20 show_step2_form">Back</button>
                            {{-- <button type="submit" class="primary_btn show_step4_form">Next</button> --}}
                            <button type="submit" class="primary_btn">Next</button>
                        </div>
                    </div>
                </div>

                <footer class="text-center">
                    <div class="custom_container">
                        {{date('Y')}} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
                    </div>
                </footer>
            </main>
        </div>




        <!-- Card Detail Filling -->
        <div class="step4_form" style="display: show;">
            <main class="app_wrapper waterbg">
                <div class="custom_container">


                    <div class="head_section">
                        <div class="brand">
                            <figure class="logo"><img src="{{asset('images/logowater.png')}}" alt="Logo" /></figure>
                            <span class="brand_txt">+ {{$advocateData->adv_first_name}} {{$advocateData->adv_last_name}}</span>
                        </div>
                        <div class="tagline_wrap">
                            <p>Your Path to daily hydration + wellness</p>
                        </div>
                    </div>

                    <input type="hidden" class="client_token" value="{{$client_token}}">
                    <input id="nonce" name="payment_method_nonce" type="hidden" />

                    <div class="form_wrapper">
                        <div class="flex_row">
                            <div class="flex_col_sm_4"></div>
                            <div class="flex_col_sm_5">
                                <div class="form_field">
                                    <div class="text-field custom_select">
                                        <select class="selectpicker payment_method" name="payment_method" id="payment_method" data-dropup-auto="false" title="SELECT PAYMENT METHOD">
                                            <option data-hidden="true">SELECT PAYMENT METHOD</option>
                                            <option value="1">CREDIT CARD</option>
                                            <option value="2">DEBIT CARD</option>
                                            <option value="3">VENMO</option>
                                            <option value="4">APPLY PAY</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="flex_row">
                              <div class="flex_col_sm_12">
                                <div class="form_field">
                                  <div class="text-field">
                                    <input type="text" name="name_on_card" id="name_on_card" placeholder="NAME ON CARD">
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="flex_row">
                              <div class="flex_col_sm_12">
                                <div class="form_field">
                                  <div class="text-field">
                                    <input type="text" name="card_number" id="card_number" placeholder="CARD NUMBER">
                                  </div>
                                </div>
                              </div>
                            </div> -->

                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>

                            <div class="flex_row">
                                <div class="flex_col_sm_12">
                                    <div class="form_field">
                                        <div class="text-field">
                                            <input type="text" placeholder="NAME ON CARD">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex_row">
                                <div class="flex_col_sm_12">
                                    <div class="form_field">
                                        <div class="text-field">
                                            <input type="text" id="cardnum" placeholder="CARD NUMBER">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex_row">
                                <div class="flex_col_sm_6">
                                    <div class="form_field">
                                        <div class="text-field">
                                            <input type="text" placeholder="CVV">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex_col_sm_6">
                                    <div class="form_field">
                                        <div class="text-field">
                                            <input type="text" id="expire" placeholder="EXPIRATION">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="bt-dropin_venmo">
                                <button type="button" id="venmo-button" class="btn btn-outline-success">
                                    <img style="border-radius: 20px;" src="{{asset('images/venmo.png')}}" height="35px" width="35px">
                                    <b>PayNow</b>
                                </button>
                            </div>

                            <div id="bt-dropin_applepay">
                                <apple-pay-button buttonstyle="black" type="buy" locale="el-GR" style="display: block;"></apple-pay-button>
                            </div>
                        </div>

                        <!-- <div class="flex_row">
                              <div class="flex_col_sm_6">
                                <div class="form_field">
                                  <div class="text-field">
                                    <input type="text" name="card_cvv" id="card_cvv" placeholder="CVV">
                                  </div>
                                </div>
                              </div>
                              <div class="flex_col_sm_6">
                                <div class="form_field">
                                  <div class="text-field">
                                    <input type="text" name="card_expiry" id="card_expiry" placeholder="EXPIRATION">
                                  </div>
                                </div>
                              </div> -->

                        <div class="flex_row m_t_50">

                            <div class="flex_col_sm_6">
                                <div class="form_field">
                                    <div class="text-field">
                                        <select class="selectpicker custom_select" name="package" id="package3" required data-dropup-auto="false" title="{{config('constants.package.default_drop_down_text')}}">
                                            <option value="" data-hidden="true">{{config('constants.package.default_drop_down_text')}}</option>
                                            <option value="1">1 MONTH OF HYDRATION $250 ( 10 KITS )</option>
                                            {{-- <option value="2">2 MONTH OF HYDRATION $500 ( 20 KITS )</option>
                                            <option value="3">3 MONTH OF HYDRATION $750 ( 30 KITS )</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex_col_sm_6">
                                <div class="form_field">
                                    <div class="text-field custom_select">
                                        <select class="selectpicker" name="delivery_frequency" id="delivery_frequency3" required data-dropup-auto="false" title="{{config('constants.package.delivery_freq_text')}}">
                                            <option value="" data-hidden="true">{{config('constants.package.delivery_freq_text')}}</option>
                                            <option value="1">UPCOMING SUNDAY</option>
                                            <option value="2">UPCOMING MONDAY</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="dots_wrapper">
                            <ul>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li class="active"></li>
                            </ul>
                        </div>

                        <div class="dots_wrapper">
                            <button type="button" class="outline_btn m_r_20 show_step3_form">Back</button>
                            <button type="submit" class="primary_btn show_step5_form">Next</button>
                        </div>
                    </div>
                </div>
                <footer class="text-center">
                    <div class="custom_container">
                        {{date('Y')}} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
                    </div>
                </footer>
            </main>
        </div>


        <!-- style="display: none;" -->
        <div class="step5_form" style="display: none;">
            <main class="app_wrapper waterbg">
                <div class="custom_container">

                    <div class="head_section">
                        <div class="brand">
                            <figure class="logo"><img src="{{asset('images/logowater.png')}}" alt="Logo" /></figure>
                            <span class="brand_txt">+ {{$advocateData->adv_first_name}} {{$advocateData->adv_last_name}}</span>
                        </div>

                        <div class="tagline_wrap">
                            <p>Your Path to daily hydration + wellness</p>
                        </div>
                    </div>

                    <div class="form_wrapper edit_form_wrapper">
                        <div class="flex_row">
                            <div class="flex_col_sm_12">
                                <div class="form_field">
                                    <div class="text-field">
                                        <select class="selectpicker custom_select final_page_package_label" data-dropup-auto="false" title="YOUR WELLNESS SOLUTION">
                                            <option value="" selected data-hidden="true">YOUR WELLNESS SOLUTION
                                            </option>
                                        </select>

                                        <select class="selectpicker custom_select" name="package" id="package5" required data-dropup-auto="false" title="YOUR WELLNESS SOLUTION">
                                            <option value="" data-hidden="true">YOUR WELLNESS SOLUTION</option>
                                            <option value="1" selected>1 MONTH OF HYDRATION $250 ( 10 KITS )
                                            </option>
                                            {{-- <option value="2">2 MONTH OF HYDRATION $500 ( 20 KITS )</option>
                                            <option value="3">3 MONTH OF HYDRATION $750 ( 30 KITS )</option> --}}
                                        </select>

                                        <button type="button" class="edit btn_effect edit_package">Edit</button>
                                    </div>
                                    <span class="text-note package_note_final_page">EVERY SUNDAY FOR 1 MONTH </span>
                                    <span class="text-note">(1st DELIVERY 4 KITS, THEN 2 KITS THEREAFTER). </span>
                                </div>

                                <div class="form_field">
                                    <div class="text-field">

                                        <select class="selectpicker custom_select final_page_delivery_freq_label" data-dropup-auto="false" title="DELIVERY FREQUENCY">
                                            <option value="" selected data-hidden="true">DELIVERY FREQUENCY</option>
                                        </select>

                                        <select class="selectpicker custom_select" title="DELIVERY FREQUENCY" name="delivery_frequency" id="delivery_frequency5" required data-dropup-auto="false">
                                            <option value="" data-hidden="true" title="{{config('constants.package.delivery_freq_text')}}">{{config('constants.package.delivery_freq_text')}}</option>
                                            <option value="1" selected>UPCOMING SUNDAY</option>
                                            <option value="2">UPCOMING MONDAY</option>
                                        </select>
                                        <button type="button" class="edit btn_effect edit_delivery_freq">Edit
                                        </button>
                                    </div>
                                    <span class="text-note delivery_note_final_page">EVERY SUNDAY FOR 1 MONTH </span>
                                    <span class="text-note">(1st DELIVERY 4 KITS, THEN 2 KITS THEREAFTER). </span>
                                </div>


                                <div class="form_field">
                                    <div class="text-field">
                                        <select class="selectpicker custom_select final_page_edit_address_label" data-dropup-auto="false" title="DELIVERY ADDRESS">
                                            <option value="" selected data-hidden="true">DELIVERY ADDRESS</option>
                                        </select>

                                        <input type="text" class="shipping_address_final_page" placeholder="BILLING ADDRESS" disabled>
                                        <button type="button" class="edit btn_effect edit_address_final_page">EDIT
                                        </button>
                                    </div>
                                </div>

                                <div class="form_field">
                                    <div class="flex_row">
                                        <div class="flex_col_sm_6">
                                            <div class="text-field">
                                                <input type="text" class="shipping_address1_final_page" placeholder="BILLING ADDRESS 1" disabled>
                                            </div>
                                        </div>
                                        <div class="flex_col_sm_6">
                                            <!-- <div class="text-field">
                                                  <input type="text" placeholder="">
                                                </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="form_field">
                                    <div class="flex_row">
                                        <div class="flex_col_sm_6">
                                            <div class="text-field">
                                                <input type="text" class="s_city_state_zip_final_page" placeholder="CITY  / STATE  /  ZIP" disabled>
                                            </div>
                                        </div>
                                        <div class="flex_col_sm_6">
                                        </div>
                                    </div>
                                </div>

                                <div class="form_field">
                                    <span class="text-note shipping_add_final_page"></span>
                                    <span class="text-note citi_state_zip_final_page"></span>
                                </div>

                                <div class="form_field">
                                    <div class="text-field">

                                        <select class="selectpicker custom_select final_page_payment_source_label" data-dropup-auto="false" title="PAYMENT SOURCE">
                                            <option value="" selected data-hidden="true">PAYMENT SOURCE</option>
                                        </select>

                                        <select class="selectpicker custom_select payment_method payment_method_finl_page_class" name="payment_method" id="payment_method" data-dropup-auto="false" title="SELECT PAYMENT METHOD">
                                            <option data-hidden="true">SELECT PAYMENT METHOD</option>
                                            <option value="1">CREDIT CARD</option>
                                            <option value="2">DEBIT CARD</option>
                                            <option value="3">VENMO</option>
                                            <option value="4">APPLY PAY</option>
                                        </select>

                                        <button type="button" class="edit btn_effect edit_payment_method_final_page">Edit
                                        </button>
                                    </div>
                                    {{-- <span class="text-note">CARD ENDING IN <b><span class="last_4_digit_card"></span></b></span> --}}
                                    {{-- <span class="text-note payment_method_final_page"></span> --}}
                                </div>

                                <div class="form_field">
                                    <div class="flex_row">
                                        <div class="flex_col_sm_6 text-left">
                                            <label class="form_label">TAX</label>
                                        </div>
                                        <div class="flex_col_sm_6 text-right">
                                            <input type="hidden" name="tax_amount" class="tax_amount">
                                            <p class="show_label tax_amount">1.00</p>
                                        </div>
                                    </div>
                                    <div class="flex_row">
                                        <div class="flex_col_sm_6 text-left">
                                            <label class="form_label">SERVICE FEE</label>
                                        </div>
                                        <div class="flex_col_sm_6 text-right">
                                            <p class="show_label service_fees">5.00</p>
                                        </div>
                                    </div>
                                    <div class="flex_row">
                                        <div class="flex_col_sm_6 text-left">
                                            <label class="form_label">DELIVERY FEE</label>
                                        </div>
                                        <div class="flex_col_sm_6 text-right">
                                            <p class="show_label delivery_fees">5.00</p>
                                        </div>
                                    </div>
                                    <div class="flex_row">
                                        <div class="flex_col_sm_6 text-left">
                                            <label class="form_label">TOTAL</label>
                                        </div>
                                        <div class="flex_col_sm_6 text-right">
                                            <input type="hidden" name="total_amount" class="total_amount">
                                            <p class="show_label total_amount">$266</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="text-center">
                            <div class="form_field">
                                {{-- <button type="button" class="outline_btn m_r_20 show_step4_form">Back</button> --}}
                                <button type="submit" class="primary_btn btn_effect btn_black purchase_button">
                                    PURHASE
                                </button>
                            </div>
                        </div>

                        <div class="text-center recipt_note">
                            UPON PURCHASE YOU WILL RECEIVE A RECEIPT VIA TEXT & EMAIL
                        </div>

                    </div>

                </div>
                <footer class="text-center">
                    <div class="custom_container">
                        {{date('Y')}} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
                    </div>
                </footer>
            </main>
        </div>



    </main>
    </div>

    </form>

    </div>

    </main>

    <div class="final_form" style="display: none;">

        {{-- <main class="app_wrapper waterbg">
      <div class="custom_container">

        <div class="head_section">
          <div class="brand">
            <figure class="logo"><img src="{{asset('images/logowater.png')}}" alt="Logo" /></figure>
        <span class="brand_txt">+ {{$advocateData->adv_first_name}} {{$advocateData->adv_last_name}}</span>
    </div>

    <div class="tagline_wrap">
        <div class="tagline">
            <span>Drink Water</span>
            <span> Stay Strong.</span>
        </div>
        <p>Your Path to daily hydration + wellness</p>
    </div>
    </div>


    <div class="form_field">
        <div class="flex_row">
            <div class="flex_col_sm_4"></div>
            <div class="flex_col_sm_6">
                <div class="form_field">
                    <div class="text-field">
                        <input type="text" placeholder="YOUR SOLUTION" disabled>
                    </div>
                    <span class="package_note_final_page"> 1 Month of HYDRATION (10 KITS)</span>
                </div>
            </div>
        </div>

        <div class="flex_row">
            <div class="flex_col_sm_4"> </div>
            <div class="flex_col_sm_6">
                <div class="form_field">
                    <div class="text-field">
                        <input type="text" placeholder="DELVERY FREQENCY" disabled>
                    </div>
                    <span class="delivery_note_final_page">UPCOMING SUNDAY</span>
                </div>
            </div>
        </div>

        <div class="flex_row">
            <div class="flex_col_sm_2"></div>
            <div class="flex_col_sm_8">
                <p class="text-center">YOU WILL RECEIVE A RECEIPT VIA TEXT & EMAIL</p>
            </div>
        </div>

        <div class="flex_row">

            <div class="flex_col_sm_8">
                <div class="flex_row">
                    <div class="flex_col_sm_6">
                        <span class="form_label"> <b>TAX</b></span>
                    </div>
                    <div class="flex_col_sm_6">
                        <label class="show_label tax_amount"> 1.00</label>
                    </div>
                </div>

                <div class="flex_row">
                    <div class="flex_col_sm_6">
                        <label class="form_label"><b>SERVICE FEE</b></label>
                    </div>
                    <div class="flex_col_sm_6">
                        <p class="show_label service_fees">5.00</p>
                    </div>
                </div>

                <div class="flex_row">
                    <div class="flex_col_sm_6">
                        <span class="form_label"><b>DELIVERY</b></span>
                    </div>
                    <div class="flex_col_sm_6">
                        <label class="show_label service_fees"> 5.00</label>
                    </div>
                </div>

                <div class="flex_row">
                    <div class="flex_col_sm_6">
                        <span class="form_label"><b>TOTAL</b></span>
                    </div>
                    <div class="flex_col_sm_6">
                        <label class="show_label total_amount"> $256.00</label>
                    </div>
                </div>

            </div>
        </div>

    </div>

    </div>
    </main> --}}

    <main class="app_wrapper waterbg">
        <div class="custom_container">
            <div class="head_section">
                <div class="brand">
                    <figure class="logo"><img src="{{asset('images/logowater.png')}}" alt="Logo" /></figure>
                    <span class="brand_txt">+ {{$advocateData->adv_first_name}} {{$advocateData->adv_last_name}}</span>
                </div>

                <div class="tagline_wrap">
                    <div class="tagline">
                        <span>Drink Wter</span>
                        <span> Stay Strong.</span>
                    </div>
                    <p>Your Path to daily hydration + wellness</p>
                </div>
            </div>


            <div class="form_wrapper edit_form_wrapper">


                <p class="support_note">
                    A RECEIPT FOR YOUR PURCHASE HAS BEEN TEXTED AND EMAILED TO THE CREDENTIALS YOU PROVIDED. FOR ANY
                    SUPPORT, PLEASE EMAIL CLARITY@DRINKWATR.COM
                </p>

                <figure class="droplet_logowrap text-center">
                    <span>DELIVERY PERFORMED BY</span>
                    <img src="{{asset('images/droplet.png')}}" />
                </figure>

            </div>


        </div>
        <footer class="text-center">
            <div class="custom_container">
                {{date('Y')}} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
            </div>
        </footer>
    </main>


    </div>

</body>

</html>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/constants.js')}}"></script>
<script src="{{asset('js/jquery_validation.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="https://js.braintreegateway.com/web/dropin/1.33.2/js/dropin.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/link.js')}}"></script>
<script src="{{asset('js/show.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
{{-- <script src="https://js.braintreegateway.com/web/3.85.3/js/client.min.js"></script> --}}
{{-- <script src="https://js.braintreegateway.com/web/3.85.3/js/venmo.min.js"></script> --}}
{{-- <script src="https://js.braintreegateway.com/web/3.85.3/js/data-collector.min.js"></script> --}}
<script src="https://applepay.cdn-apple.com/jsapi/v1/apple-pay-sdk.js"></script>
<script src="https://js.braintreegateway.com/web/3.77.0/js/client.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.77.0/js/venmo.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.77.0/js/data-collector.min.js"></script>
<script src="{{asset('js/venmo.js')}}"></script>


<script src="https://js.braintreegateway.com/web/3.85.3/js/client.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.85.3/js/apple-pay.min.js"></script>

<script src="{{asset('js/applepay.js')}}"></script>
<script>


</script>

<style>
    label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }

    input.error {
        /* border: 1px dashed red;   */
        font-weight: 300;
        /* color: red;   */
    }

</style>
