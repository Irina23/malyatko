<?php
/**
 * @version		$Id: image.php 14401 2010-01-26 14:10:00Z louis $
 * @package		Joomla
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

/**
 * Editor Image buton
 *
 * @package Editors-xtd
 * @since 1.5
 */
class plgButtonAdmirorgallery extends JPlugin
{
	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param 	object $subject The object to observe
	 * @param 	array  $config  An array that holds the plugin configuration
	 * @since 1.5
	 */
	function plgButtonAdmirorgallery(& $subject, $config)
	{
		parent::__construct($subject, $config);
	}

	/**
	 * Display the button
	 *
	 * @return array A two element array of ( imageName, textToInsert )
	 */
	function onDisplay($name)
	{
		global $mainframe;
		$params =& JComponentHelper::getParams('com_admirorgallery');

		$doc = & JFactory::getDocument();
		$doc->addStyleSheet(JURI::root().'administrator/components/com_admirorgallery/templates/default/css/add-trigger.css');
		$doc->addScript(JURI::root().'plugins/content/AdmirorGallery/AG_jQuery.js');
		$doc->addScriptDeclaration("            
		function buttonTestClick(txt) {
		    if(!txt) return;
		    jInsertEditorText(txt, '".$name."');
		}
		");

		$template 	= $mainframe->getTemplate();

        $app =& JFactory::getApplication();
	       
        $link = 'index.php?option=com_admirorgallery&amp;view=button&amp;tmpl=component&amp;e_name='.$name;

		JHTML::_('behavior.modal');

		$button = new JObject();
		$button->set('modal', true); // modal dialog
		$button->set('link', $link); //link to open on click
		$button->set('text', JText::_('Admiror Gallery')); //button text
		$button->set('name', 'admirorgallery'); //div class
		$button->set('options', "{handler: 'iframe', size: {x: 400, y: 300}}"); //need to work

		return $button;
	}
}

