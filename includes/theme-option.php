<?php
$themename = "lovnvns";

function lovnvns_add_option() {
	global $themename;
	add_theme_page($themename."-主题设置", "".$themename."-主题设置", 'administrator', basename(__FILE__), 'lovnvns_form');
	add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {
	register_setting( 'lovnvns-settings', 'lovnvns_announce');
	register_setting( 'lovnvns-settings', 'lovnvns_date');
	register_setting( 'lovnvns-settings', 'lovnvns_statistics');
	register_setting( 'lovnvns-settings', 'lovnvns_Designed');
	register_setting( 'lovnvns-settings', 'lovnvns_stat');
	register_setting( 'lovnvns-settings', 'lovnvns_email');
	register_setting( 'lovnvns-settings', 'lovnvns_weibo');
	register_setting( 'lovnvns-settings', 'lovnvns_rss');
	register_setting( 'lovnvns-settings', 'lovnvns_keywords');
	register_setting( 'lovnvns-settings', 'lovnvns_description');
	register_setting( 'lovnvns-settings', 'lovnvns_sidebar_ad');
	register_setting( 'lovnvns-settings', 'lovnvns_single_ad');
	register_setting( 'lovnvns-settings', 'lovnvns_comment_ad');
	register_setting( 'lovnvns-settings', 'lovnvns_banner_ad');
	register_setting( 'lovnvns-settings', 'lovnvns_banner_top');
	register_setting( 'lovnvns-settings', 'lovnvns_theme');
	register_setting( 'lovnvns-settings', 'lovnvns_up');
	register_setting( 'lovnvns-settings', 'lovnvns_cms_ad');
	register_setting( 'lovnvns-settings', 'lovnvns_un');
	register_setting( 'lovnvns-settings', 'lovnvns_show_on');
	register_setting( 'lovnvns-settings', 'lovnvns_show');
	register_setting( 'lovnvns-settings', 'lovnvns_about');
	register_setting( 'lovnvns-settings', 'lovnvns_sitemap');
	register_setting( 'lovnvns-settings', 'lovnvns_sitemap_baidu');
	register_setting( 'lovnvns-settings', 'lovnvns_links');
	register_setting( 'lovnvns-settings', 'lovnvns_home');
	}

function lovnvns_form() {

	global $themename;

?>

<!-- Options Form begin -->
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br/></div>
	<h2><?php echo $themename; ?>主题设置</h2>
    <ul class="subsubsub" style="margin-top:15px; ">
    	<li><a href="#lovnvns_base"><strong>基本设置</strong></a> |</li>
        <li><a href="#lovnvns_seo"><strong>SEO设置</strong></a> |</li>
		<li><a href="#lovnvns_ad"><strong>广告设置</strong></a></li>
     </ul>
	<form method="post" action="options.php">
		<?php settings_fields('lovnvns-settings'); ?>
		<table class="form-table">
			<tr valign="top">
            	<td><h3 id="lovnvns_base">基本设置</h3></td>
        	</tr>
			<tr valign="top">
                <th scope="row"><label>首页布局</label></th>
                <td>
				    <select name="lovnvns_home">
                        <option value="1" <?php if (get_option('lovnvns_home') == '1') { echo 'selected="selected"'; } ?>>cms</option>
                        <option value="0" <?php if (get_option('lovnvns_home') == '0') { echo 'selected="selected"'; } ?>>blog</option>
                    </select>
                  <br />
                    <span class="description">选择首页布局样式</span>
              </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>网站公告</label></th>
                <td>
                    <textarea style="width:35em; height:5em;" name="lovnvns_announce"><?php echo get_option('lovnvns_announce'); ?></textarea>
                    <br />
                    <span class="description">将在网站头部显示，不设置则为空</span>
                </td>
        	</tr>
			
			<tr valign="top">
                <th scope="row"><label>CMS首侧上部分类ID设置</label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="lovnvns_up"><?php echo get_option('lovnvns_up'); ?></textarea>
                    <br />
                    <span class="description">输入分类ID，显示更多分类，请用英文逗号＂,＂隔开<DIV class="dp-highlighter nogutter" style="width:420px;"><OL class=dp-c start=0>
<LI class=alt><SPAN><SPAN>如：1,8,10 &nbsp;&nbsp;</SPAN></SPAN></LI>
<LI><SPAN>则显示id为1、8、10的分类文章&nbsp;&nbsp;</SPAN></LI></OL></DIV></span>
                </td>
        	</tr>
			<tr valign="top">
                <th scope="row"><label>CMS首侧下部分类ID设置</label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="lovnvns_un"><?php echo get_option('lovnvns_un'); ?></textarea>
                    <br />
                    <span class="description">输入分类ID，显示更多分类，请用英文逗号＂,＂隔开<DIV class="dp-highlighter nogutter" style="width:420px;"><OL class=dp-c start=0>
<LI class=alt><SPAN><SPAN>如：1,8,10 &nbsp;&nbsp;</SPAN></SPAN></LI>
<LI><SPAN>则显示id为1、8、10的分类文章&nbsp;&nbsp;</SPAN></LI></OL></DIV></span>
                </td>
        	</tr>
			<tr valign="top">
                <th scope="row"><label>是否开启首页图片秀</label></th>
                <td>
                    <select name="lovnvns_show_on">
                        <option value="1" <?php if (get_option('lovnvns_show_on') == '1') { echo 'selected="selected"'; } ?>>开启</option>
                        <option value="0" <?php if (get_option('lovnvns_show_on') == '0') { echo 'selected="selected"'; } ?>>关闭</option>
                    </select>
                    <br />
                    <span class="description">选择开关</span>
                </td>
        	</tr>
			<tr valign="top">
                <th scope="row"><label>首页图片秀分类ID设置</label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="lovnvns_show"><?php echo get_option('lovnvns_show'); ?></textarea>
                    <br />
                    <span class="description">输入分类ID</span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>网站底部代码【footer.php】</label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="lovnvns_statistics"><?php echo get_option('lovnvns_statistics'); ?></textarea>
                    <br />
                    <span class="description">可以写入各种底部信息</span>
                </td>
        	</tr>
			<tr valign="top">
                <th scope="row"><label>网站底统计部代码</label></th>
                <td>
                    <textarea style="width:35em; height:5em;" name="lovnvns_stat"><?php echo get_option('lovnvns_stat'); ?></textarea>
                    <br />
                    <span class="description">可以写入统计部代码</span>
                </td>
        	</tr>
             <tr valign="top">
                <th scope="row"><label>我的电子邮件地址</label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="lovnvns_email"><?php echo get_option('lovnvns_email'); ?></textarea>
                    <br />
                    <span class="description">输入电子邮件地址，不输入则为空</span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>我的新浪微博地址</label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="lovnvns_weibo"><?php echo get_option('lovnvns_weibo'); ?></textarea>
                    <br />
                    <span class="description">输入微博地址，不输入则为空</span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>qq客服号</label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="lovnvns_rss"><?php echo get_option('lovnvns_rss'); ?></textarea>
                    <br />
                    <span class="description">qq客服号</span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>微信二维码地址</label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="lovnvns_sitemap"><?php echo get_option('lovnvns_sitemap'); ?></textarea>
                    <br />
                    <span class="description">微信二维码地址，不输入则为空</span>
                </td>
            </tr>
			<tr valign="top">
                <th scope="row"><label>右侧关于我们地址</label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="lovnvns_about"><?php echo get_option('lovnvns_about'); ?></textarea>
                    <br />
                    <span class="description">输入关于我们地址，不输入则为空</span>
                </td>
        	</tr>
			
			<tr valign="top">
                <th scope="row"><label>右侧百度地图地址</label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="lovnvns_sitemap_baidu"><?php echo get_option('lovnvns_sitemap_baidu'); ?></textarea>
                    <br />
                    <span class="description">输入百度地图地址，不输入则为空</span>
                </td>
        	</tr>
			<tr valign="top">
                <th scope="row"><label>首页更多链接地址</label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="lovnvns_links"><?php echo get_option('lovnvns_links'); ?></textarea>
                    <br />
                    <span class="description">输入首页更多链接地址，不输入则为空</span>
                </td>
        	</tr>
			
            <tr valign="top">
            	<td><h3 id="lovnvns_seo">SEO设置</h3></td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>网站关键词</label></th>
                <td>
                    <textarea style="width:35em; height:5em;" name="lovnvns_keywords"><?php echo get_option('lovnvns_keywords'); ?></textarea>
                    <br />
                    <span class="description">输入关键词请使用英文逗号","符号分隔</span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>网站描述</label></th>
                <td>
                    <textarea style="width:35em; height:5em;" name="lovnvns_description"><?php echo get_option('lovnvns_description'); ?></textarea>
                    <br />
                    <span class="description">输入网站描述信息</span>
                </td>
        	</tr>
            
			<tr valign="top">
            	<td><h3 id="lovnvns_ad">广告设置</h3></td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>首页顶部横幅小图广告</label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="lovnvns_date"><?php echo get_option('lovnvns_date'); ?></textarea>
                    <br />
                    <span class="description">首页顶部横幅广告代码，推荐大小： size: 980*60</span>
                </td>
            </tr>
			<tr valign="top">
                <th scope="row"><label>首页顶部横幅大图广告</label></th>
                <td>
                    <textarea style="width:35em; height:5em;" name="lovnvns_banner_top"><?php echo get_option('lovnvns_banner_top'); ?></textarea>
                    <br />
					<span class="description">首页顶部横幅广告代码，推荐大小： size: 980*<br />示例：<DIV class="dp-highlighter nogutter" style="width:420px;"><DIV class=bar></DIV>
<OL class=dp-c start=0>
<LI class=alt><SPAN><SPAN>&lt;a&nbsp;href=</SPAN><SPAN class=string>"链接地址"</SPAN><SPAN>&gt;&lt;img&nbsp;src=</SPAN><SPAN class=string>"图片地址"</SPAN><SPAN>&nbsp;alt=</SPAN><SPAN class=string>"图片说明"</SPAN><SPAN>/&gt;&lt;/a&gt;&nbsp;&nbsp;</SPAN></SPAN></LI></OL></DIV></span>            
                </td></tr>
            <tr valign="top">
                <th scope="row"><label>banner广告</label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="lovnvns_banner_ad"><?php echo get_option('lovnvns_banner_ad'); ?></textarea>
                    <br />
					<span class="description">banner广告代码，推荐大小： size: 980*180<br />不设置则为空<br />示例：<DIV class="dp-highlighter nogutter"style="width:420px;"><DIV class=bar></DIV>
<OL class=dp-c start=0>
<LI class=alt><SPAN><SPAN>&lt;li&gt;&lt;a&nbsp;href=</SPAN><SPAN class=string>"链接地址"</SPAN><SPAN>&gt;&lt;img&nbsp;src=</SPAN><SPAN class=string>"图片地址"</SPAN><SPAN>&nbsp;/&gt;&lt;/a&gt;&lt;/li&gt; &nbsp;&nbsp;</SPAN></SPAN></LI>
<LI><SPAN>&lt;li&gt;&lt;a&nbsp;href=</SPAN><SPAN class=string>"链接地址"</SPAN><SPAN>&gt;&lt;img&nbsp;src=</SPAN><SPAN class=string>"图片地址"</SPAN><SPAN>&nbsp;/&gt;&lt;/a&gt;&lt;/li&gt; &nbsp;&nbsp;</SPAN></SPAN></LI>
<LI class=alt><SPAN>&lt;li&gt;&lt;a&nbsp;href=</SPAN><SPAN class=string>"链接地址"</SPAN><SPAN>&gt;&lt;img&nbsp;src=</SPAN><SPAN class=string>"图片地址"</SPAN><SPAN>&nbsp;/&gt;&lt;/a&gt;&lt;/li&gt; &nbsp;&nbsp;</SPAN></SPAN></LI>
<LI><SPAN>一行一张广告图片，以此类推…</SPAN></LI></OL></DIV></span>            
                </td></tr>
				<tr valign="top">
                <th scope="row"><label>首页中间广告</label></th>
                <td>
                    <textarea style="width:35em; height:5em;" name="lovnvns_cms_ad"><?php echo get_option('lovnvns_cms_ad'); ?></textarea>
                    <br />
					<span class="description">直接放入广告代码即可，推荐大小：748*×90*<br />示例：<DIV class="dp-highlighter nogutter"style="width:420px;"><DIV class=bar></DIV>
<OL class=dp-c start=0>
<LI class=alt><SPAN><SPAN>&lt;a&nbsp;href=</SPAN><SPAN class=string>"链接地址"</SPAN><SPAN>&gt;&lt;img&nbsp;src=</SPAN><SPAN class=string>"图片地址"</SPAN><SPAN>&nbsp;alt=</SPAN><SPAN class=string>"图片说明"</SPAN><SPAN>/&gt;&lt;/a&gt;&nbsp;&nbsp;</SPAN></SPAN></LI></OL></DIV></span>
                </td>
        	</tr>	
            <tr valign="top">
                <th scope="row"><label>侧边栏广告</label></th>
                <td>
                    <textarea style="width:35em; height:5em;" name="lovnvns_sidebar_ad"><?php echo get_option('lovnvns_sidebar_ad'); ?></textarea>
                    <br />
					<span class="description">直接放入广告代码即可，推荐大小：220*×120*<br />不设置则默认显示为空<br />示例：<DIV class="dp-highlighter nogutter"style="width:420px;"><DIV class=bar></DIV>
<OL class=dp-c start=0>
<LI class=alt><SPAN><SPAN>&lt;a&nbsp;href=</SPAN><SPAN class=string>"链接地址"</SPAN><SPAN>&gt;&lt;img&nbsp;src=</SPAN><SPAN class=string>"图片地址"</SPAN><SPAN>&nbsp;alt=</SPAN><SPAN class=string>"图片说明"</SPAN><SPAN>/&gt;&lt;/a&gt;&nbsp;&nbsp;</SPAN></SPAN></LI></OL></DIV></span>
                </td>
        	</tr>
			<tr valign="top">
                <th scope="row"><label>文章内容广告</label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="lovnvns_single_ad"><?php echo get_option('lovnvns_single_ad'); ?></textarea>
                    <br />
			<span class="description">直接放入广告代码即可，宽度不超过722*。示例：<DIV class="dp-highlighter nogutter"style="width:420px;"><DIV class=bar></DIV>
<OL class=dp-c start=0>
<LI class=alt><SPAN><SPAN>&lt;a&nbsp;href=</SPAN><SPAN class=string>"链接地址"</SPAN><SPAN>&gt;&lt;img&nbsp;src=</SPAN><SPAN class=string>"图片地址"</SPAN><SPAN>&nbsp;alt=</SPAN><SPAN class=string>"图片说明"</SPAN><SPAN>/&gt;&lt;/a&gt;&nbsp;&nbsp;</SPAN></SPAN></LI></OL></DIV></span>            
                </td>
        	</tr>
         
            <tr valign="top">
                <th scope="row"><label>评论表单广告</label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="lovnvns_comment_ad"><?php echo get_option('lovnvns_comment_ad'); ?></textarea>
                    <br />
					<span class="description">直接放入广告代码即可，宽度不超过748*。示例：<DIV class="dp-highlighter nogutter"style="width:420px;"><DIV class=bar></DIV>
<OL class=dp-c start=0>
<LI class=alt><SPAN><SPAN>&lt;a&nbsp;href=</SPAN><SPAN class=string>"链接地址"</SPAN><SPAN>&gt;&lt;img&nbsp;src=</SPAN><SPAN class=string>"图片地址"</SPAN><SPAN>&nbsp;alt=</SPAN><SPAN class=string>"图片说明"</SPAN><SPAN>/&gt;&lt;/a&gt;&nbsp;&nbsp;</SPAN></SPAN></LI></OL></DIV></span>            
                </td>
        	</tr>    
            <tr valign="top">
                <th scope="row"><label>版权所有</label></th>
                <td>
                    <INPUT style="width:35em; height:25px;" type="text" name="lovnvns_Designed"  value="<?php echo get_option('lovnvns_Designed'); ?>"></td>
            </tr>    
		</table>
		
		<input type="submit" name="save" id="button-primary" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
    <style type="text/css"> span.description{ font-style:normal;} .form-table h3{ padding:5px 10px 4px; color:#FFF; background-color:#679729;} a{
		color:#679729;}</style>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/highlight.css" />
</div>
<?php
function show_id() {
    global $wpdb;
    $request = "SELECT $wpdb->terms.term_id, name,count FROM $wpdb->terms ";
    $request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
    $request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
    $request .= " ORDER BY term_id asc";
    $categorys = $wpdb->get_results($request);
    foreach ($categorys as $category) { 
        $output = '<ol>［<font color=#0196e3>'.$category->term_id.'</font>］'.$category->name.'[<font color=red>'.$category->count.'</font>]</ol>';
        echo $output;
    }
}
?>

<style type="text/css">
    
    .categoryid{position:fixed;width:184px;height:355px;background:#fff;right:30px;top:114px;z-index:100;OVERFLOW: auto;}
    .categoryid ol{height:8px;line-height: 8px;}
</style>
<div class="categoryid">
    <span class="show_id">
        <ol><h4>ID 分类对应  文章总数</h4></ol>
        <?php show_id();?>
    </span>
</div>
<!-- Options Form begin -->
<?php } 
	// create custom plugin settings menu
	add_action('admin_menu', 'lovnvns_add_option');
?>
