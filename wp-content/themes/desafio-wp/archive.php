<?php
get_header();

$terms = wp_get_post_terms(get_the_ID(), 'video_type');

?>

<div class="archive-unique">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="title-block">
                    <h2><?php echo esc_html($terms[0]->name); ?></h2>
                </div>
                <div class="description-block">
                    <p><?php echo esc_html($terms[0]->description); ?></p>
                </div>
            </div>
            <div class="col-md-7">
                <?php 
                    $query_args = array(
                        'post_type'              => 'video',
                        'posts_per_page'         => '20',
                        'order'                  => 'DESC',
                        'post_status'            => 'publish',
                        'orderby'                => 'date',
                        'offset'				 => 1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'video_type',
                                'field'    => 'slug',
                                'terms'    => $terms[0]->slug,
                            ),
                        ),
                    );
                    $the_query = new WP_Query( $query_args );
                ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <div class="sliders-archive">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                            $image_featured = get_field('bx_imagem_capa_video', get_the_ID());
                            $time_video = get_field('bx_play_video_duration', get_the_ID());
                        ?>
                            <div class="video-item">
                                <a href="<?php esc_url(the_permalink()); ?>">
                                    <figure>
                                        <img src="<?php echo esc_url($image_featured); ?>" alt="<?php echo esc_html(get_the_title()); ?>" title="<?php echo esc_html(get_the_title()); ?>" />
                                    </figure>
                                    <div class="infos">
                                        <div class="item-info-box outline">
                                            <a href="#">
                                                <p><?php echo esc_html($time_video); ?>m</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="title-block">
                                        <h3><?php echo get_the_title(); ?></h3>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?> <?php wp_reset_query(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?> 