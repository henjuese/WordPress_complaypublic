<?php get_header(); ?>
<div id="gongaobox">
<span></span>
	<div id="gongao">
        <!--自己做了一个动态头部公告-->
	    <ul>
			<?php
		        $sticky = get_option('sticky_posts');
		        rsort( $sticky );
		        $sticky = array_slice( $sticky, 1, 2);
		        query_posts( 
		        	array( 
		        		'showposts' => 2,
		                'meta_query'=> array(array('key'=>'notice','value'=>'1'))
		        	 ) );
		        if (have_posts()) : 
		        	while (have_posts()) : the_post();
			?>
			<li>
				<a href="<?php the_permalink(); ?> "title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</li>
			<?php  endwhile;  endif;  ?>
		</ul>
</div>
<div id="nav_searchbox">
	<form action="<?php bloginfo('url'); ?>
		" method="get">
		<input onfocus="if(this.value=='请输入搜索内容'){this.value=''}" id="keyword" name="s" onkeypress="setBut('search')"   class="input" type="text" value="请输入搜索内容" onkeyup='suggest(event,this)' onblur='inputOnblur()' />
	</div>
	<div class="but">
		<input type="submit" id="submit" value="" class="sousuo" />
	</form>
</div>
</div>
<?php if ( is_home() ) { ?>
<div class="banner_top">
	<!--大幅广告start-->
	 <div class="adsS" style="display: none;">
		<?php 	if(get_option('lovnvns_date')!="")
    	echo get_option('lovnvns_date');
	?>
	</div>
	<div class="adsB">
		<?php 	if(get_option('lovnvns_banner_top')!="")
    	echo get_option('lovnvns_banner_top');
		?>
	</div>
	<!--大幅广告结束-->
	<div id="turn" class="turn">
		<div class="turn-loading">
			<img src="<?php bloginfo('template_directory'); ?>/images/loading.gif" /></div>
		<!--头部焦点广告-->
		<ul class="turn-pic">
			<?php if(get_option('lovnvns_banner_ad')!="") echo get_option('lovnvns_banner_ad');?>
		</ul>
	</div>
</div>
<?php } ?>

<div id="divcom">
<div class="main">
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/banner.js"></script>
<div id="divleft1">
<DIV id="imgPlay">
	<UL class=imgs id="actor">
		<?php $previous_posts = get_posts('numberposts=8&meta_key=banner&meta_value=on'); 
		foreach($previous_posts as $post) : setup_postdata($post); ?>
		<li>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php 
				   echo get_the_post_thumbnail($post_id, 'medium');
                   
				 ?>					 
			</a>
		</li>
		<?php endforeach; ?>
	</UL>
	<DIV class=num>
		<P class=lc></P>
		<P class=mc></P>
		<P class=rc></P>
	</DIV>
	<DIV class=num id=numInner></DIV>
	<DIV class=prev>上一张</DIV>
	<DIV class=next>下一张</DIV>
</DIV>
<div class="zt_con">
	<?php    

        $sticky = get_option('sticky_posts');
        rsort( $sticky );
        $sticky = array_slice( $sticky, 0, 1);
		//最热的新闻发前面
        query_posts( array( 'post__in' =>$sticky,
                            'caller_get_posts' => 1,
                            'showposts' => 1,
 							'meta_key'=>'hot',
 							'meta_value'=>'1'
                             ) );
        if (have_posts()) :
        while (have_posts()) : the_post();
	?>
		<h3>
			<a href="<?php the_permalink(); ?>
				" title="
				<?php the_title(); ?>
				">
				<?php the_title(); ?></a>
		</h3>
		<p>
			分类：
			<?php the_category(', ') ?>
			|
			<?php comments_popup_link ('评论数：0','评论数：1','评论数：%'); ?>
			|
			<?php //if(function_exists('the_views')) { print '被围观 '; the_views();  } ?>
			<?php post_views('浏览 ', ' 次'); ?>
			<?php edit_post_link('编辑', ' | '); ?></p>
		<span>
			<?php echo wp_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 90,"……"); ?></span>
		<?php endwhile; ?>
		<?php endif; ?>
		<div class="hr"></div>
		<ul>
			<?php
	        $sticky = get_option('sticky_posts');
	        rsort( $sticky );
	        $sticky = array_slice( $sticky, 1, 6);
			
	        query_posts( array( 'post__in' =>$sticky,
	        	                 'showposts' => 6,
	                           'caller_get_posts' => 1 ) );
	        if (have_posts()) :
	        while (have_posts()) : the_post();
			?>
			<li>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?></a>
			</li>
			<?php     endwhile;  endif;  ?>
		</ul>
</div>
</div>
<!--图片展示start-->
<?php if (get_option('lovnvns_show_on') == '1') { ?>
<div id="divleft">
	<ul class="artist_l">
		<?php query_posts( array(
		                     'showposts' =>18,
		                     'cat' =>get_option('lovnvns_show')
		                     )
		                  ); 
		       $i=1; 
		?>
		<?php while (have_posts()) : the_post(); ?>
		<li class="a<?php echo $i;$i++; ?>">
		    <img src="<?php echo catch_the_image($post->ID)?>"/>
			<?php //echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<?php { echo ''; } ?>
<?php } else { } ?>
<!--图片展示end-->

<!-- cms up -->
<div id="divleftcms">
<?php $display_categories = explode(',', get_option('lovnvns_up') ); 
foreach ($display_categories as $category) { ?>
<?php
	query_posts( array(
		'showposts' =>1,
		'cat' => $category,
		'post__not_in' => $do_not_duplicate
		)
	);
?>
<div id="divleftl">
	<?php while (have_posts()) : the_post(); ?>
	<div id="titlebg">
		<h3>
			<a href="<?php echo get_category_link($category);?>
				" rel="bookmark" title="更多
				<?php single_cat_title(); ?>
				的文章">
				<?php single_cat_title(); ?></a>
		</h3>
		<!-- <span class="counts">
			共有
			<span class="red">
				<?php echo wt_get_category_count(); ?></span>
			篇
		</span> -->
	</div>
	<div id="textlist">
		<h4>
			<a href="<?php the_permalink(); ?>
				" title="
				<?php the_title(); ?>
				">
				<?php the_title(); ?></a>
		</h4>
		<p>
			<?php the_time('Y年m月d日') ?>
			|
			<?php comments_popup_link ('评论数：0','评论数：1','评论数：%'); ?>
			|
			<?php //if(function_exists('the_views')) { print '被围观 '; the_views();} ?>
		    <?php post_views('浏览 ', ' 次'); ?>
			</p>
		<div id="textlistl">
			<?php include('includes/thumbnail.php'); ?></div>
		<div id="textlistr">
			<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->
			post_content)), 0, 132,"……"); ?>
			<?php endwhile;?></div>
		<div class="hr"></div>
		<?php
					query_posts( array(
						'showposts' =>4,
						'cat' => $category,
						'offset' => 1,
						'post__not_in' => $do_not_duplicate
						)
		 			);
				?>
		<ul>
			<?php while (have_posts()) : the_post(); ?>
			<li> <em><?php the_time('m/d') ?></em>
				<a href="<?php the_permalink() ?>
					"  title="
					<?php the_title(); ?>
					">
					<?php echo cut_str($post->post_title,40); ?></a>
			</li>
			<?php endwhile; ?></ul>
	</div>
</div>
<?php } ?>
</div>
<!-- end: cms up -->
<?php if(get_option('lovnvns_cms_ad')!="") echo '<div  class=cms_ad>'.get_option('lovnvns_cms_ad').'</div>';?>
<!-- cms un -->
<div id="divleftcms">
<?php $display_categories = explode(',', get_option('lovnvns_un') ); foreach ($display_categories as $category) { ?>
<?php
			query_posts( array(
				'showposts' =>1,
				'cat' => $category,
				'post__not_in' => $do_not_duplicate
				)
			);
		?>
<?php while (have_posts()) : the_post(); ?>
<div id="divleftl">
<div id="titlebg">
	<h3>
		<a href="<?php echo get_category_link($category);?>
			" rel="bookmark" title="更多
			<?php single_cat_title(); ?>
			的文章">
			<?php single_cat_title(); ?></a>
	</h3>
	<!-- <span class="counts">
		共有
		<span class="red">
			<?php echo wt_get_category_count(); ?></span>
		篇
	</span> -->
</div>
<div id="textlist">
	<h4>
		<a href="<?php the_permalink(); ?>
			" title="
			<?php the_title(); ?>
			">
			<?php the_title(); ?></a>
	</h4>
	<p>
		<?php the_time('Y年m月d日') ?>
		|
		<?php comments_popup_link ('评论数：0','评论数：1','评论数：%'); ?>
		|
		<?php //if(function_exists('the_views')) { print '浏览次数 '; the_views();} ?>
		<?php post_views('浏览 ', ' 次'); ?>
		</p>
	<div id="textlistl">
		<?php include('includes/thumbnail.php'); ?></div>
	<div id="textlistr">
		<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->
		post_content)), 0, 132,"……"); ?>
		<?php endwhile;?></div>
	<div class="hr"></div>
	<?php
					query_posts( array(
						'showposts' =>4,
						'cat' => $category,
						'offset' => 1,
						'post__not_in' => $do_not_duplicate
						)
		 			);
				?>
	<ul>
		<?php while (have_posts()) : the_post(); ?>
		<li> <em><?php the_time('m/d') ?></em>
			<a href="<?php the_permalink() ?>
				"  title="
				<?php the_title(); ?>
				">
				<?php echo cut_str($post->post_title,40); ?></a>
		</li>
		<?php endwhile; ?></ul>
</div>
</div>
<?php } ?></div>
<!-- end: cms un -->
</div>
<?php get_sidebar(); ?>
</div>
<div id="botcont">
	<div id="botcontbar">
		<span>
		<a href="<?php if(get_option('lovnvns_links')!="") echo get_option('lovnvns_links') ?>">更多链接</a>
		</span>
		<h3>友情链接</h3>
	</div>
	<div id="botcontbody">
		<ul>
		<?php wp_list_bookmarks('title_li=&categorize=0&orderby=rand&show_images=0'); ?>
		</ul>
	</div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>

