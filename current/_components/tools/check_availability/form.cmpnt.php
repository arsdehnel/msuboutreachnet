<form name="frm_check_availability" style="width: 800px;" method="post" style="display: block; margin: 4px auto;" id="check_availability_form">
		<table width="95%" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr>
				<td>
					<label for="check_availability_date">Select Date:</label><input type="text" class="datepicker" name="lkup_date" value="<?=date( 'm/d/Y' );?>" />
				</td>
				<td>
					<label for="check_availability_location">Select Room:</label>
					<?
						prc_select_input( "SELECT domain_value_id
											 ,description
										   FROM arsdehnel_msub.vue_domain_group_value
										   WHERE d_code = 'dtl_location'
										     AND dgm_code = 'downtown'", "location_id", null, $_POST['location_id'], null, null, null, null, 'width: 300px;', 1, 'location_id' );
					?>					
				</td>
			</tr>
			<tr>
				<td colspan="8" align="center">
					<button type="button" class="btn primary" id="check_availability"><span><span>Check Availability</span></span></button>
				</td>
			</tr>
		</table>
</form>
<div id="results_wrapper">
	<?=$results;?>
</div>
<script type="text/javascript">

	$(function() {
	
		$('#check_availability').click(function(){
		
			var dataString = $('#check_availability_form').serialize();
			$('#results_wrapper').load('/_components/tools/check_availability/results.cmpnt.php?'+dataString);
			
		
		});
		
	});
	
</script>	