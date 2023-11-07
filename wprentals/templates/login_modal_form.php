<?php
global $post;
global $wpestate_social_login;
$type=0;
if( isset( $_POST['type'] ) ){
    $type   =   intval($_POST['type']);
}

$ispop  =   0;

if(isset($post->ID)){
    $wpestate_propid =   intval($post->ID);
}

$show_login     =   '';
$show_register  =   '';
$login_text     =   0;

if(isset ( $_POST['login_modal_type'] ) ){
    $login_text     =   intval($_POST['login_modal_type']);
}

if(wprentals_get_option('wp_estate_item_rental_type')!=1){
    $mesaj_big  =   esc_html__( 'Log in to your account','wprentals');
}else{
    $mesaj_big  =   esc_html__( 'Log in to your account','wprentals');
}
$sub_mesaj  =   esc_html__( 'Please fill in the log in or register forms','wprentals');
if($login_text==2){
    $mesaj_big  =   esc_html__( 'Please login!','wprentals');
    $sub_mesaj  =   esc_html__( 'You need to login in order to send a message','wprentals');
}else if($login_text==3){
    $mesaj_big  =   esc_html__( 'Please login!','wprentals');
    $sub_mesaj  =   esc_html__( 'You need to login in order to book a listing','wprentals');
}

$separate_users             =   esc_html( wprentals_get_option('wp_estate_separate_users','') );
$social_register_on         =   esc_html( wprentals_get_option('wp_estate_social_register_on','') );
$enable_user_pass_status    =   esc_html(wprentals_get_option('wp_estate_enable_user_pass', ''));
$wp_estate_use_captcha      =   esc_html(wprentals_get_option('wp_estate_use_captcha', ''));


$modal_image                =   wprentals_get_option('wp_estate_modal_image', 'url');
if($modal_image===''){
  $modal_image  = get_template_directory_uri() . '/img/modal_default.png';
}

$facebook_status            = esc_html( wprentals_get_option('wp_estate_facebook_login','') ) ;
$google_status              = esc_html( wprentals_get_option('wp_estate_google_login','') );
$twiter_status              = esc_html( wprentals_get_option('wp_estate_twiter_login','') );
$login_modal_class          = '';



$login_modal_height=450;
$control_height=550;


if($social_register_on=='yes'){
  if($facebook_status=='yes'){
      $login_modal_height=$login_modal_height+50;
  }
  if($google_status=='yes'){
      $login_modal_height=$login_modal_height+50;
  }
  if($twiter_status=='yes'){
      $login_modal_height=$login_modal_height+50;
  }
}

if ($separate_users=='yes') {
  $login_modal_height=$login_modal_height+44;
}

if($enable_user_pass_status=='yes'){
  $login_modal_height=$login_modal_height+140;
}

if($wp_estate_use_captcha=='yes'){
$login_modal_height=$login_modal_height+79;
}

if($login_modal_height < $control_height){
  $login_modal_height=$control_height;
}
//#loginmodal.with_social .modal-dialog

$wp_estate_enable_user_phone= esc_html ( wprentals_get_option('wp_estate_enable_user_phone','') );
if($wp_estate_enable_user_phone == 'yes' ){
  $login_modal_height=$login_modal_height+70;
}




?>

<!-- Modal -->
<div class="modal fade " id="loginmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="height:<?php echo intval($login_modal_height);?>px">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <div class="modal-body">
                <div id="ajax_login_div" class="<?php echo esc_html($show_login);?> ">

                      <div class="modal-header">
                        <h2 class="modal-title_big" ><?php  echo esc_html__( 'Log in to your account','wprentals');?></h2>
                      </div>

                      <div class="loginalert" id="login_message_area" ></div>

                      <div class="loginrow password_holder">
                          <input type="text" class="form-control dofocus" name="log" id="login_user" autofocus placeholder="<?php echo esc_html__( 'Username','wprentals');?>" size="20" />
                      </div>

                      <div class="loginrow password_holder">
                            <input type="password" class="form-control" name="pwd" placeholder="<?php echo esc_html__( 'Password','wprentals');?>" id="login_pwd" size="20" />
                            <i class=" far fa-eye-slash show_hide_password"></i>
                      </div>

                      <input type="hidden" name="loginpop" id="loginpop" value="<?php echo esc_attr($ispop);?>">
                      <input type="hidden" id="security-login" name="security-login" value="<?php echo estate_create_onetime_nonce( 'login_ajax_nonce' );?>">

                      <button id="wp-login-but" class="wpb_button  wpb_btn-info  wpb_regularsize   wpestate_vc_button  vc_button" data-mixval="<?php esc_attr($wpestate_propid); ?>"><?php echo esc_html__( 'Login','wprentals');?></button>
                      <div class="navigation_links">
                          <a href="#" id="reveal_register"><?php echo esc_html__( 'Don\'t have an account?','wprentals');?></a> |
                          <a href="#" id="forgot_password_mod"><?php echo esc_html__( 'Forgot Password','wprentals');?></a>
                      </div>
                      <?php
                        $check_pt = get_post_type();
                        //  2023/2/5 デイユース開発 高橋（コメントアウト）---
                        // if($check_pt === 'estate_property'){
                      ?>
                        <!-- <div class="btn-nc">
                          <span><?php //echo esc_html__( 'Book room','wprentals');?></span>
                        </div> -->
                      <?php //} ?>


                    <?php

                    if($facebook_status=='yes' || $google_status=='yes' || $twiter_status=='yes' ){ ?>
                        <div class="login-links" >
                         <?php
                            if(class_exists('Wpestate_Social_Login')){
                                print  trim($wpestate_social_login->display_form('',1));
                            }
                         ?>
                       </div> <!-- end login links-->
                    <?php
                    }
                    ?>

                </div><!-- /.ajax_login_div -->

                <div id="ajax_register_div" class="<?php echo esc_attr($show_register);?>">
                  <div class="modal-header">
                    <h2 class="modal-title_big" ><?php echo esc_html__('Create an account','wprentals');?></h2>
                  </div>
                      <?php echo do_shortcode('[register_form type=""][/register_form]');?>
                      <div class="navigation_links">
                        <a href="#"  id="reveal_login"><?php echo esc_html__( 'Already a member? Sign in!','wprentals');?></a>
                      </div>

                      <?php
                      if($social_register_on=='yes'){ ?>
                           <div class="login-links" >
                           <?php
                           if(class_exists('Wpestate_Social_Login')){
                               print trim($wpestate_social_login->display_form('register',1));
                           }
                           ?>
                           </div> <!-- end login links-->
                      <?php
                      }
                      ?>

                </div>


                <div  id="forgot-pass-div_mod" style="display:none;">

                      <div class="modal-header">
                        <h2 class="modal-title_big" ><?php  echo esc_html__( 'Forgot Password','wprentals');?></h2>
                      </div>
                      <div class="loginalert" id="forgot_pass_area_shortcode"></div>
                      <div class="loginrow">
                         <input type="text" class="form-control forgot_email_mod" name="forgot_email" id="forgot_email_mod" placeholder="<?php echo esc_html__( 'Enter Your Email Address','wprentals');?>" size="20" />
                      </div>
                      <?php  wp_nonce_field( 'login_ajax_nonce_forgot_wd', 'security-login-forgot_wd',true);?>
                      <input type="hidden" id="postid" value="0">
                      <button class="wpb_button  wpb_btn-info  wpb_regularsize wpestate_vc_button  vc_button" id="wp-forgot-but_mod" name="forgot" ><?php echo esc_html__( 'Reset Password','wprentals');?></button>

                      <div class="navigation_links">
                        <a href="#" id="return_login_mod"><?php echo esc_html__( 'Return to Login','wprentals');?></a>
                      </div>

                </div>





                <div class="modal_login_image_wrapper">
                  <div class="modal_login_image" style="background-image:url(<?php echo esc_url($modal_image);?>)"></div>
                </div>
                <div class="content-frm-bk">
                    <h2 class="modal-title_big" ><?php  echo esc_html__( 'Booking information','wprentals');?></h2>
                    <div class="form-booking-res">
                      <form class="form-bk" action="#" method="post">
                        <div class="item-grp">
                          <input type="text" name="name" id="name" placeholder="<?php echo esc_html__( 'Name','wprentals');?>">
                        </div>
                        <div class="item-grp">
                          <input type="email" name="email" id="email" placeholder="<?php echo esc_html__( 'Email','wprentals');?>">
                        </div>
                        <div class="item-grp">
                          <input type="number" name="phone" id="phone" placeholder="<?php echo esc_html__( 'Phone','wprentals');?>">
                        </div>  
                        <div class="item-grp input-date">
                          <label><?php echo esc_html__( 'Date','wprentals');?></label>
                          <p><?php _e( 'From', 'wprentals' ); ?> <span class="from"></span> <?php _e( 'To', 'wprentals' ); ?> <span class="to"></span></p>
                        </div>   
                        <div class="item-grp input-guest">
                          <label><?php echo esc_html__( 'Guest','wprentals');?></label>
                         <p>
                           <?php _e( 'Adults:', 'wprentals' ); ?> <span class="adults"></span> | 
                           <?php _e( 'Children:', 'wprentals' ); ?> <span class="ichildren"></span> | 
                           <?php _e( 'Infants:', 'wprentals' ); ?> <span class="infants"></span>
                         </p>
                        </div>  

                        <?php if( get_post_meta( get_the_ID(), 'extra_pay_options' ) ) { ?>
                        <div class="item-grp input-plan">
                          <label><?php echo esc_html__( 'Plan','wprentals');?></label>
                          <p></p>
                        </div>   
                      <?php }; ?>

                        <div class="btn-submit">
                          <input class="btn-form" type="submit" value="<?php echo esc_html__( 'Submit','wprentals');?>" />
                        </div>
                      </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->


          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
</div> <!-- /.login model -->
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".btn-form").click(function(){
      if(jQuery('html').attr('lang')=='ja'){
        $(".form-bk").validate({
          onfocusout: false,
          rules: {
            "name": {
              required: true,
            },
            "phone": {
              required: true,
              minlength: 10  
            },
            "email": {
              required: true,
              email: true,
            },
          },
          messages: {
              "name": {
                required: "姓名は必須フィールドです。",
              },
              "phone": {
                required: "電話番号は必須フィールドです。",
                minlength: "9文字以上入力してください"
              },
              "email": {
                required: "メールアドレスを入力してください",
                email: "正しいメール形式を入力してください",
              },
          },
          highlight: function(element) {
              $(element).parent().addClass("field-error");
          },
          unhighlight: function(element) {
              $(element).parent().removeClass("field-error");
          }
        });
      }else{
        $(".form-bk").validate({
          onfocusout: false,
          rules: {
            "name": {
              required: true,
            },
            "phone": {
              required: true,
              minlength: 10  
            },
            "email": {
              required: true,
              email: true,
            },
          },
          messages: {
              "name": {
                required: "First and last name are required fields.",
              },
              "phone": {
                required: "Phone number is a required field.",
                minlength: "Please enter at least 9 characters"
              },
              "email": {
                required: "Please enter your email address",
                email: "Please enter the correct email format",
              },
          },
          highlight: function(element) {
              $(element).parent().addClass("field-error");
          },
          unhighlight: function(element) {
              $(element).parent().removeClass("field-error");
          }
        });
      }
    })

    $(".btn-nc span").click(function(event){
      event.preventDefault();
      $("#ajax_login_div").addClass("hidden");
      $('.content-frm-bk').addClass('block');
    });

    $("#submit_booking_front").click(function(event){
      var start_date = $( '#booking_form_request #start_date' ).val();
      var end_date = $( '#booking_form_request #end_date' ).val();
      var adults_fvalue = $( '#booking_form_request input[name="adults_fvalue"]' ).val();
      var infants_fvalue = $( '#booking_form_request input[name="infants_fvalue"]' ).val();
      var childs_fvalue = $( '#booking_form_request input[name="childs_fvalue"]' ).val();
      <?php if( get_post_meta( get_the_ID(), 'extra_pay_options' ) ) { ?>
        var plan = $( '#booking_form_request input[name="checkbox"]:checked' ).parent().text();
        if( plan.length > 0 ) {
          $( '.form-booking-res .input-plan p' ).text( plan );
        } else {
          $( '.form-booking-res .input-plap' ).hide();
        }
      <?php }; ?>

      $( '.form-booking-res .input-date span.from' ).text( start_date );
      $( '.form-booking-res .input-date span.to' ).text( end_date );
      $( '.form-booking-res .input-guest span.adults' ).text( adults_fvalue );
      $( '.form-booking-res .input-guest span.ichildren' ).text( infants_fvalue );
      $( '.form-booking-res .input-guest span.infants' ).text( childs_fvalue );

    });

    $(".form-booking-res form").submit(function(event){
      event.preventDefault();
      var _this = $( this );
      var name = $( this ).find( 'input[name="name"]' ).val();
      var email = $( this ).find( 'input[name="email"]' ).val();
      var phone = $( this ).find( 'input[name="phone"]' ).val();

      var start_date = $( '#booking_form_request #start_date' ).val();
      var end_date = $( '#booking_form_request #end_date' ).val();
      var adults_fvalue = $( '#booking_form_request input[name="adults_fvalue"]' ).val();
      var infants_fvalue = $( '#booking_form_request input[name="infants_fvalue"]' ).val();
      var childs_fvalue = $( '#booking_form_request input[name="childs_fvalue"]' ).val();
      <?php if( isset( $_GET['room_id'] ) && get_post_meta( $_GET['room_id'], 'main_room_id', true ) ) { ?>
        var listing_edit = '<?php echo get_post_meta( $_GET['room_id'], 'main_room_id', true ); ?>';
      <?php } else { ?>
        var listing_edit = $( '#booking_form_request input[name="listing_edit"]' ).val();
      <?php }; ?>
      <?php if( get_post_meta( get_the_ID(), 'extra_pay_options' ) ) { ?>
        var pl = $( '#booking_form_request input[name="checkbox"]:checked' ).parent().text();
      <?php }; ?>

      $.ajax({
        type : "post",
        dataType : "json", 
        url : '<?php echo admin_url('admin-ajax.php');?>', 
        data : {
            action: "anothemes_create_booking",
            sdate : start_date,
            edate : end_date,
            adults : adults_fvalue,
            infants : infants_fvalue,
            childs : childs_fvalue,
            property_id : listing_edit,
            fullname : name,
            mail : email,
            tel : phone,
            <?php if( get_post_meta( get_the_ID(), 'extra_pay_options' ) ) { ?>
              plan : pl
            <?php }; ?>
        },
        context: this,
        beforeSend: function(){
          $( _this ).find('input[type="submit"]').prop('disabled', true);
          if(jQuery('html').attr('lang')=='ja'){
            $( _this ).find('input[type="submit"]').val('送信中です。お待ちください...');
          }else{ 
            $( _this ).find('input[type="submit"]').val('Sending, Please wait...');
          }
        },
        success: function(response) {
            if( response['data'] === 'ok' ) {
              if(jQuery('html').attr('lang')=='ja'){
                $( _this ).append('<p class="alert success">データ編集成功！</p>');
                $( _this ).find('input[type="submit"]').val('無事');
              }else{              
                $( _this ).append('<p class="alert success">Edit data successfully!</p>');
                $( _this ).find('input[type="submit"]').val('Successfully');
              }
            } else {
              if(jQuery('html').attr('lang')=='ja'){
                $( _this ).append('<p class="alert error">失敗。 もう一度お試しください</p>');
              }else{              
                $( _this ).append('<p class="alert error">Unsuccessful. Please try again</p>');
              }
            };
        },
        error: function( jqXHR, textStatus, errorThrown ){
            console.log( 'The following error occured: ' + textStatus, errorThrown );
        }
    })
    });

  })
</script>
