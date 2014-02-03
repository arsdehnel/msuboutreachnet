<%
	Response.Buffer = False
	
	report_header Request.Form("report_title"), Request.Form("action_select")
			
	data_grid "rpt_calendar_custom " & Session.SessionID & "," & validate_field(Request.Form("start_date"),"ip") & "," & validate_field(Request.Form("end_date"),"ip") & "," & validate_field(Request.Form("event_rubric"),"ip") & "," & validate_field(Request.Form("location_id"),"ip") & "," & validate_field(Request.Form("location_group"),"ip") & "," & Session("user_id"), True, Null, 0, False, 12, True, "CA", "text-decoration: line-through;", False, Null, Null, False, "No data for this custom calendar", False, 0, False, False, Null, Null
	
	report_footer Request.Form("action_select")
%>
<!-- #include virtual="/functions/global.asp" -->
