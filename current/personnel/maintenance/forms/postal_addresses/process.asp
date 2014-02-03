<!-- #include virtual="/functions/global.asp" -->
<%

	Set objConn = Server.CreateObject("ADODB.Connection")
	objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
	Set objComm = Server.CreateObject("ADODB.Command")
	Set objComm.ActiveConnection = objConn
	objComm.CommandText = "msuboutreachnet.prc_personnel_address_ins_upd"
	objComm.CommandType = &H0004
		
	objComm.Parameters.Append objComm.CreateParameter("@RETURN_VALUE", 3,4,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_process_type", 200,1,5)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_address_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_personnel_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_title", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_addr_1", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_addr_2", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_addr_3", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_city", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_state", 200,1,2)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_postal_code", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_primary_ind", 200,1,1)
	objComm.Parameters.Append objComm.CreateParameter("@p_variable_string", 200,1,2000)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_log_user_id", 3,1,0)

	objComm("@p_in_process_type") 	= validate_field(Request.Form("process_type"),"pl")
	objComm("@p_in_address_id") 	= validate_field(Request.Form("address_id"),"pl")
	objComm("@p_in_personnel_id") 	= validate_field(Request.Form("personnel_id"),"pl")
	objComm("@p_in_title") 			= validate_field(Request.Form("title"),"pl")
	objComm("@p_in_addr_1") 		= validate_field(Request.Form("addr_1"),"pl")
	objComm("@p_in_addr_2") 		= validate_field(Request.Form("addr_2"),"pl")
	objComm("@p_in_addr_3") 		= validate_field(Request.Form("addr_3"),"pl")
	objComm("@p_in_city") 			= validate_field(Request.Form("city"),"pl")
	objComm("@p_in_state") 			= validate_field(Request.Form("state"),"pl")
	objComm("@p_in_postal_code") 	= validate_field(Request.Form("postal_code"),"pl")
	objComm("@p_in_primary_ind") 	= validate_field(Request.Form("primary_ind"),"pl")
	objComm("@p_variable_string") 	= Null
	objComm("@p_in_log_user_id") 	= Session("user_id")
  	
	objComm.Execute
	Response.Redirect("iframe.asp?which=" & Request.Form("personnel_id"))
	
%>