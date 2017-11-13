VERSION 5.00
Object = "{0D300FC0-B2EA-11D1-8D3B-444553540000}#1.31#0"; "QRmaker.ocx"
Begin VB.Form Form1 
   BackColor       =   &H00C0C0C0&
   BorderStyle     =   1  'Fixed Single
   Caption         =   "Form1"
   ClientHeight    =   3000
   ClientLeft      =   45
   ClientTop       =   330
   ClientWidth     =   4545
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MinButton       =   0   'False
   ScaleHeight     =   3000
   ScaleWidth      =   4545
   StartUpPosition =   3  '´°¿ÚÈ±Ê¡
   Begin VB.CommandButton Command1 
      Caption         =   "Command1"
      Height          =   495
      Left            =   2700
      TabIndex        =   2
      Top             =   2145
      Width           =   1215
   End
   Begin VB.TextBox Text1 
      Height          =   1770
      Left            =   2700
      MultiLine       =   -1  'True
      TabIndex        =   1
      Top             =   315
      Width           =   1215
   End
   Begin QRMAKERLib.QRmaker QRmaker1 
      Height          =   2460
      Left            =   90
      TabIndex        =   0
      Top             =   75
      Width           =   2265
      _Version        =   65567
      _ExtentX        =   3995
      _ExtentY        =   4339
      _StockProps     =   1
      BackColor       =   16777215
      InputData       =   "ºÙºÙ"
      Picture         =   "Form1.frx":0000
      ForeBColor      =   8421631
   End
End
Attribute VB_Name = "Form1"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Command1_Click()
QRmaker1.CreateQrMetaFile hDC, App.Path + "\chenjun.jpg", 2
MsgBox "ok"
End Sub

Private Sub QRmaker1_GotFocus()

End Sub

Private Sub QRmaker2_GotFocus()

End Sub

Private Sub Text1_Change()
QRmaker1.InputData = Text1.Text
QRmaker1.Refresh
End Sub

