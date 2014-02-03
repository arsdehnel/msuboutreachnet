<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Edit Drop Downs</div>
<center><form name="frm_check_availability">
	<label style="width: 100px;">Select Domain:</label><%
		custom_ddlb "prc_lov_lookup 'DOMNS',Null", "domain_id", Null, Request.QueryString("domain_id"), "location.href='index.asp?domain_id=' + this.value;", Null, "[ Please select a domain ]", Null, "width: 300px;", 1, Null
	%>
</form></center>
<%
	If Request.QueryString("domain_id") <> "" Then
		%>
		<div align="center" style="padding-top: 4px;"><input type="button" value="Add New Option" onClick="location.href='form.asp?domain_id=<%=Request.QueryString("domain_id")%>';"></div>
		<%
	End If

	Dim arr_result_actions(1,3,0)
	arr_result_actions(0,0,0) = "/tools/domains/form.asp?domain_id=" & Request.QueryString("domain_id") & "&"
	arr_result_actions(0,1,0) = "Edit"
	arr_result_actions(0,2,0) = "_self"
	arr_result_actions(0,3,0) = Null
	arr_result_actions(1,0,0) = "/tools/domains/remove.asp?"
	arr_result_actions(1,1,0) = "Remove"
	arr_result_actions(1,2,0) = "_self"
	arr_result_actions(1,3,0) = Null

	data_grid "prc_domain_lookup 'LDMVL'," & validate_field(Request.QueryString("domain_id"),"ip") & ",Null,Null,Null,Null", True, arr_result_actions, 0, False, 0, False, Null, Null, False, Null, Null, False, "No items for selected domain", False, 0, False, False, "std_dg", Null
	
	If Request.QueryString("domain_id") <> "" Then
		%>
		<div align="center" style="padding-top: 4px;"><input type="button" value="Add New Option" onClick="location.href='form.asp?domain_id=<%=Request.QueryString("domain_id")%>';"></div>
		<%
	End If

	If Session("security_level") = 9 Then
		%>
		<center><input type="button" value="Add New Domain" onClick="location.href='new_domain/form.asp?which=0'"></center>	
		<%
	End If
%>
<!-- #include virtual="/layout/_bottom.asp" -->