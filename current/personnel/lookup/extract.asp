<!-- #include virtual="/functions/global.asp" -->
<%
	Response.ContentType = "application/vnd.ms-excel"

	data_grid "prc_personnel_lookup 'LPLKP',Null," & validate_field(Request.Form("type"),"ip") & "," & validate_field(Request.Form("first_name"),"ip") & "," & validate_field(Request.Form("last_name"),"ip") & ",Null", True, arr_result_actions, 0, False, 0, False, Null, Null, True, "background-color: #EFEFEF;", Null, False, "No events matched search criteria", False, 0, False, False, "std_dg", Null

%>