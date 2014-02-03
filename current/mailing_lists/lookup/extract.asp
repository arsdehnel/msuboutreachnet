<!-- #include virtual="/functions/global.asp" -->
<%
	Response.ContentType = "application/vnd.ms-excel"
	
	data_grid "prc_mailing_list_lookup 'EXTCT'," & validate_field(Request.QueryString("which"),"ip") & ",Null,Null,Null, Null", True, Null, 0, True, 0, True, Null, Null, True, "background-color: #EFEFEF;", Null, False, "No members found for this mailing list.", False, 0, False, False, "std_dg", Null

%>