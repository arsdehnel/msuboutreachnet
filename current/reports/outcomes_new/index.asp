<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Outcomes Reports</div>
<center>
<form method="post" name="frm_outcomes_reports" action="process.asp">
	<table class="create_report_table" style="width: 800px;">
		<tr>
			<td class="rc_section_title" colspan="2">
				Report Type:
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<span style="width: 50px;"></span><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'outcomes_report_types'", "domain_value_description asc", "report_type", "", 0, "", "", "", "width: 650px;", 1, 0, Null
				%>
			</td>
		</tr>
		<tr>
			<td class="rc_section_title" colspan="2">
				Dates:
			</td>
		</tr>
		<tr>
			<td width="50%" valign="top">
				<label for="start_date" style="width: <%=str_label_width%>px;">Start date:</label><input type="text" class="datepicker" name="start_date" /><br />
				<label for="start_date" style="width: <%=str_label_width%>px;">Fiscal Year:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_year'", "domain_value_description desc", "event_year", "", 0, "", "", "All Fiscal Years", "width: 200px;", 4, 0, Null
				%>
				
			</td>
			<td width="50%">
				<label for="end_date" style="width: <%=str_label_width%>px;">End date:</label><input type="text" class="datepicker" name="end_date" /><br />
				<label for="end_date" style="width: <%=str_label_width%>px;">Fiscal Quarter:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_quarter'", "domain_value_description", "event_quarter", "", 0, "", "", "All Quarters", "width: 200px;", 4, 0, Null
				%>
			</td>
		</tr>
		<tr>
			<td class="rc_section_title" colspan="2">
				Criteria:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="event_rubric" style="width: <%=str_label_width%>px;">Rubric:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_rubric'", "domain_value_description", "event_rubric", "", 0, "", "", "All Rubrics", "width: 200px;", 4, 0, Null
				%><br>
				<label for="event_status" style="width: <%=str_label_width%>px;">Status:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_status'", "domain_value_description", "event_status", "", 0, "", "", "All Statuses", "width: 200px;", 4, 0, Null
				%><br>
				<label for="event_type" style="width: <%=str_label_width%>px;">Type:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_type'", "domain_value_description", "event_type", "", 0, "", "", "All Types", "width: 200px;", 4, 0, Null
				%>
			</td>
			<td width="50%" valign="top">
				<label for="event_coordinator" style="width: <%=str_label_width%>px;">Coordinator:</label><%
					custom_ddlb "prc_lov_lookup 'PSNLB','type=ST&position=CO'", "event_coordinator", Null, Null, Null, Null, "All Coordinators", Null, "width: 200px;", 4, Null
				%><br>
				<label for="event_personnel" style="width: <%=str_label_width%>px;">Location Group:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'location_type'", "domain_value_description", "location_group", "", 0, "", "", "All Location Groups", "width: 200px;", 4, 0, Null
				%>
				<label for="event_personnel" style="width: <%=str_label_width%>px;">Location:</label><%
					custom_ddlb "prc_lov_lookup 'DVIDD','domain_code=dtl_location'", "location_id", Null, Null, Null, Null, Null, Null, "width: 200px", 4, Null
				%>
			</td>
		</tr>
		<tr>
			<td class="rc_section_title">
				Groupings:
			</td>
			<td class="rc_section_title">
				Sort Order:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="event_status" style="width: <%=str_label_width%>px;">Primary:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'group_by_options'", "domain_value_description", "gb_1_field", Null, Null, Null, Null, "[ No Group Field ]", "width: 225px;", 1, 0, Null
				%><br>
				<label for="event_status" style="width: <%=str_label_width%>px;">Secondary:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'group_by_options'", "domain_value_description", "gb_2_field", Null, Null, Null, Null, "[ No Group Field ]", "width: 225px;", 1, 0, Null
				%><br>
				<label for="event_status" style="width: <%=str_label_width%>px;">Tertiary:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'group_by_options'", "domain_value_description", "gb_3_field", Null, Null, Null, Null, "[ No Group Field ]", "width: 225px;", 1, 0, Null
				%><br>
				<label for="event_status" style="width: <%=str_label_width%>px;">Quaternary:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'group_by_options'", "domain_value_description", "gb_4_field", Null, Null, Null, Null, "[ No Group Field ]", "width: 225px;", 1, 0, Null
				%>
			</td>
			<td width="50%" valign="top">
				<label for="event_status" style="width: <%=str_label_width%>px;">Primary:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'order_by_options'", "domain_value_description", "ob_1_field", Null, Null, Null, Null, "[ No Order Field ]", "width: 150px;", 1, 0, Null
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'sort_orders'", "domain_value_description", "ob_1_dir", Null, "ASC", "", "", "", "width: 90px;", 1, 0, Null
				%><br>
				<label for="event_status" style="width: <%=str_label_width%>px;">Secondary:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'order_by_options'", "domain_value_description", "ob_2_field", Null, Null, Null, Null, "[ No Order Field ]", "width: 150px;", 1, 0, Null
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'sort_orders'", "domain_value_description", "ob_2_dir", Null, "ASC", "", "", "", "width: 90px;", 1, 0, Null
				%><br>
				<label for="event_status" style="width: <%=str_label_width%>px;">Tertiary:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'order_by_options'", "domain_value_description", "ob_3_field", Null, Null, Null, Null, "[ No Order Field ]", "width: 150px;", 1, 0, Null
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'sort_orders'", "domain_value_description", "ob_3_dir", Null, "ASC", "", "", "", "width: 90px;", 1, 0, Null
				%><br>
				<label for="event_status" style="width: <%=str_label_width%>px;">Quaternary:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'order_by_options'", "domain_value_description", "ob_4_field", Null, Null, Null, Null, "[ No Order Field ]", "width: 150px;", 1, 0, Null
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'sort_orders'", "domain_value_description", "ob_4_dir", Null, "ASC", "", "", "", "width: 90px;", 1, 0, Null
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
		
		document.frm_outcomes_reports.submit();
		
	}
</script>