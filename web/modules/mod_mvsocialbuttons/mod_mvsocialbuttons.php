<?php
// no direct access
defined( "_JEXEC" ) or die( "Restricted access" );
$urlPath = JURI::base() . "modules/mod_mvsocialbuttons/";
// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');
$doc = JFactory::getDocument();
$style = $urlPath . "style.css";
$doc->addStyleSheet($style);
$link       = JURI::getInstance();
$link       = $link->toString();
$title  = $doc->getTitle();
$title      = rawurlencode($title);
$link       = rawurlencode($link);
$stylePath = $urlPath . "images/" . $params->get("style");
require(JModuleHelper::getLayoutPath('mod_mvsocialbuttons'));