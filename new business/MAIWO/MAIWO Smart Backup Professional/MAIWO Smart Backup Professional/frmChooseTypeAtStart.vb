Public Class frmChooseTypeAtStart

    Private Sub cmdAddTask_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdAddTask_old.Click, cmdAddTask.Click
        Me.Close()
        Select Case frmMain.NowLanguage
            Case "zh-Hans"
                frmEditTask.Text = "添加任务"
            Case "zh-Hant"
                frmEditTask.Text = "添加任務"
            Case "en"
                frmEditTask.Text = "Add Task"
        End Select

        frmEditTask.myType = "Add"
        frmEditTask.ShowDialog()

    End Sub

    Private Sub cmdSetFilter_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdSetFilter_old.Click, cmdSetFilter.Click
        Me.Close()
        frmSetFilter.ShowDialog()

    End Sub

    Private Sub cmdCancel_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdCancel_old.Click, cmdCancel.Click
        Me.Close()
    End Sub

    Private Sub frmChooseTypeAtStart_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        cmdAddTask.Image = frmMain.tsbAddTask.Image
        cmdSetFilter.Image = frmMain.tsbSetFilter.Image
    End Sub

    'Private Sub cmdAddTask_MouseLeave(ByVal sender As Object, ByVal e As System.EventArgs) Handles cmdAddTask.MouseLeave
    '    cmdAddTask.BorderStyle = BorderStyle.None
    'End Sub

    'Private Sub cmdAddTask_MouseMove(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles cmdAddTask.MouseMove
    '    cmdAddTask.BorderStyle = BorderStyle.FixedSingle
    'End Sub

    'Private Sub cmdSetFilter_MouseLeave(ByVal sender As Object, ByVal e As System.EventArgs) Handles cmdSetFilter.MouseLeave
    '    cmdSetFilter.BorderStyle = BorderStyle.None
    'End Sub

    'Private Sub cmdSetFilter_MouseMove(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles cmdSetFilter.MouseMove
    '    cmdSetFilter.BorderStyle = BorderStyle.FixedSingle
    'End Sub

    'Private Sub cmdCancel_MouseLeave(ByVal sender As Object, ByVal e As System.EventArgs) Handles cmdCancel.MouseLeave
    '    cmdCancel.BorderStyle = BorderStyle.None
    'End Sub

    'Private Sub cmdCancel_MouseMove(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles cmdCancel.MouseMove
    '    cmdCancel.BorderStyle = BorderStyle.FixedSingle
    'End Sub
End Class