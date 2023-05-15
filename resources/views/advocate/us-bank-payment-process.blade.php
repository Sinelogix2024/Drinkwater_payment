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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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



    <table class="table table-striped">
        <thead>
        <tr>
            <th>Company Name</th>
            <th>Email</th>
            <th>Product - Qnty - Price</th>

            <th>Address</th>
            <th>Order Total</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
            @foreach ($data as $row)
            <tr>
                <td>{{$row->odr_company_name}}</td>
                <td>{{$row->odr_email}}</td>

                    @php
                    $products= [];
                    $city_state_zip = '';
                        $allProducts = json_decode($row->odr_product, true);
                        foreach ($allProducts as $key => $value) {
                         $products[] = json_decode($value);
                        }
                        $city_state_zip = json_decode($row->b_city_state_zip);
                    @endphp
                <td>
                    @foreach ($products as $product)

                        {{ config('constants.product_name.' . $product->product_name) }}
                        {{ $product->kits }}
                        ${{ str_replace('$','',$product->price)*$product->kits*12 }}
                        <br/>
                    @endforeach
                </td>



                <td>{{$row->billing_address }} {{$row->billing_address2}} {{$city_state_zip->city}} {{$city_state_zip->state}} {{$city_state_zip->region}} {{$city_state_zip->zip}}</td>
                <td>{{$row->odr_total_amount}}</td>
                <td>
                    <button class="btn btn-primary" id="pay{{$row->id}}" onClick="AchPayClicked({{$row}})">Process Payment</button>
                    <button class="btn btn-primary" style="display: none" id="settlement{{$row->id}}" >Paid for settlement</button>
                </td>

                </tr>
            @endforeach

        </tbody>


    </table>

    <input type="hidden" id="payment_method_nonce" name="payment_method_nonce">
    <input type="hidden" id="deviceData" name="deviceData">

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
    function AchPayClicked(data){
        var city_state = '';
      city_state =   JSON.parse(data['b_city_state_zip']);
braintree.client.create({
 // authorization: localStorage.getItem('BRAINTREE_AUTH_KEY'),
 authorization : localStorage.getItem('BRAINTREE_AUTH_KEY'),
}, function (clientErr, clientInstance) {
  if (clientErr) {
    console.error('There was an error creating the Client.');
    throw clientErr;
  }

//console.log(clientInstance);
  braintree.usBankAccount.create({
  client: clientInstance
}, function (usBankAccountErr, usBankAccountInstance) {

    var bankDetails = {
        businessName : data['odr_company_name'],
      email: data['odr_email'],
      phone: data['odr_mobile'],

    accountNumber: data['last_order']['account_number'],
    routingNumber: data['last_order']['routing_number'],
    accountType: data['last_order']['account_type'],
    ownershipType: data['last_order']['ownership_type'],

    billingAddress: {
      streetAddress: data['billing_address'],
      extendedAddress: data['billing_address2'],
      locality: city_state.city,
      region: city_state.region,
       postalCode: city_state.zip

    }
  };


console.log('bankdetails:'+JSON.stringify(bankDetails));
console.log('bank instance :'+ JSON.stringify(usBankAccountInstance));

usBankAccountInstance.tokenize(
  {
    bankDetails: bankDetails,
    mandateText: 'I authorize Braintree, a service of PayPal, on behalf of DRINK WATR (i) to verify my bank account information using bank information and consumer reports and (ii) to debit my bank account.',

  },
  function (tokenizeErr, tokenizedPayload) {
    console.log('test start '+JSON.stringify(tokenizedPayload));
    if (tokenizeErr) {
      console.error('There was an error tokenizing the bank details.');
      console.error('Timestamp: '+ Date.now());
      throw tokenizeErr;
    }

    console.log('ach nonce: '+tokenizedPayload.nonce);
   // $('#payment_method_nonce').val(tokenizedPayload.nonce);

    $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
        // var pn = $('#payment_method_nonce').val()
        // alert(pn);


        $.ajax({
               type:'POST',
               url:'/ajax-submit-for-settlement',
               data:{ id:data['id'],
               payment_method:'5',
                customer_id:data['last_order']['customer_id'],
               payment_method_nonce:tokenizedPayload.nonce,
                      //devicedata:$('#devicedata').val(),
                      total_amount:data['odr_total_amount']},
               success:function(res) {
                  if(res)
                  {
                    $('#pay'+data['id']).hide();
                    $('#settlement'+data['id']).show();
                  }
               }
            });


  });


  braintree.dataCollector.create({
        client: clientInstance,
        paypal: true
    }, function(dataCollectorErr, dataCollectorInstance) {
        if (dataCollectorErr) {
            // Handle error in creation of data collector.
            console.log(dataCollectorErr);
           // return;
        }

        //console.log('dataCollectorInstance:', dataCollectorInstance);
       // console.log('Got device data:', dataCollectorInstance.deviceData);
        var devicedata = dataCollectorInstance.deviceData;
        const obj = JSON.parse(devicedata);
        $('#deviceData').val(obj.correlation_id);
    });
    //sleep(5000);




    //window.setTimeout("redirect()", 1000);

 });





});


}

function submitSettlement()
    {
        //var pay_nonce = $('#payment_method_nonce').val();
        //console.log(pay_nonce);


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
