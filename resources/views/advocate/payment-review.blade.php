@if (!empty(session('response_error_msg',null)))
<script>
    // alert("{{ session('response_error_msg') }}");

</script>

@php
request()->session()->forget('response_error_msg');
@endphp
@endif

<script>
    localStorage.setItem('BRAINTREE_AUTH_KEY', '{{ env("BRAINTREE_AUTH_KEY","sandbox_7b22h9qq_9wcqdbyrsh4jphn6") }}');
    localStorage.setItem('VENMO_PROFILE_ID', '{{ env("VENMO_PROFILE_ID","1953896702662410263") }}');

</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STAY STRONG®</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}" />
    <input type="hidden" value="{{ url('/') }}" class="base_url">
    {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}

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

        .form_wrapper {
            min-height: 400px;
        }

    </style>
</head>


<div class="loader" style="width:100%;height:100%; display:none">
    <img src="{{ asset('images/logowater.png') }}" />
</div>

<body class="body">
    <form id="basic-form" method="POST">
        @csrf
        <main class="app_wrapper  main_content" style="">
            <!-- Step 5 starts -->
            <div class="step5_form" style="">
                <main class="app_wrapper waterbg">
                    <div class="custom_container">

                        <div class="head_section">
                            <div class="brand">
                                @include('droplet-name')
                            </div>

                            <div class="tagline_wrap">
                                <p style="margin-top: 0 !important;">Your Path to daily hydration + wellness</p>
                            </div>
                        </div>
                        <div class="form_wrapper edit_form_wrapper">
                            <div class="flex_row">
                                <div class="flex_col_sm_12">
                                    <div class="form_field purchase_page_main_field_custom_css">
                                        <div class="text-field flex_row purchase_page_custom_css">
                                            <div class="final_page_product_label">YOUR PRODUCT</div>
                                        </div>
                                        @foreach ($products as $product)
                                        <span class="text-note product_note_final_page">{{ config('constants.product_name.'.$product->product_name) }}</span>
                                        @endforeach
                                    </div>

                                    <div class="form_field purchase_page_main_field_custom_css">
                                        <div class="text-field flex_row purchase_page_custom_css">
                                            <div class="final_page_package_label">KITS</div>
                                        </div>
                                        @foreach ($products as $product)
                                        <span class="text-note product_note_final_page">{{ $product->kits }} ({{ config('constants.product_name.'.$product->product_name) }})</span>
                                        @endforeach
                                    </div>

                                    <div class="form_field purchase_page_main_field_custom_css">
                                        <div class="text-field flex_row purchase_page_custom_css">
                                            <div class="final_page_delivery_freq_label">DELIVERY DATE</div>
                                        </div>
                                        <span class="text-note delivery_note_final_page">EVERY SUNDAY FOR 1 MONTH
                                        </span>
                                    </div>


                                    <div class="form_field purchase_page_main_field_custom_css">
                                        <div class="text-field purchase_page_custom_css">
                                            <div class="final_page_edit_address_label">DELIVERY ADDRESS</div>
                                        </div>
                                        <span class="text-note shipping_add_final_page">{{ $invoiceDataObj->billing_address }} {{ $invoiceDataObj->billing_address2 }}</span>
                                        <span class="text-note citi_state_zip_final_page">{{ json_decode($invoiceDataObj->b_city_state_zip)->city.', '.json_decode($invoiceDataObj->b_city_state_zip)->state.', '.json_decode($invoiceDataObj->b_city_state_zip)->zip }}</span>
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
                                    <button type="submit" class="primary_btn btn_effect btn_black purchase_button" style="width: auto;" data-disable-with="Purchasing...">PAY</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    @include('footer')
                </main>
            </div>
        </main>
    </form>

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
{{-- <script src="{{ asset('js/main.js') }}"></script> --}}
{{-- <script src="{{ asset('js/link2.js') }}"></script> --}}
<script src="{{ asset('js/show2.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script>
    $(document).ready(function() {});

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
