<section id=whats_new>
        <div>
            <div class="title title_left">
                <h2><?php esc_html_e('What \'s New','wprentals');?></h2>
                <!-- <p>ニュース</p> -->
            </div>
            <div class="info_wrap">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $the_query = new WP_Query( array(
                    'post_status' => 'publish',
                    'post_type' => 'whats_new', //　ページの種類（例、page、post、カスタム投稿タイプ名）
                    'paged' => $paged,
                    'posts_per_page' => 5, // 表示件数
                    'orderby'     => 'date',
                    'order' => 'DESC'
                ) );
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                <dl class="info_inner">
                    <a href="<?php the_permalink(); ?>">
                        <dt class="info_date"><?php echo get_the_date('Y/n/j'); ?></dt>
                        <?php 
                            $category = get_the_category(); 
                            if($category):
                        ?>
                        <dd class="category">
                            <?php
                            echo $category[0]->cat_name;
                            ?>
                        </dd>
                        <?php endif;?>
                        <dd><?php the_title(); ?></dd>
                    </a>
                </dl>
            <?php endwhile;?>
            <?php endif; wp_reset_postdata();?>
            <!-- // 2023/7/22 デイユース開発 清水（追加） -->
            <?php 
            
                $owners_manual          =   '';
                // 画面の言語によって、遷移先のリンクを変更する
                $current_lang = apply_filters( 'wpml_current_language', NULL );
                if('ja' == $current_lang){
                    $owners_manual = '/ja/whats-new-一覧/';
                }else{
                    $owners_manual = '/whats-new-list';
                }
            
            ?>
                <div class="info_button"><a href="<?php print esc_url($owners_manual);?>"><?php esc_html_e('View More','wprentals');?></a></div>
            </div>
        </div>
    </section>