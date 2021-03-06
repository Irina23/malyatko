<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
class MvSocialButtonsHelper{
    public static function getExtraButtons($title, $url, &$params) {       
        $html  = "";
        // Extra buttons
        for($i=1; $i < 6;$i++) {
            $btnName = "ebuttons" . $i;
            $extraButton = $params->get($btnName, "");
            if(!empty($extraButton)) {
                $extraButton = str_replace("{URL}", $url,$extraButton);
                $extraButton = str_replace("{TITLE}", $title,$extraButton);
                $html  .= $extraButton;
            }
        }       
        return $html;
    }
/** Кнопка закладки Delicious. **/ 
    public static function getDeliciousButton($title, $link, $style){            
        $img_url = $style. "/delicious.png";        
        return '<a rel="noindex, nofollow" href="http://del.icio.us/post?url=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Delicious") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Delicious") . '" />
        </a>';    
    }
/** Кнопка закладки Digg. **/  
    public static function getDiggButton($title, $link, $style){        
        $img_url = $style . "/digg.png";       
        return '<a rel="noindex, nofollow" href="http://digg.com/submit?url=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Digg") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Digg") . '" />
        </a>';    
    }
    /** Кнопка закладки Facebook. **/ 
    public static function getFacebookButton($title, $link, $style){       
        $img_url = $style . "/facebook.png";        
        return '<a rel="noindex, nofollow" href="http://www.facebook.com/sharer.php?u=' . $link . '&amp;t=' . $title . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Facebook") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Facebook") . '" />
        </a>';  
    }
/** Кнопка закладки Google. **/ 
    public static function getGoogleButton($title, $link, $style){
        $img_url = $style . "/google.png";
        return '<a rel="noindex, nofollow" href="http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=' . $link . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Google Bookmarks") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Google Bookmarks") . '" />
        </a>';   
    }
/** Кнопка закладки в Technorati. **/  
    public static function getTechnoratiButton($title, $link, $style){
        $img_url = $style . "/technorati.png";
        return '<a rel="noindex, nofollow" href="http://technorati.com/faves?add=' . $link . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Technorati") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Technorati") . '" />
        </a>';   
    }
/** Кнопка закладки в Twitter. **/ 
    public static function getTwitterButton($title, $link, $style){
        $img_url = $style . "/twitter.png";
        return '<a rel="noindex, nofollow" href="http://twitter.com/?status=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Twitter") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Twitter") . '" />
        </a>';   
    }
/** Кнопка закладки Linkedin. **/
    public static function getLinkedInButton($title, $link, $style){
        $img_url = $style . "/linkedin.png";       
        return '<a rel="noindex, nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=' . $link .'&amp;title=' . $title . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "LinkedIn") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "LinkedIn") . '" />
        </a>';
    
    }
/** Кнопка закладки ВКонтакте. **/     
    public static function getVkruButton($title, $link, $style){       
        $img_url = $style . "/vkru.png";       
        return '<a rel="noindex, nofollow" href="http://vkontakte.ru/share.php?url=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "ВКонтакте") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "ВКонтакте") . '" />
        </a>';   
    }
/** Кнопка закладки Живой Журнал. **/    
    public static function getLivejButton($title, $link, $style){
        $img_url = $style . "/livej.png";      
        return '<a rel="noindex, nofollow" href="http://www.livejournal.com/update.bml?event=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "LiveJournal") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "LiveJournal") . '" />
        </a>';
    }
/** Кнопка закладки Мой мир. **/     
    public static function getMoymirButton($title, $link, $style){
        $img_url = $style . "/moymir.png";  
        return '<a rel="noindex, nofollow" href="http://connect.mail.ru/share?share_url=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Мой мир") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Мой мир") . '" />
        </a>';
      }
/** Кнопка закладки Я.ру. **/     
    public static function getYaruButton($title, $link, $style){
        $img_url = $style . "/yaru.png";
        return '<a rel="noindex, nofollow" href="http://zakladki.yandex.ru/newlink.xml?url=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Я.ру") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Я.ру") . '" />
        </a>';
        }
/** Кнопка закладки Одноклассники. **/      
    public static function getOdnoklassnikiButton($title, $link, $style){
        $img_url = $style . "/odnoklassniki.png";
        return '<a rel="noindex, nofollow" href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st._surl=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Одноклассники") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Одноклассники") . '" />
        </a>';
    }
/** Кнопка закладки БобрДобр. **/      
    public static function getBobrdobrButton($title, $link, $style){
        $img_url = $style . "/bobrdobr.png";
        return '<a rel="noindex, nofollow" href="http://bobrdobr.ru/add.html?url=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "БобрДобр") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "БобрДобр") . '" />
        </a>';
    }
/** Кнопка закладки Liveinternet. **/      
    public static function getLiveinternetButton($title, $link, $style){
        $img_url = $style . "/liveinternet.png";        
        return '<a rel="noindex, nofollow" href="http://www.liveinternet.ru/journal_post.php?action=n_add&amp;cnurl=' . $link . '&amp;title=' . $title . '" title="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Liveinternet") . '" target="_blank" >
        <img src="' . $img_url . '" alt="' . JText::sprintf("MOD_MVSOCIALBUTTONS_SUBMIT", "Liveinternet") . '" />
        </a>';  
    }
}