<?php

$myuser = new User();
 $myuser->usertype_id = USERTYPE_ADMIN;
 $myuser->connection = $myconnection;
 $chk = $myuser->check_login();
 if ( $chk == false ){
            $_SESSION[SESSION_TITLE.'flash'] = $g_msg_unauthorized_request;
            $_SESSION[SESSION_TITLE.'flash_redirect_page'] = $g_msg_unauthorized_request_redirect_page;
            header( "Location: gfwflash.php");
            exit();
 }
$error = "";

function mysql_restore($user, $password, $database,$backup_name) {
    if ($user == "" || $user==NULL || $user=="NULL")
        $user="";
    else
        $user = " --user ".$user;
    
    if ($password == "" || $password==NULL || $password=="NULL")
        $password="";
    else
        $password = " --$password ".$user;
$intRetVal=0;


exec("gunzip<".$backup_name."|mysql ".$user." ".$password." ".$database);
exec("gunzip<".$backup_name."|grep -c '[tbactivity][tbuser]'",$Output,$intRetVal);



if($Output[0]>5)
    return true;
else
    return false;
}


$msg = "";

	if(isset($_POST) && $_POST['h_restore'] == md5("RESTORE_DB")){
		$uploaddir = BACKUP_DIR; 
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
		
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			$DBFromClient = $uploaddir . basename($_FILES['userfile']['name']);
			rename($DBFromClient,$uploaddir.$dbname.".gz");
		
			$backup_name=$uploaddir.$dbname.".gz";
			
		
			if (mysql_restore($dbusername,$dbpassword,$dbname,$backup_name)){
					$msg="Successfully Restored Database.";
			}else{  
					$msg = "Unable to restore the file.\n May be the selected file was not a valid Database Archive \n Contact the system administrator in case you are not able to do this \n even after choosing a valid Archive.\n";   
			}   
		}else{  $msg = "Unable to restore the file.\n May be the selected file was not a valid Database Archive \n Contact the system administrator in case you are not able to do this \n even after choosing a valid Archive.\n";
		}
	
	}

?>

