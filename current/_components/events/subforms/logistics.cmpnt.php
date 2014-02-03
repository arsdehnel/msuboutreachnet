<?

echo 'logistics subform, type: ' . nvl( $type, $_GET['type'] );

/*	
	Dim arr_result_actions(0,3,0)
	
	arr_result_actions(0,0,0) = "#"
	arr_result_actions(0,1,0) = "Remove"
	arr_result_actions(0,2,0) = "_self"
	arr_result_actions(0,3,0) = "if(confirm('Are you sure you want to remove this logistics item?')) location.href='/events/maintenance/forms/logistics/remove.asp?event_id=" & Request.QueryString("which") & "&type=" & Request.QueryString("type") & "&logistics_id="
	
	If Request.QueryString("type") = "EQP" Then
		str_no_records_text = "No equipment needs entered for this event"
	Elseif Request.QueryString("type") = "CAT" Then
		str_no_records_text = "No catering needs entered for this event"
	End If
	
	data_grid "prc_event_logistics_lookup 'LEIFM',Null," & validate_field(Request.QueryString("which"),"ip") & "," & validate_field(Request.QueryString("type"),"ip") & ",Null", True, arr_result_actions, 0, False, 0, False, Null, Null, False, Null, Null, False, str_no_records_text, False, 0, False, False, "ei_dg", Null
	*/
?>