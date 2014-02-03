<form method="post" name="frm_personnel_search" id="personnel_search_form">
	<table width="95%" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td>
				<label for="first_name">First Name:</label>
				<input style="width: 200px;" name="first_name" value="<?=$first_name;?>">
			</td>
			<td>
				<label for="last_name">Last Name:</label>
				<input style="width: 200px;" name="last_name" value="<?=$str_last_name;?>">
			</td>
			<td>
				<label for="type">Personnel Type</label>
				<?
					prc_select_input( "SELECT code
										 ,description
									   FROM arsdehnel_msub.vue_domain_value
									   WHERE domain_code = 'personnel_type'
									   ORDER BY code", "type", null, $personnel_type, null, null, '[ All Personnel Types ]', null, 'width: 200px;', 1, 'personnel_type' );
				?>
			</td>
		<tr>
			<td colspan="3" style="text-align: center;" class="button_group">
				<button type="button" class="btn primary" id="personnel_search"><span><span>Search Personnel</span></span></button>
			</td>
		</tr>
	</table>
</form>
<div id="personnel_lookup_wrapper">
</div>
<script type="text/javascript">

	$(function() {
	
		$('#personnel_search').click(function(){
		
			$('#personnel_lookup_wrapper').html('<div align="center" style="padding: 20px;"><img src="/images/modal/loading.gif" /></div>');
			var dataString = $('#personnel_search_form').serialize();
			$('#personnel_lookup_wrapper').load('/_components/personnel/lookup_results.cmpnt.php?'+dataString);
			
		
		});
		
	});
	
</script>	