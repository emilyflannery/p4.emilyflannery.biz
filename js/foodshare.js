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