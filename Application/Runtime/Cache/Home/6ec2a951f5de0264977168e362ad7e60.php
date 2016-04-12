<?php if (!defined('THINK_PATH')) exit();?><!-- 项目开始日期：2016-02-26  -->
<!-- 作者：黄一凡              -->
<!-- 版本：1.0                 -->
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<title>狮山讨论区</title>
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/basic.css">
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/main.css">
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/person.css">

	<script src="/hzaubbs/Public/front/js/jquery.min.js"></script>
</head>
<body>
	<div id="wrapper">
		<!-- 头部导航栏 -->
		<header id="tophead">
	<h1>狮山讨论区</h1>
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
		<div id="main">
			<section class="main-header edit">
				<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><img src="/hzaubbs/Public/upload/head-img/<?php echo ($user["img"]); ?>" alt="" class="head-img"/><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="edit-header">
					<h1>博勋 <i>修改密码</i> </h1>
				</div>
			</section>

			<section class="main-side">
				<section class="main-side-second">
					<h1>账号设置</h1>
					<div class="side-content">
						<span><a href="/hzaubbs/index.php/Home/Person/edit">编辑资料</a></span>
						<i>|</i>
						<span><a href="/hzaubbs/index.php/Home/Person/changepwd">修改密码</a></span>
						<!-- <span><a href="">其他其他</a></span>
						<i>|</i>
						<span><a href="">其他其他</a></span> -->
					</div>
				</section>
				<section class="main-side-second">
					<h1>部落信息</h1>
					<div class="side-content">
						<span><a href="/hzaubbs/index.php/Home/Person/myforum">我的部落</a></span>
						<i>|</i>
						<span><a href="/hzaubbs/index.php/Home/Person/createforum">创建部落</a></span>
						<!-- <span><a href="">其他其他</a></span>
						<i>|</i>
						<span><a href="">其他其他</a></span> -->
					</div>
				</section>
				
			</section>
			<section class="edit-content">
				<form>
					<span><i>密码</i><input type="password" name="oldpwd" id="oldpwd" placeholder="请填写旧密码"><h6></h6></span>
					<span><i>新密码</i><input type="password" name="newpwd" id="newpwd" placeholder="请填写新密码"><h6></h6></span>
					<span><i>确认新密码</i><input type="password" name="newpwd2" id="newpwd2" placeholder="请确认新密码"><h6></h6></span>
					
					<a href="javascript:;" class="submit" id="submit_password" onclick="submit()">确定</a>
				</form>
			</section>
		</div>
		<!-- 尾部 -->
		<footer id="bottom-footer">
	<h1>&copy;2016 讨论区 <i>designed by</i> <a href="http://www.52feidian.com/" target="_blanket">沸点工作室</a></h1>
</footer>
	</div>
<script>
	var flag=false;
	var time=setInterval(function(){

		$.post('/hzaubbs/index.php/Home/Person/changepwd_check',{
			kind:"oldpwd",
			value:$("#oldpwd").val()
		},function(txt){
			 $("#oldpwd").siblings('h6').html(txt);
		})

		$.post('/hzaubbs/index.php/Home/Person/changepwd_check',{
			kind:"newpwd",
			value:$("#newpwd").val()
		},function(txt){
			 $("#newpwd").siblings('h6').html(txt);
		})

		if($("#newpwd").val()==""||$("#newpwd").val()==null){

		}else{
			if($("#newpwd").val()!=$("#newpwd2").val()){
				$("#newpwd2").siblings('h6').html("密码不一致");
			}else{
				$("#newpwd2").siblings('h6').html("✔");
			}
		}

		var flag1=$("#oldpwd").siblings('h6').html();
		var flag2=$("#newpwd").siblings('h6').html();
		var flag3=$("#newpwd2").siblings('h6').html();
		if(flag1=="✔" && flag2=="✔" && flag3=="✔"){
			flag=true;
			$("#submit_password").css("background","#005CA2");
			$("#submit_password").css("color","gold");
		}else{
			flag=false;
			$("#submit_password").css("background","");
			$("#submit_password").css("color","");
		}
	},100);
			
	function submit(){
		if(flag==true){
			clearInterval(time);
			$.post('/hzaubbs/index.php/Home/Person/do_changepwd',{
				password:$("#newpwd").val()
			},function(){
				window.location.href="/hzaubbs/index.php/Home/Login/login";
			})
		}
		
	}
</script>
</body>
</html>