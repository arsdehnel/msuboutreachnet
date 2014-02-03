<%
	Response.Buffer = False
	
	report_header "Past Course Report", Request.Form("action_select")
			
	data_grid "rpt_past_course " & validate_field(Request.Form("last_date"),"ip"), True, Null, 0, False, 0, False, Null, Null, "No data for this past course report", False, 0, False, False, Null, Null

	report_footer Request.Form("action_select")
%>
<!-- #include virtual="/functions/global.asp" -->