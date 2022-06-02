<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#topposts">শীর্ষ পঠিত</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#recentposts">সাম্প্রতিক</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#selectedposts">নির্বাচিত</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

    <div class="tab-pane active" id="topposts">
        <ul class="list-group">
            <?php
            query_posts('meta_key=post_views_count&posts_per_page=9&orderby=meta_value_num&order=DESC');
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li class="list-group-item"><a href="<?php the_permalink();?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></li>                    
	        <?php  endwhile; 
            endif;
            wp_reset_query();
            ?>
        </ul>
  
    </div>
  
    <div class="tab-pane container fade" id="recentposts">
  
    </div>
    <div class="tab-pane container fade" id="selectedposts">
	
	</div>
	
</div>


