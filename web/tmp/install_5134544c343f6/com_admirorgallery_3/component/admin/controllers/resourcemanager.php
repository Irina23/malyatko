<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

// Preloading joomla tools
jimport( 'joomla.installer.helper' );
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.archive');
jimport('joomla.html.pagination');
jimport('joomla.filesystem.folder');
JHTML::_('behavior.tooltip');

class AdmirorgalleryControllerResourcemanager extends AdmirorgalleryController
{
	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();

		// Register Extra tasks
		$this->registerTask( 'AG_apply', 'AG_apply' );
		$this->registerTask( 'AG_reset', 'AG_reset' );
	}

	function AG_apply()
	{

	       $model = $this->getModel('resourcemanager');

	       // INSTALL
	       $file = JRequest::getVar( 'AG_fileUpload', null, 'files' );
	       if(isset($file) && !empty($file['name'])){ 
		    $model->_install($file);
	       }

	       // UNINSTALL
	       $ag_cidArray = JRequest::getVar( 'cid' );
	       if(!empty($ag_cidArray)){
		    $model->_uninstall($ag_cidArray);
	       }

	       parent::display();
	}

	function AG_reset()
	{
	    parent::display();
	}


}
