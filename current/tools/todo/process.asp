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
		
	arr_email_rs = get_recordset( "prc_personnel_lookup 'BGRPT'," & validate_field(Session("user_id"),"ip") & ",Null,Null,Null,Null" )		
	str_to = "MSUBOutreach.net Webmaster (webmaster@msuboutreach.net), CPSLL Staff (cpsinfo@msubillings.edu) "
	If Not IsNull(arr_email_rs(0,0)) Then
		str_to = str_to & ", " & arr_email_rs(0,0)
	End If
		
	str_first_name = arr_email_rs(1,0)
	str_last_name = arr_email_rs(2,0)
	
	str_message = "<!DOCTYPE HTML PUBLIC ""-//W3C//DTD HTML 4.0 Transitional//EN"">" & vbCrLf _
				& "<html>" & vbCrLf _
				& "<head>" & vbCrLf _
				& "<title>Bug Item Update</title>" & vbCrLf _
				& "<meta http-equiv=Content-Type content=""text/html; charset=iso-8859-1"">" & vbCrLf _
				& "</head>" & vbCrLf _
				& "<body style=""font-family: Arial, sans-serif; font-size: 12px;"">" & vbCrLf _
				& "<strong>Original Bug:</strong><br> " & format_memo(Request.Form("description")) & "<br><br>" _
				& "<strong>Submitted by:</strong><br> " & str_first_name & " " & str_last_name & "<br><br>" _
				& "<strong>Submitted on:</strong><br> " & Now() & "<br><br>" _
				& "</body>" & vbCrLf _
				& "</html>" & vbCrLf
			
	Set objCDO = Server.CreateObject("CDO.Message")
	With objCDO
		.To       = str_to
		.From     = "MSUBOutreach Online (webmaster@msuboutreach.net)"
		.Subject  = "[MSUBOutreach.net Bug] - " & Request.Form("subject")
		.HtmlBody = str_message
		.Send
	End With
	Set objCDO = Nothing

	Session("success_line") = "Item submitted successfully."
	
	Response.Redirect("index.asp")
		
%>