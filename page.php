<?php get_header(); ?>
<div id="gongaobox">
	<div id="gongao">
		当前位置：
		<a href="<?php bloginfo('siteurl'); ?>/" title="返回首页">首页</a>	>  <?php the_title(); ?></div>
</div>
<div id="divcom">
<?php include('includes/subtopbanner.php') ?>
<div id="page-main">
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
	<div id="page_list">
		<h2><?php the_title(); ?></h2>
		<div class="hr"></div>
		<div class="page_content">
			<?php the_content(); ?>
		</div>
	</div>
<?php comments_template(); ?>
</div>
<?php endwhile; ?>
<?php endif; ?></div>
<div class="clear"></div>
<?php get_footer(); ?>