    <div class="sidebar-module adds-container pt-2">
        <div class="adds">
            <!-- universal -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-6131771496179717"
                data-ad-slot="9318136197"
                data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div><!--/sidebar-module -->
	
    <aside>
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
                    'posts_per_page'=> 5, // Number of related posts that will be displayed.
                    'caller_get_posts'=>1
                );
                $my_query = new wp_query( $args );
                if( $my_query->have_posts() ) { ?>
                    <div class="sidebar-module sidebar-module-inset animate">
		                <h4 class="widget-title">একই সম্পর্কিত আরো আর্টিকেল</h4>
			            <div class="">
		                  <ul class="list-group list-group-flush">
			        	    <?php while( $my_query->have_posts() ) {
                                $my_query->the_post(); ?>
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
					                    <h4><a href="<?php the_permalink();?>" title="<?php echo wp_trim_words( get_the_title(), 10, '' ); ?>"><?php echo wp_trim_words( get_the_title(), 10, '' ); ?></a></h4>
				                    </div>
                                  </div>
								</li>
                            <?php } ?>
				        </ul>
                    </div>
                </div><!--/sidebar-module -->

                <?php }
			}
            $post = $orig_post;
            wp_reset_query();
            // Related Posts By Category Ends
        ?>
				
        
        <?php // RECENT POST STARTS
                $recentPosts = new WP_Query('posts_per_page=10');
                if ($recentPosts->have_posts()) : ?>
                    <div class="sidebar-module sidebar-module-inset animate">
		                <h4 class="widget-title">সাম্প্রতিক আর্টিকেল</h4>
			            <div class="list-group-wraper">
		                    <ul class="list-group list-group-flush">
                                <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
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
					                    <h4><a href="<?php the_permalink();?>" title="<?php echo wp_trim_words( get_the_title(), 10, '' ); ?>"><?php echo wp_trim_words( get_the_title(), 10, '' ); ?></a></h4>
				                    </div>
                                  </div>
								</li>
                                <?php endwhile; ?>
				            </ul>
                        </div>
                    </div><!--/sidebar-module -->
		        <?php else:
                    echo '<h3>শীঘ্রইি আসছে আরো নতুন আর্টিকেল</h3>';
                endif;
                wp_reset_postdata();
                // RECENT POST ENDS HERE
            ?>
	
        <?php if (is_active_sidebar('sidebar2')) : ?>
           <?php dynamic_sidebar(sidebar2) ?>
        <?php endif ?>
        <?php if (is_active_sidebar('sidebar3')) : ?>
           <?php dynamic_sidebar('sidebar3') ?>
        <?php endif ?>
        <div class="sidebar-module sidebar-module-inset animate">
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