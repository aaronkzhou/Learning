Public Class frmSetTime
    
    Public Sub setLanguage()
        Dim arrZh As String() = New String() {"星期一", "星期二", "星期三", "星期四", "星期五", "星期六", "星期日"}
        Dim arrEn As String() = New String() {"Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"}

        Select Case frmMain.NowLanguage
            Case "zh-Hans"
                optTypeWeek.Text = "按星期备份"
                optTypeDate.Text = "指定日期"
                optTypeIntarvel.Text = "按时间间隔"

                Label18.Text = "小时"
                Label2.Text = "分"

                Dim _chk As myCheckBox
                For i = 0 To 6
                    _chk = GroupBox1.Controls("CheckBox" & i + 1)
                    _chk.myText = arrZh(i)
                Next

                cmdOK.Text = "保存并关闭窗口"
                Me.Text = "时间设定"
            Case "zh-Hant"
                optTypeWeek.Text = "按星期備份"
                optTypeDate.Text = "指定日期"
                optTypeIntarvel.Text = "按時間間隔"

                Label18.Text = "小時"
                Label2.Text = "分"

                Dim _chk As myCheckBox
                For i = 0 To 6
                    _chk = GroupBox1.Controls("CheckBox" & i + 1)
                    _chk.myText = arrZh(i)
                Next

                cmdOK.Text = "保存并關閉窗口"
                Me.Text = "時間設定"
            Case "en"
                optTypeWeek.Text = "By Week"
                optTypeDate.Text = "By Date"
                optTypeIntarvel.Text = "By Intarval"

                Label18.Text = "Hours And"
                Label2.Text = "Minutes"

                Dim _chk As myCheckBox
                For i = 0 To 6
                    _chk = GroupBox1.Controls("CheckBox" & i + 1)
                    _chk.myText = arrEn(i)
                Next

                cmdOK.Text = "Save And Exit"
                Me.Text = "Set Timer"

        End Select
    End Sub


    Private Sub optType_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles optTypeDate.CheckedChanged, optTypeIntarvel.CheckedChanged
        GroupBox1.Enabled = False : rctShape1.Visible = False
        GroupBox2.Enabled = False : rctShape2.Visible = False
        GroupBox3.Enabled = False : rctShape3.Visible = False

        If optTypeWeek.Checked Then
            GroupBox1.Enabled = True : rctShape1.Visible = True
        ElseIf optTypeDate.Checked Then
            GroupBox2.Enabled = True : rctShape2.Visible = True
        Else
            GroupBox3.Enabled = True : rctShape3.Visible = True
        End If
    End Sub

    Private Sub cmdOK_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdOK.Click
        '写入INI文件
        Dim _str As New String("")
        If optTypeWeek.Checked Then
            Dim _chkBox As myCheckBox
            For i = 1 To 7
                _chkBox = GroupBox1.Controls("CheckBox" & i)
                If _chkBox.Checked Then
                    _str &= _chkBox.Tag & "," & GroupBox1.Controls("wHour" & i).Text & ":" & GroupBox1.Controls("wMin" & i).Text & "|"
                End If
            Next
            frmMain.WriteINI("time", "byWeek", _str)
            frmMain.WriteINI("time", "byDate", "")
            frmMain.WriteINI("time", "byIntarvel", "")

            frmMain.TimerType = "byWeek"
        ElseIf optTypeDate.Checked Then
            _str = dDate.Text & "," & dHour.Text & ":" & dMin.Text

            frmMain.WriteINI("time", "byWeek", "")
            frmMain.WriteINI("time", "byDate", _str)
            frmMain.WriteINI("time", "byIntarvel", "")

            frmMain.TimerType = "byDate"
        Else
            _str = inHour.Text & ":" & inMin.Text

            frmMain.WriteINI("time", "byWeek", "")
            frmMain.WriteINI("time", "byDate", "")
            frmMain.WriteINI("time", "byIntarvel", _str)

            frmMain.TimerType = "byIntarvel"
        End If

        frmMain.TimerSet = _str
        Me.Close()
    End Sub

    Private Sub frmSetTime_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load

    End Sub
End Class