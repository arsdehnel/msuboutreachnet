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

	objComm("@p_in_process_type") 	= "RMOVE"
	objComm("@p_in_address_id") 	= validate_field(Request.QueryString("address_id"),"pl")
	objComm("@p_in_personnel_id") 	= Null
	objComm("@p_in_title") 			= Null
	objComm("@p_in_addr_1") 		= Null
	objComm("@p_in_addr_2") 		= Null
	objComm("@p_in_addr_3") 		= Null
	objComm("@p_in_city") 			= Null
	objComm("@p_in_state") 			= Null
	objComm("@p_in_postal_code") 	= Null
	objComm("@p_in_primary_ind") 	= Null
	objComm("@p_variable_string") 	= Null
	objComm("@p_in_log_user_id") 	= Session("user_id")
  	
	objComm.Execute
	Response.Redirect("index.asp?which=" & Request.QueryString("personnel_id"))
	
%>