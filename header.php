<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="robots" content="all,index,follow" />

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/foundation.css" />
    <script src="<?php bloginfo('template_url') ?>/js/vendor/modernizr.js"></script>
	<?php 
		wp_head(); 
		$page_id = pageid();
	?>
</head>
<body id="body<?php echo $page_id?>">
	<div id="content-wrapper">
		<header>
			<div class="top large-12">
			</div>
			<div class="slide">
			</div>
		</header>
