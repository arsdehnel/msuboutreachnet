<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Course Report</div>
<center>
<form action="process.asp" method="post" name="frm_course_report">
	<table class="create_report_table" style="width: 800px;">
		<tr>
			<td class="rc_section_title" colspan="2">
				Dates:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="start_date" style="width: <%=str_label_width%>px;">Start date:</label><input type="text" class="datepicker" name="start_date" />
			</td>
			<td width="50%">
				<label for="end_date" style="width: <%=str_label_width%>px;">End date:</label><input type="text" class="datepicker" name="end_date" />
			</td>
		</tr>
		<tr>
			<td class="rc_section_title" colspan="2">
				Criteria:
			</td>
		</tr>
		<tr>
			<td width="50%" valign="top">
				<label for="event_rubric" style="width: <%=str_label_width%>px;">Rubric:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_rubric'", "domain_value_description", "event_rubric", "", 0, "", "", "All Rubrics", "width: 200px;", 4, 0, Null
				%><br>
				<label for="event_status" style="width: <%=str_label_width%>px;">Status:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_status'", "domain_value_description", "event_status", "", 0, "", "", "All Statuses", "width: 200px;", 4, 0, Null
				%>
			</td>
			<td width="50%">
				<label for="event_coordinator" style="width: <%=str_label_width%>px;">Coordinator:</label><%
					custom_ddlb "prc_lov_lookup 'PSNLB','type=ST&position=CO'", "coordinator_id", Null, Null, Null, Null, "All Coordinators", Null, "width: 200px;", 4, Null
				%><br>
				<label for="event_personnel" style="width: <%=str_label_width%>px;">Instructor /<br>Contact /<br>Sponsor:</label><%
					custom_ddlb "prc_lov_lookup 'PSNLA','type=EX'", "event_owner", Null, Null, Null, Null, "All Personnel", Null, "width: 200px;", 4, Null
				%><br>
				<label for="event_personnel" style="width: <%=str_label_width%>px;">Location Group:</label><%
					custom_ddlb "prc_lov_lookup 'GPCDE','domain_code=dtl_location'", "location_group", Null, Null, Null, Null, "All Location Groups", Null, "width: 200px", 4, Null
				%>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<label for="anjo_courses" style="width: <%=str_label_width%>px;">ANJO courses?</label><input type="checkbox" name="anjo_courses" class="no_border">
			</td>
		</tr>
		<tr>
			<td class="rc_section_title" colspan="2">
				Sorting Options:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="event_personnel" style="width: <%=str_label_width%>px;">Sort By:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'sort_fields'", "domain_value_description", "sort_field", "", 0, "", "", "", "width: 100px;", 1, 0, Null
				%>
			</td>
			<td width="50%">
				<label for="event_personnel" style="width: <%=str_label_width%>px;">Sort Order:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'sort_orders'", "domain_value_description", "sort_order", "", 0, "", "", "", "width: 100px;", 1, 0, Null
				%>
			</td>
		</tr>
		<%
			action_box
		%>
	</table>
</form>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->
<script language="JavaScript">
	function validate(){
		
		document.frm_course_report.submit();
		
	}
</script>