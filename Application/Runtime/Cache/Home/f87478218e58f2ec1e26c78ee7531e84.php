<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>修改密码</title>
		<link rel="stylesheet" type="text/css" href="/Public/Bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/public.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/myStyle.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/xgpasword.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/bottomTap.css" />
		<script type="text/javascript" src="/Public/owl/js/jquery-1.8.3.min.js" ></script>
		<link rel="stylesheet" type="text/css" href="/Public/layer/need/layer.css"/>
		<script type="text/javascript" src="/Public/layer/layer.js" ></script>
	</head>

	<body>
		<!--顶部标题-->
		<div class="nav text-center">
			<a href="#" onClick="javascript:history.back(-1);"><button type="button" class="mybtn pull-left back">
				<img src="/Public/img/list/right.png"/>
			</button></a>
			<span class="font17">修改密码</span>
		</div>

		<!--顶部标题-->
		<div class="container-fluid cont">
			<div class="row">
				<div class="col-xs-12 pad-up15 bg-f2f2f2">
					<span class="font15 color-333">旧密码：</span>
					<input type="password" id="oldpwd" class="inp" />
				</div>
				<div class="col-xs-12 pad-up15 bg-f2f2f2 mar-t15">
					<span class="font15 color-333">新密码：</span>
					<input type="password" id="newpwd" class="inp" />
				</div>
				<div class="col-xs-12 pad-up15 bg-f2f2f2 mar-t15">
					<span class="font15 color-333">确认新密码：</span>
					<input type="password" id="confirmpwd" class="inp" />
				</div>
			</div>
		</div>
		<div class="col-xs-12 mar-t50">
			<button id="savepwd" type="button" class="btn-block pad-up10 bor-radius5 color-fff font17 bg-669900 no-bor">完 &nbsp;成</button>
		</div>
		<script type="text/javascript">
		$(function(){	
			  $("#savepwd").click(function(){  
			         var oldPassword=$("#oldpwd").val();                             
			         var newPassword=$("#newpwd").val(); 
			         var confirmpwd=$("#confirmpwd").val();
			         if(oldPassword==""||newPassword==""||confirmpwd==""){
			             layer.open({
			        		    content: '不能为空,请输入!'
			        		    ,skin: 'msg'
			        		    ,time: 3 //3秒后自动关闭
			        		  });
			             $("#oldpwd").focus();
			             return false;
			         }
			         else if(oldPassword.length >6&&oldPassword.length<16)
			         {
			        	 layer.open({
			        		    content: '只能输入6-16位哦!'
			        		    ,skin: 'msg'
			        		    ,time: 3 //3秒后自动关闭
			        		  });
			             return false;
			         }
			         else if(confirmpwd!=newPassword)
			         {
			        	 layer.open({
			        		    content: '2次密码输入不一致！'
			        		    ,skin: 'msg'
			        		    ,time: 3 //3秒后自动关闭
			        		  });
			             return false;
			         }
			         else{
			             var url = "<?php echo U('user/doupdatepwd');?>";
			             $.post(url, {oldPassword:oldPassword,newPassword:newPassword}, function(msg){
			             if(msg.state =='200') {
			            	window.location.href = msg.url;
			             }
			             else if(msg.state == '400')
			             {
			            	 window.location.href ='/index.php/home/user/login';
			             }
			             else if(msg.state !='200'){
			            	 layer.open({
				        		    content: msg.msg
				        		    ,skin: 'msg'
				        		    ,time: 3 //3秒后自动关闭
				        		  });
			             }
			             else
			             {
			            	 layer.open({
				        		    content: msg.msg
				        		    ,skin: 'msg'
				        		    ,time: 3 //3秒后自动关闭
				        		  });
			             }
			           }, 'json').error(function(){
			        	   layer.open({
			        		    content: '网络连接错误，请稍后再试'
			        		    ,skin: 'msg'
			        		    ,time: 3 //3秒后自动关闭
			        		  });
			           });

			         }
			       })
			 
		  });
		</script>
	</body>

</html>