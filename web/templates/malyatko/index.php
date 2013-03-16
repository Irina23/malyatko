<?php
defined('_JEXEC') or die;
$menu = & JSite::getMenu();
//Получили главное меню
//
//Если мы находимся в главном пунтке,

$catid = JRequest::getInt('catid');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css" type="text/css" />



</head>
    <body id="<?php if($_SERVER['REQUEST_URI'] == '/'){echo 'home';}
    if($_SERVER['REQUEST_URI'] == '/index.php/about'){echo 'about';}
    if(($_SERVER['REQUEST_URI'] == '/index.php/personnel') or ($catid == 8)){echo 'personnel';}
    if(JSite::getMenu()->getActive()->id ==104){echo 'photogallery';}
    if($_SERVER['REQUEST_URI'] == '/index.php/contacts'){echo 'contacts';}
    if($_SERVER['REQUEST_URI'] == '/index.php/donate'){echo 'donate';}?>">
    <div id="wrap">
        <div id="header" >
            <h2>Черкаський обласний<br /> спеціалізований<br /> Будинок дитини</h2>
                <jdoc:include type="modules" name="mainmenu" />
        </div><!-- header -->
        <div id="content" class="<?php if($_SERVER['REQUEST_URI'] == '/'){echo 'home';}
        if($_SERVER['REQUEST_URI'] == '/index.php/contacts'){echo 'contacts';}
        if(($_SERVER['REQUEST_URI'] == '/index.php/personnel') or ($catid == 8)){echo 'personnel';}
        if($_SERVER['REQUEST_URI'] == '/index.php/about'){echo 'about';}?>">
                <jdoc:include type="component" />
        </div><!-- content -->
        <jdoc:include type="modules" name="user1" />

    </div>
    <div id="footer">
        <p>Комунальний заклад "Черкаський обласний спеціалізований Будинок дитини" Черкаської обласної ради</p>
    </div>
</body>
</html>