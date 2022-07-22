

if (window.ApplePaySession && ApplePaySession.supportsVersion(3) && ApplePaySession.canMakePayments()) {
    // This device supports version 3 of Apple Pay.
    console.log('Test :: 1 ::');    
    //return false;
    braintree.client.create({
        authorization: 'sandbox_7b22h9qq_9wcqdbyrsh4jphn6',
        selector: '#bt-dropin_applepay',
      }, function (clientErr, clientInstance) {
        if (clientErr) {
          console.error('Error creating client:', clientErr);
          return;
        }
      
        braintree.applePay.create({
          client: clientInstance
        }, function (applePayErr, applePayInstance) {
          if (applePayErr) {
            console.error('Error creating applePayInstance:', applePayErr);
            return;
          }
          console.log('Test :: 1 :: apple pay');
    
          var paymentRequest = applePayInstance.createPaymentRequest({
            total: {
              label: 'My Store',
              amount: '19.99'
            },
          
            // We recommend collecting billing address information, at minimum
            // billing postal code, and passing that billing postal code with
            // all Apple Pay transactions as a best practice.
            requiredBillingContactFields: ["postalAddress"]
          });
          console.log(paymentRequest.countryCode);
          console.log(paymentRequest.currencyCode);
          console.log(paymentRequest.merchantCapabilities);
          console.log(paymentRequest.supportedNetworks);
          
          var session = new window.ApplePaySession(3, paymentRequest);
          
          //return false;
          // Set up your Apple Pay button here
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
    
    
    
    
      function handleVenmoSuccess(payload) {
        // Send the payment method nonce to your server, e.g. by injecting
        // it into your form as a hidden input.
        console.log('Got a payment method nonce:', payload.nonce);
    
        // Display the apple username in your checkout UI.
        console.log('apple user:', payload.details.username);
        var amount = 1;
    
        //test nonce for apple
        payload_nonce = "fake-apple-account-nonce";
    
        //uncomment this for live integration
        var payerID = payload_nonce; //payload.nonce;
        var deviceDataToken = '{"correlation_id":"bc850bc0840ab2d9e1d34842d0e3ffa5"}';
        var deviceData = encodeURI(deviceDataToken);
    
        window.location = "/Directory_name/apple_server.php/?payerID=" + payerID + "&deviceData=" + deviceData + "&amount=" + amount;
    }       
  }else{
    console.log('Your browser not support for apple pay...!');        
  }
  
  