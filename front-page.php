<?php get_header(); ?>

<!-- header   ///////////////////////////////////////////////////// -->
<?php get_template_part('template-parts/header'); ?>

<main class="l-main">
   <!-- fv   ///////////////////////////////////////////////////// -->
   <section class="p-fv">
      <div class="p-fv__inner">
         <div class="p-fv__heading">
            <h1 class="p-fv__catch">東京<span class="-small">で</span><span
                  class="-spacingSmall">ブラ<span>ン</span>ド</span>品<span class="-small">を</span><br>高く売る<span
                  class="-small">なら</span><br class="u-only__sp">東京ぶらんど</h1>
         </div>
         <!-- /.p-fv__heading -->
         <div class="p-fv__content">
            <div class="p-fv__lists">
               <ul class="p-fv__list">
                  <li class="p-fv__item">歴20年以上のベテラン鑑定士在籍！</li>
                  <li class="p-fv__item">査定だけのご相談も歓迎！</li>
                  <li class="p-fv__item">【渋谷に3店舗】駅近でアクセス良好！</li>
               </ul>
               <ul class="p-fv__authorityList">
                  <li class="p-fv__authorityItem">
                     <p class="p-fv__authorityLead">スピード査定</p>
                     <p class="p-fv__authorityText">最短<span class="-big">1</span>分</p>
                  </li>
                  <li class="p-fv__authorityItem">
                     <p class="p-fv__authorityLead">査定料・手数料</p>
                     <p class="p-fv__authorityText -mbs">すべて無料</p>
                  </li>
                  <li class="p-fv__authorityItem">
                     <p class="p-fv__authorityText">365<span class="-small">日</span><br><span
                           class="-middle">年中無休</span></p>
                     <p class="p-fv__authorityLead -small">（年末年始除く）</p>
                  </li>
               </ul>
            </div>
            <!-- /.p-fv__lists -->
         </div>
         <!-- /.p-fv__content -->
      </div>
      <!-- /.p-fv__inner-->
   </section>
   <!-- /.p-fv -->


   <!-- choice   ///////////////////////////////////////////////////// -->
   <div class="p-choice">
      <p class="p-choice__pop">選べる<span class="-color">2つ</span><span class="-small">の</span>買取方法</p>
      <ul class="p-choice__methods">
         <li class="p-choice__method">
            <a href="" class="p-choice__methodLink -store">
               <figure class="p-choice__methodImage">
                  <img src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/icon_building.svg')); ?>'
                     alt='' width='' height='' loading='lazy'>
               </figure>
               <p class="p-choice__methodText">店頭買取</p>
            </a>
         </li>
         <li class="p-choice__method">
            <a href="" class="p-choice__methodLink -delivery">
               <figure class="p-choice__methodImage">
                  <img src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/icon_car.svg')); ?>' alt=''
                     width='' height='' loading='lazy'>
               </figure>
               <p class="p-choice__methodText">宅配買取</p>
            </a>
         </li>
      </ul>
   </div>
   <!-- /.p-choice -->


   <!-- banner   ///////////////////////////////////////////////////// -->
   <?php
   // ACFから画像IDを取得
   $banner_sp_id = get_field('banner_sp');
   $banner_pc_id = get_field('banner_pc');

   // 片方しか登録がない場合は、登録済みの画像をもう一方にも使う
   if (!$banner_sp_id && $banner_pc_id) {
      $banner_sp_id = $banner_pc_id;
   }
   if (!$banner_pc_id && $banner_sp_id) {
      $banner_pc_id = $banner_sp_id;
   }

   // どちらかに登録がある場合のみ表示
   if ($banner_sp_id && $banner_pc_id):
      $banner_pc = wp_get_attachment_image_src($banner_pc_id, 'full');
      $banner_sp = wp_get_attachment_image_src($banner_sp_id, 'full');
      $banner_alt = get_post_meta($banner_sp_id, '_wp_attachment_image_alt', true);
      ?>
      <div class="p-banner">
         <figure class="p-banner__image">
            <picture>
               <!-- PC用 -->
               <source media="(min-width: 768px)" srcset="<?php echo esc_url($banner_pc[0]); ?>"
                  width="<?php echo esc_attr($banner_pc[1]); ?>" height="<?php echo esc_attr($banner_pc[2]); ?>">
               <!-- スマホ用 -->
               <img src="<?php echo esc_url($banner_sp[0]); ?>" alt="<?php echo esc_attr($banner_alt); ?>"
                  width="<?php echo esc_attr($banner_sp[1]); ?>" height="<?php echo esc_attr($banner_sp[2]); ?>"
                  loading="lazy">
            </picture>
         </figure>
      </div>
      <!-- /.p-banner -->
   <?php endif; ?>


   <!-- cta   ///////////////////////////////////////////////////// -->
   <?php get_template_part('template-parts/cta'); ?>


   <!-- about   ///////////////////////////////////////////////////// -->
   <section class="p-about">
      <div class="p-about__inner l-inner">
         <div class="p-about__heading">
            <div class="c-heading">
               <h2 class="c-heading__title"><span>東京のブランド買取なら</span>東京ぶらんど</h2>
               <p class="c-heading__en">Tokyo Brand</p>
            </div>
            <!-- /.c-heading -->
         </div>
         <!-- /.p-about__heading -->
         <div class="p-about__content">
            <div class="p-shops js_shops">
               <div class="p-shops__inner">
                  <div class="p-shops__tabs" role="tablist">
                     <button class="p-shops__tab js_shopsTab is_show" role="tab" id="shop-tab1"
                        aria-controls="shop-panel1" aria-selected="true" tabindex="0">東京ぶらんど<br>渋谷本店</button>
                     <button class="p-shops__tab js_shopsTab" role="tab" id="shop-tab2" aria-controls="shop-panel2"
                        aria-selected="false" tabindex="-1">ORANGE <br class="u-only__sp">BOUTIQUE<br>渋谷店</button>
                     <button class="p-shops__tab js_shopsTab" role="tab" id="shop-tab3" aria-controls="shop-panel3"
                        aria-selected="false" tabindex="-1">東京ぶらんど<br>渋谷109店</button>
                  </div>
                  <!-- /.p-shops__tabs -->
                  <div class="p-shops__panels">
                     <section class="p-shops__panel js_shopsPanel is_show" role="tabpanel" id="shop-panel1"
                        aria-labelledby="shop-tab1" tabindex="0">
                        <div class="p-shops__content">
                           <div class="p-shops__textArea">
                              <h3 class="p-shops__name">東京ぶらんど <br>Produce by ALAMODE <br class="u-only__sp">渋谷本店</h3>
                              <ul class="p-shops__accessList">
                                 <li class="p-shops__accessItem">東急東横線 渋谷駅A2出口より徒歩2分</li>
                                 <li class="p-shops__accessItem">JR山手線 渋谷駅 ハチ公口より徒歩3分</li>
                              </ul>
                              <button type="button" class="p-shops__mapButton js_shopsMapOpen"
                                 aria-controls="shop-map-modal1"><span
                                    class="p-shops__mapButtonText">Googleマップはこちら</span></button>
                           </div>
                           <!-- /.p-shops__textArea -->
                           <div class="p-shops__imageArea">
                              <figure class="p-shops__image">
                                 <img
                                    src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-shops_main-001.webp')); ?>'
                                    alt='' width='' height='' loading='lazy'>
                              </figure>
                           </div>
                           <!-- /.p-shops__imageArea -->
                        </div>
                     </section>
                     <section class="p-shops__panel js_shopsPanel" role="tabpanel" id="shop-panel2"
                        aria-labelledby="shop-tab2" tabindex="0">
                        <div class="p-shops__content">
                           <div class="p-shops__textArea">
                              <h3 class="p-shops__name">ORANGE BOUTIQUE <br>渋谷店</h3>
                              <ul class="p-shops__accessList">
                                 <li class="p-shops__accessItem">東急東横線 渋谷駅A2出口より徒歩2分</li>
                                 <li class="p-shops__accessItem">JR山手線 渋谷駅 ハチ公口より徒歩3分</li>
                              </ul>
                              <button type="button" class="p-shops__mapButton js_shopsMapOpen"
                                 aria-controls="shop-map-modal2"><span
                                    class="p-shops__mapButtonText">Googleマップはこちら</span></button>
                           </div>
                           <!-- /.p-shops__textArea -->
                           <div class="p-shops__imageArea">
                              <figure class="p-shops__image">
                                 <img
                                    src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-shops_main-002.webp')); ?>'
                                    alt='' width='' height='' loading='lazy'>
                              </figure>
                           </div>
                           <!-- /.p-shops__imageArea -->
                        </div>
                     </section>
                     <section class="p-shops__panel js_shopsPanel" role="tabpanel" id="shop-panel3"
                        aria-labelledby="shop-tab3" tabindex="0">
                        <div class="p-shops__content">
                           <div class="p-shops__textArea">
                              <h3 class="p-shops__name">東京ぶらんど <br>Produce by ALAMODE <br class="u-only__sp">渋谷109店</h3>
                              <ul class="p-shops__accessList">
                                 <li class="p-shops__accessItem">東急東横線 渋谷駅A2出口より徒歩2分</li>
                                 <li class="p-shops__accessItem">JR山手線 渋谷駅 ハチ公口より徒歩3分</li>
                              </ul>
                              <button type="button" class="p-shops__mapButton js_shopsMapOpen"
                                 aria-controls="shop-map-modal3"><span
                                    class="p-shops__mapButtonText">Googleマップはこちら</span></button>
                           </div>
                           <!-- /.p-shops__textArea -->
                           <div class="p-shops__imageArea">
                              <figure class="p-shops__image">
                                 <img
                                    src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-shops_main-003.webp')); ?>'
                                    alt='' width='' height='' loading='lazy'>
                              </figure>
                           </div>
                           <!-- /.p-shops__imageArea -->
                        </div>
                     </section>
                  </div>
                  <!-- /.p-shops__panels -->
               </div>
               <!-- /.p-shops__inner -->
            </div>
            <!-- /.p-shops -->
            <div class="p-about__feature">
               <section class="p-about-feature">
                  <div class="p-about-feature__heading">
                     <h3 class="p-about-feature__title">あなたの大切なお品を<br class="u-only__sp">1点ずつ丁寧に査定し<br
                           class="u-only__sp">買取します</h3>
                  </div>
                  <!-- /.p-about-feature__heading -->
                  <div class="p-about-feature__content">
                     <ul class="p-about-feature__list">
                        <li class="p-about-feature__item">
                           <div class="p-about-feature__textArea">
                              <h4 class="p-about-feature__catch">査定料・手数料<br class="u-only__pc">すべて無料</h4>
                           </div>
                           <!-- /.p-about-feature__textArea -->
                           <div class="p-about-feature__imageArea">
                              <figure class="p-about-feature__image">
                                 <picture>
                                    <source
                                       srcset="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-about-feature_001.webp')); ?>"
                                       media="(min-width: 768px)">
                                    <img
                                       src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/sp/p-about-feature_001.webp')); ?>'
                                       alt='' width='' height='' loading='lazy'>
                                 </picture>
                              </figure>
                              <!-- /.p-about-feature__image -->
                           </div>
                           <!-- /.p-about-feature__imageArea -->
                        </li>
                        <li class="p-about-feature__item">
                           <div class="p-about-feature__textArea">
                              <h4 class="p-about-feature__catch">LINEで簡単事前査定</h4>
                           </div>
                           <!-- /.p-about-feature__textArea -->
                           <div class="p-about-feature__imageArea">
                              <figure class="p-about-feature__image">
                                 <picture>
                                    <source
                                       srcset="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-about-feature_002.webp')); ?>"
                                       media="(min-width: 768px)">
                                    <img
                                       src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/sp/p-about-feature_002.webp')); ?>'
                                       alt='' width='' height='' loading='lazy'>
                                 </picture>
                              </figure>
                              <!-- /.p-about-feature__image -->
                           </div>
                           <!-- /.p-about-feature__imageArea -->
                        </li>
                        <li class="p-about-feature__item">
                           <div class="p-about-feature__textArea">
                              <h4 class="p-about-feature__catch">選べる買取方法<br>店頭買取/宅配買取</h4>
                           </div>
                           <!-- /.p-about-feature__textArea -->
                           <div class="p-about-feature__imageArea">
                              <figure class="p-about-feature__image">
                                 <picture>
                                    <source
                                       srcset="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-about-feature_003.webp')); ?>"
                                       media="(min-width: 768px)">
                                    <img
                                       src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/sp/p-about-feature_003.webp')); ?>'
                                       alt='' width='' height='' loading='lazy'>
                                 </picture>
                              </figure>
                              <!-- /.p-about-feature__image -->
                           </div>
                           <!-- /.p-about-feature__imageArea -->
                        </li>
                     </ul>
                     <div class="p-about-feature__messageWrapper u-only__sp">
                        <figure class="p-about-feature__deco">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-about-feature_person.webp')); ?>'
                              alt='' width='' height='' loading='lazy'>
                        </figure>
                        <p class="p-about-feature__message"><span>歴20年以上の経験を持つ鑑定士</span></p>
                        <p class="p-about-feature__message">が、1点1点の査定理由を丁寧にご</p>
                        <p class="p-about-feature__message">説明します。</p>
                        <p class="p-about-feature__message">渋谷駅から徒歩3分、<span>店頭査定も</span></p>
                        <p class="p-about-feature__message"><span>無料</span>です。</p>
                        <p class="p-about-feature__message">無理な営業や即決を迫ることは一</p>
                        <p class="p-about-feature__message">切ありません。</p>
                        <p class="p-about-feature__message">お客様ご自身がじっくり考え、ご</p>
                        <p class="p-about-feature__message">判断いただくことを</p>
                        <p class="p-about-feature__message">何よりも大切にしていますので、</p>
                        <p class="p-about-feature__message">査定だけでも大歓迎です。</p>
                     </div>
                     <!-- /.p-about-feature__messageWrapper -->
                     <div class="p-about-feature__messageWrapper u-only__pc">
                        <figure class="p-about-feature__deco">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-about-feature_person.webp')); ?>'
                              alt='' width='' height='' loading='lazy'>
                        </figure>
                        <p class="p-about-feature__message"><span>歴20年以上の経験を持つ鑑定士</span>が、1点1点の査定理由を丁寧にご説明します。</p>
                        <p class="p-about-feature__message">渋谷駅から徒歩3分、<span>店頭査定も無料</span>です。</p>
                        <p class="p-about-feature__message">無理な営業や即決を迫ることは一切ありません。</p>
                        <p class="p-about-feature__message">お客様ご自身がじっくり考え、ご判断いただくことを</p>
                        <p class="p-about-feature__message">何よりも大切にしていますので、査定だけでも大歓迎です。</p>
                     </div>
                     <!-- /.p-about-feature__messageWrapper -->
                  </div>
                  <!-- /.p-about-feature__content -->
               </section>
               <!-- /.p-about-feature -->
            </div>
            <!-- /.p-about__feature -->
         </div>
         <!-- /.p-about__content -->
      </div>
      <!-- /.p-about__inner-->
      <div class="p-shops__modals">
         <div class="p-shops__modal js_shopsMapModal" id="shop-map-modal1" role="dialog" aria-modal="true"
            aria-hidden="true">
            <button type="button" class="p-shops__modalOverlay js_shopsMapClose" aria-label="閉じる"></button>
            <div class="p-shops__modalInner">
               <button type="button" class="p-shops__modalClose js_shopsMapClose" aria-label="閉じる"></button>
               <div class="p-shops__modalMap">
                  <iframe
                     src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d207601.42939836302!2d139.5628184!3d35.6086821!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d5cbb320c3b%3A0x1dae6547623bae28!2z5p2x5Lqs44G244KJ44KT44GpIFByb2R1Y2UgYnkgQUxBTU9ERSDmuIvosLfmnKzlupc!5e0!3m2!1sja!2sjp!4v1781245689604!5m2!1sja!2sjp"
                     style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                     title="東京ぶらんど Produce by ALAMODE 渋谷本店のGoogleマップ"></iframe>
               </div>
            </div>
         </div>
         <div class="p-shops__modal js_shopsMapModal" id="shop-map-modal2" role="dialog" aria-modal="true"
            aria-hidden="true">
            <button type="button" class="p-shops__modalOverlay js_shopsMapClose" aria-label="閉じる"></button>
            <div class="p-shops__modalInner">
               <button type="button" class="p-shops__modalClose js_shopsMapClose" aria-label="閉じる"></button>
               <div class="p-shops__modalMap">
                  <iframe
                     src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.694448992338!2d139.6965467762908!3d35.659899031144604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188dc8dcbdbebd%3A0x698742beaeb31b76!2zT1JBTkdFIEJPVVRJUVVFIOa4i-iwtw!5e0!3m2!1sja!2sjp!4v1781245831373!5m2!1sja!2sjp"
                     style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                     title="ORANGE BOUTIQUE 渋谷店のGoogleマップ"></iframe>
               </div>
            </div>
         </div>
         <div class="p-shops__modal js_shopsMapModal" id="shop-map-modal3" role="dialog" aria-modal="true"
            aria-hidden="true">
            <button type="button" class="p-shops__modalOverlay js_shopsMapClose" aria-label="閉じる"></button>
            <div class="p-shops__modalInner">
               <button type="button" class="p-shops__modalClose js_shopsMapClose" aria-label="閉じる"></button>
               <div class="p-shops__modalMap">
                  <iframe
                     src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d207601.42939836302!2d139.5628184!3d35.6086821!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d199c367869%3A0x8de64d8b86faebdb!2z5p2x5Lqs44G244KJ44KT44GpIFByb2R1Y2UgYnkgQUxBTU9ERSDmuIvosLcxMDnlupc!5e0!3m2!1sja!2sjp!4v1781245792661!5m2!1sja!2sjp"
                     style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                     title="東京ぶらんど Produce by ALAMODE 渋谷109店のGoogleマップ"></iframe>
               </div>
            </div>
         </div>
      </div>
      <!-- /.p-shops__modals -->
   </section>
   <!-- /.p-about -->

</main>

<?php get_footer(); ?>