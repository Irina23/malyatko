<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.file');

$AG_templateID = JRequest::getVar( 'AG_template' );// Current template for AG Component

 ?>

<form action="index.php" method="post" name="adminForm">

<input type="hidden" name="option" value="com_admirorgallery" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="view" value="" />
<input type="hidden" name="controller" value="admirorgallery" />

<?php

function quickiconButton( $link, $image, $text, $AG_templateID )
{
     global $mainframe;
     $lang = & JFactory::getLanguage();
     ($lang->isRTL()) ? $iconFloat="right" : $iconFloat="left" ;
     echo '
          <div style="float:'.$iconFloat.'">
               <div class="ag_guickIcon">
                    <a href="'.$link.'">
                         <img src="'.JURI::base().'components/com_admirorgallery/templates/'.$AG_templateID.'/images/toolbar/'.$image.'" />
                         <span>'.$text.'</span>
                    </a>
               </div>
          </div>
     ';
}





echo '
<div id="ag_controlPanel_wrapper">
';

$link = 'index.php?option=com_admirorgallery&view=resourcemanager&AG_resourceType=templates';
quickiconButton( $link, 'icon-48-templates.png', JText::_('Templates'), $AG_templateID );

$link = 'index.php?option=com_admirorgallery&view=resourcemanager&AG_resourceType=popups';
quickiconButton( $link, 'icon-48-popups.png', JText::_('Popups'), $AG_templateID );

$link = 'index.php?option=com_admirorgallery&view=imagemanager';
quickiconButton( $link, 'icon-48-imagemanager.png', JText::_('Image manager'), $AG_templateID );

echo '
<br style="clear:both" /><br />
<table border="0" cell>
  <tr>
<td style="vertical-align:text-top; width:50%">
<div style="display:block; border-style:solid;" class="AG_border_color AG_border_width AG_background_color AG_base_font">
<form action="'.JURI::getInstance()->toString().'" method="post" name="adminForm">

'."\n";


$db =& JFactory::getDBO();
$query = "SELECT * FROM #__plugins WHERE name LIKE '%AdmirorGallery%'";
$db->setQuery($query);
$row = $db->loadAssoc();
$paramsdata = $row['params'];
$paramsdefs = JPATH_SITE.'/plugins/content/AdmirorGallery.xml';
$myparams = new JParameter($paramsdata,$paramsdefs);
echo $myparams->render( 'params' );

// Reading database
// $db =& JFactory::getDBO();
// $query = "SELECT * FROM #__ag_content";
// $db->setQuery($query);
// $row = $db->loadAssocList('uniqueName');
// echo $row['sample_row']['greeting'];

// Reading database
// $db =& JFactory::getDBO();
// $query = "SELECT * FROM #__components";
// $db->setQuery($query);
// $row = $db->loadAssocList('name');
// echo $row['Admiror Gallery']['params'];

echo '
<input type="hidden" name="pressbutton" value="" id="pressbutton" />
</form>
</div>
<br style="clear:both" />
';

if(JFIle::exists(JPATH_COMPONENT_ADMINISTRATOR.'/admirorgallery.xml')){
     $ag_admirorgallery_xml =& JFactory::getXMLParser( 'simple' );
     $ag_admirorgallery_xml->loadFile( JPATH_COMPONENT_ADMINISTRATOR.'/admirorgallery.xml' );
     $ag_admirorgallery_version_component = $ag_admirorgallery_xml->document->version[0]->data();
     $ag_admirorgallery_version_plugin = $ag_admirorgallery_xml->document->plugin_version[0]->data();
     $ag_admirorgallery_version_button = $ag_admirorgallery_xml->document->button_version[0]->data();
     echo JText::_('COMPONENT VERSION:').'&nbsp;'.$ag_admirorgallery_version_component."<br />";
     echo JText::_('PLUGIN VERSION:').'&nbsp;'.$ag_admirorgallery_version_plugin."<br />";
     echo JText::_('BUTTON VERSION:').'&nbsp;'.$ag_admirorgallery_version_button."<br />";
}

echo '
</td>
<td style="vertical-align:text-top; width:50%" class="AG_descriptionWrapper">
'."\n";



echo JText::_('ADMIRORDESCRIPTION');


echo '
</td>
  </tr>
</table>
</div>
';

?>
 
</form>
