<include file="public:header" />
<style type="text/css">
.box{height:460px;margin:0 9px 20px 0;float:left;box-shadow: 0 0 3px rgba(200, 200, 200, 0.5);background: #fff;border: 1px solid #ddd;overflow: hidden;}
.pic{width:260px;height: 260px;position: relative;overflow: hidden;}
.info{width: 260px;height:460px;float: left;overflow: hidden;}
.txt{line-height:15px;font-size: 13px;overflow: hidden;}
.t1,.t1 a{line-height:15px;height:30px;text-align: left;;font-size: 13px;overflow: hidden;}
.copy_mb{    width: 100%;margin: 0px auto;position:inherit;bottom: 0px;text-align: center;color: #333;background: #f1f0f0;border: 1px solid #c4c4c4;padding: 4px 15px;}
.title{line-height:16px;height:32px;overflow: hidden;}
</style>
<!--商品列表-->
<div class="pad_lr_10" >
    <form name="searchform" method="get" >
    <table width="100%" cellspacing="0" class="search_form">
        <tbody>
            <tr>
                <td>
                <div class="explain_col">
			<input type="hidden" name="g" value="admin" />
			<input type="hidden" name="m" value="spread" />
			<input type="hidden" name="a" value="index" />
			<input type="hidden" name="menuid" value="{$menuid}" />
			<if condition="$sm neq ''"><input type="hidden" name="sm" value="{$sm}" /></if>
			分类 :
			<select class="J_cate_select mr10" data-pid="0" data-uri="{:U('items_cate/ajax_getchilds', array('type'=>0))}" data-selected="{$search.selected_ids}"></select>
			<input type="hidden" name="cate_id" id="J_cate_id" value="{$search.cate_id}" />
			价格区间 :
			<input type="text" name="price_min" class="input-text" size="5" value="{$search.price_min}" />
			-
			<input type="text" name="price_max" class="input-text" size="5" value="{$search.price_max}" />
			&nbsp;&nbsp;关键字 :
			<input name="keyword" type="text" class="input-text" size="25" value="{$search.keyword}" />
			<input type="submit" name="search" class="btn" value="搜索" />		
                </div>
                </td>
            </tr>
        </tbody>
    </table>
    </form>
 

    <div class="J_tablelist table_list">
            <volist name="items_list" id="val" >
				<div class="box">
					<div class="info" id="quan_{$val.num_iid}">
						<div class="pic"><img src="{$val.pic_url}_260x260.jpg"></div>
						<div class="title"><b>{$val.title}</b></div>
						<div class="txt">
							券后【{$val.coupon_price}元】包邮秒杀<br>
							{$val.quan}元优惠
							<div class="t1">领券：<a href="http://shop.m.taobao.com/shop/coupon.htm?activity_id={$val.Quan_id}&amp;seller_id={$val.sellerId}" target="_blank">http://shop.m.taobao.com/shop/coupon.htm?activity_id={$val.Quan_id}&amp;seller_id={$val.sellerId}</a></div>
							<div class="t1">抢购：<a href="{$val.item_url}" target="_blank">{$val.item_url}</a></div>
							<div class="t1">{$val.intro}<br></div>
							已抢{$val.volume}件！
						</div>
						<input type="button" class="copy_mb" onclick="TJ('{$val.num_iid}')" value="一键复制">
					</div>
				</div>
            </volist>
    </div>





    <div class="btn_wrap_fixed">
		<div id="pages">{$page11}</div>
    </div>
</div>
<include file="public:footer" />

<script type="text/javascript">
$('.J_cate_select').cate_select({top_option:lang.all}); //分类联动
function TJ(id){
	if ((navigator.userAgent.indexOf('MSIE') >= 0) || (navigator.userAgent.indexOf('Trident') >= 0) || (navigator.userAgent.indexOf('trident') >= 0)){
		obi_id='quan_' + id;
		name= id*5-2;
		img = $('#quan_' + id + ' .pic img').attr("src");
		$.ajaxSettings.async = false; 
		$.getJSON("{:U('spread/img')}",{img:img,id:id}, function(R){$('#quan_' + id + ' .pic img').attr("src",R.img);});
		var obj_mb=document.getElementById(obi_id);
		alert('复制成功');
		copyText(obj_mb);
	}else{
		alert('请将浏览器切换到【IE模式】再复制！');
	}
}
function copyText(obj)   { 
	var rng = document.body.createTextRange(); 
	rng.moveToElementText(obj); 
	rng.scrollIntoView(); 
	rng.select(); 
	rng.execCommand("Copy"); 
	rng.collapse(false);
} 
</script>
</body>
</html>