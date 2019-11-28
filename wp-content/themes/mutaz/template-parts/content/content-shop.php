  <?php 
   $args = array('taxonomy'=>'product_cat','orderby'=>'name');
   $all_categories = get_categories( $args );
   
   foreach ($all_categories as $cat) {
         if($cat->category_parent == 0) {
        $category_id = $cat->term_id;       
        echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
         }
 
} 
 ?>