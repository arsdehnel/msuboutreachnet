<!-- #include virtual="/functions/global.asp" -->
<link rel="stylesheet" type="text/css" href="/css/sfrm_event_information.css">
<link rel="stylesheet" type="text/css" href="/css/sfrm_iframe.css">
<%
	Dim arr_result_actions(0,3,0)

	arr_result_actions(0,0,0) = "#"
	arr_result_actions(0,1,0) = "Remove"
	arr_result_actions(0,2,0) = "_self"
	arr_result_actions(0,3,0) = "if(confirm('Are you sure you want to remove this mailing list from this personnel?')) location.href='/personnel/maintenance/forms/mailing_lists/remove.asp?personnel_id=" & Request.QueryString("which") & "&mailing_list_detail_id="

	data_grid "prc_mailing_list_lookup 'LPSNL',Null,Null," & validate_field(Request.QueryString("which"),"ip") & ",Null,Null", True, arr_result_actions, 0, False, 0, False, Null, Null, False, Null, Null, False, "No mailing lists found", False, 0, False, False, "ei_dg", Null
		
%>