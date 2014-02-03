<!-- #include virtual="/layout/_top.asp" -->
<%
		
	Set objConn = Server.CreateObject("ADODB.Connection")
	objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
	Set objComm = Server.CreateObject("ADODB.Command")
	Set objComm.ActiveConnection = objConn
	objComm.CommandText = "msuboutreachnet.prc_event_hold"
	objComm.CommandType = &H0004
		
	objComm.Parameters.Append objComm.CreateParameter("@RETURN_VALUE", 3,4,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_event_title", 200,1,255)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_event_status", 200,1,2)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_coordinator_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_event_remarks", 200,1,2147483647)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_session_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_personnel_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_log_user_id", 3,1,0)

	objComm("@p_in_event_title") 	= validate_field(Request.Form("event_title"),"pl")
	objComm("@p_in_event_status") 	= validate_field(Request.Form("event_status"),"pl")
	objComm("@p_in_coordinator_id") = validate_field(Request.Form("internal_staff_id"),"pl")
	objComm("@p_in_event_remarks") 	= validate_field(Request.Form("event_remarks"),"pl")
	objComm("@p_in_session_id") 	= Session.SessionID
	objComm("@p_in_personnel_id") 	= validate_field(Request.Form("personnel_id"),"pl")
	objComm("@p_in_log_user_id") 	= Session("user_id")
  	
	objComm.Execute
	
	int_return_code = objComm(0)
	
	Session("success_line") = fnc_return_code_lookup( "prc_event_hold", int_return_code )
	
	Response.Redirect("confirm.asp")
	
%>
<!-- #include virtual="/layout/_bottom.asp" -->