<link rel="stylesheet" type="text/css" href="/css/sfrm_event_information.css">
<link rel="stylesheet" type="text/css" href="/css/sfrm_iframe.css">
<link rel="stylesheet" type="text/css" href="/css/texts.css">
<!-- #include virtual="/functions/global.asp" -->
<%
	Select Case Request.QueryString
	
		Case "process"
		
			Response.Write(sql)
			Response.Redirect("iframe.asp?which=" & Request.Form("mailing_list_id"))
	
		Case Else
		
			arr_mailing_list_personnel_recordset = get_recordset( "SELECT * FROM vtbl_mailing_list_personnel WHERE mailing_list_personnel_id = " & Request.QueryString("which"), False )
		
			%>
			<link rel="stylesheet" type="text/css" href="/css/sfrm_event_information.css">
			<body>
			<form action="remove.asp?process" method="post">
				<div>Are you sure you want to remove this personnel from this mailing list?</div>
				<div align="center"><input type="submit" value="Yes">&nbsp;&nbsp;&nbsp;<input type="button" onClick="location.href='iframe.asp?which=<%=arr_mailing_list_personnel_recordset(1,0)%>'" value="No"><input value="<%=arr_mailing_list_personnel_recordset(0,0)%>" name="mailing_list_personnel_id" type="hidden"><input value="<%=arr_mailing_list_personnel_recordset(1,0)%>" name="mailing_list_id" type="hidden"></div>
			</form>
			</body>
			<%
	
	End Select
%>
