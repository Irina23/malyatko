<?php defined( "_JEXEC" ) or die( "Restricted access" );

/**
 * @package             Joomla
 * @subpackage          CoalaWeb Social Links Module
 * @author              Steven Palmer
 * @author url          http://coalaweb.com
 * @author email        support@coalaweb.com
 * @license             GNU/GPL, see /assets/en-GB.license.txt
 * @copyright           Copyright (c) 2013 Steven Palmer All rights reserved.
 *
 * CoalaWeb Social Links is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
require_once dirname(__FILE__).'/helper.php';

$doc                = JFactory::getDocument();
$moduleClassSfx     = htmlspecialchars($params->get('moduleclass_sfx'));

/* Link details */
$link               = JURI::getInstance()->toString();
$link               = rawurlencode($link);
$title              = $doc->getTitle();
$title              = rawurlencode($title);
$size               = $params->get('icon_size');

/* Icon settings */
$icon_align         = $params->get('icon_align');
$themes_icon        = $params->get('themes_icon');

/* Module Settings */
$module_unique_id   = $params->get('module_unique_id');
$module_width       = $params->get('module_width');

/* Sections settings*/
$display_bm_sec      = $params->get('display_bm_sec');
$display_f_sec       = $params->get('display_f_sec');

/* Border settings */
$display_borders     = $params->get('display_borders');
$border_width        = $params->get('border_width');
$border_color_bm     = $params->get('border_color_bm');
$border_color_f      = $params->get('border_color_f');

/* Titles */
$title_align         = $params->get('title_align');
$title_format         = $params->get('title_format');
$title_bm            = $params->get('title_bm',JTEXT::_('MOD_COALAWEBSOCIALLINKS_TITLE_BOOKMARK'));
$display_title_bm    = $params->get('display_title_bm');
$title_color_bm      = $params->get('title_color_bm');
$title_f             = $params->get('title_f',JTEXT::_('MOD_COALAWEBSOCIALLINKS_TITLE_FOLLOW'));
$display_title_f     = $params->get('display_title_f');
$title_color_f       = $params->get('title_color_f');

/* Follow Links */
$linkfacebook       = $params->get('link_facebook');
$linkgoogle         = $params->get('link_google');
$linklinkedin       = $params->get('link_linkedin');
$linktwitter        = $params->get('link_twitter');
$linkrss            = $params->get('link_rss');
$linkmyspace        = $params->get('link_myspace');
$linkvimeo          = $params->get('link_vimeo');
$linkyoutube        = $params->get('link_youtube');
$linkdribbble       = $params->get('link_dribbble');
$linkdeviantart     = $params->get('link_deviantart');
$linkcontact        = $params->get('link_contact');
$linkebay           = $params->get('link_ebay');
$linktuenti         = $params->get('link_tuenti');
$linkbehance        = $params->get('link_behance');
$linkdesignmoo      = $params->get('link_designmoo');
$linkflickr         = $params->get('link_flickr');
$linklastfm         = $params->get('link_lastfm');
$linkpinterest      = $params->get('link_pinterest');
$linktumblr         = $params->get('link_tumblr');
$linkinstagram      = $params->get('link_instagram');

/* Powered by */
$copy               = $params->get('copy');
$powered            = $params->get('powered',JTEXT::_('MOD_COALAWEBSOCIALLINKS_POWERED'));

/* Load css */
$load_layout_css    = $params->get('load_layout_css');
$urlModMedia        = JURI :: base(). 'media/mod_coalawebsociallinks/';
if($load_layout_css) { $doc->addStyleSheet($urlModMedia . 'css/cwsl_config.css'); }
$doc->addStyleSheet($urlModMedia . 'themes-icon/'.$themes_icon.'/cwsl_style.css');

require JModuleHelper::getLayoutPath('mod_coalawebsociallinks', $params->get('layout', 'default'));

