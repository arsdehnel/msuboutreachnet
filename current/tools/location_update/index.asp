<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Update Locations</div><br>
<form action="process.asp" method="post" name="update_locations_form" class="css_form">
	<label style="width: 200px;">Select Location:</label><%
		custom_ddlb "prc_lov_lookup 'DVIDD','domain_code=dtl_location'", "old_location_id_string", Null, Null, Null, Null, "[ Please select a location ]", Null, "width: 350px", 12, Null
	%><br>
	<label style="width: 200px;">Select New Location:</label><%
		custom_ddlb "prc_lov_lookup 'DVIDD','domain_code=dtl_location'", "new_location_id", Null, Null, Null, Null, "[ Please select a location ]", Null, "width: 350px", 1, Null
	%><br>
	<label style="width: 200px;"></label><input type="submit" value="Update Name">&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset Form">
</form>
<!-- #include virtual="/layout/_bottom.asp" -->