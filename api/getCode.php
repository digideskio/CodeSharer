<?php
/*
#--------------------------------#
# getCode.php - CodeSharer v1.0  #
# (C)2015 - Flavio Monteiro      #
#                                #
# MIT License                    #
#--------------------------------#
*/

require_once(__DIR__ . "/core.php");

$core = new Core();
$core->setContentType("#JSON");
$core->start();

$return = array();

$code = $core->getCode();
$return["code"] = (string)$code;

echo json_encode($return, JSON_FORCE_OBJECT);
//echo $code;

exit(); // Prevent banners from hosting.