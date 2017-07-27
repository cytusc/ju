		<div class="index-wrapper">
			<div class="swiper-container" style="width: 100%;">
				<div class="swiper-wrapper">
					<volist name="ad_list" id="ad">
					<div class="swiper-slide">
						<a rel="external" href="{$ad.url}" target="_blank">
							<img style="width: 100%;" src="{$ad.img}" alt="{$ad.name}"/>
						</a>
					</div>
					</volist>
				</div>
			</div>
			<div class="icon-link-wrapper" style="padding-top: 10px;">
				<ul class="icon-url-list clearfix">
					<li class="icon-99">
						<a rel="external" href="{:U('index/cate',array('cid'=>'1'))}">
							<img src="/static/wap/images/icon-nz.png" alt="">
							<span>女士服装</span>
						</a>
					</li>
					<li class="icon-99">
						<a rel="external" href="{:U('index/cate',array('cid'=>'2'))}">
							<img src="/static/wap/images/icon-nsfz.png" alt="">
							<span>男士服装</span>
						</a>
					</li>
					<li class="icon-recommend">
						<a rel="external" href="{:U('index/cate',array('cid'=>'6'))}">
							<img src="/static/wap/images/icon-meizhuangs.png" alt="">
							<span>美妆洗护</span>
						</a>
					</li>
					<li class="icon-jujia">
						<a rel="external" href="{:U('index/cate',array('cid'=>'12'))}">
							<img src="/static/wap/images/icon-jujiao.png" alt="">
							<span>居家日用</span>
						</a>
					</li>
					<li class="icon-meishi">
						<a rel="external" href="{:U('index/cate',array('cid'=>'8'))}">
							<img src="/static/wap/images/icon-meishi.png" alt="">
							<span>美食小吃</span>
						</a>
					</li>
				
					<li class="icon-recommend">
						<a rel="external" href="{:U('index/cate',array('cid'=>'9'))}">
							<img src="/static/wap/images/icon-ny.png" alt="">
							<span>女士内衣</span>
						</a>
					</li>
					<li class="icon-jujia">
						<a rel="external" href="{:U('index/cate',array('cid'=>'3'))}">
							<img src="/static/wap/images/icon-xb.png" alt="">
							<span>鞋包服饰</span>
						</a>
					</li>
					<li class="icon-meishi">
						<a rel="external" href="{:U('index/cate',array('cid'=>'7'))}">
							<img src="/static/wap/images/icon-my.png" alt="">
							<span>母婴必备</span>
						</a>
					</li>
				</ul>
			</div>
 	
</div>
