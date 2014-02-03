<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Course Repetition</div>
<center>
<form action="process.asp" method="post" name="frm_course_report">
	<table class="create_report_table" style="width: 800px;">
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
			<td colspan="2" valign="top">
				<label for="event_coordinator" style="width: <%=str_label_width%>px;">Coordinator:</label><%
					custom_ddlb "prc_lov_lookup 'PSNLB','type=ST&position=CO'", "event_coordinator", Null, Null, Null, Null, "All Coordinators", Null, "width: 200px;", 4, Null
				%><br>
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