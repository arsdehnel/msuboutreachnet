<!-- #include virtual="/functions/global.asp" -->
<link type="text/css" href="/css/iframe.css" rel="stylesheet">
<div id="iframe_page_title">Search Results</div>
<%
	If Request.QueryString("query") = "yes" Then
	
		sql = "SELECT mailing_list_id, mailing_list_title as [Title], mailing_list_description as [Description], mailing_list_status as [Status] FROM tbl_mailing_lists WHERE mailing_list_title like ""%" & Request.QueryString("mailing_list_title") & "%"""
	
		Dim arr_result_actions(1,2)
	
		arr_result_actions(0,0) = "/mailing_lists/maintenance/index.asp?"
		arr_result_actions(0,1) = "View"
		arr_result_actions(0,2) = "_top"
		arr_result_actions(1,0) = "/mailing_lists/maintenance/remove.asp?"
		arr_result_actions(1,1) = "Remove"
		arr_result_actions(1,2) = "_top"
	
		data_grid sql, True, arr_result_actions, 0, False, 0, False, Null, Null, "No Mailing Lists Found", False, Session("records_per_page"), False, True, Null, Null
		'dg_fix
	
	Else
		
		Response.Write("No results")
	
	End If
	
%>
<br>