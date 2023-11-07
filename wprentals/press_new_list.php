<?php
// Template Name: Press New list page
// Wp Estate Pack
get_header();
// global $wpestate_row_number_col;       
// global $wpestate_full_row;
// global $wpestate_blog_selection;
// $wpestate_options            =   wpestate_page_details($post->ID);
// $unit_class                  =   "col-md-6";
// $wpestate_row_number_col     =   6;
// $wpestate_full_row           =   0;

// if($wpestate_options['content_class'] == "col-md-12"){
//     $unit_class              =   "col-md-4";    
//     $wpestate_row_number_col =   4;
//     $wpestate_full_row       =   1;
// }
?>



<div>
<style>
        @media only screen and (max-width: 767px) {
            .recommend.title_center {
          background-color: #EBF8FC	;
          width:100vw;
          position: relative;        /* グリッドの外に帯を表示するための設定 */
          left: 50%;                 /* グリッドの外に帯を表示するための設定 */
          transform: translateX(-50%); /* グリッドの外に帯を表示するための設定 */ 
          text-align: center;
          font-size: 24px;
          font-weight: bold;
          align-items: center;
          padding-top:60px;
          /* margin:20px; *//*清水修正*/
          height: 200px;
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
      
        }
      
        @media only screen and (min-width: 768px){
      
      
        .recommend.title_center {
          background-color: #EBF8FC	;
          width:100vw;
          position: relative;        /* グリッドの外に帯を表示するための設定 */
          left: 50%;                 /* グリッドの外に帯を表示するための設定 */
          transform: translateX(-50%); /* グリッドの外に帯を表示するための設定 */ 
          text-align: center;
          font-size: 24px;
          font-weight: bold;
          align-items: center;
          padding-top:60px;
          /* margin:20px; *//*清水修正*/
          height: 200px;
        }
      
        .recommend.title_center h1 {
          text-align: center;
          font-size: 36px;
        }
        /*article-containerの影響を逃れるために明示的に大きさと位置を再定義*/
        .recommend-container {
            /* display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 48px;
            width: 100%;
            margin-bottom:30px;
            margin-top:100px; */

            /*▼2023/11/03 清水(追加)*/
            display: grid;
            grid-template-columns: repeat(auto-fill, 300px); /* 300px幅のカラムを作成 */
            gap: 10px; /* グリッド間の隙間を設定 */
            width: 80%;
            margin: 0 auto;
      
        }
      
        .recommend-item {
                /* display: flex;
                flex-direction: column;
                width: 100%; */
                /* box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2), 0px 1px 3px rgba(0, 0, 0, 0.2); */
                /* transition: box-shadow 0.3s ease; */
                /* align-items: stretch;  追加: 子要素の高さを親要素に合わせる */ 

                /*▼2023/11/03 清水 (追加)*/
                width: 300px; /* 要素の幅を300pxに設定 */
                display: flex; /* Flexboxを使用して中央揃えにする */
                align-items: center; /* 縦方向の中央揃えにする */
                justify-content: center; /* 横方向の中央揃えにする */
                overflow: hidden; /* はみ出した部分を非表示にする */
                min-height: 157.5px; /* 最小の高さを指定 */
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2), 0px 1px 3px rgba(0, 0, 0, 0.2);
            }
      
          /* .recommend-item a{
            display: flex;
            flex-direction: column;
            align-items: stretch;
            height: 100%;
          } */
      
      
        .recommend-item:hover {
          box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3), 0px 2px 5px rgba(0, 0, 0, 0.3);
        }
      
        .recommend-image-wrapper, .recommend-placeholder {
          /* flex: 1;
          height:auto;
          display: flex;
          align-items: center;
          justify-content: center; */
          background-color: #f5f5f5;
          
            }
      
      
        .recommend-image-wrapper img {
          width: 100%;
          height: auto;
          /* object-fit: cover; */
          object-fit: contain;/*清水 追加*/
        }
      
        .recommend-title {
          /* flex: 1; */
          text-align: center;
          background-color: white;
          padding:20px;
            }
        }
        </style>

  <div class="recommend title_center">
    <?php 
    
    $top_title          =   '';
    // 画面の言語によって、タイトルを変更する
    $current_lang = apply_filters( 'wpml_current_language', NULL );
    if('ja' == $current_lang){
        $top_title = 'おすすめ特集';
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
            'orderby'     => 'date',
            'order' => 'DESC'
        ) );

        // 記事を実際に表示 //
        if ($the_query->have_posts()) :
      ?>
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
  </div>
</div>
<?php get_footer(); ?>
