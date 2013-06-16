<?php
defined('_JEXEC') or die;
$menu = & JSite::getMenu();
//&#1055;&#1086;&#1083;&#1091;&#1095;&#1080;&#1083;&#1080; &#1075;&#1083;&#1072;&#1074;&#1085;&#1086;&#1077; &#1084;&#1077;&#1085;&#1102;
//
//&#1045;&#1089;&#1083;&#1080; &#1084;&#1099; &#1085;&#1072;&#1093;&#1086;&#1076;&#1080;&#1084;&#1089;&#1103; &#1074; &#1075;&#1083;&#1072;&#1074;&#1085;&#1086;&#1084; &#1087;&#1091;&#1085;&#1090;&#1082;&#1077;,

$catid = JRequest::getInt('catid');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css" type="text/css" />



</head>
    <body id="<?php if((JSite::getMenu()->getActive()->id ==101) or (JSite::getMenu()->getActive()->id ==230)){echo 'home';}
    if((JSite::getMenu()->getActive()->id ==102) or (JSite::getMenu()->getActive()->id ==231)){echo 'about';}
    if((JSite::getMenu()->getActive()->id ==103) or (JSite::getMenu()->getActive()->id ==232)){echo 'personnel';}
    if((JSite::getMenu()->getActive()->id ==104) or (JSite::getMenu()->getActive()->id ==233)){echo 'photogallery';}
    if((JSite::getMenu()->getActive()->id ==105) or (JSite::getMenu()->getActive()->id ==234)){echo 'contacts';}
    if((JSite::getMenu()->getActive()->id ==106) or (JSite::getMenu()->getActive()->id ==235)){echo 'donate';}?>">
    <div id="wrap">
        <div id="header" >
            <jdoc:include type="modules" name="Languagemenu" />
            <jdoc:include type="modules" name="user3" />
            <jdoc:include type="modules" name="mainmenu" />
            <h2><?php $document = & JFactory::getDocument();
            $curlang = $document->language;
            if ($curlang == 'en-gb') {
                echo 'Name';
            }
            if ($curlang == 'uk-ua') {
                echo 'Комунальний заклад<br />
                "Черкаський обласний<br />
                спеціалізований<br />
                Будинок дитини"<br />
                Черкаської обласної ради';
            }?></h2>

        </div><!-- header -->
        <div id="content" class="<?php if((JSite::getMenu()->getActive()->id ==101) or (JSite::getMenu()->getActive()->id ==230)){echo 'home';}
        if((JSite::getMenu()->getActive()->id ==105) or (JSite::getMenu()->getActive()->id ==234)){echo 'contacts';}
        if((JSite::getMenu()->getActive()->id ==103) or (JSite::getMenu()->getActive()->id ==232)){echo 'personnel';}
        if((JSite::getMenu()->getActive()->id ==102) or (JSite::getMenu()->getActive()->id ==231)){echo 'about';}?>">
            <jdoc:include type="modules" name="user2" />
            <jdoc:include type="component" />
        </div><!-- content -->


    </div>
    <div id="footer">
        <p><a href="http://geekhub.ck.ua/">geekhub</a> Powered by geekhub</p>
    </div>
</body>
</html>
