$(function () {

	// Get the form.
	var form = $('#contact-form');

	// Get the messages div.
	var formMessages = $('.form-messege');

	// Set up an event listener for the contact form.
	$(form).submit(function (e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		// Serialize the form data.
		var formData = $(form).serialize();


		$.ajax({
				type: 'get',
				url: $(form).attr('action'),
				data: formData
			})
			.done(function (response) {

				$(formMessages).removeClass('error');
				$(formMessages).addClass('success');
				$(formMessages).text(response);
				$('#contact-form input,#contact-form textarea').val('');
			})
			.fail(function (data) {
				$(formMessages).removeClass('success');
				$(formMessages).addClass('error');
				if (data.responseText !== '') {
					$(formMessages).text(data.responseText);
				} else {
					$(formMessages).text('Oops! An error occured and your message could not be sent.');
				}
			});
	});

});
