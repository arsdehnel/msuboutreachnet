<!-- #include virtual="/functions/global.asp" -->
<link type="text/css" href="/css/iframe.css" rel="stylesheet">
<div id="iframe_page_title">Drop Down Options</div>
<%
	If Len(Request.QueryString) > 0 Then
			
		sql = "SELECT domain_group_value_id, domain_group_code, domain_group_description, domain_value, domain_value_description FROM qry_domain_group_values WHERE domain_group_id = " & Request.QueryString("domain_group_id") & " ORDER BY domain_value"

		Dim arr_result_actions(1,2)
		arr_result_actions(0,0) = "/tools/domain_groups/form.asp?domain_id=" & Request.QueryString("domain_id") & "&"
		arr_result_actions(0,1) = "Edit"
		arr_result_actions(0,2) = "_self"
		arr_result_actions(1,0) = "/tools/domain_groups/remove.asp?"
		arr_result_actions(1,1) = "Remove"
		arr_result_actions(1,2) = "_self"

		data_grid sql, True, arr_result_actions, 0, False, 0, False, Null, Null, "No items for selected domain group", False, 0, False, False, Null, Null
		
		%>
		<div align="right" style="padding-top: 4px;"><input type="button" value="Add New Option" onClick="location.href='form.asp?which=0&domain_group_id=<%=Request.QueryString("domain_group_id")%>';"></div>
		<%
	
	Else
		
		Response.Write("No results")
	
	End If
	
%>