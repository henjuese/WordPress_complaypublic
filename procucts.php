<?php
/**
 * Template Name: 产品列表
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
</div>
<div id="divcom">
	<span class="picScroll-title2">产品展示</span>
	<div class="picScroll-left2">
			<div class="bd">
				<ul class="picList">
				<?php if(have_posts()) : ?>
				<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
				<?php query_posts('paged='.$paged.'&cat='.get_option('lovnvns_show').'&showposts=9');?>
				<?php while(have_posts()) : the_post(); ?>
					<li class="list">
						<div class="pic">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<img src="<?php echo catch_the_image($post->ID)?>"/></a>
						</div>
						<?php //echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
						<div class="title">
						      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</div>
					</li>
					<?php endwhile; ?>
				<?php endif; ?>
				</ul>
				<?php pagenavi(); ?>
			</div>
	</div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>