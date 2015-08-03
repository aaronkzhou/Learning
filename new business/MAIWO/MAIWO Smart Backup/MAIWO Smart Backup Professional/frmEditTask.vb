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
        If txtFrom.Text = "" Or txtTo.Text = "" Then MsgBox("源文件及目标文件不能为空，请设置！", vbCritical, "操作错误！") : Exit Sub

        Select Case myType
            Case "Add"
                frmMain.dGrid.Rows.Add()
                frmMain.dGrid(1, frmMain.dGrid.RowCount - 1).Value = txtFrom.Text
                frmMain.dGrid(2, frmMain.dGrid.RowCount - 1).Value = txtTo.Text
            Case "Alter"
                frmMain.dGrid(1, frmMain.dGrid.CurrentCellAddress.Y).Value = txtFrom.Text
                frmMain.dGrid(2, frmMain.dGrid.CurrentCellAddress.Y).Value = txtTo.Text
        End Select

        '将修改的任务信息保存到INI文件中
        Dim fileFrom As New String(""), fileTo As New String("")
        If frmMain.dGrid.Rows.Count > 0 Then
            For i = 0 To frmMain.dGrid.Rows.Count - 1
                fileFrom &= frmMain.dGrid(1, i).Value & "|"
                fileTo &= frmMain.dGrid(2, i).Value & "|"
            Next
        End If
        frmMain.WriteINI("Task", "FROM", fileFrom)
        frmMain.WriteINI("Task", "TO", fileTo)

        Me.Close()
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