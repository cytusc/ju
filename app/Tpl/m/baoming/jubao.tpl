<!doctype html>
<html lang="zh-CN">
<head>
<include file="public:top" />
<style>
.baominginput{margin-top: 15px; margin-bottom: 15px;}
.am-form input[type="text"] {
    transition: none; 
     background: #ffffff; 
    border: 0;
    width: 100%;
}
</style>
</head>
<body>

<div class="main">
<!-- 栏目样式一 -->
<nav class="am-padding-top-xs fq-background-white" >
            <ul class="am-avg-sm-4">
                <li class="am-text-center column_list">
                    <a class="am-block
                        active" href="/">
                        <i class="am-block am-icon-h-square"></i>
                        <span class="am-text-sm am-block">
                            最新推荐   </span>
                    </a>
                </li>

                <li class="am-text-center column_list">
                    <a class="am-block
                        " href="/jiu">

                        <i class="am-icon-flash am-block"></i>
                        <span class="am-text-sm am-block ">
                            9.9包邮                        </span>
                    </a>
                </li>

                <li class="am-text-center column_list">
                    <a class="am-block
                        " href="/top100">
                        <i class="am-icon-line-chart icon-paixingbang am-block"></i>
                        <span class="am-text-sm am-block">
                            人气                        </span>
                    </a>
                </li>

                <li class="am-text-center">
                    <a class="am-block fq-classify " id="all_list" href="#doc-oc-demo1" data-am-offcanvas>
                        <i class="am-icon-th-large am-block"></i>
                        <span class="am-text-sm am-block">全部分类</span>
                    </a>
                </li>
            </ul>
 </nav>
 <!--导航栏-->
<div id="doc-oc-demo1" class="am-offcanvas">
  <div class="am-offcanvas-bar">
    <div class="am-offcanvas-content catelist">
<volist name="cate_list" id="cate"> 
<a class="cnzzCounter" href="{:U('/cate/',array('cid'=>$cate['id']))}">{$cate[name]}</a>
</volist>

    </div>
  </div>
</div>
   <!-- 单独推荐商品结束 -->
	
<div class="am-g" style="padding-top: 20px;">
  <div class="am-u-md-8 am-u-sm-centered">
<form action="/?m=baoming&a=report" method="post" id="report-form">
	<div class="am-alert am-alert-secondary" >如果发现优惠券失效，或者有其它违规行为，欢迎在这里举报给我们。</div>
      <fieldset class="am-form-set">
 <textarea style="width: 100%;" required="required" name="reason"  placeholder="" rows="7"></textarea>
      </fieldset>
      <input type="hidden" name="from" value="{$_SERVER['HTTP_REFERER']}"/>
      <input type="hidden" name="url" value="https://item.taobao.com/item.htm?id={:I('num_iid')}"/>
	  <input type="hidden" name="num_iid" value="{:I('num_iid')}"/>
	 <input type="hidden" name="from" value="{$_SERVER['HTTP_REFERER']}"/>
      <button type="submit" id="smt" class="am-btn am-btn-primary am-btn-block">提交举报</button>
</form>
  </div>
</div>



    <div style="" class="am-text-xs am-text-center am-margin-vertical-sm">
        {:C('yh_site_name')} ©版权所有
    </div>
    
    
    
	
</div>


<div  class="header_content am-padding-vertical-xs am-sticky" id="navso" data-am-widget="navbar" style="z-index: 20000; bottom: 0px;">
    <div class="am-g">
        <div class="am-u-sm-2 am-text-center">
                <a href="/">
					<i class="am-icon-home am-icon-sm fq-text-white" style="font-size:2rem"></i>
					</a>
                            </div>
        <div class="am-u-sm-8 am-padding-0">
            <form  method="get" action="/?" name="k" id="search" class="am-form am-text-sm">
 	<input type="hidden" name="g" value="m">
<input type="hidden" name="m" value="index">
<input type="hidden" name="a" value="so">
                <input autocomplete="off"  name="k" type="text" class="fq-text am-radius am-padding-horizontal-xs fq-text-white" placeholder="输入您要查找的商品名称" value="">
                <i class="am-icon-search am-vertical-align-middle fq-text-sm" onclick="$('#search').submit()"></i>
    </form>
        </div>
        <div class="am-u-sm-2 am-text-center">
            <div class="am-inline-block  fq-text-sm " data-am-modal="{target: '#qrcode_large', closeViaDimmer: 0}" >
         <i class="am-icon-whatsapp am-icon-sm fq-text-white" style="font-size:2rem"></i>
            </div>
        </div>
    </div>
</div>

<div class="am-modal am-modal-no-btn" tabindex="-1" id="qrcode_large">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">
            <span class="am-text-sm">↓点击二维码长按识别↓</span>
            <a href="javascript: void(0)" class="am-close" style="top: -5px;right: 0px;" data-am-modal-close>&times;</a>
        </div>
        <div class="am-g">
            <figure data-am-widget="figure" class="am am-figure" data-am-figure="{pureview:'true'}">
                <div class="am-u-sm-6">
                	<img id="qrcode_img_large" src="{:C('yh_site_flogo')}" data-rel="{:C('yh_site_flogo')}" style="width:100%;"><span class="am-text-xs am-text-danger" style="top: -2px;position: relative;">加入微信群</span></div>       
                	<div class="am-u-sm-6"><img id="qrcode_img_large" src="{:C('yh_site_background')}" data-rel="{:C('yh_site_background')}" style="width:100%;"><span class="am-text-xs am-text-danger" style="top: -2px;position: relative;">客服微信</span></div>            </figure>
                  </div>
    </div>
</div>

<div class="am-hide"></div>
<script type="text/javascript" src="__STATIC__/mobile/assets/js/base.js"> </script>
<yh:load type="js" href="__STATIC__/tuiquanke/js/layer/layer.js" />
	<script>
		$('#report-form').submit(function(){
			$.post($(this).attr('action'), $(this).serialize(), function(json){
				if(json.status != 1){
					layer.msg(json.msg, {
						icon: 2
					});
					return false;
				}
				layer.msg(json.msg, {
					icon: 1
				}, function(){
					var index = parent.layer.getFrameIndex(window.name);
					parent.layer.close(index);
				});
			}, 'json');
			return false;
		});
	</script>
</body>
</html>