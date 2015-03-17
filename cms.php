<?php get_header(); ?>

<?php if ( is_home() ) { ?>
<div id="turn" class="turn">
		<div class="turn-loading">
			<img src="<?php bloginfo('template_directory'); ?>/images/loading.gif" />
		</div>
		<!--头部焦点广告-->
		<ul class="turn-pic">
			<?php if(get_option('lovnvns_banner_ad')!="") echo get_option('lovnvns_banner_ad');?>
		</ul>
</div>
<?php } ?>
<!--公告start-->
<div id="gonggao">
<img src="<?php bloginfo('template_directory'); ?>/images/gonggao_03.png">
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
					<a href="<?php the_permalink(); ?> " title="<?php the_title(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
				<?php  endwhile;  endif;  ?>
			</ul>
</div>
<!--公告end-->

<div id="container">
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/banner.js"></script>
<div class="content">
     <!-- 公司简介 un -->
	
	<div class="aboutus x c4">
			<?php
				query_posts( array(
					'showposts' =>1,
					'meta_key' =>'info',
					'post__not_in' => $do_not_duplicate
					)
				);
			?>
			<?php while (have_posts()) : the_post(); ?>
        	<div class="title">
        		<span><a>关于企业</a></span> 
                <a target="_black" href="<?php the_permalink(); ?>" title="关于企业" class="more fr">more</a>        
            </div>
            <div class="tx">
            	<div class="editor1">
	            	<div class="aboutus-img">
	            	<?php echo get_the_post_thumbnail($post_id, 'thumbnail'); ?>
	            	</div>
					<strong><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span style="color:#006400;"><?php the_title(); ?></span></a></strong>
	            	<br />
	&nbsp; &nbsp; &nbsp; &nbsp; <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->
					post_content)), 0, 422,"……"); ?>
	            	<div class="clear"></div>
          		</div>
            </div>
            <?php endwhile;?>
    </div>
	<!-- end: info un -->
    
	<div class="news x c2">
        <div class="title"> <span><a target="_black" href="archives/category/compnews/" title="新闻动态">新闻动态</a></span>
         <a href="archives/category/compnews/" target="_black" title="新闻动态"class="more fr">more</a>
        </div>
        <div class="tx">
          <div>
          	<ol class='list-none metlist'>
          	     <?php
			        $sticky = get_option('sticky_posts');
			        rsort( $sticky );
			        $sticky = array_slice( $sticky, 1, 5);
					
			        query_posts( array( 'post__in' =>$sticky,
			        	                 'showposts' => 5,
			                           'caller_get_posts' => 1 ) );
			        if (have_posts()) :
			          while (have_posts()) : the_post();
					?>
						<li class='list'><span class='time'><?php the_time('Y-m-d') ?></span>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							
						</li>
					<?php endwhile;  endif;  ?>
            </ol>
          </div>
          <div class="clear"></div>
        </div>
    </div>

    <!--图片展示start-->
<?php if (get_option('lovnvns_show_on') == '1') { ?>
<div class="picScroll-title">
	<div class="product">
    	<div class="title">
        	<span><a href="" title="产品展示">产品展示</a></span>
      		<a href="products/" target="_black" title="产品展示"class="more fr">more</a>
        </div>
    </div>
    <div class="clear"></div>
    <div class="picScroll-left">
		<div class="bd">
			<ul class="picList">
				<?php query_posts( array(
				                     'showposts' =>10,
				                     'cat' =>get_option('lovnvns_show')
				                     )
				                  ); 
				?>
				<?php while (have_posts()) : the_post(); ?>
				<li>
					<div class="pic">
					<a href="<?php the_permalink(); ?>" target="_black" title="<?php the_title(); ?>">
					
                    <?php if (has_post_thumbnail()) { 
						       the_post_thumbnail('thumbnail'); 
				           }
			              else { ?>
							   <img src="<?php echo catch_first_image() ?>" alt="<?php the_title(); ?>"/>
					 <?php } ?>
					</a>
					</div>
					<?php //echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
					<div class="title">
					      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>
<?php { echo ''; } ?>
<?php } else { } ?>
<!--图片展示end-->
	
</div>



</div>
<div class="index-link linkx">
	<a href="<?php if(get_option('lovnvns_links')!="") echo get_option('lovnvns_links') ?>"><h3 class="title png"> 友情链接:</h3></a>
    	<ul class='list-none'>
        	<?php wp_list_bookmarks('title_li=&categorize=0&orderby=rand&show_images=0'); ?>
       </ul>
</div> 

<div class="clear"></div>
<?php get_footer(); ?>
