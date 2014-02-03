<?
	require_once('/home/www/pm_common/dao/msub/domain_value.dao.php');
?>
<form action="process.php" method="post" name="new_event_form" style="border: 0px; margin: 0 auto;">
		<table width="100%" border="0" cellpadding="4" cellspacing="8">
			<tr>
				<td colspan="2" width="50%">
					<label for="event_crn" style="width: <?=int_label_width?>">Title:</label><input type="text" name="event_title" style="width: 340px;">
				</td>
				<td width="25%">
					<label for="event_status" style="width: <?=int_label_width?>">Status:</label><?
						prc_select_input( "SELECT code
											 ,description
										   FROM arsdehnel_msub.vue_domain_value
										   WHERE domain_code = 'event_status'", "status_code", null, $event_status, null, null, null, null, 'width: 100px;', 1, 'status_code' );
					?>
				</td>
				<td width="25%">
					<label for="event_type" style="width: <?=int_label_width?>">Type:</label><?
						prc_select_input( "SELECT code
											 ,description
										   FROM arsdehnel_msub.vue_domain_value
										   WHERE domain_code = 'event_type'", "event_type", null, $event_status, null, null, null, null, 'width: 100px;', 1, 'event_type' );
					?>
				</td>
			</tr>
			<tr>
				<td width="25%" valign="top">
					<label for="event_crn" style="width: <?=int_label_width?>">CRN:</label><input type="text" name="event_crn" style="width: 100px;">
				</td>
				<td width="25%" valign="top">
					<label for="event_crn" style="width: <?=int_label_width?>">Rubric:</label><?
						$rubric_select	= new dao_arsdehnel_msub_domain_value();
						$rubric_select	-> domain_code	= 'event_rubric';
						prc_select_input( $rubric_select->retrieve_select() , "event_rubric", null, $event_status, null, null, null, null, 'width: 100px;', 1, 'event_rubric' );
					?>
				</td>
				<td width="25%" valign="top">
					<label for="event_crn" style="width: <?=int_label_width?>">Number:</label><input type="text" name="event_number" id="event_number" style="width: 100px;"><br>
					<div class="help_link" style="text-align: right; padding-right: 35px;"><a href="next_number.php" id="next_number_lkup">Find Next Number</a></div>
				</td>
				<td width="25%" valign="top">
					<label for="event_crn" style="width: <?=int_label_width?>">Section:</label><input type="text" name="event_section" style="width: 100px;"><br>
					<div class="help_link" style="text-align: right; padding-right: 35px;"><a href="next_section.php" class="modal">Find Next Section</a></div>
				</td>
			</tr>
			<tr>
				<td width="25%">
					<label for="event_crn" style="width: <?=int_label_width?>">Quarter:</label><?
						prc_select_input( "SELECT code
											 ,description
										   FROM arsdehnel_msub.vue_domain_value
										   WHERE domain_code = 'event_quarter'", "event_quarter", null, $event_status, null, null, null, null, 'width: 100px;', 1, 'event_quarter' );
					?>
				</td>
				<td width="25%">
					<label for="event_crn" style="width: <?=int_label_width?>">Semester:</label><?
						prc_select_input( "SELECT code
											 ,description
										   FROM arsdehnel_msub.vue_domain_value
										   WHERE domain_code = 'event_semester'", "event_semester", null, $event_status, null, null, null, null, 'width: 100px;', 1, 'event_semester' );
					?>
				</td>
				<td width="25%">
					<label for="event_crn" style="width: <?=int_label_width?>">Year:</label><?
						prc_select_input( "SELECT code
											 ,description
										   FROM arsdehnel_msub.vue_domain_value
										   WHERE domain_code = 'event_year'", "event_year", null, $event_status, null, null, null, null, 'width: 100px;', 1, 'event_year' );
					?>
				</td>
				<td width="25%">
					&nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="4" align="center">
					<button type="submit" class="btn primary"><span><span>Enter New Event</span></span></button>
					<input type="hidden" name="process_type" value="INSRT" />					
				</td>
			</tr>
		</table>			
	</form>
<script text="text/javascript">
	$(function(){
		$('#next_number_lkup').click(function(){
			var rubric		= $('#event_rubric').val();
			$.ajax({
				type: 'POST',
				url: '/events/new/next_number.php',
				data:  'event_rubric='+rubric,
				success: function(data){
					$('#event_number').val(data);
				}//success
			});//ajax call
			return false;
		});
	});
</script>