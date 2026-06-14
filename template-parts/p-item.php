<?php
$title       = $args['title'] ?? '';
$en          = $args['en'] ?? '';
$image       = $args['image'] ?? '';
$en_modifier = $args['en_modifier'] ?? '';
?>
<section class="p-item">
   <div class="p-item__textArea">
      <h4 class="p-item__title"><?php echo wp_kses_post($title); ?></h4>
      <p class="p-item__en<?php echo $en_modifier ? ' ' . esc_attr($en_modifier) : ''; ?>"><?php echo esc_html($en); ?></p>
   </div>
   <!-- /.p-item__textArea -->
   <div class="p-item__imageArea">
      <figure class="p-item__image">
         <picture>
            <source
               srcset="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-item_' . $image . '.webp')); ?>"
               media="(min-width: 768px)">
            <img
               src="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/sp/p-item_' . $image . '.webp')); ?>"
               alt="" width="" height="" loading="lazy">
         </picture>
      </figure>
      <!-- /.p-item__image -->
   </div>
   <!-- /.p-item__imageArea -->
</section>
