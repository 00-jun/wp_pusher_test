<!-- Modal -->
<div class="modal fade " id="bk_form" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="height:<?php echo intval($login_modal_height);?>px">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        <div class="modal-body">
          <div class="content-frm-bk">
            <h2 class="modal-title_big" ><?php  echo esc_html__( 'Booking information','wprentals');?></h2>
            <div class="form-booking-res">
              <form class="form-bk" action="#" method="post">
                <div class="item-grp">
                  <input type="text" name="name" id="name" placeholder="<?php echo esc_html__( 'Username','wprentals');?>">
                </div>
                <div class="item-grp">
                  <input type="email" name="email" id="email" placeholder="<?php echo esc_html__( 'Email','wprentals');?>">
                </div>
                <div class="item-grp">
                  <input type="number" name="phone" id="phone" placeholder="<?php echo esc_html__( 'Phone','wprentals');?>">
                </div>    
                <div class="btn-submit">
                  <input class="btn-form" type="submit" value="Submit" />
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
    })
  })
</script>