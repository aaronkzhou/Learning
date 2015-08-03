Public Class myRegForm
    Private _result As Boolean
    Public Property isRegSuccess As String
        Get
            isRegSuccess = _result
        End Get
        Set(ByVal value As String)

        End Set
    End Property
    Private Sub myRegForm_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load

    End Sub

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdOK.Click

        Dim serNum As String, arrStr(14) As String, arrAsc(14) As Long
        Dim _tempL As Long

        '如果某个单元格内注册码长度不符合要求则退出
        If TextBox1.Text.Length <> 5 Or TextBox2.Text.Length <> 5 Or TextBox3.Text.Length <> 5 Then GoTo toTheWrong

        serNum = TextBox1.Text & TextBox2.Text & TextBox3.Text

        For i = 0 To 14
            arrStr(i) = Mid(serNum, i + 1, 1)
            arrAsc(i) = Asc(arrStr(i))
            If arrAsc(i) < 48 Or arrAsc(i) > 122 Then
                GoTo toTheWrong
            ElseIf arrAsc(i) > 57 And arrAsc(i) < 65 Then
                GoTo toTheWrong
            ElseIf arrAsc(i) > 90 And arrAsc(i) < 97 Then
                GoTo toTheWrong
            End If

            If arrAsc(i) >= 48 And arrAsc(i) <= 57 Then     '如果是数字，将ASC码转化到0~9
                arrAsc(i) -= 48
            ElseIf arrAsc(i) >= 65 And arrAsc(i) <= 90 Then     '如果是大写字母，将ASC码转化到10~35
                arrAsc(i) -= 55
            ElseIf arrAsc(i) >= 97 And arrAsc(i) <= 122 Then     '如果是数字，将ASC码转化到36~63
                arrAsc(i) -= 61
            End If
        Next

        '分析注册码
        _tempL = (Math.Abs(arrAsc(0) * 5 - arrAsc(3) * 7 - arrAsc(10) * 2 - arrAsc(14) * 3) + 32) Mod 62
        If _tempL <> arrAsc(1) Then GoTo toTheWrong
        _tempL = (Math.Abs(arrAsc(0) * 8 + arrAsc(1) * 4 + arrAsc(3) * 5 + arrAsc(10) * 9 + +arrAsc(14) * 2) + 6) Mod 62
        If _tempL <> arrAsc(2) Then GoTo toTheWrong
        _tempL = (Math.Abs(arrAsc(0) * 3 - arrAsc(1) * 5 + arrAsc(2) * 9 + arrAsc(3) * 6 - arrAsc(10) * 7 - arrAsc(14) * 3) + 27) Mod 62
        If _tempL <> arrAsc(4) Then GoTo toTheWrong
        _tempL = (Math.Abs(arrAsc(0) * 8 - arrAsc(1) * 5 - arrAsc(2) * 7 + arrAsc(3) * 2 - arrAsc(4) * 5) + 56) Mod 62
        If _tempL <> arrAsc(5) Then GoTo toTheWrong
        _tempL = (Math.Abs(arrAsc(0) * 9 + arrAsc(1) * 7 + arrAsc(2) * 9 - arrAsc(3) * 5 - arrAsc(4) * 8 + arrAsc(5) * 6) + 48) Mod 62
        If _tempL <> arrAsc(6) Then GoTo toTheWrong
        _tempL = (Math.Abs(arrAsc(0) * 2 + arrAsc(1) * 6 - arrAsc(2) * 5 + arrAsc(3) * 3 - arrAsc(4) * 5 + arrAsc(5) * 6 - arrAsc(6) * 6) + 33) Mod 62
        If _tempL <> arrAsc(7) Then GoTo toTheWrong
        _tempL = (Math.Abs(arrAsc(0) * 3 + arrAsc(1) * 3 - arrAsc(2) * 6 - arrAsc(3) * 9 - arrAsc(4) * 8 + arrAsc(5) * 7 + arrAsc(6) * 7 + arrAsc(7) * 6) + 56) Mod 62
        If _tempL <> arrAsc(8) Then GoTo toTheWrong
        _tempL = (Math.Abs(arrAsc(0) * 8 + arrAsc(1) * 9 + arrAsc(2) * 3 + arrAsc(3) * 7 + arrAsc(4) * 4 - arrAsc(5) * 2 - arrAsc(6) * 3 - arrAsc(7) * 5 - arrAsc(8) * 7) + 49) Mod 62
        If _tempL <> arrAsc(9) Then GoTo toTheWrong
        _tempL = (Math.Abs(arrAsc(0) * 6 - arrAsc(1) * 2 - arrAsc(2) * 5 - arrAsc(3) * 4 + arrAsc(4) * 9 - arrAsc(5) * 6 - arrAsc(6) * 8) + 60) Mod 62
        If _tempL <> arrAsc(11) Then GoTo toTheWrong
        _tempL = (Math.Abs(arrAsc(0) * 6 + arrAsc(1) * 8 + arrAsc(2) * 9 - arrAsc(3) * 7 + arrAsc(4) * 5 - arrAsc(5) * 8 + arrAsc(6) * 9 + arrAsc(7) * 5 - arrAsc(8) * 2 + arrAsc(9) * 3 - arrAsc(10) * 2 + arrAsc(11) * 8) + 22) Mod 62
        If _tempL <> arrAsc(12) Then GoTo toTheWrong
        _tempL = (Math.Abs(arrAsc(0) * 6 + arrAsc(1) * 7 + arrAsc(2) * 3 - arrAsc(3) * 2 + arrAsc(4) * 7 - arrAsc(5) * 9 + arrAsc(6) * 5 + arrAsc(7) * 6 - arrAsc(8) * 7 + arrAsc(9) * 2 + arrAsc(10) * 5 - arrAsc(11) * 6 + arrAsc(12) * 4 + arrAsc(14) * 3) + 9) Mod 62
        If _tempL <> arrAsc(13) Then GoTo toTheWrong

        '将注册信息写入注册表
        Dim Key1, Key2, Key3 As Microsoft.Win32.RegistryKey
        Key1 = My.Computer.Registry.CurrentUser '返回当前用户键 
        Key2 = Key1.OpenSubKey("Software", True) '返回当前用户键下的Software键,如果想创建项，必须指定第二个参数为true  
        If Key2 Is Nothing Then Key2 = Key1.CreateSubKey("Software") '如果键不存在就创建它
        Key3 = Key2.OpenSubKey("MAIWO Smart Backup Professional", True)
        If Key3 Is Nothing Then Key3 = Key2.CreateSubKey("MAIWO Smart Backup Professional") '如果键不存在就创建它
        '设置项值
        ' user name:没用的项值，为了混淆视听，防止破译
        'Serial Number：注册码
        'ID:10位随机码，用于辨识是否成功注册。前两位表示真正两个的参数位置，真正参数为3和0.如前两位为5、7，则如果第五位是3、第七位是0则表示注册成功
        Randomize()
        Key3.SetValue("user name", CStr(Int(1000000000 * Rnd())))
        Key3.SetValue("Serial Number", serNum)

        Dim arrID(9) As Integer, strID As New String("")
        For i = 0 To 9
            Randomize()
            arrID(i) = Int(7 * Rnd() + 2)
        Next

        While arrID(1) = arrID(0)
            Randomize()
            arrID(1) = Int(7 * Rnd() + 2)
        End While

        arrID(arrID(0)) = 3
        arrID(arrID(1)) = 0

        For i = 0 To 9
            strID += CStr(arrID(i))
        Next
        Key3.SetValue("ID", strID)
        _result = True
        Me.Hide()
        Exit Sub

toTheWrong:
        If MsgBox("验证码错误！是否重试？" & vbCr & vbCr & "选择‘是’重新输入验证码；选择‘否’退出安装", vbCritical + +vbYesNo) = vbNo Then _result = False : Me.Hide()
    End Sub

    Private Sub cmdCancel_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdCancel.Click
        _result = False : Me.Hide()
    End Sub
End Class