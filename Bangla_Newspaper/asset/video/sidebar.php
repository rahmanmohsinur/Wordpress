<aside class="mt-2">
    <?php // Related Posts By Category Starts
    $orig_post = $post;
    global $post;
    $categories = get_the_category($post->ID);
    if ($categories) {
        $category_ids = array();
        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
        $args=array(
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page'=> 20, // Number of related posts that will be displayed.
            'caller_get_posts'=>1
        );
        $my_query = new wp_query( $args );
        if( $my_query->have_posts() ) { ?>
            <div class="sidebar-module sidebar-module-inset">
			    <div class="">
		            <ul class="list-group list-group-flush">
			        	<?php 
						while( $my_query->have_posts() ) {
                            $my_query->the_post(); ?>
							<li class="list-group-item list-group-item-action">
                                <div class="media video-media">
                                    <a class="link_overlay" href="<?php the_permalink();?>"></a>
								    <a href="<?php the_permalink();?>" title="<?php echo wp_trim_words( get_the_title(), 10, '' ); ?>">
                                        <?php 
                                        if ( has_post_thumbnail() ) { ?>
										    <span class="p-relative align-self-start mr-3">
											    <span class="sidebar-play-icon"><i class="fas fa-play"></i></span>
                                                <img src="<?php the_post_thumbnail_url('small-video-thumbnail'); ?>" class="" />
											</span>
                                        <?php 
									    } ?>
                                    </a>
									<div class="media-body">
					                    <h4>
                                            <a class="text-dark" href="<?php the_permalink();?>" title="<?php echo wp_trim_words( get_the_title(), 10, '' ); ?>">
                                                <?php echo wp_trim_words( get_the_title(), 10, '' ); ?>
                                            </a>
                                        </h4>
					                    <?php
                                            $tags = get_the_tags();
                                            $separetor = " ";
                                            $output = '';
                                            if ($tags){
                                                foreach($tags as $tag) {
                                                    $output .= '<span class="text-secondary">' . $tag->name . '</span>' . $separetor;
                                                }
                                                echo trim($output, $separetor);
                                            }
                                        ?>
				                        <span class="d-block text-secondary"><?php echo bangla_number((int) get_post_meta(get_the_ID(), 'post_views_count', true)) . ' দর্শন'; ?></span>
                                    </div>
                                </div>
						    </li>
                        <?php 
						} ?>
				    </ul>
                </div>
            </div><!--/sidebar-module -->

        <?php 
		}
	}
    $post = $orig_post;
    wp_reset_query();
    // Related Posts By Category Ends
    ?>
        
	
    <?php if (is_active_sidebar('sidebar2')) : ?>
        <?php dynamic_sidebar('sidebar2') ?>
    <?php endif ?>
	
    <?php if (is_active_sidebar('sidebar3')) : ?>
        <?php dynamic_sidebar('sidebar3') ?>
    <?php endif ?>
	
    <div class="sidebar-module sidebar-module-inset">
        <h4 class="widget-title">সাইট ইউজার লগইন</h4>
        <div class="list-group-wraper">
            <ul class="list-group list-group-flush">
                <?php 
                if ( is_user_logged_in() ):
                    $current_user = wp_get_current_user();
                    if ( ($current_user instanceof WP_User) ) {
                        echo '<li class="list-group-item list-group-item-action">' . get_avatar( $current_user->user_email, 32 ) . $current_user->display_name . '</li>' ;
                    }
                endif;
                ?>
                <li class="list-group-item list-group-item-action"><?php wp_loginout($_SERVER['REQUEST_URI'], true); ?></li>
                <li class="list-group-item list-group-item-action"><?php wp_register('', ''); ?></li>
            </ul>
        </div>
    </div>
</aside>

