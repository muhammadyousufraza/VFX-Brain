<?php
/**
* The default template for displaying Portfolio standart post format
*
*/


?>
    <div class="cbp-l-project-title">
        <h1 class="white"><?php echo the_title();?></h1>
    </div>

    <div class="cbp-l-project-subtitle"><?php the_author(); ?></div>

    <div class="cbp-slider">
        <ul class="cbp-slider-wrap">
            <?php
            /*
            foreach ( $nt_forester_portfolio_gallery_image as $image ) {
                if ( !empty( $image ) ) {
                    ?>
                    <li class="cbp-slider-item">
                        <img src="{$image['full_url']}" alt='{$image['alt']}' />
                    </li>
                    <?php
                }
            }
            */
            ?>
        </ul>
    </div>

    <!--post single media-->
    <div class="project-single-image">
        <img src="<?php echo esc_url( $nt_forester_img_url ); ?>" class="img-responsive" alt="<?php the_title_attribute(); ?>">
    </div>

    <div class="cbp-l-project-container">
        <div class="cbp-l-project-desc">
            <div class="cbp-l-project-desc-text">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
