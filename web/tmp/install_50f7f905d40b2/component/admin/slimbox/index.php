<?php

/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Restricted access' );

$doc = &JFactory::getDocument();

// Load JavaScript from current popup folder
$doc->addScript(JURI::root().'administrator/components/com_admirorgallery/slimbox/js/slimbox2.js');

// Load CSS from current popup folder
$doc->addStyleSheet(JURI::root().'administrator/components/com_admirorgallery/slimbox/css/slimbox2.css');

?>