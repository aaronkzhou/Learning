<!-- #Include file="ADOVBS.INC" -->
<% Language=VBScript %>
<%
	Dim dicData,strU_SN,strU_PN,strAction
	
	Set dicData = CreateObject("Scripting.Dictionary")
'ON ERROR RESUME NEXT
	For Each x In Request.QueryString
		dicData.add x,Request.QueryString(x)
	Next
	
	strAction = dicData.item("Action")
	
	if trim(strAction)="NewSKURecord" or trim(strAction)="NewHWRecord" then
		strU_PN = dicData.item("U_PN")
		strU_SN = dicData.item("U_SN")
	end if
	
	strConn	= "DRIVER={SQL Server};SERVER=127.0.0.1;" & _
		  "UID=iss_client;PWD=issdata;DATABASE=CPMOData"
	set dbRS = Server.CreateObject("ADODB.RecordSet")
	
	dbRS.ActiveConnection = strConn
	
	Select Case trim(strAction)
	Case "NewSKU"
		dbRS.Source = "ISS_FS_SKU"
	Case "NewSKURecord"
		dbRS.Source = "ISS_FS_SKU_Records"
	Case "NewHWRecord"
		dbRS.Source = "ISS_FS_HW_Records"
	Case Else
	End Select
	
	dbRS.CursorType = adOpenKeyset
	dbRS.LockType = adLockOptimistic
	dbRS.Open
	
	dbRS.addNew
	
	Select Case trim(strAction)
	Case "NewSKU"
		dbRS("Plat") = dicData.item("PLAT")
		dbRS("SKU") = dicData.item("SKU")
		dbRS.Update
		dbRS.Close
		Response.Redirect("AdminSKU.ASP")
	Case "NewSKURecord"
		dbRS("U_SKU") = dicData.item("U_PN")
		dbRS("U_SN") = dicData.item("U_SN")
		dbRS("U_Date") = FormatDateTime(Date + Time,vbGeneralDate)
		dbRS.Update
		dbRS.Close
		Response.Redirect("preInput.asp?Action=preInput&U_PN=" & strU_PN & "&U_SN=" & strU_SN)
	Case "NewHWRecord"
		dbRS("U_SN") = dicData.item("U_SN")
		dbRS("O_PN") = dicData.item("O_PN")
		dbRS.Update
		dbRS.Close
		Response.Redirect("preInput.asp?Action=preInput&U_PN=" & strU_PN & "&U_SN=" & strU_SN)
	Case "NewBatchHWRecord"
		dicData.Remove("U_PN")
		dicData.Remove("U_SN")
		For i=1 to dicData.count/2
			strPN = "PN" & i
			strSN = "SN" & i
			dbRS.addNew
			dbRS("U_SN")=strU_SN
			dbRS("O_PN")=dicData.item(strPN)
			dbRS("O_SN")=dicData.item(strSN)
			dbRS.Update
		Next
		dbRS.Close
		Response.Redirect("preInput.asp?Action=preInput&U_PN=" & strU_PN & "&U_SN=" & strU_SN)			
	End Select
%>