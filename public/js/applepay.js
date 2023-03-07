var form = document.querySelector('#basic-form');
var client_token = $('.client_token').val();
var detail_access_token = localStorage.getItem('detail_access_token');

if (window.ApplePaySession && ApplePaySession.supportsVersion(3) && ApplePaySession.canMakePayments()) {
    // This device supports version 3 of Apple Pay.
    console.log('This device supports version 3 of Apple Pay.');
    function applePayClicked(){
    braintree.client.create({
        authorization: localStorage.getItem('BRAINTREE_AUTH_KEY'),
        selector: '#bt-dropin_applepay',
    }, function(clientErr, clientInstance) {
        if (clientErr) {
            console.error('Error creating client:', clientErr);
            return;
        }

        braintree.applePay.create({
            client: clientInstance
        }, function(applePayErr, applePayInstance) {
            if (applePayErr) {
                console.error('Error creating applePayInstance:', applePayErr);
                return;
            }
            console.log('Test :: 1 :: apple pay');

            var paymentRequest = applePayInstance.createPaymentRequest({
                total: {
                    label: 'DRINK WATR',
                    amount: '1.00'
                },

                // We recommend collecting billing address information, at minimum
                // billing postal code, and passing that billing postal code with
                // all Apple Pay transactions as a best practice.
                requiredBillingContactFields: ["postalAddress"]
            });

            console.log('Test :: 1 ::');
            console.log(paymentRequest.countryCode);
            console.log(paymentRequest.currencyCode);
            console.log(paymentRequest.merchantCapabilities);
            console.log(paymentRequest.supportedNetworks);

            var session = new window.ApplePaySession(3, paymentRequest);
           // initializeCallbacks(session);
           session.onvalidatemerchant = function (event) {
  applePayInstance.performValidation({
    validationURL: event.validationURL,
    displayName: 'DRINK WATR'
  }, function (err, merchantSession) {
    if (err) {
      // You should show an error to the user, e.g. 'Apple Pay failed to load.'
      return;
    }
    session.completeMerchantValidation(merchantSession);
  });
};
            session.begin();
            console.log('Test :: session start ::');
            console.log(session);

            //return false;
            // Set up your Apple Pay button here
            displayApplePayButton(appleInstance);
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
    });

        function displayApplePayButton(appleInstance) {
            console.log('displayAppleButton');
            // Assumes that appleButton is initially display: none.
            appleButton.style.display = 'block';

            appleButton.addEventListener('click', function() {

                console.log('displayappleButton clicked');

                appleButton.disabled = true;

                appleInstance.tokenize(function(tokenizeErr, payload) {

                    console.log('payload', payload);

                    console.log('tokenizeErr', tokenizeErr);

                    appleButton.removeAttribute('disabled');

                    if (tokenizeErr) {
                        handleVenmoError(tokenizeErr);
                    } else {
                        handleVenmoSuccess(payload);
                    }
                });
            });
        }


        function handleVenmoError(err) {
            if (err.code === 'APPLE_CANCELED') {
                console.log('App is not available or user aborted payment flow');
            } else if (err.code === 'APPLE_APP_CANCELED') {
                console.log('User canceled payment flow');
            } else {
                console.error('An error occurred:', err.message);
            }
        }
    });




    // function handleVenmoSuccess(payload) {
    //     // Send the payment method nonce to your server, e.g. by injecting
    //     // it into your form as a hidden input.
    //     console.log('Got a payment method nonce:', payload.nonce);

    //     // Display the apple username in your checkout UI.
    //     console.log('apple user:', payload.details.username);
    //     var amount = 1;

    //     //test nonce for apple
    //     payload_nonce = "fake-apple-account-nonce";

    //     //uncomment this for live integration
    //     var payerID = payload_nonce; //payload.nonce;
    //     var deviceDataToken = '{"correlation_id":"bc850bc0840ab2d9e1d34842d0e3ffa5"}';
    //     var deviceData = encodeURI(deviceDataToken);

    //     window.location = "/Directory_name/apple_server.php/?payerID=" + payerID + "&deviceData=" + deviceData + "&amount=" + amount;
    // }

    function handleVenmoSuccess(payload) {
        console.log('Got a payment method nonce:', payload.nonce);
        //console.log('Venmo user:', payload.details.username);

        payload_nonce = "fake-apple-account-nonce";

         //uncomment this for live integration
         var payerID = payload_nonce; //payload.nonce;
        $('#payment_method_nonce').val(payload.nonce);
        $('#payment_method_nonce_update').val(payload.nonce);

        document.querySelector('#basic-form').submit();
        // window.location = "/Directory_name/venmo_server.php/?payerID=" + payerID + "&deviceData=" + deviceData + "&amount=" + amount;
        // window.location = venmo_server_url + "/?payerID=" + payerID + "&deviceData=" + deviceData + "&amount=" + amount;
    }

    }
} else {
    console.log('Your browser not support for apple pay...!');
}
