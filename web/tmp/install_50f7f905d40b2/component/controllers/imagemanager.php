<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

jimport('joomla.filesystem.file');	  
jimport('joomla.filesystem.folder');
jimport('joomla.language.language');
jimport('joomla.filesystem.archive');


class AdmirorgalleryControllerImagemanager extends AdmirorgalleryController
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

	    $model = $this->getModel('imagemanager');

	    $AG_itemURL = JRequest::getVar( 'AG_itemURL' );
	    if(is_dir(JPATH_SITE.$AG_itemURL)){

	        // FOLDER MODELS

	        // BOOKMARK REMOVE
	        $AG_cbox_bookmarkRemove = JRequest::getVar( 'AG_cbox_bookmarkRemove' );
	        if(!empty($AG_cbox_bookmarkRemove)){
	            $model->_bookmarkRemove($AG_cbox_bookmarkRemove);
	        }

	        // BOOKMARK ADD
	        $AG_cbox_bookmarkAdd = JRequest::getVar( 'AG_cbox_bookmarkAdd' );
	        if(!empty($AG_cbox_bookmarkAdd)){
	            $model->_bookmarkAdd($AG_cbox_bookmarkAdd);
	        }

	        // PRIORITY
	        $AG_cbox_priority = JRequest::getVar( 'AG_cbox_priority' );
	        if(!empty($AG_cbox_priority)){
	            $model->_cbox_priority($AG_cbox_priority);
	        }

	        // UPLOAD
	        $file = JRequest::getVar( 'AG_fileUpload', null, 'files' );
	        if(isset($file) && !empty($file['name'])){ 
	            $model->_fileUpload($AG_itemURL,$file);
	        }

	        // ADD FOLDERS
	        $AG_addFolders = JRequest::getVar( 'AG_addFolders' );
	        if(!empty($AG_addFolders)){
	            $model->_addFolders($AG_itemURL,$AG_addFolders);
	        }

	        // REMOVE
	        $AG_cbox_remove = JRequest::getVar( 'AG_cbox_remove' );
	        if(!empty($AG_cbox_remove)){
	            $model->_remove($AG_cbox_remove);
	        }

	        // RENAME
	        $AG_rename = JRequest::getVar( 'AG_rename' );
	        $webSafe=Array("/"," ",":",".","+","&");
	        if(!empty($AG_rename)){
	            foreach($AG_rename as $ren_key => $ren_value){
		$AG_originalName=JFile::stripExt(basename($ren_key));
		// CREATE WEBSAFE TITLES
		foreach($webSafe as $key => $value){
		    $AG_newName = str_replace($value,"-",$ren_value);
		}
		if($AG_originalName != $AG_newName && !empty($ren_value)){
		    $model->_rename($AG_itemURL, $ren_key, $AG_newName);
		}        
	            }
	        }
	        
	    }else{
	        // FILE MODELS

	        // DESCRIPTIONS
	        $AG_desc_content = JRequest::getVar( 'AG_desc_content' );
	        $AG_desc_tags = JRequest::getVar( 'AG_desc_tags' );
	        if(!empty($AG_desc_content)){
	            $model->_desc_content($AG_itemURL,$AG_desc_content,$AG_desc_tags);
	        }

	    }

	    parent::display();
	}

	function AG_reset()
	{
	    parent::display();
	}

}
