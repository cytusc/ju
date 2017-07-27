<!doctype html>
<html>
	<head>
		<include file="public:head" />
		<link rel="stylesheet" type="text/css" href="__STATIC__/tuiquanke/css/item.css">
		<script type="text/javascript" src="__STATIC__/tuiquanke/js/loimsg.js"></script>
	</head>
	<body>
		<include file="public:header" />
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
											<img src="{:attach(get_thumb($item['pict_url'], '_b'),'item')}_400x400" width="400px" height="400px">
										</div>
										<div class="goods_detail">
											<if condition="$item.class eq 'tag_wait' ">
												<h3><a>{$item.title}</a></h3>
												<else />
												<h3><a>{$item.title}</a></h3>
											</if>
											<div class="desc"></div>

											<div class="item-like">
												<div class="price_tag"><i>￥</i>{$item.zk_final_price}<span class="ori_price">￥{$item.reserve_price}</span></div>
												<div class="volume_tag fr">已有 <strong>{$item.volume}</strong> 人在抢购该商品</div>
											</div>
											<dl class="item-last-time"> <dt></dt>
												<dd class="timer" id="end_date_0" data-time="{$item.coupon_end_time}"></dd>
											</dl>
											<div class="text-wrap">
												<if condition="$item.isq eq '1'">
													<span class="text-wrap-span">
													已领券<i>{$item.Quan_receive}</i>张，手慢无
													</span>
												</if>
												<span>已有<i>{$item.volume}</i>人购买</span>
											</div>
											<div class="buy-step clearfix">
											
												<input type="hidden" id="Pid" value="{$item.id}" />
												<input type="hidden" id="up_time" value="{$item.up_time}" />
												<a  class="buy-step-sec buy-btn" rel="nofollow" href="{$item.item_url}" isconvert="1" data-itemid="{$item.num_iid}" target="_blank">去
													<if condition="$item.user_type eq '0' ">淘宝
														<else/>天猫</if>下单</a>
											</div>

											<div style="width: 100%; clear: both; padding-top: 10px;"></div>
											<div class="shareto" style="clear: both; width: 95%;">
												如果您喜欢此宝贝，记得分享给您的朋友，一起享优惠。
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


										</div>
									</div>
									<!--{$item.intro}-->{$item.desc}
								</div>

								<div class="jiu_shi jiu_item">
									<h3><img src="__STATIC__/images/jinpintuijian.png" /></h3>
									<div class="goods-list main-container">
										<ul class="clearfix">
											<yh:item type="orlike" cid="$item['cate_id']">
												<volist name="items_list" id="val" key="i" mod="3">
													<li style="margin-right:8px;">
														<a href="{:U('/item/',array('id'=>$val['id']))}" class="img cnzzCounter" target="_blank" data-cnzz-type="1" data-cnzz="{$val['id']}">
															<img src="{$val['pic_url']}_400x400" alt="">
														</a>
														<div class="padding">
															<a target="_blank" href="{:U('/item/',array('id'=>$val['id']))}" class="title clearfix cnzzCounter" data-cnzz-type="1" data-cnzz="{$val['id']}">
																{$val.title}
															</a>
															<div class="coupon-wrap clearfix" >
								                            	<p>
									                            	<span>券后价<font style="font-size: 18px;">{$val.coupon_price}</font>元</span>
									                              <span style="float: right;"><if condition="$val.shop_type eq 'C' ">淘宝</if><if condition="$val.shop_type eq 'B' ">天猫</if><font color="red">{$val.price}</font>元</span>
									                            </p>
									                            <p>
									                                <if condition="$val.shop_type eq 'C' "><i class="taobao"></i></if>
																<if condition="$val.shop_type eq 'B' "><i class="tmall"></i></if>月销量  <span class="num">{$val.volume}</span>,
																<span>优惠券<font color="red">{$val.quan}</font>元</span>
									                            </p>        
								                            </div>
														</div>
													</li>

												</volist>
											</yh:item>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<include file="public:footer" />
		</div>
		
	</body>

</html>