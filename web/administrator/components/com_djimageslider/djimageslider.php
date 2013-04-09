<?php
/**
 * @version 2.0.0.stable
 * @package DJ-ImageSlider
 * @subpackage DJ-ImageSlider Component
 * @copyright Copyright (C) 2012 DJ-Extensions.com, All rights reserved.
 * @license http://www.gnu.org/licenses GNU/GPL
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Szymon Woronowski - szymon.woronowski@design-joomla.eu
 *
 *
 * DJ-ImageSlider is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DJ-ImageSlider is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DJ-ImageSlider. If not, see <http://www.gnu.org/licenses/>.
 *
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include dependancies
jimport('joomla.application.component.controller');
require_once (JPATH_COMPONENT.DS.'lib'.DS.'image.php');

$db = &JFactory::getDBO();
$db->setQuery("SELECT manifest_cache FROM #__extensions WHERE element='com_djimageslider' LIMIT 1");
$version = json_decode($db->loadResult());
$version = $version->version;

define('DJIMAGESLIDERFOOTER', '<div style="text-align: center; margin: 10px 0;">DJ-ImageSlider (version '.$version.'), &copy; 2010-2012 Copyright by <a target="_blank" href="http://dj-extensions.com">DJ-Extensions.com</a>, All Rights Reserved.<br /><a target="_blank" href="http://dj-extensions.com"><img src="'.JURI::base().'components/com_djimageslider/assets/logo.png" alt="DJ-Extensions.com" /></a></div>');

$controller	= JController::getInstance('djimageslider');

// Perform the Request task
$controller->execute( JRequest::getCmd('task'));
$controller->redirect();

?>