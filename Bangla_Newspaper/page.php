<?php
get_header(); ?>
<div class="row">
  <div class="col-sm-7 blog-main">
    <div class="blog-post">
 <?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
    <article>
      <h2 class="blog-post-title"><?php the_title(); ?></h2>
      <div class="blog-content">
        <?php the_content(); ?>
      </div><!--/blog-content-->
    </article>
    <?php endwhile;
  
  else:
    echo '<p>No contant found.</p>';
  endif; ?>
    </div><!--/blog-post--> 
  </div><!--/blog-main-->
  
  <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar_module-inset">
    </div><!--/sidebar-module-->
   </div><!--/blog-sidebar-->
</div><!--/row-->
<?php get_footer();
?>