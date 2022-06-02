
<div class="front-page-fifth-row health-posts">
    <div class="container">
        <div class="row group-section">
            <?php // Health Posts Start Here
            $healthPosts = new WP_Query('cat=32&posts_per_page=2');
            if ($healthPosts->have_posts()) :
                while ($healthPosts->have_posts()) : $healthPosts->the_post(); ?>
                    <div class="col-sm-6 col-md-3 blog-front-page mb-5">
                        <div class="thumbnail">
                            <div class="card">
                                <?php
                                    $attachment_id = get_post_thumbnail_id(); 
                                    $img_src_small = wp_get_attachment_image_url( $attachment_id, 'mobile-thumbnail' );
                                    $img_src_large = wp_get_attachment_image_url( $attachment_id, 'large-thumbnail' );
                                ?>
                                <a href="<?php the_permalink();?>" title="<?php echo get_the_title(); ?>"></a>
                                <picture>
                                    <source srcset="<?php echo esc_url( $img_src_small ); ?>" media="(max-width: 400px)">
                                    <source srcset="<?php echo esc_url( $img_src_large ); ?>">
                                    <img class="card-img-top"  src="<?php echo esc_url( $img_src_large ); ?>" alt="<?php echo get_the_title(); ?>">
                                </picture>
                                <div class="card-body">
                                    <h4 class="card-title"><a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h4><!-- /caption -->
                                    <p class="card-text"><?php echo get_excerpt(500); ?></p>
                                    <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">বিস্তারিত&raquo;</a>
                                </div><!-- /card-body -->
                            </div>
                        </div><!-- /thumbnail -->
                    </div><!-- /col-md-3 -->
                <?php 
				endwhile;
            else:
                echo '<h3>শীঘ্রইি আসছে নতুন</h3>';
            endif;
            wp_reset_postdata();
            // Aunty Posts End Here
            ?>
  

            <?php // Health Posts Start Here
            $healthPosts = new WP_Query('cat=24&posts_per_page=2');
            if ($healthPosts->have_posts()) :
                while ($healthPosts->have_posts()) : $healthPosts->the_post(); ?>
                    <div class="col-sm-6 col-md-3 blog-front-page mb-5">
                        <div class="thumbnail">
                            <div class="card">
                                <?php
                                    $attachment_id = get_post_thumbnail_id(); 
                                    $img_src_small = wp_get_attachment_image_url( $attachment_id, 'mobile-thumbnail' );
                                    $img_src_large = wp_get_attachment_image_url( $attachment_id, 'large-thumbnail' );
                                ?>
                                <a href="<?php the_permalink();?>" title="<?php echo get_the_title(); ?>"></a>
                                <picture>
                                    <source srcset="<?php echo esc_url( $img_src_small ); ?>" media="(max-width: 400px)">
                                    <source srcset="<?php echo esc_url( $img_src_large ); ?>">
                                    <img class="card-img-top"  src="<?php echo esc_url( $img_src_large ); ?>" alt="<?php echo get_the_title(); ?>">
                                </picture>
                                <div class="card-body">
                                    <h4 class="card-title"><a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h4><!-- /caption -->
                                    <p class="card-text"><?php echo get_excerpt(500); ?></p>
                                    <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">বিস্তারিত&raquo;</a>
                                </div><!-- /card-body -->
                            </div>
                        </div><!-- /thumbnail -->
                    </div><!-- /col-md-3 -->
                <?php 
				endwhile;
            else:
                echo '<h3>শীঘ্রইি আসছে নতুন</h3>';
            endif;
            wp_reset_postdata();
            // Aunty Posts End Here
            ?>
        </div><!--/row-->
    </div><!--/container-->
</div><!--/front-page-third-row-->


