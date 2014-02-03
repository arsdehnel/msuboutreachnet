<form method="post" name="frm_campus_calendar" action="/reports/results.php" id="report_form">
	<table class="create_report_table" style="width: 800px;">
		<tr>
			<td class="rc_section_title" colspan="2">
				Dates:
			</td>
		</tr>
		<tr style="display: none;">
			<td width="50%">
				<label for="start_date">Start date:</label><input type="text" class="datepicker" name="start_date" value="<?=$start_date;?>" />
			</td>
			<td width="50%">
				<label for="end_date">End date:</label><input type="text" class="datepicker" name="end_date" value="<?=$end_date;?>" />
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