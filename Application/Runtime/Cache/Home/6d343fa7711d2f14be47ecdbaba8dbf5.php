<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>提现</title>
		<link rel="stylesheet" type="text/css" href="/Public/Bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/public.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/myStyle.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/xgpasword1.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/bottomTap.css" />
		<link rel="stylesheet" type="text/css" href="/Public/layer/need/layer.css"/>
		<script type="text/javascript" src="/Public/layer/layer.js" ></script>
		<script type="text/javascript" src="/Public/owl/js/jquery-1.8.3.min.js" ></script>
	</head>

	<body>
		<!--顶部标题-->
		<div class="nav text-center">
			<a href="#" onClick="javascript:history.back(-1);"><button type="button" class="mybtn pull-left back">
				<img src="/Public/img/list/right.png"/>
			</button></a>
			<span class="font17">提现</span>
		</div>

		<!--顶部标题-->
		<div class="container-fluid cont">
			<div class="row bg-fff">
				<div class="col-xs-12 pad-up15 bor-b-f2">
					<span class="font15 color-333">银行卡名称</span>
					<input type="text" id="bankname" class="inp" />
				</div>
				<div class="col-xs-12 pad-up15 bor-b-f2">
					<span class="font15 color-333">持卡人</span>
					<input type="text" id="username" class="inp" />
				</div>
				<div class="col-xs-12 pad-up15">
					<span class="font15 color-333">银行卡号</span>
					<input type="text" id="banknumber" class="inp" />
				</div>
			</div>
			<div class="row mar-t15">
				<div class="col-xs-12 pad-up15 bg-fff">
					<span class="font15 color-333">提现金额</span>
					<input type="text" id="money" class="inp" />
				</div>
				<div class="col-xs-12">
					<p class="font12 mar-t5">余额：<?php echo ($res); ?> <span class="disply-ib mar-l5 color-972030">*只能提现100的倍数</span></p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 mar-t50 padd_0">
			<button type="button" class="btn-block pad-up10  font17 bg-669900 no-bor" id="applymoney" >24小时内到账，确认提现</button>
		</div>
	</body>
<script type="text/javascript">
		$(function(){	
			  $("#applymoney").click(function(){  
				  
				  var username=$("#username").val();
				  var bankname=$("#bankname").val();
			         var banknumber=$("#banknumber").val();                             
			         var money=$("#money").val();    
			         var reg = /^\d{16}|\d{19}$/; 
			         
			          if(bankname=="")
		        	 {
		        	 layer.open({
		        		    content: '银行名称不能为空'
		        		    ,skin: 'msg'
		        		    ,time: 3 //3秒后自动关闭
		        		  });
		             $("#bankname").focus();
		             return false;
		        	 }
			          else  if(username==""){
				             layer.open({
				        		    content: '持卡人姓名不能为空'
				        		    ,skin: 'msg'
				        		    ,time: 3 //3秒后自动关闭
				        		  });
				             $("#username").focus();
				             return false;
				         }
			         else if(banknumber=="")
			        	 {
			        	 layer.open({
			        		    content: '银行卡号不能为空'
			        		    ,skin: 'msg'
			        		    ,time: 3 //3秒后自动关闭
			        		  });
			             $("#banknumber").focus();
			             return false;
			        	 }
			       
			         else if(money=="")
		        	 {
		        	 layer.open({
		        		    content: '提现金额不能为空'
		        		    ,skin: 'msg'
		        		    ,time: 3 //3秒后自动关闭
		        		  });
		             $("#money").focus();
		             return false;
		        	 }
			         
			        
			        
			         else if(reg.test(banknumber) === false)
                   	 {
                         layer.open({
			        		    content: '银行卡号输入格式不对，请重新输入！'
			        		    ,skin: 'msg'
			        		    ,time: 3 //3秒后自动关闭
			        		  });
			             $("#banknumber").focus();
			             return false;
                   	 }
			         else{
			             var url = "<?php echo U('user/applybankmoney');?>";
			             $.post(url, {username:username,bankname:bankname,banknumber:banknumber,money:money}, function(msg){
			             if(msg.state=='200'){
			              //window.location.href = msg.url;
			            	 layer.open({
				        		    content: msg.msg
				        		    ,skin: 'msg'
				        		    ,time: 3 //3秒后自动关闭
				        		  });
			             } 
			             else if(msg.state!='200'){
			            	// alert(msg.msg);
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
</html>