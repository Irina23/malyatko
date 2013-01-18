<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

JRequest::setVar( 'AG_frontEnd', 'true' );

require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'views'.DS.'imagemanager'.DS.'tmpl'.DS.'default.php');

?>
