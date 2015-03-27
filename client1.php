<?php
/*
#--------------------------------#
# client1.php - CodeSharer v1.0  #
# (C)2015 - Flavio Monteiro      #
#                                #
# MIT License                    #
#--------------------------------#
*/

require_once(__DIR__ . "/api/core.php");

$core = new Core();
$core->setContentType("#HTML");
$core->start();

require_once(__DIR__  . "/gui/client.php");
