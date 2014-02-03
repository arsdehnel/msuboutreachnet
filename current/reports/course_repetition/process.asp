<%
	Response.Buffer = False
	
	report_header "Course Repetition Report", Request.Form("action_select")
	
	data_grid "rpt_course_repetition " & Session.SessionID & "," & validate_field(Request.Form("start_date"),"ip") & "," & validate_field(Request.Form("end_date"),"ip") & "," & validate_field(Request.Form("coordinator_id"),"ip") & "," & validate_field(Request.Form("event_year"),"ip") & "," & validate_field(Request.Form("event_quarter"),"ip") & "," & Session("user_id"), True, Null, 0, False, 0, False, Null, Null, False, Null, Null, False, "No data for this course repetition report", False, 0, False, False, Null, "width: 98%;"

	report_footer Request.Form("action_select")
%>
<!-- #include virtual="/functions/global.asp" -->