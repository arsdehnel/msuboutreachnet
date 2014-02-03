<?
	require_once('/home/www/pm_common/system.php');

	$actions	= array(
						array(
							'label' => 'Edit',
							'class' => 'btn modal primary',
							'href' => '/modal/event_forms/personnel.php?event_personnel_id=%%&event_master_id=' . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id )
						), 
						array(
							'label' => 'Remove',
							'class' => 'btn modal',
							'href' => '/modal/confirm.php?rec_type=event_personnel&event_personnel_id=%%&event_master_id=' . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id )
						) 
				  );

	prc_data_grid( "SELECT ep.event_personnel_id
					  ,p.last_name || ', ' || p.first_name as \"Name\"
					  ,r.description as \"Role\"
					  ,ep.compensation as \"Compensation\"
					  ,pm.description as \"Payment Method\"	
					  ,ep.primary_ind as \"Primary?\"
					FROM arsdehnel_msub.event_personnel ep
					  ,arsdehnel_msub.personnel p
					  ,arsdehnel_msub.vue_domain_group_value r
					  ,arsdehnel_msub.vue_domain_value pm
					WHERE ep.personnel_id = p.personnel_id
					  AND r.d_code = 'event_personnel_role'
					  AND r.dv_code = ep.psnl_role
					  AND pm.code = ep.pymt_method
					  AND pm.domain_code = 'payment_method'
					  AND ep.status_code = 'A'
					  AND p.status_code = 'A'
					  AND ep.psnl_type = '" . nvl( $psnl_type, $_GET['psnl_type'] ) . "'
					  AND ep.event_master_id = " . nvl( $_GET['event_master_id'], $event_master_obj -> event_master_id )
					,'Y'
					,$actions );

/*				
	Dim arr_result_actions_2(2,3,0)

	arr_result_actions_2(0,0,0) = "/events/maintenance/forms/personnel/form.asp?"
	arr_result_actions_2(0,1,0) = "Edit"
	arr_result_actions_2(0,2,0) = "_self"
	arr_result_actions_2(0,3,0) = Null
	arr_result_actions_2(1,0,0) = "/events/maintenance/forms/personnel/maint/index.asp?"
	arr_result_actions_2(1,1,0) = "Update Profile"
	arr_result_actions_2(1,2,0) = "_self"
	arr_result_actions_2(1,3,0) = Null
	arr_result_actions_2(2,0,0) = "#"
	arr_result_actions_2(2,1,0) = "Remove"
	arr_result_actions_2(2,2,0) = "_self"
	arr_result_actions_2(2,3,0) = "if(confirm('Are you sure you want to remove this external personnel?')) location.href='/events/maintenance/forms/personnel/remove.asp?event_id=" & Request.QueryString("which") & "&ep_id="

	data_grid "prc_event_personnel_lookup 'LEIFE',Null," & validate_field(Request.QueryString("which"),"ip") & ",Null", True, arr_result_actions_2, 0, False, 0, False, Null, Null, False, Null, Null, False, "No external personnel selected for this event", False, 0, False, False, "ei_dg", Null
*/	
?>