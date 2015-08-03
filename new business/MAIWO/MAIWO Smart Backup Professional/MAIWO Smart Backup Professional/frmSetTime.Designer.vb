<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class frmSetTime
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(frmSetTime))
        Me.cmdOK = New System.Windows.Forms.Button()
        Me.optTypeDate = New System.Windows.Forms.RadioButton()
        Me.optTypeIntarvel = New System.Windows.Forms.RadioButton()
        Me.GroupBox1 = New System.Windows.Forms.Panel()
        Me.CheckBox0 = New SmartBackup.myCheckBox()
        Me.CheckBox6 = New SmartBackup.myCheckBox()
        Me.CheckBox5 = New SmartBackup.myCheckBox()
        Me.CheckBox4 = New SmartBackup.myCheckBox()
        Me.CheckBox3 = New SmartBackup.myCheckBox()
        Me.CheckBox2 = New SmartBackup.myCheckBox()
        Me.CheckBox1 = New SmartBackup.myCheckBox()
        Me.wMin0 = New System.Windows.Forms.NumericUpDown()
        Me.Label14 = New System.Windows.Forms.Label()
        Me.wHour0 = New System.Windows.Forms.NumericUpDown()
        Me.wMin6 = New System.Windows.Forms.NumericUpDown()
        Me.Label12 = New System.Windows.Forms.Label()
        Me.wHour6 = New System.Windows.Forms.NumericUpDown()
        Me.wMin5 = New System.Windows.Forms.NumericUpDown()
        Me.Label10 = New System.Windows.Forms.Label()
        Me.wHour5 = New System.Windows.Forms.NumericUpDown()
        Me.wMin4 = New System.Windows.Forms.NumericUpDown()
        Me.Label8 = New System.Windows.Forms.Label()
        Me.wHour4 = New System.Windows.Forms.NumericUpDown()
        Me.wMin3 = New System.Windows.Forms.NumericUpDown()
        Me.Label6 = New System.Windows.Forms.Label()
        Me.wHour3 = New System.Windows.Forms.NumericUpDown()
        Me.wMin2 = New System.Windows.Forms.NumericUpDown()
        Me.Label4 = New System.Windows.Forms.Label()
        Me.wHour2 = New System.Windows.Forms.NumericUpDown()
        Me.wMin1 = New System.Windows.Forms.NumericUpDown()
        Me.Label1 = New System.Windows.Forms.Label()
        Me.wHour1 = New System.Windows.Forms.NumericUpDown()
        Me.optTypeWeek = New System.Windows.Forms.RadioButton()
        Me.GroupBox2 = New System.Windows.Forms.Panel()
        Me.dMin = New System.Windows.Forms.NumericUpDown()
        Me.Label16 = New System.Windows.Forms.Label()
        Me.dHour = New System.Windows.Forms.NumericUpDown()
        Me.dDate = New System.Windows.Forms.DateTimePicker()
        Me.GroupBox3 = New System.Windows.Forms.Panel()
        Me.Label2 = New System.Windows.Forms.Label()
        Me.inMin = New System.Windows.Forms.NumericUpDown()
        Me.Label18 = New System.Windows.Forms.Label()
        Me.inHour = New System.Windows.Forms.NumericUpDown()
        Me.rctShape1 = New System.Windows.Forms.Label()
        Me.rctShape2 = New System.Windows.Forms.Label()
        Me.rctShape3 = New System.Windows.Forms.Label()
        Me.GroupBox4 = New System.Windows.Forms.Panel()
        Me.edMin = New System.Windows.Forms.NumericUpDown()
        Me.Label3 = New System.Windows.Forms.Label()
        Me.edHour = New System.Windows.Forms.NumericUpDown()
        Me.optTypeEveryday = New System.Windows.Forms.RadioButton()
        Me.rctShape4 = New System.Windows.Forms.Label()
        Me.GroupBox1.SuspendLayout()
        CType(Me.wMin0, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wHour0, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wMin6, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wHour6, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wMin5, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wHour5, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wMin4, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wHour4, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wMin3, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wHour3, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wMin2, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wHour2, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wMin1, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.wHour1, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.GroupBox2.SuspendLayout()
        CType(Me.dMin, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.dHour, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.GroupBox3.SuspendLayout()
        CType(Me.inMin, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.inHour, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.GroupBox4.SuspendLayout()
        CType(Me.edMin, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.edHour, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'cmdOK
        '
        resources.ApplyResources(Me.cmdOK, "cmdOK")
        Me.cmdOK.Name = "cmdOK"
        Me.cmdOK.UseVisualStyleBackColor = True
        '
        'optTypeDate
        '
        resources.ApplyResources(Me.optTypeDate, "optTypeDate")
        Me.optTypeDate.Name = "optTypeDate"
        Me.optTypeDate.UseVisualStyleBackColor = True
        '
        'optTypeIntarvel
        '
        resources.ApplyResources(Me.optTypeIntarvel, "optTypeIntarvel")
        Me.optTypeIntarvel.Name = "optTypeIntarvel"
        Me.optTypeIntarvel.UseVisualStyleBackColor = True
        '
        'GroupBox1
        '
        Me.GroupBox1.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle
        Me.GroupBox1.Controls.Add(Me.CheckBox0)
        Me.GroupBox1.Controls.Add(Me.CheckBox6)
        Me.GroupBox1.Controls.Add(Me.CheckBox5)
        Me.GroupBox1.Controls.Add(Me.CheckBox4)
        Me.GroupBox1.Controls.Add(Me.CheckBox3)
        Me.GroupBox1.Controls.Add(Me.CheckBox2)
        Me.GroupBox1.Controls.Add(Me.CheckBox1)
        Me.GroupBox1.Controls.Add(Me.wMin0)
        Me.GroupBox1.Controls.Add(Me.Label14)
        Me.GroupBox1.Controls.Add(Me.wHour0)
        Me.GroupBox1.Controls.Add(Me.wMin6)
        Me.GroupBox1.Controls.Add(Me.Label12)
        Me.GroupBox1.Controls.Add(Me.wHour6)
        Me.GroupBox1.Controls.Add(Me.wMin5)
        Me.GroupBox1.Controls.Add(Me.Label10)
        Me.GroupBox1.Controls.Add(Me.wHour5)
        Me.GroupBox1.Controls.Add(Me.wMin4)
        Me.GroupBox1.Controls.Add(Me.Label8)
        Me.GroupBox1.Controls.Add(Me.wHour4)
        Me.GroupBox1.Controls.Add(Me.wMin3)
        Me.GroupBox1.Controls.Add(Me.Label6)
        Me.GroupBox1.Controls.Add(Me.wHour3)
        Me.GroupBox1.Controls.Add(Me.wMin2)
        Me.GroupBox1.Controls.Add(Me.Label4)
        Me.GroupBox1.Controls.Add(Me.wHour2)
        Me.GroupBox1.Controls.Add(Me.wMin1)
        Me.GroupBox1.Controls.Add(Me.Label1)
        Me.GroupBox1.Controls.Add(Me.wHour1)
        resources.ApplyResources(Me.GroupBox1, "GroupBox1")
        Me.GroupBox1.Name = "GroupBox1"
        '
        'CheckBox0
        '
        Me.CheckBox0.Checked = False
        resources.ApplyResources(Me.CheckBox0, "CheckBox0")
        Me.CheckBox0.myText = "星期日"
        Me.CheckBox0.Name = "CheckBox0"
        Me.CheckBox0.Tag = "0"
        '
        'CheckBox6
        '
        Me.CheckBox6.Checked = False
        resources.ApplyResources(Me.CheckBox6, "CheckBox6")
        Me.CheckBox6.myText = "星期六"
        Me.CheckBox6.Name = "CheckBox6"
        Me.CheckBox6.Tag = "6"
        '
        'CheckBox5
        '
        Me.CheckBox5.Checked = False
        resources.ApplyResources(Me.CheckBox5, "CheckBox5")
        Me.CheckBox5.myText = "星期五"
        Me.CheckBox5.Name = "CheckBox5"
        Me.CheckBox5.Tag = "5"
        '
        'CheckBox4
        '
        Me.CheckBox4.Checked = False
        resources.ApplyResources(Me.CheckBox4, "CheckBox4")
        Me.CheckBox4.myText = "星期四"
        Me.CheckBox4.Name = "CheckBox4"
        Me.CheckBox4.Tag = "4"
        '
        'CheckBox3
        '
        Me.CheckBox3.Checked = False
        resources.ApplyResources(Me.CheckBox3, "CheckBox3")
        Me.CheckBox3.myText = "星期三"
        Me.CheckBox3.Name = "CheckBox3"
        Me.CheckBox3.Tag = "3"
        '
        'CheckBox2
        '
        Me.CheckBox2.Checked = False
        resources.ApplyResources(Me.CheckBox2, "CheckBox2")
        Me.CheckBox2.myText = "星期二"
        Me.CheckBox2.Name = "CheckBox2"
        Me.CheckBox2.Tag = "2"
        '
        'CheckBox1
        '
        Me.CheckBox1.Checked = False
        resources.ApplyResources(Me.CheckBox1, "CheckBox1")
        Me.CheckBox1.myText = "星期一"
        Me.CheckBox1.Name = "CheckBox1"
        Me.CheckBox1.Tag = "1"
        '
        'wMin0
        '
        resources.ApplyResources(Me.wMin0, "wMin0")
        Me.wMin0.Maximum = New Decimal(New Integer() {59, 0, 0, 0})
        Me.wMin0.Name = "wMin0"
        Me.wMin0.Tag = "7"
        '
        'Label14
        '
        resources.ApplyResources(Me.Label14, "Label14")
        Me.Label14.Name = "Label14"
        '
        'wHour0
        '
        resources.ApplyResources(Me.wHour0, "wHour0")
        Me.wHour0.Maximum = New Decimal(New Integer() {23, 0, 0, 0})
        Me.wHour0.Name = "wHour0"
        Me.wHour0.Tag = "7"
        '
        'wMin6
        '
        resources.ApplyResources(Me.wMin6, "wMin6")
        Me.wMin6.Maximum = New Decimal(New Integer() {59, 0, 0, 0})
        Me.wMin6.Name = "wMin6"
        Me.wMin6.Tag = "6"
        '
        'Label12
        '
        resources.ApplyResources(Me.Label12, "Label12")
        Me.Label12.Name = "Label12"
        '
        'wHour6
        '
        resources.ApplyResources(Me.wHour6, "wHour6")
        Me.wHour6.Maximum = New Decimal(New Integer() {23, 0, 0, 0})
        Me.wHour6.Name = "wHour6"
        Me.wHour6.Tag = "6"
        '
        'wMin5
        '
        resources.ApplyResources(Me.wMin5, "wMin5")
        Me.wMin5.Maximum = New Decimal(New Integer() {59, 0, 0, 0})
        Me.wMin5.Name = "wMin5"
        Me.wMin5.Tag = "5"
        '
        'Label10
        '
        resources.ApplyResources(Me.Label10, "Label10")
        Me.Label10.Name = "Label10"
        '
        'wHour5
        '
        resources.ApplyResources(Me.wHour5, "wHour5")
        Me.wHour5.Maximum = New Decimal(New Integer() {23, 0, 0, 0})
        Me.wHour5.Name = "wHour5"
        Me.wHour5.Tag = "5"
        '
        'wMin4
        '
        resources.ApplyResources(Me.wMin4, "wMin4")
        Me.wMin4.Maximum = New Decimal(New Integer() {59, 0, 0, 0})
        Me.wMin4.Name = "wMin4"
        Me.wMin4.Tag = "4"
        '
        'Label8
        '
        resources.ApplyResources(Me.Label8, "Label8")
        Me.Label8.Name = "Label8"
        '
        'wHour4
        '
        resources.ApplyResources(Me.wHour4, "wHour4")
        Me.wHour4.Maximum = New Decimal(New Integer() {23, 0, 0, 0})
        Me.wHour4.Name = "wHour4"
        Me.wHour4.Tag = "4"
        '
        'wMin3
        '
        resources.ApplyResources(Me.wMin3, "wMin3")
        Me.wMin3.Maximum = New Decimal(New Integer() {59, 0, 0, 0})
        Me.wMin3.Name = "wMin3"
        Me.wMin3.Tag = "3"
        '
        'Label6
        '
        resources.ApplyResources(Me.Label6, "Label6")
        Me.Label6.Name = "Label6"
        '
        'wHour3
        '
        resources.ApplyResources(Me.wHour3, "wHour3")
        Me.wHour3.Maximum = New Decimal(New Integer() {23, 0, 0, 0})
        Me.wHour3.Name = "wHour3"
        Me.wHour3.Tag = "3"
        '
        'wMin2
        '
        resources.ApplyResources(Me.wMin2, "wMin2")
        Me.wMin2.Maximum = New Decimal(New Integer() {59, 0, 0, 0})
        Me.wMin2.Name = "wMin2"
        Me.wMin2.Tag = "2"
        '
        'Label4
        '
        resources.ApplyResources(Me.Label4, "Label4")
        Me.Label4.Name = "Label4"
        '
        'wHour2
        '
        resources.ApplyResources(Me.wHour2, "wHour2")
        Me.wHour2.Maximum = New Decimal(New Integer() {23, 0, 0, 0})
        Me.wHour2.Name = "wHour2"
        Me.wHour2.Tag = "2"
        '
        'wMin1
        '
        resources.ApplyResources(Me.wMin1, "wMin1")
        Me.wMin1.Maximum = New Decimal(New Integer() {59, 0, 0, 0})
        Me.wMin1.Name = "wMin1"
        Me.wMin1.Tag = "1"
        '
        'Label1
        '
        resources.ApplyResources(Me.Label1, "Label1")
        Me.Label1.Name = "Label1"
        '
        'wHour1
        '
        resources.ApplyResources(Me.wHour1, "wHour1")
        Me.wHour1.Maximum = New Decimal(New Integer() {23, 0, 0, 0})
        Me.wHour1.Name = "wHour1"
        Me.wHour1.Tag = "1"
        '
        'optTypeWeek
        '
        resources.ApplyResources(Me.optTypeWeek, "optTypeWeek")
        Me.optTypeWeek.Checked = True
        Me.optTypeWeek.Name = "optTypeWeek"
        Me.optTypeWeek.TabStop = True
        Me.optTypeWeek.UseVisualStyleBackColor = True
        '
        'GroupBox2
        '
        Me.GroupBox2.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle
        Me.GroupBox2.Controls.Add(Me.dMin)
        Me.GroupBox2.Controls.Add(Me.Label16)
        Me.GroupBox2.Controls.Add(Me.dHour)
        Me.GroupBox2.Controls.Add(Me.dDate)
        resources.ApplyResources(Me.GroupBox2, "GroupBox2")
        Me.GroupBox2.Name = "GroupBox2"
        '
        'dMin
        '
        resources.ApplyResources(Me.dMin, "dMin")
        Me.dMin.Maximum = New Decimal(New Integer() {59, 0, 0, 0})
        Me.dMin.Name = "dMin"
        '
        'Label16
        '
        resources.ApplyResources(Me.Label16, "Label16")
        Me.Label16.Name = "Label16"
        '
        'dHour
        '
        resources.ApplyResources(Me.dHour, "dHour")
        Me.dHour.Maximum = New Decimal(New Integer() {23, 0, 0, 0})
        Me.dHour.Name = "dHour"
        '
        'dDate
        '
        Me.dDate.Format = System.Windows.Forms.DateTimePickerFormat.Custom
        resources.ApplyResources(Me.dDate, "dDate")
        Me.dDate.Name = "dDate"
        Me.dDate.Value = New Date(2015, 2, 19, 0, 0, 0, 0)
        '
        'GroupBox3
        '
        Me.GroupBox3.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle
        Me.GroupBox3.Controls.Add(Me.Label2)
        Me.GroupBox3.Controls.Add(Me.inMin)
        Me.GroupBox3.Controls.Add(Me.Label18)
        Me.GroupBox3.Controls.Add(Me.inHour)
        resources.ApplyResources(Me.GroupBox3, "GroupBox3")
        Me.GroupBox3.Name = "GroupBox3"
        '
        'Label2
        '
        resources.ApplyResources(Me.Label2, "Label2")
        Me.Label2.Name = "Label2"
        '
        'inMin
        '
        resources.ApplyResources(Me.inMin, "inMin")
        Me.inMin.Maximum = New Decimal(New Integer() {59, 0, 0, 0})
        Me.inMin.Name = "inMin"
        '
        'Label18
        '
        resources.ApplyResources(Me.Label18, "Label18")
        Me.Label18.Name = "Label18"
        '
        'inHour
        '
        resources.ApplyResources(Me.inHour, "inHour")
        Me.inHour.Name = "inHour"
        '
        'rctShape1
        '
        Me.rctShape1.BackColor = System.Drawing.Color.Orange
        resources.ApplyResources(Me.rctShape1, "rctShape1")
        Me.rctShape1.Name = "rctShape1"
        '
        'rctShape2
        '
        Me.rctShape2.BackColor = System.Drawing.Color.Orange
        resources.ApplyResources(Me.rctShape2, "rctShape2")
        Me.rctShape2.Name = "rctShape2"
        '
        'rctShape3
        '
        Me.rctShape3.BackColor = System.Drawing.Color.Orange
        resources.ApplyResources(Me.rctShape3, "rctShape3")
        Me.rctShape3.Name = "rctShape3"
        '
        'GroupBox4
        '
        Me.GroupBox4.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle
        Me.GroupBox4.Controls.Add(Me.edMin)
        Me.GroupBox4.Controls.Add(Me.Label3)
        Me.GroupBox4.Controls.Add(Me.edHour)
        resources.ApplyResources(Me.GroupBox4, "GroupBox4")
        Me.GroupBox4.Name = "GroupBox4"
        '
        'edMin
        '
        resources.ApplyResources(Me.edMin, "edMin")
        Me.edMin.Maximum = New Decimal(New Integer() {59, 0, 0, 0})
        Me.edMin.Name = "edMin"
        '
        'Label3
        '
        resources.ApplyResources(Me.Label3, "Label3")
        Me.Label3.Name = "Label3"
        '
        'edHour
        '
        resources.ApplyResources(Me.edHour, "edHour")
        Me.edHour.Maximum = New Decimal(New Integer() {23, 0, 0, 0})
        Me.edHour.Name = "edHour"
        '
        'optTypeEveryday
        '
        resources.ApplyResources(Me.optTypeEveryday, "optTypeEveryday")
        Me.optTypeEveryday.Name = "optTypeEveryday"
        Me.optTypeEveryday.UseVisualStyleBackColor = True
        '
        'rctShape4
        '
        Me.rctShape4.BackColor = System.Drawing.Color.Orange
        resources.ApplyResources(Me.rctShape4, "rctShape4")
        Me.rctShape4.Name = "rctShape4"
        '
        'frmSetTime
        '
        resources.ApplyResources(Me, "$this")
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.Controls.Add(Me.GroupBox4)
        Me.Controls.Add(Me.optTypeEveryday)
        Me.Controls.Add(Me.rctShape4)
        Me.Controls.Add(Me.GroupBox3)
        Me.Controls.Add(Me.GroupBox2)
        Me.Controls.Add(Me.GroupBox1)
        Me.Controls.Add(Me.optTypeWeek)
        Me.Controls.Add(Me.optTypeIntarvel)
        Me.Controls.Add(Me.optTypeDate)
        Me.Controls.Add(Me.cmdOK)
        Me.Controls.Add(Me.rctShape1)
        Me.Controls.Add(Me.rctShape2)
        Me.Controls.Add(Me.rctShape3)
        Me.Name = "frmSetTime"
        Me.ShowIcon = False
        Me.GroupBox1.ResumeLayout(False)
        Me.GroupBox1.PerformLayout()
        CType(Me.wMin0, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wHour0, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wMin6, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wHour6, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wMin5, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wHour5, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wMin4, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wHour4, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wMin3, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wHour3, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wMin2, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wHour2, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wMin1, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.wHour1, System.ComponentModel.ISupportInitialize).EndInit()
        Me.GroupBox2.ResumeLayout(False)
        Me.GroupBox2.PerformLayout()
        CType(Me.dMin, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.dHour, System.ComponentModel.ISupportInitialize).EndInit()
        Me.GroupBox3.ResumeLayout(False)
        Me.GroupBox3.PerformLayout()
        CType(Me.inMin, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.inHour, System.ComponentModel.ISupportInitialize).EndInit()
        Me.GroupBox4.ResumeLayout(False)
        Me.GroupBox4.PerformLayout()
        CType(Me.edMin, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.edHour, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents cmdOK As System.Windows.Forms.Button
    Friend WithEvents optTypeDate As System.Windows.Forms.RadioButton
    Friend WithEvents optTypeIntarvel As System.Windows.Forms.RadioButton
    Friend WithEvents GroupBox1 As System.Windows.Forms.Panel
    Friend WithEvents wMin0 As System.Windows.Forms.NumericUpDown
    Friend WithEvents Label14 As System.Windows.Forms.Label
    Friend WithEvents wHour0 As System.Windows.Forms.NumericUpDown
    Friend WithEvents wMin6 As System.Windows.Forms.NumericUpDown
    Friend WithEvents Label12 As System.Windows.Forms.Label
    Friend WithEvents wHour6 As System.Windows.Forms.NumericUpDown
    Friend WithEvents wMin5 As System.Windows.Forms.NumericUpDown
    Friend WithEvents Label10 As System.Windows.Forms.Label
    Friend WithEvents wHour5 As System.Windows.Forms.NumericUpDown
    Friend WithEvents wMin4 As System.Windows.Forms.NumericUpDown
    Friend WithEvents Label8 As System.Windows.Forms.Label
    Friend WithEvents wHour4 As System.Windows.Forms.NumericUpDown
    Friend WithEvents wMin3 As System.Windows.Forms.NumericUpDown
    Friend WithEvents Label6 As System.Windows.Forms.Label
    Friend WithEvents wHour3 As System.Windows.Forms.NumericUpDown
    Friend WithEvents wMin2 As System.Windows.Forms.NumericUpDown
    Friend WithEvents Label4 As System.Windows.Forms.Label
    Friend WithEvents wHour2 As System.Windows.Forms.NumericUpDown
    Friend WithEvents wMin1 As System.Windows.Forms.NumericUpDown
    Friend WithEvents Label1 As System.Windows.Forms.Label
    Friend WithEvents wHour1 As System.Windows.Forms.NumericUpDown
    Friend WithEvents optTypeWeek As System.Windows.Forms.RadioButton
    Friend WithEvents CheckBox0 As SmartBackup.myCheckBox
    Friend WithEvents CheckBox6 As SmartBackup.myCheckBox
    Friend WithEvents CheckBox5 As SmartBackup.myCheckBox
    Friend WithEvents CheckBox4 As SmartBackup.myCheckBox
    Friend WithEvents CheckBox3 As SmartBackup.myCheckBox
    Friend WithEvents CheckBox2 As SmartBackup.myCheckBox
    Friend WithEvents CheckBox1 As SmartBackup.myCheckBox
    Friend WithEvents GroupBox2 As System.Windows.Forms.Panel
    Friend WithEvents dMin As System.Windows.Forms.NumericUpDown
    Friend WithEvents Label16 As System.Windows.Forms.Label
    Friend WithEvents dHour As System.Windows.Forms.NumericUpDown
    Friend WithEvents dDate As System.Windows.Forms.DateTimePicker
    Friend WithEvents GroupBox3 As System.Windows.Forms.Panel
    Friend WithEvents inMin As System.Windows.Forms.NumericUpDown
    Friend WithEvents Label18 As System.Windows.Forms.Label
    Friend WithEvents inHour As System.Windows.Forms.NumericUpDown
    Friend WithEvents Label2 As System.Windows.Forms.Label
    Friend WithEvents rctShape1 As System.Windows.Forms.Label
    Friend WithEvents rctShape2 As System.Windows.Forms.Label
    Friend WithEvents rctShape3 As System.Windows.Forms.Label
    Friend WithEvents GroupBox4 As System.Windows.Forms.Panel
    Friend WithEvents edMin As System.Windows.Forms.NumericUpDown
    Friend WithEvents Label3 As System.Windows.Forms.Label
    Friend WithEvents edHour As System.Windows.Forms.NumericUpDown
    Friend WithEvents optTypeEveryday As System.Windows.Forms.RadioButton
    Friend WithEvents rctShape4 As System.Windows.Forms.Label
End Class
