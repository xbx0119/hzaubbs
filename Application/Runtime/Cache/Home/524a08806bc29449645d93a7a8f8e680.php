<?php if (!defined('THINK_PATH')) exit();?><!-- 项目开始日期：2016-02-26  -->
<!-- 作者：黄一凡              -->
<!-- 版本：1.0                 -->
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<title>讨论区</title>
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/basic.css">
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/login.css">
	<script src="/hzaubbs/Public/front/js/jquery.min.js"></script>
</head>
<body>
	<div id="wrapper">
		<!-- 头部导航栏 -->
		<header id="tophead">
	<h1>讨论区</h1>
	<nav id="top-nav">
		<ul id="top-nav-ul">
			<li><a href="/hzaubbs/index.php/Home/Index/index">大厅</a></li>
			<li><a href="/hzaubbs/index.php/Home/Index/forum">部落</a></li>
			<li><a href="javascript:history.go(-1);">返回</a></li>
			<li class="li-state douser"><a href="<?php echo ($nav["url"]); ?>" class="douser"><?php echo ($nav["state"]); ?> <?php echo ($nav["i"]); ?></a>
				<div id="loged"> 
					<span class="org_bot_cor"></span>
					<span class="emem"></span>
					<ul>
						<li><a href="/hzaubbs/index.php/Home/Person/person">个人中心</a></li>
						<li><a href="">系统通知</a></li>
						<li><a href="/hzaubbs/index.php/Home/Login/do_logout">退出登陆</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</nav>
	<button class="nav-button">
		<span></span>
		<span></span>
		<span></span>
	</button>
	<script>
		$(function(){
			$(".douser").click(function(){
				if("<?php echo ($nav["state"]); ?>"!="登陆"){
					if($("#loged").is(':hidden')){
						$("#loged").show();
					}else{
						$("#loged").hide();
					}
				}
			});
			$(document).not($('.douser')).click(function(){
				if($("#loged").is(':visible')){
					$("#loged").hide();
				}
				// alert("sadsa");
			});
			$('.douser').on("click", function(e) {
			    e.stopPropagation();
			});
			$(".nav-button").click(function(){
				if($("#top-nav").is(":hidden")){
					$(".nav-button").css("background","lightblue");
					$("#top-nav").slideDown("slow");
				}else{
					$("#top-nav").slideUp();
					$(".nav-button").css("background","#eee");
				}
				
			})
		})
	</script>
</header>
		<!-- 中间内容区 -->
		<div id="register">
			<section id="register-form">
				<h1>注册</h1>
				<form action="/hzaubbs/index.php/Home/Login/doregister" method="post" />
					<span><i>用户名</i><input type="text" name="username" id="username" /></span>
					<span><i>密码</i><input type="password" name="password" id="password" /></span>
					<span><i>确认密码</i><input type="password" id="confirm" /></span>
					<span><i>性别</i><input type="radio" name="sex" value="男" id="man" /><label for="man"> 男　</label><input type="radio" name="sex" value="女" id="woman" /><label for="woman"> 女</label><h6 id="sextip"></h6></span>
					<span><i>E-mail</i><input type="text" name="email" id="email"></span>
					<span><i>QQ</i><input type="text" name="qq" id="qq" /></span>
					<a href="javascript:register();" id="zhuce">注册</a>
				</form>
			</section>
		</div>
		<!-- 尾部 -->
		<footer id="bottom-footer">
	<h1>&copy;2016 讨论区 <i>designed by</i> <a href="http://www.52feidian.com/" target="_blanket">沸点工作室</a></h1>
</footer>
	</div>
<script>
	function register(){
		var result=true;
		for(var i=0;i<=5;i++){
			if(state[i]==false){
				result=false;
			}
		}
		if(result==true){
			$("form").submit();
		}
	} 
	function changecolor(){
		var color=true;
		for(var i=0;i<=5;i++){
			if(state[i]==false){
				color=false;
			}
		}
		if(color==true){
			// 填写正确，可以提交，变色
			$("#zhuce").css('background','#33aaee');
		}else{
			$("#zhuce").css('background','#ccc');
		}
	}
	var interval=setInterval("changecolor()",100);
		
</script>
<script>
	var state=new Array(false,false,false,false,false,false);
	$(function(){
		// start 用户名验证
		$("#username").focus(function(){
			$("#username").parent().find("h6").remove();
		});
		$("#username").blur(function(){
			$kind='username';

			$.post('/hzaubbs/index.php/Home/Login/check',{
				kind:$kind,
				value:$("#username").val()
			},function(result){
				if(result=='空'){
					state[0]=false;
					var txt="<h6>请填写用户名</h6>";
				}else if(result=='已注册'){
					state[0]=false;
					var txt="<h6>已注册，请换一个用户名吧</h6>";  
				}else{
					state[0]=true;
					var txt="<h6>✔</h6>"; 
				}
				$("#username").after(txt); 
			});

		}); 
		// end 用户名验证
		$("input[type=radio]").click(function(){
			state[3]=true;
			$("#sextip").html("✔");
		})
		// start 邮箱验证
		$("#email").focus(function(){
			$("#email").parent().find("h6").remove();
		});
		$("#email").blur(function(){
			$kind='email';

			$.post('/hzaubbs/index.php/Home/Login/check',{
				kind:$kind,
				value:$("#email").val()
			},function(result){
				if(result=="空"){
					state[4]=false;
					var txt="<h6>请填写邮箱</h6>";
				}else if(result=='已注册'){
					state[4]=false;
					var txt="<h6>此邮箱已注册，请更换邮箱或者找回密码</h6>";  
				}else{
					state[4]=true;
					var txt="<h6>✔</h6>"; 
				}
				$("#email").after(txt); 
			});

		}); 
		// end 邮箱验证
		// start 密码验证
		$("#password").focus(function(){
			$("#password").parent().find("h6").remove();
		});
		$("#password").blur(function(){
			if($("#password").val()==""){
				state[1]=false;
				var txt="<h6>请填写密码</h6>";
			}else{
				state[1]=true;
				var txt="<h6>✔</h6>"; 
			}
			$("#password").after(txt); 
		}); 
		$("#confirm").focus(function(){
			$("#confirm").parent().find("h6").remove();
		});
		$("#confirm").blur(function(){
			if($("#confirm").val()==""){
				state[2]=false;
				var txt="<h6>确认密码</h6>";
			}else if($("#password").val()!=$("#confirm").val()){
				state[2]=false;
				var txt="<h6>✘ 密码不一致</h6>";
			}else{
				state[2]=true;
				var txt="<h6>✔</h6>"; 
			}
			$("#confirm").after(txt); 
		});
		//start qq验证
		$("#qq").focus(function(){
			$("#qq").parent().find("h6").remove();
		});
		$("#qq").blur(function(){
			if($("#qq").val()==""){
				state[5]=false;
				var txt="<h6>请输入qq号</h6>";
			}else{
				state[5]=true;
				var txt="<h6>✔</h6>"; 
			}
			$("#qq").after(txt); 
		});

	})
</script>
</body>
</html>