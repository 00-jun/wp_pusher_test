<ul class="top_slider" id="top_slide">
    <?php
        $args = array(
            'post_type' => 'slider',
            'posts_per_page' => 8,
        );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) : 

            $random_items = array(); // Array to store items when "random" is true
            $ordered_items = array(); // Array to store items when "random" is false

            while ( $the_query->have_posts() ) : $the_query->the_post();
                $post_id = get_the_ID();
                $custom_fields = get_fields($post_id);

                if($custom_fields) {
                    $is_random = $custom_fields['random'] == 1; // Assuming "random" is the 0th field and checking if it's equal to 1
                    $custom_fields = array_slice($custom_fields, 1); // Use fields starting from the 1st one

                    foreach($custom_fields as $field_name => $field) {
                        $image = $field[$field_name . '_image'];
                        $movie = $field[$field_name . '_movie'];
                        $url = $field[$field_name . '_url']; // Get the url

                        // Only if $image or $movie has value, add the <li> item
                        if (!empty($image) || !empty($movie)) {
                            $item = ""; // Temporarily store the item in a string

                            $item .= '<li class="top_slider_item">';

                            if($image) {
                                $item .= '<a href="' . esc_url($url) . '"><img src="' . esc_url($image) . '" alt=""></a>';
                            } elseif($movie) {
                                $item .= '<a href="' . esc_url($url) . '"><iframe width="560" height="315" src="https://www.youtube.com/embed/' . esc_attr($movie) . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>';
                            }

                            $item .= '</li>';

                            // Add the item to the correct array
                            if ($is_random) {
                                $random_items[] = $item;
                            } else {
                                $ordered_items[] = $item;
                            }
                        }
                    }
                }
            endwhile;

            wp_reset_postdata();

            // ランダムに順番を変更
            shuffle($random_items);

            // First, print ordered items in their original order
            foreach($ordered_items as $item) {
                echo $item;
            }

            // Then, print randomized items
            foreach($random_items as $item) {
                echo $item;
            }

        endif;
    ?>
</ul>
