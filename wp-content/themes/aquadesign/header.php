<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Ondra-Huyett
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/normalize.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/webflow.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo ('stylesheet_directory'); ?>/assets/css/aquadesign.webflow.css">
<link rel="stylesheet" href="<?php bloginfo ('stylesheet_directory'); ?>/assets/css/swipebox.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo ('stylesheet_directory'); ?>/js/main.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php bloginfo ('stylesheet_directory'); ?>/js/jquery.slides.min.js"></script>
<script type="text/javascript" src="<?php bloginfo ('stylesheet_directory'); ?>/js/form.validation.js"></script>
<script src="<?php bloginfo ('stylesheet_directory'); ?>/js/jquery.swipebox.js"></script>


<script>
WebFont.load({
  google: {
    families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","PT Serif:400,400italic,700,700italic"]
  }
});
</script>
  
<?php wp_head(); ?>

<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<div class="w-section w-hidden-medium w-hidden-small w-hidden-tiny utility-info">
   <div class="w-container w-hidden-small w-hidden-tiny utility-container">
    <div class="w-row">
      <div class="w-col w-col-3">
        <div><?php get_search_form(true) ?></div>
      </div>
      <div class="w-col w-col-9 w-clearfix">
               <?php wp_nav_menu( array( 'theme_location' => 'utility', 'menu_id' => 'header-nav-link' ) ); ?>
      </div>
    </div>
  </div>
  </div>
  <div class="w-section nav-block">
    <div class="w-container header-container">
      <div class="w-nav navbar" data-collapse="medium" data-animation="default" data-duration="400" data-contain="1" data-doc-height="1">
        <div class="w-container navbar-container mobile-menu-logo">
          <a class="w-nav-brand logo-block w--current" href="<?php echo home_url() ?> ">
			<img class="logo" src="<?php bloginfo (stylesheet_directory); ?>/assets/images/sampleLogoBorderBlueOffCenter.png">
          </a>
		  <div class="w-nav-button menu-button">
            <div class="w-icon-nav-menu"></div>
          </div>
		  
        </div>
		<div class="w-nav-overlay" data-wf-ignore="" style="display: none;"></div>
      </div>
    </div>

      <!-- Desktop Menu -->
	<div class="nav-window menu-nav-window desktop-menu">
      <nav class="w-nav-menu nav-menu menu-left" role="navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'primary-left', 'menu_id' => 'primary-menu' ) ); ?>
      </nav>
        <nav class="w-nav-menu nav-menu menu-center">
            <ul id="primary-menu" class="menu">
                <li class="menu-item menu-item-type-post_type menu-item-object-page nav-logo">
                    <a class="w-nav-brand logo-block w--current menu-logo" href="<?php echo home_url() ?> ">
                        <img class="logo" src="<?php bloginfo (stylesheet_directory); ?>/assets/images/sampleLogoBorderBlueOffCenter.png">
                    </a>
                </li>
            </ul>
        </nav>
      <nav class="w-nav-menu nav-menu menu-right" role="navigation">
         <?php wp_nav_menu( array( 'theme_location' => 'primary-right', 'menu_id' => 'primary-menu' ) ); ?>
      </nav>
    </div>

      <!--Mobile Menu -->
      <div class="nav-window menu-nav-window mobile-menu" style="display:none">
          <nav class="w-nav-menu nav-menu" role="navigation">
              <?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile' ) ); ?>
          </nav>
      </div>
  </div>