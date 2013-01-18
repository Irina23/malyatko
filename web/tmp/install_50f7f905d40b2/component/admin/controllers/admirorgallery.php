<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

class AdmirorgalleryControllerAdmirorgallery extends AdmirorgalleryController
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
	       $model = $this->getModel('admirorgallery');

	       // UPDATE
	       $model->_update();
	       
	       parent::display();
	}

	function AG_reset()
	{
	    parent::display();
	}


}
