<%
	Response.Buffer = False
	
	report_header "Budgeting Report", Request.Form("action_select")

	data_grid "rpt_budgeting " & validate_field(Request.Form("budget_item_id"),"ip") & "," & validate_field(Request.Form("start_date"),"ip") & "," & validate_field(Request.Form("end_date"),"ip"), True, Null, 0, True, 0, True, "Total", "background-color: #CCCCCC; font-weight: bold;", False, Null, Null, False, "No data for this budgeting report", False, 0, False, False, Null, Null

	report_footer Request.Form("action_select")
%>
<!-- #include virtual="/functions/global.asp" -->