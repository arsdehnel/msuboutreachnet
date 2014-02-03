<form action="index.php" method="post" name="frm_event_search" id="event_search_form" onSubmit="return validate('index.asp');">
	<table border="0" cellpadding="6" cellspacing="0" style="width: 900px; margin: 2px auto;">
		<tr>
			<td width="25%">
				<label class="no_clear">Event ID:</label><input style="width: 100px;" name="event_master_id" value="<?=$event_id?>">
			</td>
			<td width="25%">
				<label class="no_clear">CRN:</label><input style="width: 100px;" name="event_crn" value="<?=$event_crn?>">
			</td>
			<td width="25%">
				<label class="no_clear">Rubric:</label>
				<?
					prc_select_input( "SELECT code
										 ,description
									   FROM arsdehnel_msub.vue_domain_value
									   WHERE domain_code = 'event_rubric'
									   ORDER BY code", "event_rubric", null, $event_status, null, null, '[ Rubric ]', null, 'width: 110px;', 1, 'event_rubric' );
				?>
			</td>
			<td width="25%">
				<label class="no_clear">Number:</label><input style="width: 100px;" name="event_number" value="<?=$event_number?>">
			</td>
		</tr>
		<tr>
			<td width="25%">
				<label class="no_clear">Section:</label><input style="width: 100px;" name="event_section" value="<?=$event_section?>">
			</td>
			<td width="25%">
				<label class="no_clear">Quarter:</label>
				<?
					prc_select_input( "SELECT code
										 ,description
									   FROM arsdehnel_msub.vue_domain_value
									   WHERE domain_code = 'event_quarter'
									   ORDER BY code", "event_quarter", null, $event_quarter, null, null, '[ Quarter ]', null, 'width: 110px;', 1, 'event_quarter' );
				?>
			</td>
			<td width="25%">
				<label class="no_clear">Semester:</label>
				<?
					prc_select_input( "SELECT code
										 ,description
									   FROM arsdehnel_msub.vue_domain_value
									   WHERE domain_code = 'event_semester'
									   ORDER BY code", "event_semester", null, $event_semester, null, null, '[ Semester ]', null, 'width: 110px;', 1, 'event_semester' );
				?>
			</td>
			<td width="25%">
				<label class="no_clear">Year:</label>
				<?
					prc_select_input( "SELECT code
										 ,description
									   FROM arsdehnel_msub.vue_domain_value
									   WHERE domain_code = 'event_year'
									   ORDER BY code", "event_year", null, $event_year, null, null, '[ Year ]', null, 'width: 110px;', 1, 'event_year' );
				?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<label class="no_clear">Title: </label><input style="width: 298px;" name="event_title" value="<?=$event_title?>">
			</td>
			<td width="25%">
				<label class="no_clear">Start Date: </label><input style="width: 100px;" name="start_date" value="<?=$start_date?>">
			</td>
			<td width="25%">
				<label class="no_clear">End Date: </label><input style="width: 100px;" name="end_date" value="<?=$end_date?>"><br />
			</td>
		</tr>
		<tr>
			<td colspan="4" style="text-align: center;" class="button_group">
				<button type="button" class="btn primary" id="event_search"><span><span>Search Events</span></span></button>
				<button type="button" class="btn" onClick="validate('extract.asp');"><span><span>Extract Results</span></span></button>
			</td>
		</tr>
	</table>
</form>
<div id="event_lookup_wrapper">
</div>
<script type="text/javascript">

	$(function() {
	
		$('#event_search').click(function(){
		
			$('#event_lookup_wrapper').html('<div align="center" style="padding: 20px;"><img src="/images/modal/loading.gif" /></div>');
			var dataString = $('#event_search_form').serialize();
			$('#event_lookup_wrapper').load('/_components/events/lookup_results.cmpnt.php?'+dataString);
			
		
		});
		
	});
	
</script>	