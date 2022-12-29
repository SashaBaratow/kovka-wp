<?php
get_header();
?>
<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();

        $post_id = get_the_ID();

        $team_query_args = array(
            'numberposts'    =>  -1,
            'posts_per_page'  =>  -1,
            'post_type'  =>   'team',
        );

        $team_query = get_posts($team_query_args);

        $team_ready = array();

        foreach ($team_query as $team_info) {
            $team_info_id = $team_info->ID;
            $team_info_name = get_the_title($team_info_id);
            $team_info_photo = get_field('team_img', $team_info_id);
            $team_info_permalink = get_permalink($team_info_id);
            $team_info_descr = get_field('team_min_des', $team_info_id);

            $team_info_ready = array(
                'id' => $team_info_id,
                'name' => $team_info_name,
                'photo' => $team_info_photo,
                'link' => $team_info_permalink,
                'descr' => $team_info_descr,
            );
            $team_ready[] = $team_info_ready;
        }


        $banner = get_field("infoblocks_list", $post_id);

        $page_header_title = get_field("page_title2", $post_id);
        if (!$page_header_title) $page_header_title = get_the_title();
?>
        <section class="page-header">
            <div class="container">
                <h1><?= $page_header_title; ?></h1>
            </div>
            <div class="container">
                <?php get_template_part('breadcrumbs', ''); ?>
            </div>
        </section>
        <section class="teachers">
            <div class="container">
                <h2 class="text-center"><?= $block_title; ?></h2>
                <p><? $block_subtitle; ?></p>
                <div class="teachers__list row">
                    <?php foreach ($team_ready as $team_info => $team_info_data) { ?>
                        <div class="col-md-3">
                            <a href="<?= $team_info_data['link']; ?>" class="teachers__item">
                                <h3 class="teachers__name"><?= $team_info_data['name']; ?></h3>
                                <div class="teachers__img">
                                    <img src="<?= $team_info_data['photo']['sizes']['gallery_medium']; ?>" alt="<?= $team_info_data['name']; ?>">
                                </div>
                                <div class="teachers__des">
                                    <?= $team_info_data['descr']; ?>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <?php
        //Построение инфо-блоков на странице...
        include(locate_template('info_blocks/init.php'));
        ?>

<?php
    endwhile;
endif;
?>
<?php
get_footer();
?>