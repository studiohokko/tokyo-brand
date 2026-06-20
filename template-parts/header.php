<header id="header" class="l-header">
   <div class="p-header">
      <div class="p-header__inner">
         <div class="p-header__main">
            <div class="p-header__logo">
               <a href="<?php echo esc_url(home_url('/')); ?>" class="p-header__logoLink">
                  <figure class="p-header__logoImage">
                     <img src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/c-logo_b.webp')); ?>'
                        alt='東京ぶらんど ALAMODE' width='259' height='60'>
                  </figure>
                  <!-- /.p-header__logoImage -->
               </a>
               <p class="p-header__logoCatch">東京のブランド買取専門店<br class="u-only__pc">どこよりも高価買取！</p>
            </div>
            <!-- /.p-header__logo -->

            <div class="p-header__right u-only__pc">
               <div class="p-header__rightWrapper">
                  <div class="p-header__telLink">
                     <p class="p-header__telNumber">03-5990-4745</p>
                     <p class="p-header__telTime">受付時間 <?php echo esc_html(get_field('hours_main')); ?></p>
                  </div>
                  <!-- /.p-header__telLink -->
                  <ul class="p-header__buttons">
                     <li class="p-header__button -line">
                        <a href="<?php echo esc_url('https://lin.ee/TtR8jHd'); ?>" class="p-header__buttonLink"
                           target="_blank" rel="nofollow noopener">
                           <p class="p-header__buttonText">LINEで査定する</p>
                        </a>
                     </li>
                     <?php $is_front = is_front_page(); ?>
                     <li class="p-header__button -mail">
                        <a href="<?php echo $is_front ? '#contact' : esc_url(home_url('/#contact')); ?>"
                           class="p-header__buttonLink">
                           <p class="p-header__buttonText">お問合せはこちら</p>
                        </a>
                     </li>
                  </ul>
                  <!-- /.p-header__tel -->
               </div>
               <!-- /.p-header__rightWrapper -->
            </div>
            <!-- /.p-header__right -->

            <div class="p-header__hamburger u-only__sp">
               <button id="js_drawerOpen" class="c-hamburger" type="button" aria-controls="drawer" aria-expanded="false"
                  aria-label="メニューを開く">
                  <span class="c-hamburger__line"></span>
               </button>
            </div>
            <!-- /.p-header__icon -->
         </div>
         <!-- /.p-header__main -->


         <!-- nav ///////////////////////////// -->
         <nav class="p-header__nav u-only__pc">
            <ul class="p-header__list">
               <?php $is_front = is_front_page(); ?>
               <li class="p-header__item"><a href="<?php echo $is_front ? '#items' : esc_url(home_url('/#items')); ?>"
                     class="p-header__link">買取品目</a></li>
               <li class="p-header__item"><a href="<?php echo $is_front ? '#brands' : esc_url(home_url('/#brands')); ?>"
                     class="p-header__link">買取ブランド一覧</a></li>
               <li class="p-header__item"><a
                     href="<?php echo $is_front ? '#reasons' : esc_url(home_url('/#reasons')); ?>"
                     class="p-header__link">高価買取の理由</a></li>
               <li class="p-header__item"><a href="<?php echo $is_front ? '#flow' : esc_url(home_url('/#flow')); ?>"
                     class="p-header__link">買取の流れ</a></li>
               <li class="p-header__item"><a href="<?php echo $is_front ? '#point' : esc_url(home_url('/#point')); ?>"
                     class="p-header__link">高価買取のポイント</a></li>
               <li class="p-header__item"><a href="<?php echo $is_front ? '#select' : esc_url(home_url('/#select')); ?>"
                     class="p-header__link">選ばれる理由</a></li>
               <li class="p-header__item"><a href="<?php echo $is_front ? '#faq' : esc_url(home_url('/#faq')); ?>"
                     class="p-header__link">よくある質問</a></li>
               <li class="p-header__item"><a href="<?php echo $is_front ? '#stores' : esc_url(home_url('/#stores')); ?>"
                     class="p-header__link">店舗紹介</a></li>
            </ul>
         </nav>
      </div>
      <!-- /.p-header__inner -->
   </div>
   <!-- /.p-header -->
</header>

<!-- drawer ///////////////////////////// -->
<div id="drawer" class="p-drawer u-only__sp js_drawer" inert>
   <div class="p-drawer__inner">
      <nav class="p-drawer__nav">
         <ul class="p-drawer__list">
            <?php $is_front = is_front_page(); ?>
            <li class="p-drawer__item"><a href="<?php echo $is_front ? '#items' : esc_url(home_url('/#items')); ?>"
                  class="p-drawer__link">買取品目</a></li>
            <li class="p-drawer__item"><a href="<?php echo $is_front ? '#brands' : esc_url(home_url('/#brands')); ?>"
                  class="p-drawer__link">買取ブランド一覧</a></li>
            <li class="p-drawer__item"><a href="<?php echo $is_front ? '#reasons' : esc_url(home_url('/#reasons')); ?>"
                  class="p-drawer__link">高価買取の理由</a></li>
            <li class="p-drawer__item"><a href="<?php echo $is_front ? '#flow' : esc_url(home_url('/#flow')); ?>"
                  class="p-drawer__link">買取の流れ</a></li>
            <li class="p-drawer__item"><a href="<?php echo $is_front ? '#point' : esc_url(home_url('/#point')); ?>"
                  class="p-drawer__link">高価買取のポイント</a></li>
            <li class="p-drawer__item"><a href="<?php echo $is_front ? '#select' : esc_url(home_url('/#select')); ?>"
                  class="p-drawer__link">選ばれる理由</a></li>
            <li class="p-drawer__item"><a href="<?php echo $is_front ? '#faq' : esc_url(home_url('/#faq')); ?>"
                  class="p-drawer__link">よくある質問</a></li>
            <li class="p-drawer__item"><a href="<?php echo $is_front ? '#stores' : esc_url(home_url('/#stores')); ?>"
                  class="p-drawer__link">店舗紹介</a></li>
         </ul>
      </nav>
      <div class="p-drawer__foot">
         <a href="tel:0359904745" class="p-drawer__telLink">
            <p class="p-drawer__telNumber">03-5990-4745</p>
            <p class="p-drawer__telTime">受付時間 <?php echo esc_html(get_field('hours_main')); ?></p>
         </a>
         <ul class="p-drawer__buttons">
            <li class="p-drawer__button -line">
               <a href="<?php echo esc_url('https://lin.ee/TtR8jHd'); ?>" class="p-drawer__buttonLink" target="_blank"
                  rel="nofollow noopener">
                  <p class="p-drawer__buttonText">LINEで査定する</p>
               </a>
            </li>
            <li class="p-drawer__button -mail">
               <?php $is_front = is_front_page(); ?>
               <a href="<?php echo $is_front ? '#contact' : esc_url(home_url('/#contact')); ?>"
                  class="p-drawer__buttonLink">
                  <p class="p-drawer__buttonText">お問合せはこちら</p>
               </a>
            </li>
         </ul>
         <!-- /.p-drawer__tel -->
      </div>
      <!-- /.p-drawer__foot -->
   </div>
   <!-- /.p-drawer__inner -->
</div>
<!-- /.p-drawer -->