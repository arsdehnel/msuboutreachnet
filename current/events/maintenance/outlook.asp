<!-- #include virtual="/functions/global.asp" -->
<link type="text/css" href="/css/iframe.css" rel="stylesheet">
<%
	arr_outlook_rs	= get_recordset( "prc_event_dtl_lookup 'LOUTL',Null," & validate_field(Request.QueryString("which"),"ip") & ",Null" )
	int_dtl_count	= arr_outlook_rs(1,0)
	
	If int_dtl_count = 0 Then
	
		Response.Write("There are no dates, times and locations entries to export to Outlook.  Please make sure you selected the correct event and that there are listing on the Dates, Times and Locations tab.  If you feel you have reached this message in error, please contact the webmaster.")
		
	Elseif int_dtl_count = 1 Then
	
		int_dtl_id = arr_outlook_rs(0,0)
	
		create_outlook_event int_dtl_id, "Return to event listing page", "javascript:window.close();"
	
	Elseif int_dtl_count > 1 Then
	
		Response.Write("There are multiple entries for dates, times and locations for this event.  Please click on each item below to export them to Outlook.<ul>")
		
		Dim arr_result_actions(0,3,0)
	
		arr_result_actions(0,0,0) = "/events/maintenance/forms/dtl/outlook.asp?"
		arr_result_actions(0,1,0) = "Outlook"
		arr_result_actions(0,2,0) = "_blank"
		arr_result_actions(0,3,0) = Null
	
		data_grid "prc_event_dtl_lookup 'LOUTL',Null," & validate_field(Request.QueryString("which"),"ip") & ",Null", True, arr_result_actions, 0, False, 1, False, 0, Null, False, Null, Null, False, "No events found", False, 0, False, False, "ei_dg", Null
		
		Response.Write("</ul>")
	
	End If		

%>