
    $(document).ready(function () {
		 $('.select2').select2()
            var url = "public/users_system/roles.json";
            $.getJSON(url, function (data) {
                $.each(data, function (index, value) {
                    // APPEND OR INSERT DATA TO SELECT ELEMENT.
                    $('#roles').append('<option value="' + value.Name + '">' + value.Name + '</option>');
                });
            });
    });

	$("#table-search").keyup(function(event) {
		if (event.keyCode === 13) {
			searchtable();
		}
	});




	var ctr = 0;
	$(document).ready(function(){
		searchtable();
	});



	function loadMore(){
		var lastListItem = $("#transaction-table").find("tr").last().attr("id");
		var y = document.getElementById("table-search").value;
		// alert(lastListItem);
		ctr = ctr + 40;
		swal({title: "Please wait...", imageUrl: "AdminLTE/dist/img/loader.gif", showConfirmButton: false});
				$.ajax({
					type : 'post',
					url : 'users_datatable', //Here you will fetch records 
					data :  'action=loadmore&ctr='+ctr+'&wildcard='+y, //Pass $id
					success : function(data){
					if(data == ""){
						
						swal({
							  title: 'Oops...',
							  text: "End of Line",
							  type: "error"
						}).then(function() {
							swal.close();
            			});
					}
					else{
					$('#'+lastListItem).after(data);//Show fetched data from database
					swal.close();
					}
					}
			});
	}

	function searchtable(){
		ctr = 0;
		var y = document.getElementById("table-search").value;
		swal({title: "Please wait...", imageUrl: "AdminLTE/dist/img/loader.gif", showConfirmButton: false});
				$.ajax({
					type : 'post',
					url : 'users_datatable', //Here you will fetch records 
					data :  'action=search&ctr='+ctr+'&wildcard='+y, //Pass $id
					success : function(data){
						$( ".rowings" ).remove();
					if(data == 'No'){
						swal.close();
						swal({
							  title: 'Oops...',
							  text: "End of Line",
							  type: "error"
						}).then(function() {
							swal.close();
            			});
					}
					else{
					$('.fetched-data').after(data);//Show fetched data from database
					swal.close();
					}
					}
			});
	}


	   $(document).on('click', '#reset', function(){
	   var rowid = $(this).data("id");
	   var name = $(this).data("name");
			swal({
			  title: 'Do you want to reset password ' + name + '?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonText: 'Yes, open it!',
			  cancelButtonText: 'Cancel'
			}).then((result) => {
			  if (result.value) {
					$.ajax({
						type : 'post',
						url : 'users', //Here you will fetch records 
						data :  'user_id='+ rowid+"&action=reset_password", //Pass $id
						success : function(data){
							$("#btn").trigger("click");
							swal("Good job!", "You clicked the button!", "success")
						// $('.fetched-data2').html(data);//Show fetched data from database
						}
					});
			  
			  } else {
				
			  }
			})
		});
