<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Edit Domain Value</div>
<%	
	int_label_width = 100
	
	If Request.QueryString("which") = 0 Then
		int_domain_value_id				= 0
		int_domain_id					= Request.QueryString("domain_id")
		str_domain_value				= ""
		str_domain_value_description	= ""
		str_submit_button_text 			= "Add Domain Value"
		str_process_type				= "INSRT"
	Else
		arr_domain_value_recordset 		= get_recordset( "prc_domain_lookup 'FORMV'," & validate_field(Request.QueryString("domain_id"),"ip") & ",Null,Null," & validate_field(Request.QueryString("which"),"ip") & ",Null" )
		int_domain_value_id				= arr_domain_value_recordset(0,0)
		int_domain_id					= arr_domain_value_recordset(1,0)
		str_domain_value				= arr_domain_value_recordset(2,0)
		str_domain_value_description	= arr_domain_value_recordset(3,0)
		str_submit_button_text 			= "Update Domain Value"
		str_process_type				= "UPDTE"
	End If
%>
<center>
<form action="/tools/domains/process.asp" method="post" name="frm_domain_value" onsubmit="validate();" class="css_form">
	<label for="list_id" style="width: <%=int_label_width%>px;">Value:</label><input type="text" value="<%=str_domain_value%>" name="code" style="width: 250px;"><br>
	<label for="list_id" style="width: <%=int_label_width%>px;">Description:</label><input type="text" value="<%=str_domain_value_description%>" name="description" style="width: 250px;"><br>
	<input type="submit" value="<%=str_submit_button_text%>">&nbsp;&nbsp;&nbsp;
	<input type="button" value="Cancel" onClick="location.href='index.asp?domain_id=<%=Request.QueryString("domain_id")%>';">
	<input type="hidden" name="domain_value_id" value="<%=int_domain_value_id%>">
	<input type="hidden" name="domain_id" value="<%=int_domain_id%>"><br>
	<input type="hidden" name="process_type" value="<%=str_process_type%>"><br>
</form>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->
<script language="JavaScript">
	function validate(){
	
		var str_domain_value = document.frm_domain_value.code.value;
		
		if(str_domain_value.indexOf(" ") >= 0){
			alert("No spaces are allowed in the domain value field");
			return false;
		}
		else{
			return true;
		}

	}
</script>