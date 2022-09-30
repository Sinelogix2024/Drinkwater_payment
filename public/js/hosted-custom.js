$(document).ready(function() {
    var form = $('form');
    var client_token = $('.client_token').val();
    braintree.client.create({
        // authorization:client_token,
        authorization: localStorage.getItem('BRAINTREE_AUTH_KEY'),
    }, function(err, clientInstance) {
        if (err) {
            console.log('error ')
            console.error(err);
            return;
        }

        braintree.hostedFields.create({
            client: clientInstance,
            styles: {
                input: {
                    // change input styles to match
                    // bootstrap styles

                    'font-weight': '400',
                    'color': '#000',
                    'border-bottom': '1px solid #000 !important',
                    'font-family': 'Europa-regular, sans-serif !important',
                    //     'background': 'transparent',
                    // 'padding': '12px 4px',
                    // 'font-size': '14px',
                    // 'border-radius': 0,
                    // 'width': '100%',
                    // '-webkit-appearance': 'none',
                }
            },
            fields: {
                cardholderName: {
                    selector: '#cc-name',
                    placeholder: 'NAME ON CARD'
                },
                number: {
                    selector: '#cc-number',
                    placeholder: 'CARD NUMBER'
                },
                cvv: {
                    selector: '#cc-cvv',
                    placeholder: 'CVV'
                },
                expirationDate: {
                    selector: '#cc-expiration',
                    placeholder: 'EXPIRATION'
                }
            }
        }, function(err, hostedFieldsInstance) {

            console.log('hostedFieldsInstance')
            console.log(hostedFieldsInstance)

            console.log('errortest')
            console.log(err)

            if (err) {
                console.log('error 2')
                console.error(err);
                return;
            }

            function createInputChangeEventListener(element) {
                return function() {
                    validateInput(element);
                }
            }

            function setValidityClasses(element, validity) {
                if (validity) {
                    element.removeClass('is-invalid');
                    element.addClass('is-valid');
                } else {
                    element.addClass('is-invalid');
                    element.removeClass('is-valid');
                }
            }

            function validateInput(element) {
                // very basic validation, if the
                // fields are empty, mark them
                // as invalid, if not, mark them
                // as valid

                if (!element.val().trim()) {
                    setValidityClasses(element, false);

                    return false;
                }

                setValidityClasses(element, true);

                return true;
            }


            var ccName = $('#cc-name');

            ccName.on('change', function() {
                validateInput(ccName);
            });



            hostedFieldsInstance.on('validityChange', function(event) {
                var field = event.fields[event.emittedBy];

                // Remove any previously applied error or warning classes
                $(field.container).removeClass('is-valid');
                $(field.container).removeClass('is-invalid');

                if (field.isValid) {
                    $(field.container).addClass('is-valid');
                } else if (field.isPotentiallyValid) {
                    // skip adding classes if the field is
                    // not valid, but is potentially valid
                } else {
                    $(field.container).addClass('is-invalid');
                }
            });

            hostedFieldsInstance.on('cardTypeChange', function(event) {
                var cardBrand = $('#card-brand');
                var cvvLabel = $('[for="cc-cvv"]');

                if (event.cards.length === 1) {
                    var card = event.cards[0];

                    // change pay button to specify the type of card
                    // being used
                    cardBrand.text(card.niceType);
                    // update the security code label
                    cvvLabel.text(card.code.name);
                } else {
                    // reset to defaults
                    cardBrand.text('Card');
                    cvvLabel.text('CVV');
                }
            });

            form.submit(function(event) {
                event.preventDefault();
                var formIsInvalid = false;
                var state = hostedFieldsInstance.getState();
                // var formValid = Object.keys(state.fields).every(function(key) {
                //     return state.fields[key].isValid;
                // });
                // console.log('formValid', formValid);

                // perform validations on the non-Hosted Fields
                // inputs

                // Loop through the Hosted Fields and check
                // for validity, apply the is-invalid class
                // to the field container if invalid
                // console.log('ccName', ccName);
                if (ccName.val() != '') {
                    Object.keys(state.fields).forEach(function(field) {
                        if (!state.fields[field].isValid) {
                            $(state.fields[field].container).addClass('is-invalid');
                            formIsInvalid = true;
                        }
                    });
                }

                // formIsInvalid = true;

                // if (formIsInvalid) {

                // console.log('state 123', state);
                // cardFildsArray = {
                //     'cardholderName': $('#cc-name'),
                //     'number': $('#cc-number'),
                //     'cvv': $('#cc-cvv'),
                //     'expirationDate': $('#cc-expiration')
                // };

                // for (const field in cardFildsArray) {
                //     validateCardFiledFunction(field, cardFildsArray[field]);
                // }

                if (formIsInvalid) {
                    // skip tokenization request if any fields are invalid
                    // function validateCardFiledFunction(index, value) {
                    //     $(value).removeClass('is-valid');
                    //     $(value).removeClass('is-invalid');
                    //     if (state['fields'][index].isValid) {
                    //         $(value).removeClass('is-valid');
                    //     } else {
                    //         $(value).addClass('is-invalid');
                    //     }
                    // }
                    return;
                }

                hostedFieldsInstance.tokenize(function(err, payload) {
                    if (err) {
                        console.log('token err')
                        console.error(err);
                        console.error(err.details);
                        return;
                    }

                    console.log('payload')
                    console.log(payload)
                        // This is where you would submit payload.nonce to your server
                    $('.toast').toast('show');
                    localStorage.setItem("payload", payload);
                    // you can either send the form values with the payment
                    // method nonce via an ajax request to your server,
                    // or add the payment method nonce to a hidden inpiut
                    // on your form and submit the form programatically
                    if ($('#payment_method_nonce_update').val() == '') {


                        $('#payment_method_nonce').val(payload.nonce);
                    }
                    // form.submit()
                });
            });


        });
    });

    /////////////////////////////////////////



}); // end doc ready