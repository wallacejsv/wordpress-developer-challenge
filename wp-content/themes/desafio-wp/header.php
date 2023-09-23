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
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

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
			<div class="nav-top-full scroll">
				<div class="top-nav-header">
					<div class="container">
						<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php
							$image = get_field('logo', 'options');

							if( !empty( $image ) ): ?>
								<img loading="lazy" class="logo" loading="lazy" width="<?php echo esc_attr($image['width']); ?>" height="<?php echo esc_attr($image['height']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?> - <?php echo $name; ?>" />
							<?php endif; ?>
						</a>
						<?php if ( is_nav_menu( 'Menu_Principal' ) ) { ?>
							<nav class="nav-principal">
								<div>
									<?php wp_nav_menu(array('container'=> false, 'menu' => 'Menu_Principal')) ?>
								</div>
							</nav>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php
			$query_args = array(
				'post_type'              => 'video',
				'posts_per_page'         => '1',
				'order'                  => 'DESC',
				'post_status'            => 'publish',
				'orderby'                => 'date',
				'offset'				 => 0
			);
			$the_query = new WP_Query( $query_args );
			?>
			<?php if ( $the_query->have_posts() ) : ?>
				<div class="featured-post">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post();
						$image_featured = get_field('bx_imagem_capa_video', get_the_ID());
						$time_video = get_field('bx_play_video_duration', get_the_ID());
						$terms = wp_get_post_terms(get_the_ID(), 'video_type');
					?>
						<div class="featured-info" style="background-image: url(<?php echo esc_url($image_featured); ?>);">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<div class="row infos">

											<div class="col-md-2 item-info-box">
												<a href="<?php echo home_url('/video_type/') . $terms[0]->slug; ?>">
													<p><?php echo esc_html($terms[0]->name); ?></p>
												</a>
											</div>

											<div class="col-md-2 item-info-box outline">
												<a href="#">
													<p><?php echo esc_html($time_video); ?>m</p>
												</a>
											</div>
										</div>
										<div class="title-block">
											<h1><?php echo esc_html(get_the_title()); ?></h1>
										</div>
										<div class="bt-infor">
											<a href="<?php echo the_permalink(); ?>">
												<button class="bt-default">Mais informações</button>
											</a>
										</div>
									</div>

								</div>
							</div>
						</div>
					<?php endwhile;?> <?php wp_reset_query(); ?>
				</div>
			<?php endif; ?>
        </header>