
<?
function rename_image ($image, $strfilename, $strdir) {
    $newfile = $strdir . $image;
    //Check whether the given file exist in the dir or not
    $newfile = check_exist($newfile,0);
    //rename the uploaded file
    rename ($strfilename, $newfile);
    chmod($newfile,0777);

    return true;
}
//Function to Check whether the given file exist in the dir or not
function check_exist($newfile,$i){
  if( file_exists($newfile) ){
  $ext = explode('.', $newfile);
  $temp = $ext[0];

  $ext = $ext[count($ext)-1];
          if ( $i == 0 ){
                $temp .= "_";$i++;
          }
    $temp .= "1";
    $newfile = $temp . "." . $ext;
    //Recursive calling to check whether file_1, file_11 ... are existing
    $newfile = check_exist($newfile,$i);
  }

return $newfile;
}
?>

