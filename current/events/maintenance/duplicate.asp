<!-- #include virtual="/layout/_top.asp" -->
<!-- #include virtual="/functions/global.asp" -->
<%
	int_label_width = 90
%>
<!-- #include virtual="/events/maintenance/event_fields.asp" -->
<form action="/events/new/process.asp" method="post" name="frm_event_search">
	<table width="900" border="0" cellpadding="3" cellspacing="12" align="center">
		<tr>
			<td>
				<div class="section_title">Current Event:</div>
				<label for="event_crn" style="width: <%=int_label_width%>">CRN:</label>
					<input style="width: 100px;" name="event_crn" value="<%=str_event_crn%>" disabled><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Rubric:</label>
					<input style="width: 100px;" name="event_rubric" value="<%=str_event_rubric%>" disabled><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Number:</label>
					<input style="width: 100px;" name="event_number" value="<%=str_event_number%>" disabled><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Section:</label>
					<input style="width: 100px;" name="event_section" value="<%=str_event_section%>" disabled><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Quarter</label>
					<input style="width: 100px;" name="event_quarter" value="<%=str_event_quarter%>" disabled><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Semester:</label>
					<input style="width: 100px;" name="event_semester" value="<%=str_event_semester%>" disabled><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Year:</label>
					<input style="width: 100px;" name="event_year" value="<%=str_event_year%>" disabled><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Status:</label>
					<input style="width: 100px;" name="event_status" value="<%=str_event_status%>" disabled><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Type:</label>
					<input style="width: 100px;" name="event_type" value="<%=str_event_type%>" disabled><br>
				<label for="event_title" style="width: <%=int_label_width%>">Event Title:</label>
					<input style="width: 300;" name="event_title" value="<%=str_event_title%>" disabled><br>
			</td>
			<td>
				<div class="section_title">New Event:</div>
				<label for="event_crn" style="width: <%=int_label_width%>">CRN:</label>
				<input style="width: 100px;" name="event_crn" value="<%=str_event_crn%>"><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Rubric:</label>
				<%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_rubric'", "domain_value_description", "event_rubric", "", str_event_rubric, "", "", "", "width: 100px;", 1, 0, Null
				%><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Number:</label>
				<input style="width: 100px;" name="event_number" value="<%=str_event_number%>"><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Section:</label>
				<input style="width: 100px;" name="event_section" value="<%=str_event_section%>"><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Quarter:</label>
				<%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_quarter'", "domain_value_description", "event_quarter", "", str_event_quarter, "", "", "", "width: 100px;", 1, 0, Null
				%><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Semester:</label>
				<%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_semester'", "domain_value_description", "event_semester", "", str_event_semester, "", "", "", "width: 100px;", 1, 0, Null
				%><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Year:</label>
				<%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_year'", "domain_value_description", "event_year", "", str_event_year, "", "", "", "width: 100px;", 1, 0, Null
				%><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Status:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_status'", "domain_value_description", "event_status", "", str_event_status, "", "", "", "width: 100px;", 1, 0, Null
				%><br>
				<label for="event_crn" style="width: <%=int_label_width%>">Type:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_type'", "domain_value_description", "event_type", "", str_event_type, "", "", "", "width: 100px;", 1, 0, Null
				%><br>
				<label for="event_title" style="width: <%=int_label_width%>">Event Title:</label>
				<input style="width: 300;" name="event_title" value="<%=str_event_title%>"><br>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="left">
				<div class="section_title">Duplication Options:</div>
				<input type="checkbox" name="duplication_options" value="basics" checked class="no_border" disabled>Basics<br>
				<input type="checkbox" name="duplication_options" value="dtl" class="no_border">Dates, Times & Locations<br>
				<input type="checkbox" name="duplication_options" value="personnel" class="no_border">Personnel<br>
				<input type="checkbox" name="duplication_options" value="budgets" class="no_border">Budget Items<br>
				<input type="checkbox" name="duplication_options" value="credits" class="no_border">Credit Options & Fees<br>
				<input type="checkbox" name="duplication_options" value="tasks" class="no_border">Tasks
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="Process Duplication">&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset Duplication">
				<input type="hidden" name="process_type" value="DPLCT">
				<input type="hidden" name="event_id" value="<%=int_event_id%>">
			</td>
		</tr>
	</table>
</form>
<!-- #include virtual="/layout/_bottom.asp" -->
