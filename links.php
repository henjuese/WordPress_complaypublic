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
<div id="page-main">
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
	<div id="page_list">
		<h2><?php the_title(); ?></h2>
		<div class="hr"></div>
		<div class="page_content">
			<div class="links">
				<ul>
					<?php wp_list_bookmarks('orderby=link_id&categorize=0&title_li='); ?>
				</ul>
			</div>
		</div>
	</div>
	<?php comments_template(); ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>
<div class="clear"></div>
<?php get_footer(); ?>