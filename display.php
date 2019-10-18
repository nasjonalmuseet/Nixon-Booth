<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/nixon-display.css" rel="stylesheet" type="text/css" media="screen">
<title>NIXONS</title>
</head>
<body>
<ul id="result"></ul>
</body>
<script src="js/jquery-1.7.2.min.js"></script>
<script language="javascript"> 
$(document).ready(function(){
	// Load once first
	$("#result").load( "display-list.php?time=" );
	// then set loading intervals, 20 secs
	window.setInterval(function() {
		var tmr = new Date().getTime();
		$("#result").load( "display-list.php?time=" + tmr );
	}, 20000);
});
</script>
</html>