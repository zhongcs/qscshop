<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>邀请好友</title>
		<link rel="stylesheet" type="text/css" href="/Public//Bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/public.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/myStyle.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/friend.css" />
		<link rel="stylesheet" type="text/css" href="/Public/css/bottomTap.css" />
		<script type="text/javascript" src="/Public/owl/js/jquery-1.8.3.min.js" ></script>
		<script type="text/javascript" src="/Public/js/jquery.qrcode.min.js" ></script>
		<script type="text/javascript">
		$(function(){
			 var str =$('#image').attr('sss');
				$('#code').qrcode({
					render: "table",
					width: 120,
					height:120,
					text: str
				});
		})
		
		
function toUtf8(str) {   
    var out, i, len, c;   
    out = "";   
    len = str.length;   
    for(i = 0; i < len; i++) {   
    	c = str.charCodeAt(i);   
    	if ((c >= 0x0001) && (c <= 0x007F)) {   
        	out += str.charAt(i);   
    	} else if (c > 0x07FF) {   
        	out += String.fromCharCode(0xE0 | ((c >> 12) & 0x0F));   
        	out += String.fromCharCode(0x80 | ((c >>  6) & 0x3F));   
        	out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));   
    	} else {   
        	out += String.fromCharCode(0xC0 | ((c >>  6) & 0x1F));   
        	out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));   
    	}   
    }   
    return out;   
}  
</script>
	</head>
	<body>
		<!--顶部标题-->
		<div class="nav text-center">
			<a href="#" onClick="javascript:history.back(-1);"><button type="button" class="mybtn pull-left back">
				<img src="/Public/img/list/right.png"/>
			</button></a>
			<span class="font17">邀请好友</span>
		</div>

		<!--顶部标题-->
		<div class="cont text-center">
		     
			<input type="hidden" id="image" sss="<?php echo ($qrcode['toPromote']); ?>" src="<?php echo ($qrcode['toPromote']); ?>"/>
			<div class="ewm center-block"  id="code">
			
			</div>
			<p class="mar-t10"> <a class="color-1a1a1a" href="#">www.7secai.cn</a></p>
		</div>
		<ul class="classify">
		<!--  1如果是公司内部销售 全部都展示 2.个人销售 前头2个 3.普通会员 前一个  企业销售 前两个 -->
		<?php if($usertype == 3): ?><li class="active" aaa="<?php echo ($qrcode['toPromote']); ?>">普通会员</li>
			<li aaa="<?php echo ($qrcode['reserve2']); ?>">个人销售 </li>
			<li aaa="<?php echo ($qrcode['erWeiMa']); ?>">企业销售</li>
			<?php elseif($usertype == 2): ?>
			<li class="active" aaa="<?php echo ($qrcode['toPromote']); ?>">普通会员</li>
			<li aaa="<?php echo ($qrcode['reserve2']); ?>">个人销售 </li>
			<?php elseif($usertype == 4): ?>
			<li class="active" aaa="<?php echo ($qrcode['toPromote']); ?>">普通会员</li>
			<li aaa="<?php echo ($qrcode['reserve2']); ?>">个人销售 </li>
			<?php elseif($usertype == 1): ?>
			<li class="active" aaa="<?php echo ($qrcode['toPromote']); ?>">普通会员</li>
				<?php elseif($usertype == 5): ?>
			<li class="active" aaa="<?php echo ($qrcode['toPromote']); ?>">普通会员</li>
				<?php elseif($usertype == 6): ?>
			<li class="active" aaa="<?php echo ($qrcode['toPromote']); ?>">普通会员</li>
			<?php else: endif; ?>
		</ul>
	</body>
	
	<script type="text/javascript">
		$('.classify li').click(function()
		{
			$('.classify li').removeClass('active');
			$(this).addClass('active');
		
					$("#code").empty();
					var str = toUtf8($(this).attr('aaa'));
				$("#code").qrcode({
					render: "table",
					width: 120,
					height:120,
					text: str
				});
		})
	</script>
</html>