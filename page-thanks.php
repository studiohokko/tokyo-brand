<?php get_header(); ?>

<!-- header   ///////////////////////////////////////////////////// -->
<?php get_template_part('template-parts/header'); ?>


<main class="l-main">
   <section class="p-thanks">
      <div class="p-thanks__inner l-inner">
         <h1 class="p-thanks__title">お問合せが<br class="u-only__sp">完了いたしました</h1>
         <div class="p-thanks__content">
            <div class="p-thanks__textBox">
               <p class="p-thanks__text">この度は、お問合せいただき誠にありがとうございます。<br>ご入力いただいたメールアドレス宛に、確認用の自動返信メールをお送りいたしました。</p>
               <p class="p-thanks__text">内容を確認の上、通常2〜3営業日以内に担当者より改めてご連絡させていただきます。</p>
               <p class="p-thanks__text -small">※数分経ってもメールが届かない場合は、迷惑メールフォルダをご確認いただくか、お電話にてお問合せください。</p>
            </div>
            <!-- /.p-thanks__textBox -->
            <p class="p-thanks__attention">※ 携帯キャリアメール（@docomo / @ezweb / @softbank
               など）をご利用の場合、受信設定により自動返信メールが届かないことがあります。<br>その際は【info@example.com】からのメールを受信できるよう設定をお願いいたします。</p>
            <div class="p-thanks__telBox">
               <a href="tel:0359904745" class="p-thanks__tel u-pointerNone__sp">
                  <p class="p-thanks__telText">お電話でのお問合せ</p>
                  <p class="p-thanks__telNumber">03-5990-4745</p>
                  <p class="p-thanks__telTime">受付時間<?php echo esc_html(get_field('hours_main')); ?></p>
               </a>
            </div>
            <!-- /.p-thanks__telBox -->
            <div class="p-thanks__buttonWrapper">
               <a href="<?php echo esc_url(home_url('/')); ?>" class="p-thanks__button">Topページへ戻る</a>
            </div>
            <!-- /.p-thanks__buttonWrapper -->
         </div>
         <!-- /.p-thanks__content -->
      </div>
      <!-- /.p-thanks__inner -->
   </section>
</main>


<!-- footer   ///////////////////////////////////////////////////// -->
<?php get_template_part('template-parts/footer'); ?>


<?php get_footer(); ?>