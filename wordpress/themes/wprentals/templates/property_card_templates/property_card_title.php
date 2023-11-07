<?php
$link = esc_url(get_permalink());
if( wprentals_get_option('wp_estate_prop_page_new_tab','')=='_self' ){ ?>
    <a  itemprop="url"  onclick="return setdateCookie(this)"  href="<?php echo esc_url($link);?>"  class="listing_title_unit" data-listid="<?=get_the_ID();?>">
<?php         
    }else{
?>

<a itemprop="url" onclick="return setdateCookie(this)"  href="<?php print esc_url($link);?>" class="listing_title_unit" target="<?php  echo esc_attr(wprentals_get_option('wp_estate_prop_page_new_tab',''));?>" data-listid="<?=get_the_ID();?>">

<?php } ?>
    
    
<!--    <span itemprop="name">-->
    <?php

        $title_str = html_entity_decode($title);
        $size_str = 60;

        $title_cropped = mb_substr($title_str, 0, 60, "utf-8") ;

        if(strlen($title_cropped)==$size_str){
            echo mb_substr($title_str, 0, mb_strrpos( $title_cropped ,' ', 0,'utf-8'), 'utf-8');
            echo '...';
        }else{
          print esc_html($title_cropped);
        }

    ?>
<!--    </span>-->
</a>

<script type="text/javascript">
    function setdateCookie(thisObj) {
        var listID = thisObj.getAttribute("data-listid");
        wpestate_setCookie('booking_prop_id_cookie', listID, 1);
        return true;
    }
</script>