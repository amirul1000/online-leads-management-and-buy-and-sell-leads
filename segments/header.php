<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebPage">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<?php if ( segments_is_private() ) : ?>
    <?php get_template_part( 'templates/content', 'header-private' ); ?>
<?php else : ?>
    <?php get_template_part( 'templates/content', 'header-public' ); ?>
<?php endif; ?>

