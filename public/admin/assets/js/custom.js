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
	})
});