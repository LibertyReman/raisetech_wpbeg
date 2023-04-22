<?php get_header(); ?>
  <div class="c-wrap">
    <div class="c-grid">
      <div class="p-contents">
        <?php
          if( have_posts() ) : // 1.投稿データがあるかの条件分岐。
            while( have_posts() ) : // 2.表示する投稿データがあれば繰り返し処理開始
              the_post();
              ?> <!-- 3.ループ処理に必要なカウント処理等 -->
                <!-- // 4.「ここに出力したい処理などを記述」 -->
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <h2 class="post__ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <ul class="post__meta">
                    <li class="post__meta__item">
                      <date class="post__meta__date"><?php echo get_the_date(); ?></date>
                    </li>
                    <li class="post__meta__item"><i class="fa fa-folder" aria-hidden="true"><?php the_category( ', ' ); ?></i></li>
                    <li class="post__meta__item"><i class="fa fa-tag" aria-hidden="true"><?php the_tags( '' ); ?></i></li>
                  </ul>
                  <?php the_post_thumbnail(); ?>
                  <?php the_content( '続きを読む' ); ?>
                </div>
            <?php endwhile; // 5.繰り返し処理ここまで。投稿データがまだあればwhileに戻る。なければ終了
          else : // 6.投稿データがなければ
            ?><p>表示する記事がありません</p><?php // 7.ない時の処理
          endif;
        ?> <!-- 8.条件分岐終了 -->
      </div>
      <?php if ( $wp_query -> max_num_pages > 1 ) : //ページ数が1を超える場合に処理 ?>
        <ul class="p-pagenation">
          <li class="prevpostslink"><?php next_posts_link( 'Prev' ); ?></li>
          <li class="prevpostslink"><?php previous_posts_link( 'Next' ); ?></li>
        </ul>
      <?php endif; ?>
      <?php get_sidebar(); ?>
    </div>
  </div>
<?php get_footer(); ?>

