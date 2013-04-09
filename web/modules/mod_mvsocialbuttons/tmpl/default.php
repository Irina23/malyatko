<?php
// no direct access
defined( "_JEXEC" ) or die;?>
<div class="mv-socialbuttons-mod<?php echo $params->get('moduleclass_sfx');?>">
   <?php if($params->get('showTitle')){ ?>
   <h4><?php echo $params->get('title');?></h4>
   <?php }?>
    <div class="<?php echo $params->get('displayLines');?>">
        <div class="<?php echo $params->get('displayIcons');?>">
        <?php if($params->get("displayDelicious")) {
          echo MvSocialButtonsHelper::getDeliciousButton($title, $link, $stylePath);
        }
        if($params->get("displayDigg")) {
            echo MvSocialButtonsHelper::getDiggButton($title, $link, $stylePath);
        }
        if($params->get("displayFacebook")) {
            echo MvSocialButtonsHelper::getFacebookButton($title, $link, $stylePath);
        }
        if($params->get("displayGoogle")) {
            echo MvSocialButtonsHelper::getGoogleButton($title, $link, $stylePath);
        }
        if($params->get("displayTechnorati")) {
            echo MvSocialButtonsHelper::getTechnoratiButton($title, $link, $stylePath);            
        }
        if($params->get("displayTwitter")) {
            echo MvSocialButtonsHelper::getTwitterButton($title, $link, $stylePath);
        }
        if($params->get("displayLinkedIn")) {
            echo MvSocialButtonsHelper::getLinkedInButton($title, $link, $stylePath);
        }
		 if($params->get("displayVkruButton")) {
            echo MvSocialButtonsHelper::getVkruButton($title, $link, $stylePath);
        }
		 if($params->get("displayLivejButton")) {
            echo MvSocialButtonsHelper::getLivejButton($title, $link, $stylePath);
        }
		 if($params->get("displayMoymirButton")) {
            echo MvSocialButtonsHelper::getMoymirButton($title, $link, $stylePath);
        }
		 if($params->get("displayYaruButton")) {
            echo MvSocialButtonsHelper::getYaruButton($title, $link, $stylePath);
        }
		 if($params->get("displayOdnoklassnikiButton")) {
            echo MvSocialButtonsHelper::getOdnoklassnikiButton($title, $link, $stylePath);
        }
		 if($params->get("displayBobrdobrButton")) {
            echo MvSocialButtonsHelper::getBobrdobrButton($title, $link, $stylePath);
        }
		 if($params->get("displayLiveinternetButton")) {
            echo MvSocialButtonsHelper::getLiveinternetButton($title, $link, $stylePath);
        }
	    ?>
        <?php echo MvSocialButtonsHelper::getExtraButtons($title, $link, $params); ?>
        </div>
   </div>
</div>