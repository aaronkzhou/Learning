for HP warranty card p/n:5185-2694

Step 1:Run setup.exe to install the warranty card printing program,copy warrenty.ini to the install directory to cover the original file.

Step 2:Save cnlist2.mdb & productlist.mdb to the directory which is indicated by warrenty.ini 

Step 3:edit warrenty.ini as below
SNO=(N:not print s/n;Y:print s/n)
SHIPDATE=(N:not print ship date;Y:print ship date)

Step 4:Save productlist.mdb to the directory where the program installed

Step 5:Edit the date in below table of cnlist2.mdb

*保修方式
for example:
保修期限 -- 1，保修内容 -- 第一年送修，第二、三年备件更换
保修期限 -- 2，保修内容 -- 一年现场保修
(代号和内容可根据实际需要自定义)

*家族
for example:
产品名称 -- 彩色显示器，或磁带机，等
输出型号 -- P9006A  #AB2，C1100J #AKM,etc.(打印在保修卡上的产品型号)
保修期限 -- 根据上表（保修方式）定义



注：其他内容不需编辑