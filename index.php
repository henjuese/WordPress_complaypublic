<?php if (get_option('lovnvns_home') == '1') { ?>
<?php include('cms.php'); ?>
<?php } else { include(TEMPLATEPATH . '/blog.php'); } ?>