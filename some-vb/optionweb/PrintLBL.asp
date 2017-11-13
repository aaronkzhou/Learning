<%@ Language=VBScript %>
<%
	Dim dicData,strU_PN,strAction,strCOO,strDescription,strAgent,strAddress,strPhone

	Set dicData = CreateObject("Scripting.Dictionary")
	
	For Each x In Request.QueryString
		dicData.add x,Request.QueryString(x)
	Next
	
	strAction = dicData.item("Action")
	strU_PN = dicData.item("U_PN")
	strAgent = "中国惠普有限公司"
	
	if strAction = "ShowData" then
		strQueryAddress = "select * from Option_Address where Agent='" & strAgent & "'"
		strQuery = "select * from Option_View where SKU='" & strU_PN & "'"
		strConn	= "DRIVER={SQL Server};SERVER=127.0.0.1;" & _
		  	  "UID=iss_client;PWD=issdata;DATABASE=CPMOData1"
		set dbRS = Server.CreateObject( "ADODB.RecordSet" )
		dbRS.ActiveConnection = strConn
		dbRS.Source = strQueryAddress
		dbRS.Open
		strAgent = trim(dbRS.fields("Agent"))
		strAddress = trim(dbRS.fields("Address"))
		strPhone = trim(dbRS.fields("Phone"))
		dbRS.close
		dbRS.Source = strQuery
		dbRS.Open
		count = 0
		do while NOT dbRS.EOF
			strDescription = trim(dbRS.fields("Description"))
			strCOO = trim(dbRS.fields("Country"))
			count = count + 1
			dbRS.MoveNext
		loop
	end if
%>

<HTML><HEAD>
<script language=vbscript><!--

function printLabel()
	Dim intQTY
	
	intQTY = int(parent.frmPrint.txtQTY.value)
	frmData.LBLprint.strSKU = "<%=strU_PN%>"
	frmData.LBLprint.strDescription = "<%=strDescription%>"
	frmData.LBLprint.strCOO = "<%=strCOO%>"
	frmData.LBLprint.strAgent = "<%=strAgent%>"
	frmData.LBLprint.strAddress = "<%=strAddress%>"
	frmData.LBLprint.strPhone = "<%=strPhone%>"
	frmData.LBLprint.printLabel(intQTY)
end function

<%
	if strAction = "ShowData" then
		response.write("Function initPage()" & vbCRLF)
		response.write("End function" & vbCRLF)	
	end if
	
	if strAction = "Refresh" then
		response.write("Function initPage()" & vbCRLF)
		response.write("parent.document.location.replace(" & Chr(34) & "PrintLBL.htm" & Chr(34) & ")" & vbCRLF)
		response.write("End function" & vbCRLF)
	end if
%>
	
//-->
</script>

</HEAD>
<%
	if trim(strAction) = "ShowData" or trim(strAction) = "Refresh" then
		response.write("<BODY onload='initPage()'>")
	else
		response.write("<BODY>")
	end if
%>

<FORM name="frmData" method="post" target="_self">
<%  		
 	if strAction = "ShowData" then
 		
		response.write("<OBJECT CLASSID='clsid:3d25aba1-caec-11cf-b34a-00aa00a28331'>" & vbCRLF)
		response.write("<PARAM NAME='LPKPath' VALUE='printLBL.lpk'>" & vbCRLF)
		response.write("</OBJECT>" & vbCRLF)
		
 		response.write("<OBJECT ID='LBLprint' style='LEFT: 0px; WIDTH: 880px; HEIGHT: 0px'" & vbCRLF)
		response.write("CLASSID='CLSID:4F2C84B7-A679-4322-B4A7-559E7F50BA83'" & vbCRLF)
		response.write("NAME='LBLprint'" & vbCRLF)
		response.write("CODEBASE='LBLprint.CAB#version=1,1,0,1'>" & vbCRLF)
		response.write("</OBJECT>" & vbCRLF)
 		response.write("<TABLE id='tbRecord' name='tbRecord' borderColor=lightsteelblue cellSpacing=1 cellPadding=1 width=80% border=1>" & vbCRLF)
 		response.write("<caption align=center><font face='Arial' color='#000080' size='5'><b>Information For " & strU_PN & "</font></b></caption>" & vbCRLF)
		response.write("<TR><TD borderColor=lightsteelblue  bgcolor=C0C0C0>SKU</TD>" & vbCRLF)
		response.write("<TD borderColor=lightsteelblue bgcolor=C0C0C0>Description</TD>" & vbCRLF)
		response.write("<TD borderColor=lightsteelblue  bgcolor=C0C0C0>COO</TD>" & vbCRLF)
		response.write("<TD borderColor=lightsteelblue  bgcolor=C0C0C0>Country</TD></TR>" & vbCRLF)
			        	
		count = 1
		dbRS.MoveFirst
		do while NOT dbRS.EOF
			response.write("<TR><TD borderColor=lightsteelblue><font face='Futura Bk' size='2'>" & trim(dbRS.fields("SKU")) & "</font></TD>" & vbCRLF)
			response.write("<TD borderColor=lightsteelblue><font face='Futura Bk' size='2'>" & trim(dbRS.fields("Description")) & "</font></TD>" & vbCRLF)
			response.write("<TD borderColor=lightsteelblue><font face='Futura Bk' size='2'>" & trim(dbRS.fields("COO")) & "</font></TD>" & vbCRLF)
			response.write("<TD borderColor=lightsteelblue><font face='Futura Bk' size='2'>" & trim(dbRS.fields("Country")) & "</font></TD></TR>" & vbCRLF)
			dbRS.MoveNext
			count = count + 1
			
		Loop
		dbRS.close
		response.write("</TABLE>"& vbCRLF)
		response.write("<P align=left><b><font face='Arial' color='#000080'>" & strAgent & "</font></b>" & vbCRLF)
		response.write("<P align=left><b><font face='Arial' color='#000080'>地址：" & strAddress & "</font></b>" & vbCRLF)
		response.write("<P align=left><b><font face='Arial' color='#000080'>电话：" & strPhone & "</font></b>" & vbCRLF)
	end if
%>
</FORM>
</P>
</BODY>
</HTML>