<div class="event_form_detail"><strong>Course Description:</strong> <?=$event_master_obj->event_desc;?></div>
<div class="event_form_detail"><strong>Target Audience:</strong> <?=$event_master_obj->tgt_audience;?></div>
<div class="event_form_detail"><strong>Required Materials:</strong> <?=$event_master_obj->req_mtrls;?></div>
<div class="event_form_detail"><strong>Enrollment Limit (if any):</strong> <?=$event_master_obj->enrl_max;?></div>
<div class="event_form_detail"><strong>Sponsorship:</strong> <?=$event_master_obj->spnsr_dtls;?></div>
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
<div class="event_form_detail"><strong>Comments:</strong> <?=$event_master_obj->caf_comments;?></div>
<div class="event_form_detail" style="border-top: 2px solid #000000; margin-top: 20px; margin-bottom: 30px;">Approvals:</div>
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="approvals_table">
	<tr>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Program Manager for MSU Billings Extended Campus
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px; text-align: right;">
			Date
		</td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Course / Event Sponsor
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
	</tr>
</table>
</span>
