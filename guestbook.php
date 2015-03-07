<?php 
/**
 * Template Name: 留言
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
<div id="divcom">
    <div class="main">
        <?php include('includes/subtopbanner.php') ?>
    </div>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/banner.js"></script>
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    <div id="divleft">
        <div id="single_list">
            <h2>
                <?php the_title(); ?></h2>
            <div class="hr"></div>
            <div class="single_content">
                <p>评论前40位童鞋会放于此页面上展示。没有进到读者墙的童鞋们也不要灰心，努力评论就一定可以上墙噢！</p>
                <p>欢迎大家多多灌水，有访必回！</p>
                <br />
                <?php
 
    $query="SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->
                comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 24 MONTH ) AND user_id='0' AND comment_author_email != '改成你的邮箱账号' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT 40";//大家把管理员的邮箱改成你的,最后的这个39是选取多少个头像，大家可以按照自己的主题进行修改,来适合主题宽度
 
    $wall = $wpdb->get_results($query);
 
    $maxNum = $wall[0]->cnt;
 
    foreach ($wall as $comment)
 
    {
 
        $width = round(40 / ($maxNum / $comment->cnt),2);//此处是对应的血条的宽度
 
        if( $comment->comment_author_url )
 
        $url = $comment->comment_author_url;
 
        else $url="#";
        $avatar = get_avatar( $comment->comment_author_email, $size = '36' );
 
        $tmp = "
                <li>
                    <a target=\"_blank\" href=\"".$comment->
                        comment_author_url."\">".$avatar."
                        <span>".$comment->comment_author."</span>
                        <strong>+".$comment->cnt."</strong>
                    </br>
                    ".$comment->comment_author_url."
                </a>
            </li>
            ";
 
        $output .= $tmp;
 
     }
 
    $output = "
            <ul class=\"readers\">".$output."</ul>
            ";
 
    echo $output ;
 
?>
        </div>
    </div>
</div>
<?php comments_template(); ?></div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_sidebar(); ?></div>
<div class="clear"></div>
<?php get_footer(); ?>