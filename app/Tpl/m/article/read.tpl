<!doctype html>
<html lang="zh-CN">
	<head>
		<include file="public:head" />
		<link  rel="stylesheet" type="text/css" href="__STATIC__/mobile/assets/css/amazeui.min.css" />
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
		
		<div data-am-widget="list_news" class="am-list-news am-list-news-default am-no-layout" style="margin-top: 50px;">
			<!--列表标题-->
			<div class="am-list-news-hd am-cf">
				<!--带更多链接-->
				 <h2>图文资讯</h2>
			</div>
			<div class="am-list-news-bd">
				<ul class="am-list">
<volist name="items_list" id="list">
					<li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
						<div class="am-u-sm-4 am-list-thumb">	<a href="<if condition="C('URL_MODEL') eq 2">/article/view_{$list.id}<else/>{:U('/m/article/read/',array('id'=>$list['id']))}</if>"><img src="{$list.pic}"></a>
						</div>
						<div class="am-u-sm-8 am-list-main">
							 <h3 class="am-list-item-hd"><a href="<if condition="C('URL_MODEL') eq 2">/article/view_{$list.id}<else/>{:U('/m/article/read/',array('id'=>$list['id']))}</if>">{$list.title}</a></h3>
							<div class="am-list-item-text">
							<p style="height: 120px; overflow: hidden;">{:cut_html_str($list['info'],356,'...')}</p>
								
							</div>
						</div>
					</li>
</volist>
					

</ul>
			</div>
		</div>
		<div class="page">
			{$page}
		</div>
		<include file="public:footer" />
	</body>
</html>