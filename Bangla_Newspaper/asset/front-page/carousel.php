<?php
$count = 0;
$recentPosts = new WP_Query('posts_per_page=3');
if ($recentPosts->have_posts()) : ?>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
         <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
					
			<?php
			while ($recentPosts->have_posts()) : $recentPosts->the_post();
                if($count == 0): 
					$attachment_id = get_post_thumbnail_id(); 
                    $img_src_small = wp_get_attachment_image_url( $attachment_id, 'mobile-thumbnail' );
                    $img_src_large = wp_get_attachment_image_url( $attachment_id, 'large-thumbnail' ); ?>
								
                    <div class="carousel-item active">
						<picture>
                            <source srcset="<?php echo esc_url( $img_src_small ); ?>" media="(max-width: 400px)">
                            <source srcset="<?php echo esc_url( $img_src_large ); ?>">
                            <img class="img-fluid" src="<?php echo esc_url( $img_src_large ); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
                        </picture>
                        <div class="carousel-caption">
                            <h3 class="block-animation"><?php echo get_the_title(); ?></h3>
                            <p class="block-animation"><?php echo get_excerpt(300); ?> বিস্তারিত&raquo;</p>
                        </div>
                        <a class="carousel-link" href="<?php the_permalink(); ?>"></a>
                    </div>
                    <?php 
					$count += 1;
                else: 
					$attachment_id = get_post_thumbnail_id(); 
                    $img_src_small = wp_get_attachment_image_url( $attachment_id, 'mobile-thumbnail' );
                    $img_src_large = wp_get_attachment_image_url( $attachment_id, 'large-thumbnail' ); ?>
								
                    <div class="carousel-item">
						<picture>
                            <source srcset="<?php echo esc_url( $img_src_small ); ?>" media="(max-width: 400px)">
                            <source srcset="<?php echo esc_url( $img_src_large ); ?>">
                            <img class="img-fluid" src="<?php echo esc_url( $img_src_large ); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
                        </picture>
                        <div class="carousel-caption">
                            <h3 class="block-animation"><?php echo get_the_title(); ?></h3>
                            <p class="block-animation"><?php echo get_excerpt(300); ?> বিস্তারিত&raquo;</p>
                        </div>
                        <a class="carousel-link" href="<?php the_permalink(); ?>"></a>
                    </div>
	            <?php
                endif; 
			endwhile; 
			?>
        </div><!-- carousel-inner -->
					
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        </a>
    </div>
<?php
else:
    echo '<h3>শীঘ্রইি আসছে নতুন</h3>';
endif;
wp_reset_postdata();
?>



