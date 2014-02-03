<?	
	require_once('/home/www/pm_common/system.php');

$actions	= array(
						array(
							'label' => 'Edit',
							'class' => 'btn modal primary',
							'href' => '/modal/event_forms/credits.php?event_credit_id=%%&event_master_id=' . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id )
						), 
						array(
							'label' => 'Remove',
							'class' => 'btn modal',
							'href' => '/modal/confirm.php?rec_type=event_credit&event_credit_id=%%&event_master_id=' . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id )
						) 
				  );

		prc_data_grid( "SELECT ec.event_credit_id
						  ,t.description as \"Type\"
						  ,ec.item_desc as \"Description\"
						  ,'$' || ec.per_unit_amt || ' / ' || i.description as \"Charge / Unit\"
						  ,ec.item_qty as \"Quantity\"
						  ,'$' || ( ec.item_qty * ec.per_unit_amt ) as \"Charge\"
						  ,ec.primary_ind as \"Primary\"
						FROM arsdehnel_msub.event_credits ec
						  ,arsdehnel_msub.domain_value t
						  ,arsdehnel_msub.domain_value i
						WHERE ec.type_id = t.domain_value_id
						  AND ec.per_unit_item_id = i.domain_value_id
						  AND ec.event_master_id = " . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id ) . "
						  AND ec.status_code = 'A'"
						 ,'Y'
						 ,$actions );
/*
	Dim arr_result_actions(1,3,0)
	
	arr_result_actions(0,0,0) = "/events/maintenance/forms/credits/form.asp?"
	arr_result_actions(0,1,0) = "Edit"
	arr_result_actions(0,2,0) = "_self"
	arr_result_actions(0,3,0) = Null
	arr_result_actions(1,0,0) = "#"
	arr_result_actions(1,1,0) = "Remove"
	arr_result_actions(1,2,0) = "_self"
	arr_result_actions(1,3,0) = "if(confirm('Are you sure you want to remove this credit option?')) location.href='/events/maintenance/forms/credits/remove.asp?event_id=" & Request.QueryString("which") & "&credit_id="
	
	data_grid "prc_event_credit_lookup 'LEIFM',Null," & validate_field(Request.QueryString("which"),"ip") & ",Null" , True, arr_result_actions, 0, False, 0, False, Null, Null, True, "background-color: #EEEEEE;", Null, False, "No credit options entered for this event", False, 0, False, False, "ei_dg", Null
*/
?>