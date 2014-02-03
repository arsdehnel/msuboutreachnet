<!-- #include virtual="/layout/_top.asp" -->
<!-- #include virtual="/personnel/maintenance/personnel_fields.asp" -->
<%
	If int_personnel_id = Session("user_id") Then
		bln_my_profile = True
	Else
		bln_my_profile = False
	End If
	
	If Session("security_level") >= 8 Then
		bln_administrator = True
	Else
		bln_administrator = False
	End If

	%>
	<script language="JavaScript">
		function select_tab(str_tab_id){
			document.getElementById('tab_1').style.visibility = "hidden";
			document.getElementById('tab_2').style.visibility = "hidden";
			document.getElementById('tab_3').style.visibility = "hidden";
			document.getElementById('tab_4').style.visibility = "hidden";
			document.getElementById('tab_5').style.visibility = "hidden";
			
			<%
				If bln_my_profile and bln_administrator Then
				
					%>
					document.getElementById('tab_6').style.visibility = "hidden";
					document.getElementById('tab_7').style.visibility = "hidden";
					<%
					
				Elseif bln_my_profile and not bln_administrator Then
					
					%>
					document.getElementById('tab_6').style.visibility = "hidden";
					<%
					
				ElseIf not bln_my_profile and bln_administrator Then
					
					%>
					document.getElementById('tab_7').style.visibility = "hidden";
					<%
					
				End If
			%>	
					
			var selected_tab = document.getElementById(str_tab_id);
			selected_tab.style.visibility = "visible";
							
		}
	</script>
	<%

	str_label_width = 150
%>
<link type="text/css" href="/css/frm_event_information.css" rel="stylesheet">
<div id="page_title">Personnel Maintenance</div>
<center>
<form action="process.asp" method="post" name="frm_personnel_information">
	<div id="event_information_form_title">Personnel Information</div>
	<div id="event_title"><%=str_fullname%></div>
	<div id="tab_links">
		<ul><br>
			<li><a href="#" onClick="select_tab('tab_1');">Basics</a></li>
			<li><a href="#" onClick="select_tab('tab_2');">Phone Numbers</a></li>
			<li><a href="#" onClick="select_tab('tab_3');">E-mail Addresses</a></li>
			<li><a href="#" onClick="select_tab('tab_4');">Postal Addresses</a></li>
			<li><a href="#" onClick="select_tab('tab_5');">Mailing Lists</a></li>
			<%
				If bln_my_profile Then
					%>
					<li><a href="#" onClick="select_tab('tab_6');">Options</a></li>
					<%
				End If
				
				If bln_administrator Then
					%>
					<li><a href="#" onClick="select_tab('tab_7');">Access</a></li>
					<%
				End If
			%>
		</ul>
	</div>
	<div id="sfrm_box">
		<div id="tab_1" class="sfrm_tab">
			<center>
				<div id="event_information_form_title">Basics</div>
				<!-- #include virtual="/personnel/maintenance/forms/basics.asp" -->
			</center>
		</div>
		<div id="tab_2" class="sfrm_tab">
			<center>
				<div id="event_information_form_title">Phone Numbers</div>
				<!-- #include virtual="/personnel/maintenance/forms/phone_numbers/index.asp" -->
			</center>
		</div>
		<div id="tab_3" class="sfrm_tab">
			<center>
				<div id="event_information_form_title">E-mail Addresses</div>
				<!-- #include virtual="/personnel/maintenance/forms/email_addresses/index.asp" -->
			</center>
		</div>
		<div id="tab_4" class="sfrm_tab">
			<center>
				<div id="event_information_form_title">Postal Addresses</div>
				<!-- #include virtual="/personnel/maintenance/forms/postal_addresses/index.asp" -->
			</center>
		</div>
		<div id="tab_5" class="sfrm_tab">
			<center>
				<div id="event_information_form_title">Mailing Lists</div>
				<!-- #include virtual="/personnel/maintenance/forms/mailing_lists/index.asp" -->
			</center>
		</div>
		<%
			If bln_my_profile Then
				%>
				<div id="tab_6" class="sfrm_tab">
					<center>
						<div id="event_information_form_title">Options</div>
						<!-- #include virtual="/personnel/maintenance/forms/options/index.asp" -->
					</center>
				</div>
				<%
			End If
			'If bln_administrator Then
				%>
				<div id="tab_7" class="sfrm_tab">
					<center>
						<div id="event_information_form_title">Access</div>
						<!-- #include virtual="/personnel/maintenance/forms/access/index.asp" -->
					</center>
				</div>
				<%
			'End If
		%>
	</div>
	<div id="buttons_box" style="margin-top: 490px;">
		<input type="submit" value="Save Profile"><%
				If Not bln_my_profile and Session("security_level") >= 8 Then
					%>
					<input type="button" value="Remove Personnel" onClick="if(confirm('Are you sure you want to remove this personnel?')) location.href='remove.asp?personnel_id=<%=int_personnel_id%>';">
					<%
				End If
			%>
		<input type="reset" value="Undo Changes"><input type="hidden" name="personnel_id" value="<%=int_personnel_id%>">
		<input type="hidden" name="process_type" value="UPDTE" />
	</div>
</form>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->