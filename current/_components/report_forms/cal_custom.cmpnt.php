<form method="post" name="report_form" action="/reports/results.php" id="report_form">
	<table class="create_report_table" style="width: 800px;">
		<tr>
			<td class="rc_section_title" colspan="2">
				Report Title:
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="text" style="width: 450px;" name="report_title"><br>			
			</td>
		</tr>
		<tr>
			<td class="rc_section_title" colspan="2">
				Dates:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="start_date" style="width: <%=str_label_width%>px;">Start date:</label><input type="text" class="datepicker" name="start_date" />
			</td>
			<td width="50%">
				<label for="end_date" style="width: <%=str_label_width%>px;">End date:</label><input type="text" class="datepicker" name="end_date" />
			</td>
		</tr>
		<tr>
			<td class="rc_section_title" colspan="2">
				Criteria:
			</td>
		</tr>
		<tr>
			<td width="50%" rowspan="2">
				<label for="event_rubric" style="width: <%=str_label_width%>px;">Rubric:</label>
				<?
					prc_select_input( "SELECT code
										 ,description
									   FROM arsdehnel_msub.vue_domain_value
									   WHERE domain_code = 'event_rubric'", "event_rubric", null, null, null, null, null, null, 'width: 100px;', 10, 'event_rubric' );
				?><br />
				<label for="anjo_courses" style="width: <%=str_label_width%>px;">ANJO courses?</label>
				<?
					prc_select_input( "SELECT dv_code
										 ,description
									   FROM arsdehnel_msub.vue_domain_group_value
									   WHERE d_code = 'status_code'
									     AND dgm_code = 'yes_no'", "anjo_courses", null, $cancelled_ind, null, null, null, null, 'width: 100px;', 1, 'anjo_courses' );
				?>
			</td>
			<td width="50%">
				<label for="event_personnel" style="width: <%=str_label_width%>px;">Location:</label>
				<?
					prc_select_input( "SELECT domain_value_id
										 ,description
									   FROM arsdehnel_msub.vue_domain_value
									   WHERE domain_code = 'dtl_location'", "location_id", null, null, null, null, null, null, 'width: 200px;', 8, 'location_id' );
				?>
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="event_personnel" style="width: <%=str_label_width%>px;">Location Group:</label>
				<?
					prc_select_input( "SELECT dgm.code 
										 ,dgm.description
									   FROM arsdehnel_msub.domain_group_master dgm
									     ,arsdehnel_msub.domain d
									   WHERE d.domain_id = dgm.domain_id
									     AND d.code = 'dtl_location'", "location_group", null, null, null, null, null, null, 'width: 200px;', 4, 'location_group' );
				?>
			</td>
		</tr>
		<?=$action_box;?>
	</table>
</form>
<script type="text/javascript">
	
	$(function(){
	
		$('#action_box_submit').click(function(){
					
			$('#report_form').submit();
		
		});
		
	});
	
</script>