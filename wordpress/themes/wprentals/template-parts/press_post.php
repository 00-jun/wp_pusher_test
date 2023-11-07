<section id=press_new>
<style>
@media only screen and (max-width: 767px) {
  .article-container {
  background-color: #EBF8FC	;
  width: 100vw;  /* 画面幅いっぱいにするための変更 */
  position: relative;        /* グリッドの外に帯を表示するための設定 */
  left: 50%;                 /* グリッドの外に帯を表示するための設定 */
  transform: translateX(-50%); /* グリッドの外に帯を表示するための設定 */ 
  margin: 0 auto; /* コンテナを中央に配置 */
  margin-top: 40px;
  padding:30px;
  padding: 40px; /* 青い背景色のエリアの内側の余白をつけるための追加 */
  box-sizing: border-box;
  z-index: 2;

}

.recommend.title_center {
  text-align: center;
  font-size: 24px;
  font-weight: bold;
  align-items: center;
  height: 90px;
  padding-top:10px;
}

.recommend.title_center h1 {
  text-align: center;
  font-size: 36px;
}
/*article-containerの影響を逃れるために明示的に大きさと位置を再定義*/
.recommend-container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  padding:30px;
  z-index: 1;
}

.recommend-item {
        display: flex;
        flex-direction: column;
        width: 100%;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2), 0px 1px 3px rgba(0, 0, 0, 0.2);
        transition: box-shadow 0.3s ease;
        align-items: stretch;  /* 追加: 子要素の高さを親要素に合わせる */
    }

  .recommend-item a{
    display: flex;
    flex-direction: column;
    align-items: stretch;
    height: 100%;
  }


.recommend-item:hover {
  box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3), 0px 2px 5px rgba(0, 0, 0, 0.3);
}

.recommend-image-wrapper, .recommend-placeholder {
  flex: 1;
  height:auto;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #f5f5f5;
  
    }


.recommend-image-wrapper img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

.recommend-title {
  flex: 1;
  text-align: center;
  background-color: white;
  padding:20px;
    }

.recommend_info_button {
  grid-column: 1 / -1; /* 全列にわたる */
  place-items: center; /* 中央に配置 */
  display: grid;    
  color: white;
  grid-row: span 2; 
  padding-top: 30px;
  margin-top: 30px;
}

.recommend_info_button a {
  width:30%;
  text-align: center;
  background-color: #45A2C1; /* ボタンの背景色を青に */
  color: #fff; /* テキストを白に */
  padding: 10px 10px; /* パディングを設定 */
  display: inline-block; /* インラインブロックに設定 */
  text-decoration: none; /* アンダーラインを除去 */
}

.recommend_info_button a:hover {
  background-color: white;
  color: #45A2C1;
  border: 2px solid #45A2C1;
}
}

@media only screen and (min-width: 768px){

  .article-container {
  background-color: #EBF8FC	;
  width: 100vw;  /* 画面幅いっぱいにするための変更 */
  position: relative;        /* グリッドの外に帯を表示するための設定 */
  left: 50%;                 /* グリッドの外に帯を表示するための設定 */
  transform: translateX(-50%); /* グリッドの外に帯を表示するための設定 */ 
  margin: 0 auto; /* コンテナを中央に配置 */
  padding: 40px; /* 青い背景色のエリアの内側の余白をつけるための追加 */
  box-sizing: border-box;
  z-index: 2;

}

.recommend.title_center {
  text-align: center;
  font-size: 24px;
  font-weight: bold;
  align-items: center;
  height: 90px;
}

.recommend.title_center h1 {
  text-align: center;
  font-size: 36px;
}
/*article-containerの影響を逃れるために明示的に大きさと位置を再定義*/
.recommend-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 29px;
  width: 60%;
  right: 40%;                 /* グリッドの外に帯を表示するための設定 */
  transform: translateX(33.33%); /* グリッドの外に帯を表示するための設定 */ 
  z-index: 1;
}

.recommend-item {
        display: flex;
        flex-direction: column;
        width: 100%;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2), 0px 1px 3px rgba(0, 0, 0, 0.2);
        transition: box-shadow 0.3s ease;
        align-items: stretch;  /* 追加: 子要素の高さを親要素に合わせる */
    }

  .recommend-item a{
    display: flex;
    flex-direction: column;
    align-items: stretch;
    height: 100%;
  }


.recommend-item:hover {
  box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3), 0px 2px 5px rgba(0, 0, 0, 0.3);
}

.recommend-image-wrapper, .recommend-placeholder {
  flex: 1;
  height:auto;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #f5f5f5;
  
    }


.recommend-image-wrapper img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

.recommend-title {
  flex: 1;
  text-align: center;
  background-color: white;
  padding:20px;
    }

.recommend_info_button {
  grid-column: 1 / -1; /* 全列にわたる */
  place-items: center; /* 中央に配置 */
  display: grid;    
  color: white;
  grid-row: span 2; 
  padding-top: 30px;
  margin-top: 30px;
}

.recommend_info_button a {
  width:30%;
  text-align: center;
  background-color: #45A2C1; /* ボタンの背景色を青に */
  color: #fff; /* テキストを白に */
  padding: 10px 10px; /* パディングを設定 */
  display: inline-block; /* インラインブロックに設定 */
  text-decoration: none; /* アンダーラインを除去 */
}

.recommend_info_button a:hover {
  background-color: white;
  color: #45A2C1;
  border: 2px solid #45A2C1;
}
}
</style>

    <!--ここからHTML -->
        <div class="article-container">
            <div class="recommend title_center">
            <?php 
            
            $top_title          =   '';
            // 画面の言語によって、タイトルを変更する
            $current_lang = apply_filters( 'wpml_current_language', NULL );
            if('ja' == $current_lang){
                $top_title = 'おすすめから探す';
            }else{
                $top_title = 'Recommended Features';
            }
        
            ?>

            <h1><?php esc_html_e($top_title,'wprentals');?></h1>


            </div>

            <!--記事情報を取得するクエリ -->
            <div class="press_info_wrap">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $the_query = new WP_Query( array(
                    'post_status' => 'publish',
                    'post_type' => 'post', //　ページの種類（例、page、post、カスタム投稿タイプ名）
                    'paged' => $paged,
                    'posts_per_page' => 8, // 表示件数
                    'orderby'     => 'date',
                    'order' => 'DESC'
                ) );

                // 記事を実際に表示 //
                if ($the_query->have_posts()) :?>
                <div class="recommend-container">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div class="recommend-item">
                            <a href="<?php the_permalink(); ?>">
                                <div class="recommend-image-wrapper">
                                    <?php 
                                    $image_url = get_thumbnail_from_post(get_the_ID());
                                    if($image_url) {
                                        echo '<img src="' . $image_url . '" alt="画像">';
                                    } else {
                                        echo '<div class="recommend-placeholder">画像</div>';
                                    }
                                    ?>
                                </div>
                                <div class="recommend-title"><?php the_title(); ?></div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; wp_reset_postdata();?>
            <!-- // 2023/7/22 デイユース開発 清水（追加） -->
            <?php 
                $view_more='';
                $owners_manual = '';
                // 画面の言語によって、遷移先のリンクを変更する
                $current_lang = apply_filters( 'wpml_current_language', NULL );
                if('ja' == $current_lang){
                    $owners_manual = '/ja/press-new-一覧/';
                    $view_more='もっと見る';
                }else if('en' == $current_lang){
                    $owners_manual = '/press-new-list';
                    $view_more='view more';

                }
            
            ?>
                <div class="recommend_info_button"><a href="<?php print esc_url($owners_manual);?>"><?php esc_html_e($view_more,'wprentals');?></a></div>
            </div>
        </div>
    </section>