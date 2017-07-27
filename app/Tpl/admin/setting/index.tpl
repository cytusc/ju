<include file="public:header" />
<div class="pad_lr_10">
	<form id="info_form" action="{:u('setting/edit')}" method="post" enctype="multipart/form-data">
	<table width="100%" class="table_form">
    	<tr>
        	<th>{:L('site_status')} :</th>
        	<td>
            	<label><input type="radio" class="J_change_status" <if condition="C('yh_site_status') eq '1'">checked="checked"</if> value="1" name="setting[site_status]"> {:L('open')}</label> &nbsp;&nbsp;
                <label><input type="radio" class="J_change_status" <if condition="C('yh_site_status') eq '0'">checked="checked"</if> value="0" name="setting[site_status]"> {:L('close')}</label>
            </td>
    	</tr>

    	<tr>
        	<th>跳转WAP :</th>
        	<td>
            	<label><input type="radio" class="J_change_status" <if condition="C('yh_site_tiaozhuan') eq '1'">checked="checked"</if> value="1" name="setting[site_tiaozhuan]"> {:L('open')}</label> &nbsp;&nbsp;
                <label><input type="radio" class="J_change_status" <if condition="C('yh_site_tiaozhuan') eq '0'">checked="checked"</if> value="0" name="setting[site_tiaozhuan]"> {:L('close')}</label>
            </td>
    	</tr>
    	 	<tr>
        	<th>开启图片延时加载 :</th>
        	<td>
            	<label><input type="radio" class="J_change_status" <if condition="C('yh_site_secret') eq '1'">checked="checked"</if> value="1" name="setting[site_secret]"> {:L('open')}</label> &nbsp;&nbsp;
                <label><input type="radio" class="J_change_status" <if condition="C('yh_site_secret') eq '0'">checked="checked"</if> value="0" name="setting[site_secret]"> {:L('close')}</label>
            </td>
    	</tr>
    	
        <tr>
            <th width="150">{:L('site_name')} :</th>
            <td><input type="text" name="setting[site_name]" class="input-text" size="30" value="{:C('yh_site_name')}"></td>
        </tr>
		<tr>
            <th width="150">{:L('site_url')} :</th>
            <td><input type="text" name="setting[site_url]" class="input-text" size="30" value="{:C('yh_site_url')}">
				<span class="gray ml10">电脑版首页网址必须以 http:// 开头</span>
			</td>
       </tr> 
        <tr>
            <th width="150">WAP地址 :</th>
            <td>
                <input type="text" name="setting[headerm_html]" class="input-text" size="30" value="{:C('yh_headerm_html')}">
				<span class="gray ml10">手机版首页网址必须以 http:// 开头</span>
			</td>
        </tr>
        <tr>
            <th>{:L('site_icp')} :</th>
            <td><input type="text" name="setting[site_icp]" class="input-text" size="30" value="{:C('yh_site_icp')}">
				<span class="gray ml10">备案号如：苏ICP备05909090号 </span>
            </td>
        </tr>
		<tr>
            <th>QQ号码 :</th>
            <td><input type="text" name="setting[qq]" class="input-text" size="30" value="{:C('yh_qq')}"></td>
        </tr>
		
		<tr>
			<th width="10%">Appkey :</th>
        	<td width="40%">
				<input type="text" name="setting[taobao_appkey]" class="input-text" size="45" value="{:C('yh_taobao_appkey')}" placeholder="联盟合作网站API Appkey ">
            </td>
		</tr>
		
		<tr>
			<th width="10%">App Secret :</th>
        	<td width="40%">
				<input type="text" name="setting[taobao_appsecret]" class="input-text" size="45" value="{:C('yh_taobao_appsecret')}" placeholder="联盟合作网站API App Secret">
            </td>
		</tr>
		
     
	 <!--	<tr>
            <th width="150">AppSecret(应用密钥):</th>
            <td>
                <input type="text" name="setting[site_secret]" placeholder="微信公众号应用密钥" class="input-text" size="50" value="{:C('yh_site_secret')}" /><br>
	           </td>
        </tr>
		-->
		<tr>
			<th width="150">通行密钥 :</th>
			<td><input type="text" name="setting[gongju]" class="input-text" size="50" value="{:C('yh_gongju')}" /><br><span class="gray ml10">请复制推券客高佣金申请工具中的通行密钥填写</span></td>
		</tr>
		
		<!--<tr>
			<th width="150">Token :</th>
			<td><input type="text" name="setting[token]" class="input-text" size="50" value="{:C('yh_token')}" /></td>
		</tr>-->
     <tr>
			<th width="10%">pc版头部文字 :</th>
        	<td width="40%">
        		 <textarea rows="3" cols="80" name="setting[app_key]">{:C('yh_app_key')}</textarea> 
				
            </td>
		</tr>

        <tr>
            <th>{:L('statistics_code')} :</th>
            <td>
                <textarea rows="6" cols="80" name="setting[statistics_code]">{:C('yh_statistics_code')}</textarea> 
				<span class="gray ml10"><br>统计代码需要你自己去CNZZ 或 百度 申请 <a href="http://www.cnzz.com/" target="_blank">http://www.cnzz.com/</a>  <a href="http://tongji.baidu.com" target="_blank">http://tongji.baidu.com</a></span>
			</td>
           
      </tr>

		<tr>
            <th width="150">淘点金代码 :</th>
            <td>
                <textarea rows="6" cols="80" name="setting[taojindian_html]">{:C('yh_taojindian_html')}</textarea>
            </td>
        </tr>
        <tr id="J_closed_reason" <if condition="C('yh_site_status') eq 1">class="hidden"</if>>
        	<th>{:L('closed_reason')} :</th>
        	<td><textarea rows="4" cols="50" name="setting[closed_reason]" id="closed_reason">{:C('yh_closed_reason')}</textarea></td>
    	</tr>
        <tr>
        	<th></th>
        	<td><input type="hidden" name="menuid"  value="{$menuid}"/><input type="submit" class="smt mr10" value="{:L('submit')}"/></td>
    	</tr>
	</table>
	</form>
</div>
<include file="public:footer" />
<script>
$(function(){
    $('.J_change_status').live('click', function(){
        if($(this).val() == '0'){
            $('#J_closed_reason').fadeIn();
        }else{
            $('#J_closed_reason').fadeOut();
        }
    });
});
</script>
</body>
</html>