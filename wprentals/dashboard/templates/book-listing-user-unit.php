<?php
global $post;
global $wpestate_where_currency;
global $wpestate_currency;
global $userID;
global $user_login;

$link               =   esc_url (get_permalink());
$booking_status     =   get_post_meta($post->ID, 'booking_status', true);
$booking_status_full=   get_post_meta($post->ID, 'booking_status_full', true);
$booking_id         =   get_post_meta($post->ID, 'booking_id', true);
$booking_from_date  =   get_post_meta($post->ID, 'booking_from_date', true);
$booking_to_date    =   get_post_meta($post->ID, 'booking_to_date', true);
$booking_guests     =   get_post_meta($post->ID, 'booking_guests', true);
$preview            =   wp_get_attachment_image_src(get_post_thumbnail_id($booking_id), 'wpestate_blog_unit');
$author             =   get_the_author();
$invoice_no         =   get_post_meta($post->ID, 'booking_invoice_no', true);
$booking_pay        =   get_post_meta($post->ID, 'booking_pay_ammount', true);
$booking_company    =   get_post_meta($post->ID, 'booking_company', true);

if ( $booking_status=='confirmed'){
    $total_price        =   floatval( get_post_meta($post->ID, 'total_price', true) );
    $to_be_paid         =   floatval( get_post_meta($post->ID, 'to_be_paid', true) );
    $to_be_paid         =   $total_price-$to_be_paid;
    $to_be_paid_show    =   wpestate_show_price_booking ( $to_be_paid ,$wpestate_currency,$wpestate_where_currency,1);
}else{
    $to_be_paid         =   floatval( get_post_meta($post->ID, 'total_price', true) );
    $to_be_paid_show    =   wpestate_show_price_booking ( $to_be_paid ,$wpestate_currency,$wpestate_where_currency,1);
}

$no_of_days         =   ( strtotime($booking_to_date)-strtotime($booking_from_date) ) / (60*60*24);
$property_price     =   get_post_meta($booking_id, 'property_price', true);
$price_per_option   =   intval(get_post_meta($booking_id, 'price_per', true));
if ($price_per_option!=0){
    $property_price     =   round ( $property_price/$price_per_option,2);
}
$price_per_booking  =   floatval($no_of_days) *floatval($property_price);
$event_description  =   get_the_content();

if($invoice_no== 0){
    $invoice_no='-';
}else{
    $price_per_booking=get_post_meta($invoice_no, 'item_price', true);
}
$price_per_booking=floatval($price_per_booking);
$price_per_booking = number_format($price_per_booking,2,'.',',');

if ($wpestate_where_currency == 'before') {
    $price_per_booking = $wpestate_currency . ' ' . $price_per_booking;
} else {
    $price_per_booking = $price_per_booking . ' ' . $wpestate_currency;
}


// 2023/6/11 デイユース開発 高橋（追加）--
$converted_booking_date = date('Y-m-d', strtotime($booking_to_date));
$currentDate = date('Y-m-d');

?>

<div class="col-md-12 dasboard-prop-listing">

        <div class="col-md-4 blog_listing_image my_bookings_image book_image">
          <?php include(locate_template('dashboard/templates/unit-templates/reservation_image.php') );  ?>
          <?php include(locate_template('dashboard/templates/unit-templates/reservation_title_section.php') );  ?>
        </div>

        <!-- 2023/3/4 デイユース開発 清水（追加）----->
        <div class="col-md-2 booking_plan_status dasboard_prop_listing_inner"><!-- クラス追加 -->
            <?php
                $details = get_post_meta($post->ID, 'booking_plans', true);
                $arr_dt  = explode( '/', $details[0] );
                // $details = get_post_meta($invoice_no, 'renting_details', true);
                // var_dump($details); 
                if($details){
            ?>
                <p>
                    <?php echo $arr_dt[0] ?>
                </p>
            <?php } ?>
        </div>

        <div class="col-md-2 booking_unit_status dasboard_prop_listing_inner"><!-- クラス追加 -->
            <?php include(locate_template('dashboard/templates/unit-templates/reservation_status.php') );  ?>
        </div>


        <div class="col-md-2 booking_unit_period dasboard_prop_listing_inner"><!-- クラス追加 -->
            <?php   include(locate_template('dashboard/templates/unit-templates/reservation_period.php') );  ?>
        </div>

        <div class="col-md-2 booking_unit_owner dasboard_prop_listing_inner"><!-- クラス追加 -->
          <?php   include(locate_template('dashboard/templates/unit-templates/booking_owner.php') );  ?>
        </div>
        <!-- /2023/3/4 デイユース開発 清水（追加）----->



        <div class="info-container_booking">
            <?php

            if ($booking_status=='confirmed' || $booking_status=='completed'){
                // 2023/2/2 デイユース開発 高橋（コメントアウト）
                // if($booking_status_full=='confirmed'){

                // }else{

                //     print '<span class="proceed-payment_full" data-invoiceid="'.esc_attr($invoice_no).'" data-bookid="'.esc_attr($post->ID).'">'.esc_html__( 'Pay Invoice in Full','wprentals').'</span>';

                // }

                print '<span class="confirmed_booking" data-invoice-confirmed="'.esc_attr($invoice_no).'" data-booking-confirmed="'.esc_attr($post->ID).'">'.esc_html__( 'Invoice Details','wprentals').'</span>';
                print '<span class="trip_details" data-invoice-confirmed="'.esc_attr($invoice_no).'" data-booking-confirmed="'.esc_attr($post->ID).'">'.esc_html__( 'Trip Details','wprentals').'</span>';

                // 2023/6/11 デイユース開発 高橋（修正）---
                // if(strtotime($booking_to_date) < time() ){
                if ($converted_booking_date < $currentDate){
                    if ( get_post_meta($booking_id,'review_by_'.$userID,true) != 'has' ){
                        print '<span class="tag-post-review post_review" data-bookid="'.esc_attr($post->ID).'" data-listing-review="'.esc_attr($booking_id).'">'.esc_html__( 'Post Review','wprentals').'</span>';
                    }else{
                        print '<span class="you_already_review">'.esc_html__( 'You already reviewed this property!','wprentals').'</span>';
                    }
                
                }else{
                    print '<span class="post_review_later">'.esc_html__( 'You can post the review after the trip!','wprentals').'</span>';

                    // 2023/6/27 デイユース開発 高橋（追加）---
                    if ($converted_booking_date > $currentDate){
                        print '<span class="cancel_user_booking_by_user" data-listing-id="'.esc_attr($booking_id).'"  data-booking-confirmed="'.esc_attr($post->ID).'">'.esc_html__( 'Cancel this booking','wprentals').'</span>';
                    }else{
                        print '<span class="uncancellable">'.esc_html__( 'Cancel this booking','wprentals').'</span>';
                    }
                
                }
                print '<span class="contact_owner_reservation" data-bookid="'.esc_attr($booking_id).'">'.esc_html__( 'Contact Owner','wprentals').'</span>';

            }else if( $booking_status=='waiting'){
                print '<span class="proceed-payment" data-invoiceid="'.esc_attr($invoice_no).'" data-bookid="'.esc_attr($post->ID).'">'.esc_html__( 'Invoice Created - Check & Pay','wprentals').'</span>';
                print '<span class="delete_booking usercancel" data-bookid="'.esc_attr($post->ID).'">'.esc_html__( 'Cancel Booking Request','wprentals').'</span>';
                print '<span class="contact_owner_reservation" data-bookid="'.esc_attr($booking_id).'">'.esc_html__( 'Contact Owner','wprentals').'</span>';
            // 2023/6/11 デイユース開発 高橋（追加）---
            }else if( $booking_status=='request_canceled'){
                //Do nothing
            }else if( $booking_status=='canceled'){
                print '<span class="confirmed_booking" data-invoice-confirmed="'.esc_attr($invoice_no).'" data-booking-confirmed="'.esc_attr($post->ID).'">'.esc_html__( 'Invoice Details','wprentals').'</span>';
                print '<span class="trip_details" data-invoice-confirmed="'.esc_attr($invoice_no).'" data-booking-confirmed="'.esc_attr($post->ID).'">'.esc_html__( 'Trip Details','wprentals').'</span>';
                print '<span class="contact_owner_reservation" data-bookid="'.esc_attr($booking_id).'">'.esc_html__( 'Contact Owner','wprentals').'</span>';
            }else{
                print '<span class="delete_booking usercancel" data-bookid="'.esc_attr($post->ID).'">'.esc_html__( 'Cancel Booking Request','wprentals').'</span>';
                print '<span class="contact_owner_reservation" data-bookid="'.esc_attr($booking_id).'">'.esc_html__( 'Contact Owner','wprentals').'</span>';
            }
            
            ?>






        </div>

</div>
