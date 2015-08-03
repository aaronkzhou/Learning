Public Class Form1

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        Dim arrAsc(0 To 14) As Long

        Text1.Text = ""

        '注册码共15位数，由数字、大写字母、小写字母组成
        '程序先随机或计算出15个数字，数字范围在0~61之间
        '将计算出的15个数字还原为对应ASC码的数字或字母，其中0~9为数字，10~35为大写字母，36~61为小写字母

        Randomize()
        arrAsc(0) = Int((61 * Rnd()) + 1)
        arrAsc(3) = Int((61 * Rnd()) + 1)
        arrAsc(10) = Int((61 * Rnd()) + 1)
        arrAsc(14) = Int((61 * Rnd()) + 1)

        arrAsc(1) = (Math.Abs(arrAsc(0) * 5 - arrAsc(3) * 7 - arrAsc(10) * 2 - arrAsc(14) * 3) + 32) Mod 62
        arrAsc(2) = (Math.Abs(arrAsc(0) * 8 + arrAsc(1) * 4 + arrAsc(3) * 5 + arrAsc(10) * 9 + arrAsc(14) * 2) + 6) Mod 62
        arrAsc(4) = (Math.Abs(arrAsc(0) * 3 - arrAsc(1) * 5 + arrAsc(2) * 9 + arrAsc(3) * 6 - arrAsc(10) * 7 - arrAsc(14) * 3) + 27) Mod 62
        arrAsc(5) = (Math.Abs(arrAsc(0) * 8 - arrAsc(1) * 5 - arrAsc(2) * 7 + arrAsc(3) * 2 - arrAsc(4) * 5) + 56) Mod 62
        arrAsc(6) = (Math.Abs(arrAsc(0) * 9 + arrAsc(1) * 7 + arrAsc(2) * 9 - arrAsc(3) * 5 - arrAsc(4) * 8 + arrAsc(5) * 6) + 48) Mod 62
        arrAsc(7) = (Math.Abs(arrAsc(0) * 2 + arrAsc(1) * 6 - arrAsc(2) * 5 + arrAsc(3) * 3 - arrAsc(4) * 5 + arrAsc(5) * 6 - arrAsc(6) * 6) + 33) Mod 62
        arrAsc(8) = (Math.Abs(arrAsc(0) * 3 + arrAsc(1) * 3 - arrAsc(2) * 6 - arrAsc(3) * 9 - arrAsc(4) * 8 + arrAsc(5) * 7 + arrAsc(6) * 7 + arrAsc(7) * 6) + 56) Mod 62
        arrAsc(9) = (Math.Abs(arrAsc(0) * 8 + arrAsc(1) * 9 + arrAsc(2) * 3 + arrAsc(3) * 7 + arrAsc(4) * 4 - arrAsc(5) * 2 - arrAsc(6) * 3 - arrAsc(7) * 5 - arrAsc(8) * 7) + 49) Mod 62
        arrAsc(11) = (Math.Abs(arrAsc(0) * 6 - arrAsc(1) * 2 - arrAsc(2) * 5 - arrAsc(3) * 4 + arrAsc(4) * 9 - arrAsc(5) * 6 - arrAsc(6) * 8) + 60) Mod 62
        arrAsc(12) = (Math.Abs(arrAsc(0) * 6 + arrAsc(1) * 8 + arrAsc(2) * 9 - arrAsc(3) * 7 + arrAsc(4) * 5 - arrAsc(5) * 8 + arrAsc(6) * 9 + arrAsc(7) * 5 - arrAsc(8) * 2 + arrAsc(9) * 3 - arrAsc(10) * 2 + arrAsc(11) * 8) + 22) Mod 62
        arrAsc(13) = (Math.Abs(arrAsc(0) * 6 + arrAsc(1) * 7 + arrAsc(2) * 3 - arrAsc(3) * 2 + arrAsc(4) * 7 - arrAsc(5) * 9 + arrAsc(6) * 5 + arrAsc(7) * 6 - arrAsc(8) * 7 + arrAsc(9) * 2 + arrAsc(10) * 5 - arrAsc(11) * 6 + arrAsc(12) * 4 + arrAsc(14) * 3) + 9) Mod 62

        For i = 0 To 14
            If arrAsc(i) <= 9 Then
                arrAsc(i) = arrAsc(i) + 48
            ElseIf arrAsc(i) <= 35 Then
                arrAsc(i) = arrAsc(i) + 55
            Else
                arrAsc(i) = arrAsc(i) + 61
            End If
            Text1.Text = Text1.Text & Chr(arrAsc(i))
        Next

        TextBox1.Text = Mid(Text1.Text, 1, 5)
        TextBox2.Text = Mid(Text1.Text, 6, 5)
        TextBox3.Text = Mid(Text1.Text, 11, 5)
    End Sub
End Class
