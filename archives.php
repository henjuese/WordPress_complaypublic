<?php
/**
 * Template Name: 归档
 *
 */
 get_header(); ?>
<script type="text/javascript">
		/* <![CDATA[ */
			jQuery(document).ready(function() {
                function setsplicon(c, d) {
                    if (c.html()=='+' || d=='+') {
                        c.html('-');
                        c.removeClass('car-plus');
                        c.addClass('car-minus');
                    } else if( !d || d=='-'){
                        c.html('+');
                        c.removeClass('car-minus');
                        c.addClass('car-plus');
                    }
                }
				jQuery('.car-collapse').find('.car-yearmonth').click(function() {
					jQuery(this).next('ul').slideToggle('fast');
                    setsplicon(jQuery(this).find('.car-toggle-icon'));
				});
				jQuery('.car-collapse').find('.car-toggler').click(function() {
					if ( '展开所有月份' == jQuery(this).text() ) {
						jQuery(this).parent('.car-container').find('.car-monthlisting').show();
						jQuery(this).text('折叠所有月份');
                       setsplicon(jQuery('.car-collapse').find('.car-toggle-icon'), '+');
					}
					else {
						jQuery(this).parent('.car-container').find('.car-monthlisting').hide();
						jQuery(this).text('展开所有月份');
                        setsplicon(jQuery('.car-collapse').find('.car-toggle-icon'), '-');
					}
					return false;
				});
			});
		/* ]]>*/</script>
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
<div id="divcom">
	<div class="main">
		<?php include('includes/subtopbanner.php') ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/banner.js"></script>
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
	<div id="archives">
		<h2>
			<?php the_title(); ?></h2>
		<div class="hr"></div>
		<div class="single_content">
			<strong>
				<?php bloginfo('name'); ?></strong>
			目前共有文章：
			<?php echo $hacklog_archives->
			PostCount();?>篇
			<?php echo $hacklog_archives->PostList();?></div>
	</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_sidebar(); ?></div>
<div class="clear"></div>
<?php get_footer(); ?>