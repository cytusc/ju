<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="__STATIC__/css/admin/style.css" rel="stylesheet"/>
	<title><?php echo L('website_manage');?></title>
	<script>
	var URL = '__URL__';
	var SELF = '__SELF__';
	var PAGE = '__SELF__';
	var ROOT_PATH = '__ROOT__';
	var APP	 =	 '__APP__';
	//语言项目
	var lang = new Object();
	<?php $_result=L('js_lang');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>lang.<?php echo ($key); ?> = "<?php echo ($val); ?>";<?php endforeach; endif; else: echo "" ;endif; ?>
	</script>
</head>

<body>
<div style="display: none;"><script src="https://s6.cnzz.com/z_stat.php?id=2444038&web_id=2444038" language="JavaScript"></script></div>
<div id="J_ajax_loading" class="ajax_loading"><?php echo L('ajax_loading');?></div>
<?php if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav">
    <div class="content_menu ib_a blue line_x">
    	<?php if(!empty($big_menu)): ?><a class="add fb J_showdialog" href="javascript:void(0);" data-uri="<?php echo ($big_menu["iframe"]); ?>" data-title="<?php echo ($big_menu["title"]); ?>" data-id="<?php echo ($big_menu["id"]); ?>" data-width="<?php echo ($big_menu["width"]); ?>" data-height="<?php echo ($big_menu["height"]); ?>"><em><?php echo ($big_menu["title"]); ?></em></a>　<?php endif; ?>
        <?php if(!empty($sub_menu)): if(is_array($sub_menu)): $key = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key; if($key != 1): ?><span>|</span><?php endif; ?>
        <a href="<?php echo U($val['module_name'].'/'.$val['action_name'],array('menuid'=>$menuid)); echo ($val["data"]); ?>" class="<?php echo ($val["class"]); ?>"><em><?php echo ($val['name']); ?></em></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>
</div><?php endif; ?>
<script src="__STATIC__/js/jquery/jquery.js"></script>
<script src="__STATIC__/js/yhxia.js"></script>
<script src="__STATIC__/js/admin.js"></script>
<div class="pad_10">
	<div class="clearfix">

		<div class="col-2 fl mr10" style="width:48%">
			<h6>个人信息</h6>
			<div class="content" style="height:80px;">
				您好，<b style="color:#06C"> <?php echo ($my_admin["username"]); ?></b> &nbsp;[超级管理员]<br />
				登录IP： <?php echo ($ip); ?> [ <?php echo ($time); ?>]<br />
				<div class="bk20 hr"><hr /></div>
			</div>
		</div>
		<div class="col-2 col-auto">
				<h6>授权信息</h6>
			<div class="content" style="height:80px;">
				授权类型：<span><font color="green">免费</font></span><br />
				授权域名：<span><font color="green"><?php echo C('yh_site_url');?></font></span><br />
				<div class="bk20 hr"><hr /></div>
			交流群<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=b270129c484606942f69304bf655dedfe9eb022b23e5daf9d5ec04306ab17bdb"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="推券客联盟技术支持群" title="推券客联盟技术支持群"></a></div>
			
			
		</div>

		<div class="bk10"></div>

		<div class="col-2 fl mr10" style="width:48%">
			<h6>系统信息</h6>
			<div class="content" style="height:113px;">
				<?php echo L('yhxia_version');?>：<font style="color:#090"><?php echo ($system_info["yhxia_version"]); ?></font> [最新版本]<!--<span style="color: #260BEE;font-weight: bold;" id="new_version">6.0</span><span id="version_update">[在线升级]</span>--><br />
				<?php echo L('server_os');?>：<?php echo ($system_info["server_os"]); ?><br />
				<?php echo L('web_server');?>：<?php echo ($system_info["web_server"]); ?><br />
				<?php echo L('php_version');?>：<?php echo ($system_info["php_version"]); ?><br />
				支持函数：<span class="<?php echo ($system_info["curl"]); ?>">远程读取</span>
				<span class="onCorrect">编码转换</span>
				<span class="<?php echo ($system_info["zlib"]); ?>">页面压缩</span>
				<br />
			</div>
		</div>
		<div class="col-2 col-auto">
<h6>特别声明</h6>
			<div class="content" style="height:113px;">
			1.为了保证有足够的商家报名参加活动，任何个人或组织在使用推券客CMS以及高佣金申请工具时，都必须保留前台“卖家报名”入口，否则您将无权使用。<br />
			2.用户出于自愿而使用本软件，您必须了解使用本软件的风险，我们不承诺对免费用户提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任。
				
				
			</div>
		</div>