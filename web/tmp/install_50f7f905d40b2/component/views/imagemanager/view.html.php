<?php
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');

class AdmirorgalleryViewImagemanager extends JView
{
    function display($tpl = null)
    {

	  $mainframe = &JFactory::getApplication();
	  $params = &$mainframe->getParams();

	  $this->assignRef( 'galleryName', $params->get( 'galleryName' ) );

	  parent::display($tpl);

    }
}
