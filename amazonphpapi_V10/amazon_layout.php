<?php
/*

	filename:			amazon_layout.php
	created:			7/17/2002, © 2002 php9.com Calin Uioreanu
	descripton:		display template for Amazon API 

*/

// if Amazon returned an empty Image (1x1), do not display the HTML code
$arImageSize = getImageSize($IMAGEURLMEDIUM) ;

if ( is_array($arImageSize) && $arImageSize[1] == 1) {
	$sImageUrl = '<img src="/layout/standard.jpg" hspace="5" vspace="5" border="0" align="left" />';
} else {
	$sImageUrl = '<img '. SMALL_IMAGE_PROPERTIES .' src="'. $IMAGEURLMEDIUM .'" alt="'. $PRODUCTNAME .'" hspace="5" vspace="5" border="0" align="left" />';
}

echo
	'<table border="0" cellpadding="2" cellspacing="2">',
	'<tr><td rowspan="7" bgcolor="white">',
	'<a href="'. $sBookUrl .'">',
	$sImageUrl,
	'</a>',
	'</td></tr><tr><td colspan="2" bgcolor="white">',
	'<a href="'. $sBookUrl .'">',
	'<b>'. $PRODUCTNAME .'</b>',
	'</a>',
	'</td></tr><tr><td bgcolor="white">',
	'by: ',
	'</td><td>',
	$AUTHORS,
	'</td></tr><tr><td bgcolor="white">',
	'List Price: ',
	'</td><td>',
	'<strike>'. $LISTPRICE .'</strike>',
	'</td></tr><tr><td bgcolor="white">',
	'Amazon Price: ',
	'</td><td>',
	'<b><font color="red">'. $OURPRICE .'</font></b> &nbsp;&nbsp;',
	'<a href="http://www.amazon.com/exec/obidos/ASIN/'. $ASIN .'/php9comweblot-20"><font color="red"><b>Buy now from Amazon.com</b></a>!</a>',
	'</td></tr><tr><td bgcolor="white">',
	'Publisher: ',
	'</td><td>',
	$MANUFACTURER,
	' ('. $RELEASEDATE .')',
	'</td></tr>',
	'</table>',
	'<br />'
;

?>