<?php
$booking_from_date  =  wpestate_convert_dateformat_reverse($booking_from_date);
// 2023/2/2 デイユース開発 高橋（修正）
// $booking_to_date    =  wpestate_convert_dateformat_reverse($booking_to_date);
// print esc_html($booking_from_date).' <strong>'.esc_html__( 'to','wprentals').'</strong> '.esc_html($booking_to_date);
print esc_html($booking_from_date);
?>
