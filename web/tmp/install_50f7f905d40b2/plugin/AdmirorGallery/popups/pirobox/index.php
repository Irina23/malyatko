<?php

// Joomla security code
defined('_JEXEC') or die('Restricted access');

// Load JavaScript files from current popup folder
$this->loadJS($this->currPopupRoot.'js/pirobox.js');
$this->loadJS($this->currPopupRoot.'js/piroboxInit.js');

// Load CSS from current popup folder
$this->loadCSS($this->currPopupRoot.'css/style.css');

// Set REL attribute needed for Popup engine
$this->popupEngine->rel = 'pirobox[AdmirorGallery'.$this->getGalleryID().']';

// Set CLASS attribute needed for Popup engine
$this->popupEngine->className= 'pirobox_AdmirorGallery'.$this->getGalleryID();

?>
