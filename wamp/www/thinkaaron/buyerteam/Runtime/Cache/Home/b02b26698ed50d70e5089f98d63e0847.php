<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

	<head>
	<link rel="shortcut icon" type="image/icon" href="./../../../HOMEPAGE/img/Globe.ico" >
	<META http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<META content="IE=11.0000" http-equiv="X-UA-Compatible">
	<SCRIPT src="./../../../HOMEPAGE/js/jquery-1.9.1.min.js" type="text/javascript"></SCRIPT>
	<SCRIPT src="./../../../HOMEPAGE/js/birdanimate.js" type="text/javascript"></SCRIPT>
	<META name="GENERATOR" content="MSHTML 11.00.9600.17496">
	<SCRIPT type="text/javascript">
	

	
	$(document).ready
	(
	function () 
	{
    $("input,select").bind("keydown", function (e) {
        if (e.keyCode == 13) {
            var allInputs = $("input,select");
            for (var i = 0; i < allInputs.length; i++) {
                if (allInputs[i] == this) {
                    while ((allInputs[i]).name == (allInputs[i + 1]).name) {
                        i++;
                    }

                    if ((i + 1) < allInputs.length) $(allInputs[i + 1]).focus();
                }
            }
        }
    });
	}
	);
	
	
	$(document).ready
	(
	function()
	{
	 $(".RAWPN").change
	 (
		 function()
		 {
		 var RAWPN1= $("#RAWPN").val();
		 var RAWPN2="<?php echo $output[0]['RAWPN']?>";
		 var RAWPN21="<?php echo $output1[0]['RAWPN']?>";
		 //alert(RAWPN21);
		 if(RAWPN1==RAWPN2||RAWPN1==RAWPN21)
			 {
			 $(this).css("background-color","#9ACD32");
			 }
		 else
			 {
			 $(this).css("background-color","#FF0000");
			 }
		 }
	 );
	 $(".COMPN").change
	 (
		 function()
		 {
		 var COMPN1= $("#COMPN").val();
		 var COMPN2="<?php echo $output[0]['COMPN']?>";
		 //alert(COMPN2);
		 if(COMPN1==COMPN2)
			 {
			 $(this).css("background-color","#9ACD32");
			 }
		 else
			 {
			 $(this).css("background-color","#FF0000");
			 }
		 }
	 );
	  $(".SCREWPN").change
	 (
		 function()
		 {
		 var SCREWPN1= $("#SCREWPN").val();
		 var SCREWPN2="<?php echo $output[0]['SCREWPN']?>";
		 if(SCREWPN1==SCREWPN2)
			 {
			 $(this).css("background-color","#9ACD32");
			 }
		 else
			 {
			 $(this).css("background-color","#FF0000");
			 }
		 }
	 );
	 
	}
	);
	
	
	</script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Engineering home</title>	
	</head>
	<body>
	
	<div id="container">
		<DIV class="top_div"></DIV>
		
			<DIV style="width: 165px; height: 96px; position: absolute;">
			<DIV class="tou"></DIV>
			<DIV class="initial_left_hand" id="left_hand"></DIV>
			<DIV class="initial_right_hand" id="right_hand"></DIV>
			</DIV>
			<br>
			<br>
			<br>
			<br>
			<div style="color:#36648b ;text-align:center;">
			<p><b><font size="5px">
			
			<?php
 if($output=='') { echo $output='请输入正确的KMAT PN#'; exit(); } else { echo "硬盘:".$RAWPN=$output[0]['RAWPN']; if($output1!='') { echo "|".$RAWPN1=$output1[0]['RAWPN']; } echo "<html>
			<body>
			<input type='text' class='RAWPN' id='RAWPN' name='RAWPN' style='background: rgb(0, 0, 0); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;' autofocus  onkeydown='keydown();' onEvent='nextField(this);' />
			</body>
			</html>"; ECHO '<BR>'; echo "标签:".$COMPN=$output[0]['COMPN']; ECHO "<html>
			<body>
			<input type='text' class='SCREWPN' id='SCREWPN' name='SCREWPN' style='background: rgb(0, 0, 0); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;' onkeydown='keydown();' />
			</body>
			</html>"; ECHO '<BR>'; echo "螺丝:".$SCREWPN=$output[0]['SCREWPN']; ECHO "<html>
			<body>
			<input type='text' class='SCREWPN' id='SCREWPN' name='SCREWPN' style='background: rgb(0, 0, 0); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;' onkeydown='keydown();' />
			</body>
			</html>"; ECHO '<BR>'; echo "支架:".$CARRIERPN=$output[0]['CARRIERPN']; ECHO "<html>
			<body>
			<input type='text' class='SCREWPN' id='SCREWPN' name='SCREWPN' style='background: rgb(0, 0, 0); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;' onkeydown='keydown();' />
			<br>
			<br>
			<img src='http://16.187.224.112:8080/thinkaaron/buyerteam/Home/View/Prekit1/pics/$CARRIERPN.jpg' height='90' width='160'/>
			<br>
			</body>
			</html>"; ECHO '<BR>'; echo "托盘:".$output[0]['HOLDERPN']; ECHO '<BR>'; ECHO '<BR>'; ECHO '<BR>'; } ?>
			</font></b></p>
			</div>
	</div>
	</body>
</html>