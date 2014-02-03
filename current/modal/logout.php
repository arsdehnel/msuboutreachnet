<div id="message_wrapper">Clearing session variables...</div>
<script type="text/javascript">

$(document).ready(function(){

	$.ajax({  
		type: "POST",  
		url: "/process/logout.php",  
		success: function(data, status) {  
			$('#message_wrapper').html("<div id='message'>Session cleared.</div>").parent().parent().parent().delay(1000).fadeOut(1800); 
			window.location.replace("/");
		}  
	});
	
});

</script>