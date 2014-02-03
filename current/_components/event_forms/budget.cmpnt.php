<span id="event_form_box">
<div class="section_title" style="border: 0px; margin-bottom: 4px; margin-top: 12px;">Income</div>
<?
		prc_data_grid( "SELECT eb.event_budget_id
						  ,dv.description as \"Item\"
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
						  AND dgm.code = 'INC'
						  AND eb.event_master_id = " . $event_master_obj->event_master_id );
?>
<div class="section_title" style="border: 0px; margin-bottom: 4px; margin-top: 12px;">Direct Expenses</div>
<?
		prc_data_grid( "SELECT eb.event_budget_id
						  ,dv.description as \"Item\"
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
						  AND dgm.code = 'DEX'
						  AND eb.event_master_id = " . $event_master_obj->event_master_id );
?>
<div class="section_title" style="border: 0px; margin-bottom: 4px; margin-top: 12px;">Program Expenses</div>
<?
		prc_data_grid( "SELECT eb.event_budget_id
						  ,dv.description as \"Item\"
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
						  AND dgm.code = 'PEX'
						  AND eb.event_master_id = " . $event_master_obj->event_master_id );
?>
<div class="section_title" style="border: 0px; margin-bottom: 4px; margin-top: 12px;">Budget Summary</div>
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
						  AND eb.event_master_id = " . $event_master_obj->event_master_id . "
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
						  AND eb.event_master_id = " . $event_master_obj->event_master_id . "
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
						  AND eb.event_master_id = " . $event_master_obj->event_master_id . "
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
						  AND eb.event_master_id = " . $event_master_obj->event_master_id . "
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
						  AND eb.event_master_id = " . $event_master_obj->event_master_id );


?>
<div class="event_form_detail" style="border-top: 2px solid #000000; margin-top: 20px; margin-bottom: 30px;">Approvals:</div>
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="approvals_table">
	<tr>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Event Sponsor
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px; text-align: right;">
			Date
		</td>
		<td width="10">&nbsp;
			
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Event Co-sponsor
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px; text-align: right;">
			Date
		</td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Director of MSU Billings Extended Campus
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px; text-align: right;">
			Date
		</td>
		<td width="10">&nbsp;
			
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Program Manager for MSU Billings Extended Campus
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px; text-align: right;">
			Date
		</td>
	</tr>
</table>
</span>