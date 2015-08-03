Public Class frmEditTask

    Public myType As String

    Public Sub setLanguage()

        Select Case frmMain.NowLanguage
            Case "zh-Hans"
                Label1.Text = "源路径" : Label2.Text = "目标路径"
                cmdSeeFrom.Text = "浏览" : cmdSeeTo.Text = "浏览"
                cmdOK.Text = "确定"
            Case "zh-Hant"
                Label1.Text = "源路徑" : Label2.Text = "目標路徑"
                cmdSeeFrom.Text = "瀏覽" : cmdSeeTo.Text = "瀏覽"
                cmdOK.Text = "確定"
            Case "en"
                Label1.Text = "From Path" : Label2.Text = "To Path"
                cmdSeeFrom.Text = "Browse" : cmdSeeTo.Text = "Browse"
                cmdOK.Text = "OK"
        End Select

    End Sub

    Private Sub frmEditTask_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        If myType = "Add" Then
            txtFrom.Text = ""
            txtTo.Text = ""
        End If

    End Sub

    Private Sub cmdOK_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdOK.Click
        If txtFrom.Text = "" Or txtTo.Text = "" Then
            Select Case frmMain.NowLanguage
                Case "zh-Hans"
                    MsgBox("源路径及目标路径不能为空，请设置！", vbCritical, "操作错误！")
                Case "zh-Hant"
                    MsgBox("源路徑及目標路徑不能為空，請設置！", vbCritical, "操作錯誤！")
                Case "en"
                    MsgBox("You should set the From Path and the To Path firsh！", vbCritical, "Error！")
            End Select

            Exit Sub
        End If

        Me.Close()
        Select Case myType
            Case "Add"
                frmMain.dGrid.Rows.Add()
                frmMain.dGrid(1, frmMain.dGrid.RowCount - 1).Value = txtFrom.Text
                frmMain.dGrid(2, frmMain.dGrid.RowCount - 1).Value = txtTo.Text

                frmMain.tsbBegin.Enabled = True
            Case "Alter"
                frmMain.dGrid(1, frmMain.dGrid.CurrentCellAddress.Y).Value = txtFrom.Text
                frmMain.dGrid(2, frmMain.dGrid.CurrentCellAddress.Y).Value = txtTo.Text
        End Select

        '将修改的任务信息保存到INI文件中
        Dim fileFrom As New String(""), fileTo As New String("")
        If frmMain.dGrid.Rows.Count > 1 Then
            For i = 1 To frmMain.dGrid.Rows.Count - 1
                fileFrom &= frmMain.dGrid(1, i).Value & "|"
                fileTo &= frmMain.dGrid(2, i).Value & "|"
            Next
        End If
        If fileFrom <> "" Then fileFrom = Mid(fileFrom, 1, fileFrom.Length - 1)
        If fileTo <> "" Then fileTo = Mid(fileTo, 1, fileTo.Length - 1)
        frmMain.WriteINI("Task", "FROM", fileFrom)
        frmMain.WriteINI("Task", "TO", fileTo)
        frmMain.arrFromPath = Split(frmMain.GetINI("Task", "FROM", ""), "|")
        frmMain.arrToPath = Split(frmMain.GetINI("Task", "TO", ""), "|")
        ReDim frmMain.arrTaskChoosed(UBound(frmMain.arrFromPath))
        frmSetTime.ShowDialog()

    End Sub

    Private Sub cmdSeeFrom_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdSeeFrom.Click
        folderDlg.ShowNewFolderButton = False
        folderDlg.ShowDialog()
        txtFrom.Text = folderDlg.SelectedPath
    End Sub

    Private Sub cmdSeeTo_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdSeeTo.Click
        folderDlg.ShowNewFolderButton = True
        folderDlg.ShowDialog()
        txtTo.Text = folderDlg.SelectedPath
    End Sub
End Class