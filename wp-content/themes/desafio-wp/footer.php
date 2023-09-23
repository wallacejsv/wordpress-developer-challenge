<footer>
    <div class="container">
        <?php 
            $image = get_field('logo', 'options');
        ?>

        <div class="row">
            <div class="col-md-6">
                <figure>
                    <?php 
                    if( !empty( $image ) ): ?>
                        <img loading="lazy" class="logo" loading="lazy" width="<?php echo esc_attr($image['width']); ?>" height="<?php echo esc_attr($image['height']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?> - <?php echo $name; ?>" />
                    <?php endif; 
                    ?>
                </figure>
                <div class="description-block">
                    <p>© 2023 — Play — Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>