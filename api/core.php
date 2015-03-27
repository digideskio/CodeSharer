<?php
/*
#-----------------------------#
# core.php - CodeSharer v1.0  #
# (C)2015 - Flavio Monteiro   #
#                             #
# MIT License                 #
#-----------------------------#
*/

class Core {
	private $cfg;
	
	public function __construct() {
		require_once(__DIR__ . "/../cfg/config.php");
		$this->cfg = $cfg;
		$this->dbg = false;
	}
	public function start() {
		if($this->cfg["http"]["autoMIME"] === true) {
			$contentType = $this->cfg["http"]["contentType"];
			$charset     = $this->cfg["http"]["charset"];
			
			$contentTypeHeader = "Content-Type: {$contentType}; charset={$charset}";
			$this->cfg["rtm"]["MIME_header"] = $contentTypeHeader;

			header($contentTypeHeader, true);
		}
		if($this->cfg["date"]["autoTimezone"] === true) {
			$timezone = $this->cfg["date"]["timezone"];
			date_default_timezone_set($timezone);
		}
	}
	
	// -- !Auto prevention -- //@TODO: Warn if called after start();
	public function disableAutoMIME() {
		$this->cfg["http"]["autoMIME"] = false;
	}
	public function disableAutoTimezone() {
		$this->cfg["date"]["autoTimezone"] = false;
	}
	
	// -- On the fly settings override --
	public function setContentType($contentType, $wildcard=true) {
		if($wildcard) {
			switch($contentType) {
				case "#JSON":
					$contentType = "application/json";
					break;
				
				case "#HTML":
					$contentType = "text/html";
					break;
			}
		}
		
		$this->cfg["http"]["contentType"] = $contentType;
	}
	public function setCharset($charset) {
		$this->cfg["http"]["charset"] = $charset;
	}
	public function setTimezone($timezone, $wildcard=true) {
		if($wildcard) {
			switch($timezone) {
				case "#SP":
					$timezone = "America/Sao_Paulo";
					break;
			}
		}
		
		$this->cfg["date"]["timezone"] = $timezone;
		date_default_timezone_set($timezone);
	}
	public function setDatetimeFormat($format) { 
		$this->cfg["date"]["timezone"] = $format;
	}
	
	// -- Util functions -- //
	function getDate($timestamp=0) {
		$timestamp = (int)$timestamp;
		if(empty($timestamp)) { $timestamp = time(); }
		
		return date($this->cfg["date"]["format"], time());
	}
	
	// -- Get certain useful config settings --
	public function getRTM() {
		return $this->cfg["rtm"];
	}
	public function getMeta() {
		return $this->cfg["meta"];
	}
	
	// @-- Here the real code starts --@ //
	public function setCode($content) {
		@file_put_contents(__DIR__ . "/code/code.txt", $content, LOCK_EX);
	}
	public function getCode() {
		$code = @file_get_contents(__DIR__ . "/code/code.txt");
		
		if(empty($code)) { $code = "void setup() {\n\n}\n\nvoid loop() {\n\n}"; }
		//return htmlspecialchars($code, ENT_QUOTES);
		return $code;
	}
}