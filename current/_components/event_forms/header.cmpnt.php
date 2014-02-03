<?
		switch( $header_type ){
	
			case "res_agmt":
				
				?>
					<div class="cpsll_header">MSU Billings Downtown</div>
					<div class="form_header"><?=$form_header;?></div>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="event_form_detail" width="25%">
								<strong>Event Number:</strong> <%=str_rubric%>&nbsp;<%=str_number%>
							</td>
							<td class="event_form_detail" width="75%">
								<strong>Event Title:</strong> <%=str_title%>
							</td>
						</tr>
					</table>			
					<?

			default:				
			
				?>
					<div class="cpsll_header">MSU Billings Downtown</div>
					<div class="form_header"><?=$form_header;?></div>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="event_form_detail">
								<strong>CRN:</strong> <?=$event_master_obj->event_crn;?>
							</td>
							<td class="event_form_detail">
								<strong>Rubric:</strong> <?=$event_master_obj->event_rubric;?>
							</td>
							<td class="event_form_detail">
								<strong>Number:</strong> <?=$event_master_obj->event_number;?>
							</td>
							<td class="event_form_detail">
								<strong>Section:</strong> <?=$event_master_obj->event_section;?>
							</td>
							<td class="event_form_detail">
								<strong>Quarter:</strong> <?=$event_master_obj->event_quarter;?>
							</td>
							<td class="event_form_detail">
								<strong>Semester:</strong> <?=$event_master_obj->event_semester;?>&nbsp;<?=$event_master_obj->event_year;?>
							</td>
						</tr>
						<tr>
							<td colspan="6" class="event_form_detail">
								<strong>Event Title:</strong> <?=$event_master_obj->event_title;?>
							</td>
						</tr>
					</table>			
					<?
				
		}//switch header_type
			
?>