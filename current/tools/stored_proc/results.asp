<!-- #include virtual="/layout/_top.asp" -->
<h1>ASP Stored Procedure Parameter Lookup Results</h1>
<br />
<form action="results.asp" method="post" class="css_form">
	<label style="width: 200px;">Stored Procedure Name:</label><input type="text" name="sp_name" value="<%=Request.Form("sp_name")%>" style="width: 300px;"><br />
	<label style="width: 200px;"></label><input type="submit" />
<form>
<%
   Set Conn = Server.CreateObject("ADODB.Connection")

   ' The following line must be changed to reflect your data source info
   Conn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
   set cmd = Server.CreateObject("ADODB.Command")
   set cmd.ActiveConnection = Conn

   ' Specify the name of the stored procedure you wish to call
    cmd.CommandText = "msuboutreachnet." & Request.Form("sp_name")
    cmd.CommandType = &H0004

    ' Query the server for what the parameters are
    cmd.Parameters.Refresh
   %>
   <Table Border="1" cellpadding="1" cellspacing="0" style="color: #000066; font-size: 10px;">
   <TR>
      <TD colspan="4"><B><%=Request.Form("sp_name")%></B></TD>
   </TR>
	<TR>
      <TD colspan="4">
	  	<textarea style="padding: 6px; height: 500px; width: 675px; font-family: 'Courier New', Courier, monospace;" wrap="off">
	Set objConn = Server.CreateObject("ADODB.Connection")
	objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
	Set objComm = Server.CreateObject("ADODB.Command")
	Set objComm.ActiveConnection = objConn
	objComm.CommandText = "msuboutreachnet.<%=Request.Form("sp_name")%>"
	objComm.CommandType = &H0004
		<%
		
		Response.Write(vbcrlf)
		
	  	For Each param In cmd.Parameters
			Response.Write(vbtab & "objComm.Parameters.Append objComm.CreateParameter(""" & param.name & """, " & param.type & "," & param.direction & "," & param.size & ")" & vbcrlf)
		Next
		
		Response.Write(vbcrlf)

	  	For Each param In cmd.Parameters
			If param.name <> "@RETURN_VALUE" Then
				Response.Write(vbtab & "objComm(""" & param.name & """) = validate_field(Request.Form(""" & Right(param.name,len(param.name)-6) & """),""pl"")" & vbcrlf)
				If param.precision > 0 Then
					Response.Write(vbtab & "Precision: " & param.precision & vbcrlf)
				End If
				If param.numericscale > 0 Then
					Response.Write(vbtab & "Scale: " & param.numericscale & vbcrlf)
				End If
			End If
		Next
	  %>  	
		objComm.Execute
	  </textarea>
	  </TD>
   </TR>
   <TR>
      <TD><B>PARAMETER NAME</B></TD>
      <TD><B>DATA-TYPE</B></TD>
      <TD><B>DIRECTION</B></TD>
      <TD><B>DATA-SIZE</B></TD>
   </TR>
   <% For Each param In cmd.Parameters %>
   <TR>
      <TD><%= param.name %></TD>
      <TD><%= param.type %></TD>
      <TD><%= param.direction %></TD>
      <TD><%= param.size %></TD>
   </TR>
   <%
    Next

    Conn.Close
   %>
   </TABLE>
<!-- #include virtual="/layout/_bottom.asp" -->