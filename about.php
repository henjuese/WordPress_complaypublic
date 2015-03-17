<?php
/**
 * Template Name: 关于
 *
 */
 get_header(); ?>
<div id="gongaobox">
	<div id="gongao">
		当前位置：
		<a href="<?php bloginfo('siteurl'); ?>/" title="返回首页">首页</a>
		>
		<?php the_title(); ?>
	</div>
	<!-- <div id="gongaor">
	建站日期： <strong><?php echo get_option('lovnvns_date');?></strong>
	运行天数： <strong><?php echo floor((time()-strtotime(get_option('lovnvns_date')))/86400); ?></strong>
	天　最后更新：
	<strong>
		<?php $last = $wpdb->
		get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");$last = date('Y-n-j', strtotime($last[0]->MAX_m));echo $last; ?></strong> 
</div>
-->
</div>
<div id="divcom">
<?php include('includes/subtopbanner.php') ?>
</div>
<div class="clear"></div>
<div id="about-com">
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<div id="about-content">
			<h2><?php the_title(); ?></h2>
			<div class="hr"></div>
			<div class="about-content-l">
				<?php the_content(); ?>
			</div>
			<div class="about-content-r">
				<?php if(get_option('lovnvns_sitemap_baidu')!="") echo get_option('lovnvns_sitemap_baidu');else echo "" ?>
			</div>
	     </div>
	     <div class="bdsharebutton">
			<!-- Baidu Button BEGIN -->
		<div class="bdsharebuttonbox">
		   
		    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
		    <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
		    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
		    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
		    <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
		    <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
		    <a href="#" class="bds_taobao" data-cmd="taobao" title="分享到我的淘宝"></a>
		    <a href="#" class="bds_bdhome" data-cmd="bdhome" title="分享到百度新首页"></a>
		    <a href="#" class="bds_tsohu" data-cmd="tsohu" title="分享到搜狐微博"></a>
		    <a href="#" class="bds_tqf" data-cmd="tqf" title="分享到腾讯朋友"></a>
		    <a href="#" class="bds_mail" data-cmd="mail" title="分享到邮件分享"></a>
		    <a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a>
		    <a href="#" class="bds_more" data-cmd="more"></a>
		</div>
		<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":["mshare","qzone","sqq","weixin","tsina","renren","bdhome","bdysc","taobao","tqq","tqf","mail","tsohu","copy","print"],"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
		<!-- Baidu Button END -->
		</div>
		<?php comments_template(); ?>
	<?php endwhile; ?>
<?php endif; ?>

</div>
<div class="clear"></div>
<?php get_footer(); ?>