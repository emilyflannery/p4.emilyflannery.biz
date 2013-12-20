////////////////////////////////////// BOOTSRAP X-EDITABLE //////////////////////////////////////
//turn to inline mode

$(document).ready(function() {

	$.fn.editable.defaults.mode = 'inline';

	$('#first_name').editable({
	    type: 'text',
	    pk: 1,
	    name:  $('#first_name').val(),
	    url: '/users/p_profile_edit()',
	    title: 'First name'
	});

	$('#last_name').editable({
	    type: 'text',
	    pk: 1,
	    name:  $('#last_name').val(),
	    url: '/users/p_profile_edit()',
	    title: 'Last name'
	});

	$('#email').editable({
	    type: 'text',
	    pk: 1,
	    name:  $('#email').val(),
	    url: '/users/p_profile_edit()',
	    title: 'Email Address'
	});
});

// Ingredient Measurements
	var values = new Array();
	var ingredient = $(".ingredient");

	$(document).ready(function() {
		
		$("button").click(calculate);
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




