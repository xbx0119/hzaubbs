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
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/change-head-img.css">
	<script src="/hzaubbs/Public/front/js/jquery.min.js"></script>
	<script type="text/javascript" src="/hzaubbs/Public/front/js/cropbox.js"></script>
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
				<img src="/hzaubbs/Public/upload/head-img/hyf.jpg" alt="" class="head-img"/>
				<div class="edit-header">
					<h1>博勋 <i>个人资料</i> </h1>
					<a href="javascript:;" class="change-head-img">[更换头像]</a>
				</div>
			</section>

			<!-- 模态框 -->
			<div class="model">
			     <div class="model-head">
			          <a href="javascript:;" title="关闭" class="close">×</a>
			          <h3>更换头像</h3>
			     </div>
			     <div class="model-form-div">
	                <div class="img-container">
						<div class="imageBox">
						    <div class="thumbBox"></div>
						    <div class="spinner" style="display: none">Loading...</div>
						</div>
						
						<div class="cropped"></div>
						<div class="action"> 
						    <!-- <input type="file" id="file" style=" width: 200px">-->
						    <div class="new-contentarea tc"> 
						    	<a href="javascript:void(0)" class="upload-img">
						      		<label for="upload-file">上传图像</label>
						      	</a>
						      	<form action="/hzaubbs/index.php/Home/Person/changeimg" method="post" id="imgform">
						      		<input type="file" class="" name="upload-file" id="upload-file" />
						      	</form>
						      	
						    </div>
						    <input type="button" id="btnZoomOut" class="Btnsty_peyton" value="-" />
						    <input type="button" id="btnZoomIn" class="Btnsty_peyton" value="+"  />
						    <input type="button" id="btnCrop"  class="Btnsty_peyton" value="裁切" />
				  		</div>
					</div>
			     </div>
			</div>
			<div class="model-mask"></div>
			<!-- 模态框 -->

			<section class="main-side">
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
<script type="text/javascript">
	var imgurl="";
	function changeimg(){
		alert("change"); 	
		// alert($("#upload-file").value());
		// $("#imgform").submit();
		alert(imgurl);
	}
	$(window).load(function() {
		var options =
		{
			thumbBox: '.thumbBox',
			spinner: '.spinner',
			imgSrc: '/hzaubbs/Public/front/images/noimg.jpg'
		}
		var cropper = $('.imageBox').cropbox(options);
		$('#upload-file').on('change', function(){
			var reader = new FileReader();
			reader.onload = function(e) {
				options.imgSrc = e.target.result;
				cropper = $('.imageBox').cropbox(options);
			}
			reader.readAsDataURL(this.files[0]);
			this.files = [];
		})
		$('#btnCrop').on('click', function(){
			var img = cropper.getDataURL();
			imgurl=img;
			$('.cropped').html('');
			$('.cropped').append('<img src="'+img+'" align="absmiddle" style="width:80px;height:80px;margin-top:4px;box-shadow:0px 0px 12px #7E7E7E;" ><p></p>');
			// $('.cropped').append('<input type="flie'+'" name="'+'"headimg">');
			$('.cropped').append('<input type="button'+'" value="确定'+'" style="width:60px;height:30px;background:#F38E81;border:0px;border-radius:3px;margin-top:15px;color:#fff;'+'" onclick="'+'changeimg();" />');
		})
		$('#btnZoomIn').on('click', function(){
			cropper.zoomIn();
		})
		$('#btnZoomOut').on('click', function(){
			cropper.zoomOut();
		})
		
	});
		
</script>
</body>
</html>