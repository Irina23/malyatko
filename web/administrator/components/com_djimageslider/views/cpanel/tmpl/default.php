<?php 
/**
 * @version 1.3.0.stable
 * @package DJ-ImageSlider
 * @subpackage DJ-ImageSlider Component
 * @copyright Copyright (C) 2012 DJ-Extensions.com, All rights reserved.
 * @license http://www.gnu.org/licenses GNU/GPL
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Szymon Woronowski - szymon.woronowski@design-joomla.eu
 *
 *
 * DJ-ImageSlider is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DJ-ImageSlider is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DJ-ImageSlider. If not, see <http://www.gnu.org/licenses/>.
 *
 */


defined('_JEXEC') or die('Restricted access'); ?>

<table class="adminform">
	<tr>
		<td width="55%" valign="top">
			<div id="cpanel">
			<div style="float:left;">
				<div class="icon">
					<a href="index.php?option=com_categories&extension=com_djimageslider">
						<?php echo JHTML::_('image.administrator', 'icon-48-category.png', '/components/com_djimageslider/assets/', null, null, JText::_('COM_DJIMAGESLIDER_SUBMENU_CATEGORIES') ); ?>
						<span><?php echo JText::_('COM_DJIMAGESLIDER_SUBMENU_CATEGORIES'); ?></span>
					</a>
				</div>
			</div>
			<div style="float:left;">
				<div class="icon">
					<a href="index.php?option=com_djimageslider&view=items">
						<?php echo JHTML::_('image.administrator', 'icon-48-slides.png', '/components/com_djimageslider/assets/', null, null, JText::_('COM_DJIMAGESLIDER_SUBMENU_SLIDES') ); ?>
						<span><?php echo JText::_('COM_DJIMAGESLIDER_SUBMENU_SLIDES'); ?></span>
					</a>
				</div>
			</div>
			<div style="float:left;">
				<div class="icon">
					<a href="index.php?option=com_categories&view=category&layout=edit&extension=com_djimageslider">
						<?php echo JHTML::_('image.administrator', 'icon-48-category-add.png', '/components/com_djimageslider/assets/', null, null, JText::_('COM_DJIMAGESLIDER_NEW_CATEGORY') ); ?>
						<span><?php echo JText::_('COM_DJIMAGESLIDER_NEW_CATEGORY'); ?></span>
					</a>
				</div>
			</div>
			<div style="float:left;">
				<div class="icon">
					<a href="index.php?option=com_djimageslider&view=item&layout=edit">
						<?php echo JHTML::_('image.administrator', 'icon-48-slide-add.png', '/components/com_djimageslider/assets/', null, null, JText::_('COM_DJIMAGESLIDER_NEW_SLIDE') ); ?>
						<span><?php echo JText::_('COM_DJIMAGESLIDER_NEW_SLIDE'); ?></span>
					</a>
				</div>
			</div>
			<div style="float:left;">
				<div class="icon">
					<a href="http://dj-extensions.com/extensions/dj-image-slider.html" target="_blank">
						<?php echo JHTML::_('image.administrator', 'icon-48-help.png', '/components/com_djimageslider/assets/', null, null, JText::_('COM_DJIMAGESLIDER_DOCUMENTATION') ); ?>
						<span><?php echo JText::_('COM_DJIMAGESLIDER_DOCUMENTATION'); ?></span>
					</a>
				</div>
			</div>
			
			<div style="clear: both;" ></div>
		</div>
		</td>
	</tr>
</table>

<?php echo DJIMAGESLIDERFOOTER; ?>