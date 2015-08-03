Imports System
Imports System.Collections
Imports System.ComponentModel
Imports System.Configuration.Install

' Set 'RunInstaller' attribute to true.
'<RunInstaller(True)> _
Public Class Installer1
    Inherits Installer

    Public Sub New()
        MyBase.New()

        '组件设计器需要此调用。
        InitializeComponent()

        '调用 InitializeComponent 后添加初始化代码

    End Sub

    Public Overrides Sub Install(ByVal stateSaver As System.Collections.IDictionary)
        MyBase.Install(stateSaver)
        Dim myFrm As New myRegForm
        myFrm.ShowDialog()

        If myFrm.isRegSuccess = False Then Throw New Exception("注册失败，取消安装！")
    End Sub

End Class
