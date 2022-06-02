<?php
include 'asset/single-page/header.php'; ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-8 mb-5 mr-auto blog-main">
    <?php if (have_posts()) : ?>
      <h1 class="blog-post-title">
      <?php
      $title_archive;
      if ( is_category() ) {
        $title_archive = single_cat_title() . ' : মোহাম্মদ মহসীন এর অফিসিয়াল ব্লগ';
      } elseif ( is_author() ) {
        the_post();
        $title_archive = get_the_author() . ' : মোহাম্মদ মহসীন এর অফিসিয়াল ব্লগ';
        rewind_posts();
      } elseif ( is_tag() ) {
        $title_archive = single_tag_title() . ' : মোহাম্মদ মহসীন এর অফিসিয়াল ব্লগ';
      } elseif ( is_day() ) {
        $title_archive = 'দৈনিক আর্কাইভ: ' . get_the_date();
      } elseif ( is_month() ) {
        $title_archive = 'মাসিক আর্কাইভ: ' . bangla_number(get_the_date('F Y'));
      } elseif ( is_year() ) {
        $title_archive = 'বাৎসরিক আর্কাইভ: ' . get_the_date('Y');
      } else {
        $title_archive = 'আর্কাইভ';
      }
      echo $title_archive;
    ?></h1>
    <hr class="my-5" />
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

