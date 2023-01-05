<?php
//my variables
$cases = $post_info_block_fields['infoblock_cases_list'];
$cases_block_title = $post_info_block_fields['infoblock_title'];
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_padding_top_case = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_case = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_case = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_case = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top = $block_padding_top_case / 16;
$padding_bottom = $block_padding_bottom_case / 16;
$margin_top = $block_margin_top_case / 16;
$margin_bottom = $block_margin_bottom_case / 16;


if (!empty($cases)){  ?>
<style>
    #<?= $block_id; ?> {
        padding-top:<?= $padding_top?>rem;
        padding-bottom:<?= $padding_bottom?>rem;
        margin-top: <?= $margin_top?>rem;
        margin-bottom:<?= $margin_bottom;?>rem;
    }
    #<?= $block_id; ?> .case_item picture, #<?= $block_id; ?> .case_item img{
        height: 100%;
        object-fit: cover;
        min-height: 520px;
    }
</style>

<section class="cases" id="<?= $block_id ?>">
    <div class="container">
        <span class="subtitle"><?= $block_subtitle ?></span>
        <h3 class="main-title text-center w-100 mb-3"> <?= $cases_block_title ?> </h3>
        <hr class="">
    </div>

    <div class="container-fluid filterbox">
        <div class="filter-tabs">
            <div class="filter-sort">
                <div class="navigation">
                    <a href="javascript:void(0)" data-filter="all" class="button active">Все</a>
                    <?php

                    $taxonomy = 'text';
                    $terms = get_terms($taxonomy);
                    if ( $terms && !is_wp_error( $terms ) ) :
                        foreach ( $terms as $term ) { ?>
                            <a href="javascript:void(0)" data-filter="<?php echo $term->name; ?>" class="button"><?= $term->name ?></a>
                        <?php } ?>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="main-wrap wrap-inner">
            <div id="content">
                <div class="main-full" id="main">
                    <ol class="content case_item">
                        <?php
                        global $post;
                        foreach( $cases as $post_id ) {
                            $case_litle_desc = get_field('case_litle_desc', $post_id);
//                            $case_text_cns = get_field('case_text_cns', $post_id);
//                            $case_gallery_cns = get_field('case_gallery_cns', $post_id);
                            $post_preview = get_the_post_thumbnail_url($post_id,'full');
                            global $post;

                            $term_list = wp_get_post_terms( $post_id, 'text', array('fields' => 'names') );
                            ?>
                            <li class="team shot-thumbnail <?= $term_list[0] ?>">
                                <div class="multi-shot h-100">
                                    <div class="dribbble-img h-100">
                                        <a class="dribbble-link h-100" >
                                            <picture>
                                                <img alt="images-1" src="<?= $post_preview ?>">
                                            </picture>
                                        </a>
                                        <a class="dribbble-over" href="<?= the_permalink($post_id);?>" data-lightbox="mygallery"
                                           data-title="Dribbble">
                                            <span class="text-block icons">
                                                <strong><?= the_title(); ?></strong>
                                                <?= $case_litle_desc ?>
                                            </span>
                                        </a>

                                    </div>
                                </div>
                            </li>
                        <?php   }
                        wp_reset_postdata(); // сброс
                        ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<?php } ?>
