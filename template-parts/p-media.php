<?php
$number   = $args['number'] ?? '';
$title    = $args['title'] ?? '';
$text     = $args['text'] ?? '';
$image    = $args['image'] ?? '';
$modifier = $args['modifier'] ?? '';
?>
<section class="p-media<?php echo $modifier ? ' ' . esc_attr($modifier) : ''; ?>">
   <div class="p-media__textArea">
      <div class="p-media__head">
         <p class="p-media__number"><?php echo esc_html($number); ?></p>
         <h3 class="p-media__title"><?php echo wp_kses_post($title); ?></h3>
      </div>
      <!-- /.p-media__head -->
      <p class="p-media__text"><?php echo wp_kses_post($text); ?></p>
   </div>
   <!-- /.p-media__textArea -->
   <div class="p-media__imageArea">
      <figure class="p-media__image">
         <img src="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-media_' . $image . '.webp')); ?>"
            alt="" width="" height="" loading="lazy">
      </figure>
      <!-- /.p-media__image -->
   </div>
   <!-- /.p-media__imageArea -->
</section>
