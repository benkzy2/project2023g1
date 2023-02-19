(function ($) {
    "use strict";
    // Author code here
    $(document).on('click', '.shipping-charge', function () {
        let total = 0;
        let subtotal = 0;
        let grantotal = 0;
        let shipping = 0;

        subtotal = parseFloat($('.subtotal').attr('data'));
        grantotal = parseFloat($('.grandTotal').attr('data'));
        shipping = parseFloat($('.shipping').attr('data'));

        let shipCharge = parseFloat($(this).attr('data'));

        shipping = parseFloat(shipCharge);
        total = parseFloat(parseFloat(grantotal) + parseFloat(shipCharge));
        $('.shipping').text(shipping);
        $('.grandTotal').text(total);


    });

    $(document).on('click','.stripe-check',function(){
        console.log('stripe checked');
        if ($(this).is(":checked")) {
            $('#payment').attr('action',stripeSubmit);
            $('.string-show').removeClass('d-none');
        }else{
            $('#payment').attr('action',paypalSubmit);
            $('.string-show').addClass('d-none');
        }
    });


    $(document).on('click', '.paypal-check', function () {
        if ($(this).is(":checked")) {
            $('#payment').attr('action', paypalSubmit);
            $('.string-show').addClass('d-none');
        }
    });

    var cnstatus = false;
    var dateStatus = false;
    var cvcStatus = false;
    
    $(document).on('input', "input[name='cardNumber']", function() {
        cnstatus = Stripe.card.validateCardNumber($(this).val());
        if (!cnstatus) {
          $("#errCard").html('Card number not valid<br>');
        } else {
          $("#errCard").html('');
        }
    });


    $(document).on('input', "input[name='cardCVC']", function() {
        cvcStatus = Stripe.card.validateCVC($(this).val());
        if (!cvcStatus) {
          $("#errCVC").html('CVC number not valid');
        } else {
          $("#errCVC").html('');
        }
    });
       
})(jQuery); 