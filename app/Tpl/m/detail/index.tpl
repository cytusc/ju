<!doctype html>
<html lang="zh-CN">
<head>
<include file="public:top" />
<script type="text/javascript" src="__STATIC__/wap/js/loimsg.js"></script>
</head>
<body>
<div class="fq-search fq-background-white am-text-center">
 <form method="get" action="/?" name="search" class="am-form am-padding-vertical-xs am-inline-block am-text-center">
 <input type="hidden" name="g" value="m">
<input type="hidden" name="m" value="index">
<input type="hidden" name="a" value="so">
     <input id="key" autocomplete="off"  name="k" type="text" class="am-radius am-padding-vertical-xs am-text-center am-fl" placeholder="输入您要查找的商品名称" value="">
        <i class="am-icon-search am-vertical-align-middle am-fr" onclick="$('#search').submit()"></i>
    </form>
</div>
<a href="javascript:void(0);" onclick="back();">
    <img src="__STATIC__/mobile/images/return.png" class="fq-return am-margin-top-sm am-margin-left-sm">
</a>
<div class="fq-searchbox fq-text-white am-inline-block am-vertical-align am-text-center am-round am-margin-top-sm am-margin-right-sm">
    <i class="am-icon-search am-vertical-align-middle"></i>
</div>
<script>
    
    $(".fq-searchbox").click(function(){
        if($(".fq-search").is(":hidden")){
            $(".fq-search").show();
            $(".fq-return").css("top","53px");
            $(".fq-searchbox").css("top","53px"); //如果元素为隐藏,则将它显现
        }else{
            $(".fq-search").hide();
            $(".fq-return").css("top","0");
            $(".fq-searchbox").css("top","0");    //如果元素为显现,则将其隐藏
        }
    })
</script>
<div class="fq-whole am-text-sm">
    <div class="fq-subject">
        <div>
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-1 am-gallery-default am-padding-0" data-am-gallery="{ pureview: true }">
                <li class="am-padding-0">
                    <div class="am-gallery-item">
                        <a href="{$item.pic_url}">
                            <img src="{$item.pic_url}_400x400">  </a>
                    </div>
                </li>
            </ul>
            <div class="fq-grandeur-title fq-background-white am-padding-xs">
                <strong class="am-block am-text-sm">{$item.title}</strong>
                <div>
                <a href="/?g=m&m=baoming&a=jubao&num_iid={$item.num_iid}" class="am-fr am-icon-tty baoming" id="jubao"> 举报违规</a>   <a href="/?g=m&m=baoming&a=index" class="am-fr am-icon-plus baoming" id="baoming"> 卖家报名</a>
                <strong class="fq-price am-text-sm">券后价<span class="am-text-xl am-margin-left-xs">{$item.coupon_price}元<i style="font-size: 1.2rem; color: #999;">包邮</i></li></span></strong>
           </div>
            </div>
            <div class="fq-grandeur-price fq-background-white am-padding-vertical-sm am-padding-horizontal-xs">
                <ul class="am-avg-sm-3 am-text-sm">
                    <li><if condition="$item.shop_type eq 'C' "><img height="12" src="__STATIC__/tuiquanke/images/taobao.png"></if><if condition="$item.shop_type eq 'B' "><img height="12" src="__STATIC__/tuiquanke/images/tmall.png"></if> 在售:{$item.price}元</li>
                    <li class="am-text-center"><i style="color: #f54d23;" class="am-margin-right-xs">领券可省{$item.quan}元</i></li>
                    <li class="am-text-center">销量<span class="am-margin-left-xs">{$item.volume}件</span></li>
                </ul>
            </div>
<input type="hidden" id="Pid" value="{$item.id}" />
<input type="hidden" id="up_time" value="{$item.up_time}" />
        </div>
        <!--商品图文详情-->
        <div class="am-panel-group am-margin-vertical-sm" id="accordion">
            <div class="am-panel am-padding-horizontal-xs">
                <div class="am-panel-hd am-padding-left-0 am-padding-right-0 am-padding-vertical-sm ">
                    <h4 class="am-panel-title" data-am-collapse="{parent: '#accordion', target: '#product-details'}" data-itemid="{$item.num_iid}">
                        商品图文详情<span class="am-text-xs am-text-primary">（点击展开）</span>
                        <i class="am-icon-angle-right am-fr am-icon-sm" id="change_icon"></i>
                    </h4>
                </div>
                <div id="product-details" class="am-panel-collapse am-collapse">
                    <div class="am-panel-bd am-padding-0" style="border-top: 0">
                        <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                                            <div class="am-padding-top-sm" style="width:100%;overflow:auto;"></div>                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--商品图文详情-->
        <!--更多商品-->
        <div class="fq-grandeur-like am-text-sm am-text-center am-margin-vertical-xs"><i class="am-icon-heart-o am-margin-right-xs"></i>猜您喜欢</div>        <!--商品轮播-->
        <div data-am-widget="slider" class="am-slider am-slider-a1" data-am-slider='{&quot;directionNav&quot;:false}'>
            <ul class="am-slides">
                <li>
                        <ul class="am-avg-sm-3">
<yh:item type="orlike" cid="$item['cate_id']">
<volist name="items_list" id="val" key="i" offset="0" length='6' mod="2">
                            <li class="fq-goods fq-background-white am-text-center">
                                        <a class="am-block" href="<if condition="C('APP_SUB_DOMAIN_DEPLOY') eq false">{:U('/m/detail',array('id'=>$val['id']))}<else/>{:U('/detail',array('id'=>$val['id']))}</if>">
                                            <img class="am-thumbnail am-margin-bottom-0 am-block" src="{$val.pic_url}_400x400" />
                                        </a>
                                        <a class="fq-title am-block am-text-xs am-text-truncate am-padding-left-xs">
                                            <span data-id="269489987">{$val.title}</span>
                                        </a>
                                        <div class="am-cf am-text-left am-padding-left-xs">
                                            <div class="fq-price am-text-xs">
                                                <span>券后</span>
                                                <strong>￥{$val.coupon_price}</strong>
                                            </div>
                                        </div>
                              </li>  
</volist>
</yh:item>
                        </ul>
                    </li>
  <li>
 <ul class="am-avg-sm-3">
<yh:item type="orlike" cid="$item['cate_id']">
<volist name="items_list" id="val" key="i" offset="6" length='6' mod="2">
                            <li class="fq-goods fq-background-white am-text-center">
                                        <a class="am-block" href="<if condition="C('APP_SUB_DOMAIN_DEPLOY') eq false">{:U('/m/detail',array('id'=>$val['id']))}<else/>{:U('/detail',array('id'=>$val['id']))}</if>">
                                            <img class="am-thumbnail am-margin-bottom-0 am-block" src="{$val.pic_url}_400x400" />
                                        </a>
                                        <a class="fq-title am-block am-text-xs am-text-truncate am-padding-left-xs">
                                            <span data-id="269489987">{$val.title}</span>
                                        </a>
                                        <div class="am-cf am-text-left am-padding-left-xs">
                                            <div class="fq-price am-text-xs">
                                                <span>券后</span>
                                                <strong>￥{$val.coupon_price}</strong>
                                            </div>
                                        </div>
                              </li>  
</volist>
</yh:item>
                        </ul>
                    </li>   
               </ul>
        </div>
        <!--更多商品-->
        <div data-am-widget="gotop" class="am-gotop am-gotop-fixed" style="margin-bottom:50px;">
            <a href="#top">
                <i class="am-gotop-icon am-icon-chevron-up am-round"></i>
            </a>
        </div>
        <!--底部菜单-->
        <div class="fq-grandeur-menu fq-background-white">
            <ul class="am-avg-sm-2">
                <li>
                    <ul class="am-avg-sm-2 am-padding-left-xs">
                        <li>
                            <a href="{:C('yh_headerm_html')}" class="am-padding-vertical-sm am-block">
                                <i class="am-icon-home am-icon-sm am-text-center am-vertical-align-middle" style="font-size:1.4rem; margin-top: 3px;"></i>
                                <span class="fq-grandeur-index am-text-center am-vertical-align-middle"> 首页</span>
                            </a>
                        </li>
                        <li data-am-modal="{target: '#qrcode_large', closeViaDimmer: 0}" >
                            <div class="am-inline-block" >
                                <a href="javascript:;"  class="am-padding-vertical-sm am-block">
                                    <i class="am-icon-whatsapp am-icon-sm am-text-center am-vertical-align-middle" style="font-size:1.4rem; margin-top: 3px;"></i>
                                    <span class="fq-grandeur-service am-text-center am-vertical-align-middle"> 客服</span>
                                </a>
                            </div>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <ul class="am-avg-sm-2 am-text-center">
                        <li>
                            <button type="button" class="fq-browser fq-text-white am-btn am-padding-horizontal-xs am-text-sm">
   <a href="<if condition="C('URL_MODEL') eq 2 and C('APP_SUB_DOMAIN_DEPLOY') eq true">{:U('/out/index/',array('id'=>$item['id']))}<else/>{:U('/m/out/index/',array('id'=>$item['id']))}</if>"> 浏览器购买
                                    </a>                            </button>
                        </li>
                        <li>
                            <button type="button" class="fq-amoy fq-text-white am-btn am-padding-horizontal-xs am-text-sm" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">
                                淘口令购买
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--底部菜单-->
        <div class="fq-amoy-buy am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
            <div class="fq-background-white am-modal-dialog">
                <div class="am-modal-hd">
                    淘口令购买
                    <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
                </div>
                
        
 <div class="am-modal-bd am-padding-0">
                        <div class="am-margin-vertical am-margin-horizontal-lg">
                            <div class="fq-goods-border fq-background-white am-text-center am-margin-top am-padding-vertical am-padding-horizontal-sm">
                                <div class="fq-explain am-center am-text-center">
                                    <span class="fq-nowrap fq-text-white am-padding-horizontal-sm">长按框内 > 全选 > 复制</span>
                                </div>
                                <span id="copy_key_ios" class="am-text-left">复制这条信息{$item.quankouling}打开【手机淘宝】即可领取优惠券购买！</span>
                                <textarea style="display:none; height:84px;resize:none;" id="copy_key_android" type="text" class="am-form-field am-text-left am-text-sm" oninput="regain();">复制这条信息{$item.quankouling}打开【手机淘宝】即可领取优惠券购买！</textarea>
                            </div>
                        </div>
                
                       <div class="copy_taowords am-margin-bottom" style="display:none;">
                        <div class="am-text-center am-margin-top-sm">
                             <div class="share_content am-margin-bottom am-badge-success am-badge"></div>
                            <a class="share am-padding-vertical-xs am-padding-horizontal-lg am-round am-inline-block" data-taowords="复制这条信息{$item.quankouling}打开【手机淘宝】即可领取优惠券购买！">
                                一键复制
                            </a>
                           
                        </div>
                    </div>
                    <div class="fq-instructions am-text-left am-text-xs am-padding-vertical-sm am-padding-horizontal-lg">
                        <span>
                            <span>温馨提示：</span>
                            手机无【手机淘宝】者，可选择浏览器购买方式哦~
                        </span>
                    </div>
                </div>
        

                
            </div>
        </div>
        <div class="copy_taoword_content am-margin-bottom am-badge-success am-badge" id="copy_taoword_content"></div>
        <div class="fq-service-wechat am-modal am-modal-no-btn" tabindex="-1" id="qrcode_large">
            <div class="am-modal-dialog">
                <div class="am-modal-hd">
                    <span class="am-text-sm">点击二维码放大后长按关注</span>
                    <a href="javascript: void(0)" class="am-close" data-am-modal-close>&times;</a>
                </div>
                <ul data-am-widget="gallery" class="am-gallery am-avg-sm-1 am-gallery-default" data-am-gallery="{pureview: 1}">
                    <li>
                        <div class="am-gallery-item">
                            <img src="{:C('yh_site_background')}" alt="" />
                                <span class="am-text-xs am-text-danger" style="top: -2px;position: relative;">客服微信</span>                        </div>
                                            </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>

 	
//var c = document.getElementById("copy_key_ios");
//  var s=c.innerHTML;
//  var clipboard = new Clipboard('.btn', {
//      text: function() {
//          return s;
//      }
//  });
//
//  clipboard.on('success', function(e) {
//      alert("复制成功");
//  });
//
//  clipboard.on('error', function(e) {
//      console.log(e);
//  });

$(function () {

        document.addEventListener("selectionchange", function (e) {
            if (window.getSelection().anchorNode.parentNode.id == 'copy_key_ios' && document.getElementById('copy_key_ios').innerText != window.getSelection()) {
                var key = document.getElementById('copy_key_ios');
                window.getSelection().selectAllChildren(key);
            }
            if (window.getSelection().anchorNode.parentNode.id == 'copy_key_ios1' && document.getElementById('copy_key_ios1').innerText != window.getSelection()) {
                var key = document.getElementById('copy_key_ios1');
                window.getSelection().selectAllChildren(key);
            }
            if (window.getSelection().anchorNode.parentNode.id == 'copy_key_ios2' && document.getElementById('copy_key_ios2').innerText != window.getSelection()) {
                var key = document.getElementById('copy_key_ios2');
                window.getSelection().selectAllChildren(key);
            }
            if (window.getSelection().anchorNode.parentNode.id == 'copy_key_ios3' && document.getElementById('copy_key_ios3').innerText != window.getSelection()) {
                var key = document.getElementById('copy_key_ios3');
                window.getSelection().selectAllChildren(key);
            }
            if (window.getSelection().anchorNode.parentNode.id == 'copy_key_ios4' && document.getElementById('copy_key_ios4').innerText != window.getSelection()) {
                var key = document.getElementById('copy_key_ios4');
                window.getSelection().selectAllChildren(key);
            }
            if (window.getSelection().anchorNode.parentNode.id == 'copy_key_ios5' && document.getElementById('copy_key_ios5').innerText != window.getSelection()) {
                var key = document.getElementById('copy_key_ios5');
                window.getSelection().selectAllChildren(key);
            }
        }, false);

    


    var ua = navigator.userAgent.toLowerCase();
    if (ua.match(/iphone/i) == "iphone" || ua.match(/ipad/i) == "ipad") {

        $('.fq-explain span').html("长按框内 > 拷贝");

    } else {
        $("#copy_key_ios").hide();
        $("#copy_key_ios1").hide();
        $("#copy_key_ios2").hide();
        $("#copy_key_ios3").hide();
        $("#copy_key_ios4").hide();
        $('#copy_key_ios5').hide();
        $("#copy_key_android").show();
        $("#copy_key_android1").show();
        $("#copy_key_android2").show();
        $("#copy_key_android3").show();
        $("#copy_key_android4").show();
        $("#copy_key_android5").show();
    }

  if(document.getElementById("copy_key_android")){
        var taokouling_value = document.getElementById("copy_key_android").value;
        function regain() {
            document.getElementById('copy_key_android').value = taokouling_value;
        }
    }
    if(document.getElementById("copy_key_android1")){
        var taokouling_value1 = document.getElementById("copy_key_android1").value;
        function regain1() {
            document.getElementById('copy_key_android1').value = taokouling_value1;
        }
    }
    if(document.getElementById("copy_key_android2")){
        var taokouling_value2 = document.getElementById("copy_key_android2").value;
        function regain2() {
            document.getElementById('copy_key_android2').value = taokouling_value2;
        }
    }
    if(document.getElementById("copy_key_android3")){
        var taokouling_value3 = document.getElementById("copy_key_android3").value;
        function regain3() {
            document.getElementById('copy_key_android3').value = taokouling_value3;
        }
    }
    if(document.getElementById("copy_key_android4")){
        var taokouling_value4 = document.getElementById("copy_key_android4").value;
        function regain4() {
            document.getElementById('copy_key_android4').value = taokouling_value4;
        }
    }
    if(document.getElementById("copy_key_android5")){
        var taokouling_value5 = document.getElementById("copy_key_android5").value;
        function regain5() {
            document.getElementById('copy_key_android5').value = taokouling_value4;
        }
    }



    $('.am-panel-title').click(function () {
        if ($("#product-details").is(":hidden")) {
            $("#change_icon").removeClass('am-icon-angle-right').addClass('am-icon-angle-down');
            $('.am-tab-panel').html('<span class="am-center am-text-center am-margin-vertical-xs">图片努力加载中<i class="am-icon-spinner am-icon-pulse am-margin-left-xs"></i></span>');
        } else {
            $("#change_icon").removeClass('am-icon-angle-down').addClass('am-icon-angle-right');
        }
        var itemid = $(this).attr('data-itemid');
        getiteminfo(itemid);
    });
    
       });
       
    function getiteminfo(itemid) {
        $.ajax({
            url: "https://hws.m.taobao.com/cache/mtop.wdetail.getItemDescx/4.1/?data=%7Bitem_num_id%3A" + itemid + "%7D&type=jsonp&dataType=jsonp",
            dataType: 'jsonp',
            jsonp: 'callback',
            success: function (result) {
                if (result.ret[0] == "SUCCESS::接口调用成功") {
                    var len = result.data.images.length;
                    var image = new Array();
                    for (var i = 0; i < len; i++) {
                        image[i] = '<img src="' + result.data.images[i] + '">';
                    }
                    $('.am-tab-panel').html(image);
                } else {
                    $("#qf_alert_info").html("宝贝数据调用失败，原因：" + result.ret[0]);
                    $('#qf_alert').modal();
                }
            }
        });
    }

    function post(URL, PARAMS) {
        var temp = document.createElement("form");
        temp.action = URL;
        temp.method = "post";
        temp.style.display = "none";
        for (var x in PARAMS) {
            var opt = document.createElement("textarea");
            opt.name = x;
            opt.value = PARAMS[x];
            temp.appendChild(opt);
        }
        document.body.appendChild(temp);
        temp.submit();
        return temp;
    }
   
<if condition="$uptime gt 2000 ">
$(document).ready(function(){
var Pid=$('#Pid').val();
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
    });
});
</if>


</script>
<div class="am-hide"></div>
<yh:load type="js" href="__STATIC__/mobile/assets/js/base.js" />
</body>
</html>