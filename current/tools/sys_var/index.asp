<!-- #include virtual="/layout/_top.asp" -->
<script src="/functions/refresh_iframe.js"></script>
<div id="page_title">System Variables</div>
<center><form name="frm_check_availability">
	<label style="width: 100px;">Select Type:</label><%
		custom_ddlb "prc_lov_lookup 'DVSTD','domain_code=sys_var_type'", "sys_var_type", Null, Request.QueryString("sys_var_type"), "location.href='index.asp?sys_var_type=' + this.value;", Null, "[ All Types ]", Null, "width: 400px;", 1, Null
	%>
</form></center>
<div align="center" style="padding-top: 4px;"><input type="button" value="Add System Variable" onClick="location.href='form.asp?which=0';"></div>
<%

	Dim arr_result_actions(0,3,0)
	arr_result_actions(0,0,0) = "/tools/sys_var/form.asp?"
	arr_result_actions(0,1,0) = "Edit"
	arr_result_actions(0,2,0) = "_self"
	arr_result_actions(0,3,0) = Null

	data_grid "prc_sys_var_lookup 'LSYSV',Null," & validate_field(Request.QueryString("sys_var_type"),"ip") & ",Null,Null", True, arr_result_actions, 0, False, 0, False, Null, Null, False, Null, Null, False, "No records for selected types", False, 0, False, False, "std_dg", Null
	
%>
<div align="center" style="padding-top: 4px;"><input type="button" value="Add System Variable" onClick="location.href='form.asp?which=0';"></div>
<!-- #include virtual="/layout/_bottom.asp" -->