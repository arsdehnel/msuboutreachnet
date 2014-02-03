<form method="post" name="report_form" action="/reports/results.php" id="report_form">
	<table class="create_report_table" style="width: 800px;">
		<tr>
			<td class="rc_section_title" colspan="2">
				Dates:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="start_date">Start date:</label><input type="text" class="datepicker required" name="start_date" title="Start Date" value="<?=$start_date;?>" />
			</td>
			<td width="50%">
				<label for="end_date">End date:</label><input type="text" class="datepicker required" name="end_date" title="End Date" value="<?=$end_date;?>" />
			</td>
		</tr>
		<?=$action_box;?>
	</table>
</form>
<script type="text/javascript">
	
	$(function(){
	
		$('#action_box_submit').click(function(){
		
			var submit	=	true;
			var err_msg	=	'Please complete the below required fields:';
			var cur_value;
		
			$('.required').each(function(index){
			
				cur_value = $(this).val();
				if( cur_value == undefined || cur_value.length == 0 ){
					submit	= false;
					err_msg = err_msg + '\n - ' + $(this).attr('title');
				}
			
			});
			
			if( submit == true ){
			
				$('#report_form').submit();
			
			}else{
			
				alert(err_msg);
			
			}
			return false;
		
		});
	
	});
	
</script>