<?php

$block_iteration = 0;

if(empty($post_info_blocks)) $post_info_blocks = (array)get_field( "infoblocks_list", $post_id );
if(!empty($post_info_blocks)) {
    foreach($post_info_blocks as $post_info_block => $post_info_block_data) {
        $block_iteration++;

        $post_info_block_type = '';
        $post_info_block_fields = array();

        if($post_info_block_data['infoblock_add_type']=="select") {
            $post_info_block_obj_id = (int)$post_info_block_data['infoblock_item_object'];
            $post_info_block_fields = get_fields($post_info_block_obj_id);
            $post_info_block_type = $post_info_block_fields["infoblock_type"];
        } else {
            $post_info_block_fields = $post_info_block_data['infoblock_item'];
            $post_info_block_type = $post_info_block_fields["infoblock_type"];
        }

        //$block_id = $post_info_block_type.'-'.rand(1000, 9999);
        $block_id = $post_info_block_type.'-'.$block_iteration;

        $block_template = locate_template('info_blocks/block-'.$post_info_block_type.'.php');
        if(file_exists($block_template)) include(locate_template('info_blocks/block-'.$post_info_block_type.'.php'));

    }
}
?>