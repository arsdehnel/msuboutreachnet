<table width="100%" border="0" cellspacing="0" bordercolor="#333399" cellpadding="0">
	<tr>
		<td width="50%">
			<div class="event_form_detail"><strong>Coordinator:</strong> <?=$event_master_obj->coordinator;?></div>
		</td>
		<td width="50%">
			<div class="event_form_detail"><strong>Admin. Assts:</strong> <?=$event_master_obj->setup_aa;?> / <?=$event_master_obj->close_aa;?></div>
		</td>
	</tr>
	<tr>
		<td width="50%">
			<div class="event_form_detail"><strong>Event Type:</strong> <?=$event_master_obj->event_type_desc;?></div>
		</td>
		<td width="50%">
			<div class="event_form_detail"><strong>Event Status:</strong> <?=$event_master_obj->status_desc;?></div>
		</td>
	</tr>
	<tr>
		<td width="50%">
			<div class="event_form_detail"><strong>Sponsorship:</strong> <?=$event_master_obj->sponsorship_desc;?></div>
		</td>
		<td width="50%">
			<div class="event_form_detail"><strong>Index:</strong> <?=$event_master_obj->event_index;?> (<?=$event_master_obj->detail_code;?>)</div>
		</td>
	</tr>
	<tr>
		<td width="50%">
			<div class="event_form_detail"><strong>Event Days:</strong> <?=$event_master_obj->event_days;?></div>
		</td>
		<td width="50%">
			<div class="event_form_detail"><strong>Participant Days:</strong> <?=$event_master_obj->pax_days;?></div>
		</td>
	</tr>
	<tr>
		<td width="50%">
			<div class="event_form_detail"><strong>Enrollment:</strong> <?=$event_master_obj->enrl_act;?></div>
		</td>
		<td width="50%">
			<div class="event_form_detail"><strong>Instructor Compensation:</strong> <?=$event_master_obj->inst_comp;?></div>
		</td>
	</tr>
</table>
<?
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
?>
<div class="event_form_detail"><strong>Comments:</strong> <?=$event_master_obj->outcms_cmts;?></div>
<div class="event_form_detail" style="border-top: 2px solid #000000; margin-top: 20px; margin-bottom: 30px;">Approvals:</div>
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="approvals_table">
	<tr>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Department Chairperson
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px; text-align: right;">
			Date
		</td>
		<td width="10">&nbsp;
			
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Academic Dean
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px; text-align: right;">
			Date
		</td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Director of Graduate Studies
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px; text-align: right;">
			Date
		</td>
		<td width="10">&nbsp;
			
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Provost / Academic Vice-Chancellor
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px; text-align: right;">
			Date
		</td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Dean of the College of Professional Studies
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px; text-align: right;">
			Date
		</td>
		<td width="10">&nbsp;
			
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Program Manager for Lifelong Learning
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px; text-align: right;">
			Date
		</td>
	</tr>
</table>