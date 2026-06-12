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
   if ($banner_sp_id && $banner_pc_id) :
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

</main>

<?php get_footer(); ?>