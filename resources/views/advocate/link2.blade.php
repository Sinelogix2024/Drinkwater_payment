@if (!empty(session('response_error_msg',null)))
<script>
    // alert("{{ session('response_error_msg') }}");

</script>

@php
request()->session()->forget('response_error_msg');
@endphp
@endif

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STAY STRONG</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}" />
    <input type="hidden" value="{{ url('/') }}" class="base_url">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            /* font-family: europaLight, sans-serif !important; */
            /* line-height: 1.5; */
        }

        .head_section .brand .brand_txt {
            font-size: 2rem;
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

        .bootstrap-select>.dropdown-toggle {
            width: auto;
            border-bottom: 0px !important;
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


        .toast {
            position: fixed;
            top: 15px;
            right: 15px;
            z-index: 9999;
        }

        .bootstrap-basic {
            background: white;
        }

        /* Braintree Hosted Fields styling classes*/
        .braintree-hosted-fields-focused {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* .braintree-hosted-fields-focused.is-invalid {
  border-color: #dc3545;
  box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
} */

        input:focus,
        textarea:focus,
        select:focus {
            outline: none !important;
        }

        .btn-light {
            background-color: #fff;
            border-color: #fff;
            border-bottom: 0;
        }

        .btn-light:hover {
            background-color: #fff;
            border-color: #fff;
        }

        .btn-light:focus {
            background-color: #fff;
            border-color: #fff;
        }

        .btn-light:not(:disabled):not(.disabled).active,
        .btn-light:not(:disabled):not(.disabled):active,
        .show>.btn-light.dropdown-toggle {
            background-color: #fff;
            border-color: #fff;
        }

        .primary_btn {
            color: #fff;
            padding: 10px;
            border-width: 2px 2px 2px 2px !important;
            border-radius: 50px 50px 50px 50px;
            padding: 5px 30px 5px 30px;
            border: 1px solid black;
        }

        .outline_btn {
            border-width: 2px 2px 2px 2px !important;
            border-radius: 50px 50px 50px 50px;
            padding: 5px 30px 5px 30px;
            border: 1px solid black;
        }

        .billing_radio_btn_up {
            margin-top: 4rem;
            margin-bottom: 0;
        }

        .input-assumpte+label {
            position: relative;
        }

        .input-assumpte+label:before {
            background-color: #fff;
            border: 2px solid #000;
            border-radius: 15px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
            display: inline-block;
            transition-duration: 0.3s;
            width: 15px;
            height: 15px;
            content: '';
            margin-top: 4px;
            position: absolute;
        }

        .input-assumpte:checked+label:before {
            border: 1px solid rgb(144, 144, 145);
            background-color: #000;
        }

        input[type=checkbox].input-assumpte {
            display: none;
        }

        .bootstrap-select .dropdown-toggle:focus,
        .bootstrap-select>select.mobile-device:focus+.dropdown-toggle {
            outline: 0 dotted #333 !important;
            outline-offset: 0;
            box-shadow: 0 0 0 0.2rem rgb(255 255 255 / 25%);
        }

        .payment_method_finl_page_class {
            border-bottom: 0px;
        }

        .purchase_page_custom_css {
            margin: 0;
        }

        .purchase_page_main_field_custom_css {
            margin-bottom: 1.5rem;
        }

        body {
            font-size: 14px !important;
            font-family: europaLight, sans-serif !important;
            /* font-family: europaLight, sans-serif !important; */
        }

        figure img {
            height: 150px;
        }

        .app_wrapper {
            padding: 0;
        }

        .text-note {
            font-size: 11px !important;
        }

    </style>
</head>


<div class="loader" style="width:100%;height:100%; display:none">
    <img src="{{ asset('images/logowater.png') }}" />
</div>

<body class="body">
    {{-- main container 1 start --}}
    <main class="app_wrapper waterbg" style="display: none">
        <div class="custom_container">
            <div class="welcome_wrapper text-center">
                <div class="tagline_wrap" data-aos="zoom-in-up" data-aos-duration="1500">
                    <figure class="logo"><img src="{{ asset('images/logowater.png') }}" alt="Logo" /></figure>
                </div>
                <a type="button" class="splash_link" style="text-decoration: underline;">EXPERIENCE</a>
            </div>

        </div>
    </main>
    {{-- main container 1 end --}}

    {{-- main container 2 start --}}
    <main class="app_wrapper waterbg " style="display:none">
        <div class="custom_container">

            <div class="welcome_wrapper text-center">

                <a type="button" class="welcome_link" data-aos="fade-up" data-aos-duration="3000">Enter</a>
            </div>
        </div>
    </main>
    {{-- main container 2 end --}}

    <form id="basic-form" method="POST">
        @csrf
        <main class="app_wrapper  main_content" style="display: none;">
            <!-- custom container start -->
            <div class="custom_container">
                <input type="hidden" class="current_tab" id="current_tab" name="current_tab" value="step1_form">
                <!-- step 1 start home -->
                <div class="step1_form">
                    <main class="app_wrapper waterbg">
                        <div class="head_section">
                            <div class="brand">
                                <figure class="logo">
                                    <img src="{{ asset('images/logowater.png') }}" alt="Logo" />
                                    <span style="font-size: 35px;">+</span>
                                    <img src="{{ asset('images/bhs-logo-social.png') }}" alt="Logo" />
                                </figure>
                            </div>
                            <div class="tagline_wrap">
                                <p>Your Path to daily hydration + wellness</p>
                            </div>
                        </div>


                        <input type="hidden" value="{{ Request::segment(2) }}" name="adv_detail_access_token" class="adv_detail_access_token">

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
                                            {{-- <input type="text" value="" name="mobile" id="mobile" number
                                                placeholder="Mobile #"> --}}

                                            <input type="text" name="mobile" id="mobile" pattern="?\d{3}[- ]?\d{3}[- ]?\d{4}" maxlength="12" title="US based Phone Number in the format of: 123-456-7890" placeholder="Mobile" required />
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

                            <div class="flex_row d-none">

                                <div class="flex_col_sm_12 p-0">
                                    <div class="form_field">
                                        <div class="text-field">
                                            <select class="selectpicker form-control" name="alakline_pure" id="alakline_pure" required data-dropup-auto="false" title="{{ config('constants.package.default_drop_down_alakline_text') }} ">

                                                <option data-hidden="true" selected="selected">
                                                    {{ config('constants.package.default_drop_down_alakline_text') }}
                                                </option>
                                                <option value="1">ALKALINE + ELECTROLYTE</option>
                                                <option value="2">PURE + ELECTROLYTE</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex_row d-none">
                                <div class="flex_col_sm_7 p-0">
                                    <div class="form_field">
                                        <div class="text-field">

                                            <select class="selectpicker placeholder form-control select_alka" name="package" id="package1" required data-dropup-auto="false" title="{{ config('constants.package.default_drop_down_text') }}">

                                                <option data-hidden="true" selected>
                                                    {{ config('constants.package.default_drop_down_text') }}</option>
                                                <option value="1">1 WEEK WELLNESS $78 ( 3 KITS )</option>
                                                <option value="2">1 MONTH WELLNESS $250 ( 10 KITS )</option>
                                                <option value="3">2 MONTH WELLNESS $500 ( 20 KITS )</option>
                                            </select>

                                            <select class="selectpicker placeholder form-control select_pure d-none" name="package" id="package1" required data-dropup-auto="false" title="{{ config('constants.package.default_drop_down_text') }}">
                                                <option data-hidden="true" selected>
                                                    {{ config('constants.package.default_drop_down_text') }}</option>
                                                <option value="1">1 WEEK WELLNESS $66 ( 3 KITS )</option>
                                                <option value="2">1 MONTH WELLNESS $220 ( 10 KITS )</option>
                                                <option value="3">2 MONTH WELLNESS $440 ( 20 KITS )</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="flex_col_sm_4 p-0" id="delf_div">
                                    <div class="form_field">
                                        <div class="text-field">
                                            <select class="selectpicker placeholder form-control" name="delivery_frequency" id="delivery_frequency1" required data-dropup-auto="false" title="{{ config('constants.package.delivery_freq_text') }}">
                                                <option data-hidden="true" selected="selected">
                                                    {{ config('constants.package.delivery_freq_text') }}</option>
                                                <option value="1">EVERY SUNDAY</option>
                                                <option value="2">EVERY MONDAY</option>
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
                                    <li></li>
                                </ul>
                            </div>

                            <div class="dots_wrapper">
                                {{-- <button type="button" class="outline_btn m_r_20 main_content_back">Back</button> --}}
                                <button type="submit" class="primary_btn btn_effect">Next</button>
                            </div>
                        </div>
                        {{-- <footer class="text-center">
                            <div class="custom_container">
                                {{ date('Y') }} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
                </div>
                </footer> --}}
                @include('footer')

        </main>
        </div>
        <!-- step 1 end home -->
        </div>
        <!-- custom container end -->

        <!-- step 2 start Address -->
        <div class="step2_form" style="display: none;">
            <main class="app_wrapper waterbg">
                <div class="custom_container">

                    <div class="head_section">
                        <div class="brand">
                            <figure class="logo">
                                <img src="{{ asset('images/logowater.png') }}" alt="Logo" />
                                <span style="font-size: 35px;">+</span>
                                <img src="{{ asset('images/bhs-logo-social.png') }}" alt="Logo" />
                            </figure>
                        </div>
                        <div class="tagline_wrap">
                            <p>Your Path to daily hydration + wellness</p>
                        </div>
                    </div>

                    <div class="form_wrapper">

                        <div class="row">


                            <div class="col-sm-6" id="BillData">

                                <div class="form-group">
                                    <input type="text" value="" name="billing_address" id="billing_address" placeholder="DELIVERY ADDRESS 1">
                                </div>
                                <div class="form-group">
                                    <input type="text" value="" name="billing_address2" id="billing_address2" placeholder="UNIT # | SUITE # | APT">
                                </div>

                                <div class="row">
                                    <div class="form-group col">
                                        <input type="text" value="" name="b_city" id="b_city" placeholder="CITY">
                                    </div>
                                    <div class="form-group col">
                                        <input type="text" value="" name="b_state" id="b_state" placeholder="STATE">
                                    </div>
                                    <div class="form-group col">
                                        <input type="text" value="" name="b_zip" id="b_zip" placeholder="ZIP">
                                    </div>
                                </div>
                                <div class="form-group billing_radio_btn_up">
                                    <input type="checkbox" name="same_billing_address" class="input-assumpte same_billing_address same_billing_address_up" id="billing" />
                                    <label class="" for="billing"><span style="margin-left: 20px;">(SAME AS DELIVERY ADDRESS)</span></label>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div id="shippingData">
                                    <div class="form-group">
                                        <input type="text" name="shipping_address" id="shipping_address" placeholder="BILLING ADDRESS 1">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="shipping_address2" id="shipping_address2" placeholder="UNIT # | SUITE # | APT">
                                    </div>

                                    <div class="row">
                                        <div class="form-group col">
                                            <input type="text" name="s_city" id="s_city" placeholder="CITY">
                                        </div>
                                        <div class="form-group col">
                                            <input type="text" name="s_state" id="s_state" placeholder="STATE">
                                        </div>
                                        <div class="form-group col">
                                            <input type="text" name="s_zip" id="s_zip" placeholder="ZIP">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group billing_radio_btn_down">
                                    <input type="checkbox" name="same_billing_address" class="hide input-assumpte same_billing_address same_billing_address_down" id="billing" />
                                    <label class="" for="billing"><span style="margin-left: 20px;">(SAME AS DELIVERY ADDRESS)</span></label>
                                </div>
                            </div>

                        </div>

                        <div class="flex_row m_t_50" style="display: none">

                            <div class="flex_col_sm_6">
                                <div class="form_field">
                                    <div class="text-field">
                                        <select class="selectpicker custom_select" name="package" id="package2" required data-dropup-auto="false" title="{{ config('constants.package.default_drop_down_text') }}">
                                            <option selected disabled data-hidden="true">
                                                {{ config('constants.package.default_drop_down_text') }}</option>
                                            <option value="1">1 WEEK WELLNESS $78 ( 3 KITS )</option>
                                            <option value="2">1 MONTH WELLNESS $250 ( 10 KITS )</option>
                                            <option value="3">2 MONTH WELLNESS $500 ( 20 KITS )</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex_col_sm_6">
                                <div class="form_field">
                                    <div class="text-field">
                                        <select class="selectpicker custom_select" name="delivery_frequency" id="delivery_frequency2" required data-dropup-auto="false" title="{{ config('constants.package.delivery_freq_text') }}">
                                            <option selected disabled data-hidden="true">
                                                {{ config('constants.package.delivery_freq_text') }}</option>
                                            <option value="1">EVERY SUNDAY</option>
                                            <option value="2">EVERY MONDAY</option>
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

                {{-- <footer class="text-center">
                        <div class="custom_container">
                            {{ date('Y') }} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
        </div>
        </footer> --}}
        @include('footer')

        </main>
        </div>
        <!-- step 2 ends Address -->

        <!-- step 3 start Payment Type Selection -->
        <div class="step3_form" style="display: none;">

            <main class="app_wrapper waterbg">

                <div class="custom_container">
                    <div class="head_section">

                        <div class="brand">
                            <figure class="logo">
                                <img src="{{ asset('images/logowater.png') }}" alt="Logo" />
                                <span style="font-size: 35px;">+</span>
                                <img src="{{ asset('images/bhs-logo-social.png') }}" alt="Logo" />
                            </figure>
                        </div>

                        <div class="tagline_wrap">
                            <p>Your Path to daily hydration + wellness</p>
                        </div>
                    </div>

                    <input type="hidden" class="client_token" value="{{ $client_token }}">


                    <div class="form_wrapper">
                        <div class="col-md-12">
                            <div class="form_field text-center">
                                <div class="text-field custom_select">
                                    <select class="selectpicker payment_method" name="payment_method" id="payment_method" data-dropup-auto="false" title="SELECT PAYMENT METHOD">
                                        <option data-hidden="true" selected="selected">SELECT PAYMENT METHOD</option>
                                        <option value="1">CREDIT CARD</option>
                                        <option value="2">DEBIT CARD</option>
                                        <option value="3">VENMO </option>
                                        {{-- <option value="4">APPLY PAY </option> --}}
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="bt-drop-in-wrapper text-center">
                            <div class="bootstrap-basic card-div" id="bt-dropin" style="display: none;">
                                <form class="needs-validation" novalidate id="card_detail_form">
                                    <div class="row">
                                        <div class="col-sm-12 mb-6">
                                            <div class="form-control" id="cc-name"></div>
                                            <div class="invalid-feedback">
                                                Name on card is required
                                            </div>
                                        </div>

                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-sm-12 mb-6">

                                            <div class="form-control text-field " id="cc-number"></div>
                                            <span id="card-brand"></span>

                                            <div class="invalid-feedback">
                                                Credit card number is required
                                            </div>
                                        </div>

                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-6 mb-6">

                                            <div class="form-control" id="cc-cvv"></div>
                                            <div class="invalid-feedback">
                                                Security code required
                                            </div>
                                        </div>
                                        <div class="col-6 mb-6">

                                            <div class="form-control" id="cc-expiration"></div>
                                            <div class="invalid-feedback">
                                                Expiration date required
                                            </div>
                                        </div>

                                    </div>


                                    <div class="text-center">
                                        {{-- <button class="btn btn-primary btn-lg" type="submit">Pay with <span id="card-brand">Card</span></button> --}}
                                    </div>

                            </div>

                            {{-- <div id="bt-dropin_venmo" style="display: none;">
                                    <button type="button" id="venmo-button" class="btn btn-outline-success">
                                        <img style="border-radius: 20px;" src="{{ asset('images/venmo.png') }}" height="35px" width="35px">
                            <b>PayNow</b>
                            </button>
                        </div> --}}

                        <div id="bt-dropin_applepay" style="display: none;">
                            <apple-pay-button buttonstyle="black" type="buy" locale="el-GR" style="display: block;"></apple-pay-button>
                        </div>
                    </div>

                    <div class="flex_row m_t_50" style="display: none">
                        <div class="flex_col_sm_6">
                            <div class="form_field">
                                <div class="text-field">
                                    <select class="selectpicker custom_select" name="package" id="package4" required data-dropup-auto="false" title="{{ config('constants.package.default_drop_down_text') }}">
                                        <option selected disabled data-hidden="true">
                                            {{ config('constants.package.default_drop_down_text') }}</option>
                                        <option value="1">1 MONTH WELLNESS $250 ( 10 KITS )</option>
                                        <option value="2">2 MONTH WELLNESS $500 ( 20 KITS )</option>
                                        <option value="3">3 MONTH WELLNESS $750 ( 30 KITS )</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex_col_sm_6">
                            <div class="form_field">
                                <div class="text-field custom_select">
                                    <select class="selectpicker" name="delivery_frequency" id="delivery_frequency4" required data-dropup-auto="false" title="{{ config('constants.package.delivery_freq_text') }}">
                                        <option value="" data-hidden="true">
                                            {{ config('constants.package.delivery_freq_text') }}</option>
                                        <option value="1" selected>EVERY SUNDAY</option>
                                        <option value="2">EVERY MONDAY</option>
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

        {{-- <footer class="text-center">
                <div class="custom_container">
                    {{ date('Y') }} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
        </div>
        </footer> --}}
        @include('footer')
        </main>
        </div>
        <!-- step 3 ends Payment Type Selection -->

        <!-- step 4 start Card Detail Filling -->
        <div class="step4_form" style="display: none;">
            <main class="app_wrapper waterbg">
                <div class="custom_container">
                    <div class="head_section">
                        <div class="brand">
                            <figure class="logo">
                                <img src="{{ asset('images/logowater.png') }}" alt="Logo" />
                                <span style="font-size: 35px;">+</span>
                                <img src="{{ asset('images/bhs-logo-social.png') }}" alt="Logo" />
                            </figure>
                        </div>
                        <div class="tagline_wrap">
                            <p>Your Path to daily hydration + wellness</p>
                        </div>
                    </div>

                    <div class="form_wrapper">
                        <div class="flex_row" style="display: none">
                            <div class="flex_col_sm_4"></div>
                            <div class="flex_col_sm_5">
                                <div class="form_field">
                                    <div class="text-field custom_select">
                                        <select class="selectpicker payment_method" name="payment_method" id="payment_method" data-dropup-auto="false" title="SELECT PAYMENT METHOD">
                                            <option data-hidden="true">SELECT PAYMENT METHOD</option>
                                            <option value="1">CREDIT CARD</option>
                                            <option value="2">DEBIT CARD</option>
                                            <option value="3">VENMO</option>
                                            {{-- <option value="4">APPLY PAY</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex_row m_t_50" style="display: none">

                            <div class="flex_col_sm_6">
                                <div class="form_field">
                                    <div class="text-field">
                                        <select class="selectpicker custom_select" name="package" id="package3" required data-dropup-auto="false" title="{{ config('constants.package.default_drop_down_text') }}">
                                            <option value="" data-hidden="true">
                                                {{ config('constants.package.default_drop_down_text') }}</option>
                                            <option value="1">1 MONTH WELLNESS $250 ( 10 KITS )</option>
                                            <option value="2">2 MONTH WELLNESS $500 ( 20 KITS )</option>
                                            <option value="3">3 MONTH WELLNESS $750 ( 30 KITS )</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex_col_sm_6">
                                <div class="form_field">
                                    <div class="text-field custom_select">
                                        <select class="selectpicker" name="delivery_frequency" id="delivery_frequency3" required data-dropup-auto="false" title="{{ config('constants.package.delivery_freq_text') }}">
                                            <option value="" data-hidden="true">
                                                {{ config('constants.package.delivery_freq_text') }}</option>
                                            <option value="1">EVERY SUNDAY</option>
                                            <option value="2">EVERY MONDAY</option>
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
                                <li></li>
                                <li class="active"></li>
                            </ul>
                        </div>

                        <div class="dots_wrapper">
                            <button type="button" class="outline_btn m_r_20 show_step3_form">Back</button>
                            {{-- <button type="submit" class="primary_btn show_step5_form">Next</button> --}}
                            <button class="primary_btn show_step5_form" type="submit">Next</button>

                            {{-- <footer class="text-center">
                                <div class="custom_container">
                                    {{ date('Y') }} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
                        </div>
                        </footer> --}}
                        @include('footer')
                    </div>
                </div>
        </div>
        </main>
        </div>
        <!-- step 4 ends Card Detail Filling -->

        <!-- Step 5 starts -->
        <div class="step5_form" style="display: none;">
            <main class="app_wrapper waterbg">
                <div class="custom_container">

                    <div class="head_section">
                        <div class="brand">
                            <figure class="logo">
                                <img src="{{ asset('images/logowater.png') }}" alt="Logo" />
                                <span style="font-size: 35px;">+</span>
                                <img src="{{ asset('images/bhs-logo-social.png') }}" alt="Logo" />
                            </figure>
                        </div>

                        <div class="tagline_wrap">
                            <p>Your Path to daily hydration + wellness</p>
                        </div>
                    </div>
                    <input type="hidden" name="payment_method_hidden" id="payment_method_hidden">
                    <input id="payment_method_nonce" name="payment_method_nonce" type="hidden" />
                    <input id="payment_method_nonce_update" name="payment_method_nonce_update" type="hidden" />
                    <div class="form_wrapper edit_form_wrapper">
                        <div class="flex_row">
                            <div class="flex_col_sm_12">
                                <div class="form_field purchase_page_main_field_custom_css">
                                    <div class="text-field flex_row purchase_page_custom_css">
                                        <div class="final_page_product_label">YOUR PRODUCT</div>
                                        <select class="selectpicker custom_select" name="product" id="product5" required data-dropup-auto="false" title="YOUR PRODUCT">
                                            <option value="" data-hidden="true">YOUR PRODUCT</option>
                                            <option value="1">ALKALINE + ELECTROLYTE</option>
                                            <option value="2">PURE + ELECTROLYTE</option>
                                        </select>
                                        <button type="button" class="edit btn_effect edit_product">Edit</button>
                                    </div>
                                    <span class="text-note product_note_final_page">YOUR PRODUCT</span>
                                </div>

                                <div class="form_field purchase_page_main_field_custom_css">
                                    <div class="text-field flex_row purchase_page_custom_css">
                                        <div class="final_page_package_label">YOUR WELLNESS SOLUTION</div>
                                        <select class="selectpicker custom_select final_page_package_select select_alka" name="package" id="package5" required data-dropup-auto="false" title="YOUR WELLNESS SOLUTION">
                                            <option data-hidden="true" selected>YOUR WELLNESS SOLUTION</option>
                                            <option value="1">1 WEEK WELLNESS $78 ( 3 KITS )</option>
                                            <option value="2">1 MONTH WELLNESS $250 ( 10 KITS )</option>
                                            <option value="3">2 MONTH WELLNESS $500 ( 20 KITS )</option>
                                        </select>

                                        <select class="selectpicker custom_select final_page_package_select select_pure d-none" name="package" id="package5" required data-dropup-auto="false" title="YOUR WELLNESS SOLUTION">
                                            <option data-hidden="true" selected>YOUR WELLNESS SOLUTION</option>
                                            <option value="1">1 WEEK WELLNESS $66 ( 3 KITS )</option>
                                            <option value="2">1 MONTH WELLNESS $220 ( 10 KITS )</option>
                                            <option value="3">2 MONTH WELLNESS $440 ( 20 KITS )</option>
                                        </select>


                                        <button type="button" class="edit btn_effect edit_package">Edit</button>
                                    </div>
                                    <span class="text-note package_note_final_page">EVERY SUNDAY FOR 1 MONTH
                                    </span>
                                    {{-- <span class="text-note">(1st DELIVERY 4 KITS, THEN 2 KITS THEREAFTER). </span> --}}
                                </div>

                                <div class="form_field purchase_page_main_field_custom_css">
                                    <div class="text-field flex_row purchase_page_custom_css">
                                        <div class="final_page_delivery_freq_label">DELIVERY FREQUENCY</div>
                                        <select class="selectpicker custom_select" title="DELIVERY FREQUENCY" name="delivery_frequency" id="delivery_frequency5" required data-dropup-auto="false">
                                            <option value="" data-hidden="true" title="{{ config('constants.package.delivery_freq_text') }}">
                                                {{ config('constants.package.delivery_freq_text') }}</option>
                                            <option value="1" selected>EVERY SUNDAY</option>
                                            <option value="2">EVERY MONDAY</option>
                                        </select>
                                        <button type="button" class="edit btn_effect edit_delivery_freq">Edit
                                        </button>
                                    </div>
                                    <span class="text-note delivery_note_final_page">EVERY SUNDAY FOR 1 MONTH
                                    </span>
                                    {{-- <span class="text-note">(1st DELIVERY 4 KITS, THEN 2 KITS THEREAFTER). </span> --}}
                                </div>


                                <div class="form_field purchase_page_main_field_custom_css">
                                    <div class="text-field purchase_page_custom_css">
                                        <div class="final_page_edit_address_label">DELIVERY ADDRESS</div>

                                        <div class="final_page_address_field">
                                            <div class="text-field">
                                                <input type="text" class="shipping_address_final_page" placeholder="DELIVERY ADDRESS 1" disabled>
                                            </div>

                                            <div class="text-field">
                                                <input type="text" class="shipping_address1_final_page" placeholder="UNIT # | SUITE # | APT" disabled>
                                            </div>

                                            <div class="row">
                                                <div class="text-field col">
                                                    <input type="text" class="s_city_final_page" placeholder="CITY" disabled>
                                                </div>
                                                <div class="form-group col">
                                                    <input type="text" class="s_state_final_page" placeholder="STATE">
                                                </div>
                                                <div class="form-group col">
                                                    <input type="text" class="s_zip_final_page" placeholder="ZIP">
                                                </div>
                                            </div>

                                        </div>
                                        <button type="button" class="edit btn_effect edit_address_final_page">EDIT</button>
                                    </div>
                                    <span class="text-note shipping_add_final_page"></span>
                                    <span class="text-note citi_state_zip_final_page"></span>
                                </div>

                                <div class="form_field purchase_page_main_field_custom_css">
                                    <div class="text-field flex_row purchase_page_custom_css">
                                        <div class="final_page_payment_source_label">PAYMENT SOURCE</div>
                                        <select class="selectpicker custom_select payment_method payment_method_finl_page_class" name="payment_method" id="payment_method" data-dropup-auto="false" title="SELECT PAYMENT METHOD">
                                            <option data-hidden="true">SELECT PAYMENT METHOD</option>
                                            <option value="1">CREDIT CARD</option>
                                            <option value="2">DEBIT CARD</option>
                                            <option value="3">VENMO</option>
                                            {{-- <option value="4">APPLY PAY</option> --}}
                                        </select>

                                        <div id="final_pay_card_deatil">
                                            <div class="bootstrap-basic card-div-final" id="bt-dropin-final" style="display: none;">
                                                <form class="needs-validation" id="form-hosted-final" novalidate>
                                                    <div class="row">
                                                        <div class="col-sm-12 mb-6">
                                                            <div class="form-control" id="cc-name-final"></div>
                                                            <div class="invalid-feedback">
                                                                Name on card is required
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-sm-12 mb-6">

                                                            <div class="form-control text-field " id="cc-number-final"></div>
                                                            <span id="card-brand-final"></span>

                                                            <div class="invalid-feedback">
                                                                Credit card number is required
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-6 mb-6">

                                                            <div class="form-control" id="cc-cvv-final"></div>
                                                            <div class="invalid-feedback">
                                                                Security code required
                                                            </div>
                                                        </div>
                                                        <div class="col-6 mb-6">

                                                            <div class="form-control" id="cc-expiration-final"></div>
                                                            <div class="invalid-feedback">
                                                                Expiration date required
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="text-center">
                                                        {{-- <button class="btn btn-primary btn-lg" type="submit">Pay with <span id="card-brand">Card</span></button> --}}
                                                    </div>

                                            </div>
                                        </div>

                                        <button type="button" class="edit btn_effect edit_pay_final_btn edit_payment_method_final_page">Edit
                                        </button>

                                        <button type="button" class="edit btn_effect save_payment_method_final_page" style="display: none; top:9%;">Save
                                        </button>
                                    </div>
                                    {{-- <span class="text-note">CARD ENDING IN <b><span class="last_4_digit_card"></span></b></span> --}}
                                    <span class="text-note payment_method_final_page" style="display: none;">Payment Method</span>
                                </div>

                                <div class="form_field purchase_page_main_field_custom_css">
                                    <div class="flex_row">
                                        <div class="col-6 text-left">
                                            <label class="form_label">TAX</label>
                                        </div>
                                        <div class="col-6 text-right">
                                            <input type="hidden" name="tax_amount" class="tax_amount">
                                            <p class="show_label tax_amount">1.00</p>
                                        </div>
                                    </div>
                                    <div class="flex_row">
                                        <div class="col-6 text-left">
                                            <label class="form_label">SERVICE FEE</label>
                                        </div>
                                        <div class="col-6 text-right">
                                            <p class="show_label service_fees">5.00</p>
                                        </div>
                                    </div>
                                    <div class="flex_row">
                                        <div class="col-6 text-left">
                                            <label class="form_label">DELIVERY FEE</label>
                                        </div>
                                        <div class="col-6 text-right">
                                            <p class="show_label delivery_fees">5.00</p>
                                        </div>
                                    </div>
                                    <div class="flex_row">
                                        <div class="col-6 text-left">
                                            <label class="form_label">TOTAL</label>
                                        </div>
                                        <div class="col-6 text-right">
                                            <input type="hidden" name="total_amount" class="total_amount">
                                            <p class="show_label total_amount">$266</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <input type="hidden" name="b_city_state_zip" class="b_city_state_zip" />
                        <input type="hidden" name="s_city_state_zip" class="s_city_state_zip" />

                        <div class="text-center">
                            <div class="form_field">
                                {{-- <button type="button" class="outline_btn m_r_20 show_step4_form">BACK</button> --}}
                                <button type="submit" class="primary_btn btn_effect btn_black purchase_button" style="width: auto;" data-disable-with="Purchasing...">
                                    PURCHASE
                                </button>

                                <div id="bt-dropin_venmo" style="display: none;">
                                    <button type="button" id="venmo-button" class="primary_btn btn_effect btn_black" style="width: auto;">
                                        <img style="border-radius: 20px;" src="{{ asset('images/venmo.png') }}" height="35px" width="35px">
                                        <b>PURCHASE</b>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="text-center recipt_note">
                            UPON PURCHASE YOU WILL RECEIVE A RECEIPT VIA TEXT & EMAIL
                        </div>

                    </div>

                </div>
                {{-- <footer class="text-center">
                    <div class="custom_container">
                        {{ date('Y') }} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
        </div>
        </footer> --}}
        @include('footer')
        </main>
        </div>
        <!-- Step 5 ends -->

        </main>
    </form>

    </div>

    <div class="final_form" style="display: none;">
        <main class="app_wrapper waterbg">
            <div class="custom_container">
                <div class="head_section">
                    <div class="brand">
                        <figure class="logo"><img src="{{ asset('images/logowater.png') }}" alt="Logo" />
                        </figure>
                        <span class="brand_txt">+ {{ $advocateData->adv_first_name }}
                            {{ $advocateData->adv_last_name }}</span>
                    </div>

                    <div class="tagline_wrap">
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
                        <img src="{{ asset('images/droplet.png') }}" />
                    </figure>

                </div>


            </div>
            {{-- <footer class="text-center">
                <div class="custom_container">
                    {{ date('Y') }} &copy ALL RIGHT RESERVED | WATR, LLC <br> PRIVACY + LEGAL
    </div>
    </footer> --}}
    @include('footer')
    </main>
    </div>

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
<script src="https://js.braintreegateway.com/web/dropin/1.33.2/js/dropin.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/link2.js') }}"></script>
<script src="{{ asset('js/show2.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="https://applepay.cdn-apple.com/jsapi/v1/apple-pay-sdk.js"></script>
<script src="https://js.braintreegateway.com/web/3.77.0/js/client.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.77.0/js/venmo.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.77.0/js/data-collector.min.js"></script>
<script src="{{ asset('js/venmo.js') }}"></script>
<script src="https://js.braintreegateway.com/web/3.85.5/js/client.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.85.3/js/apple-pay.min.js"></script>
<script src="{{ asset('js/applepay.js') }}"></script>
<script src='https://js.braintreegateway.com/web/3.85.5/js/hosted-fields.min.js'></script>
<script src="{{ asset('js/hosted-custom.js') }}"></script>
<script src="{{ asset('js/hosted-custom-updated.js') }}"></script>
<script src="{{ asset('js/jquery-input-mask-phone-number.js') }}"></script>

<script type="module">
    let autocomplete;
    let address1Field;
    let address2Field;
    let city;
    let state;
    let zip;

    let autocomplete2;
    let address1Field2;
    let address2Field2;
    let city2;
    let state2;
    let zip2;

    function initAutocomplete() {
        address1Field = document.querySelector("#billing_address");
        address2Field = document.querySelector("#billing_address2");
        city = document.querySelector("#b_city");
        state = document.querySelector("#b_state");
        zip = document.querySelector("#b_zip");
        
        address1Field2 = document.querySelector("#shipping_address");
        address2Field2 = document.querySelector("#shipping_address2");
        city2 = document.querySelector("#s_city");
        state2 = document.querySelector("#s_state");
        zip2 = document.querySelector("#s_zip");

        autocomplete = new google.maps.places.Autocomplete(address1Field);
        address1Field.focus();
        autocomplete.addListener("place_changed", fillInAddress);
        
        autocomplete2 = new google.maps.places.Autocomplete(address1Field2);
        address1Field2.focus();
        autocomplete2.addListener("place_changed", fillInAddress2);
    }

    function fillInAddress() {
        const place = autocomplete.getPlace();
        let street_number="";
        let route="";
        let locality="";
        let administrative_area_level_1="";
        let postal_code="";
        let postal_code_suffix="";

        for (const component of place.address_components) {
            const componentType = component.types[0];
            switch (componentType) {
                case "street_number": {
                street_number = component.long_name;
                    break;
                }
                case "route": {
                    route = component.long_name;
                    break;
                }
                case "locality":{
                    locality = component.long_name;
                    break;
                }
                case "administrative_area_level_1": {
                administrative_area_level_1 =component.long_name;
                    break;
                }
                case "postal_code": {
                postal_code = component.long_name;
                    break;
                }
                case "postal_code_suffix": {
                postal_code_suffix = component.long_name;
                    break;
                }
            }
        }
        address1Field.value = `${street_number}, ${route}`;
        city.value = locality;
        state.value = administrative_area_level_1;
        zip.value = `${postal_code}${postal_code_suffix}`;
        address2Field.focus();
    }
    
    function fillInAddress2() {
        const place = autocomplete2.getPlace();
        let street_number="";
        let route="";
        let locality="";
        let administrative_area_level_1="";
        let postal_code="";
        let postal_code_suffix="";

        for (const component of place.address_components) {
            const componentType = component.types[0];
            switch (componentType) {
                case "street_number": {
                street_number = component.long_name;
                    break;
                }
                case "route": {
                    route = component.long_name;
                    break;
                }
                case "locality":{
                    locality = component.long_name;
                    break;
                }
                case "administrative_area_level_1": {
                administrative_area_level_1 =component.long_name;
                    break;
                }
                case "postal_code": {
                postal_code = component.long_name;
                    break;
                }
                case "postal_code_suffix": {
                postal_code_suffix = component.long_name;
                    break;
                }
            }
        }
        
        address1Field2.value = `${street_number}, ${route}`;
        city2.value = locality;
        state2.value = administrative_area_level_1;
        zip2.value = `${postal_code}${postal_code_suffix}`;
        address2Field2.focus();
    }
    window.initAutocomplete = initAutocomplete;
    export {};
</script>

<script>
    $(document).ready(function() {
        // $('#yourphone').usPhoneFormat({
        //     format: '(xxx) xxx-xxxx',
        // });

        $('#mobile').usPhoneFormat();

        $("#delf_div").hide();

        $('#alakline_pure').change(function() {
            setTimeout(function() {
                $('button').removeClass('bs-placeholder');
            }, 500);
        });

        $('#package1').change(function() {
            setTimeout(function() {
                $('button').removeClass('bs-placeholder');
            }, 500);
        });

        $('select').change(function() {
            var data_array = {
                id: this.id
                , class: this.class
                , name: this.name
                , value: this.value
            };

            localStorage.setItem('data-value-' + this.id + '-' + this.name, JSON.stringify(data_array));
        });

        $('input').change(function() {
            var data_array = {
                id: this.id
                , class: this.class
                , name: this.name
                , value: this.value
            };

            console.log('data-value-' + this.id + '-' + this.name, JSON.stringify(data_array));
            localStorage.setItem('data-value-' + this.id + '-' + this.name, JSON.stringify(data_array));
        });

        for (var i = 0, len = localStorage.length; i < len; ++i) {
            var local_key = localStorage.key(i);
            var local_value = localStorage.getItem(local_key);
            if (local_key.startsWith('data-value-')) {
                console.log(local_key, JSON.parse(local_value));
                var data = JSON.parse(local_value);
                $('[id="' + data.id + '"][name="' + data.name + '"]').val(data.value);
                $('[id="' + data.id + '"][name="' + data.name + '"]').change();
            }
        }
    });

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

    .form-control {
        border: none !important;
        border-radius: 0px !important;
        border-bottom: 1px solid #000 !important;
        /* font-family: europaLight, sans-serif !important; */
        /* font-size: 14px !important; */
    }

    div.dropdown {
        border-bottom: 0px solid #000 !important;
    }

    .caret-symbol {
        background-image: url(https://cdn1.iconfinder.com/data/icons/arrows-vol-1-5/24/dropdown_arrow2-512.png);
        width: 15px;
        height: 15px;
        background-repeat: no-repeat;
        border: none !important;
        background-position: center;
    }

    .edit {
        /* top: 58% !important; */
    }

</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJdJoIH2Y7AbOZDZtbLKcciEtp8h3CwCA&callback=initAutocomplete&libraries=places&v=weekly" defer></script>

{{-- @if (!empty(session('response_success_msg',null))) --}}
@if (!empty(session('response_success_msg',null)))
<script>
    $(".final_form").show();

</script>
@php
request()->session()->forget('response_success_msg');
@endphp
@else
<script>
    $(".main_content").show();

</script>
@endif

<script>

</script>
