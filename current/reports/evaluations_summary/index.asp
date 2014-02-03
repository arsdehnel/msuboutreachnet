<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Evaluation Summary Reports</div>
<center>
<form method="post" name="frm_evaluation_summary_reports" action="process.asp">
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
			<td width="50%">
				<label for="event_coordinator" style="width: <%=str_label_width%>px;">Coordinator:</label><%
					custom_ddlb "prc_lov_lookup 'PSNLB','type=ST&position=CO'", "coordinator_id", Null, Null, Null, Null, "All Coordinators", Null, "width: 200px;", 4, Null
				%><br>
				<label for="event_personnel" style="width: <%=str_label_width%>px;">Instructor /<br>Contact /<br>Sponsor:</label><%
					custom_ddlb "prc_lov_lookup 'PSNLA','type=EX'", "external_personnel_id", Null, Null, Null, Null, "All Personnel", Null, "width: 200px;", 4, Null
				%>
			</td>
			<td width="50%">
				<label for="event_rubric" style="width: <%=str_label_width%>px;">Rubric:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'event_rubric'", "domain_value_description", "event_rubric", "", 0, "", "", "All Rubrics", "width: 200px;", 4, 0, Null
				%><br>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<label for="anjo_courses" style="width: <%=str_label_width%>px;">Include Above/Below Averages?</label><%
					custom_ddlb "prc_lov_lookup 'GPSTD','domain_code=status_code&domain_group_master_code=yes_no'", "above_below", Null, "N", Null, Null, Null, Null, "width: 100px", 1, Null
				%><br>
				<label for="anjo_courses" style="width: <%=str_label_width%>px;">Include Comments?</label><%
					custom_ddlb "prc_lov_lookup 'GPSTD','domain_code=status_code&domain_group_master_code=yes_no'", "include_comments", Null, "N", Null, Null, Null, Null, "width: 100px", 1, Null
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
		
		document.frm_evaluation_summary_reports.submit();
		
	}
</script>