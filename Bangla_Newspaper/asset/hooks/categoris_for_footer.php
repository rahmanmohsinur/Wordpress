<div class="col-6 col-xs-4 col-md-3 col-xl-2">
   <ul class="nav flex-column">
   <?php
   $count = 0;
   $category_ids = get_all_category_ids();
   sort($category_ids);
   foreach($category_ids as $cat_id) { ?>
     <li class="nav-item pb-4">
       <a class="nav-link list-group-item list-group-item-action list-group-item-light list-group-item-dark text-center" href="<?php echo get_category_link( $cat_id ); ?>">
         <?php echo get_cat_name($cat_id); ?>
       </a>
     </li>
   <?php $count += 1; 
   if( $count  == 18): 
     break;
   endif; 
   if( $count % 3 == 0): 
     echo '</ul></div><div class="col-6 col-xs-4 col-md-3 col-xl-2"><ul class="nav flex-column">';
   endif;
      wp_reset_query();
   }
   ?>
   </ul>
</div>
