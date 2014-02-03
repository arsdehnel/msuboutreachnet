<?
	require_once('/home/www/pm_common/system.php');
						  
	/*
		Dim arr_result_actions(2,3,0)

		arr_result_actions(0,0,0) = "/events/maintenance/forms/dtl/form.asp?"
		arr_result_actions(0,1,0) = "Edit"
		arr_result_actions(0,2,0) = "_self"
		arr_result_actions(0,3,0) = Null
		arr_result_actions(1,0,0) = "/events/maintenance/forms/dtl/outlook.asp?"
		arr_result_actions(1,1,0) = "Outlook"
		arr_result_actions(1,2,0) = "_blank"
		arr_result_actions(1,3,0) = Null
		arr_result_actions(2,0,0) = "#"
		arr_result_actions(2,1,0) = "Remove"
		arr_result_actions(2,2,0) = "_self"
		arr_result_actions(2,3,0) = "if(confirm('Are you sure you want to remove this date, time and location listing?')) location.href='/events/maintenance/forms/dtl/remove.asp?event_id=" & Request.QueryString("which") & "&dtl_id="

		data_grid "prc_event_dtl_lookup 'LEVDT',Null," & Request.QueryString("which") & ",Null", True, arr_result_actions, 0, False, 0, False, Null, Null, False, Null, Null, False, "No dates, times and locations entered for this event", False, 0, False, False, "ei_dg", Null
	*/

	$actions	= array(
						array(
							'label' => 'Edit',
							'class' => 'btn modal primary',
							'href' => '/modal/event_forms/dtl.php?event_dtl_id=%%&event_master_id=' . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id )
						), 
						array(
							'label' => 'Remove',
							'class' => 'btn modal',
							'href' => '/modal/confirm.php?rec_type=event_dtl&event_dtl_id=%%&event_master_id=' . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id )
						) 
				  );

	prc_data_grid( "SELECT ed.event_dtl_id
						,ed.recurrence_ind as \"Recurrence\"
						,to_char(ed.start_date,'MM/DD/YYYY') as \"Start Date\"
						,to_char(ed.end_date,'MM/DD/YYYY') as \"End Date\"
						,st.description as \"Start Time\"
						,et.description as \"End Time\"
						,l.description as \"Location\"
						,ed.primary_ind as \"Primary?\"
					FROM arsdehnel_msub.event_dtl ed
					  ,arsdehnel_msub.domain_value l
					  ,arsdehnel_msub.domain_value st
					  ,arsdehnel_msub.domain_value et
					WHERE ed.location_id = l.domain_value_id
					  AND ed.start_time = st.code
					  AND ed.end_time = et.code
					  AND st.domain_id = (select domain_id
					  					  from arsdehnel_msub.domain
					  					  where code = 'dtl_time')
					  AND et.domain_id = (select domain_id
					  					  from arsdehnel_msub.domain
					  					  where code = 'dtl_time')
					  AND ed.event_master_id = " . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id ) . "
					  AND ed.status_code = 'A'"
					,'Y'
					,$actions );
	
?>