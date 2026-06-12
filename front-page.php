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

</main>

<?php get_footer(); ?>