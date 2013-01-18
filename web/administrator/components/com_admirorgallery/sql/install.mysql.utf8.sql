## --------------------------------------------------------
DROP TABLE IF EXISTS `#__ag_galleries`;
 
CREATE TABLE `#__ag_galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foldername` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


## --------------------------------------------------------
DROP TABLE IF EXISTS `#__ag_images`;
 
CREATE TABLE `#__ag_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `galleryID` int(11) NOT NULL,
  `imageURL` varchar(255) NOT NULL,
  `imageThumb` BLOB NOT NULL,
  `priority` int(11) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `imageWidth` int(11) NOT NULL,
  `imageHeight` int(11) NOT NULL,
  `imageSize` int(11) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;



## --------------------------------------------------------
DROP TABLE IF EXISTS `#__ag_captions`;
 
CREATE TABLE `#__ag_captions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imageID` int(11) NOT NULL,
  `value` TEXT NOT NULL ,
  `langCode` varchar(255) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;