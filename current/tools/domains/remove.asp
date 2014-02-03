<!-- #include virtual="/functions/global.asp" -->
<%
	Select Case Request.QueryString
	
		Case "process"
		
			sql = "DELETE FROM tbl_domain_values WHERE domain_value_id = " & Request.Form("domain_value_id")
			
			Response.Write(sql)
			process_sql sql, True
			Response.Redirect("iframe.asp?domain_id=" & Request.Form("domain_id"))
	
		Case Else
		
			removal_confirmation_form "tbl_domain_values", "domain_id", "domain_value_id", Request.QueryString("which"), "remove.asp?process", "domain value"
				
	End Select
%>
