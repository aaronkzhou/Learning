 <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用回车来进行切换功能</title>
<script language="javascript">
 function check()
 {

    //keyCode是event事件的属性,对应键盘上的按键,回车键是13,tab键是9,其它的如果不知道 ,查keyCode大全
  if(event.keyCode==13&&event.srcElement.type=="text")
  {

    //srcElement是触发事件的对象,type意思是什么类型
     event.keyCode=9;
  }
 }
 
 document.onkeydown=check;
</script>
</head>

<body>
<input name="" type="text" />
<input name="" type="text" />
<input name="" type="text" />
<input name="" type="text" />
<input name="" type="text" />
<input name="" type="text" />
<input name="" type="text" />
<input type="button" />
<input type="password" />
<img src='693569-003.jpg' height='90' width='160'></img>
</body>
</html>