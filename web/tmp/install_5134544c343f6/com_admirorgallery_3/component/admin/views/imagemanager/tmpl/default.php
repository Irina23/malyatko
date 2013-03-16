<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.filesystem.file');	  
jimport('joomla.filesystem.folder');
jimport('joomla.language.language');
jimport('joomla.filesystem.archive');

$AG_templateID = JRequest::getVar( 'AG_template' );// Current template for AG Component
$AG_itemURL = JRequest::getVar( 'AG_itemURL' );
$AG_frontEnd = JRequest::getVar( 'AG_frontEnd' );// Current template for AG Component

global $mainframe, $context;

// GET ROOT FOLDER
$plugin =& JPluginHelper::getPlugin('content', 'AdmirorGallery');
if (isset ($plugin->params)){
     $pluginParams = new JParameter( $plugin->params );
}
else {
     $pluginParams= new JParameter(null);
}
$ag_rootFolder = $pluginParams->get('rootFolder','/images/stories/');

if(!empty($AG_itemURL)){
    $ag_init_itemURL = $AG_itemURL;
}else{
     if($AG_frontEnd=='true'){
	  $ag_init_itemURL = $pluginParams->get('rootFolder','/images/stories/').$this->galleryName.'/';
     }else{
	  $ag_init_itemURL = $ag_rootFolder;
     }
}

require_once (JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_admirorgallery'.DS.'scripts'.DS.'AG_helper.php');

?>

<form action="<?php echo JURI::getInstance()->toString();?>" method="post" name="adminForm" enctype="multipart/form-data">

<input type="hidden" name="option" value="com_admirorgallery" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="view" value="imagemanager" />
<input type="hidden" name="controller" value="imagemanager" />
<input type="hidden" name="AG_itemURL" value="<?php echo $ag_init_itemURL;?>" id="AG_input_itemURL" />

<?php

if(file_exists(JPATH_SITE.$ag_init_itemURL)){
     if(is_dir(JPATH_SITE.$ag_init_itemURL)){
	  $ag_init_itemType="folder";
     }else{
	  $ag_init_itemType="file";
     }
     require_once (JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_admirorgallery'.DS.'views'.DS.'imagemanager'.DS.'scripts'.DS.'imgManager-render-'.$ag_init_itemType.'.php');
}else{
     $ag_error[] = Array ("Folder or image not found.", $ag_init_itemURL);
$ag_preview_content='
<div class="ag_screenSection_title">
     '.$ag_init_itemURL.'
</div>
';
}


echo '
<script type="text/javascript">

var ag_init_itemURL="'.$ag_init_itemURL.'";
var ag_init_itemType="'.$ag_init_itemType.'";
'."\n";

if($AG_frontEnd=='true'){
echo '
function submitbutton(pressbutton) {
     AG_jQuery(\'input[name="task"]\').val(pressbutton);
     AG_jQuery(\'form[name="adminForm"]\').submit();
}
'."\n";
}

echo '
function basename(path) {
     return path.replace(/'.chr(92).chr(92).'/g,"/").replace( /.*\//, "" );
}

function dirname(path) {
     return path.replace(/'.chr(92).chr(92).'/g,"/").replace(/\/[^\/]*$/, "")+"/";
}

function ag_folder_selected(itemURL){
    AG_jQuery(\'input[name="AG_itemURL"]\').val(itemURL);
    AG_jQuery(\'input[name="task"]\').val("AG_imgMan_renderFolder");
    AG_jQuery(\'form[name="adminForm"]\').submit();
}

function ag_file_selected(itemURL){
    AG_jQuery(\'input[name="AG_itemURL"]\').val(itemURL);
    AG_jQuery(\'input[name="task"]\').val("AG_imgMan_renderFile");
    AG_jQuery(\'form[name="adminForm"]\').submit();
}

AG_jQuery(function(){

     // Binding event to Folder Add
    AG_jQuery("#AG_folder_add a").click(function(e) {
	e.preventDefault();        
	AG_jQuery("#AG_folder_add").prepend("<input type=\'text\' class=\'AG_input\' name=\'AG_addFolders[]\' /><br />");
    });
    
     // Binding event to folder links
    AG_jQuery(".AG_folderLink").click(function(e) {
	e.preventDefault();        
	ag_folder_selected(AG_jQuery(this).attr("href"));
    });

    // Binding event to file links
    AG_jQuery(".AG_fileLink").click(function(e) {
	e.preventDefault();
	ag_file_selected(AG_jQuery(this).attr("href"));
    });

      // Binding event to folder links
      AG_jQuery("#ag_preview .AG_folderLink").click(function(e) {
	  e.preventDefault();
	  ag_folder_selected(AG_jQuery(this).attr("href"));
      });

      // Binding event to file links
      AG_jQuery("#ag_preview .AG_fileLink").click(function(e) {
	  e.preventDefault();
	  ag_file_selected(AG_jQuery(this).attr("href"));
      });

      AG_jQuery(".AG_cbox_selectItem").click(function(e) {
	  AG_jQuery(this).closest(".AG_item_wrapper").toggleClass("AG_mark_selectItem");
      });


      AG_jQuery("#AG_bookmarks_showHide").click(function(e) {
        e.preventDefault();
        if(AG_jQuery(".AG_bookmarks_wrapper").css("display")!="none"){
            AG_jQuery(".AG_bookmarks_wrapper").css("display","none");
            AG_jQuery("#AG_bookmarks_showHide").find("span").find("span").html("'.JText::_( 'SHOW SIDEBAR' ).'");
        }else{
            AG_jQuery(".AG_bookmarks_wrapper").css("display","block");  
            AG_jQuery("#AG_bookmarks_showHide").find("span").find("span").html("'.JText::_( 'HIDE SIDEBAR' ).'");   
        }

      });
      
      AG_jQuery("#AG_btn_showFolderSettings").click(function(e) {
        e.preventDefault();
        if(AG_jQuery("#AG_folderSettings_wrapper").css("display")!="none"){     
            AG_jQuery("#AG_folderSettings_wrapper").css("display","none"); 
            AG_jQuery("#AG_btn_showFolderSettings").find("span").find("span").html("'.JText::_( 'EDIT FOLDER CAPTIONS' ).'");
        }else{
            AG_jQuery("#AG_folderSettings_wrapper").css("display","block"); 
            AG_jQuery("#AG_folderSettings_status").val("edit");
            AG_jQuery("#AG_btn_showFolderSettings").find("span").find("span").html("'.JText::_( 'CLOSE FOLDER CAPTIONS' ).'");   
        }
      });
      
        AG_jQuery(".AG_folder_thumb").change(function(){
            AG_jQuery("#AG_folderSettings_status").val("edit");
        });
            
'."\n";

if($AG_frontEnd=='true'){
echo '
     // SET SHORCUTS
    AG_jQuery(document).bind("keydown", "ctrl+return", function (){submitbutton("AG_apply");return false;});	
    AG_jQuery(document).bind("keydown", "ctrl+backspace", function (){submitbutton("AG_reset");return false;});
'."\n";
}

echo '
});//AG_jQuery(function()

</script>
'."\n";

// FORMAT FORM

if($AG_frontEnd=='true'){
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'toolbar.php' );
echo '
<div class="AG_border_color AG_border_width AG_background_color AG_toolbar">
'.AdmirorgalleryHelperToolbar::getToolbar().'
</div>
';
}

echo '
<div class="AG_background_color AG_body_wrapper">
'."\n";

// FORMAT SCREEN
echo '
<table border="0" cellspacing="0" cellpadding="0" width="100%">
     <tbody>
	  <tr>
	       <td class="AG_bookmarks_wrapper" style="display:none;">
	       
		    <h1><img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/bookmark.png" style="float:left;" />&nbsp;'.JText::_( "GALLERIES").'</h1>
		    '."\n";

$bookmarkPath = JPATH_SITE.'/administrator/components/com_admirorgallery/assets/bookmarks.xml';
$ag_bookmarks_xml =& JFactory::getXMLParser( 'simple' );
$ag_bookmarks_xml->loadFile( $bookmarkPath );
if(isset($ag_bookmarks_xml->document->bookmark)){
    foreach($ag_bookmarks_xml->document->bookmark as $key => $value){
        echo '
<table border="0" cellspacing="0" cellpadding="0"><tbody><tr>
<td><img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/bookmarkRemove.png" style="float:left;" /></td>
<td><input type="checkbox" value="'.$ag_bookmarks_xml->document->bookmark[$key]->data().'" name="AG_cbox_bookmarkRemove[]"></td>
<td><span class="AG_border_color AG_border_width AG_separator">&nbsp;</span></td>
<td>
<a href="'.$ag_bookmarks_xml->document->bookmark[$key]->data().'"  class="AG_folderLink AG_common_button" title="'.$ag_bookmarks_xml->document->bookmark[$key]->data().'">
<span><span>
          '.AG_helper::_shrinkString(basename($ag_bookmarks_xml->document->bookmark[$key]->data()),20,true).'
</span></span>
</a>
</td>
</tr></tbody></table>
        '."\n";
    }
}

echo '
	              <div style="clear:both" class="AG_margin_bottom"></div>
	              <hr />
	              <div  class="AG_legend">
	              <h2>'.JText::_( 'LEGEND' ).'</h2>
	              <table><tbody>
	              <tr>
		          <td><img src="'.JURI::root().'administrator/components/com_admirorgallery/templates/'.$AG_templateID.'/images/bookmarkRemove.png" style="float:left;" /></td>
		          <td>'.JText::_( 'Select to remove bookmark.' ).'</td>
	              </tr>
	              </tbody></table>
	              <div>
	          
	       </td>
	       <td class="AG_border_color AG_border_width AG_details_wrapper">
	       <a class="AG_common_button" href="" id="AG_bookmarks_showHide"><span><span>'.JText::_( "Show Sidebar").'</span></span></a>
		    '.$ag_preview_content.'
	       </td>
	  </tr>
     </tbody>
</table>

</div>
'."\n";

?>
 
</form>
