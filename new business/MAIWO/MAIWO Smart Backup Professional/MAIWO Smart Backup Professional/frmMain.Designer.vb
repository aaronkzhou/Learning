<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class frmMain
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
        Me.components = New System.ComponentModel.Container()
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(frmMain))
        Me.ToolStrip1 = New System.Windows.Forms.ToolStrip()
        Me.tsbBegin = New System.Windows.Forms.ToolStripButton()
        Me.tsbPause = New System.Windows.Forms.ToolStripButton()
        Me.tsbEnd = New System.Windows.Forms.ToolStripButton()
        Me.ToolStripSeparator1 = New System.Windows.Forms.ToolStripSeparator()
        Me.tsbAddTask = New System.Windows.Forms.ToolStripButton()
        Me.tsbAlterTask = New System.Windows.Forms.ToolStripButton()
        Me.tsbDeleteTask = New System.Windows.Forms.ToolStripButton()
        Me.ToolStripSeparator2 = New System.Windows.Forms.ToolStripSeparator()
        Me.tsbSetTime = New System.Windows.Forms.ToolStripButton()
        Me.tsbSetFilter = New System.Windows.Forms.ToolStripButton()
        Me.tsbAbout = New System.Windows.Forms.ToolStripButton()
        Me.tsbToBBS = New System.Windows.Forms.ToolStripButton()
        Me.dGrid = New System.Windows.Forms.DataGridView()
        Me.Column1 = New System.Windows.Forms.DataGridViewCheckBoxColumn()
        Me.Column2 = New System.Windows.Forms.DataGridViewTextBoxColumn()
        Me.Column3 = New System.Windows.Forms.DataGridViewTextBoxColumn()
        Me.lstShow = New System.Windows.Forms.ListBox()
        Me.tcbStartWithPC = New System.Windows.Forms.CheckBox()
        Me.ProgressBar1 = New System.Windows.Forms.ToolStripProgressBar()
        Me.StatusStrip1 = New System.Windows.Forms.StatusStrip()
        Me.tssLabel = New System.Windows.Forms.ToolStripStatusLabel()
        Me.NotifyIcon1 = New System.Windows.Forms.NotifyIcon(Me.components)
        Me.Timer1 = New System.Windows.Forms.Timer(Me.components)
        Me.cobSetLanguage = New System.Windows.Forms.ComboBox()
        Me.picGg = New System.Windows.Forms.PictureBox()
        Me.ImageList1 = New System.Windows.Forms.ImageList(Me.components)
        Me.ToolStrip1.SuspendLayout()
        CType(Me.dGrid, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.StatusStrip1.SuspendLayout()
        CType(Me.picGg, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'ToolStrip1
        '
        Me.ToolStrip1.ImageScalingSize = New System.Drawing.Size(50, 50)
        Me.ToolStrip1.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.tsbBegin, Me.tsbPause, Me.tsbEnd, Me.ToolStripSeparator1, Me.tsbAddTask, Me.tsbAlterTask, Me.tsbDeleteTask, Me.ToolStripSeparator2, Me.tsbSetTime, Me.tsbSetFilter, Me.tsbAbout, Me.tsbToBBS})
        resources.ApplyResources(Me.ToolStrip1, "ToolStrip1")
        Me.ToolStrip1.Name = "ToolStrip1"
        '
        'tsbBegin
        '
        resources.ApplyResources(Me.tsbBegin, "tsbBegin")
        Me.tsbBegin.Name = "tsbBegin"
        '
        'tsbPause
        '
        resources.ApplyResources(Me.tsbPause, "tsbPause")
        Me.tsbPause.Name = "tsbPause"
        '
        'tsbEnd
        '
        resources.ApplyResources(Me.tsbEnd, "tsbEnd")
        Me.tsbEnd.Name = "tsbEnd"
        '
        'ToolStripSeparator1
        '
        Me.ToolStripSeparator1.Name = "ToolStripSeparator1"
        resources.ApplyResources(Me.ToolStripSeparator1, "ToolStripSeparator1")
        '
        'tsbAddTask
        '
        resources.ApplyResources(Me.tsbAddTask, "tsbAddTask")
        Me.tsbAddTask.Name = "tsbAddTask"
        '
        'tsbAlterTask
        '
        resources.ApplyResources(Me.tsbAlterTask, "tsbAlterTask")
        Me.tsbAlterTask.Name = "tsbAlterTask"
        '
        'tsbDeleteTask
        '
        resources.ApplyResources(Me.tsbDeleteTask, "tsbDeleteTask")
        Me.tsbDeleteTask.Name = "tsbDeleteTask"
        '
        'ToolStripSeparator2
        '
        Me.ToolStripSeparator2.Name = "ToolStripSeparator2"
        resources.ApplyResources(Me.ToolStripSeparator2, "ToolStripSeparator2")
        '
        'tsbSetTime
        '
        resources.ApplyResources(Me.tsbSetTime, "tsbSetTime")
        Me.tsbSetTime.Name = "tsbSetTime"
        '
        'tsbSetFilter
        '
        resources.ApplyResources(Me.tsbSetFilter, "tsbSetFilter")
        Me.tsbSetFilter.Name = "tsbSetFilter"
        '
        'tsbAbout
        '
        resources.ApplyResources(Me.tsbAbout, "tsbAbout")
        Me.tsbAbout.Name = "tsbAbout"
        '
        'tsbToBBS
        '
        resources.ApplyResources(Me.tsbToBBS, "tsbToBBS")
        Me.tsbToBBS.Name = "tsbToBBS"
        '
        'dGrid
        '
        Me.dGrid.AllowUserToAddRows = False
        Me.dGrid.AllowUserToDeleteRows = False
        Me.dGrid.AllowUserToOrderColumns = True
        Me.dGrid.BackgroundColor = System.Drawing.SystemColors.Control
        Me.dGrid.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize
        Me.dGrid.Columns.AddRange(New System.Windows.Forms.DataGridViewColumn() {Me.Column1, Me.Column2, Me.Column3})
        resources.ApplyResources(Me.dGrid, "dGrid")
        Me.dGrid.Name = "dGrid"
        Me.dGrid.RowHeadersVisible = False
        Me.dGrid.RowTemplate.Height = 23
        '
        'Column1
        '
        resources.ApplyResources(Me.Column1, "Column1")
        Me.Column1.Name = "Column1"
        Me.Column1.Resizable = System.Windows.Forms.DataGridViewTriState.[True]
        Me.Column1.SortMode = System.Windows.Forms.DataGridViewColumnSortMode.Automatic
        '
        'Column2
        '
        resources.ApplyResources(Me.Column2, "Column2")
        Me.Column2.Name = "Column2"
        '
        'Column3
        '
        resources.ApplyResources(Me.Column3, "Column3")
        Me.Column3.Name = "Column3"
        '
        'lstShow
        '
        Me.lstShow.FormattingEnabled = True
        resources.ApplyResources(Me.lstShow, "lstShow")
        Me.lstShow.Name = "lstShow"
        '
        'tcbStartWithPC
        '
        resources.ApplyResources(Me.tcbStartWithPC, "tcbStartWithPC")
        Me.tcbStartWithPC.Name = "tcbStartWithPC"
        Me.tcbStartWithPC.UseVisualStyleBackColor = True
        '
        'ProgressBar1
        '
        Me.ProgressBar1.Maximum = 0
        Me.ProgressBar1.Name = "ProgressBar1"
        resources.ApplyResources(Me.ProgressBar1, "ProgressBar1")
        '
        'StatusStrip1
        '
        Me.StatusStrip1.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.ProgressBar1, Me.tssLabel})
        resources.ApplyResources(Me.StatusStrip1, "StatusStrip1")
        Me.StatusStrip1.Name = "StatusStrip1"
        '
        'tssLabel
        '
        Me.tssLabel.Name = "tssLabel"
        resources.ApplyResources(Me.tssLabel, "tssLabel")
        '
        'NotifyIcon1
        '
        resources.ApplyResources(Me.NotifyIcon1, "NotifyIcon1")
        '
        'Timer1
        '
        Me.Timer1.Interval = 60000
        '
        'cobSetLanguage
        '
        Me.cobSetLanguage.FormattingEnabled = True
        Me.cobSetLanguage.Items.AddRange(New Object() {resources.GetString("cobSetLanguage.Items"), resources.GetString("cobSetLanguage.Items1"), resources.GetString("cobSetLanguage.Items2")})
        resources.ApplyResources(Me.cobSetLanguage, "cobSetLanguage")
        Me.cobSetLanguage.Name = "cobSetLanguage"
        '
        'picGg
        '
        Me.picGg.BackColor = System.Drawing.SystemColors.Control
        Me.picGg.Cursor = System.Windows.Forms.Cursors.Hand
        resources.ApplyResources(Me.picGg, "picGg")
        Me.picGg.Name = "picGg"
        Me.picGg.TabStop = False
        '
        'ImageList1
        '
        Me.ImageList1.ImageStream = CType(resources.GetObject("ImageList1.ImageStream"), System.Windows.Forms.ImageListStreamer)
        Me.ImageList1.TransparentColor = System.Drawing.Color.Transparent
        Me.ImageList1.Images.SetKeyName(0, "EmptyCD.png")
        Me.ImageList1.Images.SetKeyName(1, "AudioCDPlus.png")
        '
        'frmMain
        '
        resources.ApplyResources(Me, "$this")
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.Controls.Add(Me.picGg)
        Me.Controls.Add(Me.cobSetLanguage)
        Me.Controls.Add(Me.tcbStartWithPC)
        Me.Controls.Add(Me.StatusStrip1)
        Me.Controls.Add(Me.lstShow)
        Me.Controls.Add(Me.dGrid)
        Me.Controls.Add(Me.ToolStrip1)
        Me.Name = "frmMain"
        Me.ToolStrip1.ResumeLayout(False)
        Me.ToolStrip1.PerformLayout()
        CType(Me.dGrid, System.ComponentModel.ISupportInitialize).EndInit()
        Me.StatusStrip1.ResumeLayout(False)
        Me.StatusStrip1.PerformLayout()
        CType(Me.picGg, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents ToolStrip1 As System.Windows.Forms.ToolStrip
    Friend WithEvents tsbBegin As System.Windows.Forms.ToolStripButton
    Friend WithEvents tsbPause As System.Windows.Forms.ToolStripButton
    Friend WithEvents tsbEnd As System.Windows.Forms.ToolStripButton
    Friend WithEvents ToolStripSeparator1 As System.Windows.Forms.ToolStripSeparator
    Friend WithEvents ToolStripSeparator2 As System.Windows.Forms.ToolStripSeparator
    Friend WithEvents tsbAddTask As System.Windows.Forms.ToolStripButton
    Friend WithEvents tsbAlterTask As System.Windows.Forms.ToolStripButton
    Friend WithEvents tsbDeleteTask As System.Windows.Forms.ToolStripButton
    Friend WithEvents dGrid As System.Windows.Forms.DataGridView
    Friend WithEvents tsbAbout As System.Windows.Forms.ToolStripButton
    Friend WithEvents lstShow As System.Windows.Forms.ListBox
    Friend WithEvents tcbStartWithPC As System.Windows.Forms.CheckBox
    Friend WithEvents tsbSetTime As System.Windows.Forms.ToolStripButton
    Friend WithEvents ProgressBar1 As System.Windows.Forms.ToolStripProgressBar
    Friend WithEvents StatusStrip1 As System.Windows.Forms.StatusStrip
    Friend WithEvents NotifyIcon1 As System.Windows.Forms.NotifyIcon
    Friend WithEvents tssLabel As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents Timer1 As System.Windows.Forms.Timer
    Friend WithEvents cobSetLanguage As System.Windows.Forms.ComboBox
    Friend WithEvents Column1 As System.Windows.Forms.DataGridViewCheckBoxColumn
    Friend WithEvents Column2 As System.Windows.Forms.DataGridViewTextBoxColumn
    Friend WithEvents Column3 As System.Windows.Forms.DataGridViewTextBoxColumn
    Friend WithEvents tsbToBBS As System.Windows.Forms.ToolStripButton
    Friend WithEvents picGg As System.Windows.Forms.PictureBox
    Friend WithEvents ImageList1 As System.Windows.Forms.ImageList
    Friend WithEvents tsbSetFilter As System.Windows.Forms.ToolStripButton

End Class
