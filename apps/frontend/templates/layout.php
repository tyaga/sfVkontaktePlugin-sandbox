<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>

	<? include_partial('sfVkontakteFetch/init_js_options')?>

	<?php include_javascripts() ?>
  </head>
  <body>
  <? include_partial('sfVkontakteFetch/messages')?>

  <div id="content" style="display:none;">
    <?php echo $sf_content ?>
  </div>
  </body>
</html>
