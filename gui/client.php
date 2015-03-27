<!DOCTYPE html>
<html>
<head>
	<title>codeSharer</title>
	<link rel="stylesheet" href="gui/css/default.css">
	<script src="gui/js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<textarea id="editor"><?php echo htmlspecialchars($core->getCode(), ENT_QUOTES); ?></textarea>
	<button onclick="sendUserCode();return false;">Enviar</button>
	<button onclick="refreshCode();return false;">Atualizar</button>
	<span onclick="autoRefreshToggle(); return false;"><input id="autoRefresh" type="checkbox">Auto-atualizar</input></span>
	<span onclick="autoSaveToggle(); return false;"><input id="autoSave" type="checkbox">Auto-salvar</input></span>
	
	<script src="gui/js/codeSharer.js"></script>
</body>
</html>