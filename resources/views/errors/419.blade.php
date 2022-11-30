<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Expired</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}" />
</head>

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
        height: 60vh;
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
        /* min-height: 85vh; */
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

    .container-fluid {
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<main id="primary" class="site-main">
    <div class="invoice-payment">
        <div class="invoice-payment-inner">
            <div class="container-fluid">
                <img src="https://watrbar.io/wp-content/uploads/2022/07/droplet.png" class="step-dimg1">
                <div class="row justify-content-center">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-9 col-xl-9 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <div class="form-logo-sec" style="max-width: max-content; margin: 0 auto;">
                                <a href="{{ url()->current() }}">
                                    <img src="https://watrbar.io/wp-content/uploads/2022/07/logo-latest.png"
                                        class="form-logo">
                                </a>
                            </div>
                            <div>
                                <img src="https://invoicing.drinkwatr.com/wp-content/uploads/2022/09/DRINK-WATR-_-STAY-STRONG®-2022.04.26.png"
                                    class="form-logo-two">
                            </div>
                        </div>
                        <div style="margin-top: 5vh; margin-bottom: 2vh;">PAGE IDLE FOR TOO LONG.</div>
                        <div style="margin-bottom: 4vh;">
                            PLEASE CLICK <a href="{{ url()->current() }}">REFRESH </a> TO CONTINUE YOUR DAILY WELLNESS +
                            HYDRATION JOURNEY. DRINK WATR. STAY STRONG.
                        </div>
                        <a href="{{ url()->current() }}">
                            <button class="primary_btn btn_effect btn_black purchase_button"
                                style="width: auto; padding-left: 30px; padding-right: 30px;"
                                data-disable-with="Redirecting...">REFRESH</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
