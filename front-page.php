<?php get_header(); ?>

<section class="menu-sp">
  <div class="inner">
    
    <ul class="menu-list-sp">
      <a href=""><li>ABOUT</li></a>
      <a href=""><li>WORK</li></a>
      <a href=""><li>NEWS</li></a>
      <a href=""><li>BIOGRAPHY</li></a>
      <a href=""><li>ONLINE</li></a>
      <a href=""><li>CONTACT</li></a>
    </ul>

    <div class="sns-sp">
      <a href=""><li><i class="fa-brands fa-instagram"></i></li></a>
      <a href=""><li><i class="fa-brands fa-facebook"></i></li></a>
      <a href=""><li><i class="fa-brands fa-twitter"></i></li></a>
    </div>

    <small class="copy">
    ©allrights reseved couch potato inc.
    </small>
  </div>
</section>

<section class="hero">

  <div class="hero-wrapper">

    <div class="mv">
      <p class="name">NAGI YOSHIDA</p>
      <video autoplay muted src="//nagi-yoshida.com/wp-content/themes/theme_ysd/movie/index_1_pc.mp4"></video>
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo_pc.png" alt="ナギヨシダ">
    </div>
  </div>

</section>

<section class="about">
  <div class="inner">
    <p class="title">ABOUT</p>
    <div class="text">
      <p class="profile-name">
        ヨシダナギ
      </p>
      <div class="text-ja">
        1986年生まれ フォトグラファー 独学で写真を学び、<br>
        2009年より単身アフリカへ<br>
        以来アフリカをはじめとする世界中の少数民族を撮影、発表。<br>
        唯一無二の色彩と直感的な生き方が評価され<br>
        2017年日経ビジネス誌で「次代を創る100人」へ選出<br>
        また同年、講談社出版文化賞 写真賞を受賞
      </div>
      <div class="text-en">
        Born in 1986. A self-taught photographer who traveled to Africa on her own in 2009.<br>
        Since then, has been shooting and publishing photographs of<br>
        minority ethnic groups in Africa and elsewhere around the world.<br>
        Was selected among the“100 people creating the next generation”<br>
        by magazine Nikkei Business in 2017 to commend her unique style and<br>
        visceral way of living. Selected for the “Pen Creator Award 2017” by Pen magazine.<br>
        Won the photography award in the publication culture awards<br>
        by publishing house Kodansha. In recent years, has been involved<br>
        in a variety of photography and direction projects in Japan and abroad,<br>
        such as movie direction and shooting promotional for Air Tahiti Nui.
      </div>
    </div>

    <div class="profile-img">
      <img src="<?php echo get_template_directory_uri(); ?>/img/about_img.jpeg" alt="プロフィール写真">
      <img src="<?php echo get_template_directory_uri(); ?>/img/about_img2.jpeg" alt="プロフィール写真2">
    </div>

  </div>
</section>


<section class="work">
  <div class="inner">
    <p class="title">WORK</p>

    <!-- main -->

    <div class="swiper main-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">

        <?php
        $args = array(
          'post_type' => 'portfolio',
          'posts_per_page' => -1
        );
        $portfolio_query = new WP_Query($args);
        ?>

        <?php if ($portfolio_query->have_posts()) : while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
            <div class="swiper-slide">
              <?php the_post_thumbnail(); ?>
              <!-- タイトル -->
              <p class="work-title"><?php the_title(); ?></p>
            </div>
        <?php endwhile;
        endif; ?>
      </div>
    </div>

    <div class="sub-img">
      <ul class="portfolio">

        <?php
        $args = array(
          'post_type' => 'portfolio',
          'posts_per_page' => -1
        );
        $portfolio_query = new WP_Query($args);
        ?>

        <?php if ($portfolio_query->have_posts()) : while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
            <li>
              <p><?php the_title(); ?></p>
              <?php the_post_thumbnail(); ?>

            </li>
        <?php endwhile;
        endif; ?>
      </ul>
    </div>
  </div>
  <a id="more" class="more">MORE</a>
</section>

<section class="news">
  <div class="inner">
    <div class="title">NEWS</div>

    <div class="news-contents">

      <div class="slide-wrap">

        <div class="swiper newsSwiper">
          <div class="swiper-wrapper">

            <?php
            $args = array(
              'post_type' => 'newsPosts',
              'posts_per_page' => -1
            );
            $newsPosts_query = new WP_Query($args);
            ?>

            <?php if ($newsPosts_query->have_posts()) : while ($newsPosts_query->have_posts()) : $newsPosts_query->the_post(); ?>

                <div class="swiper-slide">
                  <?php the_post_thumbnail(); ?><br>

                  <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="news-date">
                    <?php echo get_the_date('Y.m.d'); ?>
                  </time>

                  <!-- タイトル -->
                  <p class="news-title"><?php the_title(); ?></p>
                </div>
            <?php endwhile;
            endif; ?>
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</section>

<section class="biography">
  <div class="inner">
    <div class="center-inner">
      <div class="title">BIOGRAPHY</div>


      <div class="bio-tab-wrapper">
        <input id="MEDIA" type="radio" name="bio-tab" class="tab-switch" checked="checked"><label class="tab-label" for="MEDIA">MEDIA</label>
        <div class="tab-content">
          <!-- mediaList  -->
          <ul class="mediaList">

            <?php
            $args = array(
              'posts_per_page' => 6,
              'category_name' => 'media',
            );
            $media_posts = new WP_Query($args);

            if ($media_posts->have_posts()) : while ($media_posts->have_posts()) : $media_posts->the_post();

            ?>
                <li>
                  <p><?php the_title(); ?></p>
                </li>
            <?php endwhile;
            endif; ?>
          </ul>
          <?php wp_reset_postdata(); ?>
        </div>

        <input id="ADV" type="radio" name="bio-tab" class="tab-switch"><label class="tab-label" for="ADV">ADV.</label>
        <div class="tab-content">
          <!-- advList  -->
          <ul class="advList">

            <?php
            $args = array(
              'posts_per_page' => 6,
              'category_name' => 'adv',
            );
            $adv_posts = new WP_Query($args);

            if ($adv_posts->have_posts()) : while ($adv_posts->have_posts()) : $adv_posts->the_post();

            ?>
                <li>
                  <p><?php the_title(); ?></p>
                </li>
            <?php endwhile;
            endif; ?>
          </ul>
          <?php wp_reset_postdata(); ?>
        </div>

        <input id="BOOK" type="radio" name="bio-tab" class="tab-switch"><label class="tab-label" for="BOOK">BOOK</label>
        <div class="tab-content">
          <!-- bookList  -->
          <ul class="bookList">
            <?php
            $media_posts = get_posts(array(
              'post_type' => 'post',
              'category' => 5,
              'post_per_page' => -1,
            ));

            global $post;
            if ($media_posts) : foreach ($media_posts as $post) : setup_postdata($post);
            ?>
                <li>
                  <p><?php the_title(); ?></p>
                </li>
            <?php endforeach;
            endif; ?>
          </ul>
          <?php wp_reset_postdata(); ?>
        </div>

        <input id="OTHERS" type="radio" name="bio-tab" class="tab-switch"><label class="tab-label" for="OTHERS">OTHERS</label>
        <div class="tab-content">
          <!-- otherList  -->
          <ul class="otherList">
            <?php
            $media_posts = get_posts(array(
              'post_type' => 'post',
              'category' => 6,
              'post_per_page' => -1,
            ));

            global $post;
            if ($media_posts) : foreach ($media_posts as $post) : setup_postdata($post);
            ?>
                <li>
                  <p><?php the_title(); ?></p>
                </li>
            <?php endforeach;
            endif; ?>
          </ul>
          <?php wp_reset_postdata(); ?>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="contact">
  <div class="inner">
    <div class="title-and-form">

      <p class="title">CONTACT</p>

      <div class="form-and-attention">
        <?php echo do_shortcode('[contact-form-7 id="100" title="contact-form"]') ?>
  
        <div class="attention">
        お返事をさせていただくまでに、お時間を要する場合がございます。<br>
        また、内容により、お返事が出来ない場合がございますのでご了承ください。
        </div>
        
      </div>


    </div>

    
  </div>
</section>


<?php get_footer(); ?>





<!-- /* BIOGRAPHY */
// 中の文字にtrasitionをかけたい -->