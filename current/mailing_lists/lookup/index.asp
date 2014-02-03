<!-- #include virtual="/layout/_top.asp" -->
<%
	If Request.QueryString("page") = "" Then
		str_query_ind		= Request.Form("query")
		str_mm_title		= Request.Form("mm_title")
		int_form_length		= Len(Request.Form)
	Else
		str_query_ind		= Request.QueryString("query")
		str_mm_title		= Request.QueryString("mm_title")
		int_form_length		= Len(Request.QueryString)
	End If
%>
<body onLoad="frm_mailing_list_search.mm_title.focus();">
<style type="text/css">
label{
	width: 75px;
}
</style>
<div id="page_title">Mailing List Lookup</div>
<center>
<form action="index.asp" method="post" name="frm_mailing_list_search" onSubmit="document.frm_mailing_list_search.action='index.asp';">
	<span style="margin-left: 50px; display: block;">
		<label for="event_crn">Title:</label><input style="width: 250px;" name="mm_title">
	</span>
	<span style="text-align: center; display: block;">
		<label for="event_crn"></label><input type="submit" value="Search Mailing Lists">&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset Criteria">
		<input type="hidden" name="query" value="Y">
	</span>
	<%
		If str_query_ind = "Y" and int_form_length > 17 Then
		
			Dim arr_result_actions(2,3,0)
		
			arr_result_actions(0,0,0) = "/mailing_lists/maintenance/index.asp?"
			arr_result_actions(0,1,0) = "View"
			arr_result_actions(0,2,0) = "_top"
			arr_result_actions(0,3,0) = Null
			arr_result_actions(1,0,0) = "/mailing_lists/lookup/extract.asp?"
			arr_result_actions(1,1,0) = "Extract"
			arr_result_actions(1,2,0) = "_blank"
			arr_result_actions(1,3,0) = Null
			arr_result_actions(2,0,0) = "/mailing_lists/maintenance/remove.asp?"
			arr_result_actions(2,1,0) = "Remove"
			arr_result_actions(2,2,0) = "_top"
			arr_result_actions(2,3,0) = Null
			
			data_grid "prc_mailing_list_lookup 'LMLLU',Null,Null,Null," & validate_field(str_mm_title, "ip") & ", Null", True, arr_result_actions, 0, False, 0, False, Null, Null, True, "background-color: #EFEFEF;", Null, False, "No mailing lists matched search criteria", False, Session("records_per_page"), False, True, "std_dg", Null
		
	'	Else
		
	'		debug_line str_query_ind
	'		debug_line int_form_length
			
		End If
	%>
</form>
</center>
</body>
<!-- #include virtual="/layout/_bottom.asp" -->