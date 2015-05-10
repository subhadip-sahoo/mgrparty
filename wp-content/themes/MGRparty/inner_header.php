<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
<title>
  <?php if (function_exists('is_tag') && is_tag()) {
    single_tag_title('Tag Archive for &quot;'); echo '&quot; - ';
  } elseif (is_archive()) {
    wp_title(''); echo ' Archive - ';
  } elseif (is_search()) {
    echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
  } elseif (!(is_404()) && (is_single()) || (is_page())) {
    wp_title(''); echo ' - ';
  } elseif (is_404()) {
    echo 'Not Found - ';
  }
  if (is_home()) {
    bloginfo('name'); echo ' - '; bloginfo('description');
  } else {
    bloginfo('name');
  }
  if ($paged > 1) {
    echo ' - page '. $paged;
  } ?>
</title>
<?php wp_head(); ?>
<script>
jQuery(document).ready(function () {
jQuery('.mobile-main-nav').meanmenu();
});
</script>
</head>
<body>
<div id="wrapper" class="inner-bg">  <!--wrapper start-->

<div id="bottom"></div>
 <!--wrapper start-->
 <!--header start-->
<header class="header">
<div class="logo"><a href="<?php bloginfo('url') ;?>">
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header logo ') ) : ?>
 <?php endif; ?>
</a></div>
<nav class="mobile-main-nav">
  <?php $args = array(
  'theme_location'  => 'primary',
  'menu'            => 'Main-menu', 
  'container'       => '', 
  'container_class' => '', 
  'container_id'    => '',
  'menu_class'      => '', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '<span>',
  'link_after'      => '</span>',
  'items_wrap'      => '<ul>%3$s</ul>',
  'depth'           => 0,
  'walker'          => '');
?>
<?php wp_nav_menu( $args );  ?>
</nav>
<nav class="main-nav">
  <?php $args = array(
  'theme_location'  => 'primary',
  'menu'            => 'Main-menu', 
  'container'       => '', 
  'container_class' => '', 
  'container_id'    => '',
  'menu_class'      => '', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '<span>',
  'link_after'      => '</span>',
  'items_wrap'      => '<ul>%3$s</ul>',
  'depth'           => 0,
  'walker'          => '');
?>
<?php wp_nav_menu( $args );  ?>
</nav>
<div class="social-nav">
<ul>
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header Social Icon ') ) : ?>
 <?php endif; ?>
</ul>
</div>
</header>
 <!--header end-->