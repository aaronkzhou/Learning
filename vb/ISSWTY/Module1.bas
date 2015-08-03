Attribute VB_Name = "Module1"
Option Explicit

Public today
Public p_sno, p_shipdate As String

Public mdbdir As String
Declare Function OSGetPrivateProfileString% Lib "Kernel32" Alias "GetPrivateProfileStringA" (ByVal AppName$, ByVal KeyName$, ByVal keydefault$, ByVal ReturnString$, ByVal NumBytes As Integer, ByVal filename$)
Declare Function OSWritePrivateProfileString% Lib "Kernel32" Alias "WritePrivateProfileStringA" (ByVal AppName$, ByVal KeyName$, ByVal keydefault$, ByVal filename$)

Function GetINIString$(ByVal section$, ByVal szItem$, ByVal szDefault$, ByVal filename$)
  
    Dim tmp As String
    Dim x As Integer
    tmp = String$(27048, 32)
    x = OSGetPrivateProfileString(section, szItem$, szDefault$, tmp, Len(tmp), filename)
    GetINIString = Mid$(tmp, 1, x)

End Function
