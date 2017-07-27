<nav id="new-left-menu">
<link  rel="stylesheet" type="text/css" href="__STATIC__/mobile/assets/css/icons-extra.css" />
<div class="mask" id="menu-mask"></div>
<div class="menu-content">
<ul class="main-cat">
<volist name="cate_list" id="cate"> 
<li class="cat-item">
<a rel="external" href="{:U('index/cate/',array('cid'=>$cate['id']))}">
{$cate[name]}
<span class="arrow"></span>
</a>
</li>
</volist>
<li class="cat-item"></li>
<li class="cat-item"></li>
</ul>
</div>
</nav>

<div class="buy-wrapper top_line">
	<div class="nav-bar">
<section id="J_bottombar" class="group-nav">
	<ul class="nav-items J_nav-items">
				<li class="cat-item J_cat-item J_log" data-title="首页">
					<a href="{:C('yh_headerm_html')}"> 
						<div class="cat-desc"><i class="mui-icon mui-icon-home"></i><br />首页</div>
					</a>
				</li>
				<li class="cat-item J_cat-item J_log" data-title="九块九">
					<a href="{:U("jiu/index")}">
						<div class="cat-desc"><i class="mui-icon mui-icon-star"></i><br />9块9包邮</div>
					</a>
				</li>				
				<li class="cat-item J_cat-item J_log" data-title="二十">
					<a href="{:U("ershi/index")}">
						<div class="cat-desc"><i class="mui-icon-extra mui-icon-extra-trend"></i><br />20元封顶</div>
					</a>
				</li>
			</ul>
	</section>
	</div>
</div><div id="foot">
<div class="foot-copyright"></div><h2>Copyright © {:C('yh_site_name')}</h2>
</div>	
<div id="back_top" class="back_top">
	<a href="javascript:;" class="call-top" title="返回顶部"><i class="mui-icon-extra mui-icon-extra-top"></i></a>	
</div>

<style type="text/css">
/*foot start*/
#foot {
	width: 100%;
	position: relative;
	border-top: 1px solid rgba(255, 255, 255, 1);
	background:#fff;
	max-width: 640px;
	height: 50px;
    min-width: 320px;
    margin: 0px auto;
}
.foot-copyright:before {
	display: block;
	content: "";
	background-image: -webkit-gradient(radial, center center, 0, center center, 460, from(#b4b4b4), to(#efefef));
	background-image: -webkit-radial-gradient(circle, #b4b4b4, #efefef);
	background-image: -moz-radial-gradient(circle, #b4b4b4, #efefef);
	background-image: radial-gradient(circle, #b4b4b4, #efefef);
	background-repeat: no-repeat;
	height: 1px;
	width:90%;
	margin:0 auto;
	overflow: hidden;
}
.foot-nav {
	padding:10px 0 20px;
	line-height: 40px;
	position: relative;
}
.foot-nav a {
	color: #666;
	display: inline-block;
	font-size: 15px;
	height: 25px;
	line-height: 25px;
	margin: 0 auto;
	width: 32%;
	text-align: center;
	border-right:#ccc solid 1px;
	position:relative;
}
.foot-nav a:hover {
	text-decoration: none;
	color:#f8285c;
}
.foot-nav a img{height:18px;vertical-align:-3px;margin-right:5px;}
.foot-nav a .icon-tips{position:absolute;bottom:-16px;left:30%;z-index:10;height:auto;width:53px;}
#foot h2 {
	font-size: 12px;
	font-weight: 500;
	display: block;
	position: absolute;
	color: rgba(153, 153, 153, 1);
	background: #fff;
	top: 10px;
	left: 50%;
	padding: 0 4px;
	margin-left: -76px;
}
._border{border:none !important;}
.back_top {
	display:block;
	position:fixed; 
	width: 31px;
	right: 20px;
	bottom: 50px;
}
.back_top .call-top {
	background:#ff6e4f;
	width:31px;
	height:32px;
	display: block;
	margin-top: -32px;
	color: #fff;
	text-align: center;
	border-radius: 3px;
}
.back_top .call-top i{line-height: 32px;}
/*foot end*/
</style>
<script type="text/javascript" charset="utf-8">    $(document).ready(function () {
        var menu = $('#new-left-menu');
        var menuHeight = $('#menu-mask').height();
        var windowHeight = $(window).height();
        $(menu).find('.mask').css('height', (menuHeight > windowHeight ? menuHeight : windowHeight) + 'px');
        $(menu).find('.menu-content').css('height', (menuHeight > windowHeight ? menuHeight : windowHeight) + 'px');

        $(window).resize(function () {
            $(menu).find('.mask').css('height', (menuHeight > windowHeight ? menuHeight : windowHeight) + 'px');
            $(menu).find('.menu-content').css('height', (menuHeight > windowHeight ? menuHeight : windowHeight) + 'px');
        });

        $('.main-icon').click(function () {
            $(menu).css('z-index', 100);
            $(menu).addClass('opened-menu');
            $(menu).animate({left: 0},300);
        });
        $('#menu-mask').on('click',function () {
            $(menu).animate({left: -1 * $(window).width()},300,function(){
                $(menu).removeClass('opened-menu');
            });
        });
        $(window).scroll(function () {
            if ($(window).scrollTop() > 500) {
                $(".toTop").fadeIn(1500);
            }
            else {
                $(".toTop").fadeOut(1500);
            }
        });
    });
    jQuery(function($){
	var backTop=jQuery(".call-top");
	$(window).scroll(function(){
		if($(window).scrollTop()>150){
			backTop.css("display","block");
		}else{
			backTop.css("display","none");
		}
	})
	$('#back_top .call-top').click(function(){
		$('body,html').animate({scrollTop:0},500);
		return false;
	})
<if condition="C('yh_site_secret') eq '1'">
$(".scrollLoading").scrollLoading(); 
</if>
$('#back_top .call-top').click(function() {
	$('body,html').animate({ scrollTop: 0 }, 500);
	return false;
})
});

</script>
<div style="display:none;">{:C('yh_statistics_code')}</div>