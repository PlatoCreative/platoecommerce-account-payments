// Account Payments JavaScript Document

jQuery.noConflict();
jQuery(document).ready(function($){
	// On payment dropdown field change
	$('#OrderForm_OrderForm_PaymentMethod').change(function(e){
		if($(this).val() == 'AccountPayment'){
			$.get('checkout/AccountPaymentFields', function(data){
				$('#payment-load-area').html(data);
			});
		}
	});
});