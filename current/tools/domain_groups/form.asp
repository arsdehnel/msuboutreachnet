<!-- #include virtual="/layout/_top.asp" -->
<%	
	int_label_width = 100
	
	If Request.QueryString("which") = 0 Then
		int_domain_group_detail_id		= 0
		int_domain_group_master_id		= Request.QueryString("domain_group_master_id")
		int_domain_value_id				= Null
		str_alias						= Null
		str_comments					= Null
		str_process_type				= "INSRT"
		str_submit_button_text 			= "Add Domain Group Detail"
	Else
		arr_domain_group_value_recordset = get_recordset( "prc_domain_lookup 'FDGPD',Null,Null," & validate_field(Request.QueryString("which"),"ip") & ",Null,Null" )
		int_domain_group_detail_id		= arr_domain_group_value_recordset(0,0)
		int_domain_group_master_id		= arr_domain_group_value_recordset(1,0)
		int_domain_value_id				= arr_domain_group_value_recordset(2,0)
		str_alias						= arr_domain_group_value_recordset(3,0)
		str_comments					= arr_domain_group_value_recordset(4,0)
		str_process_type				= "UPDTE"
		str_submit_button_text			= "Update Domain Group Detail"
	End If
	
%>
<center>
	<form action="process.asp" method="post" name="frm_domain_group_detail">
		<label style="width: 125px;">Domain Value:</label><%
			custom_ddlb "prc_lov_lookup 'DVIDI','domain_group_master_id=" & int_domain_group_master_id & "'", "domain_value_id", Null, int_domain_value_id, Null, Null, "[ Please select a domain value ]", Null, "width: 250px;", 1, Null
		%><br />
		<label style="width: 125px;">Alias:</label><input type="text" value="<%=str_alias%>" name="alias" style="width: 250px;"><br>
		<input type="button" value="<%=str_submit_button_text%>" onclick="validate();">&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" onClick="location.href='index.asp?domain_group_master_id=<%=Request.QueryString("domain_group_master_id")%>';">
		<input type="hidden" name="domain_group_master_id" value="<%=int_domain_group_master_id%>">
		<input type="hidden" name="domain_group_detail_id" value="<%=int_domain_group_detail_id%>">
		<input type="hidden" name="comments" value="<%=str_comments%>">
		<input type="hidden" name="process_type" value="<%=str_process_type%>">
	</form>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->
<script language="JavaScript">
	function validate(){
	
		if(frm_domain_group_detail.domain_value_id.value.length == 0){
			alert("Please select a domain value.");
		}
		else{
			frm_domain_group_detail.submit();
		}
	
	}
</script>