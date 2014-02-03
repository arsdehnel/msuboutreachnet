<!-- #include virtual="/functions/global.asp" -->
<link rel="stylesheet" type="text/css" href="/css/sfrm_event_information.css">
<link rel="stylesheet" type="text/css" href="/css/sfrm_iframe.css">
<%
	Dim arr_result_actions(1,3,0)

	arr_result_actions(0,0,0) = "/personnel/maintenance/forms/postal_addresses/form.asp?personnel_id=" & Request.QueryString("which") & "&"
	arr_result_actions(0,1,0) = "Edit"
	arr_result_actions(0,2,0) = "_self"
	arr_result_actions(0,3,0) = Null
	arr_result_actions(1,0,0) = "#"
	arr_result_actions(1,1,0) = "Remove"
	arr_result_actions(1,2,0) = "_self"
	arr_result_actions(1,3,0) = "if(confirm('Are you sure you want to remove this postal address?')) location.href='/personnel/maintenance/forms/postal_addresses/remove.asp?personnel_id=" & Request.QueryString("which") & "&address_id="

	data_grid "prc_personnel_address_lookup 'LPSNL',Null," & validate_field(Request.QueryString("which"),"ip") & ",Null", True, arr_result_actions, 0, False, 0, False, Null, Null, False, Null, Null, False, "No postal addresses found", False, 0, False, False, "ei_dg", Null
		
%>