<span id="event_form_box">
	<table width="100%" border="0" cellspacing="0" bordercolor="#333399" cellpadding="0">
		<tr>
			<td width="90%">
				<div class="event_form_detail"><strong>Did the program fulfill its stated objectives?</strong></div>
			</td>
			<td width="35%">
				<div class="event_form_detail"><?=$eval_smry_data->q1_ansr;?></div>
			</td>
		</tr>
		<tr>
			<td width="90%">
				<div class="event_form_detail"><strong>Did you develop new skills/concepts as a result of your participation?</strong></div>
			</td>
			<td width="35%">
				<div class="event_form_detail"><?=$eval_smry_data->q2_ansr;?></div>
			</td>
		</tr>
		<tr>
			<td width="90%">
				<div class="event_form_detail"><strong>Was the presentation style appropriate to the subject?</strong></div>
			</td>
			<td width="35%">
				<div class="event_form_detail"><?=$eval_smry_data->q3_ansr;?></div>
			</td>
		</tr>
		<tr>
			<td width="90%">
				<div class="event_form_detail"><strong>Were the instructors well prepared?</strong></div>
			</td>
			<td width="35%">
				<div class="event_form_detail"><?=$eval_smry_data->q4_ansr;?></div>
			</td>
		</tr>
		<tr>
			<td width="90%">
				<div class="event_form_detail"><strong>Were the instructors well informed on the subject?</strong></div>
			</td>
			<td width="35%">
				<div class="event_form_detail"><?=$eval_smry_data->q5_ansr;?></div>
			</td>
		</tr>
		<tr>
			<td width="90%">
				<div class="event_form_detail"><strong>Did the instructors use the time effectively?</strong></div>
			</td>
			<td width="35%">
				<div class="event_form_detail"><?=$eval_smry_data->q6_ansr;?></div>
			</td>
		</tr>
		<tr>
			<td width="90%">
				<div class="event_form_detail"><strong>Was the facility conducive to learning?</strong></div>
			</td>
			<td width="35%">
				<div class="event_form_detail"><?=$eval_smry_data->q7_ansr;?></div>
			</td>
		</tr>
		<tr>
			<td width="90%">
				<div class="event_form_detail"><strong>Did the presenters model effective staff development practices?</strong></div>
			</td>
			<td width="35%">
				<div class="event_form_detail"><?=$eval_smry_data->q8_ansr;?></div>
			</td>
		</tr>
	</table>
	<?
		if( is_array( $eval_smry_data->inst_feedback ) ):
			?>
			<div class="section_title"><strong>Instructors:</strong></div>
			<ul style="margin: 0px 25px;">
			<?
				foreach( $eval_smry_data->inst_feedback as $feedback ):
					?>
					<li class="event_form_detail" style="padding: 0px;"><?=$feedback;?></li>
					<?
				endforeach;
			?>
			</ul>
			<br />
			<?
		endif;
		if( is_array( $eval_smry_data->ctnt_feedback ) ):
			?>
			<div class="section_title"><strong>Content:</strong></div>
			<ul style="margin: 0px 25px;">
			<?
				foreach( $eval_smry_data->ctnt_feedback as $feedback ):
					?>
					<li class="event_form_detail" style="padding: 0px;"><?=$feedback;?></li>
					<?
				endforeach;
			?>
			</ul>
			<br />
			<?
		endif;
		if( is_array( $eval_smry_data->loc_feedback ) ):
			?>
			<div class="section_title"><strong>Location:</strong></div>
			<ul style="margin: 0px 25px;">
			<?
				foreach( $eval_smry_data->loc_feedback as $feedback ):
					?>
					<li class="event_form_detail" style="padding: 0px;"><?=$feedback;?></li>
					<?
				endforeach;
			?>
			</ul>
			<br />
			<?
		endif;
		if( is_array( $eval_smry_data->otr_feedback ) ):
			?>
			<div class="section_title"><strong>Other Comments:</strong></div>
			<ul style="margin: 0px 25px;">
			<?
				foreach( $eval_smry_data->otr_feedback as $feedback ):
					?>
					<li class="event_form_detail" style="padding: 0px;"><?=$feedback;?></li>
					<?
				endforeach;
			?>
			</ul>
			<br />
			<?
		endif;
		if( is_array( $eval_smry_data->addl_courses ) ):
			?>
			<div class="section_title"><strong>Additional Courses:</strong></div>
			<ul style="margin: 0px 25px;">
			<?
				foreach( $eval_smry_data->addl_courses as $feedback ):
					?>
					<li class="event_form_detail" style="padding: 0px;"><?=$feedback;?></li>
					<?
				endforeach;
			?>
			</ul>
			<?
		endif;
	?>
</span>