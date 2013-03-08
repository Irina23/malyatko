<?php

class AG_helper {

    function _renderBreadcrumb($AG_itemURL, $ag_rootFolder, $ag_folderName, $ag_fileName) {
        $ag_breadcrumb='';
        $ag_breadcrumb_link='';
        if($ag_rootFolder!=$AG_itemURL && !empty($AG_itemURL)){
            $ag_breadcrumb.='<a href="'.$ag_rootFolder.'" class="AG_folderLink AG_common_button"><span><span>'.substr($ag_rootFolder,0,-1).'</span></span></a>/';
            $ag_breadcrumb_link.=$ag_rootFolder;
            $ag_breadcrumb_cut=substr($ag_folderName,strlen($ag_rootFolder));
            $ag_breadcrumb_cut_array=explode("/",$ag_breadcrumb_cut);
            if(!empty($ag_breadcrumb_cut_array[0])){
	          foreach($ag_breadcrumb_cut_array as $cut_key => $cut_value){
	              $ag_breadcrumb_link.=$cut_value.'/';
	              $ag_breadcrumb.='<a href="'.$ag_breadcrumb_link.'" class="AG_folderLink AG_common_button"><span><span>'.$cut_value.'</span></span></a>/';
	          }
            }
            $ag_breadcrumb.=$ag_fileName;
        }else{
            $ag_breadcrumb.=$ag_rootFolder;
        }
        return $ag_breadcrumb;
    }

    function _shrinkString($string,$stringLength,$add3dots){
        if(strlen($string)>$stringLength){
	      $string = substr($string,0,$stringLength);
	      if($add3dots){
	          $string.="...";
	      }
        }
        return $string;
    }

    function _fileRoundSize($size) {
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

    function _imageInfo($imageURLPHP){

      list($width, $height, $type, $attr) = getimagesize($imageURLPHP);

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
              "size" => AG_helper::_fileRoundSize(filesize($imageURLPHP))
          );

      }

    }

}
?>
