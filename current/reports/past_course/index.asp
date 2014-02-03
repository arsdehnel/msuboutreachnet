<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Past Course Report</div>
<center>
<form action="process.asp" method="post" name="frm_past_course_report">
	<table class="create_report_table" style="width: 800px;">
		<tr>
			<td class="rc_section_title" colspan="2">
				Dates:
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<label for="last_date" style="width: <%=str_label_width%>px;">Last date:</label><input type="text" class="datepicker" name="last_date" value="<%=date%>" />
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
		
		document.frm_past_course_report.submit();
		
	}
</script>