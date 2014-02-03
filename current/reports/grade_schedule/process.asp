<%
	Response.Buffer = False
	
	report_header "Grades Schedule Report", Request.Form("action_select")
		
	data_grid "rpt_grade_schedule", True, Null, 0, True, 0, True, Null, Null, False, Null, Null, False, "No data for this report", False, 0, False, False, Null, Null

	report_footer Request.Form("action_select")
%>
<!-- #include virtual="/functions/global.asp" -->