<!-- #include virtual="/layout/_top.asp" -->
<%
	str_label_width = 125
%>
<div id="page_title">Grade Schedule Report</div>
<center>
<form method="post" name="frm_grade_schedule_report" action="process.asp">
	<table class="create_report_table" style="width: 800px;">
		<%
			action_box
		%>
	</table>
</form>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->
<script language="JavaScript">
	function validate(){
		
		document.frm_grade_schedule_report.submit();
		
	}
</script>