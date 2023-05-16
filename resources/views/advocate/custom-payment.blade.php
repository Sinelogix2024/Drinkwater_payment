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
            /* min-height: 400px; */
        }
    </style>
</head>


<div class="loader" style="width:100%;height:100%; display:none">
    <img src="{{ asset('images/logowater.png') }}" />
</div>

{{-- {{ dd($invoiceDataObj->toArray()) }} --}}

<body class="body">
    <form id="basic-form" method="POST" action="">
        @method('PUT')
        {{-- {{ method_field('PUT') }} --}}
        @csrf
        <input type="hidden" class="current_tab" id="current_tab" value="invocing-payment">
        <main class="app_wrapper  main_content" style="display: ;">
            <!-- step 3 start Payment Type Selection -->
            <div class="step3_form" style="display: ;">

                <main class="app_wrapper waterbg">

                    <div class="custom_container">
                        <div class="head_section">

                            <div class="brand">
                                @include('droplet-name')
                            </div>


                            <div class="tagline_wrap">
                                <p>Your Path to daily hydration + wellness</p>
                            </div>

                            <div class="row">
                                <div class="col"><b style="font-family: 'europa';">INVOICE #</b>:
                                    {{ !empty($invoiceDataObj->invoicing_number)?$invoiceDataObj->invoicing_number:$invoiceDataObj->odr_id }}</div>
                                <div class="col"><b style="font-family: 'europa';">Total Amount Due:</b>
                                    ${{ $invoiceDataObj->odr_total_amount }}
                                </div>
                            </div>
                        </div>

                        {{-- <input type="hidden" class="client_token" value="{{ $client_token }}"> --}}


                        <div class="form_wrapper">
                            <div class="col-md-12">
                                <div class="form_field text-center">
                                    <div class="text-field custom_select">
                                        <select class="selectpicker payment_method" name="payment_method"
                                            id="payment_method" data-dropup-auto="false" title="SELECT PAYMENT METHOD">
                                            <option data-hidden="true" selected="selected">SELECT PAYMENT METHOD
                                            </option>
                                            <option value="1">CREDIT CARD</option>
                                            <option value="2">DEBIT CARD</option>
                                            <option value="3">VENMO </option>
                                            {{-- <option value="4">APPLY PAY </option> --}}
                                            <option value="5">ACH PAYMENT </option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="bootstrap-basic us-account-div" id="bt-us-account-div" style="display: none;">
                                <form class="needs-validation" novalidate id="card_detail_form">
                                    <div class="row">
                                        <div class="col-sm-12 mb-6">

                                            <div class="form_field">
                                                <div class="text-field">
                                                    <input type="text" value="" name="account_number" id="account_number"
                                                        placeholder="Bank Account Number">
                                                </div>
                                            </div>

                                            <div class="invalid-feedback">
                                                Bank Account number is required
                                            </div>
                                        </div>

                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-sm-12 mb-6">
                                            <div class="form_field">
                                                <div class="text-field">
                                                    <input type="text" value="" name="routing_number" id="routing_number"
                                                        placeholder="Routing Number">
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                Routing number is required
                                            </div>
                                        </div>

                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-sm-6 mb-6">
                                            <div class="form_field">
                                            <div class="text-field">
                                                <select class="selectpicker form-control" name="account_type"
                                                    id="account-type" required dfata-dropup-auto="false"
                                                    title="Account Type">

                                                    <option data-hidden="true" selected="selected">
                                                        Account Type
                                                    </option>
                                                    <option value="savings">Savings</option>
                                                    <option value="checking">Checking</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                Account Type
                                            </div>
                                        </div>


                                        <div class="col-sm-6 mb-6">
                                            <div class="form_field">
                                            <div class="text-field">
                                                <select class="selectpicker form-control" name="ownership_type"
                                                    id="ownership-type" required data-dropup-auto="false"
                                                    title="Ownership Type">

                                                    <option data-hidden="true" selected="selected">
                                                    Ownership Type
                                                    </option>
                                                    <option value="business">Business</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                Ownership type is required
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                    <input type="checkbox" required name="mandate_text" id="mandate_text" value=" I authorize Braintree, a service of PayPal, on behalf of DRINK WATR (i) to verify my bank account information using bank information and consumer reports and (ii) to debit my bank account.">
                                     I authorize Braintree, a service of PayPal, on behalf of DRINK WATR (i) to verify my bank account information using bank information and consumer reports and (ii) to debit my bank account.
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
                                    </form>
                                </div>
                                <div id="bt-dropin_applepay" style="display: none;">
                                    <apple-pay-button buttonstyle="black" type="buy" locale="el-GR"
                                        style="display: block;"></apple-pay-button>
                                </div>
                            </div>
                            <input type="hidden" name="payment_method_nonce_update" id="payment_method_nonce_update"
                                class="payment_method_nonce_update">
                            <input type="hidden" name="payment_method_nonce" id="payment_method_nonce"
                                class="payment_method_nonce">
                            <input type="hidden" name="invoice_id" value="{{ $invoiceDataObj->id }}">
                            <input type="hidden" name="odr_id" value="{{ $invoiceDataObj->odr_id }}">
                            <input type="hidden" name="odr_total_amount"
                                value="{{ $invoiceDataObj->odr_total_amount }}">

                                @php
                                    $deliveryObj = json_decode($invoiceDataObj->delivery_fee);
                                    $cityStateZip = json_decode($invoiceDataObj->b_city_state_zip);
                                  $region = isset($cityStateZip->region) ? $cityStateZip->region : 'US';

                                @endphp

                                <input type="hidden" id="businessName" name="businessName" value="{{ $invoiceDataObj->odr_company_name }}">
                                {{-- <input type="text" id="extendedAddress" name="extendedAddress"> --}}
                                <input type="hidden" id="email" name="email" value="{{ $invoiceDataObj->odr_email }}">
                                <input type="hidden" id="mobile" name="mobile" value="{{$invoiceDataObj->odr_mobile}}">
                                <input type="hidden" id="billing_address" name="billing_address" value="{{ $invoiceDataObj->billing_address }}">
                                <input type="hidden" id="b_city" name="b_city" value="{{ $cityStateZip->city }}">
                                <input type="hidden" id="b_state_region" name="b_state_region" value="{{$region}}">
                                <input type="hidden" id="b_zip" name="b_zip" value="{{ $cityStateZip->zip }}">



                            <div class="dots_wrapper">
                                <button type="submit" class="primary_btn invoice_purchase_button"
                                    onclick="$('#payment_method_nonce').val('')">PAY</button>

                                    <div id="bt-ach_account" style="display:none;">


                                        <button type="button" onClick="AchPayClicked()" class="primary_btn btn_effect btn_black ach_button"
                                        style="width: auto;" data-disable-with="Purchasing...">Ach Pay </button>


                                    </div>

                                <div id="bt-dropin_venmo" style="display: none;">
                                    <button type="button" id="venmo-button" class="primary_btn btn_effect btn_black"
                                        style="width: auto;">
                                        <img style="height:25px; border-radius: 20px;"
                                            src="{{ asset('images/venmo.png') }}">
                                        <span>PAY</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('footer')
                </main>
            </div>
            <!-- step 3 ends Payment Type Selection -->
        </main>
    </form>

    </div>

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
        <div style="margin: 15px; margin-top: 30px; font-size: 17px;" class="text-center">Please enter valid payment
            details.</div>
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
<script src="https://js.braintreegateway.com/web/3.85.5/js/apple-pay.min.js"></script>
<script src="{{ asset('js/applepay.js') }}"></script>
<script src='https://js.braintreegateway.com/web/3.85.5/js/hosted-fields.min.js'></script>
<script src="{{ asset('js/hosted-custom.js') }}"></script>
<script src="{{ asset('js/hosted-custom-updated.js') }}"></script>

<script src="https://js.braintreegateway.com/web/3.85.5/js/us-bank-account.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.85.5/js/data-collector.min.js"></script>
<script>
    $(document).ready(function() {});
</script>


<script>
    function AchPayClicked(){

 var checked = $('#mandate_text').is(":checked");
 if (checked == false) {
  alert('please check mandatory text checkbox');
return false;

    }
//alert(localStorage.getItem('BRAINTREE_AUTH_KEY'));
braintree.client.create({
 // authorization: localStorage.getItem('BRAINTREE_AUTH_KEY'),
 authorization : localStorage.getItem('BRAINTREE_AUTH_KEY'),
}, function (clientErr, clientInstance) {
  if (clientErr) {
    console.error('There was an error creating the Client.');
    throw clientErr;
  }

console.log('clientInstance: ' +clientInstance);
  braintree.usBankAccount.create({
  client: clientInstance
}, function (usBankAccountErr, usBankAccountInstance) {

//     var bankDetails = {
//         businessName : $('#businessName').val(),
//       email: $('#email').val(),
//       phone: $('#mobile').val(),

//     accountNumber: $('#account_number').val(),
//     routingNumber: $('#routing_number').val(),
//     accountType: $('#account-type').val(),
//     ownershipType: $('#ownership-type').val(),


//     billingAddress: {
//       streetAddress: $('#billing_address').val(),
//       extendedAddress: '7',
//       locality: $('#b_city').val(),
//       region: $('#b_state_region').val(),
//        postalCode: $('#b_zip').val()

//     }
//   };


var bankDetails = {

     "firstName":$('#businessName').val(),
     "lastName":$('#businessName').val(),

    businessName : $('#businessName').val(),
      email: $('#email').val(),
      phone: $('#mobile').val(),
    accountNumber: $('#account_number').val(),
    routingNumber: $('#routing_number').val(),
   accountType: $('#account-type').val(),
   ownershipType: $('#ownership-type').val(),


    billingAddress: {
      streetAddress: $('#billing_address').val(),
      extendedAddress: '',
      locality: $('#b_city').val(),
      region: $('#b_state_region').val(),
       postalCode: $('#b_zip').val()
    }


};

console.log('bankdetails:'+JSON.stringify(bankDetails));
console.log('bank instance :'+ JSON.stringify(usBankAccountInstance));

usBankAccountInstance.tokenize(
  {
    bankDetails: bankDetails,
    mandateText: $('#mandate_text').val(),

  },
  function (tokenizeErr, tokenizedPayload) {
    console.log('test start '+JSON.stringify(tokenizedPayload));
    if (tokenizeErr) {
      console.error('There was an error tokenizing the bank details.');
      console.error('Timestamp: '+ Date.now());
      throw tokenizeErr;
    }

    console.log('ach nonce: '+tokenizedPayload.nonce)
    $('#payment_method_nonce').val(tokenizedPayload.nonce);
    $('#payment_method_nonce_update').val(tokenizedPayload.nonce);
    // Submit tokenizedPayload.nonce to your server as you would
    // other payment method nonces.
  });


  braintree.dataCollector.create({
        client: clientInstance,
        paypal: true
    }, function(dataCollectorErr, dataCollectorInstance) {
        if (dataCollectorErr) {
            // Handle error in creation of data collector.
            console.log(dataCollectorErr);
            return;
        }

        console.log('dataCollectorInstance:', dataCollectorInstance);
        console.log('Got device data:', dataCollectorInstance.deviceData);
        var devicedata = dataCollectorInstance.deviceData;
        const obj = JSON.parse(devicedata);
        $('#deviceData').val(obj.correlation_id);
    });

    window.setTimeout("redirect()", 2000);

 });





});


}

function redirect() {
   // document.cartCheckout.submit();
   console.log('submit');
   document.querySelector('#basic-form').submit();
}
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
        alert("{{ session('response_error_msg') }}");
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

<script></script>
