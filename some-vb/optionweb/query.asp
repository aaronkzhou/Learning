<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>ISOWeb Admin page</title>
<%@ Language = VBScript %>
<link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>

<h2>SQL Query:</h2>
<Form method="get">
	<p>Query: <Input class="edit" name="queryInput" size ="100" value="SELECT * FROM "></p>
	<p>Database: <input type="radio" name="DBInput" value="CPMOData" checked="checked">WebOption</p>
	<p><input class="btn" type="submit" name="send" value="Submit"></p>
</form>

<p><b><a href=query.asp?queryInput=SELECT+*+FROM+Option_SKU&DBInput=CPMOData>See all SKUs</a></b></p>
<p><b><a href=query.asp?queryInput=SELECT+*+FROM+Option_COO&DBInput=CPMOData>See all Countries</a></b></p>
<hr>
<%
	query = request.querystring("queryInput")
	if (query = "" or query = "SELECT * FROM ") then
		response.write("<h3>No query entered.</h3>")
	else
		DB = request.querystring("DBInput")
		orderBy=request.querystring("orderby")
		response.write("<h2>Query:</h2><p>"& query &"</p>")
		response.write("<h2>Result:</h2>")
		select case DB
'CPMOData DB
		case "CPMOData"
			strconn = "DRIVER={SQL Server};"
			strconn = strconn & "SERVER=127.0.0.1;DATABASE=CPMOData1;"
			strconn = strconn & "UID=iss_client;PWD=issdata;"
			call query2table(query,strconn,DB,orderBy)
'No DB
		case else
			response.write("<h3>No database selected.</h3>")
		end select
	end if
%>
<%sub query2table(inputquery, inputDSN, DB, orderBy)
'Open connection
	dim conntemp, rstemp
	set conntemp = server.createobject("adodb.connection")
	conntemp.open inputDSN

'Send query & retrieve answer
	if (not orderBy = "") then
		set rstemp = conntemp.execute(inputquery&" ORDER BY " & orderBy)
	else
		set rstemp = conntemp.execute(inputquery)
	end if
	answerSize = rstemp.fields.count -1

'Open table & write headers
	Response.Write("<table border=1><tr>")
	Response.Write("<td><b><a>Item<a/></b></td>")
	for i=0 to answerSize
		link = "query.asp?queryInput="& inputquery &"&DBInput="& DB &"&orderby="& rstemp(i).name
		Response.Write("<td><b><a href=""" & link & """>"& rstemp(i).name &"<a/></B></TD>")
	next
	Response.Write("</tr>")

'Get & write all data
	entries = 0
	do while not rstemp.eof
		Response.Write("<tr>")
		Response.Write("<td>" & entries+1 & "</td>")
		for i=0 to answerSize
			thisvalue = rstemp(i)
			If isnull(thisvalue) then
				thisvalue = "&nbsp;"
			end if
			Response.Write("<td valign = top>"& thisvalue &"</TD>")
		next
		Response.Write("<tr>")
		rstemp.movenext
		entries = entries +1
	loop

'Close table
	Response.Write("</table>")
	Response.Write("<p>"& entries &" Result(s)</p>")

'Close connection & clear mem
	rstemp.close
	set rstemp = nothing
	conntemp.close
	set conntemp = nothing
end sub%>

</body></html>
