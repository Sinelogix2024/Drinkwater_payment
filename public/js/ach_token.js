
    localStorage.setItem('BRAINTREE_AUTH_KEY', '{{ env('BRAINTREE_AUTH_KEY', 'sandbox_7b22h9qq_9wcqdbyrsh4jphn6') }}');
    localStorage.setItem('VENMO_PROFILE_ID', '{{ env('VENMO_PROFILE_ID', '1953896702662410263') }}')

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="https://js.braintreegateway.com/web/3.85.5/js/client.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.85.5/js/us-bank-account.min.js"></script>



braintree.client.create({

 authorization : localStorage.getItem('BRAINTREE_AUTH_KEY'),
}, function (clientErr, clientInstance) {
  if (clientErr) {
    console.error('There was an error creating the Client.');
    throw clientErr;
  }


  braintree.usBankAccount.create({
  client: clientInstance
}, function (usBankAccountErr, usBankAccountInstance) {

    // var bankDetails = {
    //     firstName : $('#first_name').val(),
    //     lastName : $('#last_name').val(),
    //   email: $('#email').val(),
    //   phone: $('#mobile').val(),

    // accountNumber: $('#account_number').val(),
    // routingNumber: $('#routing_number').val(),
    // accountType: $('#account-type').val(),
    // ownershipType: $('#ownership-type').val(),

    // billingAddress: {
    //   streetAddress: $('#billing_address').val(),
    //   extendedAddress: '7',
    //   locality: $('#b_city').val(),

    //   region: $('#b_state_region').val(),
    //    postalCode: $('#b_zip').val()


    // }

    var bankDetails = {
      email: 'jay@test.com',
      phone: '1234512345',
      firstName: 'busy',
    lastName : 'bee',
    accountNumber: '000123456789',
    routingNumber: '011401533',
    accountType: 'savings',
    ownershipType: 'personal',
    billingAddress: {
      streetAddress: '111 Main St',
      extendedAddress: '7',
      locality: 'San Jose',
      region: 'CA',
      postalCode: '94085'
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

    console.log('ach nonce: '+tokenizedPayload.nonce)
    return tokenizedPayload.nonce;
   // $("#token").text(tokenizedPayload.nonce);
    //$('#token').val(tokenizedPayload.nonce);

  });





 });





});




