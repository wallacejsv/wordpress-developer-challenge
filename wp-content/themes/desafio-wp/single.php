<?php
get_header();

$time_video = get_field('bx_play_video_duration', get_the_ID());
$terms = wp_get_post_terms(get_the_ID(), 'video_type');
$bx_play_video_ID = get_field('bx_play_video_ID', get_the_ID());

$code_video = "";

if (preg_match('/[?&]v=([^&]+)/', $bx_play_video_ID, $matches)) {
    $code_video = $matches[1];
}

?>

<div class="video-unique">
    <div class="container">
        <div class="row infos">
            <div class="col-md-2 item-info-box">
                <a href="#">
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

        <div class="embed-video">
            <iframe width="100%" height="920" src="https://www.youtube.com/embed/<?php echo esc_html($code_video); ?>" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="description-block">
            <p><?php the_content(); ?></p>
        </div>
    </div>
</div>

<?php get_footer(); ?> 