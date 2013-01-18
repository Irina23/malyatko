<?php
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
 
jimport( 'joomla.application.component.model' );

class AdmirorgalleryModelImagemanager extends JModel
{


    public $webSafe=Array("/"," ",":",".","+","&");

    function _bookmarkRename($AG_originalPath,$AG_newPath) {
            $AG_bookmark_ID = $AG_originalPath.'/';
            $ag_bookmarkFile=JPATH_SITE.'/administrator/components/com_admirorgallery/assets/bookmarks.xml';

            $ag_bookmarks_xml =& JFactory::getXMLParser( 'simple' );
            $ag_bookmarks_xml->loadFile( $ag_bookmarkFile );
            $ag_bookmarks_array = $ag_bookmarks_xml->document->bookmark;

            // CHECK IF BOOKMARK ALREADY EXISTS
            $bookmarkCheck = false;
            if(!empty($ag_bookmarks_array)){
              foreach($ag_bookmarks_array as $ag_bookmarks_key => $ag_bookmarks_value){
	    if($ag_bookmarks_value->data() == $AG_bookmark_ID)
	    {
		$bookmarkCheck = true;
	    }
              }
            }

            if($bookmarkCheck == true){
              // WRITE NEW BOOKMARK XML
              $ag_content = "";
              $ag_content.="<bookmarks>"."\n";
              if(!empty($ag_bookmarks_array)){
	  foreach($ag_bookmarks_array as $ag_bookmarks_key => $ag_bookmarks_value){
	      if($ag_bookmarks_value->data()==$AG_bookmark_ID){
	          $ag_content.='  <bookmark>'.$AG_newPath.'/</bookmark>'."\n";
	      }else{
	          $ag_content.='  <bookmark>'.$ag_bookmarks_value->data().'</bookmark>'."\n";
	      }
	  }
              }

              $ag_content.="</bookmarks>"."\n";

              if(!empty($ag_content)){
	    $handle = fopen($ag_bookmarkFile,"w") or die("");
	    if(!fwrite($handle,$ag_content)){
	        JFactory::getApplication()->enqueueMessage( JText::_( "CANNOT WRITE GALLERY LISTING:" )."&nbsp;".$AG_bookmark_ID, 'error' );
	    }
	    fclose($handle);
              }

            }
    }

    function _bookmarkRemove($AG_cbox_bookmarkRemove) {
        foreach($AG_cbox_bookmarkRemove as $key => $AG_bookmark_ID){
            $ag_bookmarkFile=JPATH_SITE.'/administrator/components/com_admirorgallery/assets/bookmarks.xml';

            $ag_bookmarks_xml =& JFactory::getXMLParser( 'simple' );
            $ag_bookmarks_xml->loadFile( $ag_bookmarkFile );
            $ag_bookmarks_array = $ag_bookmarks_xml->document->bookmark;

            // CHECK IF BOOKMARK ALREADY EXISTS
            $bookmarkCheck = false;
            if(!empty($ag_bookmarks_array)){
              foreach($ag_bookmarks_array as $ag_bookmarks_key => $ag_bookmarks_value){
	    if($ag_bookmarks_value->data() == $AG_bookmark_ID)
	    {
		$bookmarkCheck = true;
	    }
              }
            }

            if($bookmarkCheck == true){
              // WRITE NEW BOOKMARK XML
              $ag_content = "";
              $ag_content.="<bookmarks>"."\n";
              if(!empty($ag_bookmarks_array)){
	    foreach($ag_bookmarks_array as $ag_bookmarks_key => $ag_bookmarks_value){
		if((!empty($ag_bookmarks_value)) && ($ag_bookmarks_value->data()!=$AG_bookmark_ID)){
		              $ag_content.='  <bookmark>'.$ag_bookmarks_value->data().'</bookmark>'."\n";
		}
	    }
              }

              $ag_content.="</bookmarks>"."\n";

              if(!empty($ag_content)){
	    $handle = fopen($ag_bookmarkFile,"w") or die("");
	    if(fwrite($handle,$ag_content)){
	        JFactory::getApplication()->enqueueMessage( JText::_( "GALLERY REMOVED FROM LISTING:" )."&nbsp;".$AG_bookmark_ID, 'message' );
	    }else{
	        JFactory::getApplication()->enqueueMessage( JText::_( "CANNOT WRITE GALLERY LISTING:" )."&nbsp;".$AG_bookmark_ID, 'error' );
	    }
	    fclose($handle);
              }

            }
        }
    }

    function _bookmarkAdd($AG_cbox_bookmarkAdd) {
        foreach($AG_cbox_bookmarkAdd as $key => $value){

            if(!empty($value) && is_dir(JPATH_SITE.$value)){

	$ag_bookmarkFile=JPATH_SITE.'/administrator/components/com_admirorgallery/assets/bookmarks.xml';

	$bookmarkCheck= false;
	$ag_bookmarks_xml =& JFactory::getXMLParser( 'simple' );
	$ag_bookmarks_xml->loadFile( $ag_bookmarkFile );

	if(isset($ag_bookmarks_xml->document->bookmark)){
	    $ag_bookmarks_array = $ag_bookmarks_xml->document->bookmark;
	    // CHECK IS BOOKMARK ALREADY EXISTS
	    $bookmarkCheck = false;
	    if(!empty($ag_bookmarks_array)){
	        foreach($ag_bookmarks_array as $key2 => $value2){
	            if($value2->data() == $value)
	            {
		  $bookmarkCheck = true;
	            }
	        }
	    }
	}

	if($bookmarkCheck == false){

	    // WRITE NEW BOOKMARK XML
	    $ag_content = "";
	    $ag_content.="<bookmarks>"."\n";
	    if(!empty($ag_bookmarks_array)){
	        foreach($ag_bookmarks_array as $key2 => $value2){
		      if(!empty($value2)){
			  $ag_content.='  <bookmark>'.$value2->data().'</bookmark>'."\n";
		      }
	        }
	    }
	    $ag_content.='  <bookmark>'.$value.'</bookmark>'."\n";

	    $ag_content.="</bookmarks>"."\n";

	    if(!empty($ag_content)){
	        $handle = fopen($ag_bookmarkFile,"w") or die("");
	        if(fwrite($handle,$ag_content)){
	            JFactory::getApplication()->enqueueMessage( JText::_( "GALLERY ADDED:" )."&nbsp;".$value, 'message' );
	        }else{
	            JFactory::getApplication()->enqueueMessage( JText::_( "CANNOT WRITE GALLERY LISTING:" )."&nbsp;".$value, 'error' );
	        }
	        fclose($handle);
	    }

	}else{
	    JFactory::getApplication()->enqueueMessage( JText::_( "GALLERY ALREADY EXISTS:" )."&nbsp;".$value, 'error' );
	}
            }

        }
    }

    function _cbox_priority($ag_preview_checked_array) {

        foreach($ag_preview_checked_array as $key => $value){

            $ag_itemURL = $key;
            $ag_priority = $value;
            $ag_folderName = dirname($ag_itemURL);

            if(is_numeric($ag_priority)){

	// Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
	$ag_pathWithStripExt=JPATH_SITE.$ag_folderName.'/'.JFile::stripExt(basename($ag_itemURL));
	$ag_imgXML_path=$ag_pathWithStripExt.".xml";
	if(JFIle::exists($ag_pathWithStripExt.".XML")){
	            $ag_imgXML_path=$ag_pathWithStripExt.".XML";
	}

	$ag_priority_new = '<priority>'.$ag_priority.'</priority>';

	$ag_imgXML_priority="";
	if(file_exists($ag_imgXML_path)){
	          $ag_imgXML_xml = & JFactory::getXMLParser( 'simple' );
	          $ag_imgXML_xml->loadFile($ag_imgXML_path);
	          $ag_imgXML_priority =& $ag_imgXML_xml->document->priority[0]->data();
	}

            if($ag_imgXML_priority != $ag_priority){
	if(file_exists($ag_imgXML_path)){
	            $file=fopen($ag_imgXML_path,"r");
	            while (!feof($file))
	            {
		          $ag_imgXML_content.=fgetc($file);
	            }
	            fclose($file);
	            $ag_imgXML_content = preg_replace("#<priority[^}]*>(.*?)</priority>#s", $ag_priority_new,$ag_imgXML_content);
	}else{
	            $timeStamp = date ("YmdHs", filemtime(JPATH_SITE.$ag_itemURL));
	            $ag_imgXML_content = '<?xml version="1.0" encoding="utf-8"?>'."\n".'<image>'."\n".'<date>'.$timeStamp.'</date>'."\n".$ag_priority_new."\n".'<captions>'."\n".'</captions>'."\n".'</image>';
	}

	if(!empty($ag_imgXML_content)){
	            $handle = fopen($ag_imgXML_path,"w") or die("");
	            if(fwrite($handle,$ag_imgXML_content)){
		JFactory::getApplication()->enqueueMessage( JText::_( "DESCRIPTION FILE CREATED:" )."&nbsp;".basename($ag_itemURL), 'message' );
	            }else{
		JFactory::getApplication()->enqueueMessage( JText::_( "CANNOT WRITE DESCRIPTION FILE:" )."&nbsp;".basename($ag_itemURL), 'error' );
	            }
	            fclose($handle);
	}
              }

            }else{
	if(!empty($ag_priority)){
	    JFactory::getApplication()->enqueueMessage( JText::_( "PRIORITY MUST BE NUMERIC VALUE FOR IMAGE:" )."&nbsp;".basename($ag_itemURL), 'error' );
	}
            }
        }

    }

    function _fileUpload($AG_itemURL,$file) {
        $config =& JFactory::getConfig();
        $tmp_dest = $config->getValue('config.tmp_path');
        $ag_ext_valid = array ("jpg","jpeg","gif","png","zip");

        //Clean up filename to get rid of strange characters like spaces etc
        $filename = JFile::makeSafe($file['name']);
        $ag_file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        $src = $file['tmp_name'];
        $dest = $tmp_dest.DS.$filename;

        // FILTER EXTENSION
        $ag_ext_check = array_search($ag_file_ext,$ag_ext_valid);
        if(is_numeric($ag_ext_check)){
              if ( JFile::upload($src, $dest) ) {
	          if ($ag_file_ext == "zip") {
		        if(JArchive::extract($tmp_dest.DS.$filename, JPATH_SITE.$AG_itemURL)){
		            JFile::delete($tmp_dest.DS.$filename);
		            JFactory::getApplication()->enqueueMessage( JText::_( 'ZIP PACKAGE IS UPLOADED AND EXTRACTED:' )."&nbsp;".$filename, 'message' );
		        }
	          }else{
		        if(JFile::copy($tmp_dest.DS.$filename, JPATH_SITE.$AG_itemURL.$filename)){
		            JFile::delete($tmp_dest.DS.$filename);
		            JFactory::getApplication()->enqueueMessage( JText::_( 'IMAGE IS UPLOADED:' )."&nbsp;".$filename, 'message' );
		        }
	          }
              } else {
	          $ag_error[] = Array ();
	  JFactory::getApplication()->enqueueMessage( JText::_( 'CANNOT UPLOAD FILE:' )."&nbsp;".$filename, 'error' );
              }
        }else{
            JFactory::getApplication()->enqueueMessage( JText::_( "ONLY JPG, JPEG, GIF, PNG AND ZIP ARE VALID EXTENSIONS." ), 'error' );
        }
    }

    function _addFolders($AG_itemURL,$AG_addFolders) {
          foreach($AG_addFolders as $key => $value){
              if(!empty($value)){		
	    $newFolderName=$value;
	    // CREATE WEBSAFE TITLES
	    if(!empty($this->webSafe)){
		    foreach($this->webSafe as $webSafekey => $webSafevalue){
			  $newFolderName = str_replace($webSafevalue,"-",$newFolderName);
		    }	
	    }
	    $newFolderName = htmlspecialchars(strip_tags($newFolderName));
	    if(!file_exists(JPATH_SITE.$AG_itemURL.$newFolderName)){
	        if(JFolder::create(JPATH_SITE.$AG_itemURL.$newFolderName,0755)){
	            JFactory::getApplication()->enqueueMessage( JText::_( "FOLDER CREATED:" )."&nbsp;".$newFolderName, 'message' );
	        }else{
	            JFactory::getApplication()->enqueueMessage( JText::_( "CANNOT CREATE FOLDER:" )."&nbsp;".$newFolderName, 'error' );
	        }
	    }else{
	        JFactory::getApplication()->enqueueMessage( JText::_( "FOLDER ALREADY EXISTS:" )."&nbsp;".$newFolderName, 'error' );	   
	    }
              }//if(!empty($value))
          }
    }

    function _remove($AG_cbox_remove) {
        foreach($AG_cbox_remove as $key => $value){
	$AG_folderName = dirname($value);
	// DELETE
	if(is_dir(JPATH_SITE.DS.$value)){
	      if(JFolder::delete(JPATH_SITE.DS.$value)){	          
	          $this->_bookmarkRemove(array($value));
	          JFactory::getApplication()->enqueueMessage( JText::_( 'ITEM DELETED:' )."&nbsp;".$value, 'message' );
	      }else{
	          JFactory::getApplication()->enqueueMessage( JText::_( 'CANNOT DELETE ITEM:' )."&nbsp;".$value, 'error' );	      
	      }
	}else{
	      if(JFile::delete(JPATH_SITE.DS.$value)){
	            // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
	            $AG_pathWithStripExt=JPATH_SITE.$AG_folderName.'/'.JFile::stripExt(basename($value));
	            $AG_imgXML_path=$AG_pathWithStripExt.".XML";
	            if(JFIle::exists($AG_pathWithStripExt.".xml")){
		        $AG_imgXML_path=$AG_pathWithStripExt.".xml";
	            }

	            if (file_exists($AG_imgXML_path)){
		JFile::delete($AG_imgXML_path);
	            }
	            JFactory::getApplication()->enqueueMessage( JText::_( 'ITEM DELETED:' )."&nbsp;".$value, 'message' );
	      }else{
	          JFactory::getApplication()->enqueueMessage( JText::_( 'CANNOT DELETE ITEM:' )."&nbsp;".$value, 'error' );	      
	      }
	}
        }
    }

    function _rename($AG_itemURL, $AG_originalPath, $AG_newName) {

        $AG_originalName = basename($AG_originalPath);
        $AG_folderName = dirname($AG_originalPath);


	// CREATE WEBSAFE TITLES
	if(!empty($this->webSafe)){
	    foreach($this->webSafe as $webSafekey => $webSafevalue){
		  $AG_newName = str_replace($webSafevalue,"-",$AG_newName);
	    }	
	}

        if(!is_dir(JPATH_SITE.$AG_originalPath)){
	// Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
	$ag_pathWithStripExt=JPATH_SITE.$AG_folderName.DS.JFile::stripExt($AG_originalName);
	$ag_imgXML_path=$ag_pathWithStripExt.".XML";
	if(JFIle::exists($ag_pathWithStripExt.".xml")){
	    $ag_imgXML_path=$ag_pathWithStripExt.".xml";
	}
	$ag_file_ext = JFile::getExt($AG_originalName);

	$ag_file_new_name = $AG_folderName.DS.$AG_newName.'.'.$ag_file_ext;
	if (!file_exists(JPATH_SITE.$ag_file_new_name)){
	    if(rename(JPATH_SITE.$AG_originalPath,JPATH_SITE.$ag_file_new_name)){
	        if(file_exists($ag_imgXML_path)){
	            rename($ag_imgXML_path,JPATH_SITE.$AG_folderName.DS.$AG_newName.'.xml');
	        }
	        JFactory::getApplication()->enqueueMessage( JText::_( "IMAGE RENAMED:" )."&nbsp;".$AG_originalName, 'message' );
	    }else{
	        JFactory::getApplication()->enqueueMessage( JText::_( "CANNOT RENAME IMAGE:" )."&nbsp;".$AG_originalName, 'error' );
	    }
	}else{
	    JFactory::getApplication()->enqueueMessage( JText::_( "FOLDER WITH THE SAME NAME ALREADY EXISTS." ), 'error' );
	}
        }else{
	if (!file_exists(JPATH_SITE.$AG_folderName.DS.$AG_newName)){
	    if(rename(JPATH_SITE.$AG_originalPath,JPATH_SITE.$AG_folderName.DS.$AG_newName)){
	        $this->_bookmarkRename($AG_originalPath, $AG_folderName.DS.$AG_newName);
	        JFactory::getApplication()->enqueueMessage( JText::_( "FOLDER RENAMED:" )."&nbsp;".$AG_originalName, 'message' );
	    }else{
	      JFactory::getApplication()->enqueueMessage( JText::_( "CANNOT RENAME FOLDER:" )."&nbsp;".$AG_originalName, 'error' );
	    }
	  }else{
	      JFactory::getApplication()->enqueueMessage( JText::_( "FOLDER WITH THE SAME NAME ALREADY EXISTS." ), 'error' );
	  }
        }
    }

    function _desc_content($ag_itemURL,$AG_desc_content, $AG_desc_tags) {
        $ag_folderName = dirname($ag_itemURL);

        // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
        $ag_pathWithStripExt=JPATH_SITE.$ag_folderName.DS.JFile::stripExt(basename($ag_itemURL));
        $ag_imgXML_path=$ag_pathWithStripExt.".xml";
        if(JFIle::exists($ag_pathWithStripExt.".XML")){
	    $ag_imgXML_path=$ag_pathWithStripExt.".XML";
        }

        $ag_captions_new = "";

        $ag_captions_new.="<captions>"."\n";
        if(!empty($AG_desc_content)){
	    foreach($AG_desc_content as $key => $value) {
	          if(!empty($value)){
		      $ag_captions_new .= "\t".'<caption lang="'.strtolower($AG_desc_tags[$key]).'">'.stripslashes(htmlspecialchars($value)).'</caption>'."\n";
	          }	  
	    }
        }
        $ag_captions_new.="</captions>";

        if(file_exists($ag_imgXML_path)){
	    $file=fopen($ag_imgXML_path,"r");
	    while (!feof($file))
	    {
	          $ag_imgXML_content.=fgetc($file);
	    }
	    fclose($file);
	    $ag_imgXML_content = preg_replace("#<captions[^}]*>(.*?)</captions>#s", $ag_captions_new,$ag_imgXML_content);
        }else{
	    $timeStamp = date ("YmdHs", filemtime(JPATH_SITE.$ag_itemURL));
	    $ag_imgXML_content = '<?xml version="1.0" encoding="utf-8"?>'."\n".'<image>'."\n".'<date>'.$timeStamp.'</date>'."\n".'<priority>1</priority>'."\n".$ag_captions_new."\n".'</image>';
        }

        // echo htmlentities($ag_imgXML_content, ENT_QUOTES);

        if(!empty($ag_imgXML_content)){
	    $handle = fopen($ag_imgXML_path,"w") or die("");
	    if(fwrite($handle,$ag_imgXML_content)){
	        JFactory::getApplication()->enqueueMessage( JText::_( "DESCRIPTION FILE CREATED:" )."&nbsp;".basename($ag_itemURL), 'message' );
	    }else{
	        JFactory::getApplication()->enqueueMessage( JText::_( "CANNOT WRITE DESCRIPTION FILE:" )."&nbsp;".basename($ag_itemURL), 'error' );
	    }
	    fclose($handle);
        }
    }

}
