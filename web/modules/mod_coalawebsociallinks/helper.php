<?php defined('_JEXEC') or die('Restricted access');

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

class CoalawebSocialLinksHelper {
   
    /* Bookmark functions */
    
    public static function getDeliciousBookmark($title, $link, $size){
            
        return 
        '<li>
                <a class="delicious'.$size.'" href="http://del.icio.us/post?v=2&amp;url=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_BOOKMARK", "Delicious") . '" target="_blank" ></a>
        </li>';
    
    }
    
    public static function getDiggBookmark($title, $link, $size){
        
        return 
        '<li>
            <a class="digg'.$size.'" href="http://digg.com/submit?phase=2&amp;url=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_BOOKMARK", "Digg") . '" target="_blank" ></a>
        </li>';
    
    }
    
    public static function getFacebookBookmark($title, $link, $size){
        
        return 
        '<li>
            <a class="facebook'.$size.'" href="http://www.facebook.com/sharer.php?u=' . $link . '&amp;t=' . $title . '" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_BOOKMARK", "Facebook") . '" target="_blank" ></a>
        </li>';
    
    }
    
    public static function getGoogleBookmark($title, $link, $size){
        
        return 
        '<li>
            <a class="googleplus'.$size.'" href="https://plus.google.com/share?url=' . $link . '&amp;title=' . $title .  '" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_BOOKMARK", "Google") . '" target="_blank" ></a>
        </li>';
    
    }
    
    public static function getStumbleuponBookmark($title, $link, $size){
        
        return 
        '<li>
            <a class="stumbleupon'.$size.'"  href="http://www.stumbleupon.com/submit?url=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_BOOKMARK", "Stumbleupon") . '" target="_blank" ></a>
        </li>';
    
    }
    
    public static function getTechnoratiBookmark($link, $size){
        
        return 
        '<li>
            <a class="technorati'.$size.'"  href="http://technorati.com/faves?add=' . $link . '" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_BOOKMARK", "Technorati") . '" target="_blank" ></a>
        </li>';
    
    }
    
    public static function getTwitterBookmark($title, $link, $size){
        
        return 
        '<li>
            <a class="twitter'.$size.'" href="http://twitter.com/intent/tweet?status=' . $title . '%20' . $link . '" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_BOOKMARK", "Twitter") . '" target="_blank" ></a>
        </li>';
    
    }
    
    public static function getLinkedInBookmark($title, $link, $size){
        
        return 
        '<li>
            <a class="linkedin'.$size.'" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=' . $link .'&amp;title=' . $title . '" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_BOOKMARK", "LinkedIn") . '" target="_blank" ></a>
        </li>';
    
    }
    public static function getNewsvineBookmark($title, $link, $size){
        
        return 
        '<li>
            <a class="newsvine'.$size.'" href="http://www.newsvine.com/_tools/seed?popoff=0&amp;u=' . $link .'&amp;title=' . $title . '" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_BOOKMARK", "Newsvine") . '" target="_blank" ></a>
        </li>';
    
    }
    public static function getRedditBookmark($title, $link, $size){
        
        return 
        '<li>
            <a class="reddit'.$size.'" href="http://reddit.com/submit?url=' . $link .'&amp;title=' . $title . '" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_BOOKMARK", "Reddit") . '" target="_blank" ></a>
        </li>';
    
    }
    public static function getOrkutBookmark($title, $link, $size){
        
        return 
        '<li>
            <a class="orkut'.$size.'" href="http://promote.orkut.com/preview?nt=orkut.com&amp;tt=' . $title .'&amp;du=' . $link . '" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_BOOKMARK", "Orkut") . '" target="_blank" ></a>
        </li>';
    
    }
    public static function getEmailBookmark($title, $link, $size){
        
        return 
        '<li>
            <a class="gmail'.$size.'" href="mailto:?subject=' . $title .'&amp;body=' . $link . '" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_EMAIL_BM", "Email") . '" ></a>
        </li>';
    
    }
    
    /* Follow Us functions */
    
    public static function getFacebookFollow($linkfacebook, $size){
            
        return 
        '<li>
                <a class="facebook'.$size.'" href="http://'. $linkfacebook .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Facebook") . '" target="_blank" ></a>
        </li>';
    
    }
    
        public static function getGoogleFollow($linkgoogle, $size){
            
        return 
        '<li>
                <a class="googleplus'.$size.'" href="http://'. $linkgoogle .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Google +") . '" target="_blank" ></a>
        </li>';
    
    }
    
        public static function getLinkedinFollow($linklinkedin, $size){
            
        return 
        '<li>
                <a class="linkedin'.$size.'" href="http://'. $linklinkedin .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Linkedin") . '" target="_blank" ></a>
        </li>';
    
    }
    
        public static function getTwitterFollow($linktwitter, $size){
            
        return 
        '<li>
                <a class="twitter'.$size.'" href="http://'. $linktwitter .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Twitter") . '" target="_blank" ></a>
        </li>';
    
    }
    
        public static function getRssFollow($linkrss, $size){
            
        return 
        '<li>
                <a class="rss'.$size.'" href="http://'. $linkrss .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "RSS") . '" target="_blank" ></a>
        </li>';
    
    }
            public static function getMyspaceFollow($linkmyspace, $size){
            
        return 
        '<li>
                <a class="myspace'.$size.'" href="http://'. $linkmyspace .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Myspace") . '" target="_blank" ></a>
        </li>';
    
    }
    
        public static function getVimeoFollow($linkvimeo, $size){
            
        return 
        '<li>
                <a class="vimeo'.$size.'" href="http://'. $linkvimeo .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Vimeo") . '" target="_blank" ></a>
        </li>';
    
    }
        public static function getYoutubeFollow($linkyoutube, $size){
            
        return 
        '<li>
                <a class="youtube'.$size.'" href="http://'. $linkyoutube .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Youtube") . '" target="_blank" ></a>
        </li>';
    
    }
        public static function getDribbleFollow($linkdribbble, $size){
            
        return 
        '<li>
                <a class="dribbble'.$size.'" href="http://'. $linkdribbble .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Dribbble") . '" target="_blank" ></a>
        </li>';
    
    }
        public static function getDeviantartFollow($linkdeviantart, $size){
            
        return 
        '<li>
                <a class="deviantart'.$size.'" href="http://'. $linkdeviantart .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Deviantart") . '" target="_blank" ></a>
        </li>';
    
    }
        public static function getContactFollow($linkcontact, $size){
            
        return 
        '<li>
                <a class="gmail'.$size.'" href="http://'. $linkcontact .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_EMAIL_F", "Email") . '" target="_blank" ></a>
        </li>';
    
    }
        public static function getEbayFollow($linkebay, $size){
            
        return 
        '<li>
                <a class="ebay'.$size.'" href="http://'. $linkebay .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Ebay") . '" target="_blank" ></a>
        </li>';
    
    }
        public static function getTuentiFollow($linktuenti, $size){
            
        return 
        '<li>
                <a class="tuenti'.$size.'" href="http://'. $linktuenti .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Tuenti") . '" target="_blank" ></a>
        </li>';
    
    }
        public static function getBehanceFollow($linkbehance, $size){
            
        return 
        '<li>
                <a class="behance'.$size.'" href="http://'. $linkbehance .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Behance") . '" target="_blank" ></a>
        </li>';
    
    }
        public static function getDesignmooFollow($linkdesignmoo, $size){
            
        return 
        '<li>
                <a class="designmoo'.$size.'" href="http://'. $linkdesignmoo .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Designmoo") . '" target="_blank" ></a>
        </li>';
    
    }
        public static function getFlickrFollow($linkflickr, $size){
            
        return 
        '<li>
                <a class="flickr'.$size.'" href="http://'. $linkflickr .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Flickr") . '" target="_blank" ></a>
        </li>';
    
    }
    
        public static function getLastfmFollow($linklastfm, $size){
            
        return 
        '<li>
                <a class="lastfm'.$size.'" href="http://'. $linklastfm .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Last.fm") . '" target="_blank" ></a>
        </li>';
    
    }
    
        public static function getPinterestFollow($linkpinterest, $size){
            
        return 
        '<li>
                <a class="pinterest'.$size.'" href="http://'. $linkpinterest .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Pinterest") . '" target="_blank" ></a>
        </li>';
    
    }
    
        public static function getTumblrFollow($linktumblr, $size){
            
        return 
        '<li>
                <a class="tumblr'.$size.'" href="http://'. $linktumblr .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Tumblr") . '" target="_blank" ></a>
        </li>';
    
    }
    
    public static function getInstagramFollow($linkinstagram, $size){
            
        return 
        '<li>
                <a class="instagram'.$size.'" href="http://'. $linkinstagram .'" title="' . JText::sprintf("MOD_COALAWEBSOCIALLINKS_FOLLOW", "Instagram") . '" target="_blank" ></a>
        </li>';
    
    }
  
}