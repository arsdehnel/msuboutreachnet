<span id="event_form_box">
<div class="event_form_detail"><strong>Client Contact(s):</strong></div>
<?
/*
	arr_contacts_rs				= get_recordset( "prc_event_personnel_lookup 'LCFCS',Null," & validate_field(Request.QueryString("event_id"),"ip") & ",Null" )
	If IsArray(arr_contacts_rs) Then
		For int_curr_contact = Lbound(arr_contacts_rs, 2) to Ubound(arr_contacts_rs, 2)
			str_contact_name	= arr_contacts_rs(0,int_curr_contact)
			str_contact_phone	= arr_contacts_rs(1,int_curr_contact)
			str_contact_email	= arr_contacts_rs(2,int_curr_contact)
			str_contact_address	= arr_contacts_rs(3,int_curr_contact)
			%>
			<div class="event_form_detail"><span style="position: relative; left: 10; top: -10px;"><%=str_contact_name%></span></div>
			<div class="event_form_detail"><span style="position: relative; left: 200; top: -15px;">Phone: <%=str_contact_phone%></span></div>
			<div class="event_form_detail"><span style="position: relative; left: 400; top: -20px;">E-mail: <%=str_contact_email%></span></div>
			<%
		Next
	Else
		%>
		<div class="event_form_detail" style="margin-bottom: -20px;"><span style="position: relative; left: 10; top: -10px;">No contacts listed for this event</span></div>
		<%	
	End If
*/
?>
<div class="event_form_detail"><strong>MSUB Contact:</strong></div>
<div class="event_form_detail"><span style="position: relative; left: 10; top: -10px;"><?=$event_master_obj->coordinator;?></span></div>
<div class="event_form_detail"><span style="position: relative; left: 200; top: -15px;">Phone: <?=$event_master_obj->coordinator_phone;?></span></div>
<div class="event_form_detail"><span style="position: relative; left: 400; top: -20px;">E-mail: <?=$event_master_obj->coordinator_email;?></span></div>
<br><div class="event_form_detail"><strong>Event Schedule:</strong></div>
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
<br>
<div class="event_form_detail"><strong>Event Charges:</strong></div>
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
<br>
<div class="event_form_detail"><strong>Remarks & Notes:</strong></div>
<div class="event_form_detail" style="padding: 0px 10px;"><?=$event_master_obj->event_rmks;?></div>
<div class="event_form_detail"><strong>Catering Needs:</strong></div>
<div class="event_form_detail" style="padding: 0px 10px;"><?=$event_master_obj->caterer_notes;?></div>
<div class="event_form_detail"><strong>Room Setup & Equipment:</strong></div>
<div class="event_form_detail" style="padding: 0px 10px;"><?=$event_master_obj->rm_setup_notes;?></div>
<div class="event_form_detail" style="border-top: 2px solid #000000; margin-top: 20px; margin-bottom: 10px;">Agreement:</div>
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="approvals_table">
	<tr>
		<td colspan="2" style="padding: 6px 12px 45px 12px;">
			If the arrangements outlined above are satisfactory, please sign and date this event reservation agreement form and return to Montana State University - Billings, Downtown by fax to <nobr>(406) 896-5865</nobr> or by mail to 208 North Broadway Suite 414, Billings, MT 59101, Attn: Sharon or Cassie. 
		</td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px;">
			Name of responsible party (signature constitutes acceptance of fees outlined above)
		</td>
		<td style="border-top: 1px solid #333333; padding-bottom: 30px; text-align: right;">
			Date
		</td>
	</tr>
</table>
</span>