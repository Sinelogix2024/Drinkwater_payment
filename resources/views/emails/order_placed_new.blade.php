<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STAY STRONG</title>
    <link rel="shortcut icon" href="{{url('images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">

    <input type="hidden" value="{{url('/')}}" class="base_url">

    <style>
        .app_wrapper.waterbg {
            background-image: url(../images/bg_img.jpg);
            background-repeat: no-repeat;
            background-position: center;
        }

        .app_wrapper {
            position: relative;
            min-height: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 0 65px 0;
        }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }

        .custom_container {
            max-width: 73.125rem;
            padding-left: 15px;
            padding-right: 15px;
            margin: 0 auto;
        }

        .row {
            margin-left: 0;
            margin-right: 0;
        }

        .sub-title {
            color: black;
            Background: transparent;
            padding: 12px 4px;
            font-size: 14px;
            border-radius: 0;
            width: 100%;
            -webkit-appearance: none;
            border: 0;
            border-bottom: 1px solid #000;
            margin: 0;
            font-family: inherit;
            line-height: inherit;
        }

        .form_field {
            margin-bottom: 15px;
        }

        .flex_col_sm_12 {
            width: 100%;
        }

        .head_section {
            text-align: center;
            padding: 46px 0;
            text-transform: uppercase;
        }

        .form_wrapper.edit_form_wrapper {
            max-width: 450px;
            margin: 0 auto;
        }

        .head_section .brand {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        figure {
            margin: 0 0 1rem;
        }

        .head_section .brand .brand_txt {
            font-size: 55px;
            margin-left: 10px;
        }

        .text-note {
            display: block;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .support_note {
            font-size: 16px !important;
            text-align: center;
            line-height: 1.7;
        }

        .sm_12 {
            max-width: 387px;
            margin: 0 auto;
            font-size: 16px !important;
        }


        .droplet_logowrap {
            margin: 45px 0;
        }

        .droplet_logowrap span {
            display: block;
            font-size: 19px;
            margin: 0 0 13px;
        }

        .droplet_logowrap img {
            width: 210px;
        }

        footer {
            text-align: center !important;
        }

        figure img {
            height: 150px !important;
        }

    </style>
</head>
<body style="background-color: #fff">
    <main class="app_wrapper waterbg">
        <div class="custom_container">
            <div class="form_wrapper edit_form_wrapper">
                <div class="flex_row">
                    <div class="head_section">
                        <div class="tagline_wrap">
                            @php
                            request()->request->add(['detail_access_token'=>$orderDetail->odr_adv_detail_access_token]);

                            @endphp
                            @include('droplet-name')
                        </div>

                        <div class="tagline_wrap">
                            <p><img src="/images/drink_wartr_stay_strong_txt.png" style="max-width: 20rem;" alt="DRINK WATR STAY STRONG"></p>
                            {{-- <p style="color: black;">YOUR PATH TO DAILY HYDRATION + WELLNESS</p> --}}
                        </div>
                    </div>
                    <div class="flex_col_sm_12">
                        <p style="color: black;" class="text-center">PURCHASE RECEIPT | TRANSACTION ID: {{$orderDetail->odr_transaction_id ?? ''}}</p>

                        <div class="form_field">
                            <div class="text-field">
                                <div class="sub-title">YOUR PRODUCT</div>
                            </div>
                            <span style="color:black;" class="package_note_final_page"> {{config('constants.product_name')[$orderDetail->odr_product_id ?? '']  ?? ''}}</span>
                        </div>
                        <div class="form_field">
                            <div class="text-field">
                                <div class="sub-title">YOUR WELLNESS</div>
                            </div>
                            <span style="color:black;" class="package_note_final_page"> {{config('constants.package_name')[ ($orderDetail->odr_product_id) ?? 0][$orderDetail->odr_package_id ?? '']  ?? ''}}</span>
                        </div>
                        <div class="form_field">
                            <div class="text-field">
                                <div class="sub-title">DELIVERY FREQENCY</div>
                            </div>
                            <span style="color:black;" class="delivery_note_final_page">{{config('constants.delivery_freq')[$orderDetail->odr_delivery_frequency_id ?? '']  ?? ''}}</span>
                            {{-- <span style="color:black;" class="text-note">(1st DELIVERY 4 KITS, THEN 2 KITS THEREAFTER). </span> --}}
                        </div>
                        <div class="form_field">
                            <div class="text-field">
                                <div class="sub-title">DELIVERY ADDRESS</div>
                            </div>
                            <span style="color:black;" class="text-note">{{$orderDetail->shipping_address ?? '' }} {{$orderDetail->shipping_address2 ?? ''}}</span>
                            <span style="color:black;" class="text-note">{{$orderDetail->s_city_state_zip ?? ''}}</span>
                        </div>

                        <table class="" width="100%">
                            <tr class="">
                                <td style="color: black; text-align:left !important">TAX</td>
                                <td style="color: black; text-align:right !important">${{$orderDetail->odr_tax_amount ?? ''}}</td>
                            </tr>
                            <tr class="">
                                <td style="color: black; text-align:left !important">SERVICE FEE</td>
                                <td style="color: black; text-align:right !important">$5.00</td>
                            </tr>
                            <tr class="">
                                <td style="color: black; text-align:left !important">DELIVERY FEE</td>
                                <td style="color: black; text-align:right !important">$5.00</td>
                            </tr>
                            <tr class="">
                                <td style="color: black; text-align:left !important">TOTAL</td>
                                <td style="color: black; text-align:right !important">${{$orderDetail->odr_transaction_amount ?? ''}}</td>
                            </tr>
                        </table>

                        <div class="form_field">
                            <p style="color: black; margin-top: 20px" class="support_note sm_12">
                                CONTRATUALATIONS ON SECURING YOUR PATH TO WELLNESS. FOR ANY SUPPORT RELATED INQUIRIES, PLEASE EMAIL US AT <a href="mailto:clarity@drinkwatr.com" target="_blank">CLARITY@DRINKWATR.COM</a>.

                            </p>
                        </div>

                        <figure class="head_section">
                            <div><span class="tagline_wrap" style="color:black;">ALL PRODUCTS ARE DELIVERED BY</span></div>
                            <img class="tagline_wrap" style="width: 200px; height: auto !important;" src="{{url('images/droplet.png')}}">
                        </figure>


                    </div>
                </div>


            </div>



        </div>
        @include('footer')
    </main>
</body>
</html>
