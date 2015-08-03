Imports System
Imports System.Collections.Generic
Imports System.Text
Imports System.ComponentModel
Imports System.Threading
Imports System.Windows.Forms
Imports System.Globalization

Public Class SetLanguageClass
    ''当需要切换语言时调用此过程
    'Private Sub changeLanguage(ByRef frm As Form, ByVal languageName As String)
    '    Dim setLng As New SetLanguageClass
    '    Try
    '        setLng.SetLanguage(languageName, frm)
    '        For Each frm As Form In Me.MdiChildren
    '            setLng.SetLanguage(languageName, frm)
    '        Next
    '    Catch ex As Exception
    '        Throw ex
    '    End Try
    'End Sub

    ''' <summary>
    ''' 改变程序当前使用的语言特性
    ''' </summary>
    ''' <param name="languageName">语言名称</param>
    ''' <param name="frm">Form类别</param>
    ''' <returns></returns>
    ''' <remarks></remarks>
    Public Function SetLanguage(ByVal languageName As String, ByVal frm As form) As Boolean
        Try
            '改变当前线程的UI资源文件
            Thread.CurrentThread.CurrentUICulture = CultureInfo.GetCultureInfo(languageName)
            '改变当前线程的资源文件
            Thread.CurrentThread.CurrentCulture = CultureInfo.GetCultureInfo(languageName)
            '创建一个资源管理器
            Dim res As ComponentResourceManager = New ComponentResourceManager(frm.GetType)
            '将资源文件的内容更新至表单上 $this在资源文件中表示窗体本身。
            res.ApplyResources(frm, "$this")

            '递归更新资源文件的内容到表单控件上
            ApplyResouce(frm, res)
            Return True
        Catch ex As Exception
            Return False
        End Try
    End Function


    ''' <summary>
    ''' 更新资源文件的内容到表单控件上
    ''' </summary>
    ''' <param name="control">要更新的控件</param>
    ''' <param name="res">资源文件管理器</param>
    ''' 
    Private Shared Sub ApplyResouce(ByVal control As Control, ByVal res As ComponentResourceManager)
        For Each c As Control In control.Controls
            res.ApplyResources(c, c.Name)
            ApplyResouce(c, res)
            If c.GetType().IsSubclassOf(GetType(ToolStrip)) Then
                For i = 0 To CType(c, ToolStrip).Items.Count - 1
                    ApplyResouce(CType(c, ToolStrip).Items(i), res)
                Next
            End If
            If c.GetType() = GetType(ToolStrip) Then
                For i = 0 To CType(c, ToolStrip).Items.Count - 1
                    ApplyResouce(CType(c, ToolStrip).Items(i), res)
                Next
            End If
            
        Next
    End Sub

    ''' <summary>
    ''' set language for toolstrip all child item
    ''' </summary>
    ''' <param name="toolstrip"></param>
    ''' <param name="resources"></param>
    Private Shared Sub ApplyResouce(ByVal toolstrip As ToolStrip, ByVal resources As ComponentResourceManager)
        If toolstrip.Items.Count > 0 Then
            For Each item As ToolStripItem In toolstrip.Items
                ApplyResouce(item, resources)
            Next
        End If
    End Sub

    ''' <summary>
    ''' 递归更新Menu的子菜单
    ''' </summary>
    ''' <param name="item"></param>
    ''' <param name="resources"></param>
    Private Shared Sub ApplyResouce(ByVal item As ToolStripItem, ByVal resources As ComponentResourceManager)

        resources.ApplyResources(item, item.Name)
        If (item.GetType.IsSubclassOf(GetType(ToolStripDropDownItem))) Or item.GetType() = GetType(ToolStrip) Then
            Dim ditem As ToolStripDropDownItem = CType(item, ToolStripDropDownItem)
            If ditem.DropDownItems.Count > 0 Then
                For Each sitem As ToolStripItem In ditem.DropDownItems
                    ApplyResouce(sitem, resources)
                Next
            End If
        End If
    End Sub

End Class
