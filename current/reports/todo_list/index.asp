<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Webmaster To Do List</div>
<%
	
	Dim arr_actions(1,3,0)
	
	arr_actions(0,0,0) = "form.asp?"
	arr_actions(0,1,0) = "Modify"
	arr_actions(0,2,0) = "_self"
	arr_actions(0,3,0) = Null
	arr_actions(1,0,0) = "print.asp?"
	arr_actions(1,1,0) = "Print"
	arr_actions(1,2,0) = "_self"
	arr_actions(1,3,0) = Null
	
	data_grid "prc_task_lookup 'LOPIT',Null,Null,Null", True, arr_actions, 0, False, 0, False, Null, Null, True, "background-color: #EEEEEE;", Null, False, "No bugs currently entered", False, 0, False, False, Null, Null
	
%>
<!-- #include virtual="/layout/_bottom.asp" -->
