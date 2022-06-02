<nav class="navbar navbar-expand-md bg-light navbar-light fixed-top mb-3">
    <div class="container">
        <a class="navbar-brand" href="/">মোহাম্মদ মহসীন</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
            <!-- Collect the nav links, forms, and other content for toggling -->  
            <div class="collapse navbar-collapse" id="collapsibleNavbar" itemscope itemtype="https://schema.org/SiteNavigationElement">
                <ul class="navbar-nav mr-auto">
                    <li class="<?php if( is_front_page() ) {?>nav-item active<?php } ?>"><a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">প্রচ্ছদ</a></li>
                    <li class="nav-item deeper dropdown parent <?php /* if( is_category() || is_single() ) {?>active<?php } */ ?>">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/">ক্যাটাগরি<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                        <?php
                        $category_ids = get_all_category_ids();
                        sort($category_ids);
                        foreach($category_ids as $cat_id) { ?>
                            <li class="arcive-link-item"><a class="dropdown-item" href="<?php echo get_category_link( $cat_id ); ?>"><span class='inline'><?php echo get_cat_name($cat_id); ?></span>
                                <span class='inline badge'><?php echo bangla_numbers(get_category($cat_id)->category_count); ?></span></a></li>
                            <?php wp_reset_query();
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item deeper dropdown parent <?php if( is_month() ) {?>active<?php } ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/">আর্কাইভ<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php
                        global $wpdb;
                        $limit = 0;
                        $count = 0;
                        $year_prev = null;
                        $months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,	YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC"); 
                        foreach($months as $month) :
                            $count += 1;
                            if ($count == 12) {
                                break;       
                            }
	                        $year_current = $month->year; ?>
                            <li class='arcive-link-item'>
		                        <a class='inline dropdown-item' href="<?php echo get_month_link($month->year, date("m", mktime(0, 0, 0, $month->month, 1, $month->year))); ?>">
                                    <span class="archive-month"><?php echo bangla_number(date_i18n("F  Y", mktime(0, 0, 0, $month->month, 1, $month->year))) ?></span>
                                    <span class='inline badge'><?php echo bangla_number($month->post_count); ?></span>
							    </a>
	                        </li>
	                    <?php 
	                        $year_prev = $year_current;
                        endforeach; 
                        ?>
                    </ul>
                </li>
                <li class="nav-item deeper dropdown parent  <?php if( is_page('videos') || is_category() || is_single() ) {?>active<?php } ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/">ভিডিও<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
				        <?php 
						$args = array('child_of' => 146);
				        $categories = get_categories( $args );
				        foreach($categories as $category) { 
   				            echo '<li class="arcive-link-item"><a class="inline dropdown-item" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></li> ';
				        }
					    ?>
					</ul>
			    </li>
				
            </ul>
            <?php 
            $args = array(
                'theme_location' => 'primary',
                'menu' => '',
                'items_wrap'=>'<ul class="nav navbar-nav">%3$s</ul>'
            );
            ?>
            <?php //wp_nav_menu( $args ); ?>
            <?php get_search_form(); ?>
        </div>
    </div>
</nav>