$(document).ready(function () {

	$('#btnlogin').on('click', function () {

		$('#btnlogin').prop("disabled", true);
		$("#spinner").show();

		var email = $('#email').val();
		var password = $('#password').val();

		if (email != "" && password != "") {

			var data = new FormData(this.form);
			$.ajax({
				url: "login",
				type: "POST",
				dataType: "json",
				data,
				processData: false,
				contentType: false,
				cache: false,
				success: function (data) {
					$('#btnlogin').html("Loading dashboard ...");
					setTimeout(function () {
						$('#btnlogin').prop("disabled", false);
						location.href = data.redirect_url; 
					}, 3000);
				},
				error: function (data) {
					$.each(data.responseJSON.errors, function (key, value) {
						$("#error").empty();
						$('#error').append('<strong>' + value + '</strong>');
						$("#alert-danger").fadeIn();
					});

					setTimeout(function () {
						$('#btnlogin').prop("disabled", false);
						$("#spinner").hide();
					}, 2000);
				}
			});
		} else {
			$("#error").empty();
			$('#error').append('<strong>All fields are required!</strong>');
			$("#alert-danger").fadeIn();
			setTimeout(function () {
				$("#spinner").hide();
				$('#btnlogin').prop("disabled", false);
			}, 2000);
		}
	});
});

var input = document.getElementById("password");


input.addEventListener("keyup", function (event) {

	if (event.keyCode === 13) {

		event.preventDefault();

		document.getElementById("btnlogin").click();
	}
});

var input = document.getElementById("email");

input.addEventListener("keyup", function (event) {

	if (event.keyCode === 13) {
		event.preventDefault();
		document.getElementById("btnlogin").click();
	}
});



