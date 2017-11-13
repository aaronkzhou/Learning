VERSION 5.00

Begin VB.Form Form3 
   Caption         =   "Form3"
   ClientHeight    =   2040
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5775
   LinkTopic       =   "Form3"
   ScaleHeight     =   2040
   ScaleWidth      =   5775
   StartUpPosition =   3  '窗口缺省
   Begin VB.CommandButton Command2 
      Caption         =   "否"
      Height          =   435
      Left            =   3180
      TabIndex        =   1
      Top             =   1320
      Width           =   1035
   End
   Begin VB.CommandButton Command1 
      Caption         =   "是"
      Height          =   435
      Left            =   1380
      TabIndex        =   0
      Top             =   1320
      Width           =   1035
   End
   Begin VB.Label Label1 
      Caption         =   "            是否真的要打印               "
      Height          =   495
      Left            =   1080
      TabIndex        =   2
      Top             =   480
      Width           =   3495
   End
End
Attribute VB_Name = "Form3"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Command1_Click()
Unload Me
Call currentdaylist

End Sub

Private Sub Command2_Click()
Unload Form3
Load Form1
Form1.Visible = True
End Sub

Public Sub currentdaylist()
Dim datestring, productsitem(700, 3) As String
Set productsworkspace = DBEngine.Workspaces(0)
Set productsdatabase = productsworkspace.OpenDatabase(mdbdir + "\" + "productlist.mdb")
Set productsrecord = productsdatabase.OpenRecordset("Select * from products")
productsrecord.MoveLast
     k = 1
a1:  aa = productsrecord!日期
     bb = productsrecord!产品型号
     cc = productsrecord!序列号
     datestring = Format(Date, "yyyy/mm/dd")
     i = 1
     j = 1
     Printer.FontSize = 20
     Printer.CurrentX = (30 * 150)
     Printer.CurrentY = (200)
     Printer.Print "PRODUCT LIST"

     Printer.FontSize = 13
     Printer.CurrentX = (1400)
     Printer.CurrentY = (600 + (i) * 200)
     Printer.Print "类型"
     Printer.CurrentX = (1400 + 15 * 150)
     Printer.CurrentY = (600 + (i) * 200)
     Printer.Print "产品型号"
     Printer.CurrentX = (1400 + 30 * 150)
     Printer.CurrentY = (600 + (i) * 200)
     Printer.Print "序列号"
     Printer.CurrentX = (1400 + 45 * 150)
     Printer.CurrentY = (600 + (i) * 200)
     Printer.Print "日期"

       Do While productsrecord!日期 = datestring
       If j > 70 Then
       Printer.NewPage
       GoTo a1
       End If
       Printer.FontSize = 10
       Printer.CurrentX = (800)
       Printer.CurrentY = (1200 + (i) * 200)
       Printer.Print k

       Printer.CurrentX = (1400)
       Printer.CurrentY = (1200 + (i) * 200)
       Printer.Print productsrecord!类型
       Printer.CurrentX = (1400 + 15 * 150)
       Printer.CurrentY = (1200 + (i) * 200)
       Printer.Print productsrecord!产品型号
       Printer.CurrentX = (1400 + 30 * 150)
       Printer.CurrentY = (1200 + (i) * 200)
       Printer.Print productsrecord!序列号
       Printer.CurrentX = (1400 + 45 * 150)
       Printer.CurrentY = (1200 + (i) * 200)
       Printer.Print productsrecord!日期
       k = k + 1
       i = i + 1
       j = j + 1
       productsrecord.MovePrevious
        If productsrecord.EOF() Then
        Exit Do
        End If
Loop
End Sub

