<?php 
	$vol_opps = mysqli_query($db,"select * from com_volunteer_opp where com_id= ".$com_id.";");
 ?>
<div class="text">
	<center>
	<h3 style="color:pink;">Visit Cambodia</h3>
	<h2>Volunteer in Cambodia</h2>
</center>
<div class="vol_in_cam">
	<div class="vol_img">
		<img src="<?php echo $base_url; ?>images/commnunities/volunteer/volunteer_in_cam.PNG">
	</div>
	<div class="vol_content">
		<h4>The volunteer In Cambodia</h4>
		<p>In collaboration with the State University of New York (SUNY) and Pāññāsastra University of Cambodia (PUC), GSC offers a 15-week, 15-credit Cambodia semester program this Spring. Focused on social development in post-conflict societies, the program combines an intensive foundations course, nine weeks of field work with an NGO, and a final Capstone project.</p>
	</div>
	<center><h3>Volunteer Opportunities in Cambodia</h3></center>
	<span class="edit-icon"><a href="<?php echo $base_url; ?>community/community.php?com=dashboard&side=health&tab=volunteer&volunteer=edit_home"><i class="glyphicon glyphicon-edit"></i></a></span>
	<p style="text-align:justify;">The Cambodians endured Genocide during the Khmer Rouge and Pol Pot era (1975-1979), resulting in 2 million deaths or 25% of the population. Every family lost at least one member. Today, 65% of the population is under the age of 25 years. The poverty is widespread and yet, being very proud and hardworking the Cambodians do whatever it takes to make ends meet.</p>
	<div class="volun_opp">
		<div class="row">
		<?php foreach ($vol_opps as $vol_opp) {?>
		  <div class="col-sm-6 col-md-6">
		    <div class="thumbnail">
		      <img src="<?php echo $base_url; ?>images/commnunities/volunteer/<?php echo $vol_opp['img'] ?>" alt="...">
		      <div class="caption">
		        <h3><?php echo $vol_opp['title']; ?></h3>
		        <p><?php echo $vol_opp['content'] ?></p>
		       </div>
		    </div>
		  </div>
		<?php } ?>
		</div>
	</div>
	<center>
		<button class="btn invole " >Get Involved</button>
	</center>
</div>
</div>
