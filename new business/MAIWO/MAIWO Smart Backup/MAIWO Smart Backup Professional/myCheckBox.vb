Public Class myCheckBox
    Private _Text As String
    Private _checked As Boolean

    Public Event CheckedChanged As EventHandler

    Public Property myText As String
        Get
            Return _Text
        End Get
        Set(ByVal value As String)
            _Text = value
            CheckBox1.Text = value
            Me.Width = CheckBox1.Width
        End Set
    End Property

    Public Property Checked As Boolean
        Get
            Return _checked
        End Get
        Set(ByVal value As Boolean)
            _checked = value
            rctCheck.Visible = value
            CheckBox1.Checked = value
            RaiseEvent CheckedChanged(Me, New System.EventArgs)
        End Set
    End Property

    Public Sub initMe(ByVal mText As String, ByVal mChecked As Boolean)
        _Text = mText
        _checked = mChecked
        RaiseEvent CheckedChanged(Me, New System.EventArgs)

        rctCheck.Visible = mChecked
    End Sub

    Private Sub rctCheck_Click_1(ByVal sender As System.Object, ByVal e As System.EventArgs)
        _checked = False
        CheckBox1.Checked = False
        rctCheck.Visible = False
    End Sub

    Public Sub CheckBox1_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckBox1.CheckedChanged
        If CheckBox1.Checked = True Then
            _checked = True
            rctCheck.Visible = True
        Else
            _checked = False
            rctCheck.Visible = False
        End If
        RaiseEvent CheckedChanged(Me, New System.EventArgs)
    End Sub

    Public Sub New()

        ' 此调用是设计器所必需的。
        InitializeComponent()

        ' 在 InitializeComponent() 调用之后添加任何初始化。
        rctCheck.Visible = False
    End Sub

End Class
