<!-- #include virtual="/functions/global.asp" -->
<%
	Set objConn = Server.CreateObject("ADODB.Connection")
	objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
	Set objComm = Server.CreateObject("ADODB.Command")
	Set objComm.ActiveConnection = objConn
	objComm.CommandText = "msuboutreachnet.prc_task_detail_ins_upd"
	objComm.CommandType = &H0004
		
	objComm.Parameters.Append objComm.CreateParameter("@RETURN_VALUE", 3,4,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_process_type", 200,1,5)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_task_detail_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_task_master_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_subject", 200,1,200)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_description", 200,1,2147483647)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_resolution", 200,1,4000)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_completion_date", 135,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_priority", 17,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_type", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_status_code", 200,1,1)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_comments", 200,1,4000)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_variable_string", 200,1,2000)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_log_user_id", 3,1,0)

	objComm("@p_in_process_type") 		= validate_field(Request.Form("process_type"),"pl")
	objComm("@p_in_task_detail_id") 	= validate_field(Request.Form("task_detail_id"),"pl")
	objComm("@p_in_task_master_id") 	= validate_field(Request.Form("task_master_id"),"pl")
	objComm("@p_in_subject") 			= validate_field(Request.Form("subject"),"pl")
	objComm("@p_in_description") 		= validate_field(Request.Form("description"),"pl")
	objComm("@p_in_resolution") 		= validate_field(Request.Form("resolution"),"pl")
	objComm("@p_in_completion_date") 	= validate_field(Request.Form("completion_date"),"pl")
	objComm("@p_in_priority") 			= validate_field(Request.Form("priority"),"pl")
	objComm("@p_in_type") 				= validate_field(Request.Form("type"),"pl")
	objComm("@p_in_status_code") 		= validate_field(Request.Form("status_code"),"pl")
	objComm("@p_in_comments") 			= validate_field(Request.Form("comments"),"pl")
	objComm("@p_in_variable_string") 	= Null
	objComm("@p_in_log_user_id") 		= Session("user_id")
  	
	objComm.Execute
		
	arr_bug_recordset = get_recordset( "prc_task_lookup 'BUGCL',Null," & Request.Form("task_detail_id") & ",Null" )
	
	str_subject = "[MSUBOutreach.net Bug Resolved] - " & arr_bug_recordset(2,0)
	
	str_message = "<!DOCTYPE HTML PUBLIC ""-//W3C//DTD HTML 4.0 Transitional//EN"">" & vbCrLf _
				& "<html>" & vbCrLf _
				& "<head>" & vbCrLf _
				& "<title>Bug Item Update</title>" & vbCrLf _
				& "<meta http-equiv=Content-Type content=""text/html; charset=iso-8859-1"">" & vbCrLf _
				& "</head>" & vbCrLf _
				& "<body style=""font-family: Arial, sans-serif; font-size: 12px;"">" & vbCrLf _
				& "<strong>Original Bug:</strong><br> " & format_memo(arr_bug_recordset(3,0)) & "<br><br>" _
				& "<strong>Submitted by:</strong><br> " & arr_bug_recordset(10,0) & " " & arr_bug_recordset(10,0) & "<br><br>" _
				& "<strong>Submitted on:</strong><br> " & arr_bug_recordset(11,0) & "<br><br><hr><br>" _
				& "<strong>Resolution:</strong><br>" & format_memo(arr_bug_recordset(4,0)) & "<br><br>" _
				& "<strong>Resolved on:</strong><br> " & arr_bug_recordset(5,0) & "<br><br>" _
				& "</body>" & vbCrLf _
				& "</html>" & vbCrLf
	
	str_emails = ""
	
	If InStr(Request.Form("email"),"yourself") Then
		str_emails = str_emails & get_user_email( Session("user_id") ) & ", "
	End If
	
	If InStr(Request.Form("email"),"submitter") Then
		'If Not IsNull(get_user_email( arr_bug_recordset(7,0) )) Then
		'	str_emails = str_emails & get_user_email( arr_bug_recordset(7,0) ) & ", "
		'End IF
	End If
	
	If InStr(Request.Form("email"),"webmaster") Then
		str_emails = str_emails & "MSUBOutreach.net Webmaster (webmaster@msuboutreach.net), "
	End If
	
	If InStr(Request.Form("email"),"cpsinfo") Then
		str_emails = str_emails & "CPSLL Staff (cpsinfo@msubillings.edu), "
	End If
	
	str_emails = Left(str_emails,Len(str_emails)-2)	
	
	Set objCDO = Server.CreateObject("CDO.Message")
	With objCDO
		.To       = str_emails
		.From     = "MSUBOutreach Online (webmaster@msuboutreach.net)"
		.Subject  = str_subject
		.HtmlBody = str_message
		.Send
	End With
	Set objCDO = Nothing
		
	Response.Redirect("index.asp")


strTo = Request.Form("to")

strFrom = "User Name <webmaster@msuboutreach.net>"

strSubject = "Sample HTML Email sent from ASP 101!"

strBody = "<!DOCTYPE HTML PUBLIC ""-//W3C//DTD HTML 4.0 Transitional//EN"">" & vbCrLf _
		& "<html>" & vbCrLf _
		& "<head>" & vbCrLf _
		& " <title>Sample Message From ASP 101</title>" & vbCrLf _
		& " <meta http-equiv=Content-Type content=""text/html; charset=iso-8859-1"">" & vbCrLf _
		& "</head>" & vbCrLf _
		& "<body bgcolor=""#FFFFCC"">" & vbCrLf _
		& " <h2>Sample Message From ASP 101</h2>" & vbCrLf _
		& " <p>" & vbCrLf _
		& "  This message was sent from a sample at" & vbCrLf _
		& "  <a href=""http://www.asp101.com"">ASP 101</a>." & vbCrLf _
		& "  It is used to show people how to send HTML" & vbCrLf _
		& "  formatted email from an Active Server Page." & vbCrLf _
		& "  If you did not request this email yourself," & vbCrLf _
		& "  your address was entered by one of our" & vbCrLf _
		& "  visitors." & vbCrLf _
		& "  <strong>" & vbCrLf _
		& "  We do not store these e-mail addresses." & vbCrLf _
		& "  </strong>" & vbCrLf _
		& " </p>" & vbCrLf _
		& " <font size=""-1"">" & vbCrLf _
		& "  <p>Please address all concerns to webmaster@asp101.com.</p>" & vbCrLf _
		& "  <p>This message was sent to: " & strTo & "</p>" & vbCrLf _
		& " </font>" & vbCrLf _
		& "</body>" & vbCrLf _
		& "</html>" & vbCrLf

Response.Write str_message
Response.End

Function IsValidEmail(strEmail)

	Dim bIsValid
	bIsValid = True
	
	If Len(strEmail) < 5 Then
		bIsValid = False
	Else
		If Instr(1, strEmail, " ") <> 0 Then
			bIsValid = False
		Else
			If InStr(1, strEmail, "@", 1) < 2 Then
				bIsValid = False
			Else
				If InStrRev(strEmail, ".") < InStr(1, strEmail, "@", 1) + 2 Then
					bIsValid = False
				End If
			End If
		End If
	End If

	IsValidEmail = bIsValid
	
End Function
%>
