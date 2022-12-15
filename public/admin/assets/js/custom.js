$(document).ready(function(){
	$('#cpassword').keyup(function(){
		var cpassword = $(this).val();
		$.ajax({
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
			type:'POST',
			url:'/admin/check-admin-password',
			data:{cpassword:cpassword},
			success:function(resp){
				/*alert(resp);*/
				if(resp=="false"){
					$("#check_password").html("<font color='red'>Current Password is Incurrect!</font>");
				}else if(resp=="true"){
					$("#check_password").html("<font color='green'>Current Password Currect.</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	// employee status change

	$(document).on("click",".updateEmployeeStatus",function(){
		var status = $(this).children("i").attr("status");
		var employee_id= $(this).attr("employee_id");
		$.ajax({
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
			type:'POST',
			url:'/admin/update-employee-status',
			data:{status:status,employee_id:employee_id},
			success:function(resp){
				//alert(resp);
				if(resp['status']==0){
					$('#employee-'+employee_id).html("<i  style='font-size: 25px; color:red' class='fa fa-toggle-off' status='Inactive'></i>");
				}else if(resp['status']==1){
					$('#employee-'+employee_id).html("<i  style='font-size: 25px; color:green' class='fa fa-toggle-on' status='Active'></i>");
				}
			},
			error:function(){
				alert("Error");
			}
		});
	});

	//confirm deletion sweet alert javascript
	
		$(document).on("click",".confirmDelete",function(){
		var module = $(this).attr('module');
		var moduleid = $(this).attr('moduleid');
		
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.isConfirmed) {
		    Swal.fire(
		      'Deleted!',
		      'Your file has been deleted.',
		      'success'
		    )
		    window.location = "/admin/delete-"+module+"/"+moduleid;
		  }
	    })
	});
});