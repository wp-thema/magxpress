<!DOCTYPE HTML> 
<html lang="en"><head><meta charset="<?php bloginfo( 'charset' ); ?>" /><meta name="viewport" content="width=device-width,user-scalable=yes">

<title><?php wp_title( '//', true, 'right' ); ?></title>

<!-- Powered By: MagXpress WordPress Theme by Shailan (http://shailan.com/wordpress/themes/magxpress) -->

<link href='//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/core.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/style.css" />

<?php wp_head(); ?>

<link rel="shortcut icon" href="<?php get_bloginfo('url'); ?>/favicon.ico" /> 
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />

</head>
<body <?php body_class(); ?>>

<?php if( get_theme_setting('analytics_code') != "" && get_theme_setting('analytics_code') !== FALSE ){ ?>
<?php themeinfo( 'analytics_code' ); ?>
<?php } ?>

<!-- Top Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="collapsible">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?> // </a>
</div>
<div class="navbar-collapse collapse" id="collapsible" >
	<ul class="nav navbar-nav">	
	<?php
			wp_nav_menu( array(
				'menu'              => 'primary',
				'theme_location'    => 'primary',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
		'container_id'      => 'bs-example-navbar-collapse-1',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				'walker'            => new wp_bootstrap_navwalker())
			);
		?>
	</ul>

	<form id="searchform" class="navbar-form navbar-right" role="form">
	<div class="input-group">
		<input type="text" class="form-control" name="s" placeholder="<?php _e("Search") ?>"><span class="input-group-btn"><button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-search"></span></button></span>
	</div>
	</form>

</div><!--/.nav-collapse -->
</div><!-- /.container -->
</nav><!-- /.navbar -->

<?php if( ( is_front_page() || is_home() ) && is_active_sidebar('jumbotron') ){ ?>
<!-- Jumbotron -->
<div class="jumbotron">
<div class="container">
<?php dynamic_sidebar( 'jumbotron' ); ?>
</div>
</div>
<?php } else { ?>
<div class="padding-top"></div>
<?php } ?>

<div class="container wrap">