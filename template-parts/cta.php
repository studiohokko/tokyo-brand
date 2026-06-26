<div class="p-cta">
   <figure class="p-cta__deco">
      <img src='<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-cta_person.webp')); ?>' alt=''
         width='274' height='326' loading='lazy' aria-hidden='true'>
   </figure>
   <div class="p-cta__inner l-inner">
      <div class="p-cta__content">
         <p class="p-cta__pop">写真を送るだけ！<br class="u-only__sp">最短当日で査定OK</p>
         <ul class="p-cta__buttons">
            <li class="p-cta__button">
               <a href="<?php echo esc_url('https://lin.ee/TtR8jHd'); ?>" class="c-button-line -simple" target="_blank" rel="nofollow noopener">
                  <p class="c-button-line__text">LINEで無料査定する</p>
               </a>
            </li>
            <li class="p-cta__button">
               <a href="#contact" class="c-button-mail">
                  <p class="c-button-mail__catch">メールで無料査定する</p>
                  <p class="c-button-mail__lead">24時間受付中</p>
               </a>
            </li>
            <li class="p-cta__button">
               <a href="tel:0359904745" class="c-button-tel u-pointerNone__sp">
                  <p class="c-button-tel__catch">電話で相談する</p>
                  <p class="c-button-tel__number">03-5990-4745</p>
                  <p class="c-button-tel__time">受付時間 <?php echo esc_html(get_field('hours_main')); ?></p>
               </a>
            </li>
         </ul>
      </div>
      <!-- /.p-cta__content -->
   </div>
   <!-- /.p-cta__inner-->
</div>
<!-- /.p-cta -->