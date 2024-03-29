<?php get_header(); ?>
  <div class="c-wrap">
    <div class="c-grid">
      <div class="p-contents">
        <?php
          if( have_posts() ) : // 1.投稿データがあるかの条件分岐。
            while( have_posts() ) : // 2.表示する投稿データがあれば繰り返し処理開始
              the_post(); ?> <!-- 3.ループ処理に必要なカウント処理等 -->
              <!-- // 4.「ここに出力したい処理などを記述」 -->
              <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2 class="post__ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_post_thumbnail(); ?>
                <?php the_content(); ?>
                <?php comments_template(); ?>
              </div>
            <?php endwhile; // 5.繰り返し処理ここまで。投稿データがまだあればwhileに戻る。なければ終了
          else : // 6.投稿データがなければ
            ?><p>表示する記事がありません</p><?php // 7.ない時の処理
          endif;
        ?> <!-- 8.条件分岐終了 -->
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
<?php get_footer(); ?>

