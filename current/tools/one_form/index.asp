<!-- #include virtual="/layout/_top.asp" -->
<!-- #include virtual="/tools/one_form/functions.asp" -->
<%
	int_label_width = 300
%>
<link rel="stylesheet" type="text/css" href="/css/one_form.css">
<style type="text/css">
label{
	width: 300px;
	margin-left: 50px;
}
</style>
<div id="page_title">One-Form</div>
<center>
	<a style="cursor: hand;" onClick="view_all('block');">Expand All</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a style="cursor: hand;" onClick="view_all('none');">Collapse All</a>
	<form action="process.asp" method="post" name="frm_one_form">
		<table class="create_report_table" style="width: 800px;">
			<tr>
				<td class="rc_section_title" width="788">
					Request Information:
				</td>
				<td class="rc_section_title" width="12">
					<a style="cursor: hand;" onClick="view_details('request_information_detail','request_information_link');"><img src="/images/icons/show.gif" name="request_information_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td id="request_information_detail" colspan="2" style="display: block;">
					<label for="start_date" style="width: <%=int_label_width%>px;">Date of Setup Request:</label><input type="text" class="datepicker" name="start_date" /><br />
					<label for="end_date" style="width: <%=int_label_width%>px;">Admin. Assistant Assigned for Setup:</label><%
						custom_ddlb "prc_lov_lookup 'PSNLA','type=ST'", "personnel_id", Null, Null, Null, Null, "[ Please select a personnel ]", Null, "width: 200px;", 1, Null
					%>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Event Basics:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('event_basics_detail','event_basics_link');"><img src="/images/icons/show.gif" name="event_basics_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="event_basics_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Title:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Rubric:</label><%
						domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = ""event_rubric""", "domain_value_description", "event_rubric", "", str_event_rubric, "", "", "", "width: 128px;", 1, 0, Null
					%>
					<label for="event_crn" style="width: <%=int_label_width%>">Number:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Section:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Term:</label><input type="text" name="event_title" value="<%=str_event_title%>">
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Event Status:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('event_status_detail','event_status_link');"><img src="/images/icons/show.gif" name="event_status_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="event_status_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Sponsorship:</label><%
						domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = ""sponsorship""", "domain_value_description", "event_sponsorship", "", str_event_sponsorship, "", "", "", "width: 128px;", 1, 0, Null
					%><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Credit / Non-Credit:</label><select name="credit_noncredit" style="width: 128px;">
						<option value="">[ Please select a credit option ]</option>
						<option value="non-credit">Non-Credit</option>
						<option value="credit">Credit</option>
					</select>&nbsp;<label for="event_crn" style="width: 120px; margin-left: 10px;"># of credits:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">FTE Generating:</label><input type="checkbox" name="event_title" value="<%=str_event_title%>" class="no_border"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Grading:</label><%
						domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = ""event_grading""", "domain_value_description", "event_sponsorship", "", str_event_sponsorship, "", "", "", "width: 128px;", 1, 0, Null
					%><br>
					<label for="event_crn" style="width: <%=int_label_width%>">OPI Renewal Units:</label><input type="checkbox" name="event_title" value="<%=str_event_title%>" class="no_border">&nbsp;<label for="event_crn" style="width: 120px; margin-left: 118px;"># of units:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Event Listing:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('event_listing_detail','event_listing_link');"><img src="/images/icons/show.gif" name="event_listing_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="event_listing_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Cross Listed Event:</label><input type="checkbox" name="event_title" value="<%=str_event_title%>" class="no_border"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Cross Listed w/Non-Credit:</label><input type="checkbox" name="event_title" value="<%=str_event_title%>" class="no_border"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Non-Credit Rubric:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Graduate / Undergraduate:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Additional Rubric:</label><input type="text" name="event_title" value="<%=str_event_title%>">
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Event Details:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('event_details_detail','event_details_link');"><img src="/images/icons/show.gif" name="event_details_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="event_details_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Event Description:</label><textarea name="event_desription" style="width: 400px; height: 130px; display: inline;"><%=mem_event_description%></textarea><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Target Audience:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Proposed Schedule:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('proposed_schedule_detail','proposed_schedule_link');"><img src="/images/icons/show.gif" name="proposed_schedule_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="proposed_schedule_detail" style="display: none;">
					<label for="start_date" style="width: <%=int_label_width%>px;">Start Date:</label><input type="text" class="datepicker" name="start_date" /><br />
					<label for="start_date" style="width: <%=int_label_width%>px;">End Date:</label><input type="text" class="datepicker" name="end_date" /><br />
					<label for="event_crn" style="width: <%=int_label_width%>">Days:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Times:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Proposed Location and Setup Needs:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('proposed_location_detail','proposed_location_link');"><img src="/images/icons/show.gif" name="proposed_location_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="proposed_location_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Facility Reservation Status (Needed/Confirmed):</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Room / Location Setup Instructions:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Equipment / Supplies Needed:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Catering Needs (Hospitality Form needed):</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">IT / ITV Support Needed:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>">
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Information for Catalog and Website:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('information_for_catalog_detail','information_for_catalog_link');"><img src="/images/icons/show.gif" name="information_for_catalog_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="information_for_catalog_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Catalog Description (if different from above):</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">LLMS Category & Sub-Category</label><%
						domain_lov "tbl_domain_groups", "domain_group_code", "domain_group_description", "domain_id = 567", "domain_group_description", "llms_category_code", Null, Null, "show_subcategory_select(this.value);", Null, "[ Please select a category ]", "width: 197px;", 1, False, Null
						
						arr_subcategory_rs = get_recordset( "SELECT * FROM tbl_domain_groups WHERE domain_id = 567", False )
						
						For i = LBound(arr_subcategory_rs,2) to UBound(arr_subcategory_rs, 2)
						
							domain_lov "qry_domain_group_values", "domain_value", "domain_value_description", "domain_group_code = """ & arr_subcategory_rs(2,i) & """", "domain_value_description", arr_subcategory_rs(2,i) & "_subcategory", Null, Null, Null, Null, "[ Please select a sub-category ]", "display: none; width: 197px;", 1, False, arr_subcategory_rs(2,i) & "_subcategory"

						Next
					%><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Required Text/Materials (Collected at Reg. or Class):</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Additional Fees:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Special Notes / Instructions for Students:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>">
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Part of a Series:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('series_detail','series_link');"><img src="/images/icons/show.gif" name="series_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="series_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Series Name:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Series Description:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Courses in Series:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Series Cost:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Multiple Enrollment Options:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('enrollment_options_detail','enrollment_options_link');"><img src="/images/icons/show.gif" name="enrollment_options_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="enrollment_options_detail" style="display: none;">
					<div class="notes">If the course has multiple enrollment levels that will require more than one option in Lumens, please describe below.  i.e. multiple credits, break out sessions, or group discounts.</div>
					<center><textarea name="instructor_notes" style="width: 650px; height: 200px;"><%=mem_instructor_notes%></textarea></center>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Registration Needs:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('registration_needs_detail','registration_needs_link');"><img src="/images/icons/show.gif" name="registration_needs_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="registration_needs_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Registration To Be Handled By:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Public / Online Registration Allowed:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">On-site Registration Needed (Date/Time/Place):</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Send Registration Packet To:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Medical/Parental Release Required:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>">
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Wrap-Up Needs:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('wrapup_needs_detail','wrapup_needs_link');"><img src="/images/icons/show.gif" name="wrapup_needs_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="wrapup_needs_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Certificates of Completion:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Accounting Index:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('accounting_index_detail','accounting_index_link');"><img src="/images/icons/show.gif" name="accounting_index_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="accounting_index_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Use Sponsored Index #:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Use Current Index #:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Need to Request New Index:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Enrollment Estimates:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('enrollment_estimates_detail','enrollment_estimates_link');"><img src="/images/icons/show.gif" name="enrollment_estimates_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="enrollment_estimates_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Target:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Minimum:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Maximum:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Primary Instructor Information:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('primary_instructor_detail','primary_instructor_link');"><img src="/images/icons/show.gif" name="primary_instructor_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="primary_instructor_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Name:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Address:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Work Phone:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Home Phone:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Mobile Phone:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">E-mail:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Bio – for instructor profile on website:</label><textarea name="event_desription" style="width: 400px; height: 80px; display: inline;"><%=mem_event_description%></textarea><br>
					<label for="event_crn" style="width: <%=int_label_width%>">SSN# (Required if compensated thru MSU-B):</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Compensation Amount:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Compensation Method:</label><%
						domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = ""payment_method""", "domain_value_description", "event_rubric", "", str_event_rubric, "", "", "", "width: 128px;", 1, 0, Null
					%><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Full-time (FT) or Part-time (PT) Status:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Instructors Agreement needed:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Resume / Vitae Attached (Required for PT):</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Part-Time Disclosure Form (Required for PT)</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Part-Time Employee Memo (Required for PT)</label><input type="text" name="event_title" value="<%=str_event_title%>">
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Secondary Instructor Information:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('secondary_instructor_detail','secondary_instructor_link');"><img src="/images/icons/show.gif" name="secondary_instructor_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="secondary_instructor_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Name:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Address:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Phone:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">E-mail:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Bio – for instructor profile on website:</label><textarea name="event_desription" style="width: 400px; height: 80px; display: inline;"><%=mem_event_description%></textarea><br>
					<label for="event_crn" style="width: <%=int_label_width%>">SSN# (Required if compensated thru MSU-B):</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Compensation Amount:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Compensation Method:</label><%
						domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = ""payment_method""", "domain_value_description", "event_rubric", "", str_event_rubric, "", "", "", "width: 128px;", 1, 0, Null
					%><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Full-time (FT) or Part-time (PT) Status:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Instructors Agreement needed:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Resume / Vitae Attached (Required for PT):</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Part-Time Disclosure Form (Required for PT)</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Part-Time Employee Memo (Required for PT)</label><input type="text" name="event_title" value="<%=str_event_title%>">
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Instructor of Record Information:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('instructor_of_record_detail','instructor_of_record_link');"><img src="/images/icons/show.gif" name="instructor_of_record_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="instructor_of_record_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Name:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Address:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Phone:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">E-mail:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Compensation Amount:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Instructors Agreement needed:</label><input type="text" name="event_title" value="<%=str_event_title%>">
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Sponsor / Primary Contact (if not instructor):
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('contact_detail','contact_link');"><img src="/images/icons/show.gif" name="contact_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="contact_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Name:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Address:</label><input type="text" name="event_title" style="width: 400px;" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Phone:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
					<label for="event_crn" style="width: <%=int_label_width%>">E-mail:</label><input type="text" name="event_title" value="<%=str_event_title%>"><br>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Instructor / Sponsor Notes:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('instructor_notes_detail','instructor_notes_link');"><img src="/images/icons/show.gif" name="instructor_notes_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="instructor_notes_detail" style="display: none;" align="center">
					<textarea name="instructor_notes" style="width: 650px; height: 200px;"><%=mem_instructor_notes%></textarea>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Direct Expenses:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('direct_expenses_detail','direct_expenses_link');"><img src="/images/icons/show.gif" name="direct_expenses_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="direct_expenses_detail" style="display: none;">
					<table width="750" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 10px 5px;" class="subtable">
						<tr>
							<th colspan="6" rowspan="3">&nbsp;
								
							</th>
							<th colspan="3" align="center" style="background-color: #CCCCCC;">
								Projected Participants
							</th>
						</tr>
						<tr>
							<th align="center" style="background-color: #CCCCCC; font-size: 12px;">
								Target
							</th>
							<th align="center" style="background-color: #CCCCCC; font-size: 12px;">
								Min
							</th>
							<th align="center" style="background-color: #CCCCCC; font-size: 12px;">
								Max
							</th>
						</tr>
						<tr>
							<th align="center" style="background-color: #CCCCCC;">
								<input type="text" name="direct_expenses_enrollment_target" style="width: 45px;" value="0" onBlur="update_enrollments('direct_expenses','target');">
							</th>
							<th align="center" style="background-color: #CCCCCC;">
								<input type="text" name="direct_expenses_enrollment_minimum" style="width: 45px;" value="0" onBlur="update_enrollments('direct_expenses','minimum');">
							</th>
							<th align="center" style="background-color: #CCCCCC;">
								<input type="text" name="direct_expenses_enrollment_maximum" style="width: 45px;" value="0" onBlur="update_enrollments('direct_expenses','maximum');">
							</th>
						</tr>
						<%
							oneform_title_line "Primary Instructor Compensation"
							oneform_budget_line 1, Null, "Flat Rate", 3, "Total Compensations", Null, Null, "FIXED", "primary_instructor_fr", "direct_expenses", 1
							oneform_budget_line 1, "or", "Hourly Rate", 1, "Hourly Rate", "Total Hours", "Total Compensation", "FIXED", "primary_instructor_hr", "direct_expenses", 2
							oneform_budget_line 1, "or", "Per Participant", 3, "Per Participant", Null, Null, "VARIABLE", "primary_instructor_pp", "direct_expenses", 3
							oneform_budget_line 1, "or", "Per Credit", 1, "Per Credit", "Total Credits", "Total Compensation", "FIXED", "primary_instructor_pc", "direct_expenses", 4
							oneform_budget_spacer
							
							oneform_title_line "Secondary Instructor Compensation"
							oneform_budget_line 1, Null, "Flat Rate", 3, "Total Compensations", Null, Null, "FIXED", "secondary_instructor_fr", "direct_expenses", 5
							oneform_budget_line 1, "or", "Hourly Rate", 1, "Hourly Rate", "Total Hours", "Total Compensation", "FIXED", "secondary_instructor_hr", "direct_expenses", 6
							oneform_budget_line 1, "or", "Per Participant", 3, "Per Participant", Null, Null, "VARIABLE", "secondary_instructor_pp", "direct_expenses", 7
							oneform_budget_line 1, "or", "Per Credit", 1, "Per Credit", "Total Credits", "Total Compensation", "FIXED", "secondary_instructor_pc", "direct_expenses", 8
							oneform_budget_spacer

							oneform_title_line "Instructor of Record Compensation"
							oneform_budget_line 1, Null, "Flat Rate", 3, "Total Compensations", Null, Null, "FIXED", "instructor_of_record_fr", "direct_expenses", 9
							oneform_budget_line 1, Null, "Per Particpant", 3, "Per Particpant", Null, Null, "VARIABLE", "instructor_of_record_pp", "direct_expenses", 10
							oneform_budget_spacer

							oneform_title_line "Direct Facility Costs"
							oneform_budget_line 2, Null, Null, 3, "Total Compensations", Null, Null, "INVOICE", "direct_facility_costs", "direct_expenses", 11
							oneform_budget_spacer

							oneform_title_line "Lodging"
							oneform_budget_line 2, Null, Null, 3, "Total Compensations", Null, Null, "INVOICE", "lodging", "direct_expenses", 12
							oneform_budget_spacer

							oneform_title_line "Travel / Transportation"
							oneform_budget_line 1, Null, "Flat Rate", 3, "Total Compensations", Null, Null, "INVOICE", "travel_transportation_fr", "direct_expenses", 13
							oneform_budget_line 1, "plus", "Mileage", 1, "Total Miles", "Mileage Rate", "Total Compensations", "INVOICE", "mileage_m", "direct_expenses", 14
							oneform_budget_spacer

							oneform_title_line "Catering"
							oneform_budget_line 1, Null, "Flat Rate", 3, "Total Compensations", Null, Null, "INVOICE", "catering", "direct_expenses", 15
							oneform_budget_line 1, "plus", "Per Participant", 3, "Per Participant", Null, Null, "VARIABLE<br>INVOICE", "catering_per_participant", "direct_expenses", 16
							oneform_budget_spacer

							oneform_title_line "Materials / Supplies / Books"
							oneform_budget_line 1, Null, "Flat Rate", 3, "Total Compensations", Null, Null, "INVOICE", "materials", "direct_expenses", 17
							oneform_budget_line 1, "plus", "Per Participant", 3, "Per Participant", Null, Null, "VARIABLE<br>INVOICE", "materials_per_participant", "direct_expenses", 18
							oneform_budget_spacer

							oneform_title_line "Printing"
							oneform_budget_line 1, Null, "Flat Rate", 3, "Total Compensations", Null, Null, "INVOICE", "printing", "direct_expenses", 19
							oneform_budget_line 1, "plus", "Per Participant", 3, "Per Participant", Null, Null, "VARIABLE", "printing_per_participant", "direct_expenses", 20
							oneform_budget_spacer

							oneform_title_line "Additional Marketing"
							oneform_budget_line 2, Null, Null, 3, "Total Compensations", Null, Null, "INVOICE", "addtl_marketing", "direct_expenses", 21
							oneform_budget_spacer

							oneform_title_line "Mailings"
							oneform_budget_line 2, Null, Null, 3, "Total Compensations", Null, Null, "INVOICE", "mailings", "direct_expenses", 22
							oneform_budget_spacer

							oneform_title_line "eCollege Tech Fees"
							oneform_budget_line 1, Null, "Per Participant", 1, "Total Credits", "Credit Fee", "Total Fees", "VARIABLE", "ecollege_fees", "direct_expenses", 23
							oneform_budget_spacer

							oneform_title_line "Other"
							oneform_budget_line 2, "<em class=""oneform_budget_note"">Description</em><input type=""text"" name=""event_title"" style=""width: 100px;"" value="""">", Null, 3, "Total Compensations", Null, Null, "FIXED", "other_fees", "direct_expenses", 24
							oneform_budget_spacer
						%>
						<tr>
							<td colspan="6" class="oneform_budget_section_header">
								Direct Expense Totals
							</td>
							<td align="center" class="column_7">
								$<input type="text" name="direct_expenses_target" style="width: 40px;" value="0" disabled="disabled" class="disabled_input">
							</td>
							<td align="center" class="column_8">
								$<input type="text" name="direct_expenses_minimum" style="width: 40px;" value="0" disabled="disabled" class="disabled_input">
							</td>
							<td align="center" class="column_9">
								$<input type="text" name="direct_expenses_maximum" style="width: 40px;" value="0" disabled="disabled" class="disabled_input">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Revenue:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('revenue_detail','revenue_link');"><img src="/images/icons/show.gif" name="revenue_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="revenue_detail" style="display: none;">
					<table width="750" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 10px 5px;" class="subtable">
						<tr>
							<th colspan="6" rowspan="3">&nbsp;
								
							</th>
							<th colspan="3" align="center" style="background-color: #CCCCCC;">
								Projected Participants
							</th>
						</tr>
						<tr>
							<th align="center" style="background-color: #CCCCCC; font-size: 12px;">
								Target
							</th>
							<th align="center" style="background-color: #CCCCCC; font-size: 12px;">
								Min
							</th>
							<th align="center" style="background-color: #CCCCCC; font-size: 12px;">
								Max
							</th>
						</tr>
						<tr>
							<th align="center" style="background-color: #CCCCCC;">
								<input type="text" name="revenue_enrollment_target" style="width: 45px;" value="0" onBlur="update_enrollments('revenue','target');">
							</th>
							<th align="center" style="background-color: #CCCCCC;">
								<input type="text" name="revenue_enrollment_minimum" style="width: 45px;" value="0" onBlur="update_enrollments('revenue','minimum');">
							</th>
							<th align="center" style="background-color: #CCCCCC;">
								<input type="text" name="revenue_enrollment_maximum" style="width: 45px;" value="0" onBlur="update_enrollments('revenue','maximum');">
							</th>
						</tr>
						<%
							oneform_title_line "Participant Fees"
							oneform_budget_line 2, Null, Null, 3, "Per Particpant", Null, Null, "VARIABLE", "participant_fees", "revenue", 1
							oneform_budget_spacer

							oneform_title_line "e-College"
							oneform_budget_line 2, Null, Null, 3, "Per Particpant", Null, Null, "VARIABLE", "ecollege_revenue", "revenue", 2
							oneform_budget_spacer

							oneform_title_line "Materials / Supplies / Books charge"
							oneform_budget_line 2, Null, Null, 3, "Per Particpant", Null, Null, "VARIABLE", "materials_supplies", "revenue", 3
							oneform_budget_spacer
						%>
						<tr>
							<td colspan="6" class="oneform_budget_section_header">
								Revenue Totals
							</td>
							<td align="center" class="column_7">
								$<input type="text" name="revenue_target" style="width: 40px;" value="0" disabled="disabled" class="disabled_input">
							</td>
							<td align="center" class="column_8">
								$<input type="text" name="revenue_minimum" style="width: 40px;" value="0" disabled="disabled" class="disabled_input">
							</td>
							<td align="center" class="column_9">
								$<input type="text" name="revenue_maximum" style="width: 40px;" value="0" disabled="disabled" class="disabled_input">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Program Expenses:
				</td>
				<td class="rc_section_title">
					<a style="cursor: hand;" onClick="view_details('program_expenses_detail','program_expenses_link');"><img src="/images/icons/show.gif" name="program_expenses_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="program_expenses_detail" style="display: none;">
					<table width="750" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 10px 5px;" class="subtable">
						<tr>
							<th colspan="6" rowspan="3">&nbsp;
								
							</th>
							<th colspan="3" align="center" style="background-color: #CCCCCC;">
								Projected Participants
							</th>
						</tr>
						<tr>
							<th align="center" style="background-color: #CCCCCC; font-size: 12px;">
								Target
							</th>
							<th align="center" style="background-color: #CCCCCC; font-size: 12px;">
								Min
							</th>
							<th align="center" style="background-color: #CCCCCC; font-size: 12px;">
								Max
							</th>
						</tr>
						<tr>
							<th align="center" style="background-color: #CCCCCC;">
								<input type="text" name="program_expenses_enrollment_target" style="width: 45px;" value="0" onBlur="update_enrollments('program_expenses','target');">
							</th>
							<th align="center" style="background-color: #CCCCCC;">
								<input type="text" name="program_expenses_enrollment_minimum" style="width: 45px;" value="0" onBlur="update_enrollments('program_expenses','minimum');">
							</th>
							<th align="center" style="background-color: #CCCCCC;">
								<input type="text" name="program_expenses_enrollment_maximum" style="width: 45px;" value="0" onBlur="update_enrollments('program_expenses','maximum');">
							</th>
						</tr>
						<%
							oneform_title_line "Nametags"
							oneform_budget_line 2, Null, Null, 3, "Per Particpant", Null, Null, "VARIABLE", "nametags", "program_expenses", 1
							oneform_budget_spacer

							oneform_title_line "Parking"
							oneform_budget_line 2, Null, Null, 3, "Per Particpant", Null, Null, "VARIABLE", "parking", "program_expenses", 2
							oneform_budget_spacer

							oneform_title_line "Certificates"
							oneform_budget_line 2, Null, Null, 3, "Per Particpant", Null, Null, "VARIABLE", "certificates", "program_expenses", 3
							oneform_budget_spacer

							oneform_title_line "Administration ($7 non-credit / $10 credit)"
							oneform_budget_line 2, Null, Null, 3, "Per Particpant", Null, Null, "VARIABLE", "administration", "program_expenses", 4
							oneform_budget_spacer

							oneform_title_line "Marketing"
							oneform_budget_line 2, Null, Null, 3, "Per Particpant", Null, Null, "VARIABLE", "marketing", "program_expenses", 5
							oneform_budget_spacer
						%>
						<tr>
							<td colspan="6" class="oneform_budget_section_header">
								Program Expense Totals
							</td>
							<td align="center" class="column_7">
								$<input type="text" name="program_expenses_target" style="width: 40px;" value="0" disabled="disabled" class="disabled_input">
							</td>
							<td align="center" class="column_8">
								$<input type="text" name="program_expenses_minimum" style="width: 40px;" value="0" disabled="disabled" class="disabled_input">
							</td>
							<td align="center" class="column_9">
								$<input type="text" name="program_expenses_maximum" style="width: 40px;" value="0" disabled="disabled" class="disabled_input">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Pricing Calculator:
				</td>
				<td class="rc_section_title">
					<a style="cursor:hand;" onClick="view_details('pricing_calculator_detail','pricing_calculator_link');"><img src="/images/icons/show.gif" name="pricing_calculator_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="pricing_calculator_detail" style="display: none;">
					<label for="event_crn" style="width: <%=int_label_width%>">Expenses Per Participant:</label>$<input type="text" style="width: 100px;" name="pricing_calculator_pp" value=""><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Expenses @40%:</label>$<input type="text" style="width: 100px;" name="pricing_calculator_40" value=""><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Expenses @50%:</label>$<input type="text" style="width: 100px;" name="pricing_calculator_50" value=""><br>
					<label for="event_crn" style="width: <%=int_label_width%>">Expenses @60%:</label>$<input type="text" style="width: 100px;" name="pricing_calculator_60" value="">
				</td>
			</tr>
			<tr>
				<td class="rc_section_title">
					Budget Notes:
				</td>
				<td class="rc_section_title">
					<a style="cursor:hand;" onClick="view_details('budget_notes_detail','budget_notes_link');"><img src="/images/icons/show.gif" name="budget_notes_link" border="0"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="budget_notes_detail" style="display: none;" align="center">
					<textarea name="budget_notes" style="width: 650px; height: 200px;"><%=mem_budget_notes%></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="one_form_buttons" align="center">
					<input type="button" value="Save One-Form" onClick="validate();">&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset One-Form">
				</td>
			</tr>
		</table>
	</form>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->
<script language="JavaScript">
	function validate(){
		
		frm_one_form.submit();

	}
	
	function view_all(str_display){
	
		document.getElementById("request_information_detail").style.display = str_display;
		document.getElementById("event_basics_detail").style.display = str_display;
		document.getElementById("event_status_detail").style.display = str_display;
		document.getElementById("event_listing_detail").style.display = str_display;
		document.getElementById("event_details_detail").style.display = str_display;
		document.getElementById("proposed_schedule_detail").style.display = str_display;
		document.getElementById("proposed_location_detail").style.display = str_display;
		document.getElementById("information_for_catalog_detail").style.display = str_display;
		document.getElementById("series_detail").style.display = str_display;
		document.getElementById("enrollment_options_detail").style.display = str_display;
		document.getElementById("registration_needs_detail").style.display = str_display;
		document.getElementById("wrapup_needs_detail").style.display = str_display;
		document.getElementById("accounting_index_detail").style.display = str_display;
		document.getElementById("enrollment_estimates_detail").style.display = str_display;
		document.getElementById("primary_instructor_detail").style.display = str_display;
		document.getElementById("secondary_instructor_detail").style.display = str_display;
		document.getElementById("instructor_of_record_detail").style.display = str_display;
		document.getElementById("contact_detail").style.display = str_display;
		document.getElementById("instructor_notes_detail").style.display = str_display;
		document.getElementById("direct_expenses_detail").style.display = str_display;
		document.getElementById("revenue_detail").style.display = str_display;
		document.getElementById("program_expenses_detail").style.display = str_display;
		document.getElementById("pricing_calculator_detail").style.display = str_display;
		document.getElementById("budget_notes_detail").style.display = str_display;
	
	}

	function show_subcategory_select(str_category_code){
	
		<%
			For i = LBound(arr_subcategory_rs,2) to UBound(arr_subcategory_rs, 2)
		
				Response.Write(vbcrlf & "document.getElementById('" & arr_subcategory_rs(2,i) & "_subcategory').style.display = 'none';")
			
			Next
		%>
	
		document.getElementById(str_category_code + '_subcategory').style.display = 'inline';

	}

</script>