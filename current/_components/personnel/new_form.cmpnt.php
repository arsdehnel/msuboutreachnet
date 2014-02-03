<div id="page_title">New Personnel</div>
<form action="process.php" method="post">
	<table width="900" align="center">
		<tr>
			<td class="rc_section_title" colspan="2">
				Name:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="first_name">First Name:</label>
				<input type="text" name="first_name" value="">
			</td>
			<td width="50%">
				<label for="last_name">Last Name:</label>
				<input type="text" name="last_name" value="">
			</td>
		</tr>
		<tr>
			<td class="rc_section_title">
				Other Information:
			</td>
			<td class="rc_section_title">
				Biography:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="status_code">Personnel Status:</label>
				<?
					prc_select_input( "SELECT dv_code
										 ,description
									   FROM arsdehnel_msub.vue_domain_group_value
									   WHERE d_code = 'status_code'
									     AND dgm_code = 'active_inactive'
									   ORDER BY dv_code", "status_code", null, $status_code, null, null, null, null, 'width: 250px;', 1, 'status_code' );
				?><br>
				<label for="type">Personnel Type:</label><?
					prc_select_input( "SELECT code
										 ,description
									   FROM arsdehnel_msub.vue_domain_value
									   WHERE domain_code = 'event_personnel_type'
									   ORDER BY code", "psnl_type", null, $personnel_type, null, null, null, null, 'width: 250px;', 1, 'psnl_type' );
				?><br>
				<label for="personnel_w9">W-9?</label><?
					prc_select_input( "SELECT dv_code
										 ,description
									   FROM arsdehnel_msub.vue_domain_group_value
									   WHERE d_code = 'status_code'
									     AND dgm_code = 'yes_no'
									   ORDER BY dv_code", "w9_ind", null, $w9_ind, null, null, null, null, 'width: 250px;', 1, 'w9_ind' );
			?>
			</td>
			<td align="center">
				<textarea name="personnel_bio" style="width: 100%; height: 75px;"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" class="button_group">
				<button type="submit" class="btn primary" id="save_new_personnel"><span><span>Save New Personnel</span></span></button>
				<input type="hidden" name="personnel_id" value="0">
			</td>
		</tr>
	</table>
</form>