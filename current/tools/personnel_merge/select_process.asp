<!-- #include virtual="/layout/_top.asp" -->
<%

	If Request.QueryString("type") = "old" Then
		Session("old_personnel_id") = Request.QueryString("which")
	Elseif Request.QueryString("type") = "new" Then
		Session("new_personnel_id") = Request.QueryString("which")
	End If
	
	Response.Redirect("index.asp")

%>
<!-- #include virtual="/layout/_bottom.asp" -->