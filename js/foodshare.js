// Ingredient Measurements
	var values = new Array();
	var ingredient = $(".ingredient");

	$(document).ready(function() {
		
		$("#servings input").keyup(calculate);
		
		ingredient.each(function(i) {
			values[i] = $(this).html();
		});
	});


	// Calculate New Amount
	function calculate() {
		var servings = $('#servings input').val();
		ingredient.each(function(i) {
			$(this).html("");
			var newAmount = (parseFloat(values[i]) / 4) * parseFloat(servings);
			$(this).html(newAmount);
		});
	};


	$.validate({
		form : '#signup',
		validateOnBlur : true, // disable validation when input looses focus
    	errorMessagePosition : 'top' // Instead of 'element' which is default
	});

