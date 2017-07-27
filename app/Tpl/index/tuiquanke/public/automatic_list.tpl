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
<volist name="items_list" id="item" key="i" mod="4">	
  	<li class="<eq name="mod" value="3">no-right</eq>">
 <a <if condition="$item.isq neq '1'">rel="nofollow" isconvert="1" data-itemid="{$item.num_iid}" href="<if condition="$item.click_url neq '0'">{$item.click_url}</if>"<else/>href="{:U('/item/',array('id'=>$item['id']))}"</if> target="_blank" class="img cnzzCounter" data-cnzz-type="1" data-cnzz="{$item.num_iid}">
 <img src="{$item.pic_url}_400x400" data-original="{$item.pic_url}_400x400" />
  </a>
            <div class="padding">
                            <a target="_blank"
                               href="{:U('/item/',array('id'=>$item['id']))}"
                               class="title clearfix cnzzCounter" data-cnzz-type="1"
                               data-cnzz="{$item.num_iid}">
                              
                                {$item.title}
                            </a>
                            <div class="coupon-wrap clearfix" >
                            	<p>
	                            	<span>券后价<font style="font-size: 18px;">{$item.coupon_price}</font>元</span>
	                              <span style="float: right;"><if condition="$item.shop_type eq 'C' ">淘宝</if><if condition="$item.shop_type eq 'B' ">天猫</if><font color="red">{$item.price}</font>元</span>
	                            </p>
	                            <p>
	                                <if condition="$item.shop_type eq 'C' "><i class="taobao"></i></if>
									<if condition="$item.shop_type eq 'B' "><i class="tmall"></i></if>月销量  <span class="num">{$item.volume}</span>,
																<span>优惠券<font color="red">{:floor($item['quan'])}</font>元</span>
	                            </p>        
                            </div>
                        </div>
                        <!--<div class="clearfix buy-step">
                        	    <div class="buy-step-first">
														<span>
															<table>
																<tr>
																	<td style="font-size: 40px; padding-left: 5px; padding-right: 5px;">{:floor($item['quan'])} </td>
																	<td><b _hover-ignore="1">元优惠券</b>
															<i>券后只要￥<font class="price">{$item.coupon_price}</font></i></td>
																</tr>
															</table>
														</span>
														<a rel="nofollow" class="coupon-btn" href="{:U('/out/action/quan/',array('id'=>$item['id']))}" target="_blank" title="领券后请点击右边按钮下单" _hover-ignore="1">点击领取</a>
							</div>
                            <span class="price" style="display: none;">
                                <span class="text">券后价&nbsp;￥<span
                                        class="price">{$item.coupon_price}</span></span>
                                 <span class="text" style="margin-left: 15px; font-size: 12px;color: #ffe4ed;">
                                <if condition="$item.shop_type eq 'C' ">淘宝</if><if condition="$item.shop_type eq 'B' ">天猫</if>售价&nbsp;￥{$item.price}                                </span>
                            </span>
                        </div>-->
                    </li>
                    
                    
	</volist>
	</ul>
	
	<div style="clear:both;"></div>
 </div>		
