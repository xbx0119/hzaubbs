<?php if (!defined('THINK_PATH')) exit();?><!-- 项目开始日期：2016-02-26  -->
<!-- 作者：黄一凡              -->
<!-- 版本：1.0                 -->
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<title>狮山讨论区</title>
	<link rel="stylesheet" href="/Public/front/css/basic.css">
	<link rel="stylesheet" href="/Public/front/css/main.css">
	<link rel="stylesheet" href="/Public/front/css/topic.css">
	<script src="/Public/front/js/jquery.min.js"></script>
</head>
<body>
	<div id="wrapper">
		<!-- 头部导航栏 -->
		<header id="tophead">
	<h1>狮山讨论区</h1>
	<nav id="top-nav">
		<ul id="top-nav-ul">
			<li><a href="/index.php/Home/Index/index">大厅</a></li>
			<li><a href="/index.php/Home/Index/forum">部落</a></li>
			<li><a href="javascript:history.go(-1);">返回</a></li>
			<li class="li-state douser"><a href="<?php echo ($nav["url"]); ?>" class="douser"><?php echo ($nav["state"]); ?> <?php echo ($nav["i"]); ?></a>
				<div id="loged"> 
					<span class="org_bot_cor"></span>
					<span class="emem"></span>
					<ul>
						<li><a href="/index.php/Home/Person/person">个人中心</a></li>
						<li><a href="">系统通知</a></li>
						<li><a href="/index.php/Home/Login/do_logout">退出登陆</a></li>
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
			<section class="content">
				<header class="content-header">发布主题<button class="letout" onclick="submit();">发布</button></header>
				<form action="/index.php/Home/Index/do_addtopic" id="add-topic" method="post">
					<span><i>主题名：</i><input type="text" name="topicname" id="topicname"></span>
					<span><i>类别：</i><input type="radio" value="一般贴" id="yiban" name="class"> <label for="yiban">一般贴</label> 　<input type="radio" value="悬赏贴" id="xuanshang" name="class"> <label for="xuanshang">悬赏贴</label></span>
					<span><i>内容：</i><textarea name="content"></textarea></span>
				</form>
				<footer class="content-footer"></footer>
			</section>
			<section class="information">
				
			</section>
			
		</div>
		<!-- 尾部 -->
		<footer id="bottom-footer">
	<h1>&copy;2016 讨论区 <i>designed by</i> <a href="http://www.52feidian.com/" target="_blanket">沸点工作室</a></h1>
</footer>
	</div>
	<script>
		function submit(){
			$str=$("#topicname").val();
			if($.trim($str)==""){
				alert("主题名不能为空！");
			}else if($("input:radio[name='class']:checked").val()==null){
				alert("请选择类别！");
			}else if($.trim($("textarea").val())==""){
				alert("请填写主题内容");
			}else{
				$("#add-topic").submit();
			}
		}
	</script>
</body>
</html>