// Login
$('#form-login').submit(function login(e) {
	e.preventDefault()
	$.ajax({
		url: base + 'auth/login',
		method: 'POST',
		dataType: 'JSON',
		data: $(this).serialize(),
		success: function (response) {
			
			if (response.status) {
				$('#alert').addClass('show').slideDown(500).html(response.msg)

				window.setTimeout(function () {
					$("#alert").slideUp(500, function () {
						$(this).removeClass('show');
					});
				}, 2000);
			}else {
				window.location.href = response.redirect
			}
		},
	});
})




