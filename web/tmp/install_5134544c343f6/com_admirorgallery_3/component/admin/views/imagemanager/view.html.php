<?php
 
// no direct access 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');
 
class AdmirorgalleryViewImagemanager extends JView
{

    function display($tpl = null)
    {

	  JToolBarHelper::title( JText::_( 'IMAGE MANAGER' ), 'imagemanager' );
	  JToolBarHelper :: custom( 'AG_apply', 'AG_apply','AG_apply', JText::_( 'AG_APPLY DESC' ), false, false );
	  JToolBarHelper :: custom( 'AG_reset', 'AG_reset','AG_reset', JText::_( 'AG_RESET DESC' ), false, false );
	  $doc = &JFactory::getDocument();
	  $doc->addScriptDeclaration('
	       AG_jQuery(function(){

		    // SET SHORCUTS
		    AG_jQuery(document).bind("keydown", "ctrl+return", function (){submitbutton("AG_apply");return false;});	
		    AG_jQuery(document).bind("keydown", "ctrl+backspace", function (){submitbutton("AG_reset");return false;});
		   
	       });//AG_jQuery(function()
	  ');

	  parent::display($tpl);
    }
}
