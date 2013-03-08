<?php

// Joomla security code
defined('_JEXEC') or die('Restricted access');

// Load JavaScript from current popup folder
$this->loadJS($this->currPopupRoot.'js/slimbox2.js');

// Load CSS from current popup folder
$this->loadCSS($this->currPopupRoot.'css/slimbox2.css');

// Set REL attribute needed for Popup engine
$this->popupEngine->rel = 'lightbox[AdmirorGallery'.$this->getGalleryID().']';

?>