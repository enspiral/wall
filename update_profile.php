<style>
    .wraper-div{
        background: #FFF none repeat scroll 0% 0%;
        width: 1045px;
        margin-left: auto;
        margin-right: auto;
        padding: 40px;
    }
    .text-red{
        color: red;
    }
    .bootstrap-tagsinput{
        width: 100%;
    }
</style>

<?php 
    $userdetails= $Wall->User_Details($uid); 
    $email=$userdetails['email'];
    $contact=$userdetails['phone'];
    $usr_skills=$userdetails['skills'];
    $usr_interest=$userdetails['interest'];
    $birthday=$userdetails['birthday'];
    $country=$userdetails['country'];
    $nationality=$userdetails['nationality'];
    $address=$userdetails['address'];
    $fname=$userdetails['first_name'];
    $lname=$userdetails['last_name'];
    $gender =$userdetails['gender'];
    $join_us = $userdetails['join_us'];
    $contribute = $userdetails['contribute'];
    $message_leader = $userdetails['message_leader'];

    
    //get owner project........
    $gid = $_GET['gid'];
    $email_groupowner = $Wall->groupOwnerEmail($gid);

    if(isset($_POST['update_profile'])){
    
       $update_first_name   = $_POST['first_name'];
       $update_last_name    = $_POST['last_name'];
       $update_gender       = $_POST['gender'];
       $update_dob          = $_POST['dob'];
       $update_usr_country  = $_POST['usr_country'];
       $update_national     = $_POST['nationality']; 
       $update_email        = $_POST['email']; 
       $update_phone        = $_POST['phone'];
       $update_address      = $_POST['address'];
       $update_skills       = $_POST['skills'];
       $update_interest     = $_POST['interest'];
       $update_join_us = $_POST['join_us'];
       $update_contribute = $_POST['contribute'];
       $update_message = $_POST['message_leader'];
       $file_id_card = '';

            mysqli_query($db, "UPDATE users SET
               email        ='$update_email',
               first_name   ='$update_first_name',
               last_name    ='$update_last_name',
               gender       ='$update_gender',
               birthday     ='$update_dob',
               country      ='$update_usr_country',
               nationality  ='$update_national',
               phone        ='$update_phone',
               address      ='$update_address',
               skills       ='$update_skills',
               interest     ='$update_interest',
               join_us      ='$update_join_us',
               contribute   ='$update_contribute',
               message_leader  ='$update_message'
               WHERE uid ='$uid'");
              $to = "phansaorin@gmail.com";

		$subject = 'Website Change Request';
		$headers  = "From:saorinphan@gmail.com \r\n"."CC: "."rottanaly@gmail.com";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
              // $to = "phansaorin@gmail.com";
	     // $subject = "This is subject";
	       $message = '<html><body>';
		$message .= '<img src="http://demo.volunteerbetter.com/images/email-logo.png" alt="volunteerbetter logo" />';
		$message .= '<h2>Basic Information</h2>';
		$message .= '<table rules="all" style="border-color: #666;width:600px;" cellpadding="10">';
		$message .= "<tr style='background: #eee;'><td><strong>First Name:</strong> </td><td>" . strip_tags($update_first_name) . "</td></tr>";
		$message .= "<tr><td><strong>Last Name:</strong> </td><td>" . htmlentities($update_last_name) . "</td></tr>";
		$message .= "<tr><td><strong>Gender :</strong> </td><td>" . htmlentities($update_gender) . "</td></tr>";
		$message .= "<tr><td><strong>Date of Birth:</strong> </td><td>" . htmlentities($update_dob) . "</td></tr>";
		$message .= "<tr><td><strong>Country:</strong> </td><td>" . htmlentities($update_usr_country) . "</td></tr>";
		$message .= "<tr><td><strong>National:</strong> </td><td>" . htmlentities($update_national) . "</td></tr>";
		$message .= "<tr><td><strong>Email:</strong> </td><td>" . htmlentities($update_email) . "</td></tr>";
		$message .= "<tr><td><strong>Phone Number:</strong> </td><td>" . htmlentities($update_phone) . "</td></tr>";
		$message .= "<tr><td><strong>Address:</strong> </td><td>" . htmlentities($update_address) . "</td></tr>";
		$message .= "</table>";
		$message .= '<h2>Skills And Interests</h2>';
	        $message .= '<table rules="all" style="border-color: #666;  width:600px;" cellpadding="10">';
		$message .= "<tr style='background: #eee;'><td><strong>Skills:</strong> </td><td>" . htmlentities($update_skills) . "</td></tr>";
		$message .= "<tr><td><strong>Interests:</strong> </td><td>" . htmlentities($update_interest) . "</td></tr>";
		$message .= "</table>";
		$message .= '<h2>Questions And Answers</h2>';
	        $message .= '<table rules="all" style="border-color: #666; width:600px;" cellpadding="10">';
		$message .= "<tr style='background: #eee;'><td><strong>Why do you join us? :</strong> </td><td>" . strip_tags($update_join_us ) . "</td></tr>";
		$message .= "<tr><td><strong>How can you contribute? :</strong> </td><td>" . htmlentities($update_contribute ) . "</td></tr>";
		$message .= "<tr><td><strong>Message to the learder? :</strong> </td><td>" . htmlentities($update_message ) . "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";

	 
		 $retval =  mail ($to,$subject,$message ,$headers);
		
		   if($retval == true )  
		   {?>
		      <div class="alert alert-success fade in">
				    <a href="#" class="close" data-dismiss="alert">&times;</a>
				    <strong>Success!</strong> Your message has been sent successfully.
				</div>
		<?php   
		 $mapUrl = $base_url.'group.php?gid='.$grd;
   		 header('Location:'.$mapUrl);
		}
		   else
		   {
		     echo "Message could not be sent...";
		   }
		  
           
                
        mysqli_query($db,"INSERT INTO project_involvement(group_id,uid)
                VALUES('$gid','$uid')");
                
             // header('Location: '.$base_url.'group.php?gid='.$gid);
             
        
    }
?>
<div class="wraper-div">
    <h2 class="text-pink text-center">Please give us your personal information !</h2><br/>
    <div class="bs-example">
        <h3 class="text-title">Basic Information</h3><hr style="width:93%;"/>
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="first_name" class="control-label col-xs-2">First Name :</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $fname; ?>" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="last_name" class="control-label col-xs-2">Last Name :</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $lname; ?>" required="">
                </div>
            </div>
            <div class="form-group">
               <label for="gender" class="control-label col-xs-2"> Gender :</label>
                <div class="col-xs-9">
                    <select class="usr_country form-control text-input form-control" id="gender" name="gender">
                         <option value="0">--select Gender--</option>
                        <option value="male" <?php echo $gender==1?'selected':''; ?>>Male</option>
                        <option value="Female" <?php echo $gender==2?'selected':''; ?>>Female</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
               <label for="dob" class="control-label col-xs-2"> Date Of Birth :</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="dob" name="dob" placeholder="Date Of Birth" value="<?php echo $birthday; ?>" required="">
                </div>
            </div>
            <div class="form-group">
               <label for="usr_country" class="control-label col-xs-2"> Country :</label>
                <div class="col-xs-9">
                    <?php include_once 'country_list.php';?>
                    <select class="usr_country form-control text-input form-control" name="usr_country" id="usr_country" >
                        <?php 
                        foreach ($country_list as $country_data) {
                            if($country == $country_data)
                            {
                                $sel = 'selected = "selected"'; 
                            }
                            else
                            {
                                $sel = " ";
                            }
                            echo '<option value="'.$country_data.'" ' .$sel . ' >'.$country_data.'</option>';

                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
               <label for="national" class="control-label col-xs-2">National <?php echo $nationality;?>:</label>
                <div class="col-xs-9">
                    <select name="nationality" class="form-control" id="nationality">
                        <option value="">-- select one --</option>
                        <option value="afghan" <?php echo $nationality=='afghan'?'selected':''; ?>>Afghan</option>
                        <option value="albanian" <?php echo $nationality=='albanian'?'selected':''; ?>>Albanian</option>
                        <option value="algerian" <?php echo $nationality=='algerian'?'selected':''; ?>>Algerian</option>
                        <option value="american" <?php echo $nationality=='american'?'selected':''; ?>>American</option>
                        <option value="andorran" <?php echo $nationality=='andorran'?'selected':''; ?>>Andorran</option>
                        <option value="angolan" <?php echo $nationality=='angolan'?'selected':''; ?>>Angolan</option>
                        <option value="antiguans" <?php echo $nationality=='antiguans'?'selected':''; ?>>Antiguans</option>
                        <option value="argentinean" <?php echo $nationality=='argentinean'?'selected':''; ?>>Argentinean</option>
                        <option value="armenargentineanian" <?php echo $nationality=='armenargentineanian'?'selected':''; ?>>Armenian</option>
                        <option value="australian" <?php echo $nationality=='australian'?'selected':''; ?>>Australian</option>
                        <option value="austrian" <?php echo $nationality=='austrian'?'selected':''; ?>>Austrian</option>
                        <option value="azerbaijani" <?php echo $nationality=='azerbaijani'?'selected':''; ?>>Azerbaijani</option>
                        <option value="bahamian" <?php echo $nationality=='bahamian'?'selected':''; ?>>Bahamian</option>
                        <option value="bahraini" <?php echo $nationality=='bahraini'?'selected':''; ?>>Bahraini</option>
                        <option value="bangladeshi" <?php echo $nationality=='bangladeshi'?'selected':''; ?>>Bangladeshi</option>
                        <option value="barbadian" <?php echo $nationality=='barbadian'?'selected':''; ?>>Barbadian</option>
                        <option value="barbudans" <?php echo $nationality=='barbudans'?'selected':''; ?>>Barbudans</option>
                        <option value="batswana" <?php echo $nationality=='batswana'?'selected':''; ?>>Batswana</option>
                        <option value="belarusian" <?php echo $nationality=='belarusian'?'selected':''; ?>>Belarusian</option>
                        <option value="belgian" <?php echo $nationality=='belgian'?'selected':''; ?>>Belgian</option>
                        <option value="belizean" <?php echo $nationality=='belizean'?'selected':''; ?>>Belizean</option>
                        <option value="beninese" <?php echo $nationality=='beninese'?'selected':''; ?>>Beninese</option>
                        <option value="bhutanese" <?php echo $nationality =='cambodian'?'selected':''; ?>>Bhutanese</option>
                        <option value="bolivian" <?php echo $nationality =='bolivian'?'selected':''; ?>>Bolivian</option>
                        <option value="bosnian" <?php echo $nationality =='bosnian'?'selected':''; ?>>Bosnian</option>
                        <option value="brazilian" <?php echo $nationality =='brazilian'?'selected':''; ?>>Brazilian</option>
                        <option value="british" <?php echo $nationality =='british'?'selected':''; ?>>British</option>
                        <option value="bruneian" <?php echo $nationality =='bruneian'?'selected':''; ?>>Bruneian</option>
                        <option value="bulgarian" <?php echo $nationality =='bulgarian'?'selected':''; ?>>Bulgarian</option>
                        <option value="burkinabe" <?php echo $nationality =='burkinabe'?'selected':''; ?>>Burkinabe</option>
                        <option value="burmese" <?php echo $nationality =='burmese'?'selected':''; ?>>Burmese</option>
                        <option value="burundian" <?php echo $nationality =='burundian'?'selected':''; ?>>Burundian</option>
                        <option value="cambodian" <?php echo $nationality =='cambodian'?'selected':''; ?>>Cambodian</option>
                        <option value="cameroonian" <?php echo $nationality =='cameroonian'?'selected':''; ?>>Cameroonian</option>
                        <option value="canadian" <?php echo $nationality =='canadian'?'selected':''; ?>>Canadian</option>
                        <option value="cape verdean" <?php echo $nationality =='cape verdean'?'selected':''; ?>>Cape Verdean</option>
                        <option value="central african" <?php echo $nationality =='central african'?'selected':''; ?>>Central African</option>
                        <option value="chadian" <?php echo $nationality =='chadian'?'selected':''; ?>>Chadian</option>
                        <option value="chilean" <?php echo $nationality =='chilean'?'selected':''; ?>>Chilean</option>
                        <option value="chinese" <?php echo $nationality =='chinese'?'selected':''; ?>>Chinese</option>
                        <option value="colombian">Colombian</option>
                        <option value="comoran">Comoran</option>
                        <option value="congolese">Congolese</option>
                        <option value="costa rican">Costa Rican</option>
                        <option value="croatian">Croatian</option>
                        <option value="cuban">Cuban</option>
                        <option value="cypriot">Cypriot</option>
                        <option value="czech">Czech</option>
                        <option value="danish">Danish</option>
                        <option value="djibouti">Djibouti</option>
                        <option value="dominican">Dominican</option>
                        <option value="dutch">Dutch</option>
                        <option value="east timorese">East Timorese</option>
                        <option value="ecuadorean">Ecuadorean</option>
                        <option value="egyptian">Egyptian</option>
                        <option value="emirian">Emirian</option>
                        <option value="equatorial guinean">Equatorial Guinean</option>
                        <option value="eritrean">Eritrean</option>
                        <option value="estonian">Estonian</option>
                        <option value="ethiopian">Ethiopian</option>
                        <option value="fijian">Fijian</option>
                        <option value="filipino">Filipino</option>
                        <option value="finnish">Finnish</option>
                        <option value="french">French</option>
                        <option value="gabonese">Gabonese</option>
                        <option value="gambian">Gambian</option>
                        <option value="georgian">Georgian</option>
                        <option value="german">German</option>
                        <option value="ghanaian">Ghanaian</option>
                        <option value="greek">Greek</option>
                        <option value="grenadian">Grenadian</option>
                        <option value="guatemalan">Guatemalan</option>
                        <option value="guinea-bissauan">Guinea-Bissauan</option>
                        <option value="guinean">Guinean</option>
                        <option value="guyanese">Guyanese</option>
                        <option value="haitian">Haitian</option>
                        <option value="herzegovinian">Herzegovinian</option>
                        <option value="honduran">Honduran</option>
                        <option value="hungarian">Hungarian</option>
                        <option value="icelander">Icelander</option>
                        <option value="indian">Indian</option>
                        <option value="indonesian">Indonesian</option>
                        <option value="iranian">Iranian</option>
                        <option value="iraqi">Iraqi</option>
                        <option value="irish">Irish</option>
                        <option value="israeli">Israeli</option>
                        <option value="italian">Italian</option>
                        <option value="ivorian">Ivorian</option>
                        <option value="jamaican">Jamaican</option>
                        <option value="japanese">Japanese</option>
                        <option value="jordanian">Jordanian</option>
                        <option value="kazakhstani">Kazakhstani</option>
                        <option value="kenyan">Kenyan</option>
                        <option value="kittian and nevisian">Kittian and Nevisian</option>
                        <option value="kuwaiti">Kuwaiti</option>
                        <option value="kyrgyz">Kyrgyz</option>
                        <option value="laotian">Laotian</option>
                        <option value="latvian">Latvian</option>
                        <option value="lebanese">Lebanese</option>
                        <option value="liberian">Liberian</option>
                        <option value="libyan">Libyan</option>
                        <option value="liechtensteiner">Liechtensteiner</option>
                        <option value="lithuanian">Lithuanian</option>
                        <option value="luxembourger">Luxembourger</option>
                        <option value="macedonian">Macedonian</option>
                        <option value="malagasy">Malagasy</option>
                        <option value="malawian">Malawian</option>
                        <option value="malaysian">Malaysian</option>
                        <option value="maldivan">Maldivan</option>
                        <option value="malian">Malian</option>
                        <option value="maltese">Maltese</option>
                        <option value="marshallese">Marshallese</option>
                        <option value="mauritanian">Mauritanian</option>
                        <option value="mauritian">Mauritian</option>
                        <option value="mexican">Mexican</option>
                        <option value="micronesian">Micronesian</option>
                        <option value="moldovan">Moldovan</option>
                        <option value="monacan">Monacan</option>
                        <option value="mongolian">Mongolian</option>
                        <option value="moroccan">Moroccan</option>
                        <option value="mosotho">Mosotho</option>
                        <option value="motswana">Motswana</option>
                        <option value="mozambican">Mozambican</option>
                        <option value="namibian">Namibian</option>
                        <option value="nauruan">Nauruan</option>
                        <option value="nepalese">Nepalese</option>
                        <option value="new zealander">New Zealander</option>
                        <option value="ni-vanuatu">Ni-Vanuatu</option>
                        <option value="nicaraguan">Nicaraguan</option>
                        <option value="nigerien">Nigerien</option>
                        <option value="north korean">North Korean</option>
                        <option value="northern irish">Northern Irish</option>
                        <option value="norwegian">Norwegian</option>
                        <option value="omani">Omani</option>
                        <option value="pakistani">Pakistani</option>
                        <option value="palauan">Palauan</option>
                        <option value="panamanian">Panamanian</option>
                        <option value="papua new guinean">Papua New Guinean</option>
                        <option value="paraguayan">Paraguayan</option>
                        <option value="peruvian">Peruvian</option>
                        <option value="polish">Polish</option>
                        <option value="portuguese">Portuguese</option>
                        <option value="qatari">Qatari</option>
                        <option value="romanian">Romanian</option>
                        <option value="russian">Russian</option>
                        <option value="rwandan">Rwandan</option>
                        <option value="saint lucian">Saint Lucian</option>
                        <option value="salvadoran">Salvadoran</option>
                        <option value="samoan">Samoan</option>
                        <option value="san marinese">San Marinese</option>
                        <option value="sao tomean">Sao Tomean</option>
                        <option value="saudi">Saudi</option>
                        <option value="scottish">Scottish</option>
                        <option value="senegalese">Senegalese</option>
                        <option value="serbian">Serbian</option>
                        <option value="seychellois">Seychellois</option>
                        <option value="sierra leonean">Sierra Leonean</option>
                        <option value="singaporean">Singaporean</option>
                        <option value="slovakian">Slovakian</option>
                        <option value="slovenian">Slovenian</option>
                        <option value="solomon islander">Solomon Islander</option>
                        <option value="somali">Somali</option>
                        <option value="south african">South African</option>
                        <option value="south korean">South Korean</option>
                        <option value="spanish">Spanish</option>
                        <option value="sri lankan">Sri Lankan</option>
                        <option value="sudanese">Sudanese</option>
                        <option value="surinamer">Surinamer</option>
                        <option value="swazi">Swazi</option>
                        <option value="swedish">Swedish</option>
                        <option value="swiss">Swiss</option>
                        <option value="syrian">Syrian</option>
                        <option value="taiwanese">Taiwanese</option>
                        <option value="tajik">Tajik</option>
                        <option value="tanzanian">Tanzanian</option>
                        <option value="thai">Thai</option>
                        <option value="togolese">Togolese</option>
                        <option value="tongan">Tongan</option>
                        <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                        <option value="tunisian">Tunisian</option>
                        <option value="turkish">Turkish</option>
                        <option value="tuvaluan">Tuvaluan</option>
                        <option value="ugandan">Ugandan</option>
                        <option value="ukrainian">Ukrainian</option>
                        <option value="uruguayan">Uruguayan</option>
                        <option value="uzbekistani">Uzbekistani</option>
                        <option value="venezuelan">Venezuelan</option>
                        <option value="vietnamese">Vietnamese</option>
                        <option value="welsh">Welsh</option>
                        <option value="yemenite">Yemenite</option>
                        <option value="zambian">Zambian</option>
                        <option value="zimbabwean">Zimbabwean</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
               <label for="email" class="control-label col-xs-2">Email :</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required="">
                </div>
            </div>
            <div class="form-group">
               <label for="phone" class="control-label col-xs-2">Phone Number :</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?php echo $contact; ?>" required="">
                </div>
            </div>
            <div class="form-group">
               <label for="address" class="control-label col-xs-2">Address :</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $address; ?>" required="">
                </div>
            </div><br/><br/>
            <h3 class="text-title">Skills And Interests</h3><hr style="width:93%;"/>
            <div class="form-group">
               <label for="skill" class="control-label col-xs-2">Skills :</label>
                <div class="col-xs-9">  
                    <input type="text" class="form-control usr_skills" id="skills"  name="skills"  data-role="tagsinput" value="<?php echo $usr_skills; ?>" required="">
                </div>
            </div>
            <div class="form-group">
               <label for="interest" class="control-label col-xs-2">Interests :</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control usr_interest" id="interest" name="interest" data-role="tagsinput" value="<?php echo $usr_interest; ?>" required="">
                </div>
            </div><br/><br/>
            <h3 class="text-title">Questions And Answers</h3><hr style="width:93%;"/>
            <div class="form-group">
               <label for="interest" class="control-label col-xs-2"><p style="color:#fff;">Join</p></label>
               <label>Why Do You Join Us?</label>
                <div class="col-xs-9">
                    <textarea class="form-control usr_interest" id="interest" name="join_us" value="" required="" style="width: 100%; height: 90px !important;"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="interest" class="control-label col-xs-2"><p style="color:#fff;">Join</p></label>
               <label>How Can You Contribute?</label>
                <div class="col-xs-9">
                    <textarea class="form-control usr_interest" id="interest" name="contribute" value="" required="" style="width: 100%; height: 90px !important;"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="interest" class="control-label col-xs-2"><p style="color:#fff;">Join</p></label>
               <label>Message To The Team Learder</label>
                <div class="col-xs-9">
                    <textarea class="form-control usr_interest" id="interest" name="message_leader" value="" required="" style="width: 100%; height: 90px !important;"></textarea>
                </div>
            </div>
            <!-- <div class="form-group">
               <label for="id_card" class="control-label col-xs-2 text-red">Passport And ID Card :</label>
                <div class="col-xs-3">
                    <input type="file" class="" id="id_card" name="id_card" accept="application/pdf,application/msword">
                </div>
               <div class="col-xs-4"><label class="text-red"><?php //echo $error_file1; ?></label></div>
            </div>
            <div class="form-group">
               <label for="police" class="control-label col-xs-2 text-red">Police Declaration :</label>
                <div class="col-xs-3">
                    <input type="file" class="" id="police" name="police" accept="application/pdf,application/msword">
                </div>
               <div class="col-xs-4"><label class="text-red"><?php //echo $error_file2; ?></label></div>
            </div>
            <div class="form-group">
               <label for="ngo_letter" class="control-label col-xs-2 text-red">Organization Letter :</label>
                <div class="col-xs-3">
                    <input type="file" class="" id="ngo_letter" name="ngo_letter" accept="application/pdf,application/msword">
                </div>
               <div class="col-xs-4"><label class="text-red"><?php //echo $error_file3; ?></label></div>
            </div> -->
            <div class="form-group text-right">
                <div class="col-xs-11">
                    <button type="submit" class="btn btn-default">Close</button>
                    <button type="submit" name="update_profile" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript">
    ang("input.usr_skills").val();
    ang("input.usr_skills").tagsinput('items');
    
    ang("input.usr_interest").val();
    ang("input.usr_interest").tagsinput('items');
    
    
  
</script>