/*
#----------------------------------#
# codeSharer.js - CodeSharer v1.0  #
# (C)2015 - Flavio Monteiro        #
#                                  #
# MIT License                      #
#----------------------------------#
*/
var autoRefresh = false;
var autoSave    = false;

// Server communication functions
function getServerCode() {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "api/getCode.php", false);
	ajax.send();
	var obj = JSON.parse(ajax.responseText);
	return obj.code;
}

function sendCodeToServer(code) {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "api/send.php?code="+encodeURIComponent(code), false);
	ajax.send();
}

// Webpage functions
function getClientCode() {
	return editor.getSession().getValue();
}

// Webpage user functions 
function refreshCode() {
	var code = getServerCode();
	editor.getSession().setValue(code);
}
function sendUserCode() {
	var code = getClientCode();
	sendCodeToServer(code);
}

// Auto refreshCode
function autoRefreshFunction() {
	if(autoRefresh) {
		refreshCode();
	}
}
function autoSaveFunction() {
	if(autoSave) {
		sendUserCode();
	}
}

// Startup
var editor = ace.edit("editor");
    editor.setTheme("ace/theme/textmate");
    editor.getSession().setMode("ace/mode/c_cpp");
	editor.setOption("showPrintMargin", false);
	editor.setOptions({
       fontSize: "10pt"
    });
	
document.getElementById("autoRefresh").checked = false;
document.getElementById("autoSave").checked = false;
setInterval(autoRefreshFunction, 750);
setInterval(autoSaveFunction, 750);

// Handle control+key
function keyHandler(event) {
    if (event.ctrlKey || event.metaKey) {
        switch (String.fromCharCode(event.which).toLowerCase()) {
        case 's':
            event.preventDefault();
			sendUserCode();
            break;
        case 'r':
            event.preventDefault();
			refreshCode();
            break;
		}
    }
}

window.addEventListener('keydown', keyHandler);

// Auto-refreshCode
function autoRefreshToggle() {
	var element = document.getElementById("autoRefresh");
	
	if(autoRefresh == false) {
		element.checked = true;
		autoRefresh = true;
	} else {
		element.checked = false;
		autoRefresh = false;
	}
}
function autoSaveToggle() {
	var element = document.getElementById("autoSave");
	var element2 = document.getElementById("autoRefresh");
	
	if(autoSave == false) {
		element.checked = true;
		element2.check = false;
		autoRefresh = false;
		autoSave = true;
	} else {
		element.checked = false;
		autoSave = false;
	}
}