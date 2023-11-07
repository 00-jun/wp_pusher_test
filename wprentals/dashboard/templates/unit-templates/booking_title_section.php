<?php
$booking_from_date  =   get_post_meta($post->ID, 'booking_from_date', true);
$from_date = new DateTime($booking_from_date);
$from_date_unix = $from_date->getTimestamp();

$property_empty = floatval( get_post_meta($booking_id, 'property_empty', true) );
$bookked_rooms = floatval ( get_post_meta($booking_id, 'booked_rooms', true)) ? floatval( get_post_meta($booking_id, 'booked_rooms', true) ) : floatval(0);
$booking_room_array   =   (get_post_meta($booking_id, 'booking_plans_room',true  )) ? get_post_meta($booking_id, 'booking_plans_room',true  ) : [];
$vals = floatval(array_count_values($booking_room_array)[$from_date_unix]);



// var_dump($booking_room_array);
// var_dump($vals[$from_date_unix]);

$count_available = (($property_empty - $vals) > 0) ? $property_empty - $vals : 0;

$available_rooms = floatval ( $property_empty - $bookked_rooms );
$booking_list_empty = floatval( get_post_meta($post->ID, 'booking_list_empty', true) );

if ( $booking_status=='confirmed'){
    $total_price        =   floatval( get_post_meta($post->ID, 'total_price', true) );
    $to_be_paid         =   floatval( get_post_meta($post->ID, 'to_be_paid', true) );
    $to_be_paid         =   $total_price-$to_be_paid;
    $to_be_paid_show    =   wpestate_show_price_booking ( $to_be_paid ,$wpestate_currency,$wpestate_where_currency,1);
}else{
    $to_be_paid         =   floatval( get_post_meta($post->ID, 'total_price', true) );
    $to_be_paid_show    =   wpestate_show_price_booking ( $to_be_paid ,$wpestate_currency,$wpestate_where_currency,1);
}


?>

<div class="prop-info">
    <h4 class="listing_title_book book_listing_user_title">
        <?php
        echo esc_html__('Booking request','wprentals').' '.$post->ID;
        print ' <strong>'. esc_html__( 'for','wprentals').'</strong> <a href="'.esc_url (get_permalink($booking_id) ).'">'.get_the_title($booking_id).'</a>';
        ?>
    </h4>

     <!-- 2023/6/11 デイユース開発 高橋（コメントアウト）--- -->
    <!-- <div class="user_dashboard_listed book_listing_user_empty">
        <a href="<?//=get_site_url().'/edit-listing-2/?listing_edit='.$booking_id.'&action=calendar'?>"><span class="booking_details_title"><?php //esc_html_e('Available rooms: ','wprentals');?></span> <span class="invoice_list_empty"><?php //print esc_html($count_available);?></span></a>
    </div> -->

    <?php if( $author!= $user_login ) { ?>
        <div class="user_dashboard_listed book_listing_user_invoice">
            <span class="booking_details_title"><?php esc_html_e('Invoice No: ','wprentals');?></span> <span class="invoice_list_id"><?php print esc_html($invoice_no);?></span>
        </div>

        <div class="user_dashboard_listed book_listing_user_pay">
            <span class="booking_details_title"><?php esc_html_e('Pay Amount: ','wprentals');?> </span> <?php print wpestate_show_price_booking ( floatval( get_post_meta($invoice_no, 'item_price', true)) ,$wpestate_currency,$wpestate_where_currency,1); ?>
            <span class="booking_details_title guest_details book_listing_user_guest_details">
                <?php
                if ($booking_guests!=0){
                    esc_html_e('Guests: ','wprentals');?> </span> <?php print '<span class="book_listing_user_guest_details">'. esc_html($booking_guests).wpestate_booking_guest_explanations($post->ID).'</span>'; 
                }?>
        </div>
    <?php }

    // 2023/2/2 デイユース開発 高橋（コメントアウト）
    // include(locate_template('dashboard/templates/unit-templates/balance_display.php') );

    if($event_description!=''){
        print ' <div class="user_dashboard_listed event_desc"> <span class="booking_details_title">'.esc_html__( 'Reservation made by owner','wprentals').'</span></div>';
        print ' <div class="user_dashboard_listed event_desc"> <span class="booking_details_title">'.esc_html__( 'Comments: ','wprentals').'</span>'.esc_html($event_description).'</div>';
    }
    ?>
</div>
