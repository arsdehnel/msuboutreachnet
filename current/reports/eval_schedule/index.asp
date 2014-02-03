<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Evaluations Schedule Report</div>
<center>
<form method="post" name="frm_eval_schedule_report" action="process.asp">
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
		
		document.frm_eval_schedule_report.submit();
		
	}
</script>