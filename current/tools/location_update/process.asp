<!-- #include virtual="/functions/global.asp" -->
<%
	Set objConn = Server.CreateObject("ADODB.Connection")
	objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
	Set objComm = Server.CreateObject("ADODB.Command")
	Set objComm.ActiveConnection = objConn
	objComm.CommandText = "msuboutreachnet.tool_location_update"
	objComm.CommandType = &H0004
		
	objComm.Parameters.Append objComm.CreateParameter("@RETURN_VALUE", 3,4,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_session_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_old_location_id_string", 200,1,2000)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_new_location_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_log_user_id", 3,1,0)

	objComm("@p_in_session_id") 			= Session.SessionID
	objComm("@p_in_old_location_id_string") = validate_field(Request.Form("old_location_id_string"),"pl")
	objComm("@p_in_new_location_id") 		= validate_field(Request.Form("new_location_id"),"pl")
	objComm("@p_in_log_user_id") 			= Session("user_id")
  	
	objComm.Execute
	Session("success_line") = "Location(s) updated successfully."
  	Response.Redirect("index.asp")
%>