<tr>
	<td colspan="2" class="action_box">
		<label for="action_select">Action:</label>
			<?
				prc_select_input( "SELECT code
									 ,description
								   FROM arsdehnel_msub.vue_domain_value
								   WHERE domain_code = 'actions'
								     AND code in ('html','excel')", "action_select", null, 'html', null, null, null, null, 'width: 150px;', 1, 'action_select' );
			?>
		<div class="button_box">
			<button type="button" class="btn primary" id="action_box_submit"><span><span>View</span></span></button>
		</div>
		<input type="hidden" name="form_name" value="<?=$_GET['form_name'];?>" />
	</td>
</tr>	