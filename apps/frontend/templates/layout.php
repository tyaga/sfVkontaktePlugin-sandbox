<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>

	<? include_partial('sfVkontakteFetch/init_js_options')?>

	<script language="javascript">
		Urls = {
			notice: '<?=url_for('main/notification')?>' 
		};
	</script>

	<?php include_javascripts() ?>
  </head>
  <body>
  <? include_partial('sfVkontakteFetch/messages')?>

  <div id="content" style="display:none;">

	<h1>Application successfully run!</h1>

	<ul id="menu">
		<li><a href="javascript:void(0);" onclick="main_tab();">Page</a></li>
		<li><a href="javascript:void(0);" onclick="secure_tab();">Secure methods</a></li>
		<li><a href="javascript:void(0);" onclick="activity_tab();">Unsecure methods</a></li>
		<li><a href="javascript:void(0);" onclick="image_tab();">Upload image</a></li>
		<li><a href="javascript:void(0);" onclick="wall_tab();">Wall post</a></li>
	</ul>

    <?php echo $sf_content ?>
	  
  </div>
  </body>
</html>
