<form action="process.asp" method="post">
	<div>Select worksheet from uploaded file:</div>
<%
	Set ml_loadobjConn = Server.CreateObject("ADODB.Connection")
	ml_loadobjConn.Open "PROVIDER=MICROSOFT.JET.OLEDB.4.0;DATA SOURCE=D:\Inetpub\wwwroot\msuboutreach.net\www\mailing_lists\maintenance\load\files\temp.xls;Extended Properties=""Excel 8.0; HDR=Yes; IMEX=1"""

	Dim oADOX
	Set oADOX = CreateObject("ADOX.Catalog")
	oADOX.ActiveConnection = ml_loadobjConn
	int_table_count = 0
	For Each oTable in oADOX.Tables
		int_table_count = int_table_count + 1
		Response.Write("<input type=""radio"" name=""worksheet_select"" value=""" & oTable.Name & """")
		If int_table_count = 1 Then
			Response.Write(" checked")
		End If
		Response.Write(">&nbsp;" & Replace(oTable.Name,"$","") & "<br>")
'	Response.Write oTable.Name & " might be the first table.<br>"
	Next
	ml_loadobjConn.Close
	Set ml_loadobjConn = nothing
	
%>
	<input type="submit" value="Process Selected Worksheet">&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" onClick="location.href='iframe.asp'">
	<input type="hidden" name="mailing_list_id" value="<%=Request.QueryString("mailing_list_id")%>">
</form>
