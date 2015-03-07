<?php get_header(); ?>
<div id="gongaobox">
    <div id="gongao">
        当前位置：
        <a href="<?php bloginfo('siteurl'); ?>/" title="返回首页">首页</a>
        >
        <?php $categories = get_the_category(); 
         //echo(get_category_parents($categories[0]->term_id, TRUE, ' > '));
        echo is_wp_error($cat_parents=get_category_parents($categories[0]->term_id, TRUE, ' &gt; '))?"":$cat_parents;  
        ?>
     正文</div>
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
<div class="banner_top">
    <?php include('includes/subtopbanner.php') ?>
</div>
<div class="main">

    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/banner.js"></script>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div id="divleft">
        <div id="single_list">
            <h2>
                <?php the_title(); ?></h2>
            <div class="hr"></div>
            <p>
                <?php the_time('Y年m月d日') ?>
                |　作者:
                <?php the_author (); ?>
                |　分类:
                <?php the_category(', ') ?>
                |
                <?php if(function_exists('the_views')) { print '被围观 '; the_views();  } ?>
                <?php edit_post_link('编辑', '　|　'); ?></p>
            <?php if(get_option('lovnvns_single_ad')!="")
                echo '<div id="lovnvns_ad">'.get_option('lovnvns_single_ad').'</div>
        ';
            ?>
        <div class="single_content">
            <?php the_content(); ?></div>
    </div>
</div>
<?php wp_link_pages(); ?>
<!-- <div id="divleft">
<div id="single_list">
    本文固定链接：
    <a href="<?php the_permalink() ?>
        " title="
        <?php the_title(); ?>
        " rel="bookmark">
        <?php the_permalink() ?></a>
</div>
</div>
-->
<!-- <div id="divleft">
<div id="single_list">
<div class="content_tx">
    <?php echo get_avatar( get_the_author_email(), '80' ); ?></div>
<div class="content_sm">
    本文章由
    <a href="<?php bloginfo('siteurl'); ?>
        /">
        <strong>
            <?php the_author() ?></strong>
    </a>
    于
    <?php the_time('Y年m月d日') ?>
    发布在
    <?php the_category(', ') ?>
    分类下，
    <?php if (('open' == $post->
    comment_status) && ('open' == $post->ping_status)) {?>您可以
    <a href="#respond">发表评论</a>
    ，并在保留
    <a href="<?php the_permalink() ?>" rel="bookmark">原文地址</a>
    及作者的情况下
    <a href="<?php trackback_url(); ?>" rel="trackback">引用</a>
    到你的网站或博客。
    <?php } elseif (('open' == $post->
    comment_status) && !('open' == $post->ping_status)) { ?>
通告目前不可用，你可以至底部留下评论。
    <?php } ?>
    <br/>
    <span onClick='copyToClipBoard()' class="fz">+复制链接</span>
    转载请注明：
    <a href="<?php the_permalink() ?>
        " rel="bookmark" title="本文固定链接
        <?php the_permalink() ?>
        ">
        <?php the_title(); ?>
        -
        <?php bloginfo('name');?></a>
    <br/>
    <?php the_tags('关键字：', ', ', ''); ?></div>
</div>
</div>
-->
<div id="divleft">
<div id="single_list">
<div class="single_listl">
    <?php  if (get_next_post()) {next_post_link('%link'); } else { echo "已经最新的文章！"; }; ?></div>
<div class="single_listr">
    <?php  if (get_previous_post()) {previous_post_link('%link'); } else { echo "后面已经没有文章了"; }; ?></div>
</div>
</div>
<div id="divleft">
<div id="single_list">
<h2>好文章就要一起分享！</h2>
<!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
    <a class="bds_qzone"></a>
    <a class="bds_tqq"></a>
    <a class="bds_tsina"></a>
    <a class="bds_renren"></a>
    <a class="bds_ty"></a>
    <a class="bds_ff"></a>
    <a class="bds_fbook"></a>
    <a class="bds_baidu"></a>
    <a class="bds_hi"></a>
    <a class="bds_zx"></a>
    <a class="bds_douban"></a>
    <a class="bds_t163"></a>
    <a class="bds_xg"></a>
    <a class="bds_qq"></a>
    <a class="bds_tieba"></a>
    <span class="bds_more">更多</span>
    <a class="shareCount"></a>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=730973" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
    document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END -->
</div>
</div>
<div id="divleftl">
<div id="textlist_s">
<h2>猜你也会喜欢</h2>
<div class="hr"></div>
<ul>
    <?php include("includes/Get_Related_Post.php"); ?></ul>
</div>
</div>
<div id="divleftr">
<div id="textlist_s">
<h2>类似新闻</h2>
<div class="hr"></div>
<ul>
    <?php Get_Random_Post(); ?></ul>
</div>
</div>
<?php comments_template('', true); ?>
<?php endwhile; ?>
<?php endif; ?></div>
<?php get_sidebar(); ?></div>
<div class="clear"></div>
<?php get_footer(); ?>