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
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/main.css">
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/person.css">
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/model.css">
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/jquery.jcrop.min.css">

	<script src="/hzaubbs/Public/front/js/jquery.min.js"></script>

	<script>
		jQuery(document).ready(function($){
			$('.change-head-img').click(function(){
			    $('.model-mask').fadeIn(100);
			    $('.model').slideDown(200);
			})
			$('.model-head .close').click(function(){
			    $('.model-mask').fadeOut(100);
			    $('.model').slideUp(200);
			})
		})
	</script>
	<style>
	    .error {
	        font-size: 18px;
	        font-weight:normal;
	        color: red;
	        margin-left:20px;
	        float:left;
	        line-height:50px;
	    }
	    label{width:60px;display: inline-block}
	    .info li{margin:10px 0}
	    
	</style>
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
		<div id="main">
			<section class="main-header edit">
				<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><img src="/hzaubbs/Public/upload/head-img/<?php echo ($user["img"]); ?>" alt="" class="head-img"/><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="edit-header">
					<h1>博勋 <i>个人资料</i> </h1>
					<a href="javascript:;" class="change-head-img">[更换头像]</a>
				</div>
			</section>

			<!-- 模态框 -->
			<div class="model">
			     <div class="model-head">
			          <a href="javascript:;" title="关闭" class="close">×</a>
			          <label for="image_file" class="choose-img"></a>选择图片</label>
			          <div class="error">注意：上传前，先截图</div> 
			          
			     </div>
			     <div class="model-form-div">
					<div class="demo">
		                <form id="upload_form" enctype="multipart/form-data" method="post" action="/hzaubbs/index.php/Home/Person/upload" onsubmit="return checkForm()">
		                    <!-- hidden crop params -->
		                    <input type="hidden" id="x1" name="x1"autocomplete="off" />
		                    <input type="hidden" id="y1" name="y1" autocomplete="off"/>
		                    <input type="hidden" id="x2" name="x2"autocomplete="off" />
		                    <input type="hidden" id="y2" name="y2"autocomplete="off" />
							 <!-- 隐藏文件上传框 label绑定 -->
		                    <input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" style="display:none;" />
		                    <!-- 图片预览 -->
		                    <div class="step2">
		                        <img id="preview" />
	                            <div class="info">
		                            <ul style="display:none;">
		                                <li><label>文件大小</label> <input type="text" id="filesize" name="filesize" class="input" autocomplete="off" /></li>
		                                <li><label>类型</label> <input type="text" id="filetype" name="filetype" class="input"autocomplete="off"/></li>
		                                <li><label>图像尺寸</label> <input type="text" id="filedim" name="filedim" class="input"autocomplete="off"/></li>
		                                <li><label>宽度</label> <input type="text" id="w" name="w" class="input"autocomplete="off"/></li>
		                                <li><label>高度</label> <input type="text" id="h" name="h" class="input"autocomplete="off"/></li>
		                            </ul>
	                        	</div>
		                        <input type="submit" value="上传" class="btn" id="submit-img" style="display:none;"/>
		                        <label for="submit-img" class="choose-img submit-conform" ></a>确定</label>
		                    </div>
		                </form>
		            </div>
			     </div>
			</div>
			<div class="model-mask"></div>
			<!-- 模态框 -->

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
				<form action="">
					<span><i>昵称</i><input type="text" name="nickname"></span>
					<span><i>生日</i><input type="date" name="birth"></span>
					<span><i>爱好</i><input type="text" name="habit"></span>
					<span id="city_china">
						<i>所在城市</i>
						<div class="city_china-div">
							<p>省份 <select class="province cxselect" disabled="disabled" name="province"></select></p>
							<p>城市 <select class="city cxselect" disabled="disabled" name="city"></select></p>
							<p>地区 <select class="area cxselect" disabled="disabled" name="area"></select></p>
						</div>
						
					</span>
					<span>
						<i>个性签名</i>
						<textarea name="word"></textarea>
					</span>
					<span>
						<i>个人介绍</i>
						<textarea name="introduce"></textarea>
					</span>
					<a href="javascript:;" class="submit">确定</a>
				</form>
			</section>
		</div>
		<!-- 尾部 -->
		<footer id="bottom-footer">
	<h1>&copy;2016 讨论区 <i>designed by</i> <a href="http://www.52feidian.com/" target="_blanket">沸点工作室</a></h1>
</footer>
	</div>


<script src="/hzaubbs/Public/front/js/city/jquery.cxselect.min.js"></script>

<script>
	$(".main-container-nav-ul > li").click(function(){
		var index=$(this).index();
		$(".main-container-article > article").eq(index).siblings("article").removeClass("show-article");
		$(".main-container-article > article").eq(index).addClass("show-article");
	})


	$.cxSelect.defaults.url = "/hzaubbs/Public/front/js/city/cityData.min.json";

	$('#city_china').cxSelect({
		selects: ['province', 'city', 'area']
	});

	$('#city_china_val').cxSelect({
		selects: ['province', 'city', 'area'],
		nodata: 'none'
	});

</script>
<script src="/hzaubbs/Public/front/js/jqueryforimg.js"></script>
<script src="/hzaubbs/Public/front/js/jquery.jcrop.min.js"></script>

<script src="/hzaubbs/Public/front/js/script.js"></script>
</body>
</html>