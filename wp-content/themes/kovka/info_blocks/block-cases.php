<?php
//my variables
$cases = $post_info_block_fields['infoblock_cases_list'];
$block_title_underline = trim($post_info_block_fields["infoblock_title_underline"]);
$cases_block_title = $post_info_block_fields['infoblock_title'];

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
        .case_video{
            position: relative;
        }
        .case_video picture{
            position: relative;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .case_video::before{
            content : '';
            width: 50px;
            height: 30px;
            position: absolute;
            background-image: url('<?= get_template_directory_uri() ?>/img/youtube-v.png');
            top:50%;
            left:50%;
            transform: translate(-50%, -50%);
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
            opacity: 0.8;
            z-index: 10;
        }
        .case_video::before:hover{
            opacity: 1;
        }
        .case__gall ul.lSPager li a img{
            height: 95px !important;
        }
    </style>

    <section class="case" id="<?= $block_id; ?>" >
        <style>
            #<?= $block_id; ?> {
                padding-top:<?= $padding_top?>rem;
                padding-bottom:<?= $padding_bottom?>rem;
                margin-top: <?= $margin_top?>rem;
                margin-bottom:<?= $margin_bottom;?>rem;
            }
        </style>
        <div class="container">
            <div class="d-flex case__wrap-head">
                <h2 class="section-title" <?= $block_title_underline ? "style='text-decoration: underline;'" : '' ?>><?= $cases_block_title ?></h2>
                <div class="dots-container"></div>
            </div>
            <div class="case-wrap">
                <div class="case__list">
                    <?php
                    // $my_posts = get_posts( array(
                    //     'numberposts' => -1,
                    //     'include'     => $cases,
                    //     'order'       => 'ASC',
                    //     'post_type'   => 'cases',
                    //     'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    // ) );
                    global $post;
                    

                    foreach( $cases as $post ){
                        // setup_postdata( $post );

                        $case_type = get_field('case_type_cns', $post->ID);
                        $case_variant = get_field('case_variant_cns', $post->ID);
                        $case_uptitle = get_field('case_uptitle_cns', $post->ID);
                        $case_title = get_field('case_title_cns', $post->ID);
                        $image_case = get_field('image_case_cns', $post->ID);
                        $case_gallery = get_field('case_gallery_cns', $post->ID);

                        $case_video_link = get_field('case_video_link', $post->ID);
                        $case_video_prevue = get_field('case_video_prevue', $post->ID);

                        $case_video_list = get_field('case_video_list', $post->ID);

                        $case_illustration = get_field('case_illustration_cns', $post->ID);
                        $case_text = get_field('case_text_cns', $post->ID);
                        $case_btns = get_field('case_btns_btns', $post->ID);
                        $case_btns_under = get_field('case_btns_under_text', $post->ID);
                      if ($case_type == 'text'){
                          if ($case_variant == 'photo'){ ?>
                              <div>
                                  <div class="case__item d-flex">
                                      <div class="case__img-block">
                                          <img src="<?= $image_case ?>" alt="Наш кейс: <?= $case_title ?>" title="<?= $case_uptitle ?>: <?= $case_title ?>">
                                      </div>
                                      <div class="case__content">
                                        <span class="case__item-subtitle"> <?= $case_uptitle ?> </span>
                                          <div class="case__item-head d-flex">
                                              <h3 class="case__item-title"> <?= $case_title ?></h3>
                                              <?php if (!empty($case_btns )):?>
                                                  <?php foreach($case_btns as $header_btns_cns_items => $header_btns_cns_item) { ?>
                                                      <a href="<?=$header_btns_cns_item['case_btn_link_cns']?>" class="<?php
                                                      switch ($header_btns_cns_item['case_btn_type_cns']) {
                                                          case 'link':
                                                              echo "link";
                                                              break;
                                                          case 'colored':
                                                              echo " btn";
                                                              break;
                                                          case 'bordered':
                                                              echo " btn outline-btn";
                                                              break;
                                                      }
                                                      switch ($header_btns_cns_item['case_btn_color_cns']) {
                                                          case 'red':
                                                              echo " red-btn";
                                                              break;
                                                          case 'blue':
                                                              echo " hell-blue-btn";
                                                              break;
                                                          case 'dark_blue':
                                                              echo " blue-btn";
                                                              break;
                                                      }
                                                      ?> ">
                                                          <?=$header_btns_cns_item['case_btn_name_cns'];?>
                                                      </a>
                                                  <?php } ?>
                                              <?php endif;?>
                                          </div>
                                          <div class="case__text">
                                              <?= $case_text ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          <?php }
                          if ($case_variant == 'gallery'){ ?>
                              <div>
                                  <div class="case__item d-flex">
                                      <div class="case__img-gall">
                                          <div class="case__gall">
                                                <ul>
                                                <?php if(!empty($case_video_list)): ?>
                                                    <?php foreach ($case_video_list as $key => $value) { ?>
                                                        <li data-thumb="<?= $value["cns_list_video_img"] ?>">
                                                          <a class="case_video" href="<?= $value["cns_list_video_link"] ?>" data-fancybox="gallery">
                                                            <img src="<?= $value["cns_list_video_img"] ?>" alt="Наш кейс: <?= $case_title ?>" title="<?= $case_uptitle ?>: <?= $case_title ?>"/>
                                                          </a>
                                                        </li>
                                                    <?php } ?>
                                                    <?php endif; ?>
                                                  <?php foreach ($case_gallery as $gallery_item):?>
                                                      <li data-thumb="<?= $gallery_item ?>">
                                                          <a href="<?= $gallery_item ?>" data-fancybox="gallery">
                                                            <img src="<?= $gallery_item ?>" alt="Наш кейс: <?= $case_title ?>" title="<?= $case_uptitle ?>: <?= $case_title ?>"/>
                                                          </a>
                                                      </li>
                                                    <?php endforeach;?>
                                              </ul>
                                          </div>
                                      </div>
                                      <div class="case__content">
                                <span class="case__item-subtitle">
                                   <?= $case_uptitle ?>
                                </span>
                                          <div class="case__item-head d-flex">
                                              <h3 class="case__item-title"><?= $case_title ?></h3>
                                              <?php if (!empty($case_btns )):?>
                                                  <?php foreach($case_btns as $header_btns_cns_items => $header_btns_cns_item) { ?>
                                                      <a href="<?=$header_btns_cns_item['case_btn_link_cns']?>" class="<?php
                                                      switch ($header_btns_cns_item['case_btn_type_cns']) {
                                                          case 'link':
                                                              echo "link";
                                                              break;
                                                          case 'colored':
                                                              echo " btn";
                                                              break;
                                                          case 'bordered':
                                                              echo " btn outline-btn";
                                                              break;
                                                      }
                                                      switch ($header_btns_cns_item['case_btn_color_cns']) {
                                                          case 'red':
                                                              echo " red-btn";
                                                              break;
                                                          case 'blue':
                                                              echo " hell-blue-btn";
                                                              break;
                                                          case 'dark_blue':
                                                              echo " blue-btn";
                                                              break;
                                                      }
                                                      ?> ">
                                                          <?=$header_btns_cns_item['case_btn_name_cns'];?>
                                                      </a>
                                                  <?php } ?>
                                              <?php endif;?>
                                          </div>
                                          <div class="case__text">
                                              <?= $case_text ?>
                                          </div>
                                          <div style="margin-top:30px;">
                                          <?php if (!empty($case_btns )):?>
                                                  <?php foreach($case_btns_under as $header_btns_cns_items => $header_btns_cns_item) { ?>
                                                      <a href="<?=$header_btns_cns_item['case_btn_link_cns']?>" class="<?php
                                                      switch ($header_btns_cns_item['case_btn_type_cns']) {
                                                          case 'link':
                                                              echo "link";
                                                              break;
                                                          case 'colored':
                                                              echo " btn";
                                                              break;
                                                          case 'bordered':
                                                              echo " btn outline-btn";
                                                              break;
                                                      }
                                                      switch ($header_btns_cns_item['case_btn_color_cns']) {
                                                          case 'red':
                                                              echo " red-btn";
                                                              break;
                                                          case 'blue':
                                                              echo " hell-blue-btn";
                                                              break;
                                                          case 'dark_blue':
                                                              echo " blue-btn";
                                                              break;
                                                      }
                                                      ?> ">
                                                          <?=$header_btns_cns_item['case_btn_name_cns'];?>
                                                      </a>
                                                  <?php } ?>
                                              <?php endif;?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                         <?php }
                          if ($case_variant == 'icon'){ ?>
                              <div>
                                  <div class="case__item d-flex">
                                      <div class="case__img-block">
                                          <img src="<?= $case_illustration ?>" alt="Наш кейс: <?= $case_title ?>" title="<?= $case_uptitle ?>: <?= $case_title ?>">
                                      </div>
                                      <div class="case__content">
                                          <span class="case__item-subtitle"> <?= $case_uptitle ?> </span>
                                          <div class="case__item-head d-flex">
                                              <h3 class="case__item-title"> <?= $case_title ?></h3>
                                              <?php if (!empty($case_btns )):?>
                                                  <?php foreach($case_btns as $header_btns_cns_items => $header_btns_cns_item) { ?>
                                                      <a href="<?=$header_btns_cns_item['case_btn_link_cns']?>" class="<?php
                                                      switch ($header_btns_cns_item['case_btn_type_cns']) {
                                                          case 'link':
                                                              echo "link";
                                                              break;
                                                          case 'colored':
                                                              echo " btn";
                                                              break;
                                                          case 'bordered':
                                                              echo " btn outline-btn";
                                                              break;
                                                      }
                                                      switch ($header_btns_cns_item['case_btn_color_cns']) {
                                                          case 'red':
                                                              echo " red-btn";
                                                              break;
                                                          case 'blue':
                                                              echo " hell-blue-btn";
                                                              break;
                                                          case 'dark_blue':
                                                              echo " blue-btn";
                                                              break;
                                                      }
                                                      ?> ">
                                                          <?=$header_btns_cns_item['case_btn_name_cns'];?>
                                                      </a>
                                                  <?php } ?>
                                              <?php endif;?>
                                          </div>
                                          <div class="case__text">
                                              <?= $case_text ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                         <?php }
                      }
                      if ($case_type == 'column'){
                          $case_column_one = get_field('case_column_one', $post->ID);
                          $case_column_two = get_field('case_column_two', $post->ID);
                          $case_column_three = get_field('case_column_three', $post->ID);
                          $case_text_1 = get_field('case-text-1', $post->ID);
                          $case_text_2 = get_field('case-text-2', $post->ID);
                          $case_text_3 = get_field('case-text-3', $post->ID);
                          if ($case_variant == 'photo'){ ?>
                              <div>
                                  <div class="case__item d-flex">
                                      <div class="case__img-illustration">
                                          <img src="<?= $image_case ?>" alt="Наш кейс: <?= $case_title ?>" title="<?= $case_uptitle ?>: <?= $case_title ?>">
                                      </div>
                                      <div class="case__content">
                                            <span class="case__item-subtitle">
                                                <?= $case_uptitle ?>
                                            </span>
                                          <div class="case__item-head d-flex">
                                              <h3 class="case__item-title"><?= $case_title ?></h3>
                                              <?php if (!empty($case_btns )):?>
                                                  <?php foreach($case_btns as $header_btns_cns_items => $header_btns_cns_item) { ?>
                                                      <a href="<?=$header_btns_cns_item['case_btn_link_cns']?>" class="<?php
                                                      switch ($header_btns_cns_item['case_btn_type_cns']) {
                                                          case 'link':
                                                              echo "link";
                                                              break;
                                                          case 'colored':
                                                              echo " btn";
                                                              break;
                                                          case 'bordered':
                                                              echo " btn outline-btn";
                                                              break;
                                                      }
                                                      switch ($header_btns_cns_item['case_btn_color_cns']) {
                                                          case 'red':
                                                              echo " red-btn";
                                                              break;
                                                          case 'blue':
                                                              echo " hell-blue-btn";
                                                              break;
                                                          case 'dark_blue':
                                                              echo " blue-btn";
                                                              break;
                                                      }
                                                      ?> ">
                                                          <?=$header_btns_cns_item['case_btn_name_cns'];?>
                                                      </a>
                                                  <?php } ?>
                                              <?php endif;?>
                                          </div>
                                          <div class="case__text case__text-row">
                                              <div class="case__text-item">
                                                  <div>  <?= $case_column_one ?></div>
                                                  <?= $case_text_1 ?>
                                              </div>
                                              <div class="case__text-item">
                                                  <div><?= $case_column_two ?></div>
                                                  <?= $case_text_2 ?>
                                              </div>
                                              <div class="case__text-item">
                                                  <div><?= $case_column_three ?></div>
                                                  <?= $case_text_3 ?>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <?php
                          }
                          if ($case_variant == 'gallery'){ ?>
                              <div>
                                  <div class="case__item d-flex">
                                      <div class="case__img-illustration">
                                          <img src="<?= $case_illustration ?>" alt="Наш кейс: <?= $case_title ?>" title="<?= $case_uptitle ?>: <?= $case_title ?>">
                                      </div>
                                      <div class="case__content">
                                            <span class="case__item-subtitle">
                                                <?= $case_uptitle ?>
                                            </span>
                                          <div class="case__item-head d-flex">
                                              <h3 class="case__item-title"><?= $case_title ?></h3>
                                              <?php if (!empty($case_btns )):?>
                                                  <?php foreach($case_btns as $header_btns_cns_items => $header_btns_cns_item) { ?>
                                                      <a href="<?=$header_btns_cns_item['case_btn_link_cns']?>" class="<?php
                                                      switch ($header_btns_cns_item['case_btn_type_cns']) {
                                                          case 'link':
                                                              echo "link";
                                                              break;
                                                          case 'colored':
                                                              echo " btn";
                                                              break;
                                                          case 'bordered':
                                                              echo " btn outline-btn";
                                                              break;
                                                      }
                                                      switch ($header_btns_cns_item['case_btn_color_cns']) {
                                                          case 'red':
                                                              echo " red-btn";
                                                              break;
                                                          case 'blue':
                                                              echo " hell-blue-btn";
                                                              break;
                                                          case 'dark_blue':
                                                              echo " blue-btn";
                                                              break;
                                                      }
                                                      ?> ">
                                                          <?=$header_btns_cns_item['case_btn_name_cns'];?>
                                                      </a>
                                                  <?php } ?>
                                              <?php endif;?>
                                          </div>
                                          <div class="case__text case__text-row">
                                              <div class="case__text-item">
                                                  <div>  <?= $case_column_one ?></div>
                                                  <?= $case_text_1 ?>
                                              </div>
                                              <div class="case__text-item">
                                                  <div><?= $case_column_two ?></div>
                                                  <?= $case_text_2 ?>
                                              </div>
                                              <div class="case__text-item">
                                                  <div><?= $case_column_three ?></div>
                                                  <?= $case_text_3 ?>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          <?php }
                          if ($case_variant == 'icon'){ ?>
                              <div>
                                  <div class="case__item d-flex">
                                      <div class="case__img-illustration">
                                          <img src="<?= $case_illustration ?>" alt="Наш кейс: <?= $case_title ?>" title="<?= $case_uptitle ?>: <?= $case_title ?>">
                                      </div>
                                      <div class="case__content">
                                            <span class="case__item-subtitle">
                                                <?= $case_uptitle ?>
                                            </span>
                                          <div class="case__item-head d-flex">
                                              <h3 class="case__item-title"><?= $case_title ?></h3>
                                              <?php if (!empty($case_btns )):?>
                                                  <?php foreach($case_btns as $header_btns_cns_items => $header_btns_cns_item) { ?>
                                                      <a href="<?=$header_btns_cns_item['case_btn_link_cns']?>" class="<?php
                                                      switch ($header_btns_cns_item['case_btn_type_cns']) {
                                                          case 'link':
                                                              echo "link";
                                                              break;
                                                          case 'colored':
                                                              echo " btn";
                                                              break;
                                                          case 'bordered':
                                                              echo " btn outline-btn";
                                                              break;
                                                      }
                                                      switch ($header_btns_cns_item['case_btn_color_cns']) {
                                                          case 'red':
                                                              echo " red-btn";
                                                              break;
                                                          case 'blue':
                                                              echo " hell-blue-btn";
                                                              break;
                                                          case 'dark_blue':
                                                              echo " blue-btn";
                                                              break;
                                                      }
                                                      ?> ">
                                                          <?=$header_btns_cns_item['case_btn_name_cns'];?>
                                                      </a>
                                                  <?php } ?>
                                              <?php endif;?>
                                          </div>
                                          <div class="case__text case__text-row">
                                              <div class="case__text-item">
                                                  <div>  <?= $case_column_one ?></div>
                                                  <?= $case_text_1 ?>
                                              </div>
                                              <div class="case__text-item">
                                                  <div><?= $case_column_two ?></div>
                                                  <?= $case_text_2 ?>
                                              </div>
                                              <div class="case__text-item">
                                                  <div><?= $case_column_three ?></div>
                                                  <?= $case_text_3 ?>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <?php
                          }
                        }

                    }
                    wp_reset_postdata(); // сброс
                    ?>
                </div>
                <div class="slide-btn-wrap"></div>
            </div>
        </div>
         <div class='test-casess' style="display:none;"> <?php var_dump($my_posts);?></div>
    </section>
    <?php
    wp_reset_postdata(); // сброс
}
?>
