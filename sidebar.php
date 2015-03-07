<div id="sidebar">

<script type="text/jscript">
$(document).ready(function(e) {
 var in_out_time = 800
 var scroll_Interval_time = 2000
 var scroll_time = 1000
 addli() 
 function addli(){
  $("#scroll_List").css("top",0);
  $("#scroll_List li:last").clone().prependTo("#scroll_List");
  $("#scroll_List li:first").css("opacity",0);
  $("#scroll_List li:first").animate({opacity:1},in_out_time);
  setTimeout(delLi_last,scroll_Interval_time) 
 }
 function delLi_last(){
  $("#scroll_List li:last").detach(); 
  $("#scroll_List").animate({top:55},scroll_time,addli)
 }
 
});
</script>
<div class="widget">
	<div id="tab-title">
		<span class="selected">最新文章</span>
		<span>热门文章</span>
	</div>
	<div id="tab-content">
		<ul>
			<?php query_posts("showposts=10&caller_get_posts=1&orderby=date&order=DESC"); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<li>
				<a href="<?php the_permalink() ?>
					" title="
					<?php the_title() ?>
					">
					<?php echo mb_strimwidth(get_the_title(), 0, 42, '...'); ?></a>
			</li>
			<?php endwhile; endif; ?></ul>
		<ul class="hide">
			<?php simple_get_most_viewed(); ?></ul>
		<div class="clear"></div>
	</div>
</div>
<!--侧边栏广告-->
<?php if(get_option('lovnvns_sidebar_ad')!="")
	echo '<div class="sidebar_ad">'.get_option('lovnvns_sidebar_ad').'</div>';
?>
<div class="widget2">
	<div class="widget4">
		关键词：
		<?php wp_tag_cloud('smallest=12&largest=16&unit=px&number=65&orderby=count&order=RAND');?></div>
</div>
<div id="newcomments">
	<h3>随机文章</h3>
	<ul>
		<?php Get_Random_Post(12,28) ?></ul>
</div>
<!-- <div id="comments">
	<h3>最新评论</h3>
	<ul id="scroll_List">
		<?php Get_Recent_Comment(); ?></ul>
</div> -->
<!--分类目录-->
<!-- <div id="comments">
<ul id="tab-widget3"> 
			<div class="categories_c">
				<ul>
				    <?php wp_list_categories('orderby=name&title_li=&hierarchical=0&exclude='.get_option('swt_cat_exclude')); ?>
				</ul>
				<div class="clear"></div>
			</div>
</ul>
</div> -->

<!--
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具1') ) : ?>
<?php endif; ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具2') ) : ?>
<?php endif; ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具3') ) : ?>
<?php endif; ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具4') ) : ?>
<?php endif; ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具5') ) : ?>
<?php endif; ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具6') ) : ?>
<?php endif; ?>-->
</div>