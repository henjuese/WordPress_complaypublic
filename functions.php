<?php
function wp_strimwidth($str ,$start , $width ,$trimmarker ){
	$output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start.'}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$width.'}).*/s','\1',$str);
	return $output.$trimmarker;
}
//定义后台
remove_action('wp_head',  'wp_generator'); 
include("includes/theme-option.php");
//自定义格式
add_theme_support( 'post-formats', array( 'gallery' ) );

//支持外链缩略图
if ( function_exists('add_theme_support') )
 add_theme_support('post-thumbnails');
 function catch_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
		$random = mt_rand(1, 10);
		echo get_bloginfo ( 'stylesheet_directory' );
		echo '/images/random/'.$random.'.jpg';
  }
  return $first_img;
 }
//首页幻灯片 
 function lovnvns_slide_image(){
if ( has_post_thumbnail() ) {
	  $titletext = get_the_title();
	 the_post_thumbnail( 'robot', array('alt' => $titletext ) );
} else { 
?>
<img src="<?php bloginfo('template_directory'); ?>/screenshot.jpg" alt="<?php the_title(); ?>"/>
<?php
};
}
//分页导航
function pagination($query_string){
global $posts_per_page, $paged;
$my_query = new WP_Query($query_string ."&posts_per_page=-1");
$total_posts = $my_query->post_count;
if(empty($paged))$paged = 1;
$prev = $paged - 1;							
$next = $paged + 1;	
$range = 4; // 修改数字,可以显示更多的分页链接
$showitems = ($range * 2)+1;
$pages = ceil($total_posts/$posts_per_page);
if(1 != $pages){
	echo "<div class='pagination'>";
	echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "<a id='btnb1' href='".get_pagenum_link(1)."'>第一页</a>":"";
	echo ($paged > 1 && $showitems < $pages)? "<a id='btnb2' href='".get_pagenum_link($prev)."'>上一页</a>":"";		
	for ($i=1; $i <= $pages; $i++){
	if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
	echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>"; 
	}
	}
	echo ($paged < $pages && $showitems < $pages) ? "<a id='btnb3' href='".get_pagenum_link($next)."'>下一页</a>" :"";
	echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a id='btnb4' href='".get_pagenum_link($pages)."'>最后一页</a>":"";
	echo "</div>\n";
	}
}

/*产品分页*/
function pagenavi( $before = '', $after = '', $p = 3 ) {
if ( is_singular() ) return;
global $wp_query, $paged;
$max_page = $wp_query->max_num_pages;
if ( $max_page == 1 ) return;
if ( empty( $paged ) ) $paged = 1;
echo $before.'<div id="pagenavi">'."\n";
//echo '<span class="pages">第' . $paged . '页 共' . $max_page . '页</span>';
if ( $paged > 1 ) p_link( $paged - 1, '上一页', '上一页' );
if ( $paged > $p + 1 ) p_link( 1, '第一页' );
if ( $paged > $p + 2 ) echo '<span class="pages">...</span>';
for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {
if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers page-current'>{$i}</span>" : p_link( $i );
}
if ( $paged < $max_page - $p - 1 ) echo '<span class="pages">...</span>';
if ( $paged < $max_page - $p ) p_link( $max_page, '最后一页' );
if ( $paged < $max_page ) p_link( $paged + 1,'下一页', '下一页' );
echo '</div>'.$after."\n";
}
function p_link( $i, $title = '', $linktype = '' ) {
if ( $title == '' ) $title = "第 {$i} 页";
if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }
echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$linktext}</a>";
}
 
 //分类文章数
function wt_get_category_count($input = '') {
    global $wpdb;

    if($input == '') {
        $category = get_the_category();
        return $category[0]->category_count;
    }
    elseif(is_numeric($input)) {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
        return $wpdb->get_var($SQL);
    }
    else {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
        return $wpdb->get_var($SQL);
    }
}
// 获得热评文章
function simple_get_most_viewed($posts_num=10, $days=90){
    global $wpdb;
    $sql = "SELECT ID , post_title , comment_count
            FROM $wpdb->posts
           WHERE post_type = 'post' AND TO_DAYS(now()) - TO_DAYS(post_date) < $days
		   AND ($wpdb->posts.`post_status` = 'publish' OR $wpdb->posts.`post_status` = 'inherit')
           ORDER BY comment_count DESC LIMIT 0 , $posts_num ";
    $posts = $wpdb->get_results($sql);
    $output = "";
    foreach ($posts as $post){
        $output .= "\n<li><a href= \"".get_permalink($post->ID)."\" rel=\"bookmark\" title=\"".$post->post_title." (".$post->comment_count."条评论)\" >". mb_strimwidth($post->post_title,0,36)."</a></li>";
    }
    echo $output;
}
 //日志归档
	class hacklog_archives
{
	function GetPosts() 
	{
		global  $wpdb;
		if ( $posts = wp_cache_get( 'posts', 'ihacklog-clean-archives' ) )
			return $posts;
		$query="SELECT DISTINCT ID,post_date,post_date_gmt,comment_count,comment_status,post_password FROM $wpdb->posts WHERE post_type='post' AND post_status = 'publish' AND comment_status = 'open'";
		$rawposts =$wpdb->get_results( $query, OBJECT );
		foreach( $rawposts as $key => $post ) {
			$posts[ mysql2date( 'Y.m', $post->post_date ) ][] = $post;
			$rawposts[$key] = null; 
		}
		$rawposts = null;
		wp_cache_set( 'posts', $posts, 'ihacklog-clean-archives' );;
		return $posts;
	}
	function PostList( $atts = array() ) 
	{
		global $wp_locale;
		global $hacklog_clean_archives_config;
		$atts = shortcode_atts(array(
			'usejs'        => $hacklog_clean_archives_config['usejs'],
			'monthorder'   => $hacklog_clean_archives_config['monthorder'],
			'postorder'    => $hacklog_clean_archives_config['postorder'],
			'postcount'    => '1',
			'commentcount' => '1',
		), $atts);
		$atts=array_merge(array('usejs'=>1,'monthorder'   =>'new','postorder'    =>'new'),$atts);
		$posts = $this->GetPosts();
		( 'new' == $atts['monthorder'] ) ? krsort( $posts ) : ksort( $posts );
		foreach( $posts as $key => $month ) {
			$sorter = array();
			foreach ( $month as $post )
				$sorter[] = $post->post_date_gmt;
			$sortorder = ( 'new' == $atts['postorder'] ) ? SORT_DESC : SORT_ASC;
			array_multisort( $sorter, $sortorder, $month );
			$posts[$key] = $month;
			unset($month);
		}
		$html = '<div class="car-container';
		if ( 1 == $atts['usejs'] ) $html .= ' car-collapse';
		$html .= '">'. "\n";
		if ( 1 == $atts['usejs'] ) $html .= '<a href="#" class="car-toggler">展开所有月份'."</a>\n\n";
		$html .= '<ul class="car-list">' . "\n";
		$firstmonth = TRUE;
		foreach( $posts as $yearmonth => $posts ) {
			list( $year, $month ) = explode( '.', $yearmonth );
			$firstpost = TRUE;
			foreach( $posts as $post ) {
				if ( TRUE == $firstpost ) {
                    $spchar = $firstmonth ? '<span class="car-toggle-icon car-minus">-</span>' : '<span class="car-toggle-icon car-plus">+</span>';
					$html .= '	<li><span class="car-yearmonth" style="cursor:pointer;">'.$spchar.' ' . sprintf( __('%1$s %2$d'), $wp_locale->get_month($month), $year );
					if ( '0' != $atts['postcount'] ) 
					{
						$html .= ' <span title="文章数量">(共' . count($posts) . '篇文章)</span>';
					}
                    if ($firstmonth == FALSE) {
					$html .= "</span>\n		<ul class='car-monthlisting' style='display:none;'>\n";
                    } else {
                    $html .= "</span>\n		<ul class='car-monthlisting'>\n";
                    }
					$firstpost = FALSE;
                     $firstmonth = FALSE;
				}
				$html .= '			<li>' .  mysql2date( 'd', $post->post_date ) . '日: <a target="_blank" href="' . get_permalink( $post->ID ) . '">' . get_the_title( $post->ID ) . '</a>';
				if ( '0' != $atts['commentcount'] && ( 0 != $post->comment_count || 'closed' != $post->comment_status ) && empty($post->post_password) )
					$html .= ' <span title="评论数量">(' . $post->comment_count . '条评论)</span>';
				$html .= "</li>\n";
			}
			$html .= "		</ul>\n	</li>\n";
		}
		$html .= "</ul>\n</div>\n";
		return $html;
	}
	function PostCount() 
	{
		$num_posts = wp_count_posts( 'post' );
		return number_format_i18n( $num_posts->publish );
	}
}
if(!empty($post->post_content))
{
	$all_config=explode(';',$post->post_content);
	foreach($all_config as $item)
	{
		$temp=explode('=',$item);
		$hacklog_clean_archives_config[trim($temp[0])]=htmlspecialchars(strip_tags(trim($temp[1])));
	}
}
else
{
	$hacklog_clean_archives_config=array('usejs'=>1,'monthorder'   =>'new','postorder'    =>'new');	
}
$hacklog_archives=new hacklog_archives();

//评论列表
if ( ! function_exists( 'lovnvns_comment' ) ) :
function lovnvns_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
				//主评论计数器初始化 begin
				global $commentcount;
				$page = ( !empty($in_comment_loop) ) ? get_query_var('cpage') : get_page_of_comment( $comment->comment_ID, $args );
				$cpp=get_option('comments_per_page');//获取每页评论显示数量
				if(!$commentcount) { //初始化楼层计数器
					if ($page > 1) {
						$commentcount = $cpp * ($page - 1);
					} else {
						$commentcount = 0;//如果评论还没有分页，初始值为0
					}
				}
//主评论计数器初始化 end
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment_author">
			<?php echo get_avatar( $comment, 32 ); ?>
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<p style="color:#e75814"><?php _e( '您的评论正在等待审核中...', 'lovnvns' ); ?></p><br />
		<?php endif; ?>
		<p class="commet_text">    
                <?php
				if($comment->user_id == 1) echo "<span style='color:#ff6600'>【管理员】</span>";
				printf( __( '%s：', 'lovnvns' ), sprintf( '%s', get_comment_author_link() ) );?>
					<div class="floor"><!-- 主评论楼层号 -->					
					<?php if(!$parent_id = $comment->comment_parent) {printf('%1$s',++$commentcount); echo"楼";} ?>
					</div>
			<?php
                    printf( __( '%1$s %2$s', 'lovnvns' ), get_comment_date(),  get_comment_time() ); ?> <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            <br />
			<?php comment_text(); ?>
        </p>
	</div>	
	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'lovnvns' ); ?> <?php comment_author_link(); ?></p>
	<?php
			break;
	endswitch;
}
endif;



//菜单支持
register_nav_menu( 'nav-menu', '导航菜单');



//移除adminbar
add_filter( 'show_admin_bar', '__return_false' );



//标题文字截断
function cut_str($src_str,$cut_length){
    $return_str='';
    $i=0;
    $n=0;
    $str_length=strlen($src_str);
    while (($n<$cut_length) && ($i<=$str_length)){
        $tmp_str=substr($src_str,$i,1);
        $ascnum=ord($tmp_str);
        if ($ascnum>=224){
            $return_str=$return_str.substr($src_str,$i,3);
            $i=$i+3;
            $n=$n+2;
        }
        elseif ($ascnum>=192){
            $return_str=$return_str.substr($src_str,$i,2);
            $i=$i+2;
            $n=$n+2;
        }
        elseif ($ascnum>=65 && $ascnum<=90){
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+2;
        }
        else {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+1;
        }
    }
    if ($i<$str_length){
        $return_str = $return_str . '';
    }
    if (get_post_status() == 'private'){
        $return_str = $return_str . '（private）';
    }
    return $return_str;
}



//评论邮件回复
/* 开始*/
function comment_mail_notify($comment_id) {
  $admin_notify = '1'; // admin 要不要收回复通知 ( '1'=要 ; '0'=不要 )
  $admin_email = get_bloginfo ('admin_email'); // $admin_email 可改为你指定的 e-mail.
  $comment = get_comment($comment_id);
  $comment_author_email = trim($comment->comment_author_email);
  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
  global $wpdb;
  if ($wpdb->query("Describe {$wpdb->comments} comment_mail_notify") == '')
    $wpdb->query("ALTER TABLE {$wpdb->comments} ADD COLUMN comment_mail_notify TINYINT NOT NULL DEFAULT 0;");
  if (($comment_author_email != $admin_email && isset($_POST['comment_mail_notify'])) || ($comment_author_email == $admin_email && $admin_notify == '1'))
    $wpdb->query("UPDATE {$wpdb->comments} SET comment_mail_notify='1' WHERE comment_ID='$comment_id'");
  $notify = $parent_id ? get_comment($parent_id)->comment_mail_notify : '0';
  $spam_confirmed = $comment->comment_approved;
  if ($parent_id != '' && $spam_confirmed != 'spam' && $notify == '1') {
    $wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); // e-mail 发出点, no-reply 可改为可用的 e-mail.
    $to = trim(get_comment($parent_id)->comment_author_email);
    $subject = '您在 [' . get_option("blogname") . '] 的留言有了回复';
    $message = '
    <div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px;">
      <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
      <p>您曾在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />'
       . trim(get_comment($parent_id)->comment_content) . '</p>
      <p>' . trim($comment->comment_author) . ' 给您的回复:<br />'
       . trim($comment->comment_content) . '<br /></p>
      <p>您可以点击<a href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看回复的完整內容</a></p>
      <p>还要再度光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
      <p>(此邮件由系统自动发送，请勿回复.)</p>
    </div>';
    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail( $to, $subject, $message, $headers );
    //echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
  }
}
add_action('comment_post', 'comment_mail_notify');
 
/* 自动加勾选栏 
function add_checkbox() {
  echo '<input type="checkbox" name="comment_mail_notify" id="comment_mail_notify" value="comment_mail_notify" checked="checked" style="margin-left:20px;" /><label for="comment_mail_notify">有人回复时邮件通知我</label>';
}
add_action('comment_form', 'add_checkbox');*/

//彩色标签云
function colorCloud($text) {
    $text = preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text);
    return $text;
}
function colorCloudCallback($matches) {
    $text = $matches[1];
    for($a=0;$a<6;$a++){    //采用#ffffff方法
       $color.=dechex(rand(0,15));//累加随机的数据--dechex()将十进制改为十六进制
    }
    $pattern = '/style=(\'|\")(.*)(\'|\")/i';
    $text = preg_replace($pattern, "style=\"color:#{$color};$2;\"", $text);
    return "<a $text>";
    unset($color);//卸载color
}
add_filter('wp_tag_cloud', 'colorCloud', 1);


//获取最新评论
function Get_Recent_Comment($limit=16,$cut_length=24){
	global $wpdb;	
	$admin_email = "'" . get_bloginfo ('admin_email') . "'"; //获取管理员邮箱，以便排除管理员的评论
	$rccdb = $wpdb->get_results("
		SELECT ID, post_title, comment_ID, comment_author, comment_author_email, comment_content
		FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts
		ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID)
		WHERE comment_approved = '1'
		AND comment_type = ''
		AND post_password = ''
		AND comment_author_email != $admin_email
		ORDER BY comment_date_gmt
		DESC LIMIT $limit
	 ");//数据库查询获得想要的结果	 
	foreach ($rccdb as $row) { 
		$rcc .= "<li>".get_avatar($row,$size='32')."<span>".$row->comment_author ."：</span>"."<br />". "<a href='"
		. get_permalink($row->ID) . "#comment-" . $row->comment_ID
		. "' title='查看 " . $row->post_title . "'>" . cut_str($row->comment_content,$cut_length)."</a>". "</li>";
	}//遍历查询到结果，获得想要的值，其中插入一些HTML元素，以便定义CSS样式	
	$rcc = convert_smilies($rcc);//允许评论内容中显示表情
	echo $rcc;//输出结果
}



//获取随机文章
function Get_Random_Post($limit=5,$cut_length=44){
	global $wpdb;	
	$randposts = $wpdb->get_results("
	SELECT p.ID, p.post_title, rand()*p1.id AS o_id FROM $wpdb->posts AS p JOIN ( SELECT MAX(ID) AS id FROM  $wpdb->posts  WHERE post_type='post' AND post_status='publish') AS p1 WHERE p.post_type='post'  AND p.post_status='publish' ORDER BY o_id LIMIT $limit
	");//数据库查询
	foreach($randposts as $randpost) {
		echo '<li><a href="' . get_permalink($randpost->ID) . '" title="' . $randpost->post_title . '">' . cut_str($randpost->post_title,$cut_length) . '</a></li>';
	}//遍历数组输出结果
}



//评论表情
function wp_smilies() {
    global $wpsmiliestrans;
    if ( !get_option('use_smilies') or (empty($wpsmiliestrans))) return;
    $smilies = array_unique($wpsmiliestrans);
    $link='';
    foreach ($smilies as $key => $smile) {
        $file = get_bloginfo('template_directory').'/images/smilies/'.$smile;
        $value = " ".$key." ";
        $img = "<img src=\"{$file}\" alt=\"{$smile}\" />";
        $imglink = htmlspecialchars($img);
        $link .= "<a href=\"#commentform\" title=\"{$smile}\" onclick=\"document.getElementById('comment').value += '{$value}'\">{$img}</a>&nbsp;";
    }
    echo $link;
}
//开启后台左侧链接菜单，WordPress默认是关闭的
add_filter('pre_option_link_manager_enabled','__return_true');

//修改表情默认路径
add_filter('smilies_src','custom_smilies_src',1,10);
function custom_smilies_src ($img_src, $img, $siteurl){
    return get_bloginfo('template_directory').'/images/smilies/'.$img;
}


function record_visitors()
{
	if (is_singular())
	{
	  global $post;
	  $post_ID = $post->ID;
	  if($post_ID)
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1)))
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');
 
/// 函数名称：post_views
/// 函数作用：取得文章的阅读次数
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}

//获取文章中的第一幅图片
function catch_the_image( $id ) {
	// global $post, $posts;
	$first_img = '';

	// 如果设置了缩略图
	$post_thumbnail_id = get_post_thumbnail_id( $id );
	if ( $post_thumbnail_id ) {
	    $output = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
	    $first_img = $output[0];
	}else { // 没有缩略图，查找文章中的第一幅图片
	    //ob_start();
	   // ob_end_clean();
	    //return get_post($id)->post_content;
	    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post($id)->post_content, $matches);
	   
	    $first_img = $matches [1] [0];

	    if(empty($first_img)){ // 既没有缩略图，文中也没有图，设置一幅默认的图片
	      	$first_img ="";//一张默认的图片
	    }/**/

	    
	}
	return $first_img;
}




?>