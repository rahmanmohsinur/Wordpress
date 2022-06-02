<?php
include 'asset/single-page/header.php'; ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-8 mb-5 mr-auto blog-main">
            <?php if (have_posts()) : ?>
                <h1><?php the_search_query(); ?> এর জন্য আপনার অনুসন্ধানকৃত তথ্যঃ</h1>
                <?php while (have_posts()) : the_post();
                    get_template_part('content', get_post_format());
                endwhile;
                get_template_part('pagination');
            else:
                echo '<p>No contant found.</p>';
            endif; ?>
    </div><!-- /blog-main -->
    <div class="col-md-4 mb-5 blog-sidebar">
      <?php include 'asset/single-page/sidebar.php'; ?>
    </div><!-- /blog-sidebar -->
  </div><!--/row-->
</div><!--/container-->
 
  
<?php get_footer(); ?>


  