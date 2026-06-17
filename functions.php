<?php
// -----------------------------------------------------------
//  画像の表示サイズ（4倍書き出し画像の1/4）を取得
// -----------------------------------------------------------
function my_get_image_display_size(string $relative_path): array
{
   static $cache = [];
   $relative_path = ltrim($relative_path, '/');

   if (isset($cache[$relative_path])) {
      return $cache[$relative_path];
   }

   $file_path = get_theme_file_path('dev/public/assets/img/' . $relative_path);
   if (!is_readable($file_path)) {
      return $cache[$relative_path] = [0, 0];
   }

   $size = getimagesize($file_path);
   if ($size === false) {
      return $cache[$relative_path] = [0, 0];
   }

   return $cache[$relative_path] = [
      intdiv($size[0], 4),
      intdiv($size[1], 4),
   ];
}


// -----------------------------------------------------------
//  WordPressの標準機能を拡張する
// -----------------------------------------------------------
function my_setup()
{
   // 固定ページに抜粋文を追加
   add_post_type_support('page', 'excerpt');
   // RSSフィードのURLの生成機能を追加
   add_theme_support('automatic-feed-links');
   // WordPressで出力される際のタグがHTML5形式になる
   add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
}
add_action('after_setup_theme', 'my_setup');


// -----------------------------------------------------------
//  CSS・JavaScript読み込み
// -----------------------------------------------------------
// my_script_initという関数を定義する
function my_script_init()
{
   // △▽△▽△▽△▽ CSS
   // Fonts
   wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=BIZ+UDPMincho:wght@400;700&family=Noto+Sans+JP:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Zen+Old+Mincho:wght@400;500;600;700;900&display=swap', array(), null, 'all');
   // Swiper（CDN）
   wp_enqueue_style('swiper', '//cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', array(), '12.2.0', 'all');
   // メインスタイルシート
   wp_enqueue_style('main-style', get_theme_file_uri('/dev/public/assets/css/style.css'), array(), filemtime(get_theme_file_path('/dev/public/assets/css/style.css')), 'all');

   // △▽△▽△▽△▽ JavaScript
   // Swiper（CDN）
   wp_enqueue_script('swiper', '//cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array('jquery'), '12.2.0', true);
   // GSAP Core
   wp_enqueue_script('gsap-core', '//cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js', array('jquery'), '3.15.0', true);
   // GSAP ScrollToPlugin
   wp_enqueue_script('gsap-scrollto', '//cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollToPlugin.min.js', array('jquery', 'gsap-core'), '3.15.0', true);
   // GSAP ScrollTrigger
   wp_enqueue_script('gsap-scrolltrigger', '//cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollTrigger.min.js', array('jquery', 'gsap-core'), '3.15.0', true);
   // メインスクリプト
   wp_enqueue_script('main-script', get_theme_file_uri('/dev/public/assets/js/bundle.js'), array('jquery', 'swiper', 'gsap-core'), filemtime(get_theme_file_path('/dev/public/assets/js/bundle.js')), true);
}
add_action('wp_enqueue_scripts', 'my_script_init');


// -----------------------------------------------------------
// defer属性を追加（JavaScriptのみ）
// -----------------------------------------------------------
// 'script_loader_tag' フィルターを使用して、指定したスクリプトに defer 属性を追加する
function add_defer_attribute($tag, $handle)
{
   // deferを付与したいスクリプトのハンドル名を配列で指定
   $defer_scripts = array('swiper', 'main-script');
   // 該当するスクリプトの場合のみ defer を追加する
   if (in_array($handle, $defer_scripts)) {
      // <script>タグ内に defer を追加
      return str_replace('<script ', '<script defer ', $tag);
   }
   return $tag;
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);


// -----------------------------------------------------------
//  スラッグの日本語禁止
// -----------------------------------------------------------
function auto_post_slug($slug, $post_ID, $post_status, $post_type)
{
   if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
      $slug = utf8_uri_encode($post_type) . '-' . $post_ID;
   }
   return $slug;
}
add_filter('wp_unique_post_slug', 'auto_post_slug', 10, 4);


// -----------------------------------------------------------
//  アイキャッチ画像の設定とトリミング
// -----------------------------------------------------------
function setup_post_thumbnails()
{
   // アイキャッチ画像の有効化
   add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'setup_post_thumbnails');


// -----------------------------------------------------------
//  固定ページのエディタを無効化する
// -----------------------------------------------------------
add_filter('use_block_editor_for_post', function ($use_block_editor, $post) {
   if ($post->post_type === 'page') {
      remove_post_type_support('page', 'editor');
      return false;
   }
   return $use_block_editor;
}, 10, 2);


// -----------------------------------------------------------
//  jpg画像の品質を100%でアップロードする
// -----------------------------------------------------------
function img_uncompressed()
{
   return 100;
}
add_filter('jpeg_quality', 'img_uncompressed');


// -----------------------------------------------------------
//  カスタム投稿タイプのシングルページを生成しない(404ページに飛ぶ)
// -----------------------------------------------------------
function redirect_custom_post_type_single_page()
{
   if (is_singular(array('price'))) {
      wp_redirect(home_url('/404.php'), 301);
      exit;
   }
}
add_action('template_redirect', 'redirect_custom_post_type_single_page');


// -----------------------------------------------------------
//  Contact Form 7の自動pタグ生成無効
// -----------------------------------------------------------
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
   return false;
}


// -----------------------------------------------------------
// thanksページへの遷移（front-page.php のフォーム送信後）
// -----------------------------------------------------------
add_action('wp_footer', 'custom_redirect_after_submission');

function custom_redirect_after_submission()
{
   if (is_front_page()) {
      ?>
      <script type="text/javascript">
         document.addEventListener('wpcf7mailsent', function (event) {
            // 📧 フォーム送信完了後、少し待ってからリダイレクト
            setTimeout(function () {
               window.location.href = '<?php echo home_url('/thanks/'); ?>';
            }, 100);
         }, false);
      </script>
      <?php
   }
}

// -----------------------------------------------------------
// サンクスページに直接遷移しないようにする(トップページに飛ぶ)
// -----------------------------------------------------------
// thanksページは /thanks として作成する（page-thanks.php）
// フォームは front-page.php から送信される

// function is_referer_from_front_page()
// {
//    if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] === '') {
//       return false;
//    }

//    $referer_path = wp_parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
//    $home_path = wp_parse_url(home_url('/'), PHP_URL_PATH);

//    return untrailingslashit($referer_path ?: '/') === untrailingslashit($home_path ?: '/');
// }

// add_filter('template_redirect', function () {
//    if (!is_page()) {
//       return;
//    }

//    global $post;
//    if (is_null($post)) {
//       return;
//    }

//    if ($post->post_name !== 'thanks') {
//       return;
//    }

//    // error_log('リファラー: ' . ($_SERVER['HTTP_REFERER'] ?? '')); // デバッグ時はコメントを外す

//    if (!is_referer_from_front_page()) {
//       wp_redirect(home_url('/'));
//       exit;
//    }
// }, 10, 0);

// ?>