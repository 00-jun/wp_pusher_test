<?php
if(isset($userid_agent) && intval($userid_agent)!=0) {
    print '<a href="'.esc_url ( get_permalink($userid_agent) ).'" target="_blank" > '. esc_html($author).' </a>';
}else{
    print esc_html($author);
}


$usermail = get_the_author_meta( 'email', $author_id );
$usermobile = get_the_author_meta( 'mobile', $author_id );

$booking_fullname = (get_post_meta($post->ID, 'booking_fullname', true)) ? get_post_meta($post->ID, 'booking_fullname', true) : '';
$booking_mail = (get_post_meta($post->ID, 'booking_mail', true)) ? get_post_meta($post->ID, 'booking_mail', true) : '';
$booking_tel = (get_post_meta($post->ID, 'booking_tel', true)) ? get_post_meta($post->ID, 'booking_tel', true) : '';
?>
<?php if ($booking_fullname || $booking_mail || $booking_tel): ?>
    <p><?=$booking_fullname;?></p>
    <p><?=$booking_mail;?></p>
    <p><?=$booking_tel;?></p>
<?php else: ?>
    <?php if ($usermail): ?>
        <p><?=$usermail;?></p>
    <?php endif; ?>
    <?php if ($usermobile): ?>
        <p><?=$usermobile;?></p>
    <?php endif; ?>
<?php endif ?>

