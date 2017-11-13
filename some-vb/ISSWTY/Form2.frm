VERSION 5.00
Begin VB.Form Form2 
   Caption         =   "日期确认"
   ClientHeight    =   4035
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   7695
   Icon            =   "Form2.frx":0000
   LinkTopic       =   "Form2"
   ScaleHeight     =   4035
   ScaleWidth      =   7695
   StartUpPosition =   3  'Windows Default
   Begin VB.CommandButton Command2 
      BackColor       =   &H000000FF&
      Caption         =   "日期错误！"
      Height          =   495
      Left            =   4680
      MaskColor       =   &H0000FFFF&
      TabIndex        =   3
      Top             =   2520
      Width           =   1095
   End
   Begin VB.CommandButton Command1 
      Caption         =   "显示日期正确"
      Height          =   495
      Left            =   1440
      TabIndex        =   2
      Top             =   2520
      Width           =   1455
   End
   Begin VB.Shape Shape1 
      Height          =   1335
      Left            =   720
      Top             =   960
      Width           =   6375
   End
   Begin VB.Label Label2 
      Caption         =   "日期(Ver 1.04)："
      BeginProperty Font 
         Name            =   "Tahoma"
         Size            =   12
         Charset         =   134
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   375
      Left            =   720
      TabIndex        =   1
      Top             =   600
      Width           =   2055
   End
   Begin VB.Label Label1 
      Caption         =   "Label1"
      BeginProperty Font 
         Name            =   "MS Sans Serif"
         Size            =   54
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   1455
      Left            =   720
      TabIndex        =   0
      Top             =   960
      Width           =   6255
   End
End
Attribute VB_Name = "Form2"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Command1_Click()
                                                                                                                         
Load Form1
Form1.Visible = True


End Sub

Private Sub Command2_Click()

 MsgBox ("系统日期错误，请告诉值班技术员!")
 Unload Form2
 
End Sub

Private Sub Form_Load()
today = Date
temp = Format(today, "yyyy/mm/dd")

Label1.Caption = temp

End Sub

