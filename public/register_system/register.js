$(function () {
			$('#register_form').submit(function(e) {
			  e.preventDefault();
			  swal({title: 'Please wait...', imageUrl: './public/images/loader/green-loader.gif', showConfirmButton: false});
			  
			  var password = $("#password").val();
			  var confirm_password = $("#confirm_password").val();
			  if(password != confirm_password){
				swal({
					title: 'Information',
					text: 'Passwords do not match',
					type: "error"
				}).then(function() {
					swal.close();
				});

			  }
			  else{
				$.ajax({
					type: 'post',
					url: 'register',
					data: $('#register_form').serialize(),
					success: function (results) {
						if(results == 'done_register'){
							swal({
								title: 'Information',
								text: 'You may now login',
								type: "success"
							}).then(function() {
								window.location.replace("login");
							});
						}
						else if(results == 'already_exist'){
							swal({
								title: 'Information',
								text: 'Account already exist!',
								type: "error"
							}).then(function() {
								swal.close();
							});
						}
						else if(results == 'non_existing'){
							swal({
								title: 'Information',
								text: 'No ETRACS Account. Coordinate to IT Staff',
								type: "error"
							}).then(function() {
								swal.close();
							});
						}
	
	
						
					}
				  });
			  }




			  
			});
  });