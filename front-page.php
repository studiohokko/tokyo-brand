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


   <!-- items   ///////////////////////////////////////////////////// -->
   <section class="p-items">
      <div class="p-items__bg"></div>
      <!-- /.p-items__bg -->
      <div class="p-items__inner l-inner">
         <div class="p-items__heading">
            <div class="c-heading -white">
               <h2 class="c-heading__title">買取品目</h2>
               <p class="c-heading__en">Items</p>
            </div>
            <!-- /.c-heading -->
            <h3 class="p-items__subCatch">時計・ジュエリーからバッグ、アパレルまで、<br>幅広いブランド品の買取に対応しています。</h3>
         </div>
         <!-- /.p-items__heading -->
         <div class="p-items__content">
            <ul class="p-items__list">
               <?php
               $items = [
                  ['title' => 'バッグ', 'en' => 'Bag', 'image' => '001'],
                  ['title' => '財布・小物', 'en' => 'Wallet & Accessory', 'image' => '002'],
                  ['title' => 'アパレル', 'en' => 'Apparel', 'image' => '003'],
                  ['title' => '時計', 'en' => 'Watch', 'image' => '004'],
                  ['title' => 'ジュエリー', 'en' => 'Jewelry', 'image' => '005'],
                  ['title' => '地金', 'en' => 'Bullion', 'image' => '006'],
               ];
               foreach ($items as $item) {
                  ?>
                  <li class="p-items__item">
                     <?php get_template_part('template-parts/p-item', null, $item); ?>
                  </li>
                  <?php
               }
               ?>
            </ul>
            <section class="p-items__box">
               <div class="p-items__boxHeading">
                  <h3 class="p-items__boxTitle">「売れないかも」と<br class="u-only__sp">思っているお品物こそ<br class="u-only__sp">ご相談ください
                  </h3>
                  <p class="p-items__boxLead">お品物の状態が完璧でなくても価値がなくなるわけではありません。<br>以下のような状態でも専門の鑑定士がしっかりと価値を評価します。</p>
               </div>
               <!-- /.p-items__boxHeading -->
               <ul class="p-items__boxList">
                  <li class="p-items__boxItem">
                     <div class="p-items__boxTextArea">
                        <p class="p-items__boxText">キズ、シミ、<br>汚れがある</p>
                     </div>
                     <!-- /.__textArea -->
                     <div class="p-items__boxImageArea">
                        <figure class="p-items__boxImage">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-items_box-001.webp')); ?>'
                              alt='' width='' height='' loading='lazy'>
                        </figure>
                        <!-- /.p-items__boxImage -->
                     </div>
                     <!-- /.p-items__boxImageArea -->
                  </li>
                  <li class="p-items__boxItem">
                     <div class="p-items__boxTextArea">
                        <p class="p-items__boxText">古いモデルや<br>デザイン</p>
                     </div>
                     <!-- /.__textArea -->
                     <div class="p-items__boxImageArea">
                        <figure class="p-items__boxImage">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-items_box-002.webp')); ?>'
                              alt='' width='' height='' loading='lazy'>
                        </figure>
                        <!-- /.p-items__boxImage -->
                     </div>
                     <!-- /.p-items__boxImageArea -->
                  </li>
                  <li class="p-items__boxItem">
                     <div class="p-items__boxTextArea">
                        <p class="p-items__boxText -lh">箱や保証書<br><span>（ギャランティカード）</span>がない</p>
                     </div>
                     <!-- /.__textArea -->
                     <div class="p-items__boxImageArea">
                        <figure class="p-items__boxImage">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-items_box-003.webp')); ?>'
                              alt='' width='' height='' loading='lazy'>
                        </figure>
                        <!-- /.p-items__boxImage -->
                     </div>
                     <!-- /.p-items__boxImageArea -->
                  </li>
                  <li class="p-items__boxItem">
                     <div class="p-items__boxTextArea">
                        <p class="p-items__boxText">他社で買取を<br>断られた</p>
                     </div>
                     <!-- /.__textArea -->
                     <div class="p-items__boxImageArea">
                        <figure class="p-items__boxImage">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-items_box-004.webp')); ?>'
                              alt='' width='' height='' loading='lazy'>
                        </figure>
                        <!-- /.p-items__boxImage -->
                     </div>
                     <!-- /.p-items__boxImageArea -->
                  </li>
               </ul>
               <section class="p-items__boxFoot">
                  <div class="p-items__boxFootTextArea">
                     <h3 class="p-items__boxFootTitle">シャネル・エルメス・<br class="u-only__sp">ロレックス<br
                           class="u-only__pc">は特に<br class="u-only__sp">高価買取！</h3>
                     <p class="p-items__boxFootLead">
                        他店と違うのは「販売力」です。<br>多くの買取店がBtoB（業者間取引）での流通を前提とする中、当社はシャネル・エルメス・時計の専門店を自社で運営。<br>そのため余計な中間コストがかからず、買取価格へ還元できます。
                     </p>
                  </div>
                  <!-- /.p-items__boxFootTextArea -->
                  <div class="p-items__boxFootImageArea">
                     <figure class="p-items__boxFootImage">
                        <img
                           src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-items_boxFoot.webp')); ?>'
                           alt='' width='' height='' loading='lazy'>
                     </figure>
                     <!-- /.p-items__boxFootImage -->
                  </div>
                  <!-- /.p-items__boxFootImageArea -->
               </section>
               <!-- /.p-items__boxFoot -->
            </section>
         </div>
         <!-- /.p-items__content -->
      </div>
      <!-- /.p-items__inner-->
   </section>
   <!-- /.p-items -->


   <!-- cta   ///////////////////////////////////////////////////// -->
   <?php get_template_part('template-parts/cta'); ?>


   <!-- select   ///////////////////////////////////////////////////// -->
   <section class="p-select">
      <div class="p-select__inner l-inner">
         <div class="p-select__heading">
            <div class="c-heading">
               <h2 class="c-heading__title"><span>東京ぶらんどが</span>選ばれる理由</h2>
               <p class="c-heading__en">Reasons</p>
            </div>
            <!-- /.c-heading -->
            <p class="p-select__lead">数ある買取サービスの中から、当社がお客様に選ばれ続けている理由をご紹介します。</p>
         </div>
         <!-- /.p-select__heading -->
         <div class="p-select__content">
            <ul class="p-select__list">
               <?php
               $reasons = [
                  [
                     'number' => 'Reasons 01',
                     'title' => '経験20年以上の<br class="u-only__sp">ブランド専門鑑定士',
                     'text' => '豊富な知識を持った査定士が、ブランド品や貴金属を一点一点丁寧に査定します。<br>プライバシーに配慮した個室で対応するので安心です。',
                     'image' => '001',
                  ],
                  [
                     'number' => 'Reasons 02',
                     'title' => '相場以上の高額査定',
                     'text' => '独自の国内外への販売ルートを持っています。<br class="u-only__pc">だからこそ、一般的な国内相場にとらわれない、真の価値に基づいた高額査定が可能です。<br>査定士が最新の相場をもとに、他店に負けない高額査定を目指します。',
                     'image' => '002',
                  ],
                  [
                     'number' => 'Reasons 03',
                     'title' => '査定理由を一点一点ご説明',
                     'text' => '「なぜこの価格なのか」を、相場データと状態評価に基づいて丁寧にお伝えします。納得いただけるまでご質問ください。',
                     'image' => '003',
                  ],
                  [
                     'number' => 'Reasons 04',
                     'title' => '無理な営業・押し売りは<br>一切しません',
                     'text' => '「考えてから決めたい」「他店とも比較したい」といったご要望も歓迎。<br>査定だけでお帰りいただくお客様も多数いらっしゃいます',
                     'image' => '004',
                  ],
               ];
               foreach ($reasons as $reason) {
                  get_template_part('template-parts/p-media', null, $reason);
               }
               ?>
            </ul>
         </div>
         <!-- /.p-select__content -->
      </div>
      <!-- /.p-select__inner-->
   </section>
   <!-- /.p-select -->


   <!-- brands   ///////////////////////////////////////////////////// -->
   <section class="p-brands">
      <div class="p-brands__bg"></div>
      <!-- /.p-brands__bg -->
      <div class="p-brands__inner l-inner -narrow">
         <div class="p-brands__heading">
            <div class="c-heading -white">
               <h2 class="c-heading__title">買取ブランド一覧</h2>
               <p class="c-heading__en">Brands</p>
            </div>
            <!-- /.c-heading -->
         </div>
         <!-- /.p-brands__heading -->
         <div class="p-brands__content">
            <section class="p-brands__campaign">
               <div class="p-brands__campaignHeading">
                  <h3 class="c-heading-underline">高価買取中のブランド</h3>
                  <!-- /.c-heading-underline -->
                  <p class="p-brands__campaignLead">時計・ジュエリーからバッグ、アパレルまで、<br class="u-only__sp">幅広いブランド品の買取に対応しています。</p>
               </div>
               <!-- /.p-brands__campaignHeading -->
               <ul class="p-brands__campaignList">
                  <?php
                  $items = [
                     ['title' => 'エルメス', 'en' => 'Hermes', 'image' => '007', 'en_modifier' => '-uppercase'],
                     ['title' => 'シャネル', 'en' => 'Chanel', 'image' => '008', 'en_modifier' => '-uppercase'],
                     ['title' => 'ルイヴィトン', 'en' => 'Louis Vuitton', 'image' => '009', 'en_modifier' => '-uppercase'],
                     ['title' => 'ロレックス', 'en' => 'Rolex', 'image' => '010', 'en_modifier' => '-uppercase'],
                     ['title' => 'カルティエ', 'en' => 'Cartier', 'image' => '011', 'en_modifier' => '-uppercase'],
                     ['title' => 'ヴァンクリーフ＆<br class="u-only__sp">アーペル', 'en' => 'Van Cleef & Arpels', 'image' => '012'],
                  ];
                  foreach ($items as $item) {
                     ?>
                     <li class="p-brands__campaignItem">
                        <?php get_template_part('template-parts/p-item', null, $item); ?>
                     </li>
                     <?php
                  }
                  ?>
               </ul>
            </section>
            <section class="p-brands__order">
               <div class="p-brands__orderHeading">
                  <h3 class="c-heading-underline">ブランド一覧を<br class="u-only__sp">五十音順で調べる</h3>
                  <!-- /.c-heading-underline -->
               </div>
               <!-- /.p-brands__orderHeading -->
               <ul class="p-brands__orderList">
                  <li class="p-brands__orderListItem">
                     <details class="p-brands__orderDetails js_details is_opened" open>
                        <summary class="p-brands__orderSummary js_summary">
                           <span class="p-brands__orderSummaryText">
                              <span class="p-brands__orderSummaryTitle">「ア」行から調べる</span>
                           </span>
                        </summary>
                        <div class="p-brands__orderContent js_content">
                           <ul class="p-brands__orderSubList">
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">アーカー<span
                                       aria-hidden="true">（AHKAH）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">アイダブリューシー<span
                                       aria-hidden="true">（IWC）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">アニヤ・ハインドマーチ<span
                                       aria-hidden="true">（Anya Hindmarch）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">アンテプリマ<span
                                       aria-hidden="true">（ANTEPRIMA）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">アルマーニ<span
                                       aria-hidden="true">（ARMANI）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">アレキサンダーワン<span
                                       aria-hidden="true">（Alexander Wang）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">イッセイミヤケ<span
                                       aria-hidden="true">（ISSEY MIYAKE）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span
                                    class="p-brands__orderSubText">ヴァシュロン・コンスタンタン<span aria-hidden="true">（VACHERON
                                       CONSTANTIN）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ヴァレンティノ<span
                                       aria-hidden="true">（VALENTINO）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ヴァレクストラ<span
                                       aria-hidden="true">（Valextra）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ヴァン クリーフ＆アーペル<span
                                       aria-hidden="true">（Van Cleef ＆ Arpels）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ヴァンドーム青山<span
                                       aria-hidden="true">（VENDOME AOYAMA）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span
                                    class="p-brands__orderSubText">ヴィヴィアン・ウエストウッド<span aria-hidden="true">（Vivienne
                                       Westwood）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ヴェルサーチ<span
                                       aria-hidden="true">（VERSACE）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ウブロ<span
                                       aria-hidden="true">（HUBLOT）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">エミリオプッチ<span
                                       aria-hidden="true">（Emilio Pucci）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">エムシーエム<span
                                       aria-hidden="true">（MCM）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">エルメス<span
                                       aria-hidden="true">（HERMES）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">オーデマ ピゲ<span
                                       aria-hidden="true">（AUDEMARS PIGUET）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">オメガ<span
                                       aria-hidden="true">（OMEGA）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">オリス<span
                                       aria-hidden="true">（ORIS）</span>買取</span></li>
                           </ul>
                        </div>
                     </details>
                  </li>
                  <li class="p-brands__orderListItem">
                     <details class="p-brands__orderDetails js_details">
                        <summary class="p-brands__orderSummary js_summary">
                           <span class="p-brands__orderSummaryText">
                              <span class="p-brands__orderSummaryTitle">「カ」行から調べる</span>
                           </span>
                        </summary>
                        <div class="p-brands__orderContent js_content">
                           <ul class="p-brands__orderSubList">
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">カルティエ<span
                                       aria-hidden="true">（Cartier）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">グッチ<span
                                       aria-hidden="true">（GUCCI）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">グラハム<span
                                       aria-hidden="true">（GRAHAM）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">グラフ<span
                                       aria-hidden="true">（GRAFF）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">グランドセイコー<span
                                       aria-hidden="true">（GRAND SEIKO）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">グラスヒュッテ・オリジナル<span
                                       aria-hidden="true">（GLASHÜTTE ORIGINAL）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">クリスチャン・ディオール<span
                                       aria-hidden="true">（Christian Dior）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">クリスチャン ルブタン<span
                                       aria-hidden="true">（Christian Loubutin）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">クロエ<span
                                       aria-hidden="true">（Chloé）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">クロノスイス<span
                                       aria-hidden="true">（CHRONOSWISS）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">クロムハーツ<span
                                       aria-hidden="true">（CHROME HEARTS）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ケイト・スペード<span
                                       aria-hidden="true">（Katespade）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">コーチ<span
                                       aria-hidden="true">（COACH）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">コムデギャルソン<span
                                       aria-hidden="true">（COMME des GARÇONS）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">コルム<span
                                       aria-hidden="true">（CORUM）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ゴヤール<span
                                       aria-hidden="true">（GOYARD）</span>買取</span></li>
                           </ul>
                        </div>
                     </details>
                  </li>
                  <li class="p-brands__orderListItem">
                     <details class="p-brands__orderDetails js_details">
                        <summary class="p-brands__orderSummary js_summary">
                           <span class="p-brands__orderSummaryText">
                              <span class="p-brands__orderSummaryTitle">「サ」行から調べる</span>
                           </span>
                        </summary>
                        <div class="p-brands__orderContent js_content">
                           <ul class="p-brands__orderSubList">
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">サルヴァトーレ・フェラガモ<span
                                       aria-hidden="true">（Salvatore Ferragamo）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">サンローランパリ<span
                                       aria-hidden="true">（SAINT LAURENT PARIS）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ジバンシィ<span
                                       aria-hidden="true">（GIVENCHY）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ジミー チュウ<span
                                       aria-hidden="true">（JIMMY CHOO）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ジラールペルゴ<span
                                       aria-hidden="true">（GIRARD-PERREGAUX）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ジル サンダー<span
                                       aria-hidden="true">（Jil Sander）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">シュプリーム<span
                                       aria-hidden="true">（Supreme）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ショパール<span
                                       aria-hidden="true">（CHOPARD）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ショーメ<span
                                       aria-hidden="true">（CHAUMET）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ジン<span
                                       aria-hidden="true">（SINN）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">セイコー<span
                                       aria-hidden="true">（SEIKO）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">セリーヌ<span
                                       aria-hidden="true">（CELINE）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ゼニス<span
                                       aria-hidden="true">（ZENITH）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">スタージュエリー<span
                                       aria-hidden="true">（STAR JEWELRY）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ステラ マッカートニー<span
                                       aria-hidden="true">（STELLA McCARTNEY）</span>買取</span></li>
                           </ul>
                        </div>
                     </details>
                  </li>
                  <li class="p-brands__orderListItem">
                     <details class="p-brands__orderDetails js_details">
                        <summary class="p-brands__orderSummary js_summary">
                           <span class="p-brands__orderSummaryText">
                              <span class="p-brands__orderSummaryTitle">「タ」行から調べる</span>
                           </span>
                        </summary>
                        <div class="p-brands__orderContent js_content">
                           <ul class="p-brands__orderSubList">
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">タグ・ホイヤー<span
                                       aria-hidden="true">（TAG HEUER）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">タサキ<span
                                       aria-hidden="true">（TASAKI）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">タトラス<span
                                       aria-hidden="true">（TATRAS）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ダミアーニ<span
                                       aria-hidden="true">（DAMIANI）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ダンヒル<span
                                       aria-hidden="true">（dunhill）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ティソ<span
                                       aria-hidden="true">（TISSOT）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ティファニー<span
                                       aria-hidden="true">（Tiffany & Co.）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">デルヴォー<span
                                       aria-hidden="true">（DELVAUX）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">デュベティカ<span
                                       aria-hidden="true">（DUVETICA）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">トゥミ<span
                                       aria-hidden="true">（TUMI）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">トッズ<span
                                       aria-hidden="true">（TOD’S）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">トリーバーチ<span
                                       aria-hidden="true">（TORY BURCH）</span>買取</span></li>
                           </ul>
                        </div>
                     </details>
                  </li>
                  <li class="p-brands__orderListItem">
                     <details class="p-brands__orderDetails js_details">
                        <summary class="p-brands__orderSummary js_summary">
                           <span class="p-brands__orderSummaryText">
                              <span class="p-brands__orderSummaryTitle">「ナ」行から調べる</span>
                           </span>
                        </summary>
                        <div class="p-brands__orderContent js_content">
                           <ul class="p-brands__orderSubList">
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ノーブランド<span
                                       aria-hidden="true">（NO BRAND）</span>買取</span></li>
                           </ul>
                        </div>
                     </details>
                  </li>
                  <li class="p-brands__orderListItem">
                     <details class="p-brands__orderDetails js_details">
                        <summary class="p-brands__orderSummary js_summary">
                           <span class="p-brands__orderSummaryText">
                              <span class="p-brands__orderSummaryTitle">「ハ」行から調べる</span>
                           </span>
                        </summary>
                        <div class="p-brands__orderContent js_content">
                           <ul class="p-brands__orderSubList">
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ハミルトン<span
                                       aria-hidden="true">（HAMILTON）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ハリー・ウィンストン<span
                                       aria-hidden="true">（HARRY WINSTON）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">バーバリー<span
                                       aria-hidden="true">（BURBERRY）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">バリー<span
                                       aria-hidden="true">（BALLY）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">バレンシアガ<span
                                       aria-hidden="true">（BALENCIAGA）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">パテック フィリップ<span
                                       aria-hidden="true">（PATEK PHILIPPE）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">パネライ<span
                                       aria-hidden="true">（PANERAI）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ピアジェ<span
                                       aria-hidden="true">（PIAGET）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">フォクシー<span
                                       aria-hidden="true">（FOXEY）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">フェンディ<span
                                       aria-hidden="true">（FENDI）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ブシュロン<span
                                       aria-hidden="true">（Boucheron）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ブランパン<span
                                       aria-hidden="true">（BLANCPAIN）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ブレゲ<span
                                       aria-hidden="true">（BREGUET）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ブライトリング<span
                                       aria-hidden="true">（BREITLING）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">フランク ミュラー<span
                                       aria-hidden="true">（FRANCK MULLER）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">フルラ<span
                                       aria-hidden="true">（FURLA）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ブルガリ<span
                                       aria-hidden="true">（BVLGARI）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ベル＆ロス<span
                                       aria-hidden="true">（Bell ＆ Ross）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ベルルッティ<span
                                       aria-hidden="true">（Berluti）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ボーム＆メルシエ<span
                                       aria-hidden="true">（Baume＆Mercier）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ボッテガ・ヴェネタ<span
                                       aria-hidden="true">（Bottega Veneta）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ポメラート<span
                                       aria-hidden="true">（POMELLATO）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ポンテヴェキオ<span
                                       aria-hidden="true">（Ponte Vecchio）</span>買取</span></li>
                           </ul>
                        </div>
                     </details>
                  </li>
                  <li class="p-brands__orderListItem">
                     <details class="p-brands__orderDetails js_details">
                        <summary class="p-brands__orderSummary js_summary">
                           <span class="p-brands__orderSummaryText">
                              <span class="p-brands__orderSummaryTitle">「マ」行から調べる</span>
                           </span>
                        </summary>
                        <div class="p-brands__orderContent js_content">
                           <ul class="p-brands__orderSubList">
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">マーク ジェイコブス<span
                                       aria-hidden="true">（MARC JACOBS）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">マイケル・コース<span
                                       aria-hidden="true">（MICHAEL KORS）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">マックスマーラ<span
                                       aria-hidden="true">（Max Mara）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">マルニ<span
                                       aria-hidden="true">（MARNI）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ミキモト<span
                                       aria-hidden="true">（MIKIMOTO）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ミュウミュウ<span
                                       aria-hidden="true">（miumiu）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">メゾン マルジェラ<span
                                       aria-hidden="true">（Maison Margiela）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">モンクレール<span
                                       aria-hidden="true">（Moncler）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">モンブラン<span
                                       aria-hidden="true">（MONTBLANC）</span>買取</span></li>
                           </ul>
                        </div>
                     </details>
                  </li>
                  <li class="p-brands__orderListItem">
                     <details class="p-brands__orderDetails js_details">
                        <summary class="p-brands__orderSummary js_summary">
                           <span class="p-brands__orderSummaryText">
                              <span class="p-brands__orderSummaryTitle">「ヤ」行から調べる</span>
                           </span>
                        </summary>
                        <div class="p-brands__orderContent js_content">
                           <ul class="p-brands__orderSubList">
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ユリス・ナルダン<span
                                       aria-hidden="true">（ULYSSE NARDIN）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">4ドシー<span
                                       aria-hidden="true">（4℃）</span>買取</span></li>
                           </ul>
                        </div>
                     </details>
                  </li>
                  <li class="p-brands__orderListItem">
                     <details class="p-brands__orderDetails js_details">
                        <summary class="p-brands__orderSummary js_summary">
                           <span class="p-brands__orderSummaryText">
                              <span class="p-brands__orderSummaryTitle">「ラ」行から調べる</span>
                           </span>
                        </summary>
                        <div class="p-brands__orderContent js_content">
                           <ul class="p-brands__orderSubList">
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ライバン<span
                                       aria-hidden="true">（RayBan）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">リモワ<span
                                       aria-hidden="true">（Rimowa）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ルイ・ヴィトン<span
                                       aria-hidden="true">（LOUIS VUITTON）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ルミノックス<span
                                       aria-hidden="true">（Luminox）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ロエベ<span
                                       aria-hidden="true">（LOEWE）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ロジェ・デュブイ<span
                                       aria-hidden="true">（Roger Dubuis）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ロレックス<span
                                       aria-hidden="true">（ROLEX）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ロンシャン<span
                                       aria-hidden="true">（LONGCHAMP）</span>買取</span></li>
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">ロンジン<span
                                       aria-hidden="true">（LONGINES）</span>買取</span></li>
                           </ul>
                        </div>
                     </details>
                  </li>
                  <li class="p-brands__orderListItem">
                     <details class="p-brands__orderDetails js_details">
                        <summary class="p-brands__orderSummary js_summary">
                           <span class="p-brands__orderSummaryText">
                              <span class="p-brands__orderSummaryTitle">「ワ」行から調べる</span>
                           </span>
                        </summary>
                        <div class="p-brands__orderContent js_content">
                           <ul class="p-brands__orderSubList">
                              <li class="p-brands__orderSubItem"><span class="p-brands__orderSubText">買取</span></li>
                           </ul>
                        </div>
                     </details>
                  </li>
               </ul>
               <!-- /.p-brands__orderList -->
            </section>
         </div>
         <!-- /.p-brands__content -->
      </div>
      <!-- /.p-brands__inner-->
   </section>
   <!-- /.p-brands -->


</main>

<?php get_footer(); ?>