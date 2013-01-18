<?php
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


class JElementGalleryName extends JElement
{
   var   $_name = 'galleryName'; 


   function fetchElement($name, $value, &$node, $control_name)
   {

JHTML::_('behavior.modal');

      $size = ( $node->attributes('size') ? 'size="'.$node->attributes('size').'"' : '' );
      $class = ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="galleryName"' );

      $value = htmlspecialchars(html_entity_decode($value, ENT_QUOTES), ENT_QUOTES);

      $content = '';

      $content.= '
      <input
	  name="'.$control_name.'['.$name.']" type="text"
	  class="inputbox" id="'.$name.'"
	  value="'.$value.'" size="20" />
      ';
      $link = 'index.php?option=com_admirorgallery&amp;view=galleryname&amp;tmpl=component&amp;e_name='.$name;
      $content.= '
	  <a href="'.$link.'" rel="{handler: \'iframe\', size: {x: 500, y: 400}}" class="modal" style="text-decoration:none;">
		<button type="button" style="cursor:pointer; cursor:hand">'.JText::_('SELECT GALLERY').'</button>
	  </a>
      ';

      return $content;
   }
}


?>