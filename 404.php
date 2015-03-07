<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>
    ; charset=
    <?php bloginfo('charset'); ?>
    " />
    <meta http-equiv="x-ua-compatible" content="ie=7" />
    <title>http404未找到</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>
    " />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>
    RSS Feed" href="
    <?php bloginfo('rss2_url'); ?>
    " />
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?>
    Atom Feed" href="
    <?php bloginfo('atom_url'); ?>
    " />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>
    " />
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/lovnvns.js"></script>
</head> -->
<?php get_header(); ?>
<body>
    <!-- <div id="nav">
        <div class="wrap">
            <ul id="navleft">
                <li>
                    <a href="<?php bloginfo('siteurl'); ?>
                        /">
                        <span class="leadBg">首 页</span>
                    </a>
                </li>
                <?php wp_list_pages('title_li='); ?></ul>
            <div id="navright" class="m-r-8">
                <ul>
                    <?php
  global $user_ID, $user_identity, $user_email, $user_login;
  get_currentuserinfo();
  if (!$user_ID) {
?>
                    <li class="toploginbg">
                        <form id="loginform" action="<?php echo get_settings('siteurl'); ?>
                            /wp-login.php" method="post">用户名：
                            <input class="toplogin_input" type="text" name="log" id="log" />
                            密码：
                            <input class="toplogin_input" type="password" name="pwd" id="pwd" />
                        </li>
                        <li class="but_login">
                            <input type="submit" class="but_loginlogin" value="" name="submit" target="_blank" />
                        </form>
                    </li>
                    <li>
                        <div class="topline"></div>
                    </li>
                    <li>
                        <a href="<?php if(get_option('lovnvns_weibo')!="") echo get_option('lovnvns_weibo');else echo "http://t.qq.com/lovnvns" ?>
                            " target="_blank" class="tqq" title="关注我的微博" rel="external nofollow">微博
                        </a>
                    </li>
                    <li>
                        <div class="topline"></div>
                    </li>
                    <li>
                        <a href="mailto:<?php if(get_option('lovnvns_email')!="") echo get_option('lovnvns_email');else echo "admin@110880.com" ?>
                            " target="_blank" class="rssmail" title="给我发邮件" rel="external nofollow">邮箱
                        </a>
                    </li>
                    <li>
                        <div class="topline"></div>
                    </li>
                    <li>
                        <a href="<?php if(get_option('lovnvns_rss')!="") echo get_option('lovnvns_rss');else echo "http://www.110880.com/feed/" ?>" target="_blank" class="help" title="订阅我的文章">RSS</a>
                    </li>
                    <?php } 
else { ?>
                    <div id="navrightr" class="m-r-8">
                        <div class="navrightlogin">
                            <ul>
                                <li>
                                    <a href="<?php bloginfo('url') ?>/wp-admin/" target="_blank">控制面板</a>
                                </li>
                                <li>
                                    <div class="topline"></div>
                                </li>
                                <li>
                                    <a href="<?php bloginfo('url') ?>/wp-admin/post-new.php" target="_blank">撰写文章</a>
                                </li>
                                <li>
                                    <div class="topline"></div>
                                </li>
                                <li>
                                    <a href="<?php bloginfo('url') ?>/wp-admin/edit-comments.php" target="_blank">评论管理</a>
                                </li>
                                <li>
                                    <div class="topline"></div>
                                </li>
                                <li>
                                    <a href="<?php bloginfo('url') ?>
                                        /wp-login.php?action=logout&amp;redirect_to=
                                        <?php echo urlencode($_SERVER['REQUEST_URI']) ?>">注销</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php } ?></ul>
            </div>
        </div>
    </div> -->
    <!-- <div id="search_bg">
        <div id="search_main">
            <div class="logo">
                <h1>
                    <a href="<?php bloginfo('siteurl'); ?>
                        /" title="
                        <?php echo get_option('lovnvns_description'); ?>
                        ">
                        <?php bloginfo('description'); ?>
                        -
                        <?php bloginfo('name'); ?></a>
                </h1>
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
            <div class="searchbarcolor">
                文章总数： <strong><?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?></strong>
                篇　评论总数： <strong><?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments");?></strong>
                条
            </div>
        </div>
    </div> -->
<!--     <div id="content">
        <div class="topnav">
            <?php wp_nav_menu( array( 'container' =>
            '','items_wrap' => '
            <ul id="menu" class="menu">%3$s</ul>
            ','fallback_cb'     => '' ) ); ?>
        </div>
    </div> -->
    <div class="error">
       <!--  <img src="<?php bloginfo('template_directory'); ?>
        /images/404.gif" /> -->
        <h3>无法找到该网页</h3>
        <p>最可能的原因是：</p>
        <p>在地址中可能存在键入错误</p>
        <p>当您点击某个链接时，它可能已过期</p>
        <p>您可以尝试以下操作：</p>
        <p>重新键入地址</p>
        <p>
            <a href="<?php bloginfo('siteurl'); ?>/">点此返回主页</a>
        </p>
    </div>
    <?php get_footer(); ?>