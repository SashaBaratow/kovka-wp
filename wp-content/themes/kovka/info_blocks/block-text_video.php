<?php 
  
  $block_title = trim($post_info_block_fields["infoblock_title"]);
  $block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);
  
  $block_with_heading = (($block_title!="" || $block_subtitle!="") ? true : false);
  
  $block_padding_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
  $block_padding_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
  $block_margin_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
  $block_margin_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];
  
  /*
  echo '<pre>';
  print_r($post_info_block_fields);
  echo '</pre>';
  
  */
  
  
  $block_video = youtube_shortcode(array(), $post_info_block_fields['infoblock_youtube_url']);
  echo $block_video;
?>
