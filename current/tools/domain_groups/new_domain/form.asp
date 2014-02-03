<!-- #include virtual="/functions/global.asp" -->
<%	
	int_label_width = 100
	
	If Request.QueryString("which") = 0 Then
		int_domain_id			= 0
		str_domain_code			= ""
		str_domain_description	= ""
		str_submit_button_text 	= "Create Domain"
	Else
		arr_domain_value_recordset = get_recordset( "SELECT * FROM tbl_domain_values WHERE domain_value_id = " & Request.QueryString("which"), False )
		int_domain_id			= 0
		str_domain_code			= ""
		str_domain_description	= ""
		str_submit_button_text 	= "Update Domain"
	End If
%>
<link rel="stylesheet" type="text/css" href="/css/sfrm_event_information.css">
<link rel="stylesheet" type="text/css" href="/css/sfrm_iframe.css">
<body>
<form action="/tools/domains/new_domain/process.asp" method="post">
	<label for="list_id" style="width: <%=int_label_width%>px;">Code:</label><input type="text" value="<%=str_domain_code%>" name="domain_code"><br>
	<label for="list_id" style="width: <%=int_label_width%>px;">Description:</label><input type="text" value="<%=str_domain_description%>" name="domain_description"><br>
	<input type="submit" value="<%=str_submit_button_text%>">&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" onClick="location.href='../index.asp';"><input type="hidden" value="<%=int_domain_id%>" name="domain_id">
</form>
</body>