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

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

abstract class DJImageResizer {

	public static function createThumbnail($image_path, $folder, $width = 0, $height = 0, $mode = 'crop') {

		// check if passed image exists
		if (!JFile::exists(JPATH_SITE . DS . str_replace('/', DS, $image_path)))
			return false;

		// check if the destination folder exists or create it
		$path = JPATH_SITE . DS . str_replace('/', DS, $folder);
		if (!JFile::exists($path) || !is_dir($path)) {
			if (!JFolder::create($path))
				return false;
		}

		// check if any dimensions was passed
		if ($width == 0 && $height == 0)
			return false;

		// set name for image thumbnail
		$thumb_name = $width . 'x' . $height . '-' . $mode . '-' . str_replace('/', '_', $image_path);

		// if file exists just return the path
		if (!JFile::exists($path . DS . $thumb_name)) {

			switch($mode) {
				case 'no' :
					return false;
					break;
				case 'toWidth' :
					self::resizeImage(JPATH_SITE . DS . str_replace('/', DS, $image_path), $path . DS . $thumb_name, $width, 0);
					break;
				case 'toHeight' :
					self::resizeImage(JPATH_SITE . DS . str_replace('/', DS, $image_path), $path . DS . $thumb_name, 0, $height);
					break;
				case 'crop' :
				default :
					self::resizeImage(JPATH_SITE . DS . str_replace('/', DS, $image_path), $path . DS . $thumb_name, $width, $height);
					break;
			}
		}

		return $folder . '/' . $thumb_name;
	}

	private static function resizeImage($path, $newpath, $nw = 0, $nh = 0) {

		if (!$path || !$newpath)
			return false;
		if (!list($w, $h, $type, $attr) = getimagesize($path)) {
			return false;
		}

		$OldImage = null;

		switch($type) {
			case 1 :
				$OldImage = imagecreatefromgif($path);
				break;
			case 2 :
				$OldImage = imagecreatefromjpeg($path);
				break;
			case 3 :
				$OldImage = imagecreatefrompng($path);
				break;
			default :
				return false;
				break;
		}

		if ($nw == 0 && $nh == 0) {
			$nw = 75;
			$nh = (int)(floor(($nw * $h) / $w));
		} elseif ($nw == 0) {
			$nw = (int)(floor(($nh * $w) / $h));
		} elseif ($nh == 0) {
			$nh = (int)(floor(($nw * $h) / $w));
		}

		// check if ratios match
		$_ratio = array($w / $h, $nw / $nh);
		if ($_ratio[0] != $_ratio[1]) {// crop image

			// find the right scale to use
			$_scale = min((float)($w / $nw), (float)($h / $nh));

			// coords to crop
			$cropX = (float)($w - ($_scale * $nw));
			$cropY = (float)($h - ($_scale * $nh));

			// cropped image size
			$cropW = (float)($w - $cropX);
			$cropH = (float)($h - $cropY);

			$crop = ImageCreateTrueColor($cropW, $cropH);
			if ($type == 3) {
				imagecolortransparent($crop, imagecolorallocate($crop, 0, 0, 0));
				imagealphablending($crop, false);
				imagesavealpha($crop, true);
			}
			ImageCopy($crop, $OldImage, 0, 0, (int)($cropX / 2), (int)($cropY / 2), $cropW, $cropH);
		}

		// do the thumbnail
		$NewThumb = ImageCreateTrueColor($nw, $nh);
		if ($type == 3) {
			imagecolortransparent($NewThumb, imagecolorallocate($NewThumb, 0, 0, 0));
			imagealphablending($NewThumb, false);
			imagesavealpha($NewThumb, true);
		}
		if (isset($crop)) {// been cropped
			ImageCopyResampled($NewThumb, $crop, 0, 0, 0, 0, $nw, $nh, $cropW, $cropH);
			ImageDestroy($crop);
		} else {// ratio match, regular resize
			ImageCopyResampled($NewThumb, $OldImage, 0, 0, 0, 0, $nw, $nh, $w, $h);
		}

		if (is_file($newpath))
			unlink($newpath);
		switch($type) {
			case 1 :
				imagegif($NewThumb, $newpath);
				break;
			case 2 :
				imagejpeg($NewThumb, $newpath, 90);
				break;
			case 3 :
				imagepng($NewThumb, $newpath);
				break;
		}

		ImageDestroy($NewThumb);
		ImageDestroy($OldImage);

		return true;
	}

}
?>
