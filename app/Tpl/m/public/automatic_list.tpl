	<div class="line_x20"></div>
<div class="goods-list">
	<volist name="items_list" id="item" key="i" mod="2">
	<div class="goods-item">
		<div class="tqk_pic">
		<a data-transition="slide" href="<if condition="C('APP_SUB_DOMAIN_DEPLOY') eq false">{:U('/m/detail',array('id'=>$item['id']))}<else/>{:U('/detail',array('id'=>$item['id']))}</if>" class="img QtkSelfClick">
		{$item.coupon_start_time|newicon}
		<img <if condition="C('yh_site_secret') eq '1'">  class="scrollLoading" data-url="{$item.pic_url}_400x400" data-original="{$item.pic_url}_400x400" src="__STATIC__/tuiquanke/images/pixel.gif" <else/> src="{$item.pic_url}_400x400" </if>  />
		</a></div>
		<a data-transition="slide" href="<if condition="C('APP_SUB_DOMAIN_DEPLOY') eq false">{:U('/m/detail',array('id'=>$item['id']))}<else/>{:U('/detail',array('id'=>$item['id']))}</if>" class="title QtkSelfClick">
			<div class="text" style=" color:#777777;">{$item.title}</div>
		</a>
		<if condition="$item.isq eq '1'">
		<div class="tqkprice">
			<span class="text"><if condition="$item.shop_type eq 'C' ">淘宝</if><if condition="$item.shop_type eq 'B' ">天猫</if>在售 ￥{$item.price}</span>
            <label>{$item.quan}元券</label>
           
		</div></if> 
		<div class="price-wrapper">
		<span class="text tqkico" style="padding-top: 4px;">券后价： </span>
			<span class="price"> {$item.coupon_price}元</span>
	
			<div class="sold-wrapper">
				<span class="sold-num" style="font-size: 10px;">{$item.volume}</span>
				<span class="text" style="font-size: 10px;">人已买</span>
			</div>
		</div>
	</div>
	</volist>
</div>