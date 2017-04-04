$ = jQuery.noConflict();
$(document).ready(function(){
	
	// Product attribute to cart in single product page
	$('#pa_medidas').change(function(){
		$('.variation_id').val($('option:selected',this).val());
	});
	$('.quantity').after().append($('.attribute_id'));
	
	// Installments table view
	$('.amountCreditCard a').click(function(e){
		e.preventDefault();
	});

	calculate_installments_amount($('.salePrice').val());
});

function calculate_installments_amount(amount){
	var formData = {
		api_key				: 'ak_test_eMAZBpsZjsdPZrz7pu43S8z1oDXdPy', 
		max_installments	: 10, 
		free_installments	: 10, 
		interest_rate		: 0,
		amount 				: parseFloat(amount)
	}
	$.ajax({
		type 		: 'GET', 
		dataType 	: 'json',
		url 		: 'https://api.pagar.me/1/transactions/calculate_installments_amount',
		data 		: formData,
		error		: function(){
			console.log("Fail. An error ocurred =(");
		},
		success:function(data){
			console.log(data);
			$('.amountList').empty();
			$('.amountList').append('<tr><th>Número de parcelas</th><th>Valor total</th></tr>');
			for(var i = 1; i <= formData['max_installments']; i++){
				$('.amountList').append('<tr><td><b>'+data.installments[i].installment+'x</b>- R$'+parseFloat(data.installments[i].installment_amount) +',00</td><td><small>R$'+parseFloat(data.installments[i].amount)+',00</small></td></tr>');
			}
		} 
	});
}