<?php
// TEST
if(!empty($_POST['AG_form_scrollTop'])){

$doc->addScriptDeclaration('
    AG_jQuery(document).ready(function() {
        AG_jQuery(window).scrollTop('.$_POST['AG_form_scrollTop'].');
        AG_jQuery(window).scrollLeft('.$_POST['AG_form_scrollLeft'].');
    });
');

}
?>
