<html class="am-touch js cssanimations">
	<head>
		<include file="public:top" />
	</head>
	<body>
		<script>
			function dangling(time, status) {
				if(status == 1) {
					$('.fq-custom').css('animation', 'myfirst 0.6s linear 1s infinite alternate');
				} else {
					$('.fq-custom').css('animation', 'none');
				}
				var t = setInterval(function() {
					if(status == 1) {
						dangling(1000, 0);
					} else {
						dangling(5000, 1);
					}
					clearInterval(t);
				}, time);
			}
			setTimeout(dangling(1000, 0), 4000);
		</script>
		<div class="safari_top" style="display: block;">
			<div class="tinymask am-padding-0 am-margin-0"></div>
			<div class="safari_img am-text-right" onclick="hidetip()">
				<img id="go_tip" src="__STATIC__/mobile/images/jump_coupon_ios.png" alt="">
				<div class="fq-text-white am-text-center am-text-sm" style="position:relative; top:-20px;">
					温馨提示：
					<br> 有【手机淘宝】的选择淘口令购买方式更方便哦~
				</div>
				<div class="fq-text-white am-text-center am-text-sm am-round">
					<span class="am-round am-padding-vertical-sm am-margin-top am-padding-horizontal am-inline-block more_coupon" style="background:rgba(254, 222, 20, 0.6);box-shadow: 0 0 0 11px rgba(254, 222, 20, 0.2);">查看更多优惠券</span>
				</div>
			</div>
		</div>
		<style>
			body {
				background: #f54d23;
			}
			
			.safari_img {
				z-index: 2000;
				position: fixed;
				top: 10px;
				right: 0;
				position: fixed;
				z-index: 2000;
			}
			
			.safari_img img {
				width: 100%;
				margin: 0px;
			}
			
			.tinymask {
				z-index: 2000;
				width: 100%;
				height: 100%;
				position: fixed;
				top: 0;
				left: 0;
				-webkit-tap-highlight-color: transparent;
			}
		</style>

		<script>
			//自动focus定时器初始化

			var timer0 = "";

			var timer1 = "";

			$(function() {
				var ua = navigator.userAgent.toLowerCase();

				if(ua.match(/iphone/i) == "iphone" || ua.match(/ipad/i) == "ipad") {

					$(".safari_top").css("display", "block");

					$("#go_tip").attr("src", "__STATIC__/mobile/images/jump_coupon_ios.png");

				} else {

					$(".safari_top").css("display", "block");

					$("#go_tip").attr("src", "__STATIC__/mobile/images/jump_coupon_android.png");

				}
			});
		</script>

		<script>
			$(document).ready(function(e) {
				//内部方法

				function is_weixin() {

					var ua = navigator.userAgent.toLowerCase();

					if(ua.match(/MicroMessenger/i) == "micromessenger") {
						return true;

					} else {

						return false;

					}

				}

				function is_ios() {

					var ua = navigator.userAgent.toLowerCase();

					if(ua.match(/iphone/i) == "iphone" || ua.match(/ipad/i) == "ipad") {

						return true;

					}

				}

				function openApp(url) {

					var tb_url = url.replace("http://", "").replace("https://", "");

					var ifr = document.createElement('iframe');

					ifr.src = 'taobao://' + tb_url;

					ifr.style.display = 'none';

					document.body.appendChild(ifr);

					window.location = url;

				}

				function openIphoneApp_ios_9(url) {

					var tb_url = url.replace("http://", "").replace("https://", "");

					window.location = "taobao://" + tb_url;

					window.setTimeout(function() { window.location = url; }, 4000)

				}
				//函数执行
				var isWeixin = is_weixin();
				if(isWeixin) {
					var is_ios = is_ios();
					if(is_ios) {
						$("#go_tip").attr("src", "__STATIC__/mobile/images/jump_coupon_ios.png");
					} else {
						$("#go_tip").attr("src", "__STATIC__/mobile/images/jump_coupon_android.png");
					}
				} else {
					var is_ios = is_ios();
					if(is_ios) {
						$("#go_tip").attr("src", "__STATIC__/mobile/images/jump_coupon_ios.png");
					} else {
						$("#go_tip").attr("src", "__STATIC__/mobile/images/jump_coupon_android.png");
					}
					$("body").html("<center style=\"margin-top: 10px;\">唤醒手机淘宝中...</center>");
					//只在有优惠券的时候执行
					var ua = navigator.userAgent.toLowerCase();
					if(ua.match(/iphone os 9/i) == "iphone os 9") {
						openIphoneApp_ios_9('{$quanurl}');
					} else {
						openApp('{$quanurl}');
					}

				}

			});
			$('.more_coupon').click(function() {
				window.location.href = '/';
			})
		</script>
	</body>

</html>