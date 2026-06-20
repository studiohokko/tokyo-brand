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
            <a href="#in-store" class="p-choice__methodLink -store">
               <figure class="p-choice__methodImage">
                  <img src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/icon_building.svg')); ?>'
                     alt='' width='12' height='12' loading='lazy' aria-hidden='true'>
               </figure>
               <p class="p-choice__methodText">店頭買取</p>
            </a>
         </li>
         <li class="p-choice__method">
            <a href="#delivery" class="p-choice__methodLink -delivery">
               <figure class="p-choice__methodImage">
                  <img src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/icon_car.svg')); ?>' alt=''
                     width='12' height='12' loading='lazy' aria-hidden='true'>
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
                        aria-controls="shop-panel1" aria-selected="true" tabindex="-1">東京ぶらんど<br>渋谷本店</button>
                     <button class="p-shops__tab js_shopsTab" role="tab" id="shop-tab2" aria-controls="shop-panel2"
                        aria-selected="false">ORANGE <br class="u-only__sp">BOUTIQUE<br>渋谷店</button>
                     <button class="p-shops__tab js_shopsTab" role="tab" id="shop-tab3" aria-controls="shop-panel3"
                        aria-selected="false">東京ぶらんど<br>渋谷109店</button>
                  </div>
                  <!-- /.p-shops__tabs -->
                  <div class="p-shops__panels">
                     <section class="p-shops__panel js_shopsPanel is_show" role="tabpanel" id="shop-panel1"
                        aria-labelledby="shop-tab1">
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
                                    alt='東京ぶらんど Produce by ALAMODE 渋谷本店の店内。ガラスケースにエルメスやシャネルなどのブランドバッグが多数並ぶブランド品買取・販売専門店'
                                    width='484' height='296' loading='lazy'>
                              </figure>
                           </div>
                           <!-- /.p-shops__imageArea -->
                        </div>
                        <!-- /.p-shops__content -->
                     </section>
                     <section class="p-shops__panel js_shopsPanel" role="tabpanel" id="shop-panel2"
                        aria-labelledby="shop-tab2">
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
                                    alt='ORANGE BOUTIQUE 渋谷店の店内。ステンドグラス調の装飾を背景にブランドバッグや財布を展示する高級ブランド品買取・販売店' width='484'
                                    height='296' loading='lazy'>
                              </figure>
                           </div>
                           <!-- /.p-shops__imageArea -->
                        </div>
                        <!-- /.p-shops__content -->
                     </section>
                     <section class="p-shops__panel js_shopsPanel" role="tabpanel" id="shop-panel3"
                        aria-labelledby="shop-tab3">
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
                                    alt='東京ぶらんど Produce by ALAMODE 渋谷109店の外観。腕時計やブランド品を取り扱う店舗入口と大型ディスプレイが並ぶブランド品買取・販売店'
                                    width='484' height='296' loading='lazy'>
                              </figure>
                           </div>
                           <!-- /.p-shops__imageArea -->
                        </div>
                        <!-- /.p-shops__content -->
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
                                       alt='' width='350' height='186' loading='lazy'>
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
                                       alt='' width='350' height='186' loading='lazy'>
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
                                       alt='' width='350' height='186' loading='lazy'>
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
                              alt='' width='323' height='324' loading='lazy' aria-hidden='true'>
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
                              alt='' width='323' height='324' loading='lazy' aria-hidden='true'>
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
            aria-hidden="true" aria-label="東京ぶらんど Produce by ALAMODE 渋谷本店のGoogleマップ">
            <button type="button" class="p-shops__modalOverlay js_shopsMapClose" aria-label="閉じる"></button>
            <div class="p-shops__modalInner">
               <button type="button" class="p-shops__modalClose js_shopsMapClose" aria-label="閉じる"></button>
               <div class="p-shops__modalMap">
                  <iframe
                     src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d207601.42939836302!2d139.5628184!3d35.6086821!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d5cbb320c3b%3A0x1dae6547623bae28!2z5p2x5Lqs44G244KJ44KT44GpIFByb2R1Y2UgYnkgQUxBTU9ERSDmuIvosLfmnKzlupc!5e0!3m2!1sja!2sjp!4v1781245689604!5m2!1sja!2sjp"
                     style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                     title="東京ぶらんど Produce by ALAMODE 渋谷本店のGoogleマップ"></iframe>
               </div>
               <!-- /.p-shops__modalMap -->
            </div>
            <!-- /.p-shops__modalInner -->
         </div>
         <!-- /.p-shops__modal -->
         <div class="p-shops__modal js_shopsMapModal" id="shop-map-modal2" role="dialog" aria-modal="true"
            aria-hidden="true" aria-label="ORANGE BOUTIQUE 渋谷店のGoogleマップ">
            <button type="button" class="p-shops__modalOverlay js_shopsMapClose" aria-label="閉じる"></button>
            <div class="p-shops__modalInner">
               <button type="button" class="p-shops__modalClose js_shopsMapClose" aria-label="閉じる"></button>
               <div class="p-shops__modalMap">
                  <iframe
                     src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.694448992338!2d139.6965467762908!3d35.659899031144604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188dc8dcbdbebd%3A0x698742beaeb31b76!2zT1JBTkdFIEJPVVRJUVVFIOa4i-iwtw!5e0!3m2!1sja!2sjp!4v1781245831373!5m2!1sja!2sjp"
                     style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                     title="ORANGE BOUTIQUE 渋谷店のGoogleマップ"></iframe>
               </div>
               <!-- /.p-shops__modalMap -->
            </div>
            <!-- /.p-shops__modalInner -->
         </div>
         <!-- /.p-shops__modal -->
         <div class="p-shops__modal js_shopsMapModal" id="shop-map-modal3" role="dialog" aria-modal="true"
            aria-hidden="true" aria-label="東京ぶらんど Produce by ALAMODE 渋谷109店のGoogleマップ">
            <button type="button" class="p-shops__modalOverlay js_shopsMapClose" aria-label="閉じる"></button>
            <div class="p-shops__modalInner">
               <button type="button" class="p-shops__modalClose js_shopsMapClose" aria-label="閉じる"></button>
               <div class="p-shops__modalMap">
                  <iframe
                     src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d207601.42939836302!2d139.5628184!3d35.6086821!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d199c367869%3A0x8de64d8b86faebdb!2z5p2x5Lqs44G244KJ44KT44GpIFByb2R1Y2UgYnkgQUxBTU9ERSDmuIvosLcxMDnlupc!5e0!3m2!1sja!2sjp!4v1781245792661!5m2!1sja!2sjp"
                     style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                     title="東京ぶらんど Produce by ALAMODE 渋谷109店のGoogleマップ"></iframe>
               </div>
               <!-- /.p-shops__modalMap -->
            </div>
            <!-- /.p-shops__modalInner -->
         </div>
         <!-- /.p-shops__modal -->
      </div>
      <!-- /.p-shops__modals -->
   </section>
   <!-- /.p-about -->


   <!-- items   ///////////////////////////////////////////////////// -->
   <section id="items" class="p-items">
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
                              alt='' width='248' height='188' loading='lazy'>
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
                              alt='' width='248' height='188' loading='lazy'>
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
                              alt='' width='248' height='188' loading='lazy'>
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
                              alt='' width='248' height='188' loading='lazy'>
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
                           alt='' width='514' height='288' loading='lazy'>
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
   <section id="select" class="p-select">
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
                     'alt' => '',
                  ],
                  [
                     'number' => 'Reasons 02',
                     'title' => '相場以上の高額査定',
                     'text' => '独自の国内外への販売ルートを持っています。<br class="u-only__pc">だからこそ、一般的な国内相場にとらわれない、真の価値に基づいた高額査定が可能です。<br>査定士が最新の相場をもとに、他店に負けない高額査定を目指します。',
                     'image' => '002',
                     'alt' => '',
                     'modifier' => '-reverse',
                  ],
                  [
                     'number' => 'Reasons 03',
                     'title' => '査定理由を一点一点ご説明',
                     'text' => '「なぜこの価格なのか」を、相場データと状態評価に基づいて丁寧にお伝えします。納得いただけるまでご質問ください。',
                     'image' => '003',
                     'alt' => '',
                  ],
                  [
                     'number' => 'Reasons 04',
                     'title' => '無理な営業・押し売りは<br>一切しません',
                     'text' => '「考えてから決めたい」「他店とも比較したい」といったご要望も歓迎。<br>査定だけでお帰りいただくお客様も多数いらっしゃいます',
                     'image' => '004',
                     'alt' => '',
                     'modifier' => '-reverse',
                  ],
               ];
               foreach ($reasons as $reason) {
                  ?>
                  <li class="p-select__item">
                     <?php get_template_part('template-parts/p-media', null, $reason); ?>
                  </li>
                  <?php
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
   <section id="brands" class="p-brands">
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
                  <li class="p-brands__orderListItem -empty">
                     <div class="p-brands__orderDetails">
                        <div class="p-brands__orderSummary">
                           <span class="p-brands__orderSummaryText">
                              <span class="p-brands__orderSummaryTitle">「ワ」行から調べる</span>
                           </span>
                        </div>
                     </div>
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


   <!-- results   ///////////////////////////////////////////////////// -->
   <?php
   $results_items = get_field('results_group') ?: [];
   $results_count = count($results_items);
   $results_is_swiper = $results_count >= 4;
   $results_loop_count = $results_is_swiper ? 3 : 1;
   $results_mode_class = $results_is_swiper ? 'is-swiper' : 'is-list';
   ?>
   <section class="p-results <?php echo esc_attr($results_mode_class); ?>"
      data-results-count="<?php echo esc_attr($results_count); ?>">
      <div class="p-results__inner l-inner">
         <div class="p-results__heading">
            <div class="c-heading">
               <h2 class="c-heading__title">買取実績</h2>
               <p class="c-heading__en">Results</p>
            </div>
            <!-- /.c-heading -->
            <p class="p-results__lead">おかげさまで累計1万点以上の買取を行っており、その一例をご紹介します。ご依頼の参考にされてください。</p>
         </div>
         <!-- /.p-results__heading -->
         <div class="p-results__content">
            <div class="p-results__swiper-container <?php echo esc_attr($results_mode_class); ?>">
               <div class="swiper p-results__swiper">
                  <div class="swiper-wrapper p-results__swiper-wrapper">
                     <?php if ($results_items): ?>
                        <?php for ($results_loop = 0; $results_loop < $results_loop_count; $results_loop++): ?>
                           <?php foreach ($results_items as $results_item): ?>
                              <?php
                              $results_name = $results_item['results_name'] ?? '';
                              $results_price = $results_item['results_price'] ?? '';
                              $results_text = $results_item['results_text'] ?? '';
                              $image_id = $results_item['results_image'] ?? null;
                              ?>
                              <div class="swiper-slide p-results__swiper-slide">
                                 <div class="p-results__item">
                                    <div class="p-results__textArea">
                                       <div class="p-results__head">
                                          <?php if ($results_name): ?>
                                             <p class="p-results__name"><?php echo nl2br(esc_html($results_name)); ?></p>
                                          <?php endif; ?>
                                          <?php if ($results_price): ?>
                                             <div class="p-results__price">
                                                <p class="p-results__label">買取金額</p>
                                                <p class="p-results__value"><?php echo esc_html($results_price); ?><span>円</span>
                                                </p>
                                             </div>
                                             <!-- /.p-results__price -->
                                          <?php endif; ?>
                                          <?php if ($results_text): ?>
                                             <div class="p-results__comment">
                                                <p class="p-results__commentTitle">鑑定士コメント</p>
                                                <p class="p-results__commentText"><?php echo nl2br(esc_html($results_text)); ?></p>
                                             </div>
                                             <!-- /.p-results__comment -->
                                          <?php endif; ?>
                                       </div>
                                       <!-- /.p-results__head -->
                                    </div>
                                    <!-- /.p-results__textArea -->
                                    <?php if ($image_id): ?>
                                       <?php
                                       $image_url = wp_get_attachment_image_src($image_id, 'full');
                                       $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                       ?>
                                       <div class="p-results__imageArea">
                                          <figure class="p-results__image">
                                             <img src="<?php echo esc_url($image_url[0]); ?>"
                                                alt="<?php echo esc_attr($image_alt); ?>"
                                                width="<?php echo esc_attr($image_url[1]); ?>"
                                                height="<?php echo esc_attr($image_url[2]); ?>" loading="lazy">
                                          </figure>
                                          <!-- /.p-results__image -->
                                       </div>
                                       <!-- /.p-results__imageArea -->
                                    <?php endif; ?>
                                 </div>
                                 <!-- /.p-results__item -->
                              </div>
                              <!-- /.p-results__swiper-slide -->
                           <?php endforeach; ?>
                        <?php endfor; ?>
                     <?php endif; ?>
                  </div>
                  <!-- /.p-results__swiper-wrapper -->
               </div>
               <!-- /.p-results__swiper -->
               <button class="swiper-button-prev p-results__swiper-button-prev"></button>
               <button class="swiper-button-next p-results__swiper-button-next"></button>
            </div>
            <!-- /.p-results__swiper-container -->
         </div>
         <!-- /.p-results__content -->
      </div>
      <!-- /.p-results__inner-->
   </section>
   <!-- /.p-results -->


   <!-- gold   ///////////////////////////////////////////////////// -->
   <div class="p-gold">
      <div class="p-gold__inner l-inner">
         <div class="p-gold__content">
            <section class="p-gold__news">
               <div class="p-gold__newsHeading">
                  <time class="p-gold__pop" datetime="<?php echo esc_attr(date_i18n('Y-m')); ?>">
                     <?php echo esc_html(date_i18n('Y年n月')); ?>
                  </time>
                  <div class="c-heading">
                     <h2 class="c-heading__title">金相場速報！</h2>
                     <p class="c-heading__en">Gold Rates</p>
                  </div>
               </div>
               <!-- /.p-gold__newsHeading -->
               <div class="p-gold__newsBody">
                  <?php
                  $gold_time = get_field('gold_time');
                  $gold_items = get_field('gold_group') ?: [];
                  $first_gold_price = $gold_items[0]['gold_price'] ?? '';
                  $timestamp = $gold_time ? strtotime($gold_time) : null;
                  ?>
                  <div class="p-gold__newsBannerWrapper">
                     <figure class="p-gold__newsBanner">
                        <picture>
                           <source
                              srcset="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-gold_banner.webp')); ?>"
                              media="(min-width: 768px)">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/sp/p-gold_banner.webp')); ?>'
                              alt='金相場高騰につき、高価買取実施中！本日の買取価格<?php echo esc_html($first_gold_price); ?>' width='87'
                              height='60' loading='lazy'>
                        </picture>
                     </figure>
                     <?php if ($first_gold_price): ?>
                        <p class="p-gold__bannerPrice"><?php echo esc_html($first_gold_price); ?><span>円/g</span></p>
                     <?php endif; ?>
                     <?php if ($timestamp): ?>
                        <time class="p-gold__bannerTime" datetime="<?php echo esc_attr(date('c', $timestamp)); ?>">
                           <?php echo esc_html(date_i18n('Y年n月j日 G:i', $timestamp)); ?>
                        </time>
                     <?php endif; ?>
                  </div>
               </div>
               <!-- /.p-gold__newsBody -->
            </section>
            <section class="p-gold__rate">
               <div class="p-gold__rateHeading">
                  <h2 class="c-heading-underline -color">金・貴金属相場表</h2>
               </div>
               <!-- /.p-gold__rateHeading -->
               <div class="p-gold__rateBody">
                  <section class="p-gold__rateBox">
                     <div class="p-gold__rateBoxTitle">
                        <h3 class="p-gold__rateTitle">今日の金・貴金属1gあたりの<br class="u-only__sp">買取相場価格</h3>
                        <?php if ($gold_time): ?>
                           <p class="p-gold__rateDate">
                              ※
                              <time class="p-gold__rateTime" datetime="<?php echo esc_attr(date('c', $timestamp)); ?>">
                                 <?php echo esc_html(date_i18n('Y年n月j日(D) G:i', $timestamp)); ?>
                              </time>
                              更新
                           </p>
                        <?php endif; ?>
                     </div>
                     <!-- /.p-gold__rateBoxTitle -->
                     <div class="p-gold__rateTableWrapper">
                        <?php if ($gold_items): ?>
                           <ul class="p-gold__rateList">
                              <?php foreach ($gold_items as $gold_row): ?>
                                 <?php
                                 $gold_item = $gold_row['gold_item'] ?? '';
                                 $gold_price = $gold_row['gold_price'] ?? '';
                                 $gold_difference = $gold_row['gold_difference'] ?? '';
                                 ?>
                                 <li class="p-gold__rateItem">
                                    <?php if ($gold_item): ?>
                                       <p class="p-gold__rateItemHead"><?php echo esc_html($gold_item); ?></p>
                                    <?php endif; ?>
                                    <div class="p-gold__rateItemBody">
                                       <?php if ($gold_price): ?>
                                          <p class="p-gold__rateItemPrice"><?php echo esc_html($gold_price); ?><span>円</span></p>
                                       <?php endif; ?>
                                       <?php if ($gold_difference): ?>
                                          <p class="p-gold__rateItemDifference"><?php echo esc_html($gold_difference); ?>円
                                          </p>
                                       <?php endif; ?>
                                    </div>
                                 </li>
                              <?php endforeach; ?>
                           </ul>
                        <?php endif; ?>
                     </div>
                     <!-- /.p-gold__rateTableWrapper -->
                  </section>
               </div>
               <!-- /.p-gold__rateBody -->
            </section>
         </div>
         <!-- /.p-gold__content -->
      </div>
      <!-- /.p-gold__inner-->
   </div>
   <!-- /.p-gold -->


   <!-- price   ///////////////////////////////////////////////////// -->
   <section class="p-price">
      <div class="p-price__inner l-inner">
         <div class="p-price__heading">
            <div class="c-heading">
               <h2 class="c-heading__title">相場表</h2>
               <p class="c-heading__en">Price List</p>
            </div>
            <!-- /.c-heading -->
            <p class="p-price__lead">グループ会社でオークションを運営しているので、相場をリアルタイムで把握し、買取金額に反映しています。</p>
         </div>
         <!-- /.p-price__heading -->
         <div class="p-price__content">
            <ul class="p-price__list">
               <?php
               $args = array(
                  'post_type' => 'price', // ここに投稿タイプを指定 例: 'post', 'custom_post'
                  'posts_per_page' => '15', // 取得したい件数
                  'orderby' => 'menu_order', // ここに並び替えの基準を指定 例: 'date', 'title', 'meta_value', 'rand', menu_order
                  'order' => 'ASC', // ここに順番を指定 'ASC'（昇順）または 'DESC'（降順）
               );
               $the_query = new WP_Query($args);
               ?>
               <?php if ($the_query->have_posts()): ?>
                  <?php while ($the_query->have_posts()): ?>
                     <?php $the_query->the_post(); ?>
                     <li class="p-price__item">
                        <div class="p-price__textArea">
                           <p class="p-price__name"><?php the_title(); ?></p>
                           <div class="p-price__price">
                              <p class="p-price__label">買取参考価格</p>
                              <?php
                              $text_field = get_field('price_value');
                              if ($text_field):
                                 // 数字だけ取り出して桁数をカウント（カンマ・「円」などを除外）
                                 $digits = mb_strlen(preg_replace('/[^0-9]/', '', $text_field));

                                 // 桁数に応じてサイズ調整クラスを出し分け
                                 $size_class = match (true) {
                                    $digits >= 8 => ' -small', // 8〜9桁
                                    default => '',
                                 };
                                 ?>
                                 <p class="p-price__value<?php echo $size_class; ?>">
                                    <?php echo esc_html($text_field); ?><span>円</span>
                                 </p>
                              <?php endif; ?>
                           </div>
                           <!-- /.p-price__price -->
                        </div>
                        <!-- /.p-price__textArea -->
                        <div class="p-price__imageArea">
                           <?php
                           if (has_post_thumbnail()):
                              $image_id = get_post_thumbnail_id();
                              $image_url = wp_get_attachment_image_src($image_id, 'full');
                              $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                              $width = $image_url[1];
                              $height = $image_url[2];
                              ?>
                              <figure class="p-price__image">
                                 <img src="<?php echo esc_url($image_url[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                                    width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>"
                                    loading="lazy">
                              </figure>
                           <?php endif; ?>
                           <!-- /.p-price__image -->
                        </div>
                        <!-- /.p-price__imageArea -->
                     </li>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
               <?php endif; ?>
            </ul>
            <p class="p-price__attention">
               ※ブランド品の買取相場は、市場動向や在庫状況によって日々変動いたします。<br>売却をご検討の際は、LINE無料査定または店頭査定で、最新の買取価格をご確認ください。</p>
         </div>
         <!-- /.p-price__content -->
      </div>
      <!-- /.p-price__inner-->
   </section>
   <!-- /.p-price -->


   <!-- reasons   ///////////////////////////////////////////////////// -->
   <section id="reasons" class="p-reasons">
      <div class="p-reasons__bg"></div>
      <!-- /.p-reasons__bg -->
      <div class="p-reasons__inner l-inner -narrow">
         <div class="p-reasons__heading">
            <div class="c-heading -white">
               <h2 class="c-heading__title">高価買取の理由</h2>
               <p class="c-heading__en">Reasons</p>
            </div>
            <!-- /.c-heading -->
            <p class="p-reasons__lead">当社では「ブランド品をどこよりも高価買取すること」が可能です。その理由についてご説明します。</p>
         </div>
         <!-- /.p-reasons__heading -->
         <div class="p-reasons__content">
            <ul class="p-reasons__list">
               <?php
               $reasons = [
                  [
                     'number' => 'Reasons 01',
                     'title' => '国内相場に左右されない、<br>世界基準の買取',
                     'text' => '世界中からお客様が訪れる店舗を複数展開しているため、安定した販売力を背景に高価買取を実現しています。国内の販売価格に左右されることなく、世界基準の相場で買取が可能です。',
                     'image' => '005',
                     'alt' => '',
                  ],
                  [
                     'number' => 'Reasons 02',
                     'title' => '経験豊富な鑑定士',
                     'text' => '豊富な知識と経験を持つ鑑定士が、一点一点丁寧に査定いたします。市場動向やモデルごとの価値を見極め、本来の価値を反映した適正価格での買取を行っています。',
                     'image' => '006',
                     'alt' => '',
                     'modifier' => '-reverse',
                  ],
                  [
                     'number' => 'Reasons 03',
                     'title' => '自社オークションの運営',
                     'text' => '自社オークションを運営しているため、幅広い販路を活かした買取が可能です。市場の需要を直接反映できるため、最新の相場を踏まえた高価買取<br class="u-only__pc">を実現しています。',
                     'image' => '007',
                     'alt' => '',
                  ],
               ];
               foreach ($reasons as $reason) {
                  ?>
                  <li class="p-reasons__item">
                     <?php get_template_part('template-parts/p-media', null, $reason); ?>
                  </li>
                  <?php
               }
               ?>
            </ul>
         </div>
         <!-- /.p-reasons__content -->
      </div>
      <!-- /.p-reasons__inner-->
   </section>
   <!-- /.p-reasons -->


   <!-- flow   ///////////////////////////////////////////////////// -->
   <section id="flow" class="p-flow">
      <div class="p-flow__inner l-inner">
         <div class="p-flow__heading">
            <div class="c-heading">
               <h2 class="c-heading__title">ブランド買取の<br class="u-only__sp">流れ</h2>
               <p class="c-heading__en">How It Works</p>
            </div>
            <!-- /.c-heading -->
            <p class="p-flow__lead">
               お忙しい日常の中でも、お客様がストレスなくご利用いただけるよう、シンプルで分かりやすい2つの買取の流れをご用意しました。<br>お客様のライフスタイルに合わせて、最適な方法をお選びください。<br>忙しい方や遠方の方には自宅から送るだけの「宅配買取」、直接相談したい方には「店頭買取」をご用意しています。<br>査定料・手数料は無料です。
            </p>
         </div>
         <!-- /.p-flow__heading -->
         <div class="p-flow__content">
            <div class="p-flow__cta">
               <section class="p-flow-cta">
                  <div class="p-flow-cta__box">
                     <figure class="p-flow-cta__deco">
                        <img
                           src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-flow-cta_person.webp')); ?>'
                           alt='' width='274' height='326' loading='lazy' aria-hidden='true'>
                     </figure>
                     <!-- /.p-flow-cta__deco -->
                     <div class="p-flow-cta__title">
                        <h3 class="c-heading-underline">まずはLINEで無料査定</h3>
                     </div>
                     <!-- /.p-flow-cta__title -->
                     <div class="p-flow-cta__body">
                        <p class="p-flow-cta__pop">写真を送るだけ！<br class="u-only__sp">最短当日で査定OK</p>
                        <div class="p-flow-cta__button">
                           <a href="<?php echo esc_url('https://lin.ee/TtR8jHd'); ?>"
                              class="c-button-line -simple -small" target="_blank" rel="nofollow noopener">
                              <p class="c-button-line__text">LINEで無料査定する</p>
                           </a>
                        </div>
                        <!-- /.p-flow-cta__button -->
                     </div>
                     <!-- /.p-flow-cta__body -->
                  </div>
                  <!-- /.p-flow-cta__box -->
                  <p class="p-flow-cta__text">
                     店頭に足を運ぶ暇がなかなかない方は、LINEにて無料査定しておりますのでぜひご利用ください。<br>売りたい商品のお写真とともに、ブランド名、アイテム名、ご購入時期、コンディション、<br>その他お品物に関する詳しい情報をお伝えいただくとより正確な金額をご提示できます。
                  </p>
               </section>
            </div>
            <!-- /.p-flow__cta -->
            <div class="p-flow__buttonsWrapper">
               <ul class="p-flow__buttons">
                  <li class="p-flow__button">
                     <a href="#in-store" class="p-flow__buttonLink -store">
                        <figure class="p-flow__buttonImage">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/icon_building.svg')); ?>'
                              alt='' width='12' height='12' loading='lazy' aria-hidden='true'>
                        </figure>
                        <p class="p-flow__buttonPop">即日売却したい <span>/</span> 対面で丁寧に対応してほしい</p>
                        <p class="p-flow__buttonText">店頭買取はこちら</p>
                     </a>
                  </li>
                  <li class="p-flow__button">
                     <a href="#delivery" class="p-flow__buttonLink -delivery">
                        <figure class="p-flow__buttonImage">
                           <img src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/icon_car.svg')); ?>'
                              alt='' width='12' height='12' loading='lazy' aria-hidden='true'>
                        </figure>
                        <p class="p-flow__buttonPop">自宅で売却したい <span>/</span> 手間なく売却したい</p>
                        <p class="p-flow__buttonText">宅配買取はこちら</p>
                     </a>
                  </li>
               </ul>
            </div>
            <!-- /.p-flow__buttonsWrapper -->
            <div class="p-flow__store">
               <section id="in-store" class="p-flow-store">
                  <div class="p-flow-store__heading">
                     <div class="c-heading">
                        <h2 class="c-heading__title">店頭買取</h2>
                        <p class="c-heading__en">In Store</p>
                     </div>
                     <!-- /.c-heading -->
                  </div>
                  <!-- /.p-flow-store__heading -->
                  <div class="p-flow-store__content">
                     <ul class="p-flow-store__list">
                        <li class="p-flow-store__item">
                           <div class="p-flow-item -store">
                              <div class="p-flow-item__head">
                                 <p class="p-flow-item__step">step</p>
                                 <p class="p-flow-item__number">01</p>
                              </div>
                              <!-- /.p-flow-item__head -->
                              <div class="p-flow-item__body">
                                 <p class="p-flow-item__title">店舗まで商品を持ち込む</p>
                                 <p class="p-flow-item__text">
                                    当店の店舗（渋谷）まで買取をご希望されているお品物一式をお持ち込みください。<br>買取時にご本人様を確認できる、現住所記載の身分証明書が必要になります。<br>商品付属の保証書や鑑定書・購入時に入っていた箱などもご一緒にお持ちいただけますとより高価で買取可能となります。
                                 </p>
                                 <div class="p-flow-item__foot">
                                    <ul class="p-flow-item__footLinks">
                                       <li class="p-flow-item__footLinkItem">
                                          <a href="#stores" class="p-flow-item__footLink">店舗情報を見る</a>
                                       </li>
                                       <li class="p-flow-item__footLinkItem">
                                          <a href="#status" class="p-flow-item__footLink">身分証明書について</a>
                                       </li>
                                    </ul>
                                 </div>
                                 <!-- /.p-flow-item__foot -->
                              </div>
                              <!-- /.p-flow-item__body -->
                           </div>
                           <!-- /.p-flow-item -->
                        </li>
                        <li class="p-flow-store__item">
                           <div class="p-flow-item -store">
                              <div class="p-flow-item__head">
                                 <p class="p-flow-item__step">step</p>
                                 <p class="p-flow-item__number">02</p>
                              </div>
                              <!-- /.p-flow-item__head -->
                              <div class="p-flow-item__body">
                                 <p class="p-flow-item__title">その場で無料査定</p>
                                 <p class="p-flow-item__text">
                                    当社査定士がその場で査定いたします。<br>事前にLINEで査定いただいた場合にも、改めて現品を確認させていただきますので少々お時間をいただきます。<br>とりあえず査定だけしたいというご要望にもお応えいたします。査定のご予約等は必要ございません。
                                 </p>
                              </div>
                              <!-- /.p-flow-item__body -->
                           </div>
                           <!-- /.p-flow-item -->
                        </li>
                        <li class="p-flow-store__item">
                           <div class="p-flow-item -store">
                              <div class="p-flow-item__head">
                                 <p class="p-flow-item__step">step</p>
                                 <p class="p-flow-item__number">03</p>
                              </div>
                              <!-- /.p-flow-item__head -->
                              <div class="p-flow-item__body">
                                 <p class="p-flow-item__title">お支払い</p>
                                 <p class="p-flow-item__text">
                                    査定結果にご納得いただけましたら、その場で現金買取させていただきます。<br>必要書類にご記入をいただき、買取手続きは終了となります。<br>※場合によっては後日お振込みになることがございます。
                                 </p>
                              </div>
                              <!-- /.p-flow-item__body -->
                           </div>
                           <!-- /.p-flow-item -->
                        </li>
                     </ul>
                  </div>
                  <!-- /.p-flow-store__content -->
               </section>
            </div>
            <!-- /.p-flow__store -->
            <div class="p-flow__delivery">
               <section id="delivery" class="p-flow-delivery">
                  <div class="p-flow-delivery__heading">
                     <div class="c-heading">
                        <h2 class="c-heading__title">宅配買取</h2>
                        <p class="c-heading__en">Mail Service</p>
                     </div>
                     <!-- /.c-heading -->
                  </div>
                  <!-- /.p-flow-delivery__heading -->
                  <div class="p-flow-delivery__content">
                     <ul class="p-flow-delivery__list">
                        <li class="p-flow-delivery__item">
                           <div class="p-flow-item -delivery">
                              <div class="p-flow-item__head">
                                 <p class="p-flow-item__step">step</p>
                                 <p class="p-flow-item__number">01</p>
                              </div>
                              <!-- /.p-flow-item__head -->
                              <div class="p-flow-item__body">
                                 <p class="p-flow-item__title">LINE 無料査定</p>
                                 <p class="p-flow-item__text">売りたい商品の画像を撮って送るだけ！
                                    <br>ブランド名、アイテム名、ご購入時期、コンディション、その他お品物に関する詳しい情報をお伝えいただくと<br>より正確な金額をご提示できます。
                                 </p>
                                 <div class="p-flow-item__foot">
                                    <div class="p-flow-item__lineButton">
                                       <a href="<?php echo esc_url('https://lin.ee/TtR8jHd'); ?>" class="c-button-line"
                                          target="_blank" rel="nofollow noopener">
                                          <p class="c-button-line__pop">写真を送るだけ！最短当日で査定OK</p>
                                          <p class="c-button-line__text">LINEで無料査定する</p>
                                       </a>
                                    </div>
                                    <!-- /.p-flow-item__lineButton -->
                                 </div>
                                 <!-- /.p-flow-item__foot -->
                              </div>
                              <!-- /.p-flow-item__body -->
                           </div>
                           <!-- /.p-flow-item -->
                        </li>
                        <li class="p-flow-store__item">
                           <div class="p-flow-item -delivery">
                              <div class="p-flow-item__head">
                                 <p class="p-flow-item__step">step</p>
                                 <p class="p-flow-item__number">02</p>
                              </div>
                              <!-- /.p-flow-item__head -->
                              <div class="p-flow-item__body">
                                 <p class="p-flow-item__title">商品の発送</p>
                                 <p class="p-flow-item__text">
                                    事前査定にご納得いただけましたら、LINEで宅配買取をご依頼ください。<br>商品発送などの手順は、LINEにてご案内いたします。<br>梱包資材や伝票が届いたら、お品物を入れて送るだけ！<br>できるだけ商品が傷つかないよう、丁寧に梱包していただけますようお願い申し上げます。
                                 </p>
                                 <div class="p-flow-item__foot">
                                    <div class="p-flow-item__footBox">
                                       <p class="p-flow-item__footBoxTitle">発送先住所</p>
                                       <span class="p-flow-item__slash u-only__pc" aria-hidden="true">/</span>
                                       <address class="p-flow-item__footAddress">〒150-0042 東京都渋谷区宇田川町26-3
                                          サンルイビル 1 階「東京ぶらんど produce by ALAMODE」</address>
                                    </div>
                                    <!-- /.p-flow-item__footBox -->
                                 </div>
                                 <!-- /.p-flow-item__foot -->
                              </div>
                              <!-- /.p-flow-item__body -->
                           </div>
                           <!-- /.p-flow-item -->
                        </li>
                        <li class="p-flow-store__item">
                           <div class="p-flow-item -delivery">
                              <div class="p-flow-item__head">
                                 <p class="p-flow-item__step">step</p>
                                 <p class="p-flow-item__number">03</p>
                              </div>
                              <!-- /.p-flow-item__head -->
                              <div class="p-flow-item__body">
                                 <p class="p-flow-item__title">査定結果のご連絡 & お振込</p>
                                 <p class="p-flow-item__text">ご発送いただいた商品をしっかり査定させていただいた後、LINE
                                    にて買取金額をご連絡させていただきます。<br>内容に同意いただけましたら、弊社指定のご本人確認作業後に、ご指定の口座に買取額をお振込みさせていただきます。</p>
                                 <div class="p-flow-item__foot">
                                    <ul class="p-flow-item__footLinks">
                                       <li class="p-flow-item__footLinkItem">
                                          <a href="#status" class="p-flow-item__footLink">身分証明書について</a>
                                       </li>
                                    </ul>
                                 </div>
                                 <!-- /.p-flow-item__foot -->
                              </div>
                              <!-- /.p-flow-item__body -->
                           </div>
                           <!-- /.p-flow-item -->
                        </li>
                     </ul>
                  </div>
                  <!-- /.p-flow-store__content -->
               </section>
            </div>
            <!-- /.p-flow__delivery -->
         </div>
         <!-- /.p-flow__content -->
      </div>
      <!-- /.p-flow__inner-->
   </section>
   <!-- /.p-flow -->


   <div class="p-wrapper">
      <div class="p-wrapper__bg"></div>
      <!-- /.p-wrapper__bg -->
      <!-- point   ///////////////////////////////////////////////////// -->
      <section id="point" class="p-point">
         <div class="p-point__inner l-inner -narrow">
            <div class="p-point__heading">
               <div class="c-heading -white">
                  <h2 class="c-heading__title -nowrap">ブランド品<br class="u-only__sp">高価買取のポイント</h2>
                  <p class="c-heading__en">Point</p>
               </div>
               <!-- /.c-heading -->
            </div>
            <!-- /.p-point__heading -->
            <div class="p-point__content">
               <p class="p-point__pop"><span class="p-point__popText">査定額アップの<br class="u-only__sp">3つのコツ</span></p>
               <ul class="p-point__list">
                  <li class="p-point__item">
                     <div class="p-point__textArea">
                        <h3 class="p-point__title">売り時を逃さない</h3>
                        <p class="p-point__text">需要が高い時期や流行のモデルが出た直後は相場が高い傾向があります。相場情報を確認し、タイミング良く売却しましょう。</p>
                     </div>
                     <!-- /.p-point__textArea -->
                     <div class="p-point__imageArea">
                        <figure class="p-point__image">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-point_001.webp')); ?>'
                              alt='' width='350' height='217' loading='lazy'>
                        </figure>
                        <!-- /.p-point__image -->
                     </div>
                     <!-- /.p-point__imageArea -->
                  </li>
                  <li class="p-point__item">
                     <div class="p-point__textArea">
                        <h3 class="p-point__title">付属品と複数持込が鍵</h3>
                        <p class="p-point__text">保証書や箱、ストラップなどの付属品を揃え、複数点まとめて査定に出すと高価買取になります。</p>
                     </div>
                     <!-- /.p-point__textArea -->
                     <div class="p-point__imageArea">
                        <figure class="p-point__image">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-point_002.webp')); ?>'
                              alt='' width='350' height='217' loading='lazy'>
                        </figure>
                        <!-- /.p-point__image -->
                     </div>
                     <!-- /.p-point__imageArea -->
                  </li>
                  <li class="p-point__item">
                     <div class="p-point__textArea">
                        <h3 class="p-point__title">お品物の状態を整える</h3>
                        <p class="p-point__text">
                           お持ち込み前に簡単なお手入れをしていただくことで、より良い査定結果につながる場合があります。汚れや傷があっても問題ございませんが、可能な範囲で整えていただくことをおすすめしております。
                        </p>
                     </div>
                     <!-- /.p-point__textArea -->
                     <div class="p-point__imageArea">
                        <figure class="p-point__image">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-point_003.webp')); ?>'
                              alt='' width='350' height='217' loading='lazy'>
                        </figure>
                        <!-- /.p-point__image -->
                     </div>
                     <!-- /.p-point__imageArea -->
                  </li>
               </ul>
            </div>
            <!-- /.p-point__content -->
         </div>
         <!-- /.p-point__inner-->
      </section>
      <!-- /.p-point -->


      <!-- reviews   ///////////////////////////////////////////////////// -->
      <section class="p-reviews">
         <div class="p-reviews__inner l-inner">
            <div class="p-reviews__heading">
               <div class="c-heading -white">
                  <h2 class="c-heading__title">お客様の声</h2>
                  <p class="c-heading__en">Reviews</p>
               </div>
               <!-- /.c-heading -->
               <p class="p-reviews__lead">実際にサービスをご利用いただいたお客様から寄せられた、お喜びの声をご紹介します。</p>
            </div>
            <!-- /.p-reviews__heading -->
            <div class="p-reviews__content">
               <div class="p-reviews__swiper-container">
                  <div class="swiper p-reviews__swiper">
                     <div class="swiper-wrapper p-reviews__swiper-wrapper">
                        <?php for ($reviews_loop = 0; $reviews_loop < 3; $reviews_loop++): ?>
                           <div class="swiper-slide p-reviews__swiper-slide">
                              <div class="p-reviews__item">
                                 <div class="p-reviews__textArea">
                                    <p class="p-reviews__catch">「LINEで気軽に相談できたのが良かったです」</p>
                                    <ul class="p-reviews__profileList">
                                       <li class="p-reviews__profileItem">40代男性</li>
                                       <li class="p-reviews__profileItem">高級腕時計</li>
                                       <li class="p-reviews__profileItem">LINE査定 → 店頭買取</li>
                                    </ul>
                                    <p class="p-reviews__comment">
                                       売るかどうか迷っていた時計があり、まずはLINEで相談してみました。<br>写真を送ると丁寧に返信してくださり、相場や査定ポイントも教えていただけました。無理に来店を勧められることもなく、安心して相談できました。最終的に店舗で査定してもらい、納得して売却することができました。
                                    </p>
                                 </div>
                                 <!-- /.p-reviews__textArea -->
                                 <div class="p-reviews__imageArea">
                                    <figure class="p-reviews__image">
                                       <img
                                          src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-reviews_001.webp')); ?>'
                                          alt='' width='147' height='147' loading='lazy'>
                                    </figure>
                                    <!-- /.p-reviews__image -->
                                 </div>
                                 <!-- /.p-reviews__imageArea -->
                              </div>
                              <!-- /.p-reviews__item -->
                           </div>
                           <!-- /.p-reviews__swiper-slide -->
                           <div class="swiper-slide p-reviews__swiper-slide">
                              <div class="p-reviews__item">
                                 <div class="p-reviews__textArea">
                                    <p class="p-reviews__catch">「写真を送るだけで査定できて便利でした」</p>
                                    <ul class="p-reviews__profileList">
                                       <li class="p-reviews__profileItem">30代女性</li>
                                       <li class="p-reviews__profileItem">ブランドバッグ</li>
                                       <li class="p-reviews__profileItem">LINE査定 → 宅配買取</li>
                                    </ul>
                                    <p class="p-reviews__comment">
                                       自宅にいながら査定できると知り、LINE査定を利用しました。<br>バッグの写真と簡単な情報を送るだけで、すぐに査定額の目安を教えていただけました。おおよその金額が事前に分かったので安心して宅配買取をお願いでき、実際の査定額もほぼ同じでした。忙しい方でも利用しやすいサービスだと思います。
                                    </p>
                                 </div>
                                 <!-- /.p-reviews__textArea -->
                                 <div class="p-reviews__imageArea">
                                    <figure class="p-reviews__image">
                                       <img
                                          src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-reviews_002.webp')); ?>'
                                          alt='' width='147' height='147' loading='lazy'>
                                    </figure>
                                    <!-- /.p-reviews__image -->
                                 </div>
                                 <!-- /.p-reviews__imageArea -->
                              </div>
                              <!-- /.p-reviews__item -->
                           </div>
                           <!-- /.p-reviews__swiper-slide -->
                           <div class="swiper-slide p-reviews__swiper-slide">
                              <div class="p-reviews__item">
                                 <div class="p-reviews__textArea">
                                    <p class="p-reviews__catch">「古いモデルでもきちんと査定してもらえました」</p>
                                    <ul class="p-reviews__profileList">
                                       <li class="p-reviews__profileItem">50代男性</li>
                                       <li class="p-reviews__profileItem">高級腕時計</li>
                                       <li class="p-reviews__profileItem">店頭買取</li>
                                    </ul>
                                    <p class="p-reviews__comment">
                                       10年以上前に購入した時計だったので値段がつくか不安でしたが、状態やモデルの人気などをしっかり確認して査定していただけました。古い品でも丁寧に見てもらえるお店だと感じました。
                                    </p>
                                 </div>
                                 <!-- /.p-reviews__textArea -->
                                 <div class="p-reviews__imageArea">
                                    <figure class="p-reviews__image">
                                       <img
                                          src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-reviews_003.webp')); ?>'
                                          alt='' width='147' height='147' loading='lazy'>
                                    </figure>
                                    <!-- /.p-reviews__image -->
                                 </div>
                                 <!-- /.p-reviews__imageArea -->
                              </div>
                              <!-- /.p-reviews__item -->
                           </div>
                           <!-- /.p-reviews__swiper-slide -->
                           <div class="swiper-slide p-reviews__swiper-slide">
                              <div class="p-reviews__item">
                                 <div class="p-reviews__textArea">
                                    <p class="p-reviews__catch">「宅配買取でも安心して利用できました」</p>
                                    <ul class="p-reviews__profileList">
                                       <li class="p-reviews__profileItem">40代女性</li>
                                       <li class="p-reviews__profileItem">ブランドバッグ・ジュエリー</li>
                                       <li class="p-reviews__profileItem">宅配買取</li>
                                    </ul>
                                    <p class="p-reviews__comment">
                                       店舗まで行く時間が取れなかったため宅配買取を利用しました。<br>申し込み後すぐにキットが届き、手順も分かりやすかったのでスムーズに発送できました。査定結果の説明も丁寧で、金額に納得して売却することができました。
                                    </p>
                                 </div>
                                 <!-- /.p-reviews__textArea -->
                                 <div class="p-reviews__imageArea">
                                    <figure class="p-reviews__image">
                                       <img
                                          src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-reviews_004.webp')); ?>'
                                          alt='' width='147' height='147' loading='lazy'>
                                    </figure>
                                    <!-- /.p-reviews__image -->
                                 </div>
                                 <!-- /.p-reviews__imageArea -->
                              </div>
                              <!-- /.p-reviews__item -->
                           </div>
                           <!-- /.p-reviews__swiper-slide -->
                           <div class="swiper-slide p-reviews__swiper-slide">
                              <div class="p-reviews__item">
                                 <div class="p-reviews__textArea">
                                    <p class="p-reviews__catch">「査定理由を丁寧に説明してくれて安心でした」</p>
                                    <ul class="p-reviews__profileList">
                                       <li class="p-reviews__profileItem">30代女性</li>
                                       <li class="p-reviews__profileItem">ブランドバッグ・ジュエリー</li>
                                       <li class="p-reviews__profileItem">店頭買取</li>
                                    </ul>
                                    <p class="p-reviews__comment">
                                       以前利用した買取店では査定額だけを提示されることが多かったのですが、こちらでは状態や人気モデルかどうかなど、査定のポイントを一つひとつ説明していただけました。価格の理由が分かると納得感があり、安心して売却できました。
                                    </p>
                                 </div>
                                 <!-- /.p-reviews__textArea -->
                                 <div class="p-reviews__imageArea">
                                    <figure class="p-reviews__image">
                                       <img
                                          src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-reviews_005.webp')); ?>'
                                          alt='' width='147' height='147' loading='lazy'>
                                    </figure>
                                    <!-- /.p-reviews__image -->
                                 </div>
                                 <!-- /.p-reviews__imageArea -->
                              </div>
                              <!-- /.p-reviews__item -->
                           </div>
                           <!-- /.p-reviews__swiper-slide -->
                           <div class="swiper-slide p-reviews__swiper-slide">
                              <div class="p-reviews__item">
                                 <div class="p-reviews__textArea">
                                    <p class="p-reviews__catch">「無理に売却を勧められないので安心でした」</p>
                                    <ul class="p-reviews__profileList">
                                       <li class="p-reviews__profileItem">50代女性</li>
                                       <li class="p-reviews__profileItem">ダイヤモンドジュエリー</li>
                                       <li class="p-reviews__profileItem">店頭買取</li>
                                    </ul>
                                    <p class="p-reviews__comment">
                                       母から譲り受けたジュエリーを査定してもらいました。<br>思い入れがある品だったので売るか迷っていましたが、「一度持ち帰って検討しても大丈夫ですよ」と言っていただけて安心しました。お店の雰囲気も落ち着いていて、気軽に相談できるところが良かったです。
                                    </p>
                                 </div>
                                 <!-- /.p-reviews__textArea -->
                                 <div class="p-reviews__imageArea">
                                    <figure class="p-reviews__image">
                                       <img
                                          src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-reviews_006.webp')); ?>'
                                          alt='' width='147' height='147' loading='lazy'>
                                    </figure>
                                    <!-- /.p-reviews__image -->
                                 </div>
                                 <!-- /.p-reviews__imageArea -->
                              </div>
                              <!-- /.p-reviews__item -->
                           </div>
                           <!-- /.p-reviews__swiper-slide -->
                        <?php endfor; ?>
                     </div>
                     <!-- /.p-reviews__swiper-wrapper -->
                  </div>
                  <!-- /.p-reviews__swiper -->
                  <button class="swiper-button-prev p-reviews__swiper-button-prev"></button>
                  <button class="swiper-button-next p-reviews__swiper-button-next"></button>
               </div>
               <!-- /.p-reviews__swiper-container -->
            </div>
            <!-- /.p-reviews__content -->
         </div>
         <!-- /.p-reviews__inner-->
      </section>
      <!-- /.p-reviews -->
   </div>
   <!-- /.p-wrapper -->


   <!-- cta   ///////////////////////////////////////////////////// -->
   <?php get_template_part('template-parts/cta'); ?>


   <!-- faq   ///////////////////////////////////////////////////// -->
   <section id="faq" class="p-faq">
      <div class="p-faq__inner l-inner -narrow">
         <div class="p-faq__heading">
            <div class="c-heading">
               <h2 class="c-heading__title">よくある質問</h2>
               <p class="c-heading__en">FAQ</p>
            </div>
            <!-- /.c-heading -->
            <p class="p-faq__lead">お客様から特によくいただくご質問とその回答をまとめました。<br>お問合せの前に、ぜひ一度ご確認ください。</p>
         </div>
         <!-- /.p-faq__heading -->
         <div class="p-faq__content">
            <ul class="p-faq__list">
               <li class="p-faq__item">
                  <details class="p-qa-box js_details is_opened" open>
                     <summary class="p-qa-box__summary js_summary">
                        <span class="p-qa-box__q">
                           <span class="p-qa-box__q-text">査定は無料ですか？</span>
                        </span>
                     </summary>
                     <div class="p-qa-box__content js_content">
                        <span class="p-qa-box__a">
                           <span class="p-qa-box__a-text">はい、査定は無料で行っております。査定後に必ず売却いただく必要はありませんので、お気軽にご相談ください。</span>
                        </span>
                     </div>
                  </details>
               </li>
               <li class="p-faq__item">
                  <details class="p-qa-box js_details">
                     <summary class="p-qa-box__summary js_summary">
                        <span class="p-qa-box__q">
                           <span class="p-qa-box__q-text">査定だけの利用でも大丈夫ですか？</span>
                        </span>
                     </summary>
                     <div class="p-qa-box__content js_content">
                        <span class="p-qa-box__a">
                           <span class="p-qa-box__a-text">もちろん可能です。査定額を確認したうえで、売却するかどうかをご検討いただけます。</span>
                        </span>
                     </div>
                  </details>
               </li>
               <li class="p-faq__item">
                  <details class="p-qa-box js_details">
                     <summary class="p-qa-box__summary js_summary">
                        <span class="p-qa-box__q">
                           <span class="p-qa-box__q-text">キズや汚れがある商品でも買取できますか？</span>
                        </span>
                     </summary>
                     <div class="p-qa-box__content js_content">
                        <span class="p-qa-box__a">
                           <span
                              class="p-qa-box__a-text">状態により査定額は変わりますが、キズや使用感のある商品でも買取可能な場合があります。まずはお気軽にご相談ください。</span>
                        </span>
                     </div>
                  </details>
               </li>
               <li class="p-faq__item">
                  <details class="p-qa-box js_details">
                     <summary class="p-qa-box__summary js_summary">
                        <span class="p-qa-box__q">
                           <span class="p-qa-box__q-text">箱や保証書などの付属品がなくても買取できますか？</span>
                        </span>
                     </summary>
                     <div class="p-qa-box__content js_content">
                        <span class="p-qa-box__a">
                           <span class="p-qa-box__a-text">付属品がない場合でも買取可能です。ただし、箱や保証書などが揃っている場合は査定額が上がることがあります。</span>
                        </span>
                     </div>
                  </details>
               </li>
               <li class="p-faq__item">
                  <details class="p-qa-box js_details">
                     <summary class="p-qa-box__summary js_summary">
                        <span class="p-qa-box__q">
                           <span class="p-qa-box__q-text">査定にはどれくらい時間がかかりますか？</span>
                        </span>
                     </summary>
                     <div class="p-qa-box__content js_content">
                        <span class="p-qa-box__a">
                           <span class="p-qa-box__a-text">商品点数にもよりますが、通常は数分から30分程度で査定結果をご案内しています。</span>
                        </span>
                     </div>
                  </details>
               </li>
               <li class="p-faq__item">
                  <details class="p-qa-box js_details">
                     <summary class="p-qa-box__summary js_summary">
                        <span class="p-qa-box__q">
                           <span class="p-qa-box__q-text">買取金額はどのように決まりますか？</span>
                        </span>
                     </summary>
                     <div class="p-qa-box__content js_content">
                        <span class="p-qa-box__a">
                           <span class="p-qa-box__a-text">ブランド、商品の状態、市場相場、人気度などを総合的に判断し、専門スタッフが適正価格を算出しています。</span>
                        </span>
                     </div>
                  </details>
               </li>
               <li class="p-faq__item">
                  <details class="p-qa-box js_details">
                     <summary class="p-qa-box__summary js_summary">
                        <span class="p-qa-box__q">
                           <span class="p-qa-box__q-text">その場で現金で受け取れますか？</span>
                        </span>
                     </summary>
                     <div class="p-qa-box__content js_content">
                        <span class="p-qa-box__a">
                           <span class="p-qa-box__a-text">査定金額にご納得いただけましたら、その場で現金にてお支払い可能です。</span>
                        </span>
                     </div>
                  </details>
               </li>
            </ul>
         </div>
         <!-- /.p-faq__content -->
      </div>
      <!-- /.p-faq__inner-->
   </section>
   <!-- /.p-faq -->


   <!-- stores   ///////////////////////////////////////////////////// -->
   <section id="stores" class="p-stores">
      <div class="p-stores__inner l-inner">
         <div class="p-stores__heading">
            <div class="c-heading">
               <h2 class="c-heading__title">店舗紹介</h2>
               <p class="c-heading__en">Stores</p>
            </div>
            <!-- /.c-heading -->
         </div>
         <!-- /.p-stores__heading -->
         <div class="p-stores__content">
            <div class="p-shops js_shops">
               <div class="p-shops__inner">
                  <div class="p-shops__tabs" role="tablist">
                     <button class="p-shops__tab -tall js_shopsTab is_show" role="tab" id="store-tab1"
                        aria-controls="store-panel1" aria-selected="true" tabindex="-1">東京ぶらんど <br
                           class="u-only__sp">produce by <br class="u-only__sp">ALAMODE<br>渋谷本店</button>
                     <button class="p-shops__tab -tall js_shopsTab" role="tab" id="store-tab2"
                        aria-controls="store-panel2" aria-selected="false">ORANGE <br
                           class="u-only__sp">BOUTIQUE<br>渋谷店</button>
                     <button class="p-shops__tab -tall js_shopsTab" role="tab" id="store-tab3"
                        aria-controls="store-panel3" aria-selected="false">東京ぶらんど <br class="u-only__sp">produce by <br
                           class="u-only__sp">ALAMODE<br>渋谷109店</button>
                  </div>
                  <!-- /.p-shops__tabs -->
                  <div class="p-shops__panels">
                     <section class="p-shops__panel js_shopsPanel is_show" role="tabpanel" id="store-panel1"
                        aria-labelledby="store-tab1">
                        <div class="p-shops__content -start">
                           <div class="p-shops__textArea">
                              <h3 class="p-shops__name">東京ぶらんど <br>Produce by ALAMODE <br class="u-only__sp">渋谷本店</h3>
                              <ul class="p-shops__accessList">
                                 <li class="p-shops__accessItem">東急東横線 渋谷駅A2出口より徒歩2分</li>
                                 <li class="p-shops__accessItem">JR山手線 渋谷駅 ハチ公口より徒歩3分</li>
                              </ul>
                              <div class="p-shops__accessBody">
                                 <dl class="p-shops__accessFootList">
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">住　　所</dt>
                                       <dd class="p-shops__accessGroupData">〒150-0042<br
                                             class="u-only__sp">東京都渋谷区宇田川町26-3<br class="u-only__sp">サンルイビル1階</dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">電話番号</dt>
                                       <dd class="p-shops__accessGroupData"><a href="tel:0359904745"
                                             class="p-shops__accessGroupTel u-pointerNone__sp">03-5990-4745</a></dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">アクセス</dt>
                                       <dd class="p-shops__accessGroupData">
                                          <ul class="p-shops__accessGroupList">
                                             <li class="p-shops__accessGroupItem">東急東横線 渋谷駅A2出口より徒歩2分</li>
                                             <li class="p-shops__accessGroupItem">JR山手線 渋谷駅 ハチ公口より徒歩3分</li>
                                          </ul>
                                       </dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">営業時間</dt>
                                       <dd class="p-shops__accessGroupData">
                                          <?php echo esc_html(get_field('hours_main')); ?>
                                       </dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">定 休 日</dt>
                                       <dd class="p-shops__accessGroupData">年中無休（年末年始を除く）</dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                 </dl>
                                 <ul class="p-shops__snsList">
                                    <li class="p-shops__snsItem">
                                       <a href="<?php echo esc_url('https://lin.ee/TtR8jHd'); ?>"
                                          class="p-shops__snsLink -line" aria-label="LINEで無料査定する" target="_blank"
                                          rel="nofollow noopener"></a>
                                    </li>
                                    <li class="p-shops__snsItem">
                                       <a href="#contact" class="p-shops__snsLink -mail" aria-label="メールで問い合わせる"></a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.p-shops__accessBody -->
                           </div>
                           <!-- /.p-shops__textArea -->
                           <div class="p-shops__imageArea">
                              <?php
                              $shop_gallery_images = [
                                 'p-shops_gallery-001-1.webp',
                                 'p-shops_gallery-001-2.webp',
                                 'p-shops_gallery-001-3.webp',
                                 'p-shops_gallery-001-4.webp',
                                 'p-shops_gallery-001-5.webp',
                              ];
                              $gallery_count = count($shop_gallery_images);

                              $gallery_loop_items = [];
                              for ($repeat = 0; $repeat < 3; $repeat++) {
                                 $gallery_loop_items = array_merge($gallery_loop_items, $shop_gallery_images);
                              }
                              ?>

                              <div class="p-shops__swiper-container"
                                 data-gallery-count="<?php echo esc_attr($gallery_count); ?>">

                                 <!-- ▼ メイン（3周分に変更） -->
                                 <div class="swiper p-shops__main-swiper">
                                    <div class="swiper-wrapper">
                                       <?php foreach ($gallery_loop_items as $image): ?>
                                          <?php [$gallery_width, $gallery_height] = my_get_image_display_size($image); ?>
                                          <div class="swiper-slide p-shops__main-slide">
                                             <figure class="p-shops__mainImage">
                                                <img
                                                   src="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/' . $image)); ?>"
                                                   alt="" width="<?php echo esc_attr($gallery_width); ?>"
                                                   height="<?php echo esc_attr($gallery_height); ?>">
                                             </figure>
                                          </div>
                                       <?php endforeach; ?>
                                    </div>

                                    <button class="swiper-button-prev p-shops__swiper-button-prev"></button>
                                    <button class="swiper-button-next p-shops__swiper-button-next"></button>
                                 </div>

                                 <!-- ▼ サムネ（こちらは元のまま3周分） -->
                                 <div class="swiper p-shops__swiper">
                                    <div class="swiper-wrapper p-shops__swiper-wrapper">
                                       <?php foreach ($gallery_loop_items as $image): ?>
                                          <?php [$gallery_width, $gallery_height] = my_get_image_display_size($image); ?>
                                          <div class="swiper-slide p-shops__swiper-slide">
                                             <figure class="p-shops__slideImage">
                                                <img
                                                   src="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/' . $image)); ?>"
                                                   alt="" width="<?php echo esc_attr($gallery_width); ?>"
                                                   height="<?php echo esc_attr($gallery_height); ?>" loading="lazy">
                                             </figure>
                                          </div>
                                       <?php endforeach; ?>
                                    </div>
                                    <!-- /.p-shops__swiper-wrapper -->
                                 </div>
                                 <!-- /.p-shops__swiper -->
                              </div>
                              <!-- /.p-shops__swiper-container -->
                           </div>
                           <!-- /.p-shops__imageArea -->
                           <div class="p-shops__map">
                              <iframe
                                 src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d207601.42939836302!2d139.5628184!3d35.6086821!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d5cbb320c3b%3A0x1dae6547623bae28!2z5p2x5Lqs44G244KJ44KT44GpIFByb2R1Y2UgYnkgQUxBTU9ERSDmuIvosLfmnKzlupc!5e0!3m2!1sja!2sjp!4v1781245689604!5m2!1sja!2sjp"
                                 style="border:0;" allowfullscreen="" loading="lazy"
                                 referrerpolicy="no-referrer-when-downgrade"
                                 title="東京ぶらんど Produce by ALAMODE 渋谷本店のGoogleマップ">
                              </iframe>
                           </div>
                           <!-- /.p-shops__map -->
                        </div>
                        <!-- /.p-shops__content -->
                     </section>
                     <section class="p-shops__panel js_shopsPanel" role="tabpanel" id="store-panel2"
                        aria-labelledby="store-tab2">
                        <div class="p-shops__content -start">
                           <div class="p-shops__textArea">
                              <h3 class="p-shops__name">ORANGE BOUTIQUE <br class="u-only__sp">渋谷店</h3>
                              <ul class="p-shops__accessList">
                                 <li class="p-shops__accessItem">東急東横線 渋谷駅A2出口より徒歩2分</li>
                                 <li class="p-shops__accessItem">JR山手線 渋谷駅 ハチ公口より徒歩3分</li>
                              </ul>
                              <div class="p-shops__accessBody">
                                 <dl class="p-shops__accessFootList">
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">住　　所</dt>
                                       <dd class="p-shops__accessGroupData">〒150-0042<br
                                             class="u-only__sp">東京都渋谷区宇田川町26-3<br class="u-only__sp">サンルイビル1階</dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">電話番号</dt>
                                       <dd class="p-shops__accessGroupData"><a href="tel:0359904745"
                                             class="p-shops__accessGroupTel u-pointerNone__sp">03-5990-4745</a></dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">アクセス</dt>
                                       <dd class="p-shops__accessGroupData">
                                          <ul class="p-shops__accessGroupList">
                                             <li class="p-shops__accessGroupItem">東急東横線 渋谷駅A2出口より徒歩2分</li>
                                             <li class="p-shops__accessGroupItem">JR山手線 渋谷駅 ハチ公口より徒歩3分</li>
                                          </ul>
                                       </dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">営業時間</dt>
                                       <dd class="p-shops__accessGroupData">
                                          <?php echo esc_html(get_field('hours_main')); ?>
                                       </dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">定 休 日</dt>
                                       <dd class="p-shops__accessGroupData">年中無休（年末年始を除く）</dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                 </dl>
                                 <ul class="p-shops__snsList">
                                    <li class="p-shops__snsItem">
                                       <a href="<?php echo esc_url('https://lin.ee/TtR8jHd'); ?>"
                                          class="p-shops__snsLink -line" aria-label="LINEで無料査定する" target="_blank"
                                          rel="nofollow noopener"></a>
                                    </li>
                                    <li class="p-shops__snsItem">
                                       <a href="#contact" class="p-shops__snsLink -mail" aria-label="メールで問い合わせる"></a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.p-shops__accessBody -->
                           </div>
                           <!-- /.p-shops__textArea -->
                           <div class="p-shops__imageArea">
                              <?php
                              $shop_gallery_images = [
                                 'p-shops_gallery-002-1.webp',
                                 'p-shops_gallery-002-2.webp',
                                 'p-shops_gallery-002-3.webp',
                                 'p-shops_gallery-002-4.webp',
                                 'p-shops_gallery-002-5.webp',
                              ];
                              $gallery_count = count($shop_gallery_images);

                              $gallery_loop_items = [];
                              for ($repeat = 0; $repeat < 3; $repeat++) {
                                 $gallery_loop_items = array_merge($gallery_loop_items, $shop_gallery_images);
                              }
                              ?>

                              <div class="p-shops__swiper-container"
                                 data-gallery-count="<?php echo esc_attr($gallery_count); ?>">

                                 <!-- ▼ メイン（3周分に変更） -->
                                 <div class="swiper p-shops__main-swiper">
                                    <div class="swiper-wrapper">
                                       <?php foreach ($gallery_loop_items as $image): ?>
                                          <?php [$gallery_width, $gallery_height] = my_get_image_display_size($image); ?>
                                          <div class="swiper-slide p-shops__main-slide">
                                             <figure class="p-shops__mainImage">
                                                <img
                                                   src="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/' . $image)); ?>"
                                                   alt="" width="<?php echo esc_attr($gallery_width); ?>"
                                                   height="<?php echo esc_attr($gallery_height); ?>">
                                             </figure>
                                          </div>
                                       <?php endforeach; ?>
                                    </div>

                                    <button class="swiper-button-prev p-shops__swiper-button-prev"></button>
                                    <button class="swiper-button-next p-shops__swiper-button-next"></button>
                                 </div>

                                 <!-- ▼ サムネ（こちらは元のまま3周分） -->
                                 <div class="swiper p-shops__swiper">
                                    <div class="swiper-wrapper p-shops__swiper-wrapper">
                                       <?php foreach ($gallery_loop_items as $image): ?>
                                          <?php [$gallery_width, $gallery_height] = my_get_image_display_size($image); ?>
                                          <div class="swiper-slide p-shops__swiper-slide">
                                             <figure class="p-shops__slideImage">
                                                <img
                                                   src="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/' . $image)); ?>"
                                                   alt="" width="<?php echo esc_attr($gallery_width); ?>"
                                                   height="<?php echo esc_attr($gallery_height); ?>" loading="lazy">
                                             </figure>
                                          </div>
                                       <?php endforeach; ?>
                                    </div>
                                    <!-- /.p-shops__swiper-wrapper -->
                                 </div>
                                 <!-- /.p-shops__swiper -->
                              </div>
                              <!-- /.p-shops__swiper-container -->
                           </div>
                           <!-- /.p-shops__imageArea -->
                           <div class="p-shops__map">
                              <iframe
                                 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.694448992338!2d139.6965467762908!3d35.659899031144604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188dc8dcbdbebd%3A0x698742beaeb31b76!2zT1JBTkdFIEJPVVRJUVVFIOa4i-iwtw!5e0!3m2!1sja!2sjp!4v1781245831373!5m2!1sja!2sjp"
                                 style="border:0;" allowfullscreen="" loading="lazy"
                                 referrerpolicy="no-referrer-when-downgrade"
                                 title="ORANGE BOUTIQUE 渋谷店のGoogleマップ"></iframe>
                           </div>
                           <!-- /.p-shops__map -->
                        </div>
                        <!-- /.p-shops__content -->
                     </section>
                     <section class="p-shops__panel js_shopsPanel" role="tabpanel" id="store-panel3"
                        aria-labelledby="store-tab3">
                        <div class="p-shops__content -start">
                           <div class="p-shops__textArea">
                              <h3 class="p-shops__name">東京ぶらんど <br>Produce by ALAMODE <br class="u-only__sp">渋谷109店</h3>
                              <ul class="p-shops__accessList">
                                 <li class="p-shops__accessItem">東急東横線 渋谷駅A2出口より徒歩2分</li>
                                 <li class="p-shops__accessItem">JR山手線 渋谷駅 ハチ公口より徒歩3分</li>
                              </ul>
                              <div class="p-shops__accessBody">
                                 <dl class="p-shops__accessFootList">
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">住　　所</dt>
                                       <dd class="p-shops__accessGroupData">〒150-0043<br
                                             class="u-only__sp">東京都渋谷区道玄坂2丁目30-4<br class="u-only__sp">玉久ビル 1F</dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">電話番号</dt>
                                       <dd class="p-shops__accessGroupData"><a href="tel:0367127331"
                                             class="p-shops__accessGroupTel u-pointerNone__sp">03-6712-7331</a></dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">アクセス</dt>
                                       <dd class="p-shops__accessGroupData">
                                          <ul class="p-shops__accessGroupList">
                                             <li class="p-shops__accessGroupItem">東急東横線 渋谷駅A2出口より徒歩2分</li>
                                             <li class="p-shops__accessGroupItem">JR山手線 渋谷駅 ハチ公口より徒歩3分</li>
                                          </ul>
                                       </dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">営業時間</dt>
                                       <dd class="p-shops__accessGroupData">
                                          <?php echo esc_html(get_field('hours_109')); ?>
                                       </dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                    <div class="p-shops__accessGroup">
                                       <dt class="p-shops__accessGroupTerm">定 休 日</dt>
                                       <dd class="p-shops__accessGroupData">年中無休（年末年始を除く）</dd>
                                    </div>
                                    <!-- /.p-shops__accessGroup -->
                                 </dl>
                                 <ul class="p-shops__snsList">
                                    <li class="p-shops__snsItem">
                                       <a href="<?php echo esc_url('https://lin.ee/TtR8jHd'); ?>"
                                          class="p-shops__snsLink -line" aria-label="LINEで無料査定する" target="_blank"
                                          rel="nofollow noopener"></a>
                                    </li>
                                    <li class="p-shops__snsItem">
                                       <a href="#contact" class="p-shops__snsLink -mail" aria-label="メールで問い合わせる"></a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.p-shops__accessBody -->
                           </div>
                           <!-- /.p-shops__textArea -->
                           <div class="p-shops__imageArea">
                              <?php
                              $shop_gallery_images = [
                                 'p-shops_gallery-003-1.webp',
                                 'p-shops_gallery-003-2.webp',
                                 'p-shops_gallery-003-3.webp',
                                 'p-shops_gallery-003-4.webp',
                                 'p-shops_gallery-003-5.webp',
                              ];
                              $gallery_count = count($shop_gallery_images);

                              $gallery_loop_items = [];
                              for ($repeat = 0; $repeat < 3; $repeat++) {
                                 $gallery_loop_items = array_merge($gallery_loop_items, $shop_gallery_images);
                              }
                              ?>

                              <div class="p-shops__swiper-container"
                                 data-gallery-count="<?php echo esc_attr($gallery_count); ?>">

                                 <!-- ▼ メイン（3周分に変更） -->
                                 <div class="swiper p-shops__main-swiper">
                                    <div class="swiper-wrapper">
                                       <?php foreach ($gallery_loop_items as $image): ?>
                                          <?php [$gallery_width, $gallery_height] = my_get_image_display_size($image); ?>
                                          <div class="swiper-slide p-shops__main-slide">
                                             <figure class="p-shops__mainImage">
                                                <img
                                                   src="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/' . $image)); ?>"
                                                   alt="" width="<?php echo esc_attr($gallery_width); ?>"
                                                   height="<?php echo esc_attr($gallery_height); ?>">
                                             </figure>
                                          </div>
                                       <?php endforeach; ?>
                                    </div>

                                    <button class="swiper-button-prev p-shops__swiper-button-prev"></button>
                                    <button class="swiper-button-next p-shops__swiper-button-next"></button>
                                 </div>

                                 <!-- ▼ サムネ（こちらは元のまま3周分） -->
                                 <div class="swiper p-shops__swiper">
                                    <div class="swiper-wrapper p-shops__swiper-wrapper">
                                       <?php foreach ($gallery_loop_items as $image): ?>
                                          <?php [$gallery_width, $gallery_height] = my_get_image_display_size($image); ?>
                                          <div class="swiper-slide p-shops__swiper-slide">
                                             <figure class="p-shops__slideImage">
                                                <img
                                                   src="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/' . $image)); ?>"
                                                   alt="" width="<?php echo esc_attr($gallery_width); ?>"
                                                   height="<?php echo esc_attr($gallery_height); ?>" loading="lazy">
                                             </figure>
                                          </div>
                                       <?php endforeach; ?>
                                    </div>
                                    <!-- /.p-shops__swiper-wrapper -->
                                 </div>
                                 <!-- /.p-shops__swiper -->
                              </div>
                              <!-- /.p-shops__swiper-container -->
                           </div>
                           <!-- /.p-shops__imageArea -->
                           <div class="p-shops__map">
                              <iframe
                                 src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d207601.42939836302!2d139.5628184!3d35.6086821!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d199c367869%3A0x8de64d8b86faebdb!2z5p2x5Lqs44G244KJ44KT44GpIFByb2R1Y2UgYnkgQUxBTU9ERSDmuIvosLcxMDnlupc!5e0!3m2!1sja!2sjp!4v1781245792661!5m2!1sja!2sjp"
                                 style="border:0;" allowfullscreen="" loading="lazy"
                                 referrerpolicy="no-referrer-when-downgrade"
                                 title="東京ぶらんど Produce by ALAMODE 渋谷109店のGoogleマップ"></iframe>
                           </div>
                           <!-- /.p-shops__map -->
                        </div>
                        <!-- /.p-shops__content -->
                     </section>
                  </div>
                  <!-- /.p-shops__panels -->
               </div>
               <!-- /.p-shops__inner -->
            </div>
            <!-- /.p-shops -->
         </div>
         <!-- /.p-stores__content -->
      </div>
      <!-- /.p-stores__inner-->
   </section>
   <!-- /.p-stores -->


   <!-- contact   ///////////////////////////////////////////////////// -->
   <section id="contact" class="p-contact">
      <div class="p-contact__inner l-inner -narrow">
         <div class="p-contact__heading">
            <div class="c-heading">
               <h2 class="c-heading__title">お問合せ</h2>
               <p class="c-heading__en">Contact</p>
            </div>
            <!-- /.c-heading -->
            <p class="p-contact__lead"> LINE、メール、又はお電話からご利用しやすい方法でお問合せください。</p>
         </div>
         <!-- /.p-contact__heading -->
         <div class="p-contact__content">
            <div class="p-contact__buttonsBox">
               <ul class="p-contact__list">
                  <li class="p-contact__item">
                     <a href="<?php echo esc_url('https://lin.ee/TtR8jHd'); ?>" class="c-button-line" target="_blank"
                        rel="nofollow noopener">
                        <p class="c-button-line__pop">写真を送るだけ！最短当日で査定OK</p>
                        <h3 class="c-button-line__text">LINEで無料査定する</h3>
                     </a>
                  </li>
                  <li class="p-contact__item">
                     <a href="tel:0359904745" class="c-button-tel u-pointerNone__sp -small">
                        <h3 class="c-button-tel__catch">電話で相談する</h3>
                        <p class="c-button-tel__number">03-5990-4745</p>
                        <p class="c-button-tel__time">受付時間 <?php echo esc_html(get_field('hours_main')); ?></p>
                     </a>
                  </li>
               </ul>
            </div>
            <!-- /.p-contact__buttonsBox -->
            <section class="p-contact__main">
               <div class="p-contact__mainTitle">
                  <h3 class="p-contact__mainTitleText">メールでのお問合せ</h3>
               </div>
               <!-- /.p-contact__mainTitle -->
               <div class="p-contact__form">
                  <div class="p-form">
                     <?php echo do_shortcode('[contact-form-7 id="f135169" title="お問い合わせフォーム"]'); ?>
                     <div class="p-form__recaptcha">このサイトはreCAPTCHAによって保護されており、Googleの<a
                           href="https://policies.google.com/privacy" target="_blank"
                           rel="nofollow noopener">プライバシーポリシー</a>と<a href="https://policies.google.com/terms"
                           target="_blank" rel="nofollow noopener">利用規約</a>が適用されます。
                     </div>
                     <!-- /.p-form__recaptcha -->
                  </div>
                  <!-- /.p-form -->
               </div>
               <!-- /.p-contact__form -->
            </section>
         </div>
         <!-- /.p-contact__content -->
      </div>
      <!-- /.p-contact__inner-->
   </section>
   <!-- /.p-contact -->


   <!-- status   ///////////////////////////////////////////////////// -->
   <section id="status" class="p-status">
      <div class="p-status__inner l-inner -narrow">
         <div class="p-status__content">
            <div class="p-status__heading">
               <h2 class="p-status__title">身分証明書について</h2>
            </div>
            <!-- /.p-status__heading -->
            <p class="p-status__description">ご本人様を確認できる、現住所・生年月日記載の身分証明書<br class="u-only__pc">①～⑤のいずれか1つをお持ちください。</p>
            <div class="p-status__body">
               <ul class="p-status__list">
                  <li class="p-status__item">
                     <div class="p-status__textArea">
                        <p class="p-status__text">①運転免許証or<br class="u-only__sp">運転経歴証明書</p>
                     </div>
                     <!-- /.p-status__textArea -->
                     <div class="p-status__imageArea">
                        <figure class="p-status__image">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-status_001.webp')); ?>'
                              alt='' width='284' height='170' loading='lazy'>
                        </figure>
                        <!-- /.p-status__image -->
                     </div>
                     <!-- /.p-status__imageArea -->
                  </li>
                  <li class="p-status__item">
                     <div class="p-status__textArea">
                        <p class="p-status__text -letterSpace">②マイナンバーカード</p>
                     </div>
                     <!-- /.p-status__textArea -->
                     <div class="p-status__imageArea">
                        <figure class="p-status__image">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-status_002.webp')); ?>'
                              alt='' width='284' height='170' loading='lazy'>
                        </figure>
                        <!-- /.p-status__image -->
                     </div>
                     <!-- /.p-status__imageArea -->
                  </li>
                  <li class="p-status__item">
                     <div class="p-status__textArea">
                        <p class="p-status__text -letterSpace">③住民基本台帳カード</p>
                     </div>
                     <!-- /.p-status__textArea -->
                     <div class="p-status__imageArea">
                        <figure class="p-status__image">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-status_003.webp')); ?>'
                              alt='' width='284' height='170' loading='lazy'>
                        </figure>
                        <!-- /.p-status__image -->
                     </div>
                     <!-- /.p-status__imageArea -->
                  </li>
                  <li class="p-status__item">
                     <div class="p-status__textArea">
                        <p class="p-status__text">④健康保険証</p>
                     </div>
                     <!-- /.p-status__textArea -->
                     <div class="p-status__imageArea">
                        <figure class="p-status__image">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-status_004.webp')); ?>'
                              alt='' width='284' height='170' loading='lazy'>
                        </figure>
                        <!-- /.p-status__image -->
                     </div>
                     <!-- /.p-status__imageArea -->
                  </li>
                  <li class="p-status__item">
                     <div class="p-status__textArea">
                        <p class="p-status__text">⑤パスポート</p>
                     </div>
                     <!-- /.p-status__textArea -->
                     <div class="p-status__imageArea">
                        <figure class="p-status__image">
                           <img
                              src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-status_005.webp')); ?>'
                              alt='' width='284' height='170' loading='lazy'>
                        </figure>
                        <!-- /.p-status__image -->
                     </div>
                     <!-- /.p-status__imageArea -->
                  </li>
               </ul>
               <p class="p-status__attention">
                  ※2020年2月4日以降発行のパスポートをお持ちの方<br>本人様名義の現住所が確認できるもので、発行日から3ヶ月以内の公共料金領収書もしくは請求書（電気、水道、ガス、固定電話、未払いでも可能）又は住民票<br>住所変更されていない上記6項目の身分証明書とご一緒にお持ちください。
               </p>
            </div>
            <!-- /.p-status__body -->
            <div class="p-status__foot">
               <ul class="p-status__footList">
                  <li class="p-status__footItem">※店頭買取の際の「身分証明書」は、現住所・生年月日が記載された有効期限内の原本に限ります。</li>
                  <li class="p-status__footItem">
                     ※身分証明書の住所に相違がある場合はご本人様名義の現住所が確認できるもので、発行日から3ヶ月以内の公共料金領収書もしくは請求書（電気、水道、ガス、固定電話、未払いでも可能）または住民票が同時に必要となります。
                  </li>
                  <li class="p-status__footItem">※国際運転免許証は不可となります。また、運転経歴証明書は交付年月日が平成24年4月1日以降のものに限ります。</li>
                  <li class="p-status__footItem">※パスポートは所有人記入欄ページに現住所の記載が必須となります。</li>
                  <li class="p-status__footItem">※在留カードは、令和3年10月1日より消費税法改正に伴い、本人確認書類としてご利用いただけません。</li>
                  <li class="p-status__footItem">※日本への観光・ビジネス等で訪日されている外国籍の方からの買取はお断りしております。</li>
                  <li class="p-status__footItem">※買取のご利用は本人確認書類をご提示いただける20歳以上のお客様に限らせていただいております。</li>
                  <li class="p-status__footItem">
                     ※宅配買取の際にご提示いただく場合は、「被保険者記号」「番号」等をマスキングしてご提出ください。マスキングの際には、「氏名」「事業所名称」「保険者名称」が隠れないようにご注意ください。</li>
               </ul>
            </div>
            <!-- /.p-status__foot -->
         </div>
         <!-- /.p-status__content -->
      </div>
      <!-- /.p-status__inner-->
   </section>
   <!-- /.p-status -->


   <!-- cta   ///////////////////////////////////////////////////// -->
   <?php get_template_part('template-parts/cta'); ?>

</main>


<!-- footer   ///////////////////////////////////////////////////// -->
<?php get_template_part('template-parts/footer'); ?>


<!-- floating   ///////////////////////////////////////////////////// -->
<?php get_template_part('template-parts/floating'); ?>



<?php get_footer(); ?>