<!-- #include virtual="/layout/_top.asp" -->
<%
		
	arr_td_rs 				= get_recordset( "prc_task_lookup 'FTSKD',Null," & Request.QueryString("which") & ",Null" )
	int_task_detail_id		= arr_td_rs(0,0)
	int_task_master_id		= arr_td_rs(1,0)
	str_subject				= arr_td_rs(2,0)
	str_description			= arr_td_rs(3,0)
	str_resolution			= arr_td_rs(4,0)
	str_completion_date		= arr_td_rs(5,0)
	int_priority			= arr_td_rs(6,0)
	str_type				= arr_td_rs(7,0)
	str_status_code			= arr_td_rs(8,0)
	str_process_type		= "UPDTE"

%>
<center>
	<form action="process.asp" method="post" name="bug_form">
		<label>Subject:</label><input type="text" name="subject" style="width: 800px;" maxlength="255" value="<%=str_subject%>"><br>
		<label>Description:</label><textarea style="width: 800px; height: 250;" name="description"><%=str_description%></textarea><br>
		<label>Resolution:</label><textarea name="resolution" style="width: 800px; height: 250px;"><%=str_resolution%></textarea><br>
		<div align="center" style="text-align:left; width: 732px;">
		<label for="item_priority" style="width: 100px;">Item Priority: </label><select name="priority">
			<%
				For i = 1 to 10 
					
					Response.Write("<option value=""" & i & """")
					If i = int_priority Then
						Response.Write(" selected")
					End If
					Response.Write(">" & i & "</option>")
				
				Next
			%>			
		</select>&nbsp;<em style="font-size: 10px;">(1 = highest priority, 10 = lowest priority)</em><br>
		<label for="bug_subject" style="width: 100px;">Completed Date:</label><input type="text" name="completion_date" style="width: 150px;" value="<%=str_completion_date%>"><br>
		<label for="bug_subject" style="width: 100px;">E-mail:</label>
			<input type="checkbox" name="email" class="no_border" value="yourself" disabled="disabled" checked="checked">&nbsp;Yourself&nbsp;&nbsp;&nbsp;
			<input type="hidden" name="email" class="no_border" value="yourself">
			<input type="checkbox" name="email" class="no_border" value="submitter" checked="checked">&nbsp;Submitter&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="email" class="no_border" value="webmaster" checked="checked">&nbsp;MSUB Outreach Webmaster&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="email" class="no_border" value="cpsinfo">&nbsp;CPSINFO Mailbox&nbsp;&nbsp;&nbsp;
			<input type="hidden" name="type" value="todo_item"><br>
			<input type="hidden" name="task_detail_id" value="<%=int_task_detail_id%>">
			<input type="hidden" name="task_master_id" value="<%=int_task_master_id%>">
			<input type="hidden" name="status_code" value="<%=str_status_code%>">
			<input type="hidden" name="comments" value="<%=str_comments%>">
			<input type="hidden" name="process_type" value="<%=str_process_type%>">
		</div>
		<label for="buttons"></label><input type="submit" value="Submit Bug">&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear Form">
	</form>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->