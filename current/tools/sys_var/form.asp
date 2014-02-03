<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Edit Domain Value</div>
<%	
	int_label_width = 100
	
	If Request.QueryString("which") = 0 Then
		int_sys_var_id		= 0
		str_type			= Null
		str_code			= Null
		str_value			= Null
		str_status_code		= "A"
		str_comments		= Null
		str_process_type	= "INSRT"
		str_submit_button	= "Add System Variable"	
	Else
		arr_sys_var_rs		= get_recordset( "prc_sys_var_lookup 'FSYSV'," & Request.QueryString("which") & ",Null,Null,Null" )
		int_sys_var_id		= arr_sys_var_rs(0,0)
		str_type			= arr_sys_var_rs(1,0)
		str_code			= arr_sys_var_rs(2,0)
		str_value			= arr_sys_var_rs(3,0)
		str_status_code		= arr_sys_var_rs(4,0)
		str_comments		= arr_sys_var_rs(5,0)
		str_process_type	= "UPDTE"
		str_submit_button	= "Update System Variable"
	End If

%>
<form action="process.asp" method="post" name="frm_sys_var" class="css_form">
	<label>Type:</label>	<%
		custom_ddlb "prc_lov_lookup 'DVSTD','domain_code=sys_var_type'", "type", Null, str_type, Null, Null, Null, Null, "width: 400px;", 1, Null
	%><br />
	<label>Code:</label><input type="text" name="code" value="<%=str_code%>" style="width: 250px;"><br />
	<label>Value:</label><input type="text" name="value" value="<%=str_value%>" style="width: 400px;"><br />
	<label>Status: </label><%
		custom_ddlb "prc_lov_lookup 'GPSTD', 'domain_code=status_code&domain_group_master_code=active_inactive&sort_by=dv.description'", "status_code", Null, str_status_code, Null, Null, Null, Null, "width: 100px;", 1, Null
	%><br>
	<label>Comments:</label><textarea name="comments" style="width: 400px; height: 250px;"><%=str_comments%></textarea><br />
	<div class="action_box"><a href="#" onClick="frm_sys_var.submit();"><%=str_submit_button%></a>&nbsp;<a href="#" onClick="frm_sys_var.reset();">Reset Form</a>&nbsp;<a href="index.asp">Cancel</a></div>
	<input type="hidden" name="sys_var_id" value="<%=int_sys_var_id%>">
	<input type="hidden" name="process_type" value="<%=str_process_type%>">
	
</form>
<!-- #include virtual="/layout/_bottom.asp" -->