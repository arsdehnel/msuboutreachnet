<!-- #include virtual="/layout/_top.asp" -->
<%
	If Request.QueryString("page") = "" Then
		str_first_name		= Request.Form("first_name")
		str_last_name		= Request.Form("last_name")
		str_type			= Request.Form("personnel_type")
	Else
		str_first_name		= Request.QueryString("first_name")
		str_last_name		= Request.QueryString("last_name")
		str_type			= Request.QueryString("personnel_type")
	End If
%>
<body onLoad="frm_personnel_search.first_name.focus();">
<div id="page_title">Personnel Lookup</div>
<form action="index.asp" method="post" name="frm_personnel_search" onSubmit="return validate('index.asp');">
	<table width="95%" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td>
				<label for="first_name">First Name:</label>
				<input style="width: 200px;" name="first_name" value="<%=str_first_name%>">
			</td>
			<td>
				<label for="last_name">Last Name:</label>
				<input style="width: 200px;" name="last_name" value="<%=str_last_name%>">
			</td>
			<td>
				<label for="type">Personnel Type</label>
				<%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'personnel_type'", "domain_value_description", "type", "", str_type, "", "", "All Personnel Types", "width: 200px;", 1, 0, Null
				%>
			</td>
		<tr>
			<td colspan="8" align="center">
				<br>
				<input type="submit" value="Search Personnel">&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset Criteria">&nbsp;&nbsp;&nbsp;<input type="button" value="Extract Results" onClick="validate('extract.asp');">
				<input type="hidden" name="query" value="Y">
			</td>
		</tr>
	</table>
	<%
		If (Request.Form("query") = "Y" and Len(Request.Form) > 36) or (Request.QueryString("query") = "Y" and Len(Request.QueryString) > 36) Then
				
			Dim arr_result_actions(1,3,0)
		
			arr_result_actions(0,0,0) = "/personnel/maintenance/index.asp?"
			arr_result_actions(0,1,0) = "View"
			arr_result_actions(0,2,0) = "_top"
			arr_result_actions(0,3,0) = Null
			arr_result_actions(1,0,0) = "#"
			arr_result_actions(1,1,0) = "Remove"
			arr_result_actions(1,2,0) = "_top"
			arr_result_actions(1,3,0) = "if(confirm('Are you sure you want to remove this personnel?')) location.href='/personnel/maintenance/remove.asp?personnel_id="
			
			data_grid "prc_personnel_lookup 'LPLKP',Null," & validate_field(str_type,"ip") & "," & validate_field(str_first_name,"ip") & "," & validate_field(str_last_name,"ip") & ",Null", True, arr_result_actions, 0, False, 0, False, Null, Null, True, "background-color: #EFEFEF;", Null, False, "No events matched search criteria", False, Session("records_per_page"), False, True, "std_dg", Null
						
		End If
	%>
	
</form>
</body>
<!-- #include virtual="/layout/_bottom.asp" -->
<script language="JavaScript">
 
	function validate(str_action){
	
		document.frm_event_search.action = str_action; 
		return true;
	
	}
</script>