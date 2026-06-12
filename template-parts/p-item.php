<?php
$title = $args['title'] ?? '';
$en    = $args['en'] ?? '';
$image = $args['image'] ?? '';
?>
<li class="p-items__item">
   <div class="p-items__textArea">
      <h4 class="p-items__title"><?php echo esc_html($title); ?></h4>
      <p class="p-items__en"><?php echo esc_html($en); ?></p>
   </div>
   <!-- /.p-items__textArea -->
   <div class="p-items__imageArea">
      <figure class="p-items__image">
         <picture>
            <source
               srcset="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/p-item_' . $image . '.webp')); ?>"
               media="(min-width: 768px)">
            <img
               src="<?php echo esc_url(get_theme_file_uri('dev/public/assets/img/sp/p-item_' . $image . '.webp')); ?>"
               alt="" width="" height="" loading="lazy">
         </picture>
      </figure>
      <!-- /.p-items__image -->
   </div>
   <!-- /.p-items__imageArea -->
</li>
