VERSION 5.00
Begin VB.Form Form1 
   Caption         =   "���޿���ӡV2.0 Author:Aaron"
   ClientHeight    =   4770
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5880
   Icon            =   "Form1.frx":0000
   LinkTopic       =   "Form1"
   ScaleHeight     =   4770
   ScaleWidth      =   5880
   StartUpPosition =   3  '����ȱʡ
   Begin VB.TextBox Text8 
      Height          =   495
      Left            =   6720
      TabIndex        =   12
      Text            =   "Text8"
      Top             =   3600
      Visible         =   0   'False
      Width           =   1935
   End
   Begin VB.TextBox Text7 
      DataField       =   "����"
      DataSource      =   "Data1"
      Height          =   315
      Left            =   4620
      TabIndex        =   11
      Text            =   "Text7"
      Top             =   120
      Visible         =   0   'False
      Width           =   975
   End
   Begin VB.TextBox Text6 
      DataField       =   "���к�"
      DataSource      =   "Data1"
      Height          =   495
      Left            =   4620
      TabIndex        =   10
      Text            =   "Text6"
      Top             =   600
      Visible         =   0   'False
      Width           =   975
   End
   Begin VB.TextBox Text5 
      DataField       =   "��Ʒ�ͺ�"
      DataSource      =   "Data1"
      Height          =   495
      Left            =   4620
      TabIndex        =   9
      Text            =   "Text5"
      Top             =   2520
      Visible         =   0   'False
      Width           =   975
   End
   Begin VB.TextBox Text4 
      DataField       =   "����"
      DataSource      =   "Data1"
      Height          =   495
      Left            =   4620
      TabIndex        =   8
      Text            =   "Text4"
      Top             =   1500
      Visible         =   0   'False
      Width           =   975
   End
   Begin VB.Data Data1 
      Align           =   2  'Align Bottom
      Caption         =   "Data1"
      Connect         =   "Access"
      DatabaseName    =   "productlist.mdb"
      DefaultCursorType=   1  'ODBC �α�
      DefaultType     =   2  'ʹ�� ODBC
      EOFAction       =   2  'Add New
      Exclusive       =   0   'False
      Height          =   375
      Left            =   0
      Options         =   0
      ReadOnly        =   0   'False
      RecordsetType   =   1  'Dynaset
      RecordSource    =   "Products"
      Top             =   4395
      Visible         =   0   'False
      Width           =   5880
   End
   Begin VB.CommandButton Command1 
      Caption         =   "��ӡ�����嵥"
      Height          =   495
      Left            =   540
      TabIndex        =   7
      Top             =   3600
      Width           =   2655
   End
   Begin VB.TextBox Text3 
      Height          =   495
      Left            =   2040
      TabIndex        =   6
      Text            =   "Text3"
      Top             =   2460
      Width           =   1935
   End
   Begin VB.CommandButton Command2 
      Caption         =   "�˳�"
      Height          =   495
      Left            =   4200
      TabIndex        =   4
      Top             =   3600
      Width           =   975
   End
   Begin VB.TextBox Text2 
      Height          =   495
      Left            =   2040
      TabIndex        =   1
      Text            =   "Text2"
      Top             =   1440
      Width           =   1935
   End
   Begin VB.TextBox Text1 
      Height          =   495
      Left            =   2040
      TabIndex        =   0
      Text            =   "Text1"
      Top             =   540
      Width           =   1935
   End
   Begin VB.Label Label3 
      Caption         =   "Option"
      Height          =   495
      Left            =   720
      TabIndex        =   5
      Top             =   2460
      Width           =   1035
   End
   Begin VB.Label Label2 
      Caption         =   "���кţ�"
      Height          =   495
      Left            =   720
      TabIndex        =   3
      Top             =   1500
      Width           =   1035
   End
   Begin VB.Label Label1 
      Caption         =   "�ͺţ�"
      Height          =   495
      Left            =   720
      TabIndex        =   2
      Top             =   540
      Width           =   975
   End
End
Attribute VB_Name = "Form1"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Command1_Click()

    Unload Form1
    Load Form3
    Form3.Visible = True
   
End Sub

Private Sub Command2_Click()
 
    Unload Form1

End Sub

Private Sub Form_Load()
   
    Unload Form2
    Text1.Text = ""
    Text2.Text = ""
    Text3.Text = ""
    temp = App.Path + "\warrenty.ini"
    mdbdir = GetINIString("PATH", "MDBDIR", "", temp)
    p_sno = "N"
    p_shipdate = "N"
    p_sno = UCase(GetINIString("PRINT", "SNO", "", temp))
    p_shipdate = UCase(GetINIString("PRINT", "SHIPDATE", "", temp))
    
End Sub

Private Sub Text1_KeyDown(KeyCode As Integer, Shift As Integer)
    If KeyCode = 13 Then
        Dim strTemp As String
        Text1.Text = UCase(Text1.Text)
        strTemp = Mid(Text1.Text, 1, 2)
        If strTemp = "1P" Then
            Text1.Text = Mid(Text1.Text, 3, Len(Text1.Text))
        End If
        Text2.SetFocus
    End If
End Sub

Private Sub Text2_KeyDown(KeyCode As Integer, Shift As Integer)
         
   If KeyCode = 13 Then
        daytemp = Date
        If (today <> daytemp) Then
            MsgBox ("����ȷ���ѹ��ڣ����˳�����ȷ�ϣ�")
            Load Form2
            Form2.Visible = True
            Unload Form1
            Exit Sub
        End If
        On Error GoTo errorhandle
        
        Text2.Text = UCase(Text2.Text)
        If (Len(Text2.Text) = 11 Or Len(Text2.Text) = 13) And (Mid(Text2.Text, 1, 1) = "S") Then
            Text2.Text = Mid(Text2.Text, 2, Len(Text2.Text))
        End If
        If Len(Text2.Text) = 10 Or Len(Text2.Text) = 12 Then
            Text3.SetFocus
        Else
            MsgBox "�������кŲ���,����������!"
            Text2.Text = ""
            Text2.SetFocus
        End If
    End If
    Exit Sub
errorhandle:
    MsgBox (errormsg)
End Sub
    
Private Sub Text3_KeyDown(KeyCode As Integer, Shift As Integer)

    Dim inputtemp, wrtytemp As String
    Dim warrtyworkspace, productsworkspace As Workspace
    Dim warrtydatabase, productsdatabase As Database
    Dim warrtyrecordset1, warrtyrecordset2, productsrecordset As Recordset
    Dim findflag As Boolean
    Dim modelno, modelno2, serialno, productname, producttype, optionno, aa, wtycardsn As String
    Dim productcfg(15, 2) As String
    Dim wtycode As String
    Dim wtydate As Date
    Dim deadline As String
    Dim productstdno As String
    Dim mfgplace As String
    Dim mfgunit As String
    Dim cfgnumber As Integer
    Dim sxef, sets, txef, tets As String
    Dim existxef, existets, dbtxef, dbtets As Boolean
    Dim serialdir, c1, c2 As String
        
    Dim XH, outno, opNO As String
                
     If KeyCode = 13 Then
        Text3.Text = Trim(UCase(Text3.Text))
             
        XH = Trim(Text1.Text)
                

        optionno = Right(Trim(Text3.Text), 3)
        
        If Text3.Text <> "" Then
            outno = XH + "  #" + optionno
        Else
            outno = XH
        End If
        serialno1 = Text2.Text
        Text1.SetFocus
        'On Error GoTo errorhandle
        
              
        wtycardsn = "SHP" + Right(serialno1, 8)
        errormsg = "�޷�����[warrenty.ini]��ָ��·����cnlist2.mdb�ļ�"
        Set warrtyworkspace = DBEngine.Workspaces(0)
        Set warrtydatabase = warrtyworkspace.OpenDatabase(mdbdir + "\" + "cnlist2.mdb", , True)
        errormsg = "�޷������ݿ����ҵ��ò�Ʒ��"
        condition1 = "Select * from ���� where ����ͺ� = '" & outno & "'"
        MsgBox (condition1)
        Set warrtyrecordset3 = warrtydatabase.OpenRecordset(condition1, dbOpenSnapshot)
     
          
        modelno = warrtyrecordset3.Fields("����ͺ�")
        
        
        If warrtyrecordset3.RecordCount <> 0 Then
            producttype = warrtyrecordset3.Fields("����ͺ�")
            productcfg1 = warrtyrecordset3.Fields("ɨ���ͺż�option")
            deadline = warrtyrecordset3.Fields("��������")
            condition_ddl = "Select * from ���޷�ʽ where �������� = " & deadline & ""
            Set warrtyrecordset4 = warrtydatabase.OpenRecordset(condition_ddl, dbOpenSnapshot)
            deadcontent = warrtyrecordset4.Fields("��������")
            If deadcontent = "1" Then
                deadcontent = ""
            End If
            systemname = warrtyrecordset3.Fields("��Ʒ����")
            productname = warrtyrecordset3.Fields("��Ʒ����")
        Else
            producttype = Text1.Text
            deadline = "3"
        End If
                
        Text4.Text = productname
        Text5.Text = modelno
        Text6.Text = serialno1
        datestring = Format(Date, "yyyy/mm/dd")
        Text7.Text = datestring
                
        Call cc
                
                               
        Text1.Text = ""
        Text2.Text = ""
        Text3.Text = ""
        Text4.Text = ""
        Text5.Text = ""
        Text6.Text = ""
        Text7.Text = ""
                
        Text1.SetFocus
                
        wtydate = Date
        mystring = deadline + " ��"
        mystring = deadcontent
                           
        paperwidth = Printer.Width
        paperheight = Printer.Height
             
        Printer.Orientation = 2
            
        errormsg = "��ӡ����"
        originalx = 3 * 150
        originaly = 0
        p = 1
        Printer.FontName = "����"
        Printer.FontSize = 10
        If p_sno = "Y" Then
            Printer.CurrentX = 8100 '���޿����
            Printer.CurrentY = 3070
            Printer.Print wtycardsn
        End If
                
        Printer.CurrentX = 8100 '��Ʒ����
        Printer.CurrentY = 3670
        Printer.Print productname
           
        Printer.CurrentX = 8100 '��Ʒ�ͺ�
        Printer.CurrentY = 4390
        Printer.Print producttype
             
        If p_sno = "Y" Then
            Printer.CurrentX = 8100 '��Ʒ���
            Printer.CurrentY = 5080
            Printer.Print serialno1
        End If
                
        Printer.CurrentX = 6800 '��Ʒ��������
        Printer.CurrentY = 6120
        Printer.Print productcfg1
                
        oldfont = Printer.Font
        oldsize = 10
    
        Printer.FontSize = 10   '��������
        If p_shipdate = "Y" Then
            Printer.CurrentX = 8100
            Printer.CurrentY = 8230
            datestring = Format(Date, "yyyy/mm/dd")
            Printer.Print datestring
        End If
                
        Printer.CurrentX = 8100 '��������
        Printer.CurrentY = 8800
        Printer.Print mystring
                
        Printer.CurrentX = 1590 'Print ��Ʒ�ͺ� above barcode
        Printer.CurrentY = 9000
        Printer.Print producttype
                
        Printer.CurrentX = 12660
        Printer.CurrentY = 8780
        Printer.Print producttype
                
        Printer.CurrentX = 1590 'Print ��Ʒ��� above barcode
        Printer.CurrentY = 9470
        Printer.Print serialno1
            
        Printer.CurrentX = 12660
        Printer.CurrentY = 9230
        Printer.Print serialno1
                
        Printer.FontName = "3 of 9 Barcode" 'Print P/N barcode
        Printer.FontSize = 16
        Printer.CurrentX = 1590
        Printer.CurrentY = 9240
        Printer.Print "*" + producttype + "*"
                
        Printer.CurrentX = 12660
        Printer.CurrentY = 9000
        Printer.Print "*" + producttype + "*"
                   
        Printer.CurrentX = 1590             'Print S/N barcode
        Printer.CurrentY = 9670
        Printer.Print "*" + serialno1 + "*"
                
        Printer.CurrentX = 12660
        Printer.CurrentY = 9430
        Printer.Print "*" + serialno1 + "*"
                          
        Printer.EndDoc
    End If
    Exit Sub
'errorhandle:
  ' MsgBox (errormsg)
End Sub

Public Sub cc()


Dim aa As String
Set productsworkspace = DBEngine.Workspaces(0)
Set productsdatabase = productsworkspace.OpenDatabase(mdbdir + "\" + "productlist.mdb")
Set productsrecord = productsdatabase.OpenRecordset("Select * from products")
If productsrecord.RecordCount <> 0 Then
productsrecord.MoveFirst
End If
Do While Not productsrecord.EOF()
  productsrecord.MoveNext
Loop

productsrecord.AddNew
productsrecord!���� = Text4.Text
productsrecord!��Ʒ�ͺ� = Text5.Text
aa = Right(Text6.Text, 10)
productsrecord!���к� = Text6.Text
productsrecord!���� = Text7.Text
productsrecord.Update
productsdatabase.Close





End Sub




