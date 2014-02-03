<form method="post" name="frm_campus_calendar" action="/reports/results.php" id="report_form">
	<table class="create_report_table" style="width: 800px;">
		<tr>
			<td class="rc_section_title" colspan="2">
				Dates:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="start_date">Start date:</label><input type="text" class="datepicker" name="start_date" value="<?=$start_date;?>" />
			</td>
			<td width="50%">
				<label for="end_date">End date:</label><input type="text" class="datepicker" name="end_date" value="<?=$end_date;?>" />
			</td>
		</tr>
		<tr>
			<td class="rc_section_title" colspan="2">
				Criteria:
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<label for="cancelled_courses">Cancelled courses?</label>
				<?
					prc_select_input( "SELECT dv_code
										 ,description
									   FROM arsdehnel_msub.vue_domain_group_value
									   WHERE d_code = 'status_code'
									     AND dgm_code = 'yes_no'", "cancelled_ind", null, $cancelled_ind, null, null, null, null, 'width: 100px;', 1, 'cancelled_ind' );
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