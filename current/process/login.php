<?	

	session_start();
	include '/home/www/pm_common/system.php';
			
	$username = $_POST['username'];
	
	$password = $_POST['password'];		
	
	$login_rs	= fnc_rs_lookup( "SELECT personnel_id as user_id,
										 username,
										 upper(password) as password,
										 security_level
								  FROM arsdehnel_msub.personnel
								  WHERE upper(username) = upper('" . $username . "')" );

	//echo $login_rs;

	if( !$login_rs ){
	
		$_SESSION['secure'] = false;
		$_SESSION['security_level'] = 0;
		$_SESSION['error_line'] = 'The login process encountered a problem and was unable to complete.  Please contact the webmaster at webmaster@atonementbillings.org.';
		
		echo 'The login process found no record with that username.';
		//header( "Location: /secure/index.php" );
		
		exit;
	
	}else{
					
		$login_rec = pg_fetch_array( $login_rs );
			
		if(strtoupper($password) == $login_rec['password']){
		
			//echo 'good login<br />';
			
			//prc_array_dump( $login_rec );
		
			$_SESSION['secure'] 		= true;
			$_SESSION['username'] 		= $login_rec['username'];
			$_SESSION['user_id']		= $login_rec['user_id'];
			$_SESSION['security_level'] = $login_rec['security_level'];
			$_SESSION['success_line'] 	= 'Login successful.';
					
			if( $_POST['remember_me'] == 'Y' ){
	
				$expire		= time()+60*60*24*30;//30 days
				
			}else{
				
				$expire		= time()-60*60*24*30;//30 days
				
			}
			
			echo '0';
			
			//prc_array_dump( $_SESSION );
		
			//header( "Location: /" );
			
			exit;
		
		}else{
		
			//echo 'bad password<br />';
		
			$_SESSION['secure'] = false;
			$_SESSION['security_level'] = 0;
			$_SESSION['error_line'] = 'The password did not match the password for the given username in the database.';
			
			echo 'The password did not match the password for the given username in the database.';
			
			//header( "Location: /secure/index.php" );
			
			exit;
		
		}
	
	}	
						

?>