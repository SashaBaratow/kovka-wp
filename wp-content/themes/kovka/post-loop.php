<?php
wp_die();
global $wp_query;
// Category
$cat = get_queried_object();
/*$cat_childs = get_categories( ['parent' => $cat->cat_ID, 'hide_empty' => false] );
  if(empty($cat_childs)) {
    $cat_childs = get_categories( ['parent' => $cat->parent, 'hide_empty' => false] );
  }*/
$class = 'col-lg-12';
$menu_item_childs = [];

$locations = get_nav_menu_locations();
$items = wp_get_nav_menu_items($locations['header']);
// _wp_menu_item_classes_by_context($items);

// foreach ($items as $item) {
//   if ($item->current) {
//     $menu_item_childs = get_childs_menu($item->ID, $items, $item->menu_item_parent);
//     break;
//   }
// }

// function get_childs_menu($item_id, $items, $parent_id){
//   $childs = [];
//   foreach ($items as $child) {
//     if($item_id == $child->menu_item_parent) {
//       $childs[] = $child;
//     }
//   }
//   if(empty($childs) && isset($parent_id)) {
//     return get_childs_menu($parent_id, $items);
//   }

//   return $childs;
// }

?>
<!-- Service Area Start Here -->
<section class="service-wrap-layout6">
  <div class="container">
        <?php if (have_posts()) : ?>
          <div class="row">
            <?php
            $i = 0;
            while (have_posts()) : the_post();
              if ($i > 2) {
                echo '</div><div class="row">';
                $i = 0;
              }
              get_template_part('post', 'short');
              $i++;
            endwhile;
            ?>
          </div>
          <div class="row">
            <div class="col-12">
              <?= theme_posts_nav(); ?>
            </div>
          </div>
        <?php else : ?>
          <div class="row">
            <div class="col-12">
              <p>Категория пуста.</p>
            </div>
          </div>
        <?php
        endif;
        wp_reset_query();
        ?>
      </div>


</section>
<!-- Service Area End Here -->