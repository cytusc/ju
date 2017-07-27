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
								<input autocomplete="off" value="{$key}" type="text" name="k" placeholder="请输入您要搜索的商品名称">
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
		<div class="nav-bar">
			<ul class="nav-bar-list clearfix">
				<li <if condition="($nav_curr neq 'top100') AND ($nav_curr neq 'jingxuan')">class="active"<else/> rel="external"</if>><a rel="external" href="{:U("xinpin/index")}">今日新品</a></li>
				<li <if condition="$nav_curr eq 'jingxuan'">class="active"<else/> rel="external"</if>><a href="{:U("jingxuan/index")}">优品特卖</a></li>
				<li <if condition="$nav_curr eq 'top100'">class="active"<else/> rel="external"</if>><a href="{:U("top100/index")}">超级人气榜</a></li>
			</ul>
		</div>