<?php
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

class AdmirorgalleryViewImagemanager extends JView
{
    function display($tpl = null)
    {

        // Make sure you are logged in and have the necessary access
        $validUsers = Array("Super Administrator","Administrator","Manager","Publisher");
        $user =& JFactory::getUser();
        if (!in_array($user->usertype, $validUsers)) {
            JResponse::setHeader('HTTP/1.0 403',true);
            JError::raiseWarning( 403, JText::_('ALERTNOTAUTH') );
            return;
        }

        $mainframe = &JFactory::getApplication();
        $params = &$mainframe->getParams();

        $this->assignRef( 'galleryName', $params->get( 'galleryName' ) );

        parent::display($tpl);

    }
}
