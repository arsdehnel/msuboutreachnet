<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Create Mailing List</div>
<%
	If Request.QueryString = "" Then
		int_mailing_list_master_id = 0
	Else
		int_mailing_list_master_id = Request.QueryString("which")
	End If
%>	
<center>
	<form action="process.asp" method="post" name="new_mailing_list_form" style="border: 0px;">
		<table width="100%" border="0" cellpadding="4" cellspacing="8">
			<tr>
				<td>
					<label for="event_crn" style="width: <%=int_label_width%>">Title:</label>
					<input type="text" name="title" style="width: 600px;">
				</td>
			</tr>
			<tr>
				<td>
					<label for="event_crn" style="width: <%=int_label_width%>">Description:</label>
					<textarea name="description" style="width: 600px; height: 250px;"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="4" align="center">
					<input type="button" value="Create Mailing List" onClick="validate();">&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear Form">
					<input type="hidden" name="mailng_list_master_id" value="<%=int_mailing_list_master_id%>">
					<input type="hidden" name="process_type" value="INSRT" />
					<input type="hidden" name="status_code" value="A" />
					<input type="hidden" name="comments" value="" />
				</td>
			</tr>
		</table>			
	</form>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->
<script language="JavaScript">

	function validate(){
	
		if(new_mailing_list_form.title.value.length > 0){
			new_mailing_list_form.submit()
		}
		else{
			alert("Please enter a mailing list title before creating the list.");
		}
	
	}

</script>