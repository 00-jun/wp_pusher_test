<?php
/**
 * Template Name: Booking complete
 */

 $book_id = $_GET['param'];
get_header(); ?>

<div class="bc_container">
    <h2 class="bc_title"><?php esc_html_e('Thank you for your reservation request!','wprentals');?></h2>
    <p class="bc_text"><?php esc_html_e('A reservation request has been sent to the property owner. The reservation will be completed as soon as the owner confirms the booking.','wprentals');?></p>

    <div class="bc_wrap">
        <div class="bc_inner_title"><?php esc_html_e('Reservation Number','wprentals');?></div>
        <div class="bc_number"><?php echo esc_html($book_id) ?></div>
        <div class="bc_inner_text"><?php esc_html_e('This number is required for any inquiries. Please keep it safe.','wprentals');?></div>
    </div>

    <p class="bc_text"><?php esc_html_e('You can review your reservation details on the reservation confirmation page.','wprentals');?></p>

    <div class="bc_button"><a href="<?php echo wpestate_get_template_link('user_dashboard_my_reservations.php')?>"><?php esc_html_e('Go to Reservations Page','wprentals');?></a></div>
</div>


<?php get_footer(); ?>