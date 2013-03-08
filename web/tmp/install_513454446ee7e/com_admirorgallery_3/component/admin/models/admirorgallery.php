<?php
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
 
jimport( 'joomla.application.component.model' );

class AdmirorgalleryModelAdmirorgallery extends JModel
{
    function _update() {
	  $AG_DB_input='';

	  foreach($_POST['params'] as $key => $value){
	       $AG_DB_input.= $key.'='.$value."\n";
	  }

	  // $db =& JFactory::getDBO();
	  // // $query = "INSERT INTO #__ag_content SET id='2', uniqueName='second_row', greeting='Aloha';"; // This add row
	  // $query = "UPDATE #__ag_content SET greeting='Hello World' WHERE uniqueName='second_row';"; // This change value
	  // $db->setQuery($query);
	  // $db->query();

	  $db =& JFactory::getDBO();
	  $query = "UPDATE #__plugins SET params='".$AG_DB_input."' WHERE name LIKE '%AdmirorGallery%';"; // This change value
	  $db->setQuery($query);
	  if($db->query()){
	       JFactory::getApplication()->enqueueMessage( JText::_( "PARAMS UPDATED." ), 'message' );
	  }else{
	       JFactory::getApplication()->enqueueMessage( JText::_( "CANNOT ACCESS TO DATABASE." ), 'error' );
	  }  
    }

}
