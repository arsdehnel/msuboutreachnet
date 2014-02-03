<%
	Response.Buffer = False
	
	report_header "Payroll Report", Request.Form("action_select")
		
	data_grid "rpt_payroll " & validate_field(Request.Form("start_date"),"ip") & "," & validate_field(Request.Form("end_date"),"ip"), True, Null, 0, True, 0, True, Null, Null, False, Null, Null, False, "No data for this payroll report", False, 0, False, False, Null, Null

	report_footer Request.Form("action_select")
%>
<!-- #include virtual="/functions/global.asp" -->