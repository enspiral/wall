<?php
class OauthLogin {
	
	
    /* Database Connection */
    private $db;
     public function __construct($db) {
     $this->db = $db;
    }
	
	public function userDetails($user_session) 
	{
		$row_id=mysqli_real_escape_string($this->db,$user_session);
		$query = mysqli_query($this->db,"SELECT * FROM `users` WHERE uid = '$row_id'") or die(mysql_error());
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
	    return $row;
	}

    public function userSignup($userData,$loginProvider) 
	{
		
		$name='';
		$first_name='';
		$last_name='';
		$email='';
		$gender='';
		$birthday='';
		$location='';
		$hometown='';
		$bio='';
		$relationship='';
		$timezone='';
		$provider_id='';
		$picture='';
		
		
    if($loginProvider == 'facebook' || $loginProvider == 'google')
	{
	$email=mysqli_real_escape_string($this->db,$userData['email']);
    }
    else if($loginProvider == 'microsoft' )
	{
	$email=mysqli_real_escape_string($this->db,$userData->emails->account);
    }
	else if($loginProvider == 'linkedin' )
	{
	$email= mysqli_real_escape_string($this->db,$userData['email-address']);
    }
	
	$query = mysqli_query($this->db,"SELECT uid,provider FROM `users` WHERE email = '$email'") or die(mysql_error());
	if(mysqli_num_rows($query) == 0)
	{
		
		

        //Facebook Data
		if($loginProvider == 'facebook')
		{	
			    
	            $name=mysqli_real_escape_string($this->db,$userData['name']);
				$first_name=mysqli_real_escape_string($this->db,$userData['first_name']);
				$last_name=mysqli_real_escape_string($this->db,$userData['last_name']);
				$email=mysqli_real_escape_string($this->db,$userData['email']);
				$gender=mysqli_real_escape_string($this->db,$userData['gender']);
				$birthday=mysqli_real_escape_string($this->db,$userData['birthday']);
				$location=mysqli_real_escape_string($this->db,$userData['location']['name']);
				$hometown=mysqli_real_escape_string($this->db,$userData['hometown']['name']);
				$bio=mysqli_real_escape_string($this->db,$userData['bio']);
				$relationship=mysqli_real_escape_string($this->db,$userData['relationship_status']);
				$timezone=mysqli_real_escape_string($this->db,$userData['timezone']);
				$provider_id=mysqli_real_escape_string($this->db,$userData['id']);
				$picture='https://graph.facebook.com/'.$provider_id.'/picture';
				
		}
		//Google Data
	    if($loginProvider == 'google')
		{
	
				$email =mysqli_real_escape_string($this->db,$userData['email']);
			    $name =mysqli_real_escape_string($this->db,$userData['name']);
				$first_name=mysqli_real_escape_string($this->db,$userData['given_name']);
				$last_name=mysqli_real_escape_string($this->db,$userData['family_name']);
				$gender=mysqli_real_escape_string($this->db,$userData['gender']);
				$birthday=mysqli_real_escape_string($this->db,$userData['birthday']);
				$picture=mysqli_real_escape_string($this->db,$userData['picture']);
				$provider_id =mysqli_real_escape_string($this->db,$userData['id']);
		
         }
		//Microsoft Live Data
	    if($loginProvider == 'microsoft')
		{
			
			    $name =$userData->name;
			    $first_name =$userData->first_name;
			    $last_name =$userData->last_name;
			    $provider_id =$userData->id;
			    $gender=$userData->gender;
			    $email=$userData->emails->account;
			    $email2=$userData->emails->preferred;
			    $birthday=$userData->birth_day.'-'.$userData->birth_month.'-'.$userData->birth_year;
	
			
		}
		
		//Linkedin Data
	    if($loginProvider == 'linkedin')
		{
			
			 $email= mysqli_real_escape_string($this->db,$userData['email-address']);
			 $provider_id= mysqli_real_escape_string($this->db,$userData['id']);
			 $first_name= mysqli_real_escape_string($this->db,$userData['first-name']);
			 $last_name= mysqli_real_escape_string($this->db,$userData['last-name']);
		     $name =$first_name.' '.$last_name;
		}

mysqli_query($this->db,"INSERT INTO users (email, name, first_name, last_name, gender, birthday, location, hometown, bio, relationship, timezone, provider, provider_id) VALUES ('$email','$name','$first_name','$last_name','$gender','$birthday','$location','$hometown','$bio','$relationship','$timezone','$loginProvider','$provider_id')");	
       
		$success_query = mysqli_query($this->db,"SELECT uid FROM `users` WHERE email = '$email'") or die(mysql_error());
		$success_row= mysqli_fetch_array($success_query,MYSQLI_ASSOC);
        $id=$success_row['uid'];
        
		return $id;

    }
    else
	{ 
			$row= mysqli_fetch_array($query,MYSQLI_ASSOC);
	        $provider=$row['provider'];
	 		$id=$row['uid'];
	        // Migrating user data with Facebook Data
	        if(($provider == 'google' || $provider == 'microsoft' || $provider == 'linkedin' || $provider == '' ) && ($loginProvider == 'facebook'))
	        {
		     	  
					$gender=mysqli_real_escape_string($this->db,$userData['gender']);
					$birthday=mysqli_real_escape_string($this->db,$userData['birthday']);
					$location=mysqli_real_escape_string($this->db,$userData['location']['name']);
					$hometown=mysqli_real_escape_string($this->db,$userData['hometown']['name']);
					$bio=mysqli_real_escape_string($this->db,$userData['bio']);
					$relationship=mysqli_real_escape_string($this->db,$userData['relationship_status']);
					$timezone=mysqli_real_escape_string($this->db,$userData['timezone']);
					$provider_id=mysqli_real_escape_string($this->db,$userData['id']);
					$picture='https://graph.facebook.com/'.$provider_id.'/picture';
			
mysqli_query($this->db,"UPDATE users SET gender='$gender',location = '$location',hometown = '$hometown',bio='$bio',relationship='$relationship',timezone='$timezone',
	provider='$loginProvider',provider_id='$provider_id' WHERE uid = '$id';");
		
		       	return $id;
			}
			else
			{
				
				return $id;
			}

	}

}    

}

?>
