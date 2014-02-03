<span id="event_form_box">
<table width="100%" border="0" cellspacing="0" bordercolor="#333399" cellpadding="0">
	<tr>
		<td width="35%">
			<div class="event_form_detail"><strong>Application Date:</strong> <?=$event_master_obj->application_date;?></div>
		</td>
		<td width="35%">
			<div class="event_form_detail"><strong>Index:</strong> <?=$event_master_obj->event_index;?>&nbsp;(<?=$event_master_obj->detail_code;?>)</div>
		</td>
		<td width="30%" rowspan="4" style="border: 1px solid #333399; padding: 4px;" valign="top">
			<div class="event_form_detail"><strong>Credits:</strong></div>
				<?
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
										  AND ec.event_master_id = " . $event_master_obj->event_master_id . "
										  AND ec.status_code = 'A'" );
				?>	
			<br />
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="event_form_detail"><strong>Dates:</strong> <?=$event_master_obj->date_min;?> to <?=$event_master_obj->date_max;?></div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="event_form_detail"><strong>Enrollment:</strong></div>
			<div class="event_form_detail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estimated: <?=$event_master_obj->enrl_est;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Minimum: <?=$event_master_obj->enrl_min;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Maximum: <?=$event_master_obj->enrl_max;?></div>
		</td>
	</tr>
	<tr>
		<td width="35%" valign="top">
			<div class="event_form_detail"><strong>Coordinator:</strong><br>&nbsp;&nbsp;&nbsp;<?=$event_master_obj->coordinator;?></div>
		</td>
		<td width="35%" valign="top">
			<div class="event_form_detail"><strong>Admin. Assts:</strong><br>&nbsp;&nbsp;&nbsp;<?=$event_master_obj->setup_aa;?><br>&nbsp;&nbsp;&nbsp;<?=$event_master_obj->close_aa;?></div>
		</td>
	</tr>
</table>
<div class="event_form_detail"><strong>Instructor(s):</strong></div>
<?
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
					  AND ep.psnl_type = 'EXT'
					  AND ep.event_master_id = " . $event_master_obj -> event_master_id );

?>
<br />
<div class="event_form_detail"><strong>Proposed Course Schedule:</strong></div>
<?
		prc_data_grid( "SELECT ed.recurrence_ind as \"Recurrence\"
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
						  AND ed.event_master_id = " . $event_master_obj->event_master_id . "
						  AND ed.status_code = 'A'" );
?>
<br /><br />
<div class="event_form_detail"><strong>Remarks & Notes:</strong></div>
<div class="event_form_detail" style="padding: 0px 10px;"><?=$event_master_obj->event_rmks;?></div>
</span>