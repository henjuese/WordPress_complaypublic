<?php get_header(); ?>
<div id="gongaobox">
	<div id="gongao">
		<?php if ( is_category() ) { ?>
		当前位置：
		<a href="<?php bloginfo('siteurl'); ?>/" title="返回首页">首页</a>
		>
		<?php echo is_wp_error($cat_parents=get_category_parents( get_query_var('cat') , true , ' >' ))?"":$cat_parents ?>文章
		<?php } ?>
		<?php if ( is_month() ) { ?>
		当前位置：
		<a href="<?php bloginfo('siteurl'); ?>/" title="返回首页">首页</a>
		>
		<?php the_time('Y, F'); ?>
		<?php } ?>
		<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?>
		当前位置：
		<a href="<?php bloginfo('siteurl'); ?>/" title="返回首页">首页</a>
		> 标签 >
		<?php single_tag_title(); ?>
		<?php } ?>
		<?php if ( is_day() ) { ?>
		当前位置：
		<a href="<?php bloginfo('siteurl'); ?>/" title="返回首页">首页</a>
		>
		<?php the_time('Y, F jS'); ?>
		<?php } ?>
		<?php if ( is_year() ) { ?>
		当前位置：
		<a href="<?php bloginfo('siteurl'); ?>/" title="返回首页">首页</a>
		>
		<?php the_time('Y'); ?>
		<?php } ?>
		<?php if ( is_author() ) { ?>
		当前位置：
		<a href="<?php bloginfo('siteurl'); ?>/" title="返回首页">首页</a>
		> 作者文章列表
		<?php } ?>
		<?php if ( isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		当前位置：
		<a href="<?php bloginfo('siteurl'); ?>/" title="返回首页">首页</a>
		> 存档
		<?php } ?>
		<?php } ?></div>
	<!-- <div id="gongaor">
		建站日期： <strong><?php echo get_option('lovnvns_date');?></strong>
		运行天数： <strong><?php echo floor((time()-strtotime(get_option('lovnvns_date')))/86400); ?></strong>
		天　最后更新：
		<strong>
			<?php $last = $wpdb->
			get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");$last = date('Y-n-j', strtotime($last[0]->MAX_m));echo $last; ?></strong> 
	</div> -->
</div>
<div id="divcom">
     <?php include('includes/subtopbanner.php') ?>
	<div class="main">
		
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/banner.js"></script>
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
	<div id="divleft">
		<div id="post_list">
			<span>
				<?php comments_popup_link ('0°','+1°','+%°'); ?></span>
			<h2>
				<a href="<?php the_permalink() ?>
					" rel="bookmark" title="
					<?php the_title_attribute(); ?>
					">
					<?php the_title(); ?></a>
			</h2>
			<div class="hr"></div>
			<p>
				<?php the_time('Y年m月d日') ?>
				| 作者:
				<?php the_author (); ?>
				|
				<?php if(function_exists('the_views')) { print '被围观 '; the_views();  } ?>
				<?php edit_post_link('编辑', ' | '); ?></p>
			<div id="post_listl">
				<?php include('includes/thumbnail.php'); ?></div>
			<div id="post_listr">
				<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 420,"......"); ?></div>
			<div id="post_list_tags">
				关键词：
				<?php the_tags('', ', ', ''); ?></div>
			<div id="post_list_more">
				<a href="<?php the_permalink() ?>
					" title="详细阅读
					<?php the_title(); ?>" rel="bookmark" class="title">详细阅读</a>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
	<?php pagination($query_string); ?>
	<?php endif; ?></div>
<?php get_sidebar(); ?></div>
<div class="clear"></div>
<?php get_footer(); ?>