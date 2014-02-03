<?	

/*
	If Request.QueryString("which") = 0 Then
		int_logistics_id		= 0
		int_event_id			= Request.QueryString("event_id")
		str_logistics_type		= Request.QueryString("type")
		str_process_type		= "INSRT"
	End If
	
	If str_logistics_type = "EQP" Then
		str_first_option = "[ Please select an equipment item ]"
		str_details_comment = "Microphone and Other only"
	Else
		str_first_option = "[ Please select a catering item ]"
		str_details_comment = "Linens, Meal and Other only"
	End If
*/
?>
<form action="process.asp" method="post">
	<label for="event_id" style="width: 80px;">Item: </label>
	<%
		domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'logistics_type_" & LCase(str_logistics_type) & "'", "domain_value_description", "logistics_title", "", str_logistics_type, "", "", str_first_option, "width: 200px;", 1, 0, Null
	%><br />
	<label for="type" style="width: 80px;">Details: </label><input type="text" name="logistics_details" value="<%=str_logistics_details%>">&nbsp;<em style="font-size: 10px; font-family: Arial, Helvetica, sans-serif;"><%=str_details_comment%></em><br>
	<center><input type="submit" value="Save">&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" onClick="location.href='iframe.asp?which=<%=int_event_id%>&type=<%=str_logistics_type%>'"></center>
	<input type="hidden" name="logistics_id" value="<%=int_logistics_id%>">
	<input type="hidden" name="event_id" value="<%=int_event_id%>">
	<input type="hidden" name="logistics_type" value="<%=str_logistics_type%>">
	<input type="hidden" name="process_type" value="<%=str_process_type%>">
</form>