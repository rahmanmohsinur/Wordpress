<?php
$count = 0;
$recentPosts = new WP_Query('posts_per_page=7');
if ($recentPosts->have_posts()) : ?>
    <div class="front-page-1st-row recent-posts">
        <div class="list-group-wraper">
            <ul class="list-group list-group-flush">
	
	            <?php
		        while ($recentPosts->have_posts()) : $recentPosts->the_post();
		            $count += 1;
                    if($count > 3): ?>
                        <li class="list-group-item list-group-item-action p-relative">
						    <a class="link_overlay" href="<?php the_permalink();?>"></a>
                            <div class="media">
								<a href="<?php the_permalink();?>" title="<?php echo wp_trim_words( get_the_title(), 10, '' ); ?>">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <img src="<?php the_post_thumbnail_url('small-video-thumbnail'); ?>" class="align-self-start mr-3" />
                                    <?php } ?>
                                </a>
							    <div class="media-body">
					                <h4>
									    <a class="text-dark" href="<?php the_permalink();?>" title="<?php echo wp_trim_words( get_the_title(), 10, '' ); ?>"><?php echo wp_trim_words( get_the_title(), 10, '' ); ?></a>
								    </h4>
					                <span class="text-secondary"><?php echo uniapps_article_published_time(); ?></span>
				                </div>
                            </div>
						</li>
		            <?php
                    endif; 
		        endwhile; 
				?>
		    </ul><!-- /list-group -->
        </div><!-- /list-group-wraper -->
    </div><!--/front-page-1st-row-->
		
<?php
else:
    echo '<h3>শীঘ্রইি আসছে নতুন</h3>';
endif;
wp_reset_postdata();
?>

