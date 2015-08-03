VERSION 5.00
Object = "{0D300FC0-B2EA-11D1-8D3B-444553540000}#1.31#0"; "qrmaker.ocx"
Begin VB.Form Form1 
   Caption         =   "»ªÈý±£ÐÞ¿¨´òÓ¡V1.0"
   ClientHeight    =   6015
   ClientLeft      =   120
   ClientTop       =   450
   ClientWidth     =   8685
   BeginProperty Font 
      Name            =   "Î¢ÈíÑÅºÚ"
      Size            =   27.75
      Charset         =   134
      Weight          =   400
      Underline       =   0   'False
      Italic          =   0   'False
      Strikethrough   =   0   'False
   EndProperty
   LinkTopic       =   "Form1"
   ScaleHeight     =   6015
   ScaleWidth      =   8685
   StartUpPosition =   3  '´°¿ÚÈ±Ê¡
   Begin QRMAKERLib.QRmaker QRmaker1 
      Height          =   975
      Left            =   3840
      TabIndex        =   3
      Top             =   2520
      Width           =   975
      _Version        =   65567
      _ExtentX        =   1720
      _ExtentY        =   1720
      _StockProps     =   1
      Picture         =   "Form1.frx":0000
   End
   Begin VB.CommandButton Command1 
      Caption         =   "´òÓ¡±£ÐÞ¿¨"
      BeginProperty Font 
         Name            =   "Î¢ÈíÑÅºÚ"
         Size            =   15.75
         Charset         =   134
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   735
      Left            =   3360
      TabIndex        =   2
      Top             =   3720
      Width           =   2175
   End
   Begin VB.TextBox Text1 
      BeginProperty Font 
         Name            =   "Î¢ÈíÑÅºÚ"
         Size            =   18
         Charset         =   134
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   615
      Left            =   1800
      TabIndex        =   1
      Top             =   1680
      Width           =   5295
   End
   Begin VB.Label Label1 
      Caption         =   "ÇëÉ¨ÃèH3C(20Î»)ÐòÁÐºÅ"
      BeginProperty Font 
         Name            =   "Î¢ÈíÑÅºÚ"
         Size            =   27.75
         Charset         =   134
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   855
      Left            =   1200
      TabIndex        =   0
      Top             =   480
      Width           =   6375
   End
End
Attribute VB_Name = "Form1"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Command1_Click()

i = Text1.Text
Dim xlApp As Excel.Application
Dim ExcelShowStr As String
Set xlApp = CreateObject("Excel.Application")
xlApp.Visible = False
Dim xlBook As Workbook
Dim xlSheet As Worksheet
Dim xlrow, sheetIndex, sheetColumn As Integer
Path = App.Path
fileurl = Path & "\test.xls"
Set xlBook = xlApp.Workbooks.Open(fileurl, Editable)
Set xlSheet = xlApp.ActiveSheet
QRmaker1.InputData = i
QRmaker1.Refresh
QRmaker1.CreateQrMetaFile hDC, App.Path + "\" & i & ".jpg", 2
xlSheet.Cells(6, 4) = i
xlSheet.Cells(34, 4) = i
xlApp.Cells(5, 5).Select
PicLocation = Path & "\" & i & ".jpg"
With xlApp.ActiveSheet.Pictures.Insert(PicLocation)
    With .ShapeRange
        .LockAspectRatio = msoTrue
        .Width = 20
        .Height = 20
    End With
    .Left = xlApp.ActiveSheet.Cells(5, 5).Left
    .Top = xlApp.ActiveSheet.Cells(5, 5).Top
    .Placement = 1
    .PrintObject = True
End With
With xlApp.ActiveSheet.Pictures.Insert(PicLocation)
    With .ShapeRange
        .LockAspectRatio = msoTrue
        .Width = 20
        .Height = 20
    End With
    .Left = xlApp.ActiveSheet.Cells(33, 5).Left
    .Top = xlApp.ActiveSheet.Cells(33, 5).Top
    .Placement = 1
    .PrintObject = True
End With
H3CBOM = Mid(i, 3, 8)
Set conn = New ADODB.Connection
Set rs = New ADODB.Recordset
strQuery = "select H3CPID From CPMOData1.dbo.H3CWarrantycard where H3CBOMCODE='" & H3CBOM & "'"
conn.ConnectionString = "Driver={sql server};server=16.187.224.112;uid=sa;pwd=support;database=CPMOData1"
conn.ConnectionTimeout = 25
conn.Open
If conn.State <> adStateOpen Then MsgBox "Á´½ÓÊý¾Ý¿âÊ§°Ü"
rs.Open strQuery, conn
'If rs.Fields("H3CPID").Value = 0 Then MsgBox ("¸Ã»úÐÍ²»ÐèÒª´òÓ¡H3C±£ÐÞ¿¨")
rs.MoveFirst
H3CPID = rs.Fields("H3CPID").Value
rs.Close
xlSheet.Cells(34, 5) = H3CPID
xlSheet.Cells(6, 5) = H3CPID
xlSheet.PrintOut
xlBook.Close savechanges:=False
Application.DisplayAlerts = False
xlApp.Quit

Kill Path & "\" & i & ".jpg"

End Sub



Private Sub DataGrid1_Click()

End Sub

Private Sub Text1_KeyPress(KeyAscii As Integer)

Dim i

    If KeyAscii = 13 Then Command1_Click
   
End Sub
