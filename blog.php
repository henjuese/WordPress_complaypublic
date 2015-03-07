<?php get_header(); ?>
<div id="gongaobox">
  <div id="gongao">
    <ul>
      <li>
        <span></span>
        <?php if(get_option('lovnvns_announce')!="") echo get_option('lovnvns_announce');else echo "<a href='http://www.bofaziran.com/112/'> <strong>lovnvns4.0 wordpress cms主题免费下载！</strong>
      </a>
      " ?>
    </li>
  </ul>
</div>
<!-- <div id="gongaor">
建站日期： <strong><?php echo get_option('lovnvns_date');?></strong>
运行天数：
<strong><?php echo floor((time()-strtotime(get_option('lovnvns_date')))/86400); ?></strong>
天　最后更新：
<strong>
  <?php $last = $wpdb->
  get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");$last = date('Y-n-j', strtotime($last[0]->MAX_m));echo $last; ?></strong> 
</div>
-->
</div>
<div id="divcom">
<?php if(get_option('lovnvns_banner_top')!="")
      echo '<div  class=banner>'.get_option('lovnvns_banner_top').'</div>
';  ?>
<div class="main">
<div id="turn" class="turn">
<div class="turn-loading">
  <img src="<?php bloginfo('template_directory'); ?>/images/loading.gif" /></div>
<ul class="turn-pic">
  <?php if(get_option('lovnvns_banner_ad')!="") echo get_option('lovnvns_banner_ad');?>
</ul>
</div>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/banner.js"></script>
<div id="divleft1">
<DIV id=imgPlay>
<UL class=imgs id=actor>
  <?php $previous_posts = get_posts('numberposts=8&meta_key=banner&meta_value=on'); foreach($previous_posts as $post) : setup_postdata($post); ?>
  <li>
    <a href="<?php the_permalink(); ?>
      " title="
      <?php the_title(); ?>
      ">
      <?php lovnvns_slide_image()?></a>
  </li>
  <?php endforeach; ?></UL>
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
    
        query_posts( array( 'post__in' =>
$sticky,
                                   'caller_get_posts' => 1 ) );
        if (have_posts()) :
        while (have_posts()) : the_post();
?>
<h2>
  <a href="<?php the_permalink(); ?>
    " title="
    <?php the_title(); ?>
    ">
    <?php the_title(); ?></a>
</h2>
<p>
  分类：
  <?php the_category(', ') ?>
  |
  <?php comments_popup_link ('评论数：0','评论数：1','评论数：%'); ?>
  |
  <?php if(function_exists('the_views')) { print '被围观 '; the_views(); print '+';  } ?>
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
    
        query_posts( array( 'post__in' =>
  $sticky,
                                   'caller_get_posts' => 1 ) );
        if (have_posts()) :
        while (have_posts()) : the_post();
?>
  <li>
    <a href="<?php the_permalink(); ?>
      "
title="
      <?php the_title(); ?>
      ">
      <?php the_title(); ?></a>
  </li>
  <?php     endwhile;  endif;  ?></ul>
</div>
</div>
<?php if (get_option('lovnvns_show_on') == '1') { ?>
<div id="divleft">
<ul class="artist_l">
<?php query_posts( array('showposts' =>
18,'cat' =>get_option('lovnvns_show'))); $i=1; ?>
<?php while (have_posts()) : the_post(); ?>
<li class="a<?php echo $i;$i++; ?>
  ">
  <?php echo get_the_post_thumbnail($post->
  ID, 'thumbnail'); ?>
  <a href="<?php the_permalink(); ?>
    " title="
    <?php the_title(); ?>
    ">
    <?php the_title(); ?></a>
</li>
<?php endwhile; ?></ul>
</div>
<?php { echo ''; } ?>
<?php } else { } ?>
<?php 
  global $query_string;
  query_posts($query_string.'&showposts=10&caller_get_posts=1'); ?>

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
<div id="botcont">
<div id="botcontbar">
<span>
<a href="<?php if(get_option('lovnvns_links')!="") echo get_option('lovnvns_links'); ?>">更多链接</a>
</span>
<h3>友情链接</h3>
</div>
<div id="botcontbody">
<ul>
<?php wp_list_bookmarks('title_li=&categorize=0&category=2&orderby=rand&show_images=0'); ?></ul>
</div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>
