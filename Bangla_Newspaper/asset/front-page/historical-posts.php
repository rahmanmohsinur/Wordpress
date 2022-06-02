
<div class="front-page-forth-row historical-posts">
    <div class="container">
        <div class="row group-section">
            <?php // Historical Posts Start Here
            $historicalPosts = new WP_Query('cat=15&posts_per_page=4');
            if ($historicalPosts->have_posts()) :
                while ($historicalPosts->have_posts()) : $historicalPosts->the_post(); ?>
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
                                    <h4 class="card-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4><!-- /caption -->
                                    <p class="card-text"><?php echo get_excerpt(500); ?></p>
                                    <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">বিস্তারিত&raquo;</a>
                                </div><!-- /thumbnail-inner-container -->
                            </div>
                        </div><!-- /thumbnail -->
                    </div><!-- /col-md-3 -->
                <?php 
			    endwhile;
            else:
                echo '<h3>শীঘ্রইি আসছে নতুন</h3>';
            endif;
            wp_reset_postdata();
            // Historical Posts End Here
            ?>
        </div><!--/row-->
    </div><!--/container-->
</div><!-- /historical-posts -->


