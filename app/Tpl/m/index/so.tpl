<!doctype html>
<html lang="zh-CN">
	<head>
		<include file="public:head" />
	</head>
	<body>
		<div id="load-more">
			<include file="public:header" />
			
		
			<div class="category-box clear">
				<ul>
					<volist name="taobao" id="vo" key="k">
					<li <if condition="$k%3 eq 0">class="no-right"</if> >
						<a href="{:U('/jump/',array('item'=>$vo['num_iid']))}" target="_blank" class="qg-item qg-ing">
						    <div class="qg-img" style="padding: 10px;">
						        <img src="{$vo.pict_url}_250x250">
						    </div>
						    <div class="qg-detail">
						        <div class="name">
						            <p class="des">{$vo.title}</p>
			                   	</div>			
						        <div class="link">
						            <div class="price">
						                <span class="promo-price">¥<em>{$vo.zk_final_price}</em></span>
						            </div>
						            <div class="link-btn">立即抢购</div>
						        </div>
							</div>
						</a>
					</li>
					</volist>
				</ul>
			</div>
		
			<include file="public:automatic_list" />
			<div class="page">
				{$page}
			</div>
		</div>
		<div class="clearfix"></div>
		<include file="public:footer" />
	</body>
</html>