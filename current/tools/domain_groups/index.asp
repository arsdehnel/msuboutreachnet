<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Edit Domain Groups</div>
<center><form name="frm_check_availability">
	<label style="width: 160px;">Select Domain Group:</label><%
		custom_ddlb "prc_lov_lookup 'GPIDD',Null", "domain_group_master_id", Null, Cint(Request.QueryString("domain_group_master_id")), "location.href='index.asp?domain_group_master_id=' + this.value;", Null, "[ Please select a domain group ]", Null, "width: 300px;", 1, Null
	%>
</form></center>
<%
	If Request.QueryString("domain_group_master_id") <> "" Then
		%>
		<div align="center" style="padding-top: 4px;"><input type="button" value="Add New Option" onClick="location.href='form.asp?domain_group_master_id=<%=Request.QueryString("domain_group_master_id")%>';"></div>
		<%
	End If

	Dim arr_result_actions(1,3,0)
	arr_result_actions(0,0,0) = "/tools/domain_groups/form.asp?domain_group_master_id=" & Request.QueryString("domain_group_master_id") & "&"
	arr_result_actions(0,1,0) = "Edit"
	arr_result_actions(0,2,0) = "_self"
	arr_result_actions(0,3,0) = Null
	arr_result_actions(1,0,0) = "#"
	arr_result_actions(1,1,0) = "Remove"
	arr_result_actions(1,2,0) = "_self"
	arr_result_actions(1,3,0) = "if(confirm('Are you sure you want to remove this item from this domain group?')) document.location.href='remove.asp?domain_group_master_id=" & Request.QueryString("domain_group_master_id") & "&domain_group_detail_id="

	data_grid "prc_domain_lookup 'LGPDT',Null," & validate_field(Request.QueryString("domain_group_master_id"),"ip") & ",Null,Null,Null", True, arr_result_actions, 0, False, 0, False, Null, Null, False, Null, Null, False, "No items for selected domain group", False, 0, False, False, "std_dg", Null
	
	If Request.QueryString("domain_group_master_id") <> "" Then
		%>
		<div align="center" style="padding-top: 4px;"><input type="button" value="Add New Option" onClick="location.href='form.asp?domain_group_master_id=<%=Request.QueryString("domain_group_master_id")%>';"></div>
		<%
	End If

%>
<!-- #include virtual="/layout/_bottom.asp" -->