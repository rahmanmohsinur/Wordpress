<?php
/**
 * Template Name: Video Blog Page
 *
 * @package WordPress
 * @subpackage Uniapps
 * @since Uniapps 1.0
*/

include 'asset/single-page/header.php'; ?>
<div class="container mt-3">
  <div class="row">
    <div class="col-md-8 mb-5 mr-auto blog-main">
      <div class="bg-f9f9f9">
        <?php 
        if (have_posts()) : ?>
            <hr class="mt-2 mb-2" />
            <?php 
            while (have_posts()) : the_post();
                get_template_part('asset/content/video', get_post_format());
            endwhile; ?>
            <hr class="mt-2" />
            <?php
            get_template_part('pagination');
        else:
            echo '<p>No contant found.</p>';
        endif; ?>
      </div>
    </div><!-- /blog-main -->
    <div class="col-md-4 mb-5 blog-sidebar">
      <?php include 'asset/single-page/sidebar.php'; ?>
    </div><!-- /blog-sidebar -->
  </div><!--/row-->
</div><!--/container-->
 
<?php get_footer(); ?>


