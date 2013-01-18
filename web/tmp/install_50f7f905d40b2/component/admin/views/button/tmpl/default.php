<?php

defined('_JEXEC') or die('Restricted access');

$AG_template = JRequest::getVar( 'AG_template' );// Current template for AG Component

// GET ROOT FOLDER
$plugin =& JPluginHelper::getPlugin('content', 'AdmirorGallery');
if (isset ($plugin->params)){
     $pluginParams = new JParameter( $plugin->params );
}
else {
     $pluginParams= new JParameter(null);
}
$ag_rootFolder = $pluginParams->get('rootFolder','/images/stories/');
$ag_init_itemURL=$ag_rootFolder;

 ?>
<script type="text/javascript" src="<?php echo JURI::root().'plugins/content/AdmirorGallery/AG_jQuery.js';?>"></script>
<link rel="stylesheet" href="<?php echo JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_template.'/css/add-trigger.css'; ?>" type="text/css" />

<form action="index.php" id="AG_form" method="post" enctype="multipart/form-data">

<div style="float: right">
     <button type="button" onclick="AG_createTriggerCode();window.parent.document.getElementById('sbox-window').close();"><?php echo JText::_('Insert') ?></button>
     <button type="button" onclick="window.parent.document.getElementById('sbox-window').close();"><?php echo JText::_('Cancel') ?></button>
</div>
<br style="clear:both;"/>
<hr />
<h2><?php echo JText::_("AG_FOLDERS"); ?></h2>
<?php

$ag_folders=JFolder::listFolderTree(JPATH_SITE.$ag_init_itemURL,"");

$ag_init_itemURL_strlen = strlen($ag_init_itemURL);

if(!empty($ag_folders)){
  foreach($ag_folders as $ag_folders_key => $ag_folders_value){
$ag_folderName = substr($ag_folders_value['relname'],$ag_init_itemURL_strlen);
     echo '<input type="radio" name="AG_form_folderName" value="'.$ag_folderName.'" /> '.$ag_folderName.'<br />';
  }
}



?>
<p> </p>
<hr />
<h2><?php echo JText::_("AG_PARAMETERS"); ?></h2>

<?php

$db =& JFactory::getDBO();
$query = "SELECT * FROM #__plugins";
$db->setQuery($query);
$row = $db->loadAssocList('name');
$paramsdata = $row['Content - AdmirorGallery']['params'];
$paramsdefs = JPATH_SITE.'/plugins/editors-xtd/admirorgallery/admirorgallery.xml';
$myparams = new JParameter($paramsdata,$paramsdefs);
echo $myparams->render( 'params' );

?>

<script type="text/javascript">
AG_jQuery(document).ready(function() {

     AG_jQuery(".ag_button_folderName").click(function(event) {
	  event.preventDefault();
     });

     AG_jQuery('input[name="AG_form_folderName"]')[0].checked = true;

});
function AG_createTriggerCode(){

     var AG_params="";

     var AG_fields = AG_jQuery(".paramlist_value input").serializeArray();
     AG_jQuery.each(AG_fields, function(i, field) {
	  AG_params += " "+field.name.substring(7,(field.name.length-1)) +'="'+field.value+'"';
     });
     var AG_fields = AG_jQuery(".paramlist_value select").serializeArray();
     AG_jQuery.each(AG_fields, function(i, field) {
	  AG_params += " "+field.name.substring(7,(field.name.length-1)) +'="'+field.value+'"';
     });

     var AG_triggerCode='{AG'+AG_params+'}'+AG_jQuery('input[name="AG_form_folderName"]:checked').val()+'{/AG}';
     window.parent.buttonTestClick(AG_triggerCode);

}
</script>

</form>



