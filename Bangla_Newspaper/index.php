<?php
get_header(); ?>
<div class="row">
  <div class="col-sm-7 blog-main">
    <div class="blog-post excerpt">
    
 <?php if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part('content', get_post_format());
    endwhile;
  else:
    echo '<p>No contant found.</p>';
  endif; ?>
    <?php get_template_part('pagination'); ?>
    </div><!--/blog-post--> 
  </div><!--/blog-main-->
  
  <?php get_sidebar(); ?>
  
</div><!--/row-->
<?php get_footer();
?>