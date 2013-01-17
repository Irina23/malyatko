<?php
defined('_JEXEC') or die;
$menu = & JSite::getMenu();
//Получили главное меню
//
//Если мы находимся в главном пунтке,
if ($menu->getActive() == $menu->getDefault()) {
//то переменная fpage будет хранить единицу.
    $fpage="1";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css" type="text/css" />

</head>
    <body>
    <div id="wrap">
        <div id="header" >
            <h2><a href="/">Черкаський обласний спеціалізований Будинок дитини</a></h2>
                <jdoc:include type="modules" name="mainmenu" />
        </div><!-- header -->
        <div id="content" class="<?php if($_SERVER['REQUEST_URI'] == '/'){echo 'home';}?>">
                <jdoc:include type="component" />
        </div><!-- content -->
        <jdoc:include type="modules" name="user1" />
        <ul id="footer">
            <li>
                    text
            </li>
            <li>© Copyright 2013</li>
        </ul>
    </div>
</body>
</html>