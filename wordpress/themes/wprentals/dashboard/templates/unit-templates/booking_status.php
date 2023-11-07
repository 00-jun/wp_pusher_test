<?php

if ($booking_status=='confirmed'){
    if($booking_status_full=="confirmed"){
      // 2023/2/2 デイユース開発 高橋（修正）
    //    print '<span class="wprentals_status_circle booking_confirmed_full_paid"></span><span class="tag-published booking_confirmed_full_paid">'.esc_html__( 'Confirmed & Fully Paid','wprentals').'</span>';
    // }else{
    //     print '<span class="wprentals_status_circle booking_confirmed_full_paid"></span><span class="tag-published booking_confirmed_not_full_paid">'.esc_html__( 'Confirmed / Not Fully Paid','wprentals').'</span>';
    // }
    print '<span class="wprentals_status_circle booking_confirmed_full_paid"></span><span class="tag-published booking_confirmed_full_paid">'.esc_html__( 'Confirmed','wprentals').'</span>';
  }else{
      print '<span class="wprentals_status_circle booking_confirmed_full_paid"></span><span class="tag-published booking_confirmed_not_full_paid">'.esc_html__( 'Confirmed','wprentals').'</span>';
  }
}else if( $booking_status=='waiting'){
  print '<span class="wprentals_status_circle waiting_payment_status"></span><span class="waiting_payment_status" data-bookid="'.esc_attr($post->ID).'">'.esc_html__( 'Invoice Issued ','wprentals').'</span>';
}else if( $booking_status=='pending' ||  $booking_status=='request' ){
  print '<span class="wprentals_status_circle waiting_payment_status_pending"></span><span class="waiting_payment_status_pending" >'.esc_html__( 'Pending','wprentals').'</span>';

// 2023/6/11 デイユース開発 高橋（追加）
}else if( $booking_status=='canceled'){
  print '<span class="wprentals_status_circle booking_canceled"></span><span class="booking_canceled">'.esc_html__( 'Canceled','wprentals').'</span>';
}else if( $booking_status=='request_canceled'){
  print '<span class="wprentals_status_circle booking_request_canceled"></span><span class="booking_request_canceled">'.esc_html__( 'Request Canceled','wprentals').'</span>';
}else if( $booking_status=='completed'){
  print '<span class="wprentals_status_circle booking_completed"></span><span class="booking_completed">'.esc_html__( 'Completed','wprentals').'</span>';
}
?>
