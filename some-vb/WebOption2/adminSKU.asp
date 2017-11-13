<%@ Language=VBScript %>
<%
' The page will be expired in 5 minutes
Response.Expires=1

'on error resume next
strQuery = "Option_SKU"

strConn	= "DRIVER={SQL Server};SERVER=127.0.0.1;" & _
		  "UID=iss_client;PWD=issdata;DATABASE=CPMOData"
set dbRS = Server.CreateObject( "ADODB.RecordSet" )
dbRS.ActiveConnection = strConn
dbRS.CacheSize = 50
dbRS.Source = strQuery
dbRS.Open 
%>
<HTML>
<HEAD>
<script language=javascript><!--
	function deleterecord(me){
		var i,strPLAT,strSKU;
		i = parseInt(me.name.slice(2));
		
		strPLAT =  tbRecord.rows(i).cells(1).innerText;
		strSKU =  tbRecord.rows(i).cells(2).innerText;
		
		frmData.action = "deleteData.asp?Action=DelSKU&PLAT=" + strPLAT+ "&SKU=" + strSKU;
		frmData.submit();
	}
	
	function replacerecord(me){
		var i,strPLAT,strSKU;
		i = parseInt(me.name.slice(2));
		
		strPLAT =  tbRecord.rows(i).cells(1).innerText;
		strSKU =  tbRecord.rows(i).cells(2).innerText;

		frmData.action = "replaceData.asp?Action=RepSKU&PLAT=" + strPLAT+ "&SKU=" + strSKU;
		frmData.submit();
	}
//-->
</script>
</HEAD>
<META http-equiv=Content-Type content="text/html; charset=unicode">
<BODY>
<P>
<FORM name="frmData" method="post" target="_self">
<%
	response.write("<TABLE id='tbRecord' name='tbRecord' borderColor=lightsteelblue cellSpacing=1 cellPadding=1 width=80% border=1>")
	response.write("<caption align=center><font face='Arial' color='#000080' size='5'><b>All ISS SKU/Family</font></b></caption>")
	response.write("<TR><TD borderColor=lightsteelblue  bgcolor=C0C0C0>Item</TD>" & vbCRLF)
	response.write("<TD borderColor=lightsteelblue  bgcolor=C0C0C0>Platform</TD>" & vbCRLF)
	response.write("<TD align=center borderColor=lightsteelblue  bgcolor=C0C0C0>SKU</TD>" & vbCRLF)
	response.write("<TD align=center borderColor=lightsteelblue  bgcolor=C0C0C0>Operation</TD></TR>" & vbCRLF)
	
	count = 1
	do while NOT dbRS.EOF
		response.write("<TR><TD borderColor=lightsteelblue><font face='Futura Bk' size='2'>" & count & "</font></TD>" & vbCRLF)
		response.write("<TD borderColor=lightsteelblue><font face='Futura Bk' size='2'>" & trim(dbRS.fields("PLAT")) & "</font></TD>" & vbCRLF)
		response.write("<TD borderColor=lightsteelblue><font face='Futura Bk' size='2'>" & trim(dbRS.fields("SKU")) & "</font></TD>" & vbCRLF)
		response.write("<TD width=160 align=center><input type='button' value='Delete' name='D-" & count & "' onClick='deleterecord(this)'>" & vbCRLF)
		response.write("<input type='button' value='Replace' name='R-" & count & "' onClick='replacerecord(this)'></TD></TR>" & vbCRLF)
		
		dbRS.MoveNext
		count = count + 1
	Loop
	dbRS.close
	set dbRS = Nothing
%>
</TABLE>
</FORM>
</P>
</BODY>
</HTML>