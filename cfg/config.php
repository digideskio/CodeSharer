<?php
/*
#-------------------------------#
# config.php - CodeSharer v1.0  #
# (C)2015 - Flavio Monteiro     #
#                               #
# MIT License                   #
#-------------------------------#
*/

$cfg = array();
$cfg["meta"] = array();
$cfg["date"] = array();
$cfg["http"] = array();
$cfg["rtm"]  = array();  // Config set by the app in runtime, mostly for debug or variable reuse

// -- Date/Time options -- //
$cfg["date"]["timezone"] = "America/Sao_Paulo"; // Reference: http://php.net/manual/pt_BR/timezones.php
$cfg["date"]["format"]   = "d/m/Y H:i:s";       // Reference: http://php.net/manual/pt_BR/function.date.php
$cfg["date"]["autoTimezone"] = true;            // Set PHP timezone at start()

// -- Metadata option -- //
$cfg["meta"]["name"]    = "CodeSharer";
$cfg["meta"]["version"] = "v1.0-alpha";

// -- HTTP options -- //
$cfg["http"]["contentType"] = "text/html";
$cfg["http"]["charset"]     = "UTF-8";
$cfg["http"]["autoMIME"]    = true;         // send MIME header at start()
