<form id="new_personnel" action="javascript:alert('success!');">
	<label>First Name:</label><input type="text" style="width: <%=str_label_width%>px" name="first_name" value="<%=str_first_name%>" autocomplete="off"><br />
	<label>Last Name:</label><input type="text" style="width: <%=str_label_width%>px" name="last_name" value="<%=str_last_name%>" autocomplete="off"><br />
	<br />
	<button type="submit" class="btn"><span><span>Save & Close</span></span></button>
	<button type="button" onclick="close_form();" class="btn"><span><span>Cancel</span></span></button>
	<br /><br />
	<input type="hidden" name="process_type" value="INSRT" />
	<input type="hidden" name="type" value="EX" />
	<input type="hidden" name="status_code" value="A" />
	<input type="hidden" name="w9_ind" value="N" />
</form>

<script type="text/javascript">
// When the form is submitted
$("form#new_personnel").submit(function(){  

	// Hide 'Submit' Button
	$('form#new_personnel button[type=submit]').hide();

	// 'this' refers to the current submitted form  
	var str = $(this).serialize();  

	// -- Start AJAX Call --

	$.ajax({  
    	type: "POST",
	    url: "/events/hold/contact/process.asp",  // Send the login info to this page
    	data: str,  
	    success: function(msg){  
   
   			var dtls = msg.split('|');
   			personnel_id = dtls[0];
   			personnel_name = dtls[1];
   			alert_msg = dtls[2] + " added successfully, they are now listed at the bottom of the personnel selection list.";
   
   			$("#personnel_select").append("<option value=\"" + personnel_id + "\">" + personnel_name + "</option>");
   			alert(alert_msg);
   
		}  
   
	});  
  
	// -- End AJAX Call --
	
	$('#modal_close').trigger('click');

return false;

}); // end submit event

</script>