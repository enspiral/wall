<div class="text">
<h3 class="text-center register-text">How to Embed Map for CPS Turtorial</h3>
<hr>
<b>Search your location on Gooogl Maps</b>
<p>Browse <a href="https://www.google.com.kh/maps?source=tldsi&hl=en" target="_blank">maps.google.com</a> and search for your community location</p>
<div><img src="<?php echo $base_url;?>images/maps/spe1.png" style="width:842px; height:400px;"></div><br/><br/>
<b>Click on Setting Button</b>
<p>after you found your community location. Please click on the place to point it and click on Setting button below, and then select Share or embed map</p>
<div><img src="<?php echo $base_url;?>images/maps/step2.png" style="width:842px; height:400px;"></div><br/><br/>
<b>Copy Embed Code</b>
<p>Select the Embed map tab, then copy the embed code</p>
<div><img src="<?php echo $base_url;?>images/maps/step3.png" style="width:842px; height:400px;"></div><br/><br/>
<b>Paste Embed Code in Our CPS</b>
<p>paste the embed code in the textbox of Edit Map in Project->Beneficiary:
please delete the back part including double qoute ("").Keep only the red part, and don't use spacebar.</p>
<?php 
   echo htmlspecialchars("<iframe src=").'"<span class="notes">https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250151.42198261584!2d104.89018675!3d11.5793642500000 05!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109513dc76a6be3%3A0x 9c010ee85ab525bb!2sPhnom+Penh!5e0!3m2!1sen!2skh!4v1433146620364" </span> '. htmlspecialchars('width="600" height="450" frameborder="0" style="border:0"'."</iframe>");
    ?>
    <br/><br/>
   <div><img src="<?php echo $base_url;?>images/maps/step4.png" style="width:842px; height:400px;"></div><br/><br/>
</div>