<%
	Response.Buffer = False
	
	report_header "Course Report", Request.Form("action_select")
		
	data_grid "rpt_course " & Session.SessionID & "," _
			  & validate_field(Request.Form("start_date"),"ip") & "," _
			  & validate_field(Request.Form("end_date"),"ip") & "," _
			  & validate_field(Request.Form("event_rubric"),"ip") & "," _
			  & validate_field(Request.Form("coordinator_id"),"ip") & "," _
			  & validate_field(Request.Form("event_status"),"ip") & "," _
			  & validate_field(Request.Form("event_owner"),"ip") & "," _
			  & validate_field(Request.Form("location_group"),"ip") & "," _
			  & validate_field(Request.Form("sort_field"),"ip") & "," _
			  & validate_field(Request.Form("sort_order"),"ip") & "," _
			  & Session("user_id"), True, Null, 0, False, 0, False, Null, Null, False, Null, Null, False,  "No data for this course report", False, 0, False, False, Null, "width: 98%;"

	report_footer Request.Form("action_select")
%>
<!-- #include virtual="/functions/global.asp" -->