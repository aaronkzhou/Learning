<!DOCTYPE html>

<html>
	
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- 新 Bootstrap 核心文件 -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../HOMEPAGE/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../HOMEPAGE/js/bootstrap.min.js">
	<!-- 新 Bootstrap 核心文件 -->
	<link rel="stylesheet" href="../../HOMEPAGE/css/bird.css" type="text/css" />
	<META name="GENERATOR" content="MSHTML 11.00.9600.17496">
	<META content="IE=11.0000" http-equiv="X-UA-Compatible">
    <script src="../../HOMEPAGE/js/bootstrap.min.js"></script>
	<script src="../../HOMEPAGE/js/jquery.min.js"></script>
	</head>
	<body> 
	<div id="container">
	<DIV class="top_div"></DIV>
	<DIV style="background: rgb(255, 255, 255); margin: -525px auto auto; border: 1px solid rgb(231, 231, 231); border-image: none; width: 400px; height: 460px; text-align: center;">
		<form action="http://16.187.224.112:8080/thinkaaron/indexbuyer.php/home/prekit1/prekit2" method="post">
		
		
			<P style="padding: 30px 0px 10px; position: relative;">        
				<INPUT class="ipt" id="KEYPN" name="KEYPN" type="text/css" placeholder="KMAT PN#" value=""> 
			</P>
			
							
			<DIV style="height: 50px; line-height: 50px; margin-top: 10px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
				<P style="margin: 0px 35px 20px 45px;">
				
					<SPAN style="float: middle;">
					<br>
						<input style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;" type="submit" name="query" value="根据KMAT PART查询"/>
						<!--<button type="button" class="btn btn-primary btn-sm" onclick="clickRlease()" >release</button>-->
					</SPAN>
					
				</P>
			</DIV>
			<div class="container" style="padding: 100px 50px 10px;" >		
			</DIV>
		</form>
		
	</div>	
    </div>
   
	<div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Non Closed Local Patch Found:</h4>
					<hr>
					<div class="modal-body">
						<div class="model_content" ></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">hold release</button>
						<button type="button" class="btn btn-danger" onclick="opennRelease()">keep CR open & release</button>
						<button type="button" class="btn btn-success" onclick="closenRelease()">close CR & release</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	</body>
	
	<script type="text/javascript">

    function clickRlease()
    {
		document.write("<h1>I just want to test it</h1>");
		
        debugger;
        $.ajax
		(
		{
            type : "post",
            url: "http://16.187.224.28:8081/prod/hp.php/Home/Diags/checkLocalPatch",
            data: 
			{
                p: $('#p').val()
            },
            async : false,
			
            success : function(result)
            {
                debugger;
                if(result.clean==true)
                {
                    var p=$('#p').val();
                    var ver=$('#ver').val();
                    var relTo=$('#relTo').val();
                    window.location.href='http://16.187.224.28:8081/prod/hp.php/Home/Diags/upgrade/ver/'+ver+'/p/'+p+'/relTo/'+relTo;
                }
                else
				{
                    debugger;
                    var info="";
                    for(var i = 0; i < result.items.length;i++)
                    {
                        info=info+"<p>"+result.items[i].remusFailureMsg+"</p>";
						//document.write("<h1>I just want to test it</h1>");
						$('.model_content').html('<div class="alert alert-danger" role="alert">'+info+'</div>');
						$('#myModal').modal('show');
                    }
                }
            }
			
        }
		);
    }
	</script>


</html>
