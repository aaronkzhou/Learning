Public Class frmSetFilter_Edit
    Public _classID As Integer

    Public Sub setLanguage()
        Select Case frmMain.NowLanguage
            Case "zh-Hans"
                Me.Text = "编辑扩展名列表"
                cmdAdd.Text = "添加"
                cmdAlter.Text = "修改"
                cmdDelete.Text = "删除"
                cmdSave.Text = "保存"
            Case "zh-Hant"
                Me.Text = "編輯擴展名列表"
                cmdAdd.Text = "添加"
                cmdAlter.Text = "修改"
                cmdDelete.Text = "刪除"
                cmdSave.Text = "保存"
            Case "en"
                Me.Text = "Edit Extension"
                cmdAdd.Text = "Add"
                cmdAlter.Text = "Change"
                cmdDelete.Text = "Delete"
                cmdSave.Text = "Save"
        End Select
    End Sub

    Private Sub frmSetFilter_Edit_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Dim strSer As String, arrSer() As String
        Dim _chk As myCheckBox

        FlowLayoutPanel1.Controls.Clear()

        strSer = frmMain.GetINI("filter", "classAll" & _classID, "")
        arrSer = Split(strSer, "|")

        If arrSer.Length = 1 And arrSer(0) = "" Then Exit Sub

        For i = 0 To arrSer.Length - 1
            If arrSer(i) <> "" Then
                _chk = New myCheckBox
                _chk.myText = arrSer(i)
                FlowLayoutPanel1.Controls.Add(_chk)
            End If
        Next
        _chk = Nothing

    End Sub

    Private Sub cmdAdd_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdAdd.Click
        Dim filterName As String
        Dim _chk As myCheckBox

        filterName = InputBox("请输入文件扩展名", "添加文件类型")

        If filterName = "" Then Exit Sub

        _chk = New myCheckBox
        _chk.myText = filterName
        FlowLayoutPanel1.Controls.Add(_chk)
    End Sub

    Private Sub cmdAlter_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdAlter.Click
        Dim filterName As String
        Dim _chk As myCheckBox
        Dim isOnly As Integer

        isOnly = 0
        For Each i In FlowLayoutPanel1.Controls
            If i.Checked Then
                _chk = i
                isOnly += 1
            End If
        Next

        If isOnly = 0 Then MsgBox("您还没有选择任何要修改改的！", vbCritical) : Exit Sub
        If isOnly > 1 Then MsgBox("每次只能修改一个扩展名，不能多选！", vbCritical) : Exit Sub

        filterName = InputBox("要将‘" & _chk.myText & "’文件扩展名修改为：", "修改文件类型")

        If filterName = "" Then Exit Sub

        _chk.myText = filterName
    End Sub

    Private Sub cmdDelete_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdDelete.Click
        Dim filterName As New String("")
        Dim _chk() As myCheckBox
        Dim _chkInFlp As myCheckBox
        Dim chkNum As Integer

        chkNum = -1
        For Each _chkInFlp In FlowLayoutPanel1.Controls
            If _chkInFlp.Checked Then
                chkNum += 1
                ReDim Preserve _chk(chkNum)
                _chk(chkNum) = _chkInFlp
                filterName &= _chkInFlp.myText & ";"
            End If
        Next

        filterName = Mid(filterName, 1, filterName.Length - 1)

        If MsgBox("您确定要将以下文件类型全部删除？" & vbCr & vbCr & filterName, vbQuestion + vbYesNo) = vbNo Then Exit Sub

        For i = 0 To _chk.Length - 1
            FlowLayoutPanel1.Controls.Remove(_chk(i))
        Next

    End Sub

    Private Sub cmdSave_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdSave.Click
        Dim _strSer As New String("")
        Dim _chk As myCheckBox

        For Each _chk In FlowLayoutPanel1.Controls
            _strSer &= _chk.myText & "|"
        Next

        _strSer = Mid(_strSer, 1, _strSer.Length - 1)

        frmMain.WriteINI("filter", "classAll" & _classID, _strSer)
        Me.Close()
    End Sub
End Class