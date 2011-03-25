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


/*
*
*
* Genaral Function to restore database
* UserName, Password, DatabbaseName and BackupfileName as agruments
* Assumes gzip Compresssion tool
*
*/
//require_once('connection.php');

function mysql_backup($user, $password, $database,$backup_name) {

    if ($user == "" || $user==NULL || $user=="NULL")
        $user="";
    else
    $user = " --user=".$user;
    
    
    if ($password == "" || $password==NULL || $password=="NULL")
        $password="";
    else
        $password = " --password=".$password;
        
            
//echo "mysqldump ".$user." ".$password." ".$database."|gzip>".$backup_name;

exec( "mysqldump ".$user." ".$password." ".$database."|gzip>".$backup_name) ;
//  exec( "mysqldump ".$user." ".$password." ".$database." >".$backup_name) ;
}


$day = date('m_d_Y');
$backup = BACKUP_DIR.$dbname.'_'.$day.'.gz';
// $backup = BACKUP_DIR.$dbname.'_'.$day.'.sql';
// mysql bkup
mysql_backup ($dbusername,$dbpassword,$dbname,$backup);
// to save file

if (strstr($HTTP_USER_AGENT,"MSIE")) {
    $content_disposition = '';
} else {
    $content_disposition = ' attachment;';
}


header("Content-Type: text/plain");
header("Content-disposition:$content_disposition filename= ".$dbname."_".$day.'.gz');
header("Pragma: no-cache");
header("Cache-control: private, must-revalidate");
header("Expires: 0");
readfile($backup);
// end of save file
// need write log 
exit();
?>


