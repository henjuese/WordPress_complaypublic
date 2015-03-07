<?php
/**
 * Template Name: 链接
 *
 */
 get_header(); ?>
<div id="gongaobox">
	<div id="gongao">
		当前位置：
		<a href="<?php bloginfo('siteurl'); ?>/" title="返回首页">首页</a>
		>
		<?php the_title(); ?></div>
	<!-- <div id="gongaor">
		建站日期： <strong><?php echo get_option('lovnvns_date');?></strong>
		运行天数： <strong><?php echo floor((time()-strtotime(get_option('lovnvns_date')))/86400); ?></strong>
		天　最后更新：
		<strong>
			<?php $last = $wpdb->
			get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");$last = date('Y-n-j', strtotime($last[0]->MAX_m));echo $last; ?></strong> 
	</div> -->
</div>
<div class="banner_top">
<?php include('includes/subtopbanner.php') ?>
</div>
<div id="divcom">
	<div class="main">
		
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/banner.js"></script>
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
	<script type="text/javascript">
jQuery(document).ready(function($){
$(".weisaylink a").each(function(e){
	$(this).prepend("<img src=http://www.google.com/s2/favicons?domain="+this.href.replace(/^(http:\/\/[^\/]+).*$/, '$1').replace( 'http://', '' )+" style=float:left;padding:5px;>");
}); 
});
</script>
	<div id="divleft">
		<div id="single_list">
			<h2>
				<?php the_title(); ?></h2>
			<div class="hr"></div>
			<div class="single_content">
				<p> <b>链接名称</b>
					：
					<a href="<?php bloginfo('siteurl'); ?>
						/">
						<strong>
							<?php bloginfo('name'); ?></strong>
					</a>
					<br /> <b>链接地址</b>
					：
					<a href="<?php bloginfo('siteurl'); ?>
						/">
						<?php bloginfo('siteurl'); ?>/</a>
				</p>
				<div class="links">
					<ul>
						<?php wp_list_bookmarks('orderby=link_id&categorize=0&title_li='); ?></ul>
				</div>
			</div>
		</div>
	</div>
	<?php comments_template(); ?></div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_sidebar(); ?></div>
<div class="clear"></div>
<?php get_footer(); ?>