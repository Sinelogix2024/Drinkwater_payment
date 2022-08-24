var form = document.querySelector('#basic-form');
var client_token = $('.client_token').val();

braintree.dropin.create({
    authorization: client_token,
    selector: '#bt-dropin',
    // paypal: {
    //     flow: 'vault'
    // }
}, function(createErr, instance) {
    if (createErr) {
        console.log('Create Error', createErr);
        return;
    }
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        instance.requestPaymentMethod(function(err, payload) {
            if (err) {
                console.log('Request Payment Method Error', err);
                localStorage.setItem('braintree_error', true);
                return;
            }

            // Add the nonce to the form and submit
            document.querySelector('#nonce').value = payload.nonce;
            localStorage.setItem('braintree_error', false);
            // form.submit();
            // $('.show_step5_form').click();
        });
    });
});


$(document).ready(function() {
    $('.shipping_address_final_page').prop('disabled', true).hide();
    $('.shipping_address1_final_page').prop('disabled', true).hide();
    $('.s_city_final_page').prop('disabled', true).hide();
    $('.s_state_final_page').prop('disabled', true).hide();
    $('.s_zip_final_page').prop('disabled', true).hide();

    $('.shipping_add_final_page').show().text($('.shipping_address_final_page').val() + ' ' + $('.shipping_address1_final_page').val())
    $('.citi_state_zip_final_page').show().text($('.s_city_final_page').val() + '/' + $('.s_state_final_page').val() + '/' + $('.s_zip_final_page').val());
    $('.final_page_package_label').next(".dropdown-toggle").prop('disabled', true);
    $('.payment_method_final_page').text($('.payment_method_finl_page_class').children("option:selected").text());
    // showLoader();

    $(document).on("change", "#package1", function() {
        console.log("package1 change");

        let selected = $(this).children("option:selected").val();
        localStorage.setItem("package", selected);
        setDropDownvalue();
    });

    $(document).on("change", "#package2", function() {
        console.log("package2 change");
        let selected = $(this).children("option:selected").val();
        console.log(selected);
        localStorage.setItem("package", selected);
        setDropDownvalue();
    });

    $(document).on("change", "#package3", function() {
        console.log("package3 change");
        let selected = $(this).children("option:selected").val();
        localStorage.setItem("package", selected);
        setDropDownvalue();
    });
    $('.select_pure').addClass('d-none');
    $('.select_alka').addClass('d-none');
    $('.delivery_frequency1').addClass('d-none');

    // alakline change set price change
    $(document).on("change", "#alakline_pure", function() {
        console.log('Test :: 1 ::');
        console.log();

        $('#product5').val($(this).val());
        $('#product5').change();

        $('#package5').change();

        if ($(this).val() == 1) {
            console.log('Test :: aplkine ::');
            console.log();
            $('.select_alka').removeClass('d-none');
            $('.select_pure').addClass('d-none');
            $('.select_alka').addClass('selected-package');
            $('.select_pure').removeClass('selected-package');
        } else if ($(this).val() == 2) {
            $('.select_pure').removeClass('d-none');
            $('.select_alka').addClass('d-none');
            $('.select_pure').addClass('selected-package');
            $('.select_alka').removeClass('selected-package');
            console.log('Test :: pure ::');
        }
    });

    $(document).on("change", "#package1", function() {
        $('#delivery_frequency1').removeClass('d-none');
        $('#delf_div').show();
        $('#delf_div').css('display', 'block');

        $('#package5').change();
    });

    $(document).on("change", "#package4", function() {
        console.log("package4 change");
        let selected = $(this).children("option:selected").val();
        localStorage.setItem("package", selected);
        setDropDownvalue();
    });

    $(document).on("change", "#product5", function() {
        console.log("product5 change");
        let selected = $(this).children("option:selected").val();
        localStorage.setItem("product", selected);
        setDropDownvalue();

        $('.product_note_final_page').text($('#product5').children("option:selected").text());

        console.log('Test :: 1 ::');
        console.log();

        $('.final_page_package_select').removeClass('selected-package');
        if ($(this).val() == 1) {
            console.log('Test :: aplkine ::');
            console.log();
            $('.select_alka').removeClass('d-none');
            $('.select_pure').addClass('d-none');
            $('.select_alka').removeClass('selected-package');
            $('.select_pure').addClass('selected-package');
        } else if ($(this).val() == 2) {
            $('.select_pure').removeClass('d-none');
            $('.select_alka').addClass('d-none');
            $('.select_pure').removeClass('selected-package');
            $('.select_alka').addClass('selected-package');
            console.log('Test :: pure ::');
        }
        $('.final_page_package_select').addClass('d-none');
    });

    $(document).on("change", "#package5", function() {
        console.log("package5 change");
        let selected = $(this).children("option:selected").val();
        localStorage.setItem("package", selected);
        setDropDownvalue();

        $('.package_note_final_page').text($('#package5').children("option:selected").text());

        let package_value = localStorage.getItem('package');
        let service_fees = string.service_fees.toFixed(2);
        let delivery_fees = string.delivery_fees.toFixed(2);
        let tax = ((string.package[package_value] * string.tax) / 100).toFixed(2);
        let package_amount = string.package[package_value];
        let total_amount = (parseFloat(package_amount) + parseFloat(service_fees) + parseFloat(delivery_fees) + parseFloat(tax)).toFixed(2);

        $('.service_fees').text('$' + service_fees);
        $('.delivery_fees').text('$' + delivery_fees);
        $('.tax_amount').text('$' + tax);
        $('.tax_amount').val(tax);
        $('.total_amount').text('$' + total_amount);
        $('.total_amount').val(total_amount);

        if (this.value == '1') {
            setDeliveryFrequency();
        } else if (this.value == '2' || this.value == '3') {
            resetDeliveryFrequency();
        }
    });

    $(document).on("change", "#delivery_frequency1", function() {
        let selected = $(this).children("option:selected").val();
        localStorage.setItem("delivery_frequency", selected);
        setDropDownvalue();
    });

    $(document).on("change", "#delivery_frequency2", function() {
        let selected = $(this).children("option:selected").val();
        localStorage.setItem("delivery_frequency", selected);
    });

    $(document).on("change", "#delivery_frequency3", function() {
        let selected = $(this).children("option:selected").val();
        localStorage.setItem("delivery_frequency", selected);
        setDropDownvalue();
    });

    $(document).on("change", "#delivery_frequency4", function() {
        let selected = $(this).children("option:selected").val();
        localStorage.setItem("delivery_frequency", selected);
        setDropDownvalue();
    });

    $(document).on("change", "#delivery_frequency5", function() {
        let selected = $(this).children("option:selected").val();
        localStorage.setItem("delivery_frequency", selected);
        setDropDownvalue();
        $('.delivery_note_final_page').text($('#delivery_frequency5').children("option:selected").text());
    });

    function setDeliveryFrequency() {
        $("#delivery_frequency5 option[value='1']").remove();
        $("#delivery_frequency5 option[value='2']").remove();
        $('#delivery_frequency5').append($("<option></option>").attr("value", '1').text('UPCOMING SUNDAY'));
        $('#delivery_frequency5').append($("<option></option>").attr("value", '2').text('UPCOMING MONDAY'));
        $('#delivery_frequency5').selectpicker('refresh');
    }

    function resetDeliveryFrequency() {
        $("#delivery_frequency5 option[value='1']").remove();
        $("#delivery_frequency5 option[value='2']").remove();
        $('#delivery_frequency5').append($("<option></option>").attr("value", '1').text('EVERY SUNDAY'));
        $('#delivery_frequency5').append($("<option></option>").attr("value", '2').text('EVERY MONDAY'));
        $('#delivery_frequency5').selectpicker('refresh');
    }

    $(document).on("change", "#payment_method", function() {
        let selected = $(this).children("option:selected").val();

        if (selected == 3) { // hide card form and show venom
            $("#bt-dropin").hide();
            $("#bt-dropin_venmo").show();
            $("#bt-dropin_applepay").hide();
            $(".purchase_button").hide();
            $('.card-div-final').hide();
        } else if (selected == 4) { // hide card form and show apple
            $("#bt-dropin").hide();
            $("#bt-dropin_venmo").hide();
            $("#bt-dropin_applepay").show();
            $(".purchase_button").show();
        } else {
            $("#bt-dropin").show();
            $("#bt-dropin_venmo").hide();
            $("#bt-dropin_applepay").hide();
            $(".purchase_button").show();
            $('.card-div-final').show();
        }

        $('.payment_method_final_page').text($(this).children("option:selected").text());
        //return false;
        localStorage.setItem("payment_method", selected);
        setDropDownvalue();
    });

    $('.payment_method').on('show.bs.dropdown', function() {
        setTimeout(function() {
            $('.payment_method div.dropdown-menu').css('transform', 'translate3d(0px, 36px, 0px)');
        }, 100);
    });

    $('.purchase_button').on('click', function() {
        console.log('purchase_button ');


        $(".current_tab").val("final_form");

        //$("#basic-form").submit();
        // $(this).prop('disabled',true);
        // $(this).text('Please Wait......');
        showLoader();


    })

    $("#basic-form").validate({
        rules: {
            first_name: {
                required: true,
                minlength: 3,
                maxlength: 15,
            },
            last_name: {
                required: true,
                minlength: 3,
                maxlength: 15,
            },
            mobile: {
                required: true,
                minlength: 12,
                maxlength: 12,
                //number: true,
            },
            email: {
                required: true,
                email: true,
                // maxlength: 30,
            },

            package: {
                required: true,
            },

            delivery_frequency: {
                required: true,
            },

            billing_address: {
                required: true,
            },

            shipping_address: {
                required: true,
            },

            billing_address2: {
                required: false,
            },

            shipping_address2: {
                required: false,
            },

            b_city: {
                required: true,
            },
            b_state: {
                required: true,
            },
            b_zip: {
                required: true,
            },

            s_city: {
                required: true,
            },
            s_state: {
                required: true,
            },
            s_zip: {
                required: true,
            },

            payment_method: {
                required: true,
            },

            // name_on_card: {
            //     required: true,
            //     maxlength: 40,
            // },

            // card_number: {
            //     required: true,
            //     number: true,
            //     minlength: 10,
            // },

            // card_cvv: {
            //     required: true,
            //     number: true,
            //     maxlength: 5,
            //     minlength: 3,
            // },

            // card_expiry: {
            //     required: true,
            //     minlength: 5,
            //     maxlength: 6,
            // },
        },

        messages: {
            first_name: {
                minlength: "First name must be at least 8 characters long",
                maxlength: "First name must be at least 15 characters long",
            },
            last_name: {
                minlength: "Last name must be at least 8 characters long",
                maxlength: "Last name must be at least 15 characters long",
            },
            email: {
                required: "Email is required",
                email: "Enter a valid email",
            },
            mobile: {
                minlength: "Mobile must be at least 10 digits long",
                maxlength: "Mobile must be at least 10 digits long",
            },

            package: {
                required: "Solution is required",
            },

            delivery_frequency: {
                required: "Delivery frequency is required",
            },
        },

        submitHandler: function(form) {
            console.log('form submmit calls')
            console.log(form)
            let current_tab = $(".current_tab").val();
            console.log('current_tab', current_tab);

            console.log($(this));

            if (current_tab == "step1_form") {
                showLoader();
                if ($("#basic-form").valid()) {
                    setDropDownvalue();
                    $(".step1_form").hide();
                    $(".step2_form").show();
                    $(".current_tab").val("step2_form");
                }
                hideLoader();
            }

            if (current_tab == "step2_form") {
                showLoader();
                $('.payment_method').next(".dropdown-toggle").show();
                $('.payment_method').next(".dropdown-toggle").prop('disabled', false);
                if ($("#basic-form").valid()) {
                    $(".step1_form").hide(true);
                    $(".step2_form").hide(true);
                    $(".step4_form").hide(true);
                    $(".step3_form").show(true);
                    $(".current_tab").val("step3_form");
                    setDropDownvalue();
                }
                hideLoader();
                setTimeout(function() {
                    $('button').removeClass('bs-placeholder');
                    $('.s_city_final_page').val($('#s_city').val());
                    $('.s_state_final_page').val($('#s_state').val());
                    $('.s_zip_final_page').val($('#s_zip').val());
                }, 500);
            }

            if (current_tab == "step3_form") {
                showLoader();
                var payment_method_check = localStorage.getItem("payment_method");
                $('.show_step5_form').click();
                // if ($("#basic-form").valid()) {

                //     $(".step1_form").hide(true);
                //     $(".step2_form").hide(true);
                //     $(".step2_form").hide();
                //     $(".step3_form").hide(true);
                //     $(".step4_form").show(true);
                //     $(".step5_form").hide(true);
                //     $(".current_tab").val("step4_form");
                //     setDropDownvalue();
                //     $("#payment_method").trigger("change");
                // }

                // if(payment_method_check==3)
                // {
                //     $('.show_step5_form').click();
                //    // $('#basic_form').submit();

                // }else{
                //     if ($("#basic-form").valid()) {

                //         $(".step1_form").hide(true);
                //         $(".step2_form").hide(true);
                //         $(".step2_form").hide();
                //         $(".step3_form").hide(true);
                //         $(".step4_form").show(true);
                //         $(".step5_form").hide(true);
                //         $(".current_tab").val("step4_form");
                //         setDropDownvalue();
                //         $("#payment_method").trigger("change");


                //     }
                // }

                hideLoader();
            }

            if (current_tab == "step4_form") {

                // var ex=$('#expire').val();
                // var cardnum=$('#cardnum').val();
                // var cardname=$('#cardname').val();
                // var cardcvv=$('#cardcvv').val();

                // $('.number').val(cardnum);
                // $('#expiration').val(ex);
                // $('#cardholder-name-autofill-field').val(cardname);
                // $('#expiration-month-autofill-field').val('12');
                // $('#expiration-year-autofill-field').val('26');

                $('.show_step5_form').click();

                // var ex=$('#expire').val();
                // var cardnum=$('#cardnum').val();
                // var cardname=$('#cardname').val();
                // var cardcvv=$('#cardcvv').val();
                // alert(ex);
                // alert(cardnum);
                // alert(cardname);
                // alert(cardcvv);
                //var d=document.getElementById("credit-card-number").value='4111111111111111';


                // $('.number').val(cardnum);
                // $('#expiration').val(ex);
                // $('#cardholder-name-autofill-field').val(cardname);
                // $('#expiration-month-autofill-field').val('12');
                // $('#expiration-year-autofill-field').val('26');

                // $('#basic_form').submit();
            }

            if (current_tab == 'step5_form') {
                showLoader();
                alert(3);
                // return;
                // form.submit();
                $('.package_note_final_page').text($('#package5').children("option:selected").text());
                $('.payment_method').next(".dropdown-toggle").hide();
                $('.shipping_address_final_page').val($('#shipping_address').val());
                $('.shipping_address1_final_page').val($('#shipping_address2').val());
                $('.s_city_final_page').val($('#s_city').val());
                $('.s_state_final_page').val($('#s_state').val());
                $('.s_zip_final_page').val($('#s_zip').val());

                //     $('.last_4_digit_card').text($("#basic-form").serializeArray()[23].value.substr($("#basic-form").serializeArray()[23].value.length - 4));

                $('.last_4_digit_card').text("****");


                $(".step1_form").hide(true);
                $(".step2_form").hide(true);
                $(".step3_form").hide(true);
                $(".step4_form").hide(true);
                $(".step5_form").show(true);
                $(".current_tab").val("final_form");
                setDropDownvalue();

                let package_value = localStorage.getItem('package');
                let service_fees = string.service_fees.toFixed(2);
                let delivery_fees = string.delivery_fees.toFixed(2);
                let tax = ((string.package[package_value] * string.tax) / 100).toFixed(2);
                let package_amount = string.package[package_value];
                let total_amount = (parseFloat(package_amount) + parseFloat(service_fees) + parseFloat(delivery_fees) + parseFloat(tax)).toFixed(2);

                $('.service_fees').text('$' + service_fees);
                $('.delivery_fees').text('$' + delivery_fees);
                $('.tax_amount').text('$' + tax);
                $('.tax_amount').val(tax);
                $('.total_amount').text('$' + total_amount);
                $('.total_amount').val(total_amount);

                hideLoader();
            }

            if (current_tab == 'final_form') {

                $('.b_city_state_zip').val($('.b_city_final_page').val() + '/' + $('.b_state_final_page').val() + '/' + $('.b_zip_final_page').val());
                $('.s_city_state_zip').val($('.b_city_final_page').val() + '/' + $('.b_state_final_page').val() + '/' + $('.b_zip_final_page').val());

                if ($("#basic-form").valid()) {
                    // $(".step1_form").hide(true);
                    // $(".step2_form").hide(true);
                    // $(".step3_form").hide(true);
                    // $(".step4_form").hide(true);
                    // $(".step5_form").hide(true);
                    // $(".final_form").hide(true);
                    showLoader();
                    $(".current_tab").val("final_form");
                }
                setDropDownvalue();
                // $("#payment_method").trigger("change");
                // form.submit();

                setTimeout(function() {
                    let package_value = localStorage.getItem('package');
                    let service_fees = string.service_fees.toFixed(2);
                    let delivery_fees = string.delivery_fees.toFixed(2);
                    let tax = ((string.package[package_value] * string.tax) / 100).toFixed(2);
                    let package_amount = string.package[package_value];
                    let total_amount = (parseFloat(package_amount) + parseFloat(service_fees) + parseFloat(delivery_fees) + parseFloat(tax)).toFixed(2);
                    $('.service_fees').text('$' + service_fees);
                    $('.delivery_fees').text('$' + delivery_fees);
                    $('.tax_amount').text('$' + tax);
                    $('.tax_amount').val(tax);
                    $('.total_amount').text('$' + total_amount);
                    $('.total_amount').val(total_amount);

                    form.submit();
                    // hideLoader();
                }, 3000);
            }
        },
    });

    function showLoader() {
        $('.loader').show();
        // $('.main_content').show();
    }

    function hideLoader() {

        $('.loader').hide();
        // $('.main_content').show();
        // return;

        // setTimeout(function() {
        //     $('.loader').hide();
        //     $('.main_content').show();
        // }, 1000);
    }


    $('.same_billing_address').change(function() {
        $('.same_billing_address_down')[0].checked = this.checked;
        $('.same_billing_address_up')[0].checked = this.checked;

        // let isCheckedUp = $('.same_billing_address_up')[0].checked
        // let isCheckedDown = $('.same_billing_address_down')[0].checked

        if (this.checked) {
            $("#shipping_address").val($("#billing_address").val());
            $("#shipping_address2").val($("#billing_address2").val());
            $("#s_city").val($("#b_city").val());
            $("#s_state").val($("#b_state").val());
            $("#s_zip").val($("#b_zip").val());
            $('#BillData').addClass('col-md-12');
            $("#shippingData").hide();
        } else {
            $('#BillData').removeClass('col-md-12');
            $("#shippingData").show();
        }

    });

    $('.edit_product').on('click', function() {
        $('.product_note_final_page').text($('#product5').children("option:selected").text());
        $('.final_page_product_label').next(".dropdown-toggle").prop('disabled', true);

        if ($(this).text() == 'Edit') {
            $('.final_page_product_label').hide();
            $('#product5').next(".dropdown-toggle").show();
            $('#product5').next(".dropdown-toggle").prop('disabled', false);
            $(this).text('Save');
        } else {
            $('#product5').next(".dropdown-toggle").hide();
            $('#product5').next(".dropdown-toggle").prop('disabled', true);
            $('.final_page_product_label').show();
            $(this).text('Edit');
        }
    })

    $('#product5').next(".dropdown-toggle").hide();
    $('#package5').next(".dropdown-toggle").hide();

    $('.edit_package').on('click', function() {
        $('.package_note_final_page').text($('.final_page_package_select.selected-package').children("option:selected").text());
        $('.final_page_package_label').next(".dropdown-toggle").prop('disabled', true);

        if ($(this).text() == 'Edit') {
            $('.final_page_package_label').hide();
            $('.final_page_package_select.selected-package').removeClass('d-none');
            $('.final_page_package_select.selected-package').show();
            $('#package5').next(".dropdown-toggle").show();
            $('#package5').next(".dropdown-toggle").prop('disabled', false);
            $(this).text('Save');
        } else {
            $('#package5').next(".dropdown-toggle").hide();
            $('#package5').next(".dropdown-toggle").prop('disabled', true);
            $('.final_page_package_select').hide();
            $('.final_page_package_label').show();
            $(this).text('Edit');
        }
    })

    $('.edit_delivery_freq').on('click', function() {

        $('.delivery_note_final_page').text($('#delivery_frequency5').children("option:selected").text());
        $('.final_page_delivery_freq_label').next(".dropdown-toggle").prop('disabled', true);

        if ($(this).text() == 'Edit') {
            $('.final_page_delivery_freq_label').hide();
            $('#delivery_frequency5').next(".dropdown-toggle").show();
            $('#delivery_frequency5').next(".dropdown-toggle").prop('disabled', false);
            $(this).text('Save');
        } else {
            $('.final_page_delivery_freq_label').show();
            $('#delivery_frequency5').next(".dropdown-toggle").hide();
            $('#delivery_frequency5').next(".dropdown-toggle").prop('disabled', true);
            $(this).text('Edit');
        }
    })

    $('.final_page_address_field').hide();
    $('.edit_address_final_page').on('click', function() {
        $('.shipping_add_final_page').text($('.shipping_address_final_page').val() + ' ' + $('.shipping_address1_final_page').val());
        $('.citi_state_zip_final_page').text($('.s_city_final_page').val() + '/' + $('.s_state_final_page').val() + '/' + $('.s_zip_final_page').val());
        $('.final_page_edit_address_label').next(".dropdown-toggle").prop('disabled', true);

        if ($(this).text() == 'Edit') {
            $('.edit_address_final_page').css('top', '15%');
            $('.final_page_address_field').show();
            $('.final_page_edit_address_label').hide();
            $('.shipping_address_final_page').prop('disabled', false).show();
            $('.shipping_address1_final_page').prop('disabled', false).show();
            $('.s_city_final_page').prop('disabled', false).show();
            $('.s_state_final_page').prop('disabled', false).show();
            $('.s_zip_final_page').prop('disabled', false).show();
            $(this).text('Save');
        } else {
            $('.edit_address_final_page').css('top', '50%');
            $('.final_page_address_field').hide();
            $('.final_page_edit_address_label').show();
            $('.shipping_address_final_page').prop('disabled', true).hide();
            $('.shipping_address1_final_page').prop('disabled', true).hide();
            $('.s_city_final_page').prop('disabled', true).hide();
            $('.s_state_final_page').prop('disabled', true).hide();
            $('.s_zip_final_page').prop('disabled', true).hide();
            $(this).text('Edit');
        }
    })

    $('.shipping_address_final_page').on('change', function() {
        $("#billing_address").val($(this).val());
    })

    $('.shipping_address1_final_page').on('change', function() {
        $("#billing_address2").val($(this).val());
    })

    $('.s_city_final_page').on('change', function() {
        $("#b_city").val($(this).val());
    })
    $('.s_state_final_page').on('change', function() {
        $("#b_state").val($(this).val());
    })
    $('.s_zip_final_page').on('change', function() {
        $("#b_zip").val($(this).val());
    })

    // $('.payment_method').next(".dropdown-toggle").hide();
    $('.payment_method_finl_page_class').next(".dropdown-toggle").hide();

    $('.edit_payment_method_final_page').on('click', function() {
        console.log('edit_payment_method_final_page');
        console.log($(this).text());

        $('.final_page_payment_source_label').next(".dropdown-toggle").prop('disabled', true);

        if ($(this).text() == 'Edit') {
            $('.final_pay_card_deatil').show();
            $("#payment_method").trigger("change");
            $('.final_page_payment_source_label').hide();
            $('.payment_method_finl_page_class').next(".dropdown-toggle").show();
            $('.payment_method_finl_page_class').next(".dropdown-toggle").prop('disabled', false);

            // $(this).text('Save');
            $('.edit_payment_method_final_page').hide();
            $('.save_payment_method_final_page').show();

            //$('.card-div-final').show();
            // var someVar = $(".card-div").html();
            // $(".card-div").empty();
            // $(someVar).appendTo("#final_pay_card_deatil");
        } else {
            $('.final_page_payment_source_label').show();
            $('.payment_method_finl_page_class').next(".dropdown-toggle").hide();
            $('.payment_method_finl_page_class').next(".dropdown-toggle").prop('disabled', true);
            $(this).text('Edit');
            $('.card-div-final').hide();
            $('#form-hosted-final').submit();
        }
    })

    $('.save_payment_method_final_page').on('click', function() {
        $('.final_page_payment_source_label').show();
        $('.payment_method').next(".dropdown-toggle").hide();
        $('.payment_method').next(".dropdown-toggle").prop('disabled', true);
        // $(this).text('Edit');
        $('.edit_payment_method_final_page').show();
        $('.save_payment_method_final_page').hide();

        $('.card-div-final').hide();

        $('#form-hosted-final').submit();
    });

    if (localStorage.getItem("alakline_pure") && localStorage.getItem("alakline_pure") != '0') {
        $("#alakline_pure").val(localStorage.getItem("alakline_pure"));
        $("#alakline_pure").change();
    }
    if (localStorage.getItem("alkaline_package") && localStorage.getItem("alkaline_package") != '0') {
        $("#alkaline_package1").val(localStorage.getItem("alkaline_package"));
        $("#alkaline_package1").change();

        $("#package5").val(localStorage.getItem("alkaline_package"));
        $("#package5").change();

        // $("#package1").change();
    }
    if (localStorage.getItem("pure_package") && localStorage.getItem("pure_package") != '0') {
        $("#pure_package1").val(localStorage.getItem("pure_package"));
        $("#pure_package1").change();

        $("#package5").val(localStorage.getItem("pure_package"));
        $("#package5").change();

        // $("#package1").change();
    }
    if (localStorage.getItem("delivery_frequency") && localStorage.getItem("delivery_frequency") != '0') {
        $("#delivery_frequency1").val(localStorage.getItem("delivery_frequency"));
        $("#delivery_frequency1").change();
        $("#delivery_frequency5").change();
    }

    $('.select_pure').addClass('d-none');
    $('.select_alka').addClass('d-none');
    $('.delivery_frequency1').addClass('d-none');
});