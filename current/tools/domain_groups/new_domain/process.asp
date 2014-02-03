<!-- #include virtual="/functions/global.asp" -->
<%

	If Request.Form("domain_id") = 0 Then
		sql = "INSERT INTO tbl_domains (domain_code, domain_description) VALUES "
		sql = sql & "(""" & Request.Form("domain_code") & """,""" & Request.Form("domain_description") & """)"
	Else
		sql = "UPDATE tbl_domains SET domain_code = """ & Request.Form("domain_code") & """, domain_description = """ & request.Form("domain_description") & """ WHERE domain_id = " & request.Form("domain_id")
	End If

	Response.Write(sql)
	process_sql sql, True
%>
<script language="JavaScript">
	window.top.location.reload( true );
</script>