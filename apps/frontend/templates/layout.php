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

	<h2>Application successfully run!</h2>

	<ul>
		<li><a href="javascript:void(0);" onclick="main_tab();">Main page - show app.User properties</a></li>
		<li><a href="javascript:void(0);" onclick="secure_tab();">Test secure method - send notification to yourself</a></li>
		<li><a href="javascript:void(0);" onclick="activity_tab();">Test unsecure methods - retrieve and show your current activity status</a></li>
		<li><a href="javascript:void(0);" onclick="image_tab();">Test image upload wrapper - send the image to the album</a></li>
		<li><a href="javascript:void(0);" onclick="wall_tab();">Test wall post wrapper - post message and image to your friends walls</a></li>
	</ul>

    <?php echo $sf_content ?>
	  
  </div>
  </body>
</html>
