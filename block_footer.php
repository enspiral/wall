<script  src="<?php echo $base_url; ?>js/lib-scrool/1.6.1.jquery.min.js"></script>
<script type='text/javascript'> var $jq161 = jQuery.noConflict();</script>
<script type="text/javascript">
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

        <p class="back-top">
            <a href="#top"><span></span></a>
      </p>

<div id='footer'>
<a href="http://www.codingate.com/">Powered by Codingate</a>  | <a href="http://www.carepositioningsystem.org/">Terms</a> | <a href="http://www.carepositioningsystem.org/">About me</a>  
<!--<br/><br/>Srinivas Tamada Production - Made in India-->
</div>