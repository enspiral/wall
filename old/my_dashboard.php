<style>
    .full-width {
    width: 100%;
    background-color: #808080;
}
.col-md-3 {
    background-color: #4f4;
}
.col-md-9 {
    background-color: #f4f;
}

</style>
<script  src="<?php echo $base_url; ?>js/lib-scrool/1.6.1.jquery.min.js"></script>
<script type='text/javascript'> var $jq161 = jQuery.noConflict();</script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> -->
<script>
$jq161(document).ready(function(){

  // hide #back-top first
  $jq161(".back-top").hide();
  
  // fade in #back-top
  $jq161(function () {
    $jq161(window).scroll(function () {
      if ($jq161(this).scrollTop() > 100) {
        $jq161('.back-top').fadeIn();
      } else {
        $jq161('.back-top').fadeOut();
      }
    });

    // scroll body to 0px on click
    $jq161('.back-top a').click(function () {
      $jq161('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  });

});
</script>
    <div class="container">

    <div class="sidebar-left">
        <?php include_once 'block_left_dashboard.php'; ?>
    </div>
    <div class="middle-content">
        <?php
        include('block_updates.php');
        ?>
    </div>
    <div class="sidebar-right-dabshoard">
        <?php include_once 'block_right.php'; ?>
        <p class="back-top">
            <a href="#top"><span></span></a>
      </p>
    </div>
</div>
