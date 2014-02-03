<form action="process.php" method="post" name="frm_event_information" id="event_information">
	<div id="tabs_wrapper">
		<ul class="tab_bar">
			<li id="label_tab"><a href="#label">Label & Event Form</a></li>
			<li id="basics_tab"><a href="#basics">Basics</a></li>
			<li id="credits_tab"><a href="#credits">Credits & Fees</a></li>
			<li id="personnel_tab"><a href="#personnel">Personnel</a></li>
			<li id="dtl_tab"><a href="#dtl">Dates, Times & Locations</a></li>
			<li id="caf_tab"><a href="#caf">CAF</a></li>
			<li id="budget_tab"><a href="#budget">Budget</a></li>
			<li id="evals_tab"><a href="#evals">Evaluations</a></li>
			<li id="room_tab"><a href="#room">Room</a></li>
			<li id="catering_tab"><a href="#catering">Catering</a></li>
			<li id="forms_tab"><a href="#forms">Course Forms</a></li>
		</ul>
		<ul class="tab_box">
	<!-- LABEL -->			
			<li id="label">
				<table border="0" cellpadding="0" cellspacing="2">
					<tr>
						<td colspan="3">
							<label>Title:</label><input type="text" name="event_title" value="<?=$event_master_obj->event_title;?>" style="width: 500px;">
						</td>
						<td>
							<label>Selected:</label>
								<?
									prc_select_input( "SELECT dv_code
														 ,description
													   FROM arsdehnel_msub.vue_domain_group_value
													   WHERE d_code = 'status_code'
													     AND dgm_code = 'yes_no'", "selected_ind", null, $event_master_obj->selected_ind, null, null, null, null, 'width: 100px;', 1, 'selected_ind' );
								?>
						</td>
					</tr>
					<tr>
						<td width="25%">
							<label>CRN:</label><input type="text" name="event_crn" value="<?=$event_master_obj->event_crn;?>" style="width: 100px;">
						</td>
						<td width="25%">
							<label>Rubric:</label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'event_rubric'
													   ORDER BY code", "event_rubric", null, $event_master_obj->event_rubric, null, null, null, null, 'width: 100px;', 1, 'event_rubric' );
								?>
						</td>
						<td width="25%">
							<label>Number:</label><input type="text" name="event_number" value="<?=$event_master_obj->event_number;?>" style="width: 100px;">
						</td>
						<td width="25%">
							<label>Section:</label><input type="text" name="event_section" value="<?=$event_master_obj->event_section;?>" style="width: 100px;">
						</td>
					</tr>
					<tr>
						<td width="25%">
							<label>Quarter:</label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'event_quarter'
													   ORDER BY code", "event_quarter", null, $event_master_obj->event_quarter, null, null, null, null, 'width: 100px;', 1, 'event_quarter' );
								?>
						</td>
						<td width="25%">
							<label>Semester:</label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'event_semester'
													   ORDER BY code", "event_semester", null, $event_master_obj->event_semester, null, null, null, null, 'width: 100px;', 1, 'event_semester' );
								?>
						</td>
						<td width="25%">
							<label>Year:</label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'event_year'
													   ORDER BY code", "event_year", null, $event_master_obj->event_year, null, null, null, null, 'width: 100px;', 1, 'event_year' );
								?>
						</td>
						<td width="25%">
							<label>ID:</label><input type="text" name="event_id_show" value="<?=$event_master_obj->event_master_id;?>" disabled style="width: 100px;">
						</td>
					</tr>
					<tr>
						<td colspan="4" class="sfrm_section_title">
							Event Form Comments & Notes
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<label class="no_clear" style="width: 100px;">Event Remarks and Notes:</label><textarea name="event_rmks" style="width: 300px; height: 50px;"><?=$event_master_obj->event_rmks;?></textarea>
						</td>
						<td colspan="2">
							<label class="no_clear" style="width: 100px;">Room Setup and Equipment:</label><textarea name="rm_setup_notes" id="rm_setup_notes" style="width: 300px; height: 50px;" onblur="field_update( 'room_setup_notes', this.value );"><?=$event_master_obj->rm_setup_notes;?></textarea><br />
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<label class="no_clear" style="width: 100px;">Catering Needs:</label><textarea name="caterer_notes" id="caterer_notes" style="width: 300px; height: 50px;" onblur="field_update( 'catering_needs', this.value );"><?=$event_master_obj->caterer_notes;?></textarea>
						</td>
						<td colspan="2">
							<label class="no_clear" style="width: 100px;">Outcomes Comments:</label><textarea name="outcms_cmts" style="width: 300px; height: 50px;"><?=$event_master_obj->outcms_cmts;?></textarea><br />
						</td>
					</tr>
				</table>
			</li>
	<!-- BASICS -->			
			<li id="basics">
				<table border="0" cellpadding="0" cellspacing="2">
					<tr>
						<td width="25%">
							<label>Application Date:</label><input type="text" class="datepicker" name="application_date" value="<?=$event_master_obj->application_date;?>" />
						</td>
						<td width="25%">
							<label>Status:</label>
								<?
									prc_select_input( "SELECT code
														 ,description
														FROM arsdehnel_msub.vue_domain_value
														WHERE domain_code = 'event_status'
														ORDER BY code", "status_code", null, $event_master_obj->status_code, null, null, null, null, 'width: 100px;', 1, 'status_code' );
								?>
						</td>
						<td width="25%">
							<label>Type:</label>
								<?
									prc_select_input( "SELECT code
														 ,description
														FROM arsdehnel_msub.vue_domain_value
														WHERE domain_code = 'event_type'
														ORDER BY code", "event_type", null, $event_master_obj->event_type, null, null, null, null, 'width: 100px;', 1, 'event_type' );
								?>
						</td>
						<td width="25%">
							<label>Event Repetition:</label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'event_repetition'
													   ORDER BY code", "repetition_ind", null, $event_master_obj->repetition_ind, null, null, null, null, 'width: 100px;', 1, 'repetition_ind' );
								?>
						</td>
					</tr>
					<tr>
						<td width="25%">
							<label>Index:</label><input type="text" name="event_index" value="<?=$event_master_obj->event_index;?>" style="width: 60px;">
						</td>
						<td width="25%">
							<label>Detail Code:</label><input type="text" name="detail_code" value="<?=$event_master_obj->detail_code;?>" style="width: 60px;">
						</td>
						<td width="25%">
							<label>Event Days:</label><input type="text" name="event_days" value="<?=$event_master_obj->event_days;?>" style="width: 60px;" id="event_days">
						</td>
						<td width="25%"></td>
					</tr>
					<tr>
						<td colspan="4" class="sfrm_section_title">
							Sponsorship
						</td>
					</tr>
					<tr>
						<td width="25%">
							<label class="no_clear">Type:</label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'sponsorship'
													   ORDER BY code", "sponsorship_ind", null, $event_master_obj->sponsorship_ind, null, null, null, null, 'width: 100px;', 1, 'sponsorship_ind' );
								?>
						</td>
						<td colspan="3">
							<label class="no_clear">Title:</label><input type="text" name="spnsr_dtls" value="<?=$event_master_obj->spnsr_dtls;?>" style="width: 500px;">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="sfrm_section_title">
							Enrollment
						</td>
						<td colspan="2" class="sfrm_section_title">
							Grades
						</td>
					</tr>
					<tr>
						<td width="25%">
							<label class="no_clear" style="width: 90px;">Actual:</label><input type="text" name="enrl_act" value="<?=$event_master_obj->enrl_act;?>" style="width: 50px;" id="enrl_act">
						</td>
						<td width="25%">
							<label class="no_clear" style="width: 90px;">Estimated:</label><input type="text" name="enrl_est" value="<?=$event_master_obj->enrl_est;?>" style="width: 50px;">
						</td>
						<td width="25%">
							<label class="no_clear">Grading:</label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'grading'
													   ORDER BY code", "grading_ind", null, $event_master_obj->grading_ind, null, null, null, null, 'width: 100px;', 1, 'grading_ind' );
								?>
						</td>
						<td width="25%">
							<label class="no_clear" style="width: 90px;">To Instructor:</label><input type="text" class="datepicker" name="grd_to_inst" value="<?=$event_master_obj->grd_to_inst;?>" />
						</td>
					</tr>
					<tr>
						<td width="25%">
							<label class="no_clear" style="width: 90px;">Minimum:</label><input type="text" name="enrl_min" value="<?=$event_master_obj->enrl_min;?>" style="width: 50px;">
						</td>
						<td width="25%">
							<label class="no_clear" style="width: 90px;">Maximum:</label><input type="text" name="enrl_max" value="<?=$event_master_obj->enrl_max;?>" style="width: 50px;">
						</td>
						<td width="25%">
							<label class="no_clear" style="width: 100px;">From Instructor:</label><input type="text" class="datepicker" name="grd_fm_inst" value="<?=$event_master_obj->grd_fm_inst;?>" />
						</td>
						<td width="25%">
							<label class="no_clear" style="width: 90px;">To Registrar:</label><input type="text" class="datepicker" name="grd_to_reg" value="<?=$event_master_obj->grd_to_reg;?>" />
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<label>Participant Days:</label><input type="text" name="pax_days_disp" value="<?=$event_master_obj->pax_days;?>" disabled style="width: 50px;" id="pax_days_disp">
							<input type="hidden" name="pax_days" value="<?=$event_master_obj->pax_days;?>" id="pax_days">
						</td>
						<td colspan="2"></td>
					</tr>
				</table>
			</li>
	<!-- CREDITS -->			
			<li id="credits">
				<div id="credits_wrapper" class="subform">
					<?=$credits;?>
				</div>
				<button type="button" href="/modal/event_forms/credits.php?event_credit_id=0&event_master_id=<?=$event_master_obj->event_master_id;?>" class="btn modal" style="float: right; margin: 2px;"><span><span>Add New Credit Option</span></span></button>
			</li>
	<!-- PERSONNEL -->			
			<li id="personnel">
				<div id="personnel_wrapper" class="subform">
					<div class="sfrm_section_title">Internal Personnel:</div>
					<div id="personnel_int_wrapper">
						<?=$personnel_int;?>
					</div>
					<div class="sfrm_section_title">Instructors, Contacts and Sponsors:</div>
					<div id="personnel_ext_wrapper">
						<?=$personnel_ext;?>
					</div>
				</div>
				<button type="button" href="/modal/event_forms/personnel.php?event_personnel_id=0&event_master_id=<?=$event_master_obj->event_master_id;?>" class="btn modal" style="float: right; margin: 2px;"><span><span>Add New Personnel</span></span></button>
			</li>
	<!-- DTL -->				
			<li id="dtl">		
				<div id="dtl_wrapper" class="subform">
					<?=$dtl;?>
				</div>
				<button type="button" href="/modal/event_forms/dtl.php?event_dtl_id=0&event_master_id=<?=$event_master_obj->event_master_id;?>" class="btn modal" style="float: right; margin: 2px;"><span><span>Add New Date, Time & Location</span></span></button>
			</li>
	<!-- CAF -->			
			<li id="caf">
				<label style="width: 190px;">Event Description:</label>
					<textarea name="event_desc" style="width: 600px; height: 30px;"><?=$event_master_obj->event_desc;?></textarea><br />
				<label style="width: 190px;">Target Audience:</label>
					<textarea name="tgt_audience" style="width: 600px; height: 30px;"><?=$event_master_obj->tgt_audience;?></textarea><br />
				<label style="width: 190px;">Evaluation of Student Work:</label>
					<textarea name="eval_of_work" style="width: 600px; height: 30px;"><?=$event_master_obj->eval_of_work;?></textarea><br />
				<label style="width: 190px;">Required Materials:</label>
					<textarea name="req_mtrls" style="width: 600px; height: 30px;"><?=$event_master_obj->req_mtrls;?></textarea><br />
				<label style="width: 190px;">Post-Course Work:</label>
					<textarea name="pst_crse_wk" style="width: 600px; height: 30px;"><?=$event_master_obj->pst_crse_wk;?></textarea><br />
				<label style="width: 190px;">Comments:</label>
					<textarea name="caf_cmts" style="width: 600px; height: 30px;"><?=$event_master_obj->caf_cmts;?></textarea>
			</li>
	<!-- BUDGET -->			
			<li id="budget">
				<div id="budget_wrapper" class="subform" style="height: 280px;">
					<?=$budget;?>
				</div>
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="20%" style="vertical-align: text-top;">
							<label style="width: 200px;">Event to be Invoiced or Comped:</label><br />
								<?
									prc_select_input( "SELECT dv_code
														 ,description
													   FROM arsdehnel_msub.vue_domain_group_value
													   WHERE d_code = 'status_code'
													     AND dgm_code = 'yes_no'", "inv_comp_ind", null, $event_master_obj->inv_comp_ind, null, null, null, null, 'width: 80px;', 1, 'inv_comp_ind' );
								?>
						</td>
						<td width="80%">
							<label>Budget Notes:</label><textarea name="bdgt_notes" style="width: 540px; height: 60px; margin: 0 5px 5px 0;"><?=$event_master_obj->bdgt_notes;?></textarea>
						</td>
					</tr>
				</table>
				<button type="button" href="/modal/event_forms/budget.php?event_budget_id=0&event_master_id=<?=$event_master_obj->event_master_id;?>" class="btn modal" style="float: right; margin: 2px;"><span><span>Add New Budget Item</span></span></button>
			</li>
	<!-- EVALS -->			
			<li id="evals">
				<table border="0" cellpadding="0" cellspacing="2">
					<tr>
						<td width="25%">
							<label>Delivery Method:</label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'eval_delivery_method'
													   ORDER BY code", "eval_del_mthd", null, $event_master_obj->eval_del_mthd, null, null, null, null, 'width: 100px;', 1, 'eval_del_mthd' );
								?>
						</td>
						<td width="21%">
							<label style="width: 90px;">Evals Sent:</label><input type="text" class="datepicker" name="eval_to_inst" value="<?=$event_master_obj->eval_to_inst;?>" />
						</td>
						<td width="23%">
							<label style="width: 95px;">Evals Received:</label><input type="text" class="datepicker" name="eval_fm_inst" value="<?=$event_master_obj->eval_fm_inst;?>" />
						</td>
						<td width="31%">
							<label style="width: 180px;">Evals Completed Offline:</label>
								<?
									prc_select_input( "SELECT dv_code
														 ,description
													   FROM arsdehnel_msub.vue_domain_group_value
													   WHERE d_code = 'status_code'
													     AND dgm_code = 'yes_no'", "eval_cmpl_ind", null, $event_master_obj->eval_cmpl_ind, null, null, null, null, 'width: 80px;', 1, 'eval_cmpl_ind' );
								?>
						</td>
					</tr>
				</table>
				<div id="evals_wrapper" class="subform" style="height: 345px;">				
					<?=$evals;?>
				</div>
				<button type="button" href="/events/evals.form.php?event_eval_id=0&event_master_id=<?=$event_master_obj->event_master_id;?>" class="btn modal" style="float: right; margin: 2px;"><span><span>Add New Evaluation</span></span></button>
			</li>
	<!-- ROOM -->			
			<li id="room">
				<table width="100%" border="0" cellpadding="0" cellspacing="2">
					<tr>
						<td colspan="2" class="sfrm_section_title">
							Room Access
						</td>
					</tr>
					<tr>
						<td width="50%">
							<label style="width: 70px;">Open at: </label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'dtl_time'
													   ORDER BY code
													     ,description", "rm_open_time", null, $event_master_obj->rm_open_time, null, null, null, null, 'width: 100px;', 1, 'rm_open_time' );
								?><br /><br />
							<label style="width: 30px; float: none;">by: </label>
								<?
									prc_select_input( "SELECT personnel_id
														 ,last_name || ', ' || first_name
													   FROM arsdehnel_msub.personnel
													   WHERE psnl_type = 'INT'
													   ORDER BY last_name
													     ,first_name", "rm_open_personnel_id", null, $event_master_obj->rm_open_personnel_id, null, null, "[ Please select a personnel ]", null, 'width: 180px;', 1, 'rm_open_personnel_id' );
								?><br />
						</td>
						<td width="50%">
							<label style="width: 70px;">Lock at: </label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'dtl_time'
													   ORDER BY code
													     ,description", "rm_lock_time", null, $event_master_obj->rm_lock_time, null, null, null, null, 'width: 100px;', 1, 'rm_lock_time' );
								?><br /><br />
							<label style="width: 30px; float: none;">by: </label>
								<?
									prc_select_input( "SELECT personnel_id
														 ,last_name || ', ' || first_name
													   FROM arsdehnel_msub.personnel
													   WHERE psnl_type = 'INT'
													   ORDER BY last_name
													     ,first_name", "rm_lock_personnel_id", null, $event_master_obj->rm_lock_personnel_id, null, null, "[ Please select a personnel ]", null, 'width: 180px;', 1, 'rm_lock_personnel_id' );
								?><br />
						</td>
					</tr>
					<tr>
						<td>
							<label>Signage Required:</label>
								<?
									prc_select_input( "SELECT dv_code
														 ,description
													   FROM arsdehnel_msub.vue_domain_group_value
													   WHERE d_code = 'status_code'
													     AND dgm_code = 'yes_no'", "sign_req_ind", null, $event_master_obj->sign_req_ind, null, null, null, null, 'width: 80px;', 1, 'sign_req_ind' );
								?>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="sfrm_section_title">
							Room Set-Up and Equipment Needs
						</td>
					</tr>
					<tr>
						<td>
							<label style="width: 120px;">Set room day: </label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'lgstc_room_setup_day'
													   ORDER BY code
													     ,description", "rm_setup_day_ind", null, $event_master_obj->rm_setup_day_ind, null, null, null, null, 'width: 250px;', 1, 'rm_setup_day_ind' );
								?>
						</td>
						<td>
							<label style="width: 70px;">Time: </label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'dtl_time'
													   ORDER BY code
													     ,description", "rm_setup_time", null, $event_master_obj->rm_setup_time, null, null, null, null, 'width: 100px;', 1, 'rm_setup_time' );
								?><br />
							<label style="width: 30px; float: none;">by: </label>
								<?
									prc_select_input( "SELECT personnel_id
														 ,last_name || ', ' || first_name
													   FROM arsdehnel_msub.personnel
													   WHERE psnl_type = 'INT'
													   ORDER BY last_name
													     ,first_name", "rm_setup_personnel_id", null, $event_master_obj->rm_setup_personnel_id, null, null, "[ Please select a personnel ]", null, 'width: 180px;', 1, 'rm_setup_personnel_id' );
								?><br />
						</td>
					</tr>
					<tr>
						<td>
							<label style="width: 105px;">Room Setup and Equipment: </label><textarea name="room_setup_notes_logistics" style="width: 300px; height: 186px; display: block;" onblur="field_update( 'room_setup_notes', this.value );"><?=$event_master_obj->rm_setup_day_ind;?></textarea>
							<input type="hidden" name="room_setup_notes" id="room_setup_notes" value="<%=str_room_setup_notes%>" />
						</td>
						<td>
							<div id="room_wrapper" style="height: 195px;">
								<?=$room;?>
							</div>
							<button type="button" href="/modal/event_forms/logistics.php?event_logistic_id=0&event_master_id=<?=$event_master_obj->event_master_id;?>&type=EQP" class="btn modal" style="float: right; margin: 2px;"><span><span>Add New Equipment Need</span></span></button>
						</td>
					</tr>
				</table>
			</li>
			<li id="catering">
	<!-- CATERING -->			
				<table width="100%" border="0" cellpadding="0" cellspacing="2">
					<tr>
						<td width="50%" valign="top">
							<div class="sfrm_section_title">Catering Needs</div>
							<label style="width: 140px; font-weight: normal;">Multi-day Catering Needed:</label>
								<?
									prc_select_input( "SELECT dv_code
														 ,description
													   FROM arsdehnel_msub.vue_domain_group_value
													   WHERE d_code = 'status_code'
													     AND dgm_code = 'yes_no'", "inv_comp_ind", null, $event_master_obj->multi_day_catering_ind, null, null, null, null, 'width: 100px;', 1, 'multi_day_catering_ind' );
								?><span style="font-size: smaller; font-style: italic;">if yes, specify details below</span><br />
							<label style="width: 100px;">Catering Needs:</label><textarea name="catering_needs_logistics" id="catering_needs_logistics" style="width: 317px; height: 65px;" onblur="field_update( 'catering_needs', this.value );"><?=$event_master_obj->catering_needs;?></textarea><input type="hidden" name="catering_needs" id="catering_needs" value="<%=str_catering_needs%>" /><br />
							<div id="catering" class="subform" style="height: 240px;">
								<?=$catering;?>
							</div>
							<button type="button" href="/modal/event_forms/catering.php?event_catering_id=0&event_master_id=<?=$event_master_obj->event_master_id;?>" class="btn modal" style="float: right; margin: 2px;"><span><span>Add New Catering Need</span></span></button>
						</td>
						<td width="50%" valign="top">
							<div class="sfrm_section_title">In-House Catering</div>
							<label style="width: 100px;">Set catering time: </label>
								<?
									prc_select_input( "SELECT code
														 ,description
													   FROM arsdehnel_msub.vue_domain_value
													   WHERE domain_code = 'dtl_time'
													   ORDER BY code", "catering_time", null, $event_master_obj->catering_time, null, null, null, null, 'width: 100px;', 1, 'catering_time' );
								?>
							<label style="width: 20px; float: none;">by: </label>
								<?
									prc_select_input( "SELECT personnel_id
														 ,last_name || ', ' || first_name
													   FROM arsdehnel_msub.personnel
													   WHERE psnl_type = 'INT'
													   ORDER BY last_name
													     ,first_name", "catering_personnel_id", null, $event_master_obj->catering_personnel_id, null, null, "[ Please select a personnel ]", null, 'width: 180px;', 1, 'catering_personnel_id' );
								?><br />
							<div class="sfrm_section_title">Outside Catering</div>
							<label style="width: 90px;">Caterer: </label><input type="text" name="outside_catering" value="<?=$event_master_obj->otsd_cat_title;?>"><br>
							<label style="width: 90px;">Contact: </label><input type="text" name="outside_catering_contact" value="<?=$event_master_obj->otsd_cat_cntct;?>">
							<label style="width: 90px; float: none;">Phone: </label><input type="text" name="outside_phone_number" value="<?=$event_master_obj->otsd_cat_phone;?>"><br>
							<label style="width: 90px;">Delivery Time: </label><input type="text" name="catering_delivery_time" value="<?=$event_master_obj->catering_time;?>" style="width: 300px"><br />
							<label style="width: 90px;">Caterer Notes: </label><textarea name="caterer_notes" style="width: 300px; height: 60px; display: block;"><?=$event_master_obj->caterer_notes;?></textarea>			
						</td>
					</tr>
				</table>
			</li>
			<li id="forms">
	<!-- FORMS -->			
				<div id="forms_wrapper" style="width: 400px; margin: 20px auto;">
					<label>Event Form: </label>
						<?
							prc_select_input( "SELECT code
												 ,description
											   FROM arsdehnel_msub.vue_domain_value
											   WHERE domain_code = 'event_forms'", "form_code", null, null, null, null, null, null, 'width: 200px;', 1, 'form_code' );
						?><br />				
					<label>Action: </label>
						<?
							prc_select_input( "SELECT code
												 ,description
											   FROM arsdehnel_msub.vue_domain_value
											   WHERE domain_code = 'actions'
											     AND code in ('html','pdf')", "action_code", null, null, null, null, null, null, 'width: 200px;', 1, 'action_code' );
						?><br />	
					<label></label>
						<button type="button" class="btn" id="event_form_submit"><span><span>View</span></span></button>						
				</div>
			</li>
		</ul>
	</div>
	<div style="text-align: center; margin: 5px;">
		<button type="submit" class="btn primary"><span><span>Save Event</span></span></button>
		<button type="button" onClick="location.href='duplicate.asp?which=<%=int_event_id%>';" class="btn"><span><span>Duplicate Event</span></span></button>
		<?
			if( $_SESSION['security_level'] >= 8 ){
				?><button type="button" onClick="if(confirm('Are you sure you want to remove this event?')) location.href='remove.asp?event_id=<%=int_event_id%>';" class="btn"><span><span>Remove Event</span></span></button><?
			}
		?>
		<input type="hidden" name="event_master_id" id="event_master_id" value="<?=$event_master_obj->event_master_id;?>">
		<input type="hidden" name="log_user_id" value="<?=$_SESSION['user_id'];?>" />
		<input type="hidden" name="process_type" value="UPDTE">
	</div>
</form>
<script type="text/javascript">
	$(function(){
	
		$("ul.tab_bar li").eq(0).addClass("current");
		$("ul.tab_box li").eq(0).addClass("current");
		
		$("ul.tab_bar li a").click(function() {

			$("ul.tab_bar li").removeClass("current"); 					//Remove any "active" class
			$(this).addClass("current"); 								//Add "active" class to selected tab
			$("ul.tab_box li").hide(); 									//Hide all tab content

			var activeTab = $(this).attr("href"); 						//Find the href attribute value to identify the active tab + content
			
			$("ul.tab_bar li"+activeTab+"_tab").addClass("current");	//add class to the tab
			$("ul.tab_box li"+activeTab).show().addClass("current");	//show the selected tab and make it current
			return false;
			
		});
		
		$('#event_form_submit').click(function(){
		
			var event_master_id		= $('#event_master_id').val();
			var form_code			= $('#form_code').val();
			var action_code			= $('#action_code').val();
		
		    window.open('/events/maint/form.php?event_master_id='+event_master_id+'&form_code='+form_code+'&action_code='+action_code,'event_form_window');
		
			return false;
		
		});
		
		function pax_days_upd(){
		
			var event_days 	= $('#event_days').val();
			var enrl_act	= $('#enrl_act').val();
			$('#pax_days').val( event_days * enrl_act );
			$('#pax_days_disp').val( event_days * enrl_act );
		
		}
		
		pax_days_upd();
	
	});
</script>