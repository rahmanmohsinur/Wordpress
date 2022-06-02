<?php // Video Posts Start Here
        $videoPosts = new WP_Query('cat=146&posts_per_page=20');
        if ($videoPosts->have_posts()) : ?>
			            <div class="list-group-wraper">
		                    <ul class="list-group list-group-flush">
                                <?php 
                                while ($videoPosts->have_posts()) : $videoPosts->the_post(); ?>
								<li class="list-group-item list-group-item-action">
                                  <div class="media">
								    <a href="<?php the_permalink();?>" title="<?php echo wp_trim_words( get_the_title(), 10, '' ); ?>">
                                       <?php 
                                       if ( has_post_thumbnail() ) { ?>
                                          <img src="<?php the_post_thumbnail_url('extra-small-thumbnail'); ?>" class="align-self-start mr-3" />
                                       <?php } ?>
                                    </a>
									<div class="media-body">
					                    <span><?php echo uniapps_article_published_time(); ?></span>
					                    <h4><a class="text-dark" href="<?php the_permalink();?>" title="<?php echo wp_trim_words( get_the_title(), 10, '' ); ?>"><?php echo wp_trim_words( get_the_title(), 10, '' ); ?></a></h4>
				                    </div>
                                    <span class="align-self-center mx-2"><a class="text-secondary" href="<?php the_permalink();?>">
                                        <i class="far fa-play-circle fa-2x"></i></a>
                                    </span>
                                  </div>
								</li>
                                <?php 
                                endwhile; ?>
				            </ul>
                        </div>
        <?php 
        else:
            echo '<h3>শীঘ্রইি আসছে আরো নতুন আর্টিকেল</h3>';
        endif;
        wp_reset_postdata();
        // RECENT POST ENDS HERE
?>

