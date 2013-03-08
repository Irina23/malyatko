<?php
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
 
jimport( 'joomla.application.component.model' );

class AdmirorgalleryModelResourcemanager extends JModel
{

    function _install($file) {

	  $AG_resourceType = JRequest::getVar( 'AG_resourceType' );// Current resource type
	  $config =& JFactory::getConfig();
	  $tmp_dest = $config->getValue('config.tmp_path');
	  $resourceType = substr($AG_resourceType,0,strlen($AG_resourceType)-1);	

	  $file_type = "zip";

	  if(isset($file) && !empty($file['name'])){ 
	       //Clean up filename to get rid of strange characters like spaces etc
	       $filename = JFile::makeSafe($file['name']);
	       $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

	       $src = $file['tmp_name'];
	       $dest = $tmp_dest.DS.$filename;

	       //First check if the file has the right extension
	       if ($ext == $file_type) {
		    if ( JFile::upload($src, $dest) ) {

			      if(JArchive::extract($tmp_dest.DS.$filename, JPATH_SITE.DS.'plugins'.DS.'content'.DS.'AdmirorGallery'.DS.$AG_resourceType )){
				   JFile::delete($tmp_dest.DS.$filename);
			      }

			      // TEMPLATE DETAILS PARSING
			      if(JFIle::exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'AdmirorGallery'.DS.$AG_resourceType.DS.JFile::stripExt($filename).DS.'details.xml')){
				   $ag_resourceManager_xml =& JFactory::getXMLParser( 'simple' );
				   $ag_resourceManager_xml->loadFile(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'AdmirorGallery'.DS.$AG_resourceType.DS.JFile::stripExt($filename).DS.'details.xml');
				   if(isset($ag_resourceManager_xml->document->type[0])){
					$ag_resourceManager_type = $ag_resourceManager_xml->document->type[0]->data();	
				   }
			      }

			      if($ag_resourceManager_type == $resourceType){
				   JFactory::getApplication()->enqueueMessage( JText::_( 'ZIP PACKAGE IS INSTALLED:' )."&nbsp;".$filename, 'message' );
			      }else{
				   JFolder::delete(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'AdmirorGallery'.DS.$AG_resourceType.DS.JFile::stripExt($filename));
				   JFactory::getApplication()->enqueueMessage( JText::_( 'ZIP PACKAGE IS NOT VALID RESOURCE TYPE:' )."&nbsp;".$filename, 'error' );
			      }
		    } else {
			 JFactory::getApplication()->enqueueMessage( JText::_( 'CANNOT UPLOAD FILE TO TEMP FOLDER. PLEASE CHECK PERMISSIONS.' ), 'error' );
		    }
	       } else {
		    JFactory::getApplication()->enqueueMessage( JText::_( 'ONLY ZIP ARCHIVES CAN BE INSTALLED.' ), 'error' );
	       }
	  }
    }

    function _uninstall($ag_cidArray) {	  
	  $AG_resourceType = JRequest::getVar( 'AG_resourceType' );// Current resource type
	  foreach($ag_cidArray as $ag_cidArrayKey => $ag_cidArrayValue){
		    if(!empty($ag_cidArrayValue)){
			 if(JFolder::delete(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'AdmirorGallery'.DS.$AG_resourceType.DS.$ag_cidArrayValue)){
			      JFactory::getApplication()->enqueueMessage( JText::_( 'PACKAGE REMOVED:' )."&nbsp;".$ag_cidArrayValue, 'message' );
			 }else{
			      JFactory::getApplication()->enqueueMessage( JText::_( 'PACKAGE CANNOT BE REMOVED:' )."&nbsp;".$ag_cidArrayValue, 'error' );
			 }
		    }
	  }
    }

}
