<?
	require_once('/home/www/pm_common/system.php');
					
	$actions	= array(
						array(
							'label' => 'Edit',
							'class' => 'btn modal primary',
							'href' => '/modal/event_forms/budget.php?event_budget_id=%%&event_master_id=' . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id )
						), 
						array(
							'label' => 'Remove',
							'class' => 'btn modal',
							'href' => '/modal/confirm.php?rec_type=event_budget&event_budget_id=%%&event_master_id=' . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id )
						) 
				  );

		prc_data_grid( "SELECT eb.event_budget_id
						  ,dgm.description || ': ' || dv.description as \"Item\"
		  				  ,eb.budget_type as \"Type\"
		  				  ,eb.proj_nbr || ' x $' || eb.proj_cost || ' = $' || ( eb.proj_nbr * eb.proj_cost ) as \"Projected Cost\"
		  				  ,eb.act_nbr || ' x $' || eb.act_cost || ' = $' || ( eb.act_nbr * eb.act_cost ) as \"Actual Cost\"
						FROM arsdehnel_msub.event_budget eb
						  ,arsdehnel_msub.domain_value dv
						  ,arsdehnel_msub.domain_group_detail dgd
						  ,arsdehnel_msub.domain_group_master dgm
						WHERE eb.budget_item_id = dgd.domain_group_detail_id
						  AND dv.domain_value_id = dgd.domain_value_id
						  AND dgd.domain_group_master_id = dgm.domain_group_master_id
						  AND eb.event_master_id = " . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id )
					   ,'Y'
					   ,$actions );						  
						  				  
		prc_data_grid( "SELECT null
						  ,'Total Income' as \"Item\"
						  ,'$' || sum( eb.proj_nbr * eb.proj_cost ) as \"Projected Cost\"
						  ,'$' || sum( eb.act_nbr * eb.act_cost ) as \"Actual Cost\"
						FROM arsdehnel_msub.event_budget eb
						  ,arsdehnel_msub.domain_value dv
						  ,arsdehnel_msub.domain_group_detail dgd
						  ,arsdehnel_msub.domain_group_master dgm
						WHERE eb.budget_item_id = dgd.domain_group_detail_id
						  AND dv.domain_value_id = dgd.domain_value_id
						  AND dgd.domain_group_master_id = dgm.domain_group_master_id
						  AND dgm.code = 'INC'
						  AND eb.event_master_id = " . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id ) . "
						UNION ALL
						SELECT null
						  ,'Total Direct Expenses' as \"Item\"
						  ,'$' || sum( eb.proj_nbr * eb.proj_cost ) as \"Projected Cost\"
						  ,'$' || sum( eb.act_nbr * eb.act_cost ) as \"Actual Cost\"
						FROM arsdehnel_msub.event_budget eb
						  ,arsdehnel_msub.domain_value dv
						  ,arsdehnel_msub.domain_group_detail dgd
						  ,arsdehnel_msub.domain_group_master dgm
						WHERE eb.budget_item_id = dgd.domain_group_detail_id
						  AND dv.domain_value_id = dgd.domain_value_id
						  AND dgd.domain_group_master_id = dgm.domain_group_master_id
						  AND dgm.code = 'DEX'
						  AND eb.event_master_id = " . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id ) . "
						UNION ALL
						SELECT null
						  ,'Total Gross Revenue'
						  ,'$' || sum(case dgm.code
										when 'INC' 
						  		   		  then ( eb.proj_nbr * eb.proj_cost )
						  		 		when 'DEX'
						  		   		  then ( eb.proj_nbr * eb.proj_cost ) * -1
						  	   			end)
						  ,'$' || sum(case dgm.code
						  		 		when 'INC' 
						  		   		  then ( eb.act_nbr * eb.act_cost )
						  		 		when 'DEX'
						  		   		  then ( eb.act_nbr * eb.act_cost ) * -1
						  	   			end)
						FROM arsdehnel_msub.event_budget eb
						  ,arsdehnel_msub.domain_value dv
						  ,arsdehnel_msub.domain_group_detail dgd
						  ,arsdehnel_msub.domain_group_master dgm
						WHERE eb.budget_item_id = dgd.domain_group_detail_id
						  AND dv.domain_value_id = dgd.domain_value_id
						  AND dgd.domain_group_master_id = dgm.domain_group_master_id
						  AND eb.event_master_id = " . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id ) . "
						UNION ALL
						SELECT null
						  ,'Total Direct Expenses' as \"Item\"
						  ,'$' || sum( eb.proj_nbr * eb.proj_cost ) as \"Projected Cost\"
						  ,'$' || sum( eb.act_nbr * eb.act_cost ) as \"Actual Cost\"
						FROM arsdehnel_msub.event_budget eb
						  ,arsdehnel_msub.domain_value dv
						  ,arsdehnel_msub.domain_group_detail dgd
						  ,arsdehnel_msub.domain_group_master dgm
						WHERE eb.budget_item_id = dgd.domain_group_detail_id
						  AND dv.domain_value_id = dgd.domain_value_id
						  AND dgd.domain_group_master_id = dgm.domain_group_master_id
						  AND dgm.code = 'PEX'
						  AND eb.event_master_id = " . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id ) . "
						UNION ALL
						SELECT null
						  ,'Total Gross Revenue'
						  ,'$' || sum(case dgm.code
										when 'INC' 
						  		   		  then ( eb.proj_nbr * eb.proj_cost )
						  		 		when 'DEX'
						  		   		  then ( eb.proj_nbr * eb.proj_cost ) * -1
						  		   		when 'PEX'
						  		   		  then ( eb.proj_nbr * eb.proj_cost ) * -1
						  	   			end)
						  ,'$' || sum(case dgm.code
						  		 		when 'INC' 
						  		   		  then ( eb.act_nbr * eb.act_cost )
						  		 		when 'DEX'
						  		   		  then ( eb.act_nbr * eb.act_cost ) * -1
						  		   		when 'PEX'
						  		   		  then ( eb.act_nbr * eb.act_cost ) * -1
						  	   			end)
						FROM arsdehnel_msub.event_budget eb
						  ,arsdehnel_msub.domain_value dv
						  ,arsdehnel_msub.domain_group_detail dgd
						  ,arsdehnel_msub.domain_group_master dgm
						WHERE eb.budget_item_id = dgd.domain_group_detail_id
						  AND dv.domain_value_id = dgd.domain_value_id
						  AND dgd.domain_group_master_id = dgm.domain_group_master_id
						  AND eb.event_master_id = " . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id ) );
	
	/*		
		Dim arr_result_actions(1,3,0)
	
		arr_result_actions(0,0,0) = "/events/maintenance/forms/budgets/form.asp?"
		arr_result_actions(0,1,0) = "Edit"
		arr_result_actions(0,2,0) = "_self"
		arr_result_actions(0,3,0) = Null
		arr_result_actions(1,0,0) = "#"
		arr_result_actions(1,1,0) = "Remove"
		arr_result_actions(1,2,0) = "_self"
		arr_result_actions(1,3,0) = "if(confirm('Are you sure you want to remove this budget item?')) location.href='/events/maintenance/forms/budgets/remove.asp?event_id=" & Request.QueryString("which") & "&budget_id="
	
		data_grid "prc_event_budget_lookup 'LEIFM',Null," & validate_field(Request.QueryString("which"),"ip") & ",Null", True, arr_result_actions, 0, False, 0, False, Null, Null, True, "background-color: #EEEEEE;", Null, False, "No budgets items entered for this event", False, 0, False, False, "ei_dg", Null
	
		Response.Write("<div class=""sfrm_section_title"">Budget Totals:</div>")

		data_grid "prc_event_budget_lookup 'LEISM',Null," & validate_field(Request.QueryString("which"),"ip") & ",Null" , True, Null, 0, False, 0, False, "TTL", "font-weight: bold; background-color: #AAAAAA;", False, Null, Null, False, Null, False, 0, False, False, "ei_dg", Null
	*/
	
	?>