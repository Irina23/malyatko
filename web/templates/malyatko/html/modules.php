<?php

defined('_JEXEC') or die;


function modChrome_no($module, &$params, &$attribs)
{
	if ($module->content) {
		echo $module->content;
	}
}

function modChrome_well($module, &$params, &$attribs)
{
	if ($module->content) {
		echo "<div class=\"well ". htmlspecialchars($params->get('moduleclass_sfx')) ."\">";
		echo "<div class=\"page-header\"><strong>".$module->title."</strong></div>";
		echo $module->content;
		echo "</div>";
	}
}

function modChrome_default($module, &$params, &$attribs)
{
	if ($module->content) {
		echo "<div class=\"module ". htmlspecialchars($params->get('moduleclass_sfx')) ."\">";
		echo "<div class=\"page-header\"><strong>".$module->title."</strong></div>";
		echo $module->content;
		echo "</div>";
	}
}
?>
