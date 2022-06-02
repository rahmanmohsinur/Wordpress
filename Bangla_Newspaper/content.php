<article class="<?php if (has_post_thumbnail()){ ?>has-thumbneil<?php }?>" itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
  <div class="media border-0">
    <meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
    <meta itemprop="datePublished" content="<?php the_time('Y/m/d'); ?>"/>
    <meta itemprop="dateModified" content="<?php the_modified_date('Y/m/d'); ?>"/>
    
    <div class="media-body">
      <h2 class="blog-post-title" itemprop="name headline"><a href="<?php the_permalink(); ?>"><?php the_title();/*echo wp_trim_words( get_the_title(), 6 );*/ ?></a></h2>
      <div class="blog-content">
      <?php if ($post->post_excerpt) { ?>
        <p class="" itemprop="description"><?php echo excerpt(25); ?></p>
        <p><i class="far fa-clock"></i><?php echo uniapps_article_published_time(); ?><a href="<?php the_permalink(); ?>">বিস্তারিত&raquo;</a></p>
      <?php } else { ?>
        <div class="blog-excerpt mb-3" itemprop="description"><?php echo excerpt(25); ?></div>
        <div class="d-flex justify-content-between blog-post-meta">
          <div class="flex-link"><i class="far fa-clock"></i><?php echo uniapps_article_update_date(); ?></div>
          <div class="flex-link"><i class="fab fa-react"></i><?php echo bangla_number((int) get_post_meta(get_the_ID(), 'post_views_count', true)) . ''; ?></div>
          <a class="flex-link" href="<?php the_permalink(); ?>">বিস্তারিত&raquo;</a>
        </div>
      <?php } ?>
      </div><!--/blog-content-->
    </div><!--/media-body-->
    
    <div class="post-thumbneil align-self-center ml-3" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
      <?php if ( is_search() OR is_archive() ){ ?>
         <a href="<?php the_permalink();?>">
           <img class="rounded-circle" src="<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium-thumbnail' ) ); ?>" alt="<?php echo get_the_title(); ?>">
         </a>
         <meta itemprop="url" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'small-thumbnail') ); ?>">
         <meta itemprop="width" content="150">
         <meta itemprop="height" content="150">
      <?php } else { ?>
         <a href="<?php the_permalink();?>">
           <img class="rounded-circle" src="<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium-thumbnail' ) ); ?>" alt="<?php echo get_the_title(); ?>">
         </a>
         <meta itemprop="url" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'medium-thumbnail') ); ?>">
         <meta itemprop="width" content="250">
         <meta itemprop="height" content="140">
      <?php } ?>
    </div><!-- /post-thumbneil -->
    
    <div itemprop="author" itemscope itemtype="https://schema.org/Person">
      <meta itemprop="url" content="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
      <meta itemprop="name" content="<?php the_author(); ?>">
      <meta itemprop="jobTitle" content="News Editor">
      <meta itemprop="worksFor" content="Uniapps">
    </div>
    
    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
      <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
          <meta itemprop="url" content="http://mohammadmohsin.altervista.org/site/images/social/logo.png">
          <meta itemprop="width" content="224">
          <meta itemprop="height" content="224">
      </div>
      <meta itemprop="name" content="Uniapps">
    </div>
    
  </div>
</article>
<hr class="my-5" />
