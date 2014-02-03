<form method="post" name="login_form" id="login_form" style="width: 300px;">
	<label>Username:&nbsp;</label><input type="text" name="username" autocomplete="off" id="username" /><br />
	<label>Password:&nbsp;</label><input type="password" name="password" autocomplete="off" id="password" /><br />
	<label></label><button type="submit" class="btn"><span><span>Login</span></span></button>
</form>
<script type="text/javascript">

$(document).ready(function(){

  	$('#username').focus();
  	
  	//hide errors to start with
	$('.error').hide(); 
	$("#login_form").submit(function() {  
		//hide errors again when we click the button
		$('.error').hide(); 
		
		//username validation
		var username	= $('#username').val();		
		if( username == ""  ){
			alert("Gotta have a username to login!");
			return false;
		}
		
		//password validation
		var password	= $('#password').val();		
		if( password == ""  ){
			alert("Gotta have a password to login!");
			return false;
		}
				
		var dataString = 'username='+username+'&password='+password;
		
		//alert(dataString);

		$.ajax({  
			type: "POST",  
			url: "/process/login.php",  
			data: dataString,  
			success: function(data, status) { 
				if( data == 0 ){ 
					window.location.replace("/");
				}else{
					$('#login_form').prepend(data);
				}	
			}  
		});
		return false; 
		 
		
	});  
  
});

</script>