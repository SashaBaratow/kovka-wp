<?php
get_header();

global $post;

if (have_posts()) :
    while (have_posts()) :
        the_post();
 echo the_content();

    endwhile;
endif;

