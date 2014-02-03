<!-- #include virtual="/functions/global.asp" -->
<link rel="stylesheet" type="text/css" href="/css/sfrm_event_information.css">
<link rel="stylesheet" type="text/css" href="/css/sfrm_iframe.css">
<body>
<%
	
	Dim arr_result_actions(1,3,0)

	arr_result_actions(0,0,0) = "/mailing_lists/maintenance/members/form.asp?"
	arr_result_actions(0,1,0) = "Edit"
	arr_result_actions(0,2,0) = "_self"
	arr_result_actions(0,3,0) = Null
	arr_result_actions(1,0,0) = "#"
	arr_result_actions(1,1,0) = "Remove"
	arr_result_actions(1,2,0) = "_self"
	arr_result_actions(1,3,0) = "if(confirm('Are you sure you want to remove this member?')) location.href='remove.asp?mailing_list_master_id=" & Request.QueryString("which") & "&mailing_list_detail_id="

	data_grid "prc_mailing_list_lookup 'LMLMB'," & validate_field(Request.QueryString("which"),"ip") & ",Null,Null,Null,Null", True, arr_result_actions, 0, False, 0, False, Null, Null, False, Null, Null, False, "No mailing lists found", False, 0, False, False, "ei_dg", Null

%>
</body>