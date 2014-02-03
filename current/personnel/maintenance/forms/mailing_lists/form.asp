<!-- #include virtual="/functions/global.asp" -->
<link rel="stylesheet" type="text/css" href="/css/texts.css">
<link rel="stylesheet" type="text/css" href="/css/sfrm_event_information.css">
<link rel="stylesheet" type="text/css" href="/css/sfrm_iframe.css">
<link rel="stylesheet" type="text/css" href="/css/forms.css">
<style type="text/css">
label{
	width: 100px;
}
</style>
<%	
	int_mailing_list_detail_id		= 0
	int_personnel_id				= Request.QueryString("personnel_id")
	int_mailing_list_master_id		= 0
	str_process_type				= "INSRT"
	str_status_code					= "A"
	str_comments					= Null	
%>
<body>
<form action="process.asp" method="post" name="personnel_mailing_list_maintenance" onSubmit="return validate();">
	<label for="status_code" style="width: <%=int_label_width%>px;">Mailing List:</label><%
		custom_ddlb "prc_lov_lookup 'MLMST',Null", "mailing_list_master_id", Null, int_mailing_list_master_id, Null, "No mailing lists available", "[ Select Mailing List ]", Null, "width: 200px;", 1, Null 
	%><br />
	<label for="event_id" style="width: <%=int_label_width%>;"></label><input type="submit" value="Add to Mailing List">&nbsp;&nbsp;&nbsp;
		<input type="button" value="Cancel" onClick="document.location.href='iframe.asp?which=<%=int_personnel_id%>'">
		<input type="hidden" name="personnel_id" value="<%=int_personnel_id%>">
		<input type="hidden" name="process_type" value="<%=str_process_type%>">
		<input type="hidden" name="status_code" value="<%=str_status_code%>" />
		<input type="hidden" name="comments" value="<%=str_comments%>" />
</form>
</body>
<script language="javascript">
function validate(){

	if(personnel_mailing_list_maintenance.mailing_list_master_id.value.length == 0){
		alert("Please select a mailing list.");
		return false;
	}else{
		return true;
	}

}
</script>