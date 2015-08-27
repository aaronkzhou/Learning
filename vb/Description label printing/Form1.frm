VERSION 5.00
Begin VB.Form Form1 
   Caption         =   "ÖÐÎÄ±êÇ©´òÓ¡³ÌÐòV1.0"
   ClientHeight    =   6660
   ClientLeft      =   120
   ClientTop       =   450
   ClientWidth     =   10545
   BeginProperty Font 
      Name            =   "Î¢ÈíÑÅºÚ"
      Size            =   18
      Charset         =   134
      Weight          =   400
      Underline       =   0   'False
      Italic          =   0   'False
      Strikethrough   =   0   'False
   EndProperty
   LinkTopic       =   "Form1"
   ScaleHeight     =   6660
   ScaleWidth      =   10545
   StartUpPosition =   3  '´°¿ÚÈ±Ê¡
   Begin VB.TextBox Text1 
      BeginProperty Font 
         Name            =   "Î¢ÈíÑÅºÚ"
         Size            =   20.25
         Charset         =   134
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   615
      Left            =   2640
      TabIndex        =   8
      Top             =   2160
      Width           =   2535
   End
   Begin VB.CommandButton Command2 
      Caption         =   "English printing"
      BeginProperty Font 
         Name            =   "Î¢ÈíÑÅºÚ"
         Size            =   8.25
         Charset         =   134
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   495
      Left            =   9000
      TabIndex        =   7
      Top             =   360
      Width           =   1455
   End
   Begin VB.CommandButton Command1 
      Caption         =   "ÖÐÎÄ´òÓ¡"
      BeginProperty Font 
         Name            =   "Î¢ÈíÑÅºÚ"
         Size            =   20.25
         Charset         =   134
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   735
      Left            =   6840
      TabIndex        =   6
      Top             =   3240
      Width           =   2175
   End
   Begin VB.TextBox Text3 
      BeginProperty Font 
         Name            =   "Î¢ÈíÑÅºÚ"
         Size            =   20.25
         Charset         =   134
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   615
      Left            =   2640
      TabIndex        =   5
      Top             =   4680
      Width           =   2535
   End
   Begin VB.TextBox Text2 
      BeginProperty Font 
         Name            =   "Î¢ÈíÑÅºÚ"
         Size            =   20.25
         Charset         =   134
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   615
      Left            =   2640
      TabIndex        =   4
      Top             =   3360
      Width           =   2535
   End
   Begin VB.Label Label4 
      Caption         =   "ÊýÁ¿:"
      BeginProperty Font 
         Name            =   "Î¢ÈíÑÅºÚ"
         Size            =   20.25
         Charset         =   134
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   495
      Left            =   1320
      TabIndex        =   3
      Top             =   4680
      Width           =   1095
   End
   Begin VB.Label Label3 
      Caption         =   "¹ú¼Ò´úºÅ:"
      BeginProperty Font 
         Name            =   "Î¢ÈíÑÅºÚ"
         Size            =   20.25
         Charset         =   134
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   495
      Left            =   600
      TabIndex        =   2
      Top             =   3360
      Width           =   1815
   End
   Begin VB.Label Label2 
      Caption         =   "ÁÏºÅ:"
      BeginProperty Font 
         Name            =   "Î¢ÈíÑÅºÚ"
         Size            =   21.75
         Charset         =   134
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   495
      Left            =   1320
      TabIndex        =   1
      Top             =   2160
      Width           =   1095
   End
   Begin VB.Label Label1 
      Caption         =   "ÖÐÎÄ±êÇ©´òÓ¡³ÌÐòV1.0"
      BeginProperty Font 
         Name            =   "Î¢ÈíÑÅºÚ"
         Size            =   26.25
         Charset         =   134
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   975
      Left            =   2520
      TabIndex        =   0
      Top             =   480
      Width           =   5415
   End
End
Attribute VB_Name = "Form1"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Command1_Click()

Dim x As String
Dim y As String
Dim z%
Text1.Text = UCase(Text1.Text)
Text2.Text = UCase(Text2.Text)
x = Text1.Text
y = Text2.Text
x = Trim(x)
y = Trim(y)
If y = "" Then y = "CN"
z = Text3.Text
z = Trim(z)
Dim i%
Dim xlApp As Excel.Application
Dim ExcelShowStr As String
Set xlApp = CreateObject("Excel.Application")
xlApp.Visible = False
Dim xlBook As Workbook
Dim xlSheet As Worksheet
Dim xlrow, sheetIndex, sheetColumn As Integer
Dim Description As String
Path = App.Path
fileurl = "C:\aaron\Chinese.xls"
Set xlBook = xlApp.Workbooks.Open(fileurl, Editable)
Set xlSheet = xlApp.ActiveSheet

Set conn = New ADODB.Connection
Set rs = New ADODB.Recordset
Set rs1 = New ADODB.Recordset
strQuery = "select Description From CPMOData1.dbo.Option_view where SKU='" & x & "'"
strQuery1 = "select Country From CPMOData1.dbo.Option_COO where COO='" & y & "'"
conn.ConnectionString = "Driver={sql server};server=16.187.224.112;uid=sa;pwd=support;database=CPMOData1"
conn.ConnectionTimeout = 25
conn.Open
If conn.State <> adStateOpen Then MsgBox ("can't connect database")
rs.Open strQuery, conn
rs.MoveFirst
If rs.EOF Then MsgBox ("This SKU has not been maintained, pls contact Product engineer Jiang,zheng")
Description = rs.Fields("Description").Value
rs.Close
rs1.Open strQuery1, conn
Country = rs1.Fields("Country").Value
rs1.MoveFirst
rs1.Close
xlSheet.Cells(14, 3) = x
xlSheet.Cells(15, 3) = Description
xlSheet.Cells(16, 3) = Country
Dim devPrinter As Printer
For Each devPrinter In Printers
    If devPrinter.DeviceName = "HP LaserJet" Then

       
       Set Printer = devPrinter
       
     
       Exit For
       
    End If
Next
For i = 1 To z
ActiveSheet.PrintOut
Next i
xlBook.Close savechanges:=False
Application.DisplayAlerts = False
xlApp.Quit
TerminateProcess ("EXCEL.EXE")
MsgBox ("done")
'terminateprocess ()
Unload Form1

End Sub
Private Sub TerminateProcess(app_exe As String)
    Dim Process As Object
    For Each Process In GetObject("winmgmts:").ExecQuery("Select Name from Win32_Process Where Name = '" & app_exe & "'")
        Process.Terminate
    Next
End Sub
Private Sub Command2_Click()
Dim x As String
Dim y As String
Dim z%
Text1.Text = UCase(Text1.Text)
Text2.Text = UCase(Text2.Text)
x = Text1.Text
y = Text2.Text
x = Trim(x)
y = Trim(y)
If y = "" Then y = "CN"
z = Text3.Text
z = Trim(z)
Dim i%
Dim xlApp As Excel.Application
Dim ExcelShowStr As String
Set xlApp = CreateObject("Excel.Application")
xlApp.Visible = False
Dim xlBook As Workbook
Dim xlSheet As Worksheet
Dim xlrow, sheetIndex, sheetColumn As Integer
Dim Description As String
Path = App.Path
fileurl = "C:\aaron\Chinese.xls"
Set xlBook = xlApp.Workbooks.Open(fileurl, Editable)
Set xlSheet = xlApp.ActiveSheet

Set conn = New ADODB.Connection
Set rs = New ADODB.Recordset
Set rs1 = New ADODB.Recordset
strQuery = "select Description From CPMOData1.dbo.Option_viewEn where SKU='" & x & "'"
strQuery1 = "select [En-Country] From CPMOData1.dbo.Option_COO where COO='" & y & "'"
conn.ConnectionString = "Driver={sql server};server=16.187.224.112;uid=sa;pwd=support;database=CPMOData1"
conn.ConnectionTimeout = 25
conn.Open
If conn.State <> adStateOpen Then MsgBox "can't connect database"
rs.Open strQuery, conn
rs.MoveFirst
Description = rs.Fields("Description").Value
rs.Close
rs1.Open strQuery1, conn
Country = rs1.Fields("En-Country").Value
rs1.MoveFirst
rs1.Close
xlSheet.Cells(14, 3) = x
xlSheet.Cells(15, 3) = Description
xlSheet.Cells(16, 3) = Country
Dim devPrinter As Printer
For Each devPrinter In Printers
    If devPrinter.DeviceName = "HP LaserJet" Then

       
       Set Printer = devPrinter
       
     
       Exit For
       
    End If
Next
Orientation = xlPortrait
For i = 1 To z
ActiveSheet.PrintOut
Next i
xlBook.Close savechanges:=False
Application.DisplayAlerts = False
xlApp.Quit
TerminateProcess ("EXCEL.EXE")
MsgBox ("done")
'terminateprocess ()
Unload Form1
End Sub

Private Sub Text1_KeyDown(KeyCode As Integer, Shift As Integer)
If KeyCode = 13 Then Text2.SetFocus
End Sub


Private Sub Text2_KeyDown(KeyCode As Integer, Shift As Integer)
If KeyCode = 13 Then Text3.SetFocus
End Sub
