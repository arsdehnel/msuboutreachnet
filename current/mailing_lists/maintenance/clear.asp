<!-- #include virtual="/functions/global.asp" -->
<%
	Select Case Request.QueryString
	
		Case "process"
				
			Response.Write(sql)
			Response.Redirect("/mailing_lists/maintenance/index.asp?which=" & Request.Form("mailing_list_id"))
	
		Case Else
		
			arr_mailing_list_recordset = get_recordset( "SELECT * FROM tbl_mailing_lists WHERE mailing_list_id = " & Request.QueryString("which"), False )
		
			%>
			<!-- #include virtual="/layout/_top.asp" -->
			<link rel="stylesheet" type="text/css" href="/css/sfrm_event_information.css">
			<body>
			<form action="clear.asp?process" method="post">
				Are you sure you want to clear this mailing list?<br>
				<input type="submit" value="Yes">&nbsp;&nbsp;&nbsp;<input type="button" onClick="location.href='index.asp?which=<%=arr_mailing_list_recordset(0,0)%>'" value="No"><input value="<%=arr_mailing_list_recordset(0,0)%>" name="mailing_list_id" type="hidden">
			</form>
			</body>
			<!-- #include virtual="/layout/_bottom.asp" -->
			<%
	
	End Select
%>
