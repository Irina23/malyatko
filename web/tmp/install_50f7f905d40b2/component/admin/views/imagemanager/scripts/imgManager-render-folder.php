<?php


/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Restricted access' );

$ag_itemURL = $ag_init_itemURL;

$ag_folderName = dirname($ag_itemURL);
$ag_fileName = basename($ag_itemURL);

$ag_preview_content='';

$ag_preview_content.='
<h1>'.JText::_( 'CURRENT FOLDER:' ).'</h1>

<div class="AG_breadcrumbs_wrapper">
     '.AG_helper::_renderBreadcrumb($AG_itemURL, $ag_rootFolder, $ag_folderName, $ag_fileName).'
</div>
<hr />
<table cellspacing="0" cellpadding="0" border="0" class="AG_fieldset">
     <tbody>
     <tr>
	  <td><img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/upload.png" style="float:left;" /></td><td>&nbsp;'.JText::_( 'UPLOAD IMAGES (JPG, JPEG, GIF, PNG OR ZIP)' ).'&nbsp;[ <b>'.JText::_( 'MAX' ).'&nbsp;'.(JComponentHelper::getParams('com_media')->get('upload_maxsize') / 1000000).'M</b> ]:&nbsp;</td><td><input type="file" name="AG_fileUpload" /></td>
     </tr>
     </tbody>
</table>
<hr />
<table cellspacing="0" cellpadding="0" border="0" class="AG_fieldset">
     <tbody>
     <tr>
	  <td><img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/folder-new.png" style="float:left;" /></td><td>&nbsp;'.JText::_( 'CREATE FOLDERS:' ).'&nbsp;</td>
<td id="AG_folder_add">
    <a href=""  class="AG_common_button">
    <span><span>
	'.JText::_( 'ADD' ).'
    </span></span>
    </a>
</td>
     </tr>
     </tbody>
</table>
<hr />
';

$ag_preview_content.='
';

// RENDER FOLDERS
$ag_folders=JFolder::folders(JPATH_SITE.$ag_itemURL);
if(!empty($ag_folders)){
    foreach($ag_folders as $key => $value){
	$ag_preview_content.='
    <div class="AG_border_color AG_border_width AG_item_wrapper">
	<a href="'.$ag_itemURL.$value.'/" class="AG_folderLink AG_item_link" title="'.$value.'">
	    <div style="display:block; text-align:center;" class="AG_item_img_wrapper">
		<img src="'.JURI::root().'administrator/components/com_media/images/folder.png" />
	    </div>
	</a>
	<div class="AG_border_color AG_border_width AG_item_controls_wrapper">
	    <table border="0" cellspacing="0" cellpadding="0"><tbody><tr>
	    <td><img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/uninstalled.png" style="float:left;" /></td>
	    <td><input type="checkbox" value="'.$ag_itemURL.$value.'/" name="AG_cbox_remove[]" class="AG_cbox_remove"></td>
	    <td><span class="AG_border_color AG_border_width AG_separator">&nbsp;</span></td>
	    <td><img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/bookmark.png" style="float:left;" /></td>
	    <td><input type="checkbox" value="'.$ag_itemURL.$value.'/" name="AG_cbox_bookmarkAdd[]"></td>
	    </tr></tbody></table>
	    <div class="AG_border_color AG_border_width AG_controls_item_name">
	    <input type="text" value="'.$value.'" name="AG_rename['.$ag_itemURL.$value.']" class="AG_input" style="width:95%" />
	    </div>
	</div>
    </div>
    ';
    }
}

// RENDER IMAGES

// CREATED SORTED ARRAY OF IMAGES
$ag_files=JFolder::files(JPATH_SITE.$ag_itemURL);
$ag_ext_valid = array ("jpg","jpeg","gif","png");// SET VALID IMAGE EXTENSION

if(!empty($ag_files)){

     $ag_images_priority=Array();
     $ag_images_noPriority=Array();
     $ag_images=Array();

     foreach($ag_files as $key => $value){
	  if(is_numeric(array_search(strtolower(JFile::getExt(basename($value))),$ag_ext_valid))){

	       $ag_folderName = $ag_itemURL;
	       $ag_fileName = basename($value);

	       // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
	       $ag_pathWithStripExt=JPATH_SITE.$ag_folderName.JFile::stripExt($ag_fileName);
	       $ag_imgXML_path=$ag_pathWithStripExt.".XML";
	       if(JFIle::exists($ag_pathWithStripExt.".xml")){
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
     }
}

if(!empty($ag_images_priority)){
asort($ag_images_priority);
     foreach($ag_images_priority as $key => $value){
	  $ag_images[]=$key;
     }
}

if(!empty($ag_images_noPriority)){
natcasesort($ag_images_noPriority);
     foreach($ag_images_noPriority as $key => $value){
	  $ag_images[]=$value;
     }
}

if(!empty($ag_images)){
foreach($ag_images as $key => $value){


     $ag_hasXML="";
     $ag_hasThumb="";	

     // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
     $ag_pathWithStripExt=JPATH_SITE.$ag_itemURL.JFile::stripExt(basename($value));
     $ag_imgXML_path=$ag_pathWithStripExt.".xml";
     if(JFIle::exists($ag_pathWithStripExt.".XML")){
	  $ag_imgXML_path=$ag_pathWithStripExt.".XML";
     }

     $ag_imgXML_priority="";
     if(file_exists($ag_imgXML_path)){
	  $ag_hasXML='<img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/icon-hasXML.png"  class="ag_hasXML" />';
	  $ag_imgXML_xml = & JFactory::getXMLParser( 'simple' );
	  $ag_imgXML_xml->loadFile($ag_imgXML_path);
	  $ag_imgXML_priority =& $ag_imgXML_xml->document->priority[0]->data();
     }

     if(file_exists(JPATH_SITE."/plugins/content/AdmirorGallery/thumbs/".basename($ag_folderName)."/".basename($value))){
	  $ag_hasThumb='<img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/icon-hasThumb.png"  class="ag_hasThumb" />';
     }

     $ag_preview_content.='
     <div class="AG_border_color AG_border_width AG_item_wrapper">
	<a href="'.$ag_itemURL.$value.'" class="AG_fileLink AG_item_link" title="'.$value.'">
	      <div style="display:block; text-align:center;" class="AG_item_img_wrapper">
	      <img src="'.JURI::root().'administrator/components/com_admirorgallery/scripts/thumbnailer.php?img='.JPATH_SITE.$ag_itemURL.$value.'&height=80" class="ag_imgThumb" />
	      </div>
	</a>
	<div class="AG_border_color AG_border_width AG_item_controls_wrapper">
	    <table border="0" cellspacing="0" cellpadding="0"><tbody><tr>
	    <td><img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/uninstalled.png" style="float:left;" /></td>
	    <td><input type="checkbox" value="'.$ag_itemURL.$value.'" name="AG_cbox_remove[]" class="AG_cbox_remove"></td>
	    <td><div class="AG_border_color AG_border_width AG_separator">&nbsp;</div></td>
	    <td>'.JText::_( 'Priority' ).':&nbsp;</td>
	    <td><input type="text" size="3" value="'.$ag_imgXML_priority.'" name="AG_cbox_priority['.$ag_itemURL.$value.']" class="AG_input" /></td>
';

if(!empty($ag_hasXML) || !empty($ag_hasThumb)){
$ag_preview_content.='
	    <td><div class="AG_border_color AG_border_width AG_separator">&nbsp;</div></td>
	    <td>'.$ag_hasXML.$ag_hasThumb.'</td>
';
}

$ag_preview_content.='
	    </tr></tbody></table>
	    <div class="AG_border_color AG_border_width AG_controls_item_name">
	    <input type="text" value="'.JFile::stripExt(basename($value)).'" name="AG_rename['.$ag_itemURL.$value.']" class="AG_input" style="width:95%" />
	    </div>
	</div>
     </div>
     ';

     
}
}

if(empty($ag_folders) && empty($ag_images)){
$ag_preview_content.= JText::_( 'No folders or images found in current folder ...' );
}

$ag_preview_content.='

<div style="clear:both" class="AG_margin_bottom"></div>
<hr />
<div  class="AG_legend">
<h2>'.JText::_( 'LEGEND' ).'</h2>
<table><tbody>
<tr>
    <td><img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/uninstalled.png" style="float:left;" /></td>
    <td>'.JText::_( 'SELECT TO REMOVE FILE OR FOLDER.' ).'</td>
</tr>
<tr>
    <td><img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/bookmark.png" style="float:left;" /></td>
    <td>'.JText::_( 'SELECT FOLDER TO BOOKMARK IT IN THE LIST OF GALLERIES.' ).'</td>
</tr>
<tr>
    <td><img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/icon-hasThumb.png" style="float:left;" /></td>
    <td>'.JText::_( 'Image has thumbnail created.' ).'</td>
</tr>
<tr>
    <td><img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/icon-hasXML.png" style="float:left;" /></td>
    <td>'.JText::_( 'Image has additional details saved.' ).'</td>
</tr>
</tbody></table>
<div>


';


?>