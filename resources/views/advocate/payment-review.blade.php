<script>
    localStorage.setItem('BRAINTREE_AUTH_KEY', '{{ env('BRAINTREE_AUTH_KEY', 'sandbox_7b22h9qq_9wcqdbyrsh4jphn6') }}');
    localStorage.setItem('VENMO_PROFILE_ID', '{{ env('VENMO_PROFILE_ID', '1953896702662410263') }}');
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
    <link rel='stylesheet' id='elementor-post-2046-css' href='/css/post-2046.css' media='all' />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" media='all' />
    {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}
</head>


<!-- <div class="loader" style="width:100%;height:100%; display:none">
    <img src="{{ asset('images/logowater.png') }}" />
</div> -->
<style>
    body,
    button,
    input,
    select,
    optgroup,
    textarea {
        /* font-family: Europa-Regular, sans-serif; */
        font-family: europa-light, sans-serif !important;
    }

    body {
        font-size: 14px;
        font-weight: 400;
        line-height: 1.5;
        color: #292b2c;
    }

    figcaption,
    figure,
    main {
        display: block;
    }

    .step-dimg1,
    .elementor .step-dimg1 {
        position: absolute;
        /* margin-top: -45px; */
        /* max-height: 140px; */
        max-height: 175px;
        right: 5%;
        max-width: 160px !important;
        top: -35px;
    }

    .invoice-payment {
        max-width: 1000px;
        margin: 0 auto;
        margin-top: 70px;
    }

    .invoice-payment-inner {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        /* flex-wrap: wrap; */
        align-items: center;
        justify-content: center;
        min-height: 85vh;
    }

    .invoice-payment-inner .card {
        border: 0px;
        background-color: transparent;
    }

    .form-logo {
        text-align: center;
        display: block;
        margin: 0 auto;
        /* z-index: 2; */
        position: relative;
        max-width: 70px !important;
        /* margin-top: -50px; */
        margin-bottom: 15px;
    }

    .form-logo-two,
    .elementor .form-logo-two {
        max-width: 300px;
        margin-bottom: 20px;
    }

    .invoice-payment-inner .fieldset_class {
        text-align: center;
        position: relative;
        margin-top: 20px;
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        /* width: 100%;
        max-width: 500px;*/
        /* width: 500px; */
        /* margin: 0 auto;*/
        padding-bottom: 20px;
        position: relative;
        min-height: 270px;
    }

    .form-card {
        text-align: left;
    }

    .preview_sec {
        font-size: 16px;
        color: #000;
        /* color: #584d4d; */
    }

    .invoice-payment-inner .preview_sec .form_field {
        margin-left: 0;
    }

    .invoice-payment-inner .form_field {
        margin: 10px;
        margin-bottom: 15px;
    }

    .preview_sec .form_field h3 {
        font-weight: 600;
        margin-bottom: 60px;
        color: #000;
    }

    .preview_sec .preview_adr {
        margin-bottom: 40px;
    }

    .invoice-payment-inner .preview_adr .form_field,
    .invoice-payment-inner .preview_del_date .form_field,
    .invoice-payment-inner .preview_innum .form_field {
        margin: 0;
    }

    .preview_sec .preview_del_date,
    .preview_innum {
        margin-bottom: 20px;
    }

    .preview_cart .p_detail thead tr {
        border-bottom: 1px solid #848484;
    }

    .preview_cart .p_detail thead tr th:first-child {
        padding-left: 0;
    }

    .preview_cart .p_detail thead tr th {
        padding: 3px 10px;
    }

    .preview_cart .p_detail th {
        color: #000;
        font-size: 16px;
    }

    .preview_cart .p_detail tbody tr {
        font-size: 16px;
        border-bottom: 1px solid #848484;
    }

    .preview_cart .p_detail tbody tr td:nth-child(2),
    .preview_cart .p_detail tbody tr td:nth-child(3) {
        text-align: center;
    }

    .preview_cart .p_detail tbody tr td:first-child {
        padding-left: 0;
        padding-right: 10px;
    }

    .preview_cart .p_detail tbody tr td:last-child {
        padding-right: 0;
        text-align: right;
    }

    .preview_cart .p_detail tbody tr td {
        padding: 3px 10px;
        font-size: 14px;
    }

    .preview_cart .p_sub_tot_div {
        width: 100%;
        display: flex;
        justify-content: end;
    }

    .preview_cart .p_sub_tot_div .p_total tr td:first-child {
        text-align: left;
        font-weight: 700px;
    }

    .preview_cart .p_sub_tot_div .p_total tr td:nth-child(2) {
        text-align: right;
        padding-right: 0;
        font-weight: 700;
    }

    .preview_cart .p_sub_tot_div .p_total td {
        padding: 0 15px;
    }

    .preview_sec .pre_deli_by {
        text-align: center;
        margin-bottom: 0px;
        margin-top: 70px;
    }

    .preview_sec .pre_deli_by img {
        max-width: 300px;
    }

    .container-fluid {
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }

    table {
        margin: 0 0 1.5em;
        width: 100%;
    }
</style>

<body class="body">

    <main id="primary" class="site-main">
        <div class="invoice-payment">
            <div class="invoice-payment-inner">


                <div class="container-fluid">
                    <img src="https://watrbar.io/wp-content/uploads/2022/07/droplet.png" class="step-dimg1">

                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-10 col-md-10 col-lg-9 col-xl-9 text-center p-0 mt-3 mb-2">
                            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                <div class="form-logo-sec" style="max-width: max-content; margin: 0 auto;">
                                    <a href="https://invoicing.drinkwatr.com/">
                                        <img src="https://watrbar.io/wp-content/uploads/2022/07/logo-latest.png"
                                            class="form-logo">
                                    </a>
                                </div>
                                <div>
                                    <img src="https://invoicing.drinkwatr.com/wp-content/uploads/2022/09/DRINK-WATR-_-STAY-STRONG®-2022.04.26.png"
                                        class="form-logo-two">
                                </div>
                                @php
                                    $deliveryObj = json_decode($invoiceDataObj->delivery_fee);
                                    $cityStateZip = json_decode($invoiceDataObj->b_city_state_zip);
                                @endphp

                                <div class="fieldset_class">
                                    <div class="form-card">
                                        <div class="preview_sec">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="preview_left">
                                                        <div class="form_field">
                                                            @if (!empty($invoiceStatus) && $invoiceStatus == 'paid')
                                                                <h3>PAID INVOICE</h3>
                                                            @else
                                                                <h3>INVOICE</h3>
                                                            @endif
                                                            <p>Delivery Set for<br>
                                                                <span
                                                                    id="f_delivery_date">{{ $deliveryObj->d_date }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-9">
                                                    <div class="preview_right">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-12">
                                                                <div class="preview_adr">
                                                                    <div class="form_field">
                                                                        ATTN: <span
                                                                            id="f_client_name">{{ $invoiceDataObj->odr_contact_name }}</span>
                                                                    </div>
                                                                    <div class="form_field">
                                                                        <span
                                                                            id="f_company_name">{{ $invoiceDataObj->odr_company_name }}</span>
                                                                        <!-- Company Name  -->
                                                                    </div>
                                                                    <div class="form_field">
                                                                        <span
                                                                            id="f_company_address">{{ $invoiceDataObj->billing_address }}
                                                                            @empty(!$invoiceDataObj->billing_address2)
                                                                                , {{ $invoiceDataObj->billing_address2 }}
                                                                            @endempty
                                                                        </span>
                                                                        <!-- Company Address -->
                                                                    </div>
                                                                    <div class="form_field">
                                                                        <span
                                                                            id="f_city">{{ $cityStateZip->city }}</span>
                                                                        <span
                                                                            id="f_state">{{ $cityStateZip->state }}</span>
                                                                        <span
                                                                            id="f_zip">{{ $cityStateZip->zip }}</span>
                                                                        <!-- City, State, Zip Code  -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-12">
                                                                <div class="preview_del_date">
                                                                    <div class="form_field">
                                                                        Date
                                                                        <span
                                                                            id="f_order_date">{{ $invoiceDataObj->created_at->format('m/d/Y') }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="preview_innum">
                                                                    <div class="form_field">
                                                                        <p style="margin-bottom:0;">DRINK WATR™ </p>
                                                                    </div>
                                                                    <div class="form_field">
                                                                        <p style="margin-bottom:0;">Invoice Number:
                                                                            {{ !empty($invoiceDataObj->invoicing_number)?$invoiceDataObj->invoicing_number:$invoiceDataObj->odr_id }}</p>
                                                                    </div>

                                                                    @if (!empty($invoiceStatus) && $invoiceStatus == 'paid')
                                                                        <div class="form_field">
                                                                            <p>Transaction ID:
                                                                                {{ $invoiceDataObj->odr_transaction_id ?? '' }}
                                                                            </p>

                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="preview_cart">
                                                        <table class="p_detail">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">PRODUCTS</th>
                                                                    <th scope="col">QUANTITY</th>
                                                                    <th scope="col">Total</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($products as $product)
                                                                    <tr class="row1">
                                                                        <td>{{ config('constants.product_name.' . $product->product_name) }}
                                                                        </td>
                                                                        <td>{{ $product->kits }}</td>
                                                                        <td>${{ str_replace('$','',$product->price)*$product->kits*12 }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr class="lastrow">
                                                                    <td>
                                                                        DELIVERY FEE
                                                                        @if ($deliveryObj->type == 1)
                                                                            (COMPLIMENTARY)
                                                                        @endif
                                                                    </td>
                                                                    <td></td>
                                                                    <td>{{ $deliveryObj->fee }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="p_sub_tot_div">
                                                            <div class="p_sub_totl">
                                                                <table class="p_total">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Service Fee</td>
                                                                            <td class="servicefee">
                                                                                ${{ $invoiceDataObj->odr_service_fee }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Subtotal</td>
                                                                            <td class="subtotal">
                                                                                ${{ $invoiceDataObj->odr_subtotal_amount }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td class="totalprice">
                                                                                ${{ $invoiceDataObj->odr_total_amount }}
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        @if (!(!empty($invoiceStatus) && $invoiceStatus == 'paid'))
                                                            <form id="basic-form" method="POST">
                                                                @csrf
                                                                <div class="form_field">
                                                                    <button type="submit"
                                                                        class="primary_btn btn_effect btn_black purchase_button"
                                                                        style="width: auto; width: auto;padding-left: 50px;padding-right: 50px;"
                                                                        data-disable-with="Purchasing...">PAY</button>
                                                                </div>
                                                            </form>
                                                        @else
                                                            {{-- <div class="form_field">
                                                            <button
                                                                class="primary_btn btn_effect btn_black purchase_button"
                                                                style="width: auto; width: auto;padding-left: 50px;padding-right: 50px; border-radius: 10px; background: #02771d;"
                                                                data-disable-with="Purchasing...">PAID</button>
                                                        </div> --}}
                                                        @endif
                                                    </div>
                                                    <div class="pre_deli_by" style="text-align:center;">
                                                        <p>DELIVERED BY</p>
                                                        <div class="drop_img">
                                                            <img
                                                                src="https://invoicing.drinkwatr.com/wp-content/uploads/2022/10/droplet_wellness.png">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </main>
    <style>
        .close-button {
            top: auto !important;
            right: auto !important;
            bottom: 30px !important;
            width: 100% !important;
            text-align: center !important;
        }

        .new-popup-style {
            border-radius: 25px;
            border-width: 1px;
            background: #f3f3f3;
            height: 160px;
            border-color: red !important;
        }
    </style>

    <div class="new-popup-style" id="paymentValidationPopup">
        <a href="#" class="close-button" onclick="paymentValidationOff()"><img
                src="https://drinkwatr.com/wp-content/uploads/2022/02/close.png" style="max-width: 20px;"></a>
        <div style="margin: 15px; margin-top: 30px; font-size: 17px;" class="text-center">
            Payment unsuccessful. Please use an alternative payment source. Thank you for your business. STAY STRONG.
        </div>
    </div>
    <script>
        function paymentValidationOn() {
            document.getElementById("paymentValidationPopup").style.opacity = "1";
            document.getElementById("paymentValidationPopup").style.zIndex = "9999999999999";
        }

        function paymentValidationOff() {
            document.getElementById("paymentValidationPopup").style.opacity = "0";
            document.getElementById("paymentValidationPopup").style.zIndex = "-100";
        }

        paymentValidationOff();
    </script>
</body>

<!-- </html> -->
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

@if (!empty(session('response_error_msg', null)))
    <script>
        paymentValidationOn();
    </script>

    @php
        request()
            ->session()
            ->forget('response_error_msg');
    @endphp
@endif

@if (!empty(session('response_success_msg', null)))
    <script>
        $(".final_form").show();
    </script>
    @php
        request()
            ->session()
            ->forget('response_success_msg');
    @endphp
@else
    <script>
        $(".main_content").show();
    </script>
@endif

</html>
