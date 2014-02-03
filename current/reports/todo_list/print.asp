<!-- #include virtual="/layout/_top.asp" -->
<%
		
	arr_item_rs = get_recordset( "SELECT * FROM tbl_webmaster_todo WHERE item_id = " & Request.QueryString("which"), False )
	int_item_id				= arr_item_rs(0,0)
	str_item_subject		= arr_item_rs(1,0)
	mem_item_description	= arr_item_rs(2,0)
	mem_item_resolution		= arr_item_rs(3,0)
	dtm_item_completed_date	= arr_item_rs(4,0)
	int_item_priority		= arr_item_rs(5,0)
	str_item_type			= arr_item_rs(6,0)

%>
<div id="page_title"><%=str_item_subject%></div>
<div class="section_title">Description</div>
<div class="para_text"><%=format_memo(mem_item_description)%></div>
<!-- #include virtual="/layout/_bottom.asp" -->