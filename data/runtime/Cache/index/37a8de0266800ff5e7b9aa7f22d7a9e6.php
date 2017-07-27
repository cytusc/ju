<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
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

<div id="dtk_mian">
<div id="banner">
    <div class="banner_con clearfix">
        <!--列表   -->
        <div class="list fl">
            <ul>
<?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><li><i class="iconfont <?php echo ($cate[cateimg]); ?>"></i><a class="cnzzCounter" href="<?php echo U('/cate/',array('cid'=>$cate['id']));?>"><?php echo ($cate[name]); ?></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        </div>
        <!-- 轮播-->
 <div class="unslider fl">

<div class="focusBox" style="margin:0 auto">			
<div class="tempWrap" style="overflow:hidden; position:relative; width:720px">
<ul class="pic" style="width: 3200px; left: 0px; position: relative; overflow: hidden; padding: 0px; margin: 0px;">					
<?php if(is_array($ad_list)): $i = 0; $__LIST__ = $ad_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i;?><li style="float: left; width: 720px;">
<a href="<?php echo ($ad["url"]); ?>" target="_blank"><img src="<?php echo ($ad["img"]); ?>"></a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

</ul></div>			
		
<ul class="hd">	
<?php if(is_array($ad_list)): $i = 0; $__LIST__ = $ad_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i;?><li class=""></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul></div>
        </div>
        <!--右边大图 -->
 <div class="rightPic fr" style="position: relative">
			    <div class="banner_r">
			        <dl>
			            <dd>
			                <a href="#" class="up">
			                	<div class="live">
				                    <img src="__STATIC__/tuiquanke/images/icon-shop.png">
				                    <div class="txt"><span class="title">直播数量</span> <span>当前优惠<em><?php echo ($total_item); ?></em>款</span>  </div>
			                    </div>
			                </a>
			            </dd>
			            <dd>
			                <a href="/jiu" class="down">
			                    <img src="__STATIC__/tuiquanke/images/baoyou.jpg" height="151">
			                </a>
			            </dd>
			        </dl>
			    </div>
        </div>
    </div>
</div>
<!--recommend-->
<div class="recommend cf">
	<div class="rec_horm fl" _hover-ignore="1">
		<i class="ico_horm"></i> 头条阅读
	</div>
	<div class="rec_list fl">
		<ul>
 <?php if(is_array($article_list)): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li><a  title="<?php echo ($list["title"]); ?>" target="_blank" href="<?php if(C('URL_MODEL') == 2): ?>/article/view_<?php echo ($list["id"]); else: echo U('/article/read/',array('id'=>$list['id'])); endif; ?>" ><?php echo ($list["title"]); ?>
<i class="headline_new"></i></a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>	
</div>

<?php if($taobao): ?><div class="category-box clear">
	<ul>
		<?php if(is_array($taobao)): $k = 0; $__LIST__ = $taobao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li <?php if($k%3 == 0): ?>class="no-right"<?php endif; ?> >
			<a href="<?php echo ($vo["item_url"]); ?>" target="_blank" isconvert="1" class="qg-item qg-ing">
			    <div class="qg-img">
			        <img src="<?php echo ($vo["pict_url"]); ?>_250x250">
			    </div>
			    <div class="qg-detail">
			        <div class="name">
			            <p class="des"><?php echo ($vo["title"]); ?></p>
                        <p class="subtitle">品牌直供全国包邮</p>
                   	</div>			
			        <div class="link">
			            <div class="price">
			                <span class="original-price">¥<i><?php echo ($vo["reserve_price"]); ?></i></span>
			                <span class="promo-price">¥<em><?php echo ($vo["zk_final_price"]); ?></em></span>
			            </div>
			            <div class="link-btn">立即抢购</div>
			        </div>
				</div>
			</a>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div><?php endif; ?>

<!--content-->
<div id="content" style="padding-bottom: 58px;">
    <!--领券优惠直播-->
    <div class="live">
        <!-- 领券优惠头部-->
<div class="discount_head clearfix"></div>
        <!-- 领券优惠商品-->
       <div class="area" id="contentA">
			  <style>
.buy-step .buy-step-first{width:285px;height:58px;padding:0;margin:0;background-color:#F2EBCF;overflow:hidden}
.buy-step .buy-step-first span{float:left;width:200px;height:46px;color:#FF2B22;text-align:left}
.buy-step .buy-step-first span i{display:block;font-size:12px;line-height:20px;color:#515151}
.buy-step .buy-step-first span b{display:block;font-size:20px;line-height:26px;text-align:left;font-weight:400}
.buy-step .buy-step-first .coupon-btn{float:right;width:45px;height:38px;line-height:19px;padding:10px 6px 10px 14px;text-align:center;font-size:14px;letter-spacing:.1em;color:#FFF;background:url(/static/images/coupon-btn.png) repeat-y 0 0;transition:font-size .3s}
.buy-step .double-arrow span{position:absolute;top:23px;left:50%;display:block;width:24px;height:11px;margin-left:-12px;background:url(/static/images/arrow-right.png) no-repeat center center}
.buy-step .buy-step-first .coupon-btn:hover{font-size:16px}
  </style>
  <div class="goods-list main-container">
  <ul class="clearfix">
<?php if(is_array($items_list)): $i = 0; $__LIST__ = $items_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 4 );++$i;?><li class="<?php if(($mod) == "3"): ?>no-right<?php endif; ?>">
 <a <?php if($item["isq"] != '1'): ?>rel="nofollow" isconvert="1" data-itemid="<?php echo ($item["num_iid"]); ?>" href="<?php if($item["click_url"] != '0'): echo ($item["click_url"]); endif; ?>"<?php else: ?>href="<?php echo U('/item/',array('id'=>$item['id']));?>"<?php endif; ?> target="_blank" class="img cnzzCounter" data-cnzz-type="1" data-cnzz="<?php echo ($item["num_iid"]); ?>">
 <img src="<?php echo ($item["pic_url"]); ?>_400x400" data-original="<?php echo ($item["pic_url"]); ?>_400x400" />
  </a>
            <div class="padding">
                            <a target="_blank"
                               href="<?php echo U('/item/',array('id'=>$item['id']));?>"
                               class="title clearfix cnzzCounter" data-cnzz-type="1"
                               data-cnzz="<?php echo ($item["num_iid"]); ?>">
                              
                                <?php echo ($item["title"]); ?>
                            </a>
                            <div class="coupon-wrap clearfix" >
                            	<p>
	                            	<span>券后价<font style="font-size: 18px;"><?php echo ($item["coupon_price"]); ?></font>元</span>
	                              <span style="float: right;"><?php if($item["shop_type"] == 'C' ): ?>淘宝<?php endif; if($item["shop_type"] == 'B' ): ?>天猫<?php endif; ?><font color="red"><?php echo ($item["price"]); ?></font>元</span>
	                            </p>
	                            <p>
	                                <?php if($item["shop_type"] == 'C' ): ?><i class="taobao"></i><?php endif; ?>
									<?php if($item["shop_type"] == 'B' ): ?><i class="tmall"></i><?php endif; ?>月销量  <span class="num"><?php echo ($item["volume"]); ?></span>,
																<span>优惠券<font color="red"><?php echo floor($item['quan']);?></font>元</span>
	                            </p>        
                            </div>
                        </div>
                        <!--<div class="clearfix buy-step">
                        	    <div class="buy-step-first">
														<span>
															<table>
																<tr>
																	<td style="font-size: 40px; padding-left: 5px; padding-right: 5px;"><?php echo floor($item['quan']);?> </td>
																	<td><b _hover-ignore="1">元优惠券</b>
															<i>券后只要￥<font class="price"><?php echo ($item["coupon_price"]); ?></font></i></td>
																</tr>
															</table>
														</span>
														<a rel="nofollow" class="coupon-btn" href="<?php echo U('/out/action/quan/',array('id'=>$item['id']));?>" target="_blank" title="领券后请点击右边按钮下单" _hover-ignore="1">点击领取</a>
							</div>
                            <span class="price" style="display: none;">
                                <span class="text">券后价&nbsp;￥<span
                                        class="price"><?php echo ($item["coupon_price"]); ?></span></span>
                                 <span class="text" style="margin-left: 15px; font-size: 12px;color: #ffe4ed;">
                                <?php if($item["shop_type"] == 'C' ): ?>淘宝<?php endif; if($item["shop_type"] == 'B' ): ?>天猫<?php endif; ?>售价&nbsp;￥<?php echo ($item["price"]); ?>                                </span>
                            </span>
                        </div>-->
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	
	<div style="clear:both;"></div>
 </div>		

	<div class="mainbody_6" style="margin: 0 auto;margin-bottom: 0px;margin-top: 26px;">
    <div id="yw0" class="pager">
				<?php echo ($page); ?>
			</div>
		</div>
</div>
		</div>
</div>
<div class="foot">
<div class="links"><span>友情链接：</span>
					<div class="links_list_box">
			    		<?php $tag_link_class = new linkTag;$data = $tag_link_class->lists(array('type'=>'lists','status'=>'1','cache'=>'0','return'=>'data',));?><li>
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if(($mod) == "10"): ?></li><li><?php endif; ?>
			    			<a href="<?php echo ($val["url"]); ?>" target="_blank"><?php echo ($val["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
						</li>	
							
						</ul>
					</div>
	</div>
</div>

		<div class="clearfix"></div>
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
	
	</body>
</html>