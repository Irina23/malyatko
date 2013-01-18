<?php
/* 
 */

/**
 * Description of agHelper
 *
 * @author Nikola Vasiljevski
 * 11.07.2010
 */
class agHelper{
    ////  IMAGEINFO  /////////////////////////////////////////////////////////////
    //                                                                          //
    // Last Update: 06.12.2008.                                                 //
    //                                                                          //
    // FUNCTION INPUT:                                                          //
    //    1. - $imageURL                                                        //
    //                                                                          //
    // FUNCTION OUTPUT:                                                         //
    //    1. - $imageInfo array:"width","height","type","size"                  //
    //                                                                          //
    //                                                                          //
    // Copyright: Igor Kekeljevic, 2008.                                        //
    //                                                                          //
    //////////////////////////////////////////////////////////////////////////////

protected function ag_foregroundColor ( $hex,$adjust )
{
     $red   = hexdec( $hex[0] . $hex[1] );
     $green = hexdec( $hex[2] . $hex[3] );
     $blue  = hexdec( $hex[4] . $hex[5] );
     if(($red+$green+$blue) >= 255){
	  $red -= $adjust; $green -= $adjust; $blue -= $adjust;
	  if ( $red < 0 ) $red = 0;
	  if ( $green < 0 ) $green = 0;
	  if ( $blue < 0 ) $blue = 0;
     }else{
	  $red += $adjust; $green += $adjust; $blue += $adjust;
	  if ( $red > 255 ) $red = 255;
	  if ( $green > 255 ) $green = 255;
	  if ( $blue > 255 ) $blue = 255;
     }

     return str_pad( dechex( $red ), 2, '0', 0 )
	  . str_pad( dechex( $green ), 2, '0', 0 )
	  . str_pad( dechex( $blue ), 2, '0', 0 );
}

    protected function ag_imageInfo($imageURL){

      list($width, $height, $type, $attr) = getimagesize($imageURL);

      $types = Array(
              1 => 'GIF',
              2 => 'JPG',
              3 => 'PNG',
              4 => 'SWF',
              5 => 'PSD',
              6 => 'BMP',
              7 => 'TIFF(intel byte order)',
              8 => 'TIFF(motorola byte order)',
              9 => 'JPC',
              10 => 'JP2',
              11 => 'JPX',
              12 => 'JB2',
              13 => 'SWC',
              14 => 'IFF',
              15 => 'WBMP',
              16 => 'XBM'
          );

      if($type){

        return $imageInfo = array(
              "width" => $width,
              "height" => $height,
              "type" => $types[$type],
              "size" => filesize($imageURL)
          );

      }

    }
    protected function ag_fileRoundSize($size) {
        $bytes = array('B','KB','MB','GB','TB');
        foreach($bytes as $val) {
            if($size > 1024){
                $size = $size / 1024;
            }else{
                break;
            }
        }
        return round($size, 2)." ".$val;
    }
    //Read's all floders in folder.
    protected function ag_foldersArrayFromFolder($targetFolder){

            unset($folders);

            if (!file_exists($targetFolder))
            {
                    return null;
            }
            $folders = array();

            if ($dh = opendir($targetFolder)) {
              while (($f = readdir($dh)) !== false) {
                      if(is_dir($targetFolder.$f) && $f!="." && $f!="..") {
                              $folders[] = $f;
                      }
              }
              return $folders;
             }else{
                    return null;
             }

             closedir($dh);
    }
    protected function ag_cleanThumbsFolder($originalFolder,$thumbFolder){
            $origin= agHelper::ag_foldersArrayFromFolder($originalFolder);
            $thumbs= agHelper::ag_foldersArrayFromFolder($thumbFolder);
            $diffArray= array_diff($thumbs,$origin);
            if ($diffArray!=null)
            {
                    foreach ($diffArray as $diffFolder) {
                             agHelper::ag_sureRemoveDir($thumbFolder.$diffFolder,true);
                    }
            }
    }
    protected function ag_clearOldThumbs($imagesFolder,$thumbsFolder){

      // Generate array of thumbs
      $targetFolder=$thumbsFolder;
      $thumbs=agHelper::ag_imageArrayFromFolder($targetFolder,0);

      // Generate array of images
      $targetFolder=$imagesFolder;
      $images=agHelper::ag_imageArrayFromFolder($targetFolder,0);

      if (empty($images)){
      agHelper::ag_sureRemoveDir($thumbsFolder, 1);
      return;
      }

      // Locate and delete old thumbs
      if(!empty($thumbs)){
        foreach ($thumbs as $thumbsKey => $thumbsValue){
          if ((!in_array($thumbsValue, $images)) && (!empty($thumbsValue)) && file_exists($thumbsFolder.$thumbsValue)) {
             unlink($thumbsFolder.$thumbsValue);
          }
        }
      }
    }
        /**
     * Makes directory, returns TRUE if exists or made
     *
     * @param string $pathname The directory path.
     * @return boolean returns TRUE if exists or made or FALSE on failure.
     */
    protected function ag_mkdir_recursive($pathname, $mode){
        is_dir(dirname($pathname)) || agHelper::ag_mkdir_recursive(dirname($pathname), $mode);
        return is_dir($pathname) || @mkdir($pathname, $mode);
    }

    protected function ag_sureRemoveDir($dir, $DeleteMe) {
        if(!$dh = @opendir($dir)) return;
        while (false !== ($obj = readdir($dh))) {
            if($obj=='.' || $obj=='..') continue;
            if (!@unlink($dir.'/'.$obj)) agHelper::ag_sureRemoveDir($dir.'/'.$obj, true);
        }

        closedir($dh);
        if ($DeleteMe){
            @rmdir($dir);
        }
    }
    //Read's all images from folder.
    protected function ag_imageArrayFromFolder($targetFolder,$arrange){

	  if (!file_exists($targetFolder))
	  {
		    return null;
	  }
	  if ($dh = opendir($targetFolder)) {

	       $ag_ext_valid = array ("jpg","jpeg","gif","png");// SET VALID IMAGE EXTENSION

	       while (($f = readdir($dh)) !== false) {
			 if(is_numeric(array_search(strtolower(agHelper::ag_getExtension(basename($f))),$ag_ext_valid))){
				   $images[] = $f;
			 }
	       }
	  }
	  closedir($dh);

	  if(!empty($images)){
	  switch ($arrange) {
	       case "priority":

		    $ag_images_priority=Array();
		    $ag_images_noPriority=Array();
		    $images_sorted=Array();

		    foreach($images as $key => $value){

			 // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
			 $ag_pathWithStripExt=$targetFolder.agHelper::ag_removExtension($value);
			 $ag_imgXML_path=$ag_pathWithStripExt.".XML";
			 if(file_exists($ag_pathWithStripExt.".xml")){
			      $ag_imgXML_path=$ag_pathWithStripExt.".xml";
			 }

			 if(file_exists($ag_imgXML_path)){
			      $ag_imgXML_xml = & JFactory::getXMLParser( 'simple' );
			      $ag_imgXML_xml->loadFile($ag_imgXML_path);
			      $ag_imgXML_priority =& $ag_imgXML_xml->document->priority[0]->data();
			 }

			 if(!empty($ag_imgXML_priority) && file_exists($ag_imgXML_path)){
			      $ag_images_priority[$value] = $ag_imgXML_priority;// PRIORITIES IMAGES
			 }else{
			      $ag_images_noPriority[] = $value;// NON PRIORITIES IMAGES
			 }

		    }

		    if(!empty($ag_images_priority)){
		    asort($ag_images_priority);
			 foreach($ag_images_priority as $key => $value){
			      $images_sorted[]=$key;
			 }
		    }

		    if(!empty($ag_images_noPriority)){
		    natcasesort($ag_images_noPriority);
			 foreach($ag_images_noPriority as $key => $value){
			      $images_sorted[]=$value;
			 }
		    }
		    $images=$images_sorted;

	       break;
	       case "date":

	       $ag_new_images=Array();

	       foreach($images as $key => $value){

		    // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
		    $ag_pathWithStripExt=$targetFolder.agHelper::ag_removExtension($value);
		    $ag_imgXML_path=$ag_pathWithStripExt.".XML";
		    if(file_exists($ag_pathWithStripExt.".xml")){
			 $ag_imgXML_path=$ag_pathWithStripExt.".xml";
		    }

		    if(file_exists($ag_imgXML_path)){
			 $ag_imgXML_xml = & JFactory::getXMLParser( 'simple' );
			 $ag_imgXML_xml->loadFile($ag_imgXML_path);
			 $ag_imgXML_date =& $ag_imgXML_xml->document->date[0]->data();
		    }
		    if(!empty($ag_imgXML_date) && file_exists($ag_imgXML_path)){
			 $ag_new_images[$value] = $ag_imgXML_date;
		    }else{
			 $ag_new_images[$value] = date ("YmdHs", filemtime($targetFolder.$value));
		    }

	       }

	       $images=Array();
	       if(!empty($ag_new_images)){
	       asort($ag_new_images);
	       $ag_new_images = array_reverse($ag_new_images);
		    foreach($ag_new_images as $key => $value){
			 $images[]=$key;
		    }
	       }

	       break;
	       case "name":
		    natcasesort($images);
	       break;
	  }
	  }

	  return $images;

    }
        //Gets the atributes value by name, else returns false
    protected function ag_getParams($attrib, $tag, $default){
            //get attribute from html tag
            $re = '/' . preg_quote($attrib) . '=([\'"])?((?(1).+?|[^\s>]+))(?(1)\1)/is';
            if (preg_match($re, $tag, $match)) {
            return urldecode($match[2]);
            }
            return $default;
    }

    //Creates thumbnail from original images, return $errorMessage;
    protected function ag_createThumb($original_file, $thumb_file, $new_w, $new_h, $autoSize) {

	//GD check
	if (!function_exists('gd_info')) {
	    // ERROR - Invalid image
	    return JText::_('GD support is not enabled');
	}

	// Create src_img
	if (preg_match("/jpg|jpeg/i", $original_file)) {
	    @$src_img = imagecreatefromjpeg($original_file);
	} else if (preg_match("/png/i", $original_file)) {
	    @$src_img = imagecreatefrompng($original_file);
	} else if (preg_match("/gif/i", $original_file)) {
	    @$src_img = imagecreatefromgif($original_file);
	} else {
	    return JText::sprintf('Unsupported image type for image',$original_file);
	}

	@$src_width = imageSX($src_img);//$src_width
	@$src_height = imageSY($src_img);//$src_height
        $src_w=$src_width;
        $src_h=$src_height;
        $src_x=0;
        $src_y=0;
	$dst_w = $new_w;
	$dst_h = $new_h;
	$src_ratio=$src_w/$src_h;	
	$dst_ratio=$new_w/$new_h;

switch ($autoSize) {
    case "width":
	    // AUTO WIDTH
	    $dst_w = $dst_h*$src_ratio;
        break;
    case "height":
	    // AUTO HEIGHT
	    $dst_h = $dst_w/$src_ratio;
        break;
    case "none":
	// If proportion of source image is wider then proportion of thumbnail image, then use full height of source image and crop the width.
	if ($src_ratio > $dst_ratio) {
	    // KEEP HEIGHT, CROP WIDTH
	    $src_w = $src_h*$dst_ratio;
	    $src_x = floor(($src_width-$src_w)/2);
	}else{
	    // KEEP WIDTH, CROP HEIGHT
	    $src_h = $src_w/$dst_ratio;
	    $src_y = floor(($src_height-$src_h)/2);
	}
        break;
}

        @$dst_img = imagecreatetruecolor($dst_w, $dst_h);

	// PNG THUMBS WITH ALPHA PATCH
        if (preg_match("/png/i", $original_file)) {
        // Turn off alpha blending and set alpha flag
            imagealphablending($dst_img, false);
            imagesavealpha($dst_img, true);
        }
        
        @imagecopyresampled($dst_img, $src_img, 0, 0, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

        if (preg_match("/jpg|jpeg/i", $original_file)) {
            @imagejpeg($dst_img, $thumb_file);
        } else if (preg_match("/png/i", $original_file)) {
            @imagepng($dst_img, $thumb_file);
        } else if (preg_match("/gif/i", $original_file)) {
            @imagegif($dst_img, $thumb_file);
        } else {
            return JText::sprintf('Could not create thumbnail file for image',$original_file);
        }
        @imagedestroy($dst_img);
        @imagedestroy($src_img);
    }
    /**
     *
     * @param <string> $filename
     */
    protected function ag_indexWrite($filename){
      $handle = fopen($filename,"w") or die("");
      $contents = fwrite($handle,'<html><body bgcolor="#FFFFFF"></body></html>');
      fclose($handle);
    }
    protected function ag_get_os_($user_agent)
    {
	$oses = array (
		'Windows 3.11' => 'Win16',
		'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)',
		'Windows 98' => '(Windows 98)|(Win98)',
		'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
		'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
		'Windows 2003' => '(Windows NT 5.2)',
		'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
		'Windows ME' => 'Windows ME',
		'Open BSD'=>'OpenBSD',
		'Sun OS'=>'SunOS',
		'Linux'=>'(Linux)|(X11)',
		'Macintosh'=>'(Mac_PowerPC)|(Macintosh)',
		'QNX'=>'QNX',
		'BeOS'=>'BeOS',
		'OS/2'=>'OS/2',
		'Search Bot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)'
	);
    foreach($oses as $os=>$pattern)
            {
                    if (preg_match('/'.$pattern.'/', $user_agent))
                            return $os;
            }
            return 'Unknown';
    }
    function ag_removExtension($fileName)
    {
        $ext = strrchr($fileName, '.');
        if($ext !== false)
        {
         $fileName = substr($fileName, 0, -strlen($ext));
        }
        return $fileName;
    }
    function ag_getExtension($fileName)
    {
        $ext = strrchr($fileName, '.');
        $ext=substr($ext, 1);
        return $ext;
    }
}
?>
