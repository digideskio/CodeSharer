<?php
/*
#-----------------------------#
# send.php - CodeSharer v1.0  #
# (C)2015 - Flavio Monteiro   #
#                             #
# MIT License                 #
#-----------------------------#
*/

require_once(__DIR__ . "/core.php");

$core = new Core();
$core->setContentType("#JSON");
$core->start();

$code = @$_GET["code"];
$code = (string)$code;

if(!empty($code)) {
	$core->setCode($code);
}

exit(); // Prevent banners from hosting.