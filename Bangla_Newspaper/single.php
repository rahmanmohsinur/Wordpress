<?php
include 'asset/single-page/header.php'; ?>
<div class="breadcrumbs pt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="pb-4">
          <?php custom_breadcrumbs();?>
        </div>
      </div><!-- /col-md-9 -->
      <div class="col-lg-3 translator lg-right">
        <div class="pb-4">
          <?php get_template_part('asset/translator'); ?>
        </div>
      </div><!-- /col-md-3 -->
    </div><!--/row-->
  </div><!--/container-->
</div><!--/breadcrumbs-->
<hr />
<div class="container">
  <?php if (have_posts()) :
    while (have_posts()) : the_post();
      setPostViews(get_the_ID()); ?>
   <article itemscope itemtype="http://schema.org/NewsArticle">
      <div class="row">
      <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>"/>
        <div class="col-lg-2 left-sidebar">
              <div itemprop="author" itemscope itemtype="https://schema.org/Person" class="blog-post-meta text-secondary">
                <div class="pub pub-date pb-2"><i class="far fa-calendar-alt"></i><?php echo uniapps_article_published_date(); ?></div>
                <div class="pub pub-date pb-2"><i class="far fa-clock"></i>আপডেট: <?php echo uniapps_article_update_date(); ?></div>
                <div class="pub editor pb-2"><i class="far fa-edit"></i>সম্পাদক: <a itemprop="url" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><span itemprop="name"><?php the_author(); ?></span></a></div>
                <div class="pub pub-date pb-2"><i class="fab fa-react"></i><?php echo bangla_number((int) get_post_meta(get_the_ID(), 'post_views_count', true)) . ' জন পড়েছেন'; ?></div>
              </div>
              <div class="social-share-button py-3">
                <?php include 'asset/social.php'; ?>
              </div>
              <hr class="lg-hidden" />
        </div><!-- /left-sidebar -->
        <div class="col-md-8 col-lg-6 mb-5 mr-auto">
          <div id="printableArea" class="blog-post">
             <?php
             // Get the video URL and put it in the $video variable
             $videoID = get_post_meta($post->ID, 'video_url', true);
             // Check if there is in fact a video URL
             if ($videoID) { ?>
               <div class="embed-responsive embed-responsive-16by9 mt-2 mb-3">
                 <iframe class="embed-responsive-item" src="//www.youtube-nocookie.com/embed/<?php echo $videoID; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
               </div>
               <h1 itemprop="headline" class="blog-post-title"><?php the_title(); ?></h1>
               <meta itemprop="description" content="<?php echo wp_trim_words( get_the_content(), 50, '' ); ?>" />
               <div class="blog-content">
			        <?php if ( has_post_thumbnail() ) { ?>
                        <div class="article_image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                            <meta itemprop="url" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large-thumbnail') ); ?>">
                            <?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large-thumbnail" ); ?>
                            <meta itemprop="width" content="<?php echo $image_data[1]; ?>">
                            <meta itemprop="height" content="<?php echo $image_data[2]; ?>">
                            <meta itemprop="caption" content="<?php echo $image_caption; ?>">
                        </div><!-- /article_image -->
				    <?php } ?> 
                 <div itemprop="articleBody" class="article-content"><?php the_content(); ?></div>
               </div><!--/blog-content-->
             <?php } else { ?>
               <h1 itemprop="headline" class="blog-post-title"><?php the_title(); ?></h1>
               <meta itemprop="description" content="<?php echo wp_trim_words( get_the_content(), 50, '' ); ?>" />
                 <div class="blog-content">
				    <?php if ( has_post_thumbnail() ) { ?>
                        <div class="article_image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                            <figure class="">
                                <?php the_post_thumbnail('large-thumbnail'); ?>
                                <meta itemprop="url" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large-thumbnail') ); ?>">
                                <?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large-thumbnail" ); ?>
                                <meta itemprop="width" content="<?php echo $image_data[1]; ?>">
                                <meta itemprop="height" content="<?php echo $image_data[2]; ?>">
                                <?php $image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
                                if(!empty($image_caption)) : ?>
                                    <figcaption itemprop="caption"><?php echo $image_caption; ?></figcaption>
                                <?php endif; ?>
                            </figure>
                        </div><!-- /article_image -->
				    <?php } ?> 
                   <div itemprop="articleBody" class="article-content"><?php the_content(); ?></div>
                 </div><!--/blog-content-->
               <?php } ?>
                  
          <footer class="article-footer clearfix">
            <div>
              <span class="category">
                <?php
                $categories = get_the_category();
                $separetor = " ";
                $output = '';
                if ($categories){
                  foreach ($categories as $category){
                    $output .= '<button type="button" class="btn btn-light btn-sm border border-ccc"><a itemprop="genre" href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a></button>' . $separetor;
                  }
                    echo trim($output, $separetor);
                  }
                ?>
              </span><!-- /category -->
              <span class="tag" itemprop="keywords">
                <?php
                $tags = get_the_tags();
                $separetor = " ";
                $output = '';
                if ($categories){
                  foreach($tags as $tag) {
                    $output .= '<button type="button" class="btn btn-light btn-sm border border-ccc"><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></button>' . $separetor;
                  }
                    echo trim($output, $separetor);
                  }
                ?>
              </span><!-- /tag -->
            </div>
            <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
              <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                <!--img src="https://google.com/logo.jpg"/-->
                <meta itemprop="url" content="http://mohammadmohsin.altervista.org/site/images/social/logo.png">
                <meta itemprop="width" content="224">
              </div>
              <meta itemprop="name" content="Uniapps">
            </div>
            <meta itemprop="datePublished" content="<?php the_time('Y/m/d'); ?>"/>
            <meta itemprop="dateModified" content="<?php the_modified_date('Y/m/d'); ?>"/>
          </footer><!-- /article-footer -->
        </div><!--/blog-post-->
        <hr />
        <div class="pager clearfix">
           <span class="float-left"><button type="button" class="btn btn-light border border-primary btn-lg rounded-circle"><?php previous_post_link('%link', '<span aria-hidden="true">&larr;</span>পূর্ববর্তী আর্টিকেল'); ?></button></span>
           <span class="float-right"><button type="button" class="btn btn-light border border-primary btn-lg rounded-circle"><?php next_post_link('%link', 'পরবর্তী আর্টিকেল <span aria-hidden="true">&rarr;</span>'); ?></button></span>
        </div>
      </div><!--/blog-main-->
        <div class="col-md-4 mb-5 blog-sidebar">
          <?php include 'asset/single-page/sidebar.php'; ?>
        </div><!-- /blog-sidebar -->
      </div><!-- /row -->
    </article>
    <?php endwhile;
  
  else:
    echo '<p>No contant found.</p>';
  endif; ?>
</div><!--/container-->

<div class="container-wrapper bg-f9f9f9 py-5">
  <div class="container comments-container animate">
    <div class="row">
          <?php comments_template('/comments.php'); ?>
    </div><!--/row -->
  </div><!--/container -->
</div><!--/comments-wrapper -->  
  
<div class="container-wrapper bg-f9f9f9 pb-5">
  <div class="container">
    <div class="row related-posts">
      
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
                'posts_per_page'=> 4, // Number of related posts that will be displayed.
                'caller_get_posts'=>1
            );
            $my_query = new wp_query( $args );
            if( $my_query->have_posts() ) {
              while( $my_query->have_posts() ) {
                $my_query->the_post(); ?>
                <div class="col-sm-6 col-lg-3 mb-5 clesr-fix">
                  <div class="card bg-light">
                    <?php
                        $attachment_id = get_post_thumbnail_id(); 
                        $img_src_small = wp_get_attachment_image_url( $attachment_id, 'mobile-thumbnail' );
                        $img_src_large = wp_get_attachment_image_url( $attachment_id, 'large-thumbnail' );
                    ?>
                    <a class="link_overlay" href="<?php the_permalink();?>" title="<?php echo get_the_title(); ?>"></a>
                    <picture>
                       <source srcset="<?php echo esc_url( $img_src_small ); ?>" media="(max-width: 400px)">
                       <source srcset="<?php echo esc_url( $img_src_large ); ?>">
                       <img class="card-img-top" src="<?php echo esc_url( $img_src_large ); ?>" alt="<?php echo get_the_title(); ?>">
                    </picture>
                    <div class="card-body text-center">
                      <h4 class="card-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4><!-- /caption -->
                      <p class="card-text"><?php echo get_excerpt(500); ?></p>
                      <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">বিস্তারিত&raquo;</a>
                    </div><!-- /card-img-overlay -->
                  </div><!-- /card -->
                </div><!-- /column -->
                <?php }
                }
            }
            $post = $orig_post;
            wp_reset_query();
            // Related Posts By Category Ends
        ?>
      
    </div><!--/row-->
  </div><!--/container-->
</div><!--/ bg-f9f9f9 -->
<?php get_footer(); ?>