<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
		<?php echo (yh($yh)); ?>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title><?php echo ($page_seo["title"]); ?></title>
<meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" />
<meta name="description" content="<?php echo ($page_seo["description"]); ?>" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="/static/tuiquanke/css/all.css" />
<script type="text/javascript">
	var system ={win : false,mac : false,xll : false};
	var p = navigator.platform;
	system.win = p.indexOf("Win") == 0;
	system.mac = p.indexOf("Mac") == 0;
	system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
	var wapurl=window.location.pathname.replace(/index.php\//, "");
	 wapurl=wapurl.replace(/item/, "detail");
	if(system.win||system.mac||system.xll){}else{
	window.location.href="<?php echo C('yh_headerm_html');?>" + wapurl}
</script>
<?php echo C('yh_taojindian_html');?>

		<link rel="stylesheet" type="text/css" href="__STATIC__/tuiquanke/css/item.css">
		<script type="text/javascript" src="__STATIC__/tuiquanke/js/loimsg.js"></script>
	</head>
	<body>
		
<div id="navTop">
    <div id="top">
        <div id="topleft" style="margin: 0;line-height: 25px;"><?php echo C('yh_site_name');?>独家<strong>淘宝优惠券</strong>直播!每天万款内部优惠券免费领取、让您享受更多优惠！            
        </div>
        <ul id="topright" style="line-height: 25px;">
            <li style=" margin-right: 8px;"><a  href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('yh_qq');?>&site=qq&menu=yes" style="color: #757575">联系客服</a>
            </li>
            <li style="margin-right: 8px;"><a  href="javascript:;" id="btn_baoming" msg="请不要修改“卖家报名”否则将无法享受推券客免费产品服务">卖家报名</a>
            </li>

        </ul>
        <div class="clear"></div>
    </div>
</div>

<div id="headNav">
    <div id="header" style="padding-bottom: 10px;">
        <a href="<?php echo C('yh_site_url');?>"  title="<?php echo C('yh_site_name');?>"  style="height: 80px;display: inline-block;float: left;" class="cnzzCounter" >
           <img src="<?php echo C('yh_site_logo');?>" width="250" height="70" alt="<?php echo C('yh_site_name');?>淘宝优惠券网站">
        </a>
        <div id="showList">
            <div id="search">   <form id="query_form" method="get" action="__ROOT__/index.php">
                   <input type="hidden" name="m" value="index">
					<input type="hidden" name="a" value="so">
                    <input type="text" value="" name="k" id="k" autocomplete="off" placeholder="请输入您要查找的商品名称"/>
                    <button type="button" class="cnzzCounter" onclick="document.getElementById('query_form').submit()" data-cnzz-type="54" data-cnzz="1">搜索</button>
                </form>
            </div>
            <dl>
                <dt class="rg"></dt>
            </dl>
            <dl>
                <dt class="zy"></dt>
            </dl>
            <dl>
                <dt class="qc"></dt>
            </dl>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="baner">
    <div id="nav" style="font-size: 15px;">
        <a href="/" class="cnzzCounter iconM active" style="padding:8px 0px;width:240px; text-align: left;" data-cnzz-type="50" data-cnzz="0"><i class="iconfont">&#xe60d;</i><span style="padding-left: 80px; text-align: left;">今日新品</span></a>
         <?php $tag_nav_class = new navTag;$data = $tag_nav_class->lists(array('type'=>'lists','style'=>'main','cache'=>'0','return'=>'data',)); if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a class="cnzzCounter<?php if($nav_curr == $val['alias']): ?>iconM active<?php endif; ?> "  href="<?php echo ($val["link"]); ?>" style="padding:8px 15px;"  data-cnzz-type="51" data-cnzz="0"><?php echo ($val["name"]); ?>
	<?php if($val["target"] == 1): ?><div style="position:absolute; width:24px; height:32px; background:#FFCC00;margin-left: 107px; margin-top: -25px; background:url(__STATIC__/tuiquanke/images/HOTT_qeu.gif)"></div><?php endif; ?> </a><?php endforeach; endif; else: echo "" ;endif; ?>       
    </div>
</div>
<div style="clear: both;"></div>

		<div id="dtk_mian" style="background:#F9F9F9;">
			<div style="padding-top:1px; clear: both;"></div>
			<!--商品详细-->
			<div class="mains">
				<div class="piece jiu_goods">
					<div class="piece_box">
						<div class="jiu_bd jiu_top fl">
							<div class="item_containt">
								<div class="jiu_goodsinfo">
									<div class="goods_con" znid="101z3l">
										<div class="pic">
											<?php if($item["class"] == 'tag_wait' ): ?><a href="javascript:void()">
													<?php else: ?>
													<a isconvert="1" data-itemid="<?php echo ($item["num_iid"]); ?>" href="<?php echo U('/out/action/quan/',array('id'=>$item['id']));?>" rel='nofollow' target="_blank" title="<?php echo ($item["title"]); ?>"><?php endif; ?>
											<img src="<?php echo attach(get_thumb($item['pic_url'], '_b'),'item');?>_400x400" width="400px" height="400px">
											</a>
										</div>
										<div class="goods_detail">
											<?php if($item["class"] == 'tag_wait' ): ?><h3><a><?php echo ($item["title"]); ?></a></h3>
												<?php else: ?>
												<h3><a><?php echo ($item["title"]); ?></a></h3><?php endif; ?>
											<div class="desc"></div>

											<div class="item-like">
												<div class="price_tag"><i>￥</i><?php echo ($item["coupon_price"]); ?><span class="ori_price">￥<?php echo ($item["price"]); ?></span></div>
												<div class="volume_tag fr">已有 <strong><?php echo ($item["volume"]); ?></strong> 人在抢购该商品</div>
											</div>
											<dl class="item-last-time"> <dt>离优惠券失效还剩：</dt>
												<dd class="timer" id="end_date_0" data-time="<?php echo ($item["coupon_end_time"]); ?>"></dd>
											</dl>
											<div class="text-wrap">
												<?php if($item["isq"] == '1'): ?><span class="text-wrap-span">
													已领券<i><?php echo ($item["Quan_receive"]); ?></i>张，手慢无
													</span><?php endif; ?>
												<span>已有<i><?php echo ($item["volume"]); ?></i>人购买</span>
											</div>
											<div class="buy-step clearfix">
												<div class="buy-step-text">购买流程</div>
												<?php if($item["isq"] == '1'): ?><div class="buy-step-first">
														<span>
															<i>领内部券可省</i>
															<b _hover-ignore="1"><?php echo ($item["quan"]); ?>元</b>
														</span>
														<a rel="nofollow" class="coupon-btn" href="<?php echo U('/out/action/quan/',array('id'=>$item['id']));?>" target="_blank" title="领券后请点击右边按钮下单" _hover-ignore="1">点击领取</a>
													</div>
													<div class="double-arrow">
														<span style="margin-left: -12px;"></span>
													</div><?php endif; ?>
												<input type="hidden" id="Pid" value="<?php echo ($item["id"]); ?>" />
												<input type="hidden" id="up_time" value="<?php echo ($item["up_time"]); ?>" />
												<a  class="buy-step-sec buy-btn" rel="nofollow" href="<?php echo ($item["item_url"]); ?>" isconvert="1" data-itemid="<?php echo ($item["num_iid"]); ?>" target="_blank">去
													<?php if($item["shop_type"] == 'C' ): ?>淘宝
														<?php else: ?>天猫<?php endif; ?>下单</a>
											</div>

											<div style="width: 100%; clear: both; padding-top: 10px;"></div>
											<div class="shareto" style="clear: both; width: 95%;">
												如果您喜欢此宝贝，记得分享给您的朋友，一起享优惠。 【<label id="copy" data-clipboard-action="copy" data-clipboard-target="#bar" class="blue btn">复制优惠</label>】 【<label id="jubao" rel=<?php echo ($item["num_iid"]); ?> class="blue">举报违规</label>】
												<div class="sharebaidu">
													<div class="bshare-custom">
														<a title="分享到QQ空间" class="bshare-qzone"></a>
														<a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
														<a title="分享到人人网" class="bshare-renren"></a>
														<a title="分享到腾讯微博" class="bshare-qqmb"></a>
														<a title="分享到网易微博" class="bshare-neteasemb"></a>
														<a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
													</div>
													<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script>
													<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
												</div>
												<span class="share_txt">分享到：</span>
											</div>

											<div id="bar" style=" padding-top: 160px;">
												<?php echo ($item["title"]); ?>【包邮】<br/>
												【<?php if($item["shop_type"] == 'C' ): ?>淘宝
													<?php else: ?>天猫<?php endif; ?>售价】<?php echo ($item["price"]); ?>元<br/> 【券后价】<?php echo ($item["coupon_price"]); ?>元 <br/>
											  【下单链接】<?php echo C('yh_site_url'); echo U('/item/',array('id'=>$item['id']));?><br/>
											  -----------------
												<br/> 或者复制这条信息，打开【手机淘宝】 <?php echo ($item["quankouling"]); ?> 即可领券购买
											</div>

										</div>
									</div>
									<!--<?php echo ($item["intro"]); ?>--><?php echo ($item["desc"]); ?>
								</div>

								<div class="jiu_shi jiu_item">
									<h3><img src="__STATIC__/images/jinpintuijian.png" /></h3>
									<div class="goods-list main-container">
										<ul class="clearfix">
											<?php $tag_item_class = new itemTag;$data = $tag_item_class->orlike(array('type'=>'orlike','cid'=>$item['cate_id'],'cache'=>'0','return'=>'data',)); if(is_array($items_list)): $i = 0; $__LIST__ = $items_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 3 );++$i;?><li style="margin-right:8px;">
														<a href="<?php echo U('/item/',array('id'=>$val['id']));?>" class="img cnzzCounter" target="_blank" data-cnzz-type="1" data-cnzz="<?php echo ($val['id']); ?>">
															<img src="<?php echo ($val['pic_url']); ?>_400x400" alt="">
														</a>
														<div class="padding">
															<a target="_blank" href="<?php echo U('/item/',array('id'=>$val['id']));?>" class="title clearfix cnzzCounter" data-cnzz-type="1" data-cnzz="<?php echo ($val['id']); ?>">
																

																<?php echo ($val["title"]); ?>
															</a>
															<div class="coupon-wrap clearfix" >
								                            	<p>
									                            	<span>券后价<font style="font-size: 18px;"><?php echo ($val["coupon_price"]); ?></font>元</span>
									                              <span style="float: right;"><?php if($val["shop_type"] == 'C' ): ?>淘宝<?php endif; if($val["shop_type"] == 'B' ): ?>天猫<?php endif; ?><font color="red"><?php echo ($item["price"]); ?></font>元</span>
									                            </p>
									                            <p>
									                                <?php if($val["shop_type"] == 'C' ): ?><i class="taobao"></i><?php endif; ?>
																<?php if($val["shop_type"] == 'B' ): ?><i class="tmall"></i><?php endif; ?>月销量  <span class="num"><?php echo ($val["volume"]); ?></span>,
																								<span>优惠券<font color="red"><?php echo ($val["quan"]); ?></font>元</span>
									                            </p>        
								                            </div>
															<!--<div class="coupon-wrap clearfix">
																优惠券<span class="price"><?php echo ($val["quan"]); ?></span>元，已有<span class="num"><?php echo ($val["volume"]); ?></span>人购买
															</div>-->
														</div>
														<!--<div class="price-wrap clearfix">
															<div class="price">
																<div class="text">券后价&nbsp;￥<span class="price"><?php echo ($val["coupon_price"]); ?></span></div>
															</div>
															<div class="org-price">
																<div class="text">正常售价&nbsp;￥<span class="price"><?php echo ($val["price"]); ?></span>
																</div>
															</div>
														</div>-->
													</li><?php endforeach; endif; else: echo "" ;endif; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="footer" style="background-color: #444;height: 190px;width: 100%;border-top: 3px solid #FF472B;">
	<div class="footer-wrapper " style="width: 1200px;margin: 0 auto;position: relative;text-align: center">
		<img src="__STATIC__/tuiquanke/images/bottom_text.png" alt="" style="border: 0;margin-top: 50px;">
		<div class="author" style="    position: absolute;
    top: 67px;
    left: 990px;
    color: #FFFFFF;
    font-size: 18px;">by &nbsp;&nbsp;<?php echo C('yh_site_name');?>
	</div>
	<div class="text" style="color: #ffffff; font-size: 16px;margin-top: 33px;"> CopyRight&nbsp;2017 &nbsp;<?php echo C('yh_site_name');?>@ 天猫、淘宝优惠券 &nbsp;&nbsp;&nbsp;<?php echo C('yh_site_icp');?> &nbsp;&nbsp;
		<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('yh_qq');?>&site=qq&menu=yes" style="color: #8da7cb" title="联系我帮你解答">^_^亲遇到问题，联系我帮你处理哈</a>
	</div>
</div>
<div class="foot" style="display: none;">
	<?php echo C('yh_statistics_code');?>
</div>
</div>
<div id="back_top" class="back_top">
	<a href="javascript:;" class="call-top" title="返回顶部"></a>
	<a id="checkTrap" class="checkTrap" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('yh_qq');?>&site=qq&menu=yes"><span class="call-check" title="联系客服"></span></a>
	<div class="hide">
	</div>
</div>
<a id="checkTrap" class="checkTrap" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('yh_qq');?>&site=qq&menu=yes"></a>
<?php $tag_load_class = new loadTag;$data = $tag_load_class->js(array('type'=>'js','href'=>'__STATIC__/tuiquanke/js/jquery.js,__STATIC__/tuiquanke/js/slider.js,__STATIC__/tuiquanke/js/layer/layer.js,__STATIC__/tuiquanke/js/clipboard.min.js,__STATIC__/tuiquanke/js/base.js','cache'=>'0','return'=>'data',));?>

		</div>
		<script type="text/javascript">
			function show_date_time(end, style, id) {
				today = new Date();
				timeold = ((end) * 1000 - today.getTime());
				if(timeold < 0) {
					return;
				}
				setTimeout("show_date_time(" + end + ',' + style + ',' + id + ")", 100);
				sectimeold = timeold / 1000;
				secondsold = Math.floor(sectimeold);
				msPerDay = 24 * 60 * 60 * 1000;
				e_daysold = timeold / msPerDay;
				daysold = Math.floor(e_daysold);
				e_hrsold = (e_daysold - daysold) * 24;
				hrsold = Math.floor(e_hrsold);
				e_minsold = (e_hrsold - hrsold) * 60;
				minsold = Math.floor((e_hrsold - hrsold) * 60);
				e_seconds = (e_minsold - minsold) * 60;
				seconds = Math.floor((e_minsold - minsold) * 60);
				ms = e_seconds - seconds;
				ms = new String(ms);
				ms1 = ms.substr(2, 1);
				ms2 = ms.substr(2, 2);
				hrsold1 = daysold * 24 + hrsold;
				if(style == 1) {
					$("#end_date_" + id).html('<em>' + (hrsold1 < 10 ? '0' + hrsold1 : hrsold1) + "</em>小时<em>" + (minsold < 10 ? '0' + minsold : minsold) + "</em>分<em>" + (seconds < 10 ? '0' + seconds : seconds) + "</em>秒");
				} else if(style == 2) {
					$("#end_date_" + id).html('<em>' + daysold + "</em>天<em>" + (hrsold < 10 ? '0' + hrsold : hrsold) + "</em>时<em>" + (minsold < 10 ? '0' + minsold : minsold) + "</em>分<em>" + (seconds < 10 ? '0' + seconds : seconds) + "</em>秒");
				} else if(style == 3) {
					$("#end_date_" + id).html("<em>" + (hrsold1 < 10 ? '0' + hrsold1 : hrsold1) + "</em>小时<em>" + (minsold < 10 ? '0' + minsold : minsold) + "</em>分<em>" + (seconds < 10 ? '0' + seconds : seconds) + "." + ms1 + "</em>秒");
				} else {
					$("#end_date_" + id).html(daysold + "天" + (hrsold < 10 ? '0' + hrsold : hrsold) + "小 时" + (minsold < 10 ? '0' + minsold : minsold) + "分" + (seconds < 10 ? '0' + seconds : seconds) + "秒." + ms2);
				}
			}
			$(".timer").each(function() {
				var reg = /^[0-9]+$/;
				var timer = $(this).attr('data-time');
				if(reg.test(timer)) {
					show_date_time(timer, 3, 0);
				}
			});

			var clipboard = new Clipboard('.btn');
			clipboard.on('success', function(e) {
				console.info('Action:', e.action);
				console.info('Text:', e.text);
				console.info('Trigger:', e.trigger);
				alert("复制成功");
				e.clearSelection();
			});
			clipboard.on('error', function(e) {
				console.error('Action:', e.action);
				console.error('Trigger:', e.trigger);
			});
				
<?php if($uptime > 2000 ): ?>var Pid=$('#Pid').val();
var up_time=$("#up_time").val();	
$.ajax({ 
        url: "/?m=min&a=checkcoupon",  
        type:'get',
        dataType: "text",
        timeout :5000,
        data: { id: Pid, uptime: up_time },
        async: true,  
        success: function(data){  
        if(data=='no'){	
			loiMsg("抱歉！此商品优惠券已失效请看看其它商品吧");
		}
        }  
    });<?php endif; ?>

</script>
	</body>

</html>