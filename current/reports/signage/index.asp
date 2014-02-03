<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Signage Report</div>
<center>
	<form action="process.asp" method="post" name="frm_budgeting_report">
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
					<label for="end_date" style="width: <%=str_label_width%>px;">End date:</label><input type="text" class="datepicker" name="start_date" />
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
		document.frm_budgeting_report.submit();
	}
</script>