<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="author" content="@JonathanVieira" />
        <meta name="robots" content="index">
		<meta name="google" content="notranslate" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <?php
			$sep = ' | ';
			$name = get_bloginfo( 'name' );
			$description = get_bloginfo( 'description' );

			if( is_category() || is_page() || is_404() || is_search() || is_singular() || is_author() || is_tag() || is_archive() )
				$title = wp_title( $sep, false, 'right' ) . $name;

			if( is_home() || is_front_page() )

			if ($description) {
				$title = $name . $sep . $description;
			} else {
				$title = $name;
			}
		?>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
		<header>
            HEADER
        </header>