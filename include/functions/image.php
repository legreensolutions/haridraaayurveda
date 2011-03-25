<?php
function img_resize($path,$w=0,$h=0,$quality=100,$save=''){
// function used to resize using GD library
    $image_data=@getimagesize($path);
    $image_type=$image_data[2];
    $gd_ext=array('','jpg','gif');
    if($image_type!=1&&$image_type!=2) return false;
    if($save=='') header('Content-type: '.$image_data['mime']); else $save=eregi_replace('%ext',$gd_ext[$image_type],$save);
    if($w!=0){
        $rapporto=$image_data[0]/$w;
        if($h!=0){
            if($image_data[1]/$rapporto>$h) $rapporto=$image_data[1]/$h;
        }
    }
    elseif($h!=0){
        $tmp_h=$image_data[1]/$h;
    }
    else{
        return false;
    }
    $thumb_w=$image_data[0]/$rapporto;
    $thumb_h=$image_data[1]/$rapporto;
    if($image_type==1) $img_src=@imagecreatefromgif($path);
    elseif($image_type==2) $img_src=@imagecreatefromjpeg($path);
    $img_thumb=@imagecreatetruecolor($thumb_w,$thumb_h);
    $result=@imagecopyresampled($img_thumb,$img_src, 0,0,0,0,$thumb_w,$thumb_h,$image_data[0],$image_data[1]);
    if(!$img_src||!$img_thumb||!$result) return false;
  
    if($image_type==1) $result=@imagegif($img_thumb,$save);
    elseif($image_type==2) $result=@imagejpeg($img_thumb,$save,$quality);
    return $result;
}

//$_FILES["file"]["type"] == "image/gif" || "image/jpeg" || "image/pjpeg" || "image/jpg"
//int filesize ( string filename )

// function to upload the image
function upload_image ($fleFILE, $minwidth=800, $maxwidth=1024, $minheight=600, $maxheight=768, $maxsize= 1048576, $uploaddir, $thumbdirs="") {
    //Check for any error in the file uploaded
    if ($fleFILE["error"] == 0) {
        //Check for file type
        if(trim(basename($fleFILE['name'])) != "" && ereg("gif|jpg|png|jpeg|e-png",$fleFILE['type']) ){
            //Check for filesize 
            if  ($fleFILE["size"] < $maxsize) {
                //Check for dimension
                $size = getimagesize($fleFILE["tmp_name"]);
                if (($size[0] >= $minwidth) && ($size[0] <= $maxwidth) && ($size[1] >= $minheight) && ($size[1] <= $maxheight) ) {
                    // set upload file - set the filename prefix "lgs_uf_" to avoid possibility of another file
                    $prefix = "lgs_" . substr(microtime(), 2, 5) . "_uf_";
                    $uploadfile = $uploaddir . $prefix . basename($fleFILE['name']);
                    if (move_uploaded_file($fleFILE['tmp_name'], $uploadfile)) {
                        $thumbfile = $thumbdir . $prefix . basename($fleFILE['name']);
                        //if (img_resize($uploadfile, 150, 100, 100, $thumbfile)){
                            //SUCCESS
                            $arrRet["err_code"] = 0;
                            $arrRet["imagefile"] = $uploadfile;
                            //$arrRet["thumbfile"] = $thumbfile;
                    //  }
                        //else{
                            //unable to create the thumbnail
                        //  $arrRet["err_code"] = -6;
                    //  }
                    }
                    else { //if (move_uploaded_file($_FILES['fleimage']['tmp_name'], $uploadfile))
                        //unable to move the file from temporary directory
                        $arrRet["err_code"] = -5;
                    }
                }
                else { //if (($size[0] >= $minwidth) &&
                    //invalid dimension
                    $arrRet["err_code"] = -4;
                }
            }
            else { //if ($_FILES["fleimage"]["size"] < $maxsize)
                //invalid size error
                $arrRet["err_code"] = -3;
            }
        }
        else { //if(trim(basename($_FILES["fleimage"]["name"])) != "" && 
            // invalid file type
            $arrRet["err_code"] = -2;
        }
    }
    else { //if ($_FILES["fleimage"]["error"] == 0)
        $arrRet["err_code"] = -1;
    }
    return ($arrRet);
}
//To rename a image under its directory as "id.ext"
function rename_image ($imageid, $strfilename, $strdir) {
    // retrive file extension from file name
    $ext = explode('.', $strfilename);
    $ext = $ext[count($ext)-1];
    $newfile = $strdir . $imageid . "." . $ext;
    //rename the uploaded file
    rename ($strfilename, $newfile);
    chmod($newfile,0777);

    return true;
}
//To delete an old image when image is updated.
function delete_image ($imageid, $filename, $strdir) {
    // retrive file extension from file name
    $ext = explode('.', $filename);
    $ext = $ext[count($ext)-1];
    $oldfile = $strdir . $imageid . "." . $ext;
    if (unlink ($oldfile) ){
       $msg = 'file deleted';
    }
    else{
       $msg = 'not deleted';
    }
    return true;
}
?>