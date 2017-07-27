<!doctype html>
<html lang="zh-CN">
	<head>
		<include file="public:head" />
	</head>
	<body>
	<div id="load-more">
		<include file="public:header" />
		<include file="public:lunbo" />
		<include file="public:automatic_list" />
		<div class="page">
			{$page}
		</div>
	</div>
	
	<div class="category-box clear">
		<ul>
			<li>
				<a href="" target="_blank" class="qg-item qg-ing">
				    <div class="qg-img">
				        <img src="__STATIC__/tuiquanke/images/mm.jpg">
				    </div>
				    <div class="qg-detail">
				        <div class="name">
				            <p class="des">珂卡芙罗马凉鞋女夏2017新款韩</p>
	                        <p class="subtitle">品牌直供全国包邮</p>
	                   	</div>			
				        <div class="link">
				            <div class="price">
				                <span class="original-price">¥<i>273</i></span>
				                <span class="promo-price">¥<em>99</em></span>
				            </div>
				            <div class="link-btn">
				                             立即抢购
				            </div>
				        </div>
					</div>
				</a>
			</li>
			<li>
				<a href="" target="_blank" class="qg-item qg-ing">
				    <div class="qg-img">
				        <img src="__STATIC__/tuiquanke/images/mm.jpg">
				    </div>
				    <div class="qg-detail">
				        <div class="name">
				            <p class="des">珂卡芙罗马凉鞋女夏2017新款韩</p>
	                        <p class="subtitle">品牌直供全国包邮</p>
	                   	</div>			
				        <div class="link">
				            <div class="price">
				                <span class="original-price">¥<i>273</i></span>
				                <span class="promo-price">¥<em>99</em></span>
				            </div>
				            <div class="link-btn">
				                             立即抢购
				            </div>
				        </div>
					</div>
				</a>
			</li>
			<li>
				<a href="" target="_blank" class="qg-item qg-ing">
				    <div class="qg-img">
				        <img src="__STATIC__/tuiquanke/images/mm.jpg">
				    </div>
				    <div class="qg-detail">
				        <div class="name">
				            <p class="des">珂卡芙罗马凉鞋女夏2017新款韩</p>
	                        <p class="subtitle">品牌直供全国包邮</p>
	                   	</div>			
				        <div class="link">
				            <div class="price">
				                <span class="original-price">¥<i>273</i></span>
				                <span class="promo-price">¥<em>99</em></span>
				            </div>
				            <div class="link-btn">
				                             立即抢购
				            </div>
				        </div>
					</div>
				</a>
			</li>
			<li>
				<a href="" target="_blank" class="qg-item qg-ing">
				    <div class="qg-img">
				        <img src="__STATIC__/tuiquanke/images/mm.jpg">
				    </div>
				    <div class="qg-detail">
				        <div class="name">
				            <p class="des">珂卡芙罗马凉鞋女夏2017新款韩</p>
	                        <p class="subtitle">品牌直供全国包邮</p>
	                   	</div>			
				        <div class="link">
				            <div class="price">
				                <span class="original-price">¥<i>273</i></span>
				                <span class="promo-price">¥<em>99</em></span>
				            </div>
				            <div class="link-btn">
				                             立即抢购
				            </div>
				        </div>
					</div>
				</a>
			</li>
			<li>
				<a href="" target="_blank" class="qg-item qg-ing">
				    <div class="qg-img">
				        <img src="__STATIC__/tuiquanke/images/mm.jpg">
				    </div>
				    <div class="qg-detail">
				        <div class="name">
				            <p class="des">珂卡芙罗马凉鞋女夏2017新款韩</p>
	                        <p class="subtitle">品牌直供全国包邮</p>
	                   	</div>			
				        <div class="link">
				            <div class="price">
				                <span class="original-price">¥<i>273</i></span>
				                <span class="promo-price">¥<em>99</em></span>
				            </div>
				            <div class="link-btn">
				                             立即抢购
				            </div>
				        </div>
					</div>
				</a>
			</li>
			<li>
				<a href="" target="_blank" class="qg-item qg-ing">
				    <div class="qg-img">
				        <img src="__STATIC__/tuiquanke/images/mm.jpg">
				    </div>
				    <div class="qg-detail">
				        <div class="name">
				            <p class="des">珂卡芙罗马凉鞋女夏2017新款韩</p>
	                        <p class="subtitle">品牌直供全国包邮</p>
	                   	</div>			
				        <div class="link">
				            <div class="price">
				                <span class="original-price">¥<i>273</i></span>
				                <span class="promo-price">¥<em>99</em></span>
				            </div>
				            <div class="link-btn">
				                             立即抢购
				            </div>
				        </div>
					</div>
				</a>
			</li>
		</ul>
	</div>
	
	
	<div class="clearfix"></div>
	<include file="public:footer" />
	<script language="javascript">
		$(document).ready(function () {
			var mySwiper = new Swiper('.swiper-container', {
				loop: true,
				autoplay: 2500
			});
			maxScrollY = $(document).height();
			windowHeight = $(window).height();
			$(window).on('resize', function () {
				windowHeight = $(window).height();
			});
			$(document).on("scrollstop", function (e) {
				if (isFinish || isLoading) {
					return;
				}
				var y = $(document).scrollTop();
				maxScrollY = $(document).height();
				windowHeight = $(window).height();
				if (Math.abs(maxScrollY - windowHeight - y) > 100) {
					return;
				}
				var $wrapper = $(this);
				if (!$pullUp) {
					$pullUp = $wrapper.find('.pullup-goods');
				}
				var data = null;
				getData($wrapper, data, 1);
			});
		});
	</script>
	</body>
</html>