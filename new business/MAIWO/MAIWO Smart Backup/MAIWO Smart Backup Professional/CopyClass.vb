Imports System.Threading
Imports System.IO

Public Class CopyClass
    '保留调用程序的窗体引用
    Private _clientApp As Form

    '创建映射到调用程序的CopyThreadMessage和CountThreadMessage过程的委托过程
    Private Delegate Sub CallClientCopy(ByVal ThreadName As String, ByVal FilesRemaining As Long, ByVal Message As String)
    Private Delegate Sub CallClientCount(ByVal ThreadName As String, ByVal TotalFiles As Long, ByVal TotalFolders As Long, ByVal Files As Long, ByVal Message As String)

    '创建复制和统计两个委托过程的对象
    Private _callClientCopy As CallClientCopy
    Private _callClientCount As CallClientCount

    '声明类的全局变量
    Private _firstTime As Boolean
    Private _arrFromPath() As String '源路径
    Private _arrToPath() As String   '目标路径
    Private _directories As Long
    Private _files As Long
    Private _copiedFiles As Long
    Private _totalFiles As Long
    Private _fileName As String
    Private _startDateTime As Date

    Private _strFilter As String '文件类型筛选字符串，用“|”分隔


    Private Property FirstTime() As Boolean
        Get
            Return _firstTime
        End Get
        Set(ByVal value As Boolean)
            _firstTime = value
        End Set
    End Property
    'Public Property FromPath() As String()
    '    Get
    '        Return _fromPath
    '    End Get
    '    Set(ByVal value As String)
    '        _fromPath = value
    '    End Set
    'End Property
    'Public Property ToPath() As String
    '    Get
    '        Return _toPath
    '    End Get
    '    Set(ByVal value As String)
    '        _toPath = value
    '    End Set
    'End Property
    Public Property StartDateTime() As Date
        Get
            Return _startDateTime
        End Get
        Set(ByVal value As Date)
            _startDateTime = value
        End Set
    End Property

    Public ReadOnly Property Directories() As Long
        Get
            Return _directories
        End Get
    End Property
    Public ReadOnly Property Files() As Long
        Get
            Return _files
        End Get
    End Property

    Public ReadOnly Property TotalFiles() As Long
        Get
            Return _totalFiles
        End Get
    End Property

    Public Sub New(ByRef ClientApp As frmMain, ByVal strFilter As String, ByVal arrFromPath As String(), ByVal arrToPath As String())

        '保存调用窗体和文件类别筛选
        _clientApp = ClientApp
        _strFilter = strFilter

        '创建委托对象实例
        _callClientCopy = AddressOf ClientApp.CopyThreadMessage
        _callClientCount = AddressOf ClientApp.CountThreadMessage

        _arrFromPath = arrFromPath
        _arrToPath = arrToPath
    End Sub

    Public Sub CopyFiles()
        '复制进程工作过程

        '命名进程
        If Thread.CurrentThread.Name = Nothing Then Thread.CurrentThread.Name = "Copy"

        For i = 0 To _arrFromPath.Length - 1
            Dim dir As New DirectoryInfo(_arrFromPath(i))
            Dim FSinfo As FileSystemInfo() = dir.GetFileSystemInfos

            '循环复制文件知道目录下所有文件复制完成
            ReallyCopyFiles(FSinfo, _arrFromPath(i), _arrFromPath(i), _arrToPath(i))
        Next


        '最后呼唤一次调换窗体
        CallClient(Thread.CurrentThread.Name, _copiedFiles, _totalFiles, _directories, "END")

    End Sub

    Private Sub ReallyCopyFiles(ByVal FSInfo As FileSystemInfo(), ByVal FromPath As String, ByVal taskFromPath As String, ByVal ToPath As String)
        If FSInfo Is Nothing Then
            Throw New ArgumentNullException("FSInfo")
        End If

        Dim Message As String

        '复制目标目录下的每个文件
        Dim i As FileSystemInfo
        For Each i In FSInfo

            Try

                If TypeOf i Is DirectoryInfo Then  '如果这是文件夹
                    Dim dInfo As DirectoryInfo = CType(i, DirectoryInfo)

                    ReallyCopyFiles(dInfo.GetFileSystemInfos(), i.FullName, taskFromPath, ToPath)

                ElseIf TypeOf i Is FileInfo Then  '如果这是文件
                    _fileName = i.FullName '保存完整的路径和文件名

                    Dim fi As New FileInfo(_fileName) ' Update status info on client

                    '如果不在文件类型筛选条件内则不备份
                    Dim arrFilter() As String, isInArr As Boolean
                    arrFilter = Split(_strFilter, "|")
                    If arrFilter.Length = 1 And arrFilter(0).ToString = "" Then
                        isInArr = True
                    Else
                        isInArr = False
                        For j = 0 To arrFilter.Length - 1
                            If LCase(fi.Extension) = "." & LCase(arrFilter(j).ToString) Then
                                isInArr = True
                            End If
                        Next
                    End If

                    If isInArr Then
                        '获取目标路径
                        Dim copypath As String = ToPath & Mid(_fileName, Len(taskFromPath) + 1, Len(_fileName) - Len(taskFromPath) - Len(i.Name))
                        Message = "正在备份: " & _fileName & " 大小：" & Decimal.Round(CDec(fi.Length / 1048576), 2) & "MB"

                        '如果目标路径不存在，则创建
                        If Not Directory.Exists(copypath) Then
                            Directory.CreateDirectory(copypath)
                        End If

                        ' 获取目标路径和文件名
                        Dim tofile As String = ToPath & Mid(_fileName, Len(taskFromPath) + 1)

                        ' 如果目标文件夹中已存在该文件且源文件与目标文件完全相同，则不需备份
                        Dim OkayToCopy As Boolean = True
                        If File.Exists(tofile) Then
                            If File.GetLastWriteTime(_fileName) = File.GetLastWriteTime(tofile) Then
                                OkayToCopy = False
                            End If
                        End If

                        If OkayToCopy = False Then Message = "无更新，不需备份" & _fileName & " 大小：" & Decimal.Round(CDec(fi.Length / 1048576), 2) & "MB"
                        CallClient(Thread.CurrentThread.Name, _copiedFiles, _totalFiles, _directories, Message)

                        ' 以覆盖方式复制文件
                        If OkayToCopy Then File.Copy(_fileName, tofile, True)

                        ' 复制文件数变量加1
                        _copiedFiles += 1
                    End If
                End If
            Catch ex As Exception
                ' 记录复制失败信息，程序继续向下进行
                Message = "复制失败: " & _fileName & "  " & ex.Message.ToString
                CallClient(Thread.CurrentThread.Name, _copiedFiles, _totalFiles, _directories, Message)
            End Try

        Next i

    End Sub

    Public Sub GetCountData()
        '统计线程工作过程

        ' 如果线程名不存在，则命名
        If Thread.CurrentThread.Name = Nothing Then Thread.CurrentThread.Name = "Count"

        For i = 0 To _arrFromPath.Length - 1
            Dim dir As New DirectoryInfo(_arrFromPath(i))
            Dim FSinfo As FileSystemInfo() = dir.GetFileSystemInfos

            '调用统计过程
            CountFiles(FSinfo)
        Next

        ' 保存总文件数
        _totalFiles = _files

        ' Send message to client form
        CallClient(Thread.CurrentThread.Name, _files, _totalFiles, _directories, "END")

    End Sub

    Private Sub CountFiles(ByVal FSInfo As FileSystemInfo())
        Static ShowCount As Long = 0

        If FSInfo Is Nothing Then
            Throw New ArgumentNullException("FSInfo")
        End If

        Dim i As FileSystemInfo
        For Each i In FSInfo

            Try
                If TypeOf i Is DirectoryInfo Then   '如果这是文件夹
                    _directories += 1   '文件夹数加1

                    Dim dInfo As DirectoryInfo = CType(i, DirectoryInfo)
                    '在此调用本过程以进入下级路径
                    CountFiles(dInfo.GetFileSystemInfos())
                ElseIf TypeOf i Is FileInfo Then    '如果这是文件
                    Dim arrFilter() As String, isInArr As Boolean

                    arrFilter = Split(_strFilter, "|")
                    If arrFilter.Length = 1 And arrFilter(0).ToString = "" Then
                        isInArr = True
                    Else
                        isInArr = False
                        For j = 0 To arrFilter.Length - 1
                            If LCase(i.Extension) = "." & LCase(arrFilter(j).ToString) Then
                                isInArr = True
                            End If
                        Next
                    End If

                    If isInArr Then _files += 1 '如果该文件在筛选范围内，文件数加1
                End If
            Catch ex As Exception
                frmMain.lstShow.Items.Add("失败: " & _fileName & "  " & ex.Message.ToString)
            End Try

        Next i

    End Sub

    Private Sub CallClient(ByVal ThreadName As String, ByVal Files As Long, ByVal TotalFiles As Long, ByVal Directories As Long, ByVal Message As String)

        If InStr(ThreadName, "Copy") <> 0 Then
            'Call the delegated method
            _clientApp.Invoke(_callClientCopy, ThreadName, Files, Message)
        ElseIf InStr(ThreadName, "Count") <> 0 Then
            'Call the delegated method
            _clientApp.Invoke(_callClientCount, ThreadName, Files, TotalFiles, Directories, Message)
        End If

        'Let the thread sleep before continuing so the client app will have time to be process (1 millisecond is enough)
        Thread.Sleep(1)
    End Sub

End Class