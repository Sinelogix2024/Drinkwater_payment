<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRINK WATR</title>
    <link rel="shortcut icon" href="{{url('images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

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

        input {
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

    </style>
</head>
<body>

    <main class="app_wrapper waterbg">
        <div class="custom_container">


            <div class="head_section">
                <div class="brand">
                    <figure class="logo"><img src="{{url('images/logowater.png')}}" alt="Logo" style="height: 150px;" /></figure>
                    {{-- <figure class="logo"><img src="{{asset('images/logowater.png')}}" alt="Logo" /></figure> --}}
                    <span class="brand_txt">+ {{$advocateData->adv_first_name ?? ''}} {{$advocateData->adv_last_name ?? ''}}</span>
                </div>

                <div class="tagline_wrap">
                    <p>YOUR PATH TO DAILY HYDRATION + WELLNESS</p>
                </div>
            </div>


            <div class="form_wrapper edit_form_wrapper">
                <div class="flex_row">
                    <div class="flex_col_sm_12">
                        <div class="form_field">
                            <div class="text-field">
                                <input type="text" value="YOUR WELLNESS SOLUTION" readonly>
                            </div>
                            <span class="package_note_final_page"> {{config('constants.package_name')[$orderDetail->odr_package_id ?? '']  ?? ''}}</span>

                        </div>
                        <div class="form_field">
                            <div class="text-field">
                                <input type="text" value="DELIVERY FREQENCY" readonly>
                            </div>
                            <span class="delivery_note_final_page">{{config('constants.delivery_freq')[$orderDetail->odr_delivery_frequency_id ?? '']  ?? ''}}</span>
                            <span class="text-note">(1st DELIVERY 4 KITS, THEN 2 KITS THEREAFTER). </span>
                        </div>


                        <div class="form_field">
                            <div class="text-field">
                                <input type="text" value="DELIVERY ADDRESS" readonly>
                            </div>
                            <span class="text-note">{{$orderDetail->shipping_address ?? '' }} {{$orderDetail->shipping_address2 ?? ''}}</span>
                            <span class="text-note">{{$orderDetail->s_city_state_zip ?? ''}}</span>
                        </div>


                        <div class="form_field">
                            <div class="flex_row row">
                                <div class="flex_col_sm_6 text-left">
                                    <label class="form_label">TAX</label>
                                </div>
                                <div class="col"></div>
                                <div class="flex_col_sm_6 text-right">
                                    <p class="show_label">${{$orderDetail->odr_tax_amount ?? ''}}</p>
                                </div>
                            </div>
                            <div class="flex_row row">
                                <div class="flex_col_sm_6 text-left">
                                    <label class="form_label">SERVICE FEE</label>
                                </div>
                                <div class="col"></div>
                                <div class="flex_col_sm_6 text-right">
                                    <p class="show_label">$5.00</p>
                                </div>
                            </div>
                            <div class="flex_row row">
                                <div class="flex_col_sm_6 text-left">
                                    <label class="form_label">DELIVERY FEE</label>
                                </div>
                                <div class="col"></div>
                                <div class="flex_col_sm_6 text-right">
                                    <p class="show_label">$5.00</p>
                                </div>
                            </div>
                            <div class="flex_row row">
                                <div class="flex_col_sm_6 text-left">
                                    <label class="form_label">TOTAL</label>
                                </div>
                                <div class="col"></div>
                                <div class="flex_col_sm_6 text-right">
                                    <p class="show_label">${{$orderDetail->odr_transaction_amount ?? ''}}</p>
                                </div>
                            </div>
                            <p class="text-center">PURCHASE RECEIPT | TRANSACTION ID: {{$orderDetail->odr_transaction_id ?? ''}}</p>
                        </div>

                        <div class="form_field">
                            <p class="support_note sm_12">
                                CONTRATUALATIONS ON SECURING YOUR PATH TO WELLNESS. FOR ANY SUPPORT RELATED INQUIRIES, PLEASE EMAIL US AT <a href="mailto:clarity@drinkwatr.com" target="_blank">CLARITY@DRINKWATR.COM</a>.

                            </p>
                        </div>

                        <figure class="droplet_logowrap text-center">
                            <span>ALL PRODUCTS ARE DELIVERED BY</span>
                            <img src="{{url('images/droplet.png')}}">
                        </figure>


                    </div>
                </div>


            </div>



        </div>
        @include('footer')
    </main>
</body>
</html>
