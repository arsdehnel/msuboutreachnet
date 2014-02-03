<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Report a bug / Suggest an improvement</div>
<form action="/tools/todo/process.asp" method="post" name="bug_form">
	<label>Subject:</label><input type="text" name="subject" style="width: 600px;" maxlength="255"><br>
	<label>Description:</label><textarea style="width: 600px; height: 400;" name="description"></textarea><br>
	<%
		If Session("security_level") >= 8 Then
			%>  
			<label for="item_priority">Item Priority: </label><select name="priority">
				<%
					For i = 1 to 10 
					
						Response.Write("<option value=""" & i & """>" & i & "</option>")
					
					Next
				%>			
			</select>&nbsp;<em style="font-size: 10px;">(1 = highest priority, 10 = lowest priority)</em>
			<input type="hidden" name="type" value="todo_item"><br>
			<%
		Else
			%>
			<input type="hidden" name="priority" value="5">
			<input type="hidden" name="type" value="bug">
			<%
		End If
	%>
	<label for="buttons"></label><input type="submit" value="Submit Bug">&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear Form">
	<input type="hidden" name="task_master_id" value="1">
	<input type="hidden" name="task_detail_id" value="0">
	<input type="hidden" name="status_code" value="A">
	<input type="hidden" name="comments" value="">
	<input type="hidden" name="process_type" value="INSRT">
	<input type="hidden" name="resolution" value="">
	<input type="hidden" name="completion_date" value="">
</form>
<!-- #include virtual="/layout/_bottom.asp" -->