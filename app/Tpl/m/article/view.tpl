<!doctype html>
<html>
	<head>
		<title>{$page_seo.title}</title>
		<meta name="keywords" content="{$page_seo.keywords}" />
		<meta name="description" content="{$page_seo.description}" />
		<include file="public:head" />
		<load href="__STATIC__/css/yhxia/article.css" />
		<link  rel="stylesheet" type="text/css" href="__STATIC__/mobile/assets/css/amazeui.min.css" />
		<style type="text/css">
			.mains,td,th {font-family: Tahoma, Helvetica, Arial, "宋体", sans-serif;}
			.content_text h2 {padding: 10px 0;font-size: 14px;}
			.content_text table td {text-indent: 12px;}
			.content_text img{max-width:100%; }
			.blog-main img{max-width: 100%;}
		</style>
	</head>
	<body>

	<div class="main-title clearfix">
		<a class="mui-action-menu mui-pull-left main-icon" href="javascript:void(0)"></a>
		<div class="search" style=" width: 80%; margin: 0 auto;">
			<div class="find-wrapper clearfix" style="padding: 7px 20px 0px 20px;">
				<form data-ajax="false" method="get" action="/?" style="position: relative">
					<input type="hidden" name="g" value="m">
					<input type="hidden" name="m" value="index">
					<input type="hidden" name="a" value="so">
					<div class="border-btm clearfix">
						<div class="input-wrapper" style="width: 100%;">
							<input autocomplete="off" type="text" name="k" placeholder="请输入您要搜索的商品名称">
						</div>
						<div class="search-btn-wrapper">
							<button type="submit"></button>
						</div>
					</div>
		
				</form>
			</div>
		</div>
		<a href="{:C('yh_headerm_html')}" rel="external" class="main-home"></a>
	</div>
			
		<div class="am-g am-g-fixed blog-g-fixed" style="margin-top: 50px;">
	<div class="am-u-md-8">
		<a href="/">{:C('yh_site_name')}</a> &gt;
		<a href="javascript:history.go(-1);">优惠券头条</a></div>
	<div class="am-u-md-8">
		<article class="blog-main">
			<div class="am-g" style="padding: 10px;">
			
				<?php echo htmlspecialchars_decode($help['info']);?>
			</div>
		</article>
		
 <!--更多商品-->
 <div class="fq-grandeur-like am-text-sm am-text-center am-margin-vertical-xs"><i class="am-icon-heart-o am-margin-right-xs"></i>猜您喜欢</div>     
 <ul class="am-avg-sm-2">

<volist name="sellers" id="val" >
                            <li class="fq-goods fq-background-white am-text-center" style="margin-bottom: 8px;">
                                        <a class="am-block" href="<if condition="C('APP_SUB_DOMAIN_DEPLOY') eq false">{:U('/m/detail',array('id'=>$val['id']))}<else/>{:U('/detail',array('id'=>$val['id']))}</if>">
                                            <img class="am-thumbnail am-margin-bottom-0 am-block" src="{$val.pic_url}_400x400" />
                                        </a>
                                        <a class="fq-title am-block am-text-xs am-text-truncate am-padding-left-xs">
                                            <span data-id="269489987">{$val.title}</span>
                                        </a>
                                        <div class="am-cf am-text-left am-padding-left-xs">
                                            <div class="fq-price am-text-xs">
                                                <span>券后</span>
                                                <strong style="color: #FF0000;">￥{$val.coupon_price}</strong>
                                            </div>
                                        </div>
                              </li>  
</volist>

                        </ul>
        <!--更多商品-->
			
			
	</div>


	

</div>




<include file="public:footer" />
			
		

	</body>
</html>