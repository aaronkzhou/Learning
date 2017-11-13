<!-- #Include file="ADOVBS.INC" -->
<% Language=VBScript %>
<%
	Dim dicData,strAction,strUPN,strUSN,strOPN,strOSN,strPLAT,strSKU,strOldValue1,strNewValue1,strOldValue2,strNewValue2,strPost,strURL
	
	Set dicData = CreateObject("Scripting.Dictionary")
'ON ERROR RESUME NEXT
	For Each x In Request.QueryString
		dicData.add x,Request.QueryString(x)
	Next
	
	strAction = dicData.item("Action")

	if trim(strAction) = "RepSKU" then
		strPLAT = dicData.item("PLAT")
		strSKU = dicData.item("SKU")
		strURL = dicData.item("URL")
	elseif trim(strAction) = "RepHWRecord" then
		strUPN = dicData.item("U_PN")
		strUSN = dicData.item("U_SN")
		strOPN = dicData.item("O_PN")
		strOSN = dicData.item("O_SN")
		strURL = dicData.item("URL")
	end if
	
	Set dicData = Nothing
	if trim(strAction) = "RepSKU" then
		strOldValue1 = "Old Platform:"
		strOldValue2 = "Old SKU:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
		strNewValue1 = "New Platform:"
		strNewValue2 = "New SKU:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
		strReplace1 = strPLAT
		strReplace2 = strSKU	
	elseif trim(strAction) = "RepHWRecord" then
		strOldValue1 = "Old Option PN:"
		strOldValue2 = "Old Option SN:"
		strNewValue1 = "New Option PN:"
		strNewValue2 = "New Option SN:"
		strReplace1 = strOPN
		strReplace2 = strOSN
	else
		response.write("<p align='center'><font face='Arial' color='#F00000' size='5'>Wrong action request!</font></p>")
	end if
%>
<html>
<head>
<script language=vbscript><!--

	public function initPage()
		frmReplace.txtRPN.focus()
	end function
	
	function txtRPN_KeyDown()
		nKeyCode = window.event.keyCode
		if nKeyCode = 13 then
			frmReplace.txtRPN.value = ucase(frmReplace.txtRPN.value)
			if trim(frmReplace.txtRPN.value)<>"" then 
				frmReplace.txtRSN.focus()
			else
				msgbox "The input value is empty, please reinput!",vbCritical
				frmReplace.txtRPN.value = ""
				frmReplace.txtRPN.focus()
			end if
		end if
	end function
	
	function txtRSN_KeyDown()
		nKeyCode = window.event.keyCode
		if nKeyCode = 13 then
			frmReplace.txtRSN.value = ucase(frmReplace.txtRSN.value)
			
			<% 
			   if trim(strAction) = "RepSKU" then
			   	strPost = chr(34) & "updateData.asp?Action=UpdateSKU&O_PLAT=" & chr(34) & " & frmReplace.txtOPN.value" & _
					  " & " & chr(34) & "&O_SKU=" & chr(34) & " & frmReplace.txtOSN.value" & _
					  " & " & chr(34) & "&N_PLAT=" & chr(34) & " & frmReplace.txtRPN.value" & _
					  " & " & chr(34) & "&N_SKU=" & chr(34) & " & frmReplace.txtRSN.value"			
			   elseif trim(strAction) = "RepHWRecord" then
				strPost = chr(34) & "updateData.asp?Action=UpdateHWRecord" & "&URL=" & strURL & "&U_PN=" & chr(34) & " & frmReplace.txtUPN.value" & _
					  " & " & chr(34) & "&U_SN=" & chr(34) & " & frmReplace.txtUSN.value" & _
					  " & " & chr(34) & "&O_PN=" & chr(34) & " & frmReplace.txtOPN.value" & _
					  " & " & chr(34) & "&O_SN=" & chr(34) & " & frmReplace.txtOSN.value" & _
					  " & " & chr(34) & "&N_PN=" & chr(34) & " & frmReplace.txtRPN.value" & _
					  " & " & chr(34) & "&N_SN=" & chr(34) & " & frmReplace.txtRSN.value"			
			   end if
			   	response.write("frmReplace.action =" & strPost & vbCRLF)
			  %>
			frmReplace.submit()
		end if
	end function	
//-->
</script>
</head>
<body onload="initPage()">
<form name="frmReplace" id="frmReplace" method="post" target="_self" action="updateData.asp">
<input id="txtUPN" type=hidden name="txtUPN" value="<%=strUPN%>">
<input id="txtUSN" type=hidden name="txtUSN" value="<%=strUSN%>">
<p><b><font face="Arial" color="#000080"><%=strOldValue1%>
<input id="txtOPN" style="WIDTH: 141px; HEIGHT: 22px" size ="16" name="txtOPN" value="<%=strReplace1%>" readOnly>&nbsp;&nbsp;&nbsp; 
<%=strNewValue1%>
<input id="txtRPN" onkeydown="txtRPN_KeyDown()" style="WIDTH: 141px; HEIGHT: 22px" size ="16" name="txtRPN">
</font></b></p>
<p><b><font face="Arial" color="#000080"><%=strOldValue2%> 
<input id="txtOSN" style="WIDTH: 141px; HEIGHT: 22px" size ="16" name="txtOSN" value="<%=strReplace2%>" readOnly>&nbsp;&nbsp;&nbsp; 
<%=strNewValue2%>
<input id="txtRSN" onkeydown="txtRSN_KeyDown()" style="WIDTH: 141px; HEIGHT: 22px" size ="16" name="txtRSN">
</font></b></p>
</form>
</body>
</html>