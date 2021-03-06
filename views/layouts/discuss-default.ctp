<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('Discuss Plugin for CakePHP'); ?> -
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->css('/discuss/css/style');
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $html->link(__('Discuss Plugin for CakePHP', true), '/discuss/discuss_forums'); ?></h1>
		</div>
		<div id="content">
			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">

		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>