<?php
 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// OUTPUT
// echo "POST: "."<br />"; print_r($_POST); echo "<hr />";
// echo "GET: "."<br />"; print_r($_GET); echo "<hr />";

$AG_template = "default";// Set template to default
JRequest::setVar( 'AG_template', $AG_template );

// Shared scripts for all views
$doc = &JFactory::getDocument();
$doc->addScript(JURI::root().'plugins/content/AdmirorGallery/AG_jQuery.js');
$doc->addScript(JURI::root().'administrator/components/com_admirorgallery/scripts/jquery.hotkeys-0.7.9.min.js');
$doc->addStyleSheet(JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_template.'/css/template.css');
$doc->addStyleSheet(JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_template.'/css/toolbar.css');

// Require the base controller
require_once( JPATH_COMPONENT.DS.'controller.php' );
 
// Require specific controller if requested
if($controller = JRequest::getWord('controller')) {
     $path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
     if (file_exists($path)) {
	  require_once $path;
     } else {
	  $controller = '';
     }
}
 
// Create the controller
$classname    = 'AdmirorgalleryController'.$controller;
$controller   = new $classname( );
 
// Perform the Request task
$controller->execute( JRequest::getWord( 'task' ) );
 
// Redirect if set by the controller
$controller->redirect();
