<?php
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
 
jimport( 'joomla.application.component.model' );

class AdmirorgalleryModelImagemanager extends JModel
{


    public $webSafe=Array("/"," ",":",".","+","&");

    
    // ========================= THIS SAVES XML
    //
    function _saveXML($ag_itemURL, $ag_XML_path, $ag_XML_content){
        if(!empty($ag_XML_content)){
	    $handle = fopen($ag_XML_path,"w") or die("");
	    if(fwrite($handle,$ag_XML_content)){
	        JFactory::getApplication()->enqueueMessage( JText::_( "DESCRIPTION FILE CREATED:" )."&nbsp;".basename($ag_itemURL), 'message' );
	    }else{
	        JFactory::getApplication()->enqueueMessage( JText::_( "CANNOT WRITE DESCRIPTION FILE:" )."&nbsp;".basename($ag_itemURL), 'error' );
	    }
	    fclose($handle);
        }    
    }

    function _bookmarkRename($AG_originalPath,$AG_newPath) {
            $AG_bookmark_ID = $AG_originalPath.'/';
            $ag_bookmarkFile=JPATH_SITE.'/administrator/components/com_admirorgallery/assets/bookmarks.xml';

            $ag_bookmarks_xml =& JFactory::getXMLParser( 'simple' );
            $ag_bookmarks_xml->loadFile( $ag_bookmarkFile );
            if(isset($ag_bookmarks_xml->document->bookmark)){
                $ag_bookmarks_array = $ag_bookmarks_xml->document->bookmark;
            }

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
            if(isset($ag_bookmarks_xml->document->bookmark)){
                $ag_bookmarks_array = $ag_bookmarks_xml->document->bookmark;
            }

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
	$ag_XML_path=$ag_pathWithStripExt.".xml";
	if(JFIle::exists($ag_pathWithStripExt.".XML")){
	            $ag_XML_path=$ag_pathWithStripExt.".XML";
	}

	$ag_priority_new = '<priority>'.$ag_priority.'</priority>';

	$ag_XML_priority="";
	if(file_exists($ag_XML_path)){
	          $ag_XML_xml = & JFactory::getXMLParser( 'simple' );
	          $ag_XML_xml->loadFile($ag_XML_path);
	          $ag_XML_priority =& $ag_XML_xml->document->priority[0]->data();
	}

            if($ag_XML_priority != $ag_priority){
	if(file_exists($ag_XML_path)){
	            $file=fopen($ag_XML_path,"r");
	            $ag_XML_content="";
	            while (!feof($file))
	            {
		          $ag_XML_content.=fgetc($file);
	            }
	            fclose($file);
	            $ag_XML_content = preg_replace("#<priority[^}]*>(.*?)</priority>#s", $ag_priority_new,$ag_XML_content);
	}else{
	            $ag_XML_content = '<?xml version="1.0" encoding="utf-8"?>'."\n".'<image>'."\n".'<visible>true</visible>'."\n".$ag_priority_new."\n".'<thumb></thumb>'."\n".'<captions>'."\n".'</captions>'."\n".'</image>';
	}

    // Save XML
    $this->_saveXML($ag_itemURL, $ag_XML_path, $ag_XML_content);
	
	
              }

            }else{
	if(!empty($ag_priority)){
	    JFactory::getApplication()->enqueueMessage( JText::_( "PRIORITY MUST BE NUMERIC VALUE FOR IMAGE:" )."&nbsp;".basename($ag_itemURL), 'error' );
	}
            }
        }

    }
    
    
    
    // =================================== _SET_visible
    // 
   function _set_visible($AG_cbox_selectItem, $ag_folderName, $AG_visible) {
        foreach($AG_cbox_selectItem as $key => $value){

            $ag_itemURL = $value;
	       
            // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
            $ag_pathWithStripExt=JPATH_SITE.$ag_folderName.JFile::stripExt(basename($ag_itemURL));
            $ag_XML_path=$ag_pathWithStripExt.".xml";
            if(JFIle::exists($ag_pathWithStripExt.".XML")){
                $ag_XML_path=$ag_pathWithStripExt.".XML";
            }

            // Set new visible tag
            if($AG_visible=="show"){            
                $ag_visible_new = "<visible>true</visible>";
            }else{
                $ag_visible_new = "<visible>false</visible>";            
            }

            $ag_XML_content='';
            if(file_exists($ag_XML_path)){
                $file=fopen($ag_XML_path,"r");
                while (!feof($file)){
                      $ag_XML_content .= fgetc($file);
                }
                fclose($file);
                if (preg_match("#<visible[^}]*>(.*?)</visible>#s", $ag_XML_content)){
                    $ag_XML_content = preg_replace("#<visible[^}]*>(.*?)</visible>#s", $ag_visible_new,$ag_XML_content);
                } else {
                    $ag_XML_content = preg_replace("#</image>#s", $ag_visible_new."\n"."</image>",$ag_XML_content);
                }  
            }else{
                $ag_XML_content = '<?xml version="1.0" encoding="utf-8"?>'."\n".'<image>'."\n".$ag_visible_new."\n".'<priority></priority>'."\n".'<thumb></thumb>'."\n".'<captions></captions>'."\n".'</image>';
            }

            // Save XML
            $this->_saveXML($ag_itemURL, $ag_XML_path, $ag_XML_content);	  
	       
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
    
    
    // COPY
    function _copy($AG_cbox_selectItem, $AG_operations_targetFolder) {
        foreach($AG_cbox_selectItem as $key => $value){
            // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
            $AG_folderName = dirname($value);
            $AG_pathWithStripExt=JPATH_SITE.$AG_folderName.'/'.JFile::stripExt(basename($value));
            $ag_XML_path=$AG_pathWithStripExt.".XML";
            if(JFIle::exists($AG_pathWithStripExt.".xml")){
                $ag_XML_path=$AG_pathWithStripExt.".xml";
            }
	        if(is_dir(JPATH_SITE.DS.$value)){
	            if(JFolder::copy (JPATH_SITE.DS.$value, JPATH_SITE.DS.$AG_operations_targetFolder.DS.basename($value))){
	                if(JFIle::exists($ag_XML_path)){
	                    JFile::copy ($ag_XML_path, JPATH_SITE.DS.$AG_operations_targetFolder.DS.basename($ag_XML_path));
                    }
	                JFactory::getApplication()->enqueueMessage( JText::_( 'ITEM COPIED:' )."&nbsp;".$value, 'message' );
                }else{
                    JFactory::getApplication()->enqueueMessage( JText::_( 'CANNOT COPY ITEM:' )."&nbsp;".$value, 'error' );	      
                }
	        }else{
	            if(JFile::copy (JPATH_SITE.DS.$value, JPATH_SITE.DS.$AG_operations_targetFolder.DS.basename($value))){
	                if(JFIle::exists($ag_XML_path)){
	                    JFile::copy ($ag_XML_path, JPATH_SITE.DS.$AG_operations_targetFolder.DS.basename($ag_XML_path));
                    }
	                JFactory::getApplication()->enqueueMessage( JText::_( 'ITEM COPIED:' )."&nbsp;".$value, 'message' );
                }else{
                    JFactory::getApplication()->enqueueMessage( JText::_( 'CANNOT COPY ITEM:' )."&nbsp;".$value, 'error' );	      
                }
	        }
        }
    }
    
    
    
    // MOVE
    function _move($AG_cbox_selectItem, $AG_operations_targetFolder) {
        foreach($AG_cbox_selectItem as $key => $value){
            // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
            $AG_folderName = dirname($value);
            $AG_pathWithStripExt=JPATH_SITE.$AG_folderName.'/'.JFile::stripExt(basename($value));
            $ag_XML_path=$AG_pathWithStripExt.".XML";
            if(JFIle::exists($AG_pathWithStripExt.".xml")){
                $ag_XML_path=$AG_pathWithStripExt.".xml";
            }	 
	        if(is_dir(JPATH_SITE.DS.$value)){
	            if(JFolder::move (JPATH_SITE.DS.$value, JPATH_SITE.DS.$AG_operations_targetFolder.DS.basename($value))){
                    $this->_bookmarkRemove(array($value));
	                if(JFIle::exists($ag_XML_path)){
		                JFile::move ($ag_XML_path, JPATH_SITE.DS.$AG_operations_targetFolder.DS.basename($ag_XML_path));
	                }
	                JFactory::getApplication()->enqueueMessage( JText::_( 'ITEM MOVED:' )."&nbsp;".$value, 'message' );
                }else{
                    JFactory::getApplication()->enqueueMessage( JText::_( 'CANNOT MOVED ITEM:' )."&nbsp;".$value, 'error' );	      
                }
	        }else{
	            if(JFile::move (JPATH_SITE.DS.$value, JPATH_SITE.DS.$AG_operations_targetFolder.DS.basename($value))){            
	                if(JFIle::exists($ag_XML_path)){
		                JFile::move ($ag_XML_path, JPATH_SITE.DS.$AG_operations_targetFolder.DS.basename($ag_XML_path));
	                }
	                JFactory::getApplication()->enqueueMessage( JText::_( 'ITEM MOVED:' )."&nbsp;".$value, 'message' );
                }else{
                    JFactory::getApplication()->enqueueMessage( JText::_( 'CANNOT MOVED ITEM:' )."&nbsp;".$value, 'error' );	      
                }
	        }
        }
    }
    
    
    
    function _remove($AG_cbox_remove) {
        foreach($AG_cbox_remove as $key => $value){
	        $AG_folderName = dirname($value);
            // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
            $AG_pathWithStripExt=JPATH_SITE.$AG_folderName.'/'.JFile::stripExt(basename($value));
            $ag_XML_path=$AG_pathWithStripExt.".XML";
            if(JFIle::exists($AG_pathWithStripExt.".xml")){
                $ag_XML_path=$AG_pathWithStripExt.".xml";
            }
	        // DELETE
	        if(is_dir(JPATH_SITE.DS.$value)){
	              if(JFolder::delete(JPATH_SITE.DS.$value)){	          
                        $this->_bookmarkRemove(array($value));
                        if (file_exists($ag_XML_path)){
                            JFile::delete($ag_XML_path);
                        }
                        JFactory::getApplication()->enqueueMessage( JText::_( 'ITEM DELETED:' )."&nbsp;".$value, 'message' );
	              }else{
	                  JFactory::getApplication()->enqueueMessage( JText::_( 'CANNOT DELETE ITEM:' )."&nbsp;".$value, 'error' );	      
	              }
	        }else{
	              if(JFile::delete(JPATH_SITE.DS.$value)){
	                    if (file_exists($ag_XML_path)){
		                    JFile::delete($ag_XML_path);
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
	    
	    // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
        $ag_pathWithStripExt=JPATH_SITE.$AG_folderName.DS.JFile::stripExt($AG_originalName);
        $ag_XML_path=$ag_pathWithStripExt.".XML";
        if(JFIle::exists($ag_pathWithStripExt.".xml")){
            $ag_XML_path=$ag_pathWithStripExt.".xml";
        }

        if(!is_dir(JPATH_SITE.$AG_originalPath)){
	        
	        $ag_file_ext = JFile::getExt($AG_originalName);
	        $ag_file_new_name = $AG_folderName.DS.$AG_newName.'.'.$ag_file_ext;
	        if (!file_exists(JPATH_SITE.$ag_file_new_name)){
	            if(rename(JPATH_SITE.$AG_originalPath,JPATH_SITE.$ag_file_new_name)){
	                if(file_exists($ag_XML_path)){
	                    rename($ag_XML_path,JPATH_SITE.$AG_folderName.DS.$AG_newName.'.xml');
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
	                if(file_exists($ag_XML_path)){
	                    rename($ag_XML_path,JPATH_SITE.$AG_folderName.DS.$AG_newName.'.xml');
	                }
	                JFactory::getApplication()->enqueueMessage( JText::_( "FOLDER RENAMED:" )."&nbsp;".$AG_originalName, 'message' );
	            }else{
	              JFactory::getApplication()->enqueueMessage( JText::_( "CANNOT RENAME FOLDER:" )."&nbsp;".$AG_originalName, 'error' );
	            }
            }else{
              JFactory::getApplication()->enqueueMessage( JText::_( "FOLDER WITH THE SAME NAME ALREADY EXISTS." ), 'error' );
            }
        }
    }
    
    // =================================== _FOLDER_DESC_CONTENT
    // It creates caption tags with its content. After that it checks if XML already exists. If is it replace captions, if not it creates a new XML
    function _folder_desc_content($ag_itemURL,$AG_desc_content, $AG_desc_tags,$AG_folder_thumb) {
        $ag_folderName = dirname($ag_itemURL);

        // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
        $ag_pathWithStripExt=JPATH_SITE.$ag_folderName.DS.JFile::stripExt(basename($ag_itemURL));
        $ag_XML_path=$ag_pathWithStripExt.".xml";
        if(JFIle::exists($ag_pathWithStripExt.".XML")){
	        $ag_XML_path=$ag_pathWithStripExt.".XML";
        }

        // Set new Captions tag
        $ag_captions_new = "";
        $ag_captions_new.="<captions>"."\n";
        if(!empty($AG_desc_content)){
	    foreach($AG_desc_content as $key => $value) {
	          if(!empty($value)){
		      $ag_captions_new .= "\t".'<caption lang="'.strtolower($AG_desc_tags[$key]).'">'.htmlspecialchars($value, ENT_QUOTES, "UTF-8").'</caption>'."\n";
	          }	  
	    }
        }
        $ag_captions_new.="</captions>";
        
        // Set new Thumb tag
        $ag_thumb_new = "<thumb>".$AG_folder_thumb."</thumb>";

        $ag_XML_content = "";
        if(file_exists($ag_XML_path)){
	        $file=fopen($ag_XML_path,"r");
	        while (!feof($file))
	        {
	              $ag_XML_content.=fgetc($file);
	        }
	        fclose($file);
            if (preg_match("#<thumb[^}]*>(.*?)</thumb>#s", $ag_XML_content)) {
                $ag_XML_content = preg_replace("#<thumb[^}]*>(.*?)</thumb>#s", $ag_thumb_new,$ag_XML_content);
            } else {
                $ag_XML_content = preg_replace("#</image>#s", $ag_thumb_new."\n"."</image>",$ag_XML_content);
            }
            if (preg_match("#<captions[^}]*>(.*?)</captions>#s", $ag_XML_content)) {
                $ag_XML_content = preg_replace("#<captions[^}]*>(.*?)</captions>#s", $ag_captions_new,$ag_XML_content);
            } else {
                $ag_XML_content = preg_replace("#</image>#s", $ag_captions_new."\n"."</image>",$ag_XML_content);
            }	    
        }else{
	        $ag_XML_content = '<?xml version="1.0" encoding="utf-8"?>'."\n".'<image>'."\n".'<visible>true</visible>'."\n".'<priority></priority>'."\n".'<thumb>'.$AG_folder_thumb.'</thumb>'."\n".$ag_captions_new."\n".'</image>';
        }

        // Save XML
        $this->_saveXML($ag_itemURL, $ag_XML_path, $ag_XML_content);
        
    }
    

    function _desc_content($ag_itemURL,$AG_desc_content, $AG_desc_tags) {
        $ag_folderName = dirname($ag_itemURL);

        // Set Possible Description File Apsolute Path // Instant patch for upper and lower case...
        $ag_pathWithStripExt=JPATH_SITE.$ag_folderName.DS.JFile::stripExt(basename($ag_itemURL));
        $ag_XML_path=$ag_pathWithStripExt.".xml";
        if(JFIle::exists($ag_pathWithStripExt.".XML")){
	    $ag_XML_path=$ag_pathWithStripExt.".XML";
        }

        $ag_captions_new = "";

        $ag_captions_new.="<captions>"."\n";
        if(!empty($AG_desc_content)){
	    foreach($AG_desc_content as $key => $value) {
	          if(!empty($value)){
		      $ag_captions_new .= "\t".'<caption lang="'.strtolower($AG_desc_tags[$key]).'">'.htmlspecialchars($value, ENT_QUOTES, "UTF-8").'</caption>'."\n";
	          }	  
	    }
        }
        $ag_captions_new.="</captions>";

        $ag_XML_content = "";
        if(file_exists($ag_XML_path)){
	        $file=fopen($ag_XML_path,"r");
	        while (!feof($file))
	        {
	              $ag_XML_content.=fgetc($file);
	        }
	        fclose($file);
	        $ag_XML_content = preg_replace("#<captions[^}]*>(.*?)</captions>#s", $ag_captions_new,$ag_XML_content);
        }else{
	        $ag_XML_content = '<?xml version="1.0" encoding="utf-8"?>'."\n".'<image>'."\n".'<visible>true</visible>'."\n".'<priority></priority>'."\n".$ag_captions_new."\n".'</image>';
        }
        
        // Save XML
        $this->_saveXML($ag_itemURL, $ag_XML_path, $ag_XML_content);
        
    }

}
