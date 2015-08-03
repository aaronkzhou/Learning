
Public Class frmSetFilter
    
    Public Sub setLanguage()
        '    Dim strArrZhs(6), strArrZht(6), strArrEn(6) As String

        '    strArrZhs(0) = "安装程序" : strArrZhs(1) = "音乐" : strArrZhs(2) = "图片" : strArrZhs(3) = "影片" : strArrZhs(4) = "文件" : strArrZhs(5) = "邮件" : strArrZhs(6) = "浏览器收藏"
        '    strArrZht(0) = "安裝程式" : strArrZht(1) = "音樂" : strArrZht(2) = "圖片" : strArrZht(3) = "影片" : strArrZht(4) = "文件" : strArrZht(5) = "郵件" : strArrZht(6) = "瀏覽器收藏"
        '    strArrEn(0) = "Setup" : strArrEn(1) = "Music" : strArrEn(2) = "Picture" : strArrEn(3) = "Movie" : strArrEn(4) = "File" : strArrEn(5) = "Mail" : strArrEn(6) = "Favorites"

        '    Dim _chk As myCheckBox
        '    Dim _lbl As Label
        '    Select Case frmMain.NowLanguage
        '        Case "zh-Hans"
        '            For i = 0 To 6
        '                _lbl = Me.Controls("Label" & i + 1)
        '                _lbl.Text = strArrZhs(i)

        '                _chk = Me.Controls("CheckClassAll" & i + 1)
        '                _chk.myText = "整栏"

        '                Me.Controls("cmdEdit" & i + 1).Text = "编辑"
        '            Next
        '            CheckBoxAll.myText = "全选"
        '            cmdSave.Text = "保存"
        '            Me.Text = "设定文件类型"
        '        Case "zh-Hant"
        '            For i = 0 To 6
        '                _lbl = Me.Controls("Label" & i + 1)
        '                _lbl.Text = strArrZht(i)

        '                _chk = Me.Controls("CheckClassAll" & i + 1)
        '                _chk.myText = "整欄"

        '                Me.Controls("cmdEdit" & i + 1).Text = "編輯"
        '            Next
        '            CheckBoxAll.myText = "全選"
        '            cmdSave.Text = "保存"
        '            Me.Text = "設定文件類型"
        '        Case "en"
        '            For i = 0 To 6
        '                _lbl = Me.Controls("Label" & i + 1)
        '                _lbl.Text = strArrEn(i)

        '                _chk = Me.Controls("CheckClassAll" & i + 1)
        '                _chk.myText = "All in column"

        '                Me.Controls("cmdEdit" & i + 1).Text = "Edit"
        '            Next
        '            CheckBoxAll.myText = "Select All"
        '            cmdSave.Text = "Save"
        '            Me.Text = "Set Extension"
        '    End Select
    End Sub

    Private Sub cmdSave_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdSave.Click
        Dim _str As New String("")
        Dim _strClass As New String("")
        Dim _strClassAll As New String("")
        Dim _sChkChecked As New String("")
        Dim _chk As myCheckBox, _flowLP As FlowLayoutPanel

        For i = 1 To 7
            '记录选择的类别
            _chk = Me.Controls("CheckBox" & i)
            If _chk.Checked Then _sChkChecked &= i & "|"

            _flowLP = Me.Controls("FlowLayoutPanel" & i)
            _strClassAll = ""
            _strClass = ""
            For Each _chk In _flowLP.Controls
                _strClassAll &= _chk.myText & "|"
                If _chk.Checked = True Then _strClass &= _chk.myText & "|"
            Next

            _str &= _strClass

            If _strClass.Length > 1 Then _strClass = Mid(_strClass, 1, _strClass.Length - 1)
            frmMain.WriteINI("filter", "class" & i, _strClass)
            If _strClassAll.Length > 1 Then _strClassAll = Mid(_strClassAll, 1, _strClassAll.Length - 1)
            frmMain.WriteINI("filter", "classAll" & i, _strClassAll)
        Next

        If _sChkChecked.Length > 1 Then _sChkChecked = Mid(_sChkChecked, 1, _sChkChecked.Length - 1)
        frmMain.WriteINI("filter", "classChecked", _sChkChecked)

        If _str.Length > 1 Then _str = Mid(_str, 1, _str.Length - 1)
        frmMain.FileFilter = _str
        Me.Close()
    End Sub

    Public Function getStrFilter() As String
        '将所有类别选择的文件类型汇总为一个字符串
        Dim _str As New String("")
        Dim _chk As myCheckBox, _flowLP As FlowLayoutPanel

        For i = 1 To 7
            _flowLP = Me.Controls("FlowLayoutPanel" & i)
            For Each _chk In _flowLP.Controls
                If _chk.Checked = True Then _str &= _chk.myText & "|"
            Next
        Next

        '去掉字符串最后一个“|”符号
        If _str.Length > 1 Then _str = Mid(_str, 1, _str.Length - 1)

        getStrFilter = _str
    End Function

    Public Sub AddFilter(ByVal filterName As String, ByVal ClassID As Integer)
        Dim _chk As myCheckBox, _flowLP As FlowLayoutPanel

        _chk = New myCheckBox
        _chk.myText = filterName

        _flowLP = Me.Controls("FlowLayoutPanel" & ClassID)
        _flowLP.Controls.Add(_chk)

        _chk = Nothing
    End Sub

    Public Sub initFilterForm()
        Dim _chkBox As myCheckBox
        Dim arrChk() As String

        '如果某类列表为空，则向INI文件写入该类默认文件类型
        If frmMain.GetINI("filter", "classAll" & 1, "") = "" Then frmMain.WriteINI("filter", "classAll" & 1, "exe|iso|msi")
        If frmMain.GetINI("filter", "classAll" & 2, "") = "" Then frmMain.WriteINI("filter", "classAll" & 2, "aif|aiff|au|mp1|mp2|mp3|asx|m3u|pls|mlv|mpe|mpeg|mpg|mpv|mpa|ra|rm|ram|snd|wav|voc|ins|cda|cmf|mid|rmi|rcp|rc|mod|s3m|xm|mtm|far|kar|it")
        If frmMain.GetINI("filter", "classAll" & 3, "") = "" Then frmMain.WriteINI("filter", "classAll" & 3, "bmp|jpg|jpeg|png|gif|pcx|tiff|tga|exif|fpx|svg|psd|cdr|pcd|dxf|ufo|eps|hdri|ai|raw")
        If frmMain.GetINI("filter", "classAll" & 4, "") = "" Then frmMain.WriteINI("filter", "classAll" & 4, "avi|rmvb|rm|asf|divx|mpg|mpeg|mpe|wmv|mp4|mkv|vob|dat|mov|navi|3gp|real|video")
        If frmMain.GetINI("filter", "classAll" & 5, "") = "" Then frmMain.WriteINI("filter", "classAll" & 5, "txt|doc|docx|xls|xlsx|ppt|pptx|pdf")
        'If frmMain.GetINI("filter", "classAll" & 6, "") = "" Then frmMain.WriteINI("filter", "classAll" & 6, "")
        'If frmMain.GetINI("filter", "classAll" & 7, "") = "" Then frmMain.WriteINI("filter", "classAll" & 7, "")

        '加载已选类别
        arrChk = Split(frmMain.GetINI("filter", "classChecked", ""), "|")
        For i = 1 To 7
            _chkBox = Me.Controls("CheckBox" & i)
            _chkBox.Checked = False
        Next
        For i = 0 To arrChk.Length - 1
            If arrChk(i) <> "" Then
                _chkBox = Me.Controls("CheckBox" & arrChk(i).ToString)
                _chkBox.Checked = True
            End If
        Next

        '加载每一类别
        Dim _flowLP As FlowLayoutPanel
        '加载每类中的所有扩展名，创建CheckBox控件组
        For i = 1 To 7
            arrChk = Split(frmMain.GetINI("filter", "classAll" & i, ""), "|")
            For j = 0 To arrChk.Length - 1
                If arrChk(j).ToString <> "" Then
                    _chkBox = New myCheckBox()
                    _chkBox.Name = "chkC" & i & "F" & arrChk(j).ToString
                    _chkBox.myText = arrChk(j).ToString

                    _flowLP = Me.Controls("FlowLayoutPanel" & i)
                    _flowLP.Controls.Add(_chkBox)
                End If
            Next
        Next
        _chkBox = Nothing
        '加载每类中选择的扩展名
        For i = 1 To 7
            arrChk = Split(frmMain.GetINI("filter", "class" & i, ""), "|")
            _flowLP = Me.Controls("FlowLayoutPanel" & i)
            For j = 0 To arrChk.Length - 1
                If arrChk(j).ToString <> "" Then
                    If _flowLP.Controls("chkC" & i & "F" & arrChk(j).ToString) IsNot Nothing Then
                        _chkBox = _flowLP.Controls("chkC" & i & "F" & arrChk(j).ToString)
                        _chkBox.Checked = True
                    End If
                End If
            Next
        Next
    End Sub


    Private Sub CheckBoxClass_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckBox1.CheckedChanged, CheckBox2.CheckedChanged, CheckBox3.CheckedChanged, CheckBox4.CheckedChanged, CheckBox5.CheckedChanged, CheckBox6.CheckedChanged, CheckBox7.CheckedChanged
        Dim _chk As myCheckBox

        If Me.Controls.Count = 0 Then Exit Sub

        For i = 1 To 7
            _chk = Me.Controls("CheckBox" & i)
            If _chk.Checked Then
                Me.Controls("rctShape" & i).Visible = True
                Me.Controls("FlowLayoutPanel" & i).Enabled = True
                Me.Controls("CheckClassAll" & i).Enabled = True
            Else
                Me.Controls("rctShape" & i).Visible = False
                Me.Controls("FlowLayoutPanel" & i).Enabled = False
                Me.Controls("CheckClassAll" & i).Enabled = False
            End If
        Next

    End Sub

    Private Sub CheckBoxAll_CheckedChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles CheckBoxAll.CheckedChanged
        Dim _chk As myCheckBox

        If Me.Controls.Count = 0 Then Exit Sub

        For i = 1 To 7
            _chk = Me.Controls("CheckBox" & i)
            _chk.Checked = CheckBoxAll.Checked
        Next
    End Sub


    Private Sub CheckClassAll_CheckedChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles CheckClassAll1.CheckedChanged, CheckClassAll2.CheckedChanged, CheckClassAll3.CheckedChanged, CheckClassAll4.CheckedChanged, CheckClassAll5.CheckedChanged, CheckClassAll6.CheckedChanged, CheckClassAll7.CheckedChanged
        Dim myIndex As Integer, _chk As myCheckBox, isChecked As Boolean

        If Me.Controls.Count = 0 Then Exit Sub

        For i = 1 To 7
            If sender.Equals(Me.Controls("CheckClassAll" & i)) Then
                myIndex = i
                _chk = sender
                isChecked = _chk.Checked
                Exit For
            End If
        Next

        For Each _chk In Me.Controls("FlowLayoutPanel" & myIndex).Controls
            _chk.Checked = isChecked
        Next
    End Sub

    Private Sub cmdEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdEdit1.Click, cmdEdit2.Click, cmdEdit3.Click, cmdEdit4.Click, cmdEdit5.Click, cmdEdit6.Click, cmdEdit7.Click
        Dim _classID As Integer

        For i = 1 To 7
            If sender.Equals(Me.Controls("cmdEdit" & i)) = True Then
                frmSetFilter_Edit._classID = i
                _classID = i
                frmSetFilter_Edit.ShowDialog()
                Exit For
            End If
        Next

        '加载列表
        Dim _flowLP As FlowLayoutPanel
        Dim arrChk() As String
        Dim _chkBox As myCheckBox

        _flowLP = Me.Controls("FlowLayoutPanel" & _classID)
        arrChk = Split(frmMain.GetINI("filter", "classAll" & _classID, ""), "|")
        _flowLP.Controls.Clear() '清空当前已存在的控件列表

        '加载类别中的所有扩展名，创建CheckBox控件组
        For j = 0 To arrChk.Length - 1
            If arrChk(j).ToString <> "" Then
                _chkBox = New myCheckBox()
                _chkBox.Name = "chkC" & _classID & "F" & arrChk(j).ToString
                _chkBox.myText = arrChk(j).ToString
                _flowLP.Controls.Add(_chkBox)
            End If
        Next
        _chkBox = Nothing
        '加载类别中选择的扩展名
        Dim _serChk As New String("")
        arrChk = Split(frmMain.GetINI("filter", "class" & _classID, ""), "|")
        _flowLP = Me.Controls("FlowLayoutPanel" & _classID)
        For j = 0 To arrChk.Length - 1
            If arrChk(j).ToString <> "" Then
                If _flowLP.Controls("chkC" & _classID & "F" & arrChk(j).ToString) IsNot Nothing Then
                    _chkBox = _flowLP.Controls("chkC" & _classID & "F" & arrChk(j).ToString)
                    _chkBox.Checked = True
                    _serChk &= _chkBox.myText & "|"
                End If
            End If
        Next
        '更新选择内容
        If _serChk.Length > 0 Then
            _serChk = Mid(_serChk, 1, _serChk.Length - 1)
            frmMain.WriteINI("filter", "class" & _classID, _serChk)
        End If

    End Sub

    Private Sub frmSetFilter_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load

    End Sub
End Class


