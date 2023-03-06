@php
    $deliveryObj = json_decode($invoiceDataObj->delivery_fee);
    $cityStateZip = json_decode($invoiceDataObj->b_city_state_zip);
@endphp

<style>
    .p_detail thead tr {
        border-bottom: 1px solid #848484;
    }

    thead tr th:first-child {
        padding-left: 0;
    }

    h3 {
        font-size: 1.75rem !important;
    }
</style>

<div style="text-align: center;  margin: 0 auto;  margin-top: 10px;width: 100%;max-width: 700px;margin-bottom: 15px;">
    <div style="padding-bottom:20px;"><a href=" https://drinkwatr.com/ " target="_blank"><img
                src=" https://watrbar.io/wp-content/uploads/2022/07/logo-latest.png " class="form-logo"
                style="max-width: 60px;"></a>
        <div class="subtitle"><img
                src=" https://invoicing.drinkwatr.com/wp-content/uploads/2022/09/DRINK-WATR-_-STAY-STRONG®-2022.04.26.png "
                class="form-logo-two" style="max-width: 230px;margin-top: 15px;"></div>
    </div>
</div>
<div style="font-size: 14px;color: #584d4d;display: flex;">
    {{-- <div class="col-sm-12 col-md-3" style="/*max-width:25%;width:25%;*/float: left;padding-right: 50px;">
        <div class="preview_left">
            <div class="form_field" style="margin-left: 0;margin: 10px;margin-bottom: 15px;">
                <h3 style="font-weight: 400;margin-bottom: 60px;color: #000;font-size: 1.75rem !important;">PAID INVOICE
                </h3>
                <p style="margin-top:0;margin-bottom:1rem;color: #000;">
                    Delivery Set for
                    <br>
                    {{ $deliveryObj->d_date }}
                </p>
            </div>
        </div>
    </div> --}}
    <div class="col-sm-12 col-md-12"
        style="text-align: center;  margin: 0 auto;  margin-top: 10px;width: 100%;max-width: 700px;margin-bottom: 15px;">
        <div class="preview_right">
            <div class="row" style="margin-right: -15px;margin-left: -15px;">

                <div class="form_field" style="margin-left: 0;margin: 10px;margin-bottom: 15px;">
                    {{-- <h3 style="font-weight: 400;margin-bottom: 60px;color: #000;font-size: 1.75rem !important;">PAID INVOICE
                    </h3> --}}
                    <p style="margin-top:0;margin-bottom:1rem;color: #000;">
                        Delivery Set for
                        <br>
                        {{ $deliveryObj->d_date }}
                    </p>
                </div>

                <div class="col-sm-6 col-md-12 form_field" style="margin-left: 0;margin: 10px;margin-bottom: 15px;">
                    <div class="preview_adr" style="margin-bottom: 40px;color:#000;">
                        <div class="form_field">
                            ATTN: <span id="f_client_name">{{ $invoiceDataObj->odr_contact_name }}</span>
                        </div>
                        <div class="form_field">
                            <span id="f_company_name">{{ $invoiceDataObj->odr_company_name }}</span>
                        </div>
                        <div class="form_field">
                            <span id="f_company_address">{{ $invoiceDataObj->billing_address }}
                                @empty(!$invoiceDataObj->billing_address2)
                                    , {{ $invoiceDataObj->billing_address2 }}
                                @endempty
                            </span>
                        </div>
                        <div class="form_field">
                            <span id="f_city">{{ $cityStateZip->city }}</span>
                            <span id="f_state">{{ $cityStateZip->state }}</span>
                            <span id="f_zip">{{ $cityStateZip->zip }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-12 form_field" style="margin-left: 0;margin: 10px;margin-bottom: 15px;">
                    <div class="preview_del_date" style="margin-bottom: 20px;color:#000;">
                        <div class="form_field">Date <span
                                id="f_delivery_date">{{ $invoiceDataObj->created_at->format('m/d/Y') }}</span> </div>
                    </div>
                    <div class="preview_innum" style="margin-bottom: 20px;color: #000;">
                        <div class="form_field">
                            <p>DRINK WATR™ </p>
                        </div>
                        <div class="form_field">
                            <p style="margin-bottom:0;">Invoice Number:
                                {{ $invoiceDataObj->odr_id }}</p>
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
            <div class="preview_cart" style="max-width: 600px;">
                <table class="p_detail"
                style="border: 1px solid;border-collapse: collapse;background-color: transparent;width: 90%;color: #000; margin-left:-15px">
                    <thead>
                        <tr style="border-bottom: 1px solid #848484;text-align: left;">
                            <th scope="col" style="padding: 5px;">PRODUCTS</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr style="border-bottom: 1px solid #848484;">
                                <td style="padding: 5px;">
                                    {{ config('constants.product_name.' . $product->product_name) }}</td>
                                <td style="padding: 5px;">{{ $product->kits }}</td>
                                <td style="padding: 5px;">{{ $product->price }}</td>
                            </tr>
                        @endforeach
                        <tr class="lastrow" style="border-bottom: 1px solid #848484;">
                            <td style="padding: 5px;">DELIVERY FEE
                                @if ($deliveryObj->type == 1)
                                    (COMPLIMENTARY)
                                @endif
                            </td>
                            <td style="padding: 5px;"></td>
                            <td style="padding: 5px;">{{ $deliveryObj->fee }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="p_sub_tot_div" style="max-width: max-content;float: right;display: flex;">
                    <div class="p_sub_totl">
                        <table class="p_total"
                            style="border-collapse:collapse;background-color:transparent;margin:0 0 1.5em;width:100%;color: #000;">
                            <tbody>
                                <tr style="">
                                    <td style="padding: 10px;">Subtotal</td>
                                    <td class="subtotal" style="padding: 10px;">
                                        ${{ $invoiceDataObj->odr_total_amount }}
                                    </td>
                                </tr>
                                <tr style="">
                                    <td style="padding: 10px;">Total</td>
                                    <td class="totalprice" style="padding: 10px;">
                                        ${{ $invoiceDataObj->odr_total_amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pre_deli_by" style="text-align: center;margin-bottom: 40px;margin-top: 25px;">
    {{-- <a href="#"
        style="color: #fff;padding: 12px 35px;font-size: 16px;background: #000;border-radius: 25px;width: 120px;position: relative;overflow: hidden;margin-top: 25px;width: 150px;text-decoration: none; width: auto; width: auto;padding-left: 50px;padding-right: 50px; border-radius: 10px; background: #02771d;">PAID</a> --}}
    <div><h3 style="font-weight: 400;margin-bottom: 60px;color: #000;font-size: 1.75rem !important;">PAID INVOICE
    </h3></div>
    <p>DELIVERED BY</p>
    <div class="drop_img" style="padding-bottom: 20px;"><img
            src=" https://invoicing.drinkwatr.com/wp-content/uploads/2022/10/droplet_wellness.png "
            style="max-width: 300px;"></div>
</div>
