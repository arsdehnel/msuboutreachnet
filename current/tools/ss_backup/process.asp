<!-- #include virtual="/layout/_top.asp" -->
<!-- #include virtual="/functions/adovbs.inc" -->
<h1>SQL Server Backup</h1>
<%
	Server.ScriptTimeout = 10800

	Set ss_objConn = Server.CreateObject("ADODB.Connection")
	ss_objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
	Dim adox_ss
	Set adox_ss = CreateObject("ADOX.Catalog")
	adox_ss.ActiveConnection = ss_objConn
    Dim catDB ' As ADOX.Catalog
    Set catDB = Server.CreateObject("ADOX.Catalog")  
    catDB.ActiveConnection = "PROVIDER=MICROSOFT.JET.OLEDB.4.0;DATA SOURCE=D:\Inetpub\wwwroot\msuboutreach.net\data\backup.mdb;"
    Dim tblNew ' As ADOX.Table
    Set tblNew = Server.CreateObject("ADOX.Table")
    Set col = Server.CreateObject("ADOX.Column")
	For Each ss_table in adox_ss.Tables
		If ss_table.Name = Request.Form("table_name") Then
			tblNew.Name = ss_table.Name
			With col
				ParentCatalog = catDB
				.Type = adInteger
				.Name = "backup_id"
			End With
    		tblNew.Columns.Append col
				str_insert_sql = "INSERT INTO " & ss_table.Name & " ([backup_id], "
				For Each ss_column in ss_table.Columns
					tblNew.Columns.Append ss_column.Name, 202
					str_insert_sql = str_insert_sql & "[" & ss_column.Name & "], "
				Next
				str_insert_sql = left(str_insert_sql,len(str_insert_sql) - 2) & ") VALUES ("
			catDB.Tables.Append tblNew
			arr_backup_rs = get_recordset( "SELECT * FROM " & ss_table.Name )

			int_first_field = Lbound(arr_backup_rs, 1)
			int_last_field	= Ubound(arr_backup_rs, 1)
			
			For int_curr_record = Lbound(arr_backup_rs, 2) to Ubound(arr_backup_rs, 2)
			
				str_temp_sql = str_insert_sql & int_curr_record & ", "
				For int_curr_field = int_first_field to int_last_field
				
					If Instr(arr_backup_rs(int_curr_field,int_curr_record),"""") > 0 Then
						str_temp_sql = str_temp_sql & """" & replace(arr_backup_rs(int_curr_field,int_curr_record),"""","'") & """, "
					Else
						str_temp_sql = str_temp_sql & """" & arr_backup_rs(int_curr_field,int_curr_record) & """, "
					End If
				
				Next
				str_temp_sql = left(str_temp_sql,len(str_temp_sql)-2) & ")"
				process_backup_sql str_temp_sql, True
			
			Next
			
			int_rec_count = Ubound(arr_backup_rs, 2) - Lbound(arr_backup_rs, 2)
			
		End If
		
	Next
	Set col = Nothing
	Set tblNew = Nothing
	Set catDB = Nothing
	ss_objConn.Close
	Set ss_objConn = nothing

	Session("success_line") = int_rec_count & " records backed up from the " & Request.Form("table_name") & " table."
	Response.Redirect("index.asp")
	
%>
<!-- #include virtual="/layout/_bottom.asp" -->
<%
	
	Public Sub process_backup_sql( str_sql, bln_show_sql )
	
		Set process_sql_objConn = Server.CreateObject("ADODB.Connection")
		process_sql_objConn.Open "PROVIDER=MICROSOFT.JET.OLEDB.4.0;DATA SOURCE=D:\Inetpub\wwwroot\msuboutreach.net\data\backup.mdb;"
		Set process_sql_objRS = Server.CreateObject("ADODB.Recordset")
		If bln_show_sql Then
			debug_line str_sql & "<br />"
		End If
		process_sql_objRS.Open str_sql, process_sql_objConn, 3, 3, &H0001		
		process_sql_objConn.Close
		Set process_sql_objConn = Nothing
			
	End Sub

%>