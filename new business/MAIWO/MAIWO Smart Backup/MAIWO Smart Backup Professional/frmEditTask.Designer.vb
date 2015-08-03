<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class frmEditTask
    Inherits System.Windows.Forms.Form

    'Form 重写 Dispose，以清理组件列表。
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Windows 窗体设计器所必需的
    Private components As System.ComponentModel.IContainer

    '注意: 以下过程是 Windows 窗体设计器所必需的
    '可以使用 Windows 窗体设计器修改它。
    '不要使用代码编辑器修改它。
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(frmEditTask))
        Me.Label1 = New System.Windows.Forms.Label()
        Me.txtFrom = New System.Windows.Forms.TextBox()
        Me.cmdSeeFrom = New System.Windows.Forms.Button()
        Me.cmdSeeTo = New System.Windows.Forms.Button()
        Me.txtTo = New System.Windows.Forms.TextBox()
        Me.Label2 = New System.Windows.Forms.Label()
        Me.cmdOK = New System.Windows.Forms.Button()
        Me.folderDlg = New System.Windows.Forms.FolderBrowserDialog()
        Me.SuspendLayout()
        '
        'Label1
        '
        resources.ApplyResources(Me.Label1, "Label1")
        Me.Label1.Name = "Label1"
        '
        'txtFrom
        '
        resources.ApplyResources(Me.txtFrom, "txtFrom")
        Me.txtFrom.Name = "txtFrom"
        '
        'cmdSeeFrom
        '
        resources.ApplyResources(Me.cmdSeeFrom, "cmdSeeFrom")
        Me.cmdSeeFrom.Name = "cmdSeeFrom"
        Me.cmdSeeFrom.UseVisualStyleBackColor = True
        '
        'cmdSeeTo
        '
        resources.ApplyResources(Me.cmdSeeTo, "cmdSeeTo")
        Me.cmdSeeTo.Name = "cmdSeeTo"
        Me.cmdSeeTo.UseVisualStyleBackColor = True
        '
        'txtTo
        '
        resources.ApplyResources(Me.txtTo, "txtTo")
        Me.txtTo.Name = "txtTo"
        '
        'Label2
        '
        resources.ApplyResources(Me.Label2, "Label2")
        Me.Label2.Name = "Label2"
        '
        'cmdOK
        '
        resources.ApplyResources(Me.cmdOK, "cmdOK")
        Me.cmdOK.Name = "cmdOK"
        Me.cmdOK.UseVisualStyleBackColor = True
        '
        'folderDlg
        '
        resources.ApplyResources(Me.folderDlg, "folderDlg")
        Me.folderDlg.ShowNewFolderButton = False
        '
        'frmEditTask
        '
        resources.ApplyResources(Me, "$this")
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.Controls.Add(Me.cmdOK)
        Me.Controls.Add(Me.cmdSeeTo)
        Me.Controls.Add(Me.txtTo)
        Me.Controls.Add(Me.Label2)
        Me.Controls.Add(Me.cmdSeeFrom)
        Me.Controls.Add(Me.txtFrom)
        Me.Controls.Add(Me.Label1)
        Me.Name = "frmEditTask"
        Me.ShowIcon = False
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents Label1 As System.Windows.Forms.Label
    Friend WithEvents txtFrom As System.Windows.Forms.TextBox
    Friend WithEvents cmdSeeFrom As System.Windows.Forms.Button
    Friend WithEvents cmdSeeTo As System.Windows.Forms.Button
    Friend WithEvents txtTo As System.Windows.Forms.TextBox
    Friend WithEvents Label2 As System.Windows.Forms.Label
    Friend WithEvents cmdOK As System.Windows.Forms.Button
    Friend WithEvents folderDlg As System.Windows.Forms.FolderBrowserDialog
End Class
