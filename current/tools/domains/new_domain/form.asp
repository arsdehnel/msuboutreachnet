<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Edit Domain Value</div>
<%	
	int_label_width = 100
	
	If Request.QueryString("which") = 0 Then
		int_domain_id				= 0
		str_code					= Null
		str_description				= Null
		str_comments				= Null
		str_submit_button_text 		= "Create Domain"
	Else
		arr_domain_value_recordset = get_recordset( "SELECT * FROM tbl_domain_values WHERE domain_value_id = " & Request.QueryString("which"), False )
		int_domain_id				= 0
		str_domain_code				= ""
		str_domain_description		= ""
		str_submit_button_text 		= "Update Domain"
	End If
%>
<center>
	<form action="process.asp" method="post">
		<label style="width: <%=int_label_width%>px;">Code:</label><input type="text" value="<%=str_domain_code%>" name="code"><br>
		<label style="width: <%=int_label_width%>px;">Description:</label><input type="text" value="<%=str_domain_description%>" name="description"><br>
		<input type="submit" value="<%=str_submit_button_text%>">&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" onClick="location.href='../index.asp';">
		<input type="hidden" name="domain_id" value="<%=int_domain_id%>">
		<input type="hidden" name="comments" value="<%=str_comments%>">
	</form>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->
