<?php
get_header();
?>
<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        $post_id = get_the_ID();
        $page_header = get_field("page_header", $post_id);
        if ($page_header) get_template_part('page-header', '');
        //Построение инфо-блоков на странице...
		include(locate_template('info_blocks/init.php'));
    endwhile;
endif;
?>
<?php
get_footer();

?>