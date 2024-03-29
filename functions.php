<?php
  //テーマサポート
  add_theme_support( 'title-tag' );   // タイトルタグのサポートを許可
  add_theme_support( 'post-thumbnails' ); // アイキャッチをのサポートを追加
  add_theme_support( 'automatic-feed-links' );

  // テーマのコンテンツエリアのサイズを指定
  if ( ! isset( $content_width ) ) {
    $content_width = 960;
  }

  //タイトル出力
  function wpbeg_title( $title ) {
    if ( is_front_page() && is_home() ) { //トップページなら
      $title = get_bloginfo( 'name', 'display' );
    } elseif ( is_singular() ) { //シングルページなら
      $title = single_post_title( '', false );
    }
    return $title;
  }
  add_filter( 'pre_get_document_title', 'wpbeg_title' );

  // スタイルシートを読み込むタグを出力
  function wpbeg_script() {
    wp_enqueue_style( 'mplus1p', '//fonts.googleapis.com/earlyaccess/mplus1p.css', array() );
    wp_enqueue_style( 'Sacramento', '//fonts.googleapis.com/css?family=Sacramento&amp;amp;subset=latin-ext', array() );
    wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.6.1/css/all.css', array(), '5.6.1' );
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '4.5.0' );
    wp_enqueue_style( 'wpbeg', get_template_directory_uri() . '/css/wpbeg.css', array(), '1.0.0' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.0.0' );
  }
  add_action( 'wp_enqueue_scripts', 'wpbeg_script' );

  // ウィジェット項目の追加
  function wpbeg_widgets_init() {
    register_sidebar (
      array(
        'name'          => 'カテゴリーウィジェット',
        'id'            => 'category_widget',
        'description'   => 'カテゴリー用ウィジェットです',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2><i class="fa fa-folder-open" aria-hidden="true"></i>',
        'after_title'   => "</h2>\n",
      )
    );
    register_sidebar(
      array(
        'name'          => 'タグウィジェット',
        'id'            => 'tag_widget',
        'description'   => 'タグ用ウィジェットです',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2><i class="fa fa-tags" aria-hidden="true"></i>',
        'after_title'   => "</h2>\n",
      )
    );
    register_sidebar(
      array(
        'name'          => 'アーカイブウィジェット',
        'id'            => 'archive_widget',
        'description'   => 'アーカイブ用ウィジェットです',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2><i class="fa fa-archive" aria-hidden="true"></i>',
        'after_title'   => "</h2>\n",
      )
    );
  }
  add_action( 'widgets_init', 'wpbeg_widgets_init' );

  // エディタの見た目をプレビューと同じにする
  function wpbeg_theme_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . "/css/editor-style.css" );
  }
  add_action( 'admin_init', 'wpbeg_theme_add_editor_styles' );



