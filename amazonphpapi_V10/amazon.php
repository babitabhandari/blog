<?php
/*

	filename:			amazon.php
	created:			7/17/2002, © 2002 php9.com Calin Uioreanu
	descripton:		controller script Amazon API 
	requirements:	

		- PHP with XML support
		- a Developer's token from Amazon (http://www.amazon.com/webservices)

*/

// configuration variables 
require_once('amazon_config.php');

// webservice class definition 
require_once('amazon_api.php');

?>

<html>
<head>
 <title>Amazon API : <?= ($_GET['Search']) ?></title>
<style type="text/css">
<!-- 
td { font-family: arial,helvetica,sans-serif; font-size: smaller; }
p { font-family: arial,helvetica,sans-serif; font-size: smaller; }
-->
</head>
</style>
<p>
<form method="get">
Search for <input type="text" name="Search" value="<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"> 
 in 
<select name="Mode">
<?php 
	foreach ($arModes as $sMode => $sDisplay) {
		echo "\n". '	<option value="'. $sMode .'"';
		if ($sCurrentMode == $sMode) {
			echo ' selected';
		}
		echo '>'. $sDisplay .'</option>';
	}
?>
</select>
 sorted by 
<select name="SortBy">
<?php 
	foreach ($arModeSortType[$sCurrentMode] as $sModeSortType => $sDisplay) {
		echo "\n". '	<option value="'. $sModeSortType .'"';
		if ($sCurrentModeSortType == $sModeSortType) {
			echo ' selected';
		}
		echo '>'. $sDisplay .'</option>';
	}
?>
</select>
<input type="submit" value="Go">
</form>
</p>
<p>
<font size="-2" color="brown">
Were you looking for <a href="http://shop.php9.com/baby.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/baby.php">baby shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/books.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/books.php">books shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/camera.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/camera.php">camera shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/computer.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/computer.php">computer shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/dvd.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/dvd.php">dvd shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/electronics.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/electronics.php">electronics shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/games.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/games.php">games shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/garden.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/garden.php">garden shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/kitchen.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/kitchen.php">kitchen shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/magazines.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/magazines.php">magazines shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/music.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/music.php">music shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/software.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/software.php">software shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/tools.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/tools.php">tools shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/toys.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/toys.php">toys shop</a> ?<br />
Were you looking for <a href="http://shop.php9.com/video.php/Mode/search/search_string/<?= (isset($_GET['Search'])?$_GET['Search']:'php')?>"><?= (isset($_GET['Search'])?$_GET['Search']:'php')?></a> in our <a href="http://shop.php9.com/video.php">video shop</a> ?<br />
</font>
</p>
<?php

flush();

$oAmazon = new Amazon_WebService();

//$oAmazon->fp = fopen ($sUrl, 'r');
if (!$oAmazon->setInputUrl($sUrl, 20)) {
	die ('cannot open input file. exiting..' . '<a href='. $sUrl .'>@</a>');
}

// pass the output display template
$oAmazon->sTemplate = 'amazon_layout.php';

if (!$oAmazon->parse()) {
	die ('XMLParse failed');
}

$iTotalResuls = (int) $oAmazon->arAtribute['TotalResults'];

echo '<p> Displayed '. (int) $oAmazon->iNumResults .' results out of ' . $iTotalResuls .'.</p>';

// debugging: XML source 
// echo '<a href='. $sUrl .'>@</a>';
?>
<p>
Here is a small article with the code behind this Amazon PHP API implementation:<br /> <a href="http://www.php9.com/index.php/section/articles/name/Amazon%20PHP%20API">http://www.php9.com/index.php/section/articles/name/Amazon PHP API</a>
</p>
<table border="0" cellpadding="0" cellspacing="0" width="750" bgcolor="white">
	<tr>
		<td valign="top" align="center">
<font size="-2">
Copyright © 2001-2002 Calin Uioreanu, <a href="http://www.php9.com/">php9.com Weblog</a>. Powered by <a href="http://www.php9.com/amazon.php">Amazon PHP API</a>. All rights reserved. In association with <a href="http://www.amazon.com">Amazon.com</a>
</td>
	</tr>
</table>
