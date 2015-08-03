<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class frmChooseTypeAtStart
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(frmChooseTypeAtStart))
        Me.Label1 = New System.Windows.Forms.Label()
        Me.cmdCancel_old = New System.Windows.Forms.Button()
        Me.cmdSetFilter_old = New System.Windows.Forms.Button()
        Me.cmdAddTask_old = New System.Windows.Forms.Button()
        Me.cmdCancel = New System.Windows.Forms.PictureBox()
        Me.cmdAddTask = New System.Windows.Forms.PictureBox()
        Me.cmdSetFilter = New System.Windows.Forms.PictureBox()
        Me.Label2 = New System.Windows.Forms.Label()
        Me.Label3 = New System.Windows.Forms.Label()
        Me.Label4 = New System.Windows.Forms.Label()
        Me.Label5 = New System.Windows.Forms.Label()
        CType(Me.cmdCancel, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.cmdAddTask, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.cmdSetFilter, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'Label1
        '
        Me.Label1.Anchor = CType((((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Bottom) _
                    Or System.Windows.Forms.AnchorStyles.Left) _
                    Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.Label1.Font = New System.Drawing.Font("宋体", 10.5!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(134, Byte))
        Me.Label1.Location = New System.Drawing.Point(30, 60)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(418, 71)
        Me.Label1.TabIndex = 7
        Me.Label1.Text = "初次使用需要对MAIWO Smart Backup Professional" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "智能备份软件进行设置" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10)
        Me.Label1.TextAlign = System.Drawing.ContentAlignment.MiddleCenter
        '
        'cmdCancel_old
        '
        Me.cmdCancel_old.AutoEllipsis = True
        Me.cmdCancel_old.Cursor = System.Windows.Forms.Cursors.Hand
        Me.cmdCancel_old.Image = CType(resources.GetObject("cmdCancel_old.Image"), System.Drawing.Image)
        Me.cmdCancel_old.Location = New System.Drawing.Point(409, 70)
        Me.cmdCancel_old.Name = "cmdCancel_old"
        Me.cmdCancel_old.Size = New System.Drawing.Size(84, 27)
        Me.cmdCancel_old.TabIndex = 10
        Me.cmdCancel_old.Text = "取消"
        Me.cmdCancel_old.TextAlign = System.Drawing.ContentAlignment.BottomCenter
        Me.cmdCancel_old.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageAboveText
        Me.cmdCancel_old.UseVisualStyleBackColor = True
        Me.cmdCancel_old.Visible = False
        '
        'cmdSetFilter_old
        '
        Me.cmdSetFilter_old.Location = New System.Drawing.Point(409, 41)
        Me.cmdSetFilter_old.Name = "cmdSetFilter_old"
        Me.cmdSetFilter_old.Size = New System.Drawing.Size(75, 23)
        Me.cmdSetFilter_old.TabIndex = 9
        Me.cmdSetFilter_old.Text = "文件类型"
        Me.cmdSetFilter_old.UseVisualStyleBackColor = True
        Me.cmdSetFilter_old.Visible = False
        '
        'cmdAddTask_old
        '
        Me.cmdAddTask_old.Location = New System.Drawing.Point(409, 12)
        Me.cmdAddTask_old.Name = "cmdAddTask_old"
        Me.cmdAddTask_old.Size = New System.Drawing.Size(75, 23)
        Me.cmdAddTask_old.TabIndex = 8
        Me.cmdAddTask_old.Text = "添加任务"
        Me.cmdAddTask_old.UseVisualStyleBackColor = True
        Me.cmdAddTask_old.Visible = False
        '
        'cmdCancel
        '
        Me.cmdCancel.Cursor = System.Windows.Forms.Cursors.Hand
        Me.cmdCancel.Image = CType(resources.GetObject("cmdCancel.Image"), System.Drawing.Image)
        Me.cmdCancel.Location = New System.Drawing.Point(321, 155)
        Me.cmdCancel.Name = "cmdCancel"
        Me.cmdCancel.Size = New System.Drawing.Size(62, 67)
        Me.cmdCancel.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage
        Me.cmdCancel.TabIndex = 11
        Me.cmdCancel.TabStop = False
        '
        'cmdAddTask
        '
        Me.cmdAddTask.Cursor = System.Windows.Forms.Cursors.Hand
        Me.cmdAddTask.Image = CType(resources.GetObject("cmdAddTask.Image"), System.Drawing.Image)
        Me.cmdAddTask.Location = New System.Drawing.Point(90, 155)
        Me.cmdAddTask.Name = "cmdAddTask"
        Me.cmdAddTask.Size = New System.Drawing.Size(62, 67)
        Me.cmdAddTask.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage
        Me.cmdAddTask.TabIndex = 12
        Me.cmdAddTask.TabStop = False
        '
        'cmdSetFilter
        '
        Me.cmdSetFilter.Cursor = System.Windows.Forms.Cursors.Hand
        Me.cmdSetFilter.Image = CType(resources.GetObject("cmdSetFilter.Image"), System.Drawing.Image)
        Me.cmdSetFilter.Location = New System.Drawing.Point(210, 155)
        Me.cmdSetFilter.Name = "cmdSetFilter"
        Me.cmdSetFilter.Size = New System.Drawing.Size(68, 67)
        Me.cmdSetFilter.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage
        Me.cmdSetFilter.TabIndex = 13
        Me.cmdSetFilter.TabStop = False
        '
        'Label2
        '
        Me.Label2.AutoSize = True
        Me.Label2.Location = New System.Drawing.Point(100, 225)
        Me.Label2.Name = "Label2"
        Me.Label2.Size = New System.Drawing.Size(41, 12)
        Me.Label2.TabIndex = 14
        Me.Label2.Text = "Label2"
        '
        'Label3
        '
        Me.Label3.AutoSize = True
        Me.Label3.Location = New System.Drawing.Point(220, 225)
        Me.Label3.Name = "Label3"
        Me.Label3.Size = New System.Drawing.Size(41, 12)
        Me.Label3.TabIndex = 15
        Me.Label3.Text = "Label3"
        '
        'Label4
        '
        Me.Label4.AutoSize = True
        Me.Label4.Location = New System.Drawing.Point(342, 225)
        Me.Label4.Name = "Label4"
        Me.Label4.Size = New System.Drawing.Size(41, 12)
        Me.Label4.TabIndex = 16
        Me.Label4.Text = "Label4"
        '
        'Label5
        '
        Me.Label5.Anchor = CType((((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Bottom) _
                    Or System.Windows.Forms.AnchorStyles.Left) _
                    Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.Label5.Font = New System.Drawing.Font("宋体", 10.5!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(134, Byte))
        Me.Label5.Location = New System.Drawing.Point(116, 12)
        Me.Label5.Name = "Label5"
        Me.Label5.Size = New System.Drawing.Size(267, 28)
        Me.Label5.TabIndex = 17
        Me.Label5.Text = "MAIWO Smart Backup Professional" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10)
        Me.Label5.TextAlign = System.Drawing.ContentAlignment.MiddleCenter
        '
        'frmChooseTypeAtStart
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 12.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(493, 301)
        Me.Controls.Add(Me.Label5)
        Me.Controls.Add(Me.Label4)
        Me.Controls.Add(Me.Label3)
        Me.Controls.Add(Me.Label2)
        Me.Controls.Add(Me.cmdSetFilter)
        Me.Controls.Add(Me.cmdAddTask)
        Me.Controls.Add(Me.cmdCancel)
        Me.Controls.Add(Me.cmdCancel_old)
        Me.Controls.Add(Me.cmdSetFilter_old)
        Me.Controls.Add(Me.cmdAddTask_old)
        Me.Controls.Add(Me.Label1)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.None
        Me.MaximumSize = New System.Drawing.Size(493, 301)
        Me.MinimumSize = New System.Drawing.Size(493, 301)
        Me.Name = "frmChooseTypeAtStart"
        Me.ShowIcon = False
        Me.ShowInTaskbar = False
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen
        CType(Me.cmdCancel, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.cmdAddTask, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.cmdSetFilter, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents Label1 As System.Windows.Forms.Label
    Friend WithEvents cmdCancel_old As System.Windows.Forms.Button
    Friend WithEvents cmdSetFilter_old As System.Windows.Forms.Button
    Friend WithEvents cmdAddTask_old As System.Windows.Forms.Button
    Friend WithEvents cmdCancel As System.Windows.Forms.PictureBox
    Friend WithEvents cmdAddTask As System.Windows.Forms.PictureBox
    Friend WithEvents cmdSetFilter As System.Windows.Forms.PictureBox
    Friend WithEvents Label2 As System.Windows.Forms.Label
    Friend WithEvents Label3 As System.Windows.Forms.Label
    Friend WithEvents Label4 As System.Windows.Forms.Label
    Friend WithEvents Label5 As System.Windows.Forms.Label
End Class
