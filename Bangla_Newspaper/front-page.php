<?php include 'asset/front-page/header.php'; ?>
<!-- From Here Starts Front Page Data --/>
<div class="container">
<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <div class="row"><?php the_content(); ?></div>
    <?php endwhile;
else:
    echo '<p>শীঘ্রইি আসছে নতুন</p>';
endif; ?>
</div><!/-- /container --/>
<!/-- To Here Ends Front Page Data -->
<div class="front-page-first-row">
    <div class="container">
        <div class="row group-section">
            <div class="col-sm-12 col-md-8 blog-front-page carousel mb-5">
                <div class="carousel-thumbnail thumb-nail">
                    <div class="bootstrap-thumbnail">
                        <?php get_template_part('asset/front-page/carousel'); ?>
                    </div>
                </div><!-- /carousel-thumbnail -->
            </div><!-- /carousel -->
      
            <div class="col-sm-12 col-md-4 blog-front-page tabs mb-5">
                <?php 
				    //get_template_part('asset/front-page/tabs'); 
				    get_template_part('asset/front-page/recent-posts-1st');
				?>
            </div><!-- /tabs -->
        </div><!-- /row recent posts -->
    </div><!-- /container -->
</div><!-- /front-page-first-row -->

<div class="front-page-firstrow">
    <div class="container">
        <div class="row group-section">
            <?php get_template_part('asset/front-page/recent-posts-1st-col'); ?>
            <div class="col-sm-12 col-md-4 blog-front-page caro-usel mb-5">
                <?php get_template_part('asset/front-page/tabs'); ?>
            </div><!-- /tabs -->
        </div><!-- /row recent posts -->
    </div><!-- /container -->
</div><!-- /front-page-first-row -->

<div class="bpu mb-5">
    <h3 class="bpv bpw">রাজনৈতিক সংবাদ</h3>
</div>

<?php get_template_part('asset/front-page/recent-posts-2nd-col'); ?>

<div class="bpu mb-5">
    <h3 class="bpv bpw">ঐতিহাসিক সংবাদ নিবন্ধ</h3>
</div>

<?php get_template_part('asset/front-page/historical-posts'); ?>

<div class="bpu mb-5">
    <h3 class="bpv bpw">স্বাস্থ্য এবং সুস্থতা</h3>
</div>

<?php get_template_part('asset/front-page/health-posts'); ?>
  
<?php get_footer(); ?>

