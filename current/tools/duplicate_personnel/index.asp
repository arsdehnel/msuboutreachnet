<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Find Duplicate Personnel</div><br>
<center>
<form action="process.asp" method="post" class="css_form" style="text-align: left; width: 400px;">
	<div>Field to check for duplicates:</div><%
		custom_ddlb "prc_lov_lookup 'DVIDD','domain_code=dup_fields'", "field_name_string", Null, Null, Null, Null, Null, Null, "width: 350px", 18, Null
	%><br>
	<input type="submit" value="View Report" style="text-align:center; width: 350px;">
</form>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->