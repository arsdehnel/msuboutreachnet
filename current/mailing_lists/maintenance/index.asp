<!-- #include virtual="/layout/_top.asp" -->
<!-- #include virtual="/mailing_lists/maintenance/mailing_list_fields.asp" -->
<script language="JavaScript">
function select_tab(str_tab_id){

	document.getElementById('tab_1').style.visibility = "hidden";
	document.getElementById('tab_2').style.visibility = "hidden";
	document.getElementById('tab_3').style.visibility = "hidden";
	document.getElementById('tab_4').style.visibility = "hidden";
	
	var selected_tab = document.getElementById(str_tab_id);
	selected_tab.style.visibility = "visible";
		
}
</script>
<link type="text/css" href="/css/frm_event_information.css" rel="stylesheet">
<center>
<form action="process.asp" method="post" name="frm_event_information">
	<div id="event_information_form_title">Mailing List Information</div>
	<div id="event_title"><%=str_event_code_title%></div>
	<div id="tab_links">
		<ul><br>
			<li><a href="#" onClick="select_tab('tab_1');">Basics</a></li>
			<li><a href="#" onClick="select_tab('tab_2');">Members</a></li>
			<li><a href="#" onClick="select_tab('tab_3');">Load</a></li>
			<li><a href="#" onClick="select_tab('tab_4');">Extract</a></li>
		</ul>
	</div>
	<div id="sfrm_box">
		<div id="tab_1" class="sfrm_tab">
			<center>
				<div id="event_information_form_title">Basics</div>
				<!-- #include virtual="/mailing_lists/maintenance/basics/index.asp" -->
			</center>
		</div>
		<div id="tab_2" class="sfrm_tab">
			<center>
				<div id="event_information_form_title">Members</div>
				<!-- #include virtual="/mailing_lists/maintenance/members/index.asp" -->
			</center>
		</div>
		<div id="tab_3" class="sfrm_tab">
			<center>
				<div id="event_information_form_title">Load</div>
				<!-- #include virtual="/mailing_lists/maintenance/load/index.asp" -->
			</center>
		</div>
		<div id="tab_4" class="sfrm_tab">
			<center>
				<div id="event_information_form_title">Extract</div>
				<!-- #include virtual="/mailing_lists/maintenance/extract/index.asp" -->
			</center>
		</div>
	</div>
	<div id="buttons_box" style="margin-top: 500px">
		<input type="submit" value="Save Mailing List">&nbsp;&nbsp;&nbsp;
		<input type="reset" value="Undo Changes">&nbsp;&nbsp;&nbsp;
		<input type="button" value="Clear Mailing List" onClick="location.href='clear.asp?which=<%=int_mailing_list_id%>'">
		<input type="hidden" name="mailing_list_master_id" value="<%=int_mailing_list_master_id%>">
		<input type="hidden" name="process_type" value="UPDTE" />
	</div>
</form>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->