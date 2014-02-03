<!-- #include virtual="/functions/global.asp" -->
<%
	Response.ContentType = "application/vnd.ms-excel"

	data_grid "prc_event_lookup 'LEVTL'," & validate_field(Request.Form("event_id"), "ip") & ", " & validate_field(Request.Form("event_crn"), "ip") & ", " & validate_field(Request.Form("event_rubric"), "ip") & ", " & validate_field(Request.Form("event_number"), "ip") & ", " & validate_field(Request.Form("event_section"), "ip") & ", " & validate_field(Request.Form("event_quarter"), "ip") & ", " & validate_field(Request.Form("event_semester"), "ip") & ", " & validate_field(Request.Form("event_year"), "ip") & ", " & validate_field(Request.Form("event_title"), "ip") & ", " & validate_field(Request.Form("start_date"), "ip") & ", " & validate_field(Request.Form("end_date"), "ip") & ", Null", True, arr_actions, 0, False, 0, False, Null, Null, True, "background-color: #EFEFEF;", Null, False, "No events matched search criteria", False, 0, False, False, "std_dg", Null
	
%>